$(document).ready( function() {
	$("#field-nombre").stringToSlug({
		prefix: 'productos/detalle/',
		getPut: '#field-slug'
	});
	$('#field-slug').prop("disabled", true);
	$('#slug_input_box').prop("disabled", true);
	
});