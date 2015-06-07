$(document).ready(function(){
	$('.ellink').click(function(e){
		e.preventDefault();
		$.post('gestionem/eliminad.php', {'id':$(this).attr('idd')}, function(data){window.location.reload();}, "json");
	});
	$('.genlink').click(function(e){
		e.preventDefault();
		$('<form action=docengine/genera.php method=post ><input type=hidden name=document value='+$(this).attr('idd')+" /></form>").appendTo("body").submit();
	});
});