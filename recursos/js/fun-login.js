/*cifrado sha256*/
function get_hash(){
	var pass_nocifra = $("#pass_l").val();
	var pass_cifrado = sha256(pass_nocifra);
	$("#pass_cifrado").val(pass_cifrado);
	$("#form-login").submit();
}  

$(document).ready(function(){
	$("#form-login")[0].reset();
});
