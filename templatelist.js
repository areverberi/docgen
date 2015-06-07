$(document).ready(function(){
	$('.ellink').click(function(e){
		e.preventDefault();
		$.post('gestionem/eliminat.php', {'id':$(this).attr('idt')}, function(){window.location.reload();}, "json");
	});
});