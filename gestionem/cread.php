<?php
	//TODO check for documents using template before removing
	extract($_POST);
	$dbhost='localhost';
	$dbname='docgen';
    $m=new Mongo("mongodb://$dbhost");
	$db=$m->$dbname;
	$ct=$db->templates;
	$id_t=new MongoId($template);
	$t=$ct->findOne(array('_id' => $id_t));
	$cd=$db->documents;
	$doc=array('template'=>$t, 'campi'=>$documento);
	$ret=$cd->save($doc);
	echo json_encode(array("done"=>true, "id"=>(string)$doc['_id'], "titolo"=>$doc['template']['titolo']));
?>