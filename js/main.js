$(document).ready(function(){
	for (var i = 1; i <= 13; i++) {
		new Switchery(document.querySelector('.js-switch'+i), { color: '#1AB394' });
	}

	$('.summernote').summernote({
		toolbar: [				 
			['style', ['bold', 'italic', 'underline', 'clear']],
			['style', ['style']]
		]});

});
