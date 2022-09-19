(function() {
	$('#excluir').on('hidden.bs.modal', function (e) {
		$('#form-delete').each (function(){
			this.reset();
		});
	});

	$('#excluir').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var nameTitle = button.data('whatever');
		var href = button.data('href');

		var modal = $(this);
		modal.find('.modal-title').text(nameTitle);
		modal.find('#delete-button').attr('href', href);
	});
})();