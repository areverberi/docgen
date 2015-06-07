<?php
	extract($_POST);
	$dbhost='localhost';
	$dbname='docgen';
    $m=new Mongo("mongodb://$dbhost");
	$db=$m->$dbname;
	$collectiond=$db->documents;
	$collection=$db->templates;
	$id_del=new MongoId($id);
	if($collectiond->count(array('template'=>array('id'=> $id_del)))==0)
	{
		$collection->remove(array('_id' => $id_del));
		echo json_encode(array("done"=>true));
	}
	else 
	{
		echo json_encode(array("done"=> false));
	}
	
?>