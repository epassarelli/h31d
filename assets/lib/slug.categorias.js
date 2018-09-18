$(document).ready( function() {
	$("#field-name").stringToSlug({
		prefix: '/productos/categoria/',
		getPut: '#field-slug'
	});
	$('#field-slug').prop("disabled", true);
	$('#slug_input_box').prop("disabled", true);
});