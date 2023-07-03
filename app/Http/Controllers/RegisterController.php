<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->get('username'));
        // dd($request);

        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validation
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => [
                'required', 
                'unique:users',
                'min:5', 'max:20',
                'not_in:twitter,edit-profile'
            ],
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
