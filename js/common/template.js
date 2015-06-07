function closelightbox()
{
	$('#lightbox, #lightbox-overlay, #lightbox-overlay-toast').fadeOut(300);
	$('#lightbox, #lightbox-overlay, #lightbox-overlay-toast').remove();
	$('#user, #pwd, #chal').val('');
}

function visualizza(data, section){
	if(section=='cat'){
		visualizzacat(data);
		return;
	}
	if(section=='news'){
		visualizzanews(data);
		return;
	}
	if(section=='gotch'){
		updatechal(data);
		return;
	}
	if(section=='sendresp'){
		confirmLogin(data);
		return;
	}
	localhandler(data, section);
}

$(document).ready(function(){
	//var vcat={0:"", 1:1, 2:"", 3:1, 4:'', 5:'' };
	var vcat={cols:['idcategoria', 'nome'], where:{"idparent":null}};
	richiesta("categoria", "sel", vcat, "cat");
	//var vnews={0:"", 1:1, 2:"", 3:1, 4:"", 5:1, 6:0, 7:5};
	var vnews={cols:['idnotizia', 'titolo'], where:{"LIMIT":5, "ORDER":"data DESC"}};
	richiesta("notizia", "sel", vnews, "news");
	$('.logout').click(function(){
		$.post("/logout.php", {u:$('#u').html()}, function(data){loggedout(data)}, 'json');
	});
	$('#login').click(function(e){
		e.preventDefault();
		$('body').append("<div id='lightbox'><div><h4 class='form'>Utente</h4><input type='text' class='text' id=user /><br><h4 class='form'>Password</h4><input type='password' class='text' id=pwd /></div><div class='center'><input type='button' class='submit' id='loginbtn' value='Login' /><input type=hidden id=chal /></div><div class='center'><a href=# id=closelb >Chiudi</a></div></div></div>").append("<div id='lightbox-overlay'></div>");
		lightboxWidth=Math.round($('#lightbox').width());
		lightboxHeight=Math.round($('#lightbox').height());
		lightboxLeftMargin=Math.round(($(window).width()-lightboxWidth)/2);
		lightboxTopMargin=Math.round(($(window).height()-lightboxHeight)/2);
		$('#lightbox').css('margin-left', lightboxLeftMargin);
		$('#lightbox').css('margin-top', lightboxTopMargin);
		$('#lightbox-overlay, #lightbox').fadeIn(300);
		$('#user').focus();
		var v={};
		richiesta("auth", "start", v, "gotch");
	});
	$('body').on('click', '#lightbox-overlay, #closelb', function(){
		closelightbox();
	});
	$('body').on('click', '#loginbtn', function(){
		var chal={'u':$('#user').val(), 'ch':$.sha256($('#user').val()+":"+$.sha256($('#pwd').val())+":"+$('#chal').val())};
		richiesta("auth", "req", chal, "sendresp");
	});
	$('body').on('keypress', '#pwd', function(e){
		if(e.which==13)
		{
			e.preventDefault();
			var chal={'u':$('#user').val(), 'ch':$.sha256($('#user').val()+":"+$.sha256($('#pwd').val())+":"+$('#chal').val())};
			richiesta("auth", "req", chal, "sendresp");
		}
	});
	$.cookieBar({
		fixed:true,
		element:'body',
		autoEnable:false,
		zindex:1000
	});
});

function loggedout(data){
	if(data.succ){
		//alert("call loggedout");
		$('body').append("<div id='lightbox' class='toast'> Logout effettuato con successo </div>").append("<div id='lightbox-overlay-toast'></div>");
		//alert("done append");
		toastWidth=$('#lightbox').width();
		toastHeight=$('#lightbox').height();
		leftMargin=Math.round(($(window).width()-toastWidth)/2);
		topMargin=Math.round(($(window).height()-toastHeight)/2);
		$('#lightbox.toast').css("margin-left", leftMargin);
		$('#lightbox.toast').css("margin-top", topMargin);
		$('#lightbox, #lightbox-overlay-toast').fadeIn(300).delay(3000).fadeOut(300, function(){
			location.reload();
		});
		//alert("done remove");
		//location.reload();
		//alert("done reload");
	}
	else{
		//TODO: lb con errore
	}
}


function visualizzacat(data){
	var str="";
	if(data.succ==true){
		str+="<ul class='linklist' >\n";
		for(i=0; i<data.numrows; ++i){
			str+="\t<li><a href='prodotti.php?idcategoria="+data.sel[i].idcategoria+"' >"+data.sel[i].nome+"</a></li>\n";
		}
		str+="</ul>\n";
	}
	else{
		str=data.err;
	}
	$("#prod").html(str);
}
function visualizzanews(data){
	var str="";
	if(data.succ==true)
	{
		str+="<ul class='linklist' >\n";
		for(i=0; i<data.numrows; ++i)
		{
			str+="\t<li><a href='notizia.php?idnotizia="+data.sel[i].idnotizia+"' >"+data.sel[i].titolo+"</a></li>\n";
		}
		str+="</ul>\n"; 
	}
	else
	{
		str=data.err;
	}
	$("#news").html(str);
}

function updatechal(data)
{
	if(data.inserted>0)
	{
		$('#chal').val(data.chal);
	}
}

function confirmLogin(data)
{
	if( !data.err || data.err.length == 0 )
	{
		if(data.done)
		{
			location.reload();
		}
	}
	else
	{
		$('#lightbox .error').remove();
		$('#lightbox').append("<div class=error > Errore: "+data.err+"</div>");
	}
}	

