<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>DocGen - Nuovo Documento</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"></link>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script type=text/javascript >
			var get_value="<?php echo $_GET['id'] ?>";
		</script>
		<script src="newdoc.js" type="text/javascript"></script>
	</head>
	<body>
		<h2>Generazione nuovo documento</h2>
		<br>
		<a href=index.php >Indietro</a>
		<br>
		<?php
		extract($_GET);
		$dbhost='localhost';
		$dbname='docgen';
	    $m=new Mongo("mongodb://$dbhost");
		$db=$m->$dbname;
		$ct=$db->templates;
		$t=$ct->findOne(array('_id'=>new MongoId($id)));
		foreach($t['campi'] as $campo)
		{
			echo "<h4 class='form' >$campo:</h4><input type=text id=$campo name=$campo class=campo autocomplete='on'/>\n";
		}
		echo "<br><br><br><input type=button id=genera value=Genera />"
		?>
	</body>
</html>