$(document).ready(function(){
	$('#filetemplate').fileupload({
		dataType:'json',
		done: function(e, data){
			for(v in data.result.variables)
			{
				$('#parameters').append('<div class="param draggable" id="'+data.result.variables[v]+'">'+data.result.variables[v]+'</div>');
			}
			$('#titlesorter').width($('#parameters').width());
			$('#titlesorter').height($('#parameters').height());
			$('#titlesorter').sortable({
				connectWith:'#parameters'
			});
			$('#parameters').sortable({
				connectWith: '#titlesorter'
			});
			$('#filename').val(data.result.n);
		},
		submit: function(e, data){
			data.formData={'nome':$('#nome').val()};
		}
	});
	$('#conferma').click(function(e){
		titolo=$('#titlesorter').sortable('toArray', {attribute:''});
		$.post('gestionem/titolo.php', {'titolo':titolo, 'nome':$('#filename').val()}, function(data){window.location.href="templatelist.php";}, "json");
	});
});