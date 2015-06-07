<?php
	//TODO check for documents using template before removing
	extract($_POST);
	$dbhost='localhost';
	$dbname='docgen';
    $m=new Mongo("mongodb://$dbhost");
	$db=$m->$dbname;
	$collection=$db->documents;
	$id_del=new MongoId($id);
	$collection->remove(array('_id' => $id_del));
	echo json_encode(array("done"=>true));
?>