<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>DocGen - Nuovo Modello</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"></link>
		<link href="js/common/fileupload/jquery.fileupload.css" rel="stylesheet"></link>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="js/common/fileupload/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="js/common/fileupload/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="js/common/fileupload/jquery.fileupload.js" type="text/javascript"></script>
		<script src="newtemplate.js" type="text/javascript"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<link href="new_template.css" rel="stylesheet"></link>
	</head>
	<body>
		<h2>Inserimento nuovo modello</h2>
		<br>
		<a href=index.php >Indietro</a>
		<br>
		<h4 class='form'>Nome Modello:</h4>
		<input type=text id='nome' name='nome'>
		<h4 class='form'>File Modello:</h4>
				<span class="btn btn-success fileinput-button">
        			<i class="glyphicon glyphicon-plus"></i>
        			<span>Seleziona Modello</span>
        			<input type="file" id="filetemplate" name="upload" data-url="fileupload.php"/>
					<input type='hidden' id='filename'/>
				</span>
		<div><div id='parameters'></div><div id='titlesorter'></div></div><div><input type=button value='Conferma' id='conferma'/></div>
	</body>
</html>