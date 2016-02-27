$(document).ready(function(){
	$('.summernote').summernote({
		toolbar: [				 
			['style', ['bold', 'italic', 'underline', 'clear']],
			['style', ['style']]
		]
	});
	
	//set value
	$("#temuan_indor_area").code($("#temuan_indor_area_hidden").val());
	$("#temuan_outdor_area").code($("#temuan_outdor_area_hidden").val());
	$("#catatan").code($("#catatan_hidden").val());
});
