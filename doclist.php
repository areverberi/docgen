<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>DocGen - Lista Documenti</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"></link>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="doclist.js" type="text/javascript"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	</head>
	<body>
		<h2>Lista Documenti</h2>
		<br>
		<a href=index.php >Indietro</a>
		<br>
		<?php
			$dbhost='localhost';
			$dbname='docgen';
		    $m=new Mongo("mongodb://$dbhost");
			$db=$m->$dbname;
			$collection=$db->documents;
			$documents=$collection->find();
			foreach ($documents as $d)
			{
				$titolo=$d['template']['nome'];
				foreach($d['template']['titolo'] as $itemtitolok=>$itemtitolov)
				{
					$titolo.=" {$d['campi'][$itemtitolov]}";
				}
				echo "<div>$titolo           <a idd={$d['_id']} class='genlink'>Rigenera documento</a>     <a class='ellink' idd='{$d['_id']}'>Elimina documento </a></div>\n";
			}
		?>
	</body>
</html>