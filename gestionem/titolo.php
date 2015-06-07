<?php
	extract($_POST);
	$dbhost='localhost';
	$dbname='docgen';
    $m=new Mongo("mongodb://$dbhost");
	$db=$m->$dbname;
	$collection=$db->templates;
	$template=array(
	"file"=>$nome);
	$collection->update($template, array('$set'=>array('titolo'=>$titolo)));
	echo json_encode(array('done'=>true));
?>