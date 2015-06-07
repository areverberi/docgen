$(document).ready(function(){
	$('#genera').click(function(e){
		documento={};
		$('.campo').each(function(){
			documento[$(this).attr('id')]=$(this).val();
		});
		$.post('gestionem/cread.php', {'template':get_value, 'documento':documento}, function(data){
			if(data.done)
			{
				//$.post('docengine/genera.php', {'document':data.id}, function(data){});
				$('<form action=docengine/genera.php method=post ><input type=hidden name=document value='+data.id+" /></form>").appendTo("body").submit();
			}
		}, "json");
		//console.log(documento);
	});
});