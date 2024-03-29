import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

if (document.getElementById('dropzone')) {
	const dropzone = new Dropzone('#dropzone', {
		dictDefaultMessage: 'Sube tu imagen aquí',
		acceptedFiles: '.png,.jpg,.jpeg',
		addRemoveLinks: true,
		dictRemoveFile: 'Borrar Archivo',
		maxFilesize: 1,
		uploadMultiple: false,
		init: function () {
			if (document.querySelector('[name="image"]').value.trim()) {
				const imagePublished = {};
				imagePublished.size = 1234;
				imagePublished.name = document.querySelector('[name="image"]').value;
				this.options.addedfile.call(this, imagePublished);
				this.options.thumbnail.call(this, imagePublished, `/uploads/${imagePublished.name}`);
				imagePublished.previewElement.classList.add('dz-success', 'dz-complete');
			}
		}
	});

	dropzone.on('success', (file, response) => {
		document.querySelector('[name="image"]').value = response.image;
	});
	
	dropzone.on('removedfile', function() {
		document.querySelector('[name="image"]').value = '';
	});
}
