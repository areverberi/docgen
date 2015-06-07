$(document).ready(function(){
	$('#pre').click(function(e){
		e.preventDefault();
		$('<form action=prodotti.php action=get ><input type=hidden name=pre value=1 /></form>').appendTo('body').submit();
	});
});
