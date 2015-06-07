<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>DocGen - Lista Modelli</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"></link>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="templatelist.js" type="text/javascript"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	</head>
	<body>
		<h2>Lista Modelli</h2>
		<br>
		<a href=index.php >Indietro</a>
		<br>
		<?php
			$dbhost='localhost';
			$dbname='docgen';
		    $m=new Mongo("mongodb://$dbhost");
			$db=$m->$dbname;
			$collection=$db->templates;
			$templates=$collection->find();
			foreach ($templates as $t)
			{
				echo "<div>{$t['nome']}           <a href=newdoc.php?id={$t['_id']} >Nuovo documento</a>     <a class='ellink' idt='{$t['_id']}'>Elimina modello </a></div>\n";
			}
		?>
	</body>
</html>