<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/medoo.php');
	session_start();
	//$conn=new connessione();
	$conn=new medoo();
	//$res['err']="errore";
	//echo json_encode($res);
	//die();
	extract($_POST);
	$nomemet=$tipo.$tab;
	//$conn->connetti();
	//echo json_encode($vals);
	//$conn->call($nomemet, $vals);
	$res=null;
	//echo json_encode($tipo);
	//die();
	if($tipo=="sel")
	{
		//echo json_encode("is sel");
		//die();
		if(isset($vals['where']))
		{
			if(isset($vals['join']))
			{
				$res['sel']=$conn->select($tab, $vals['join'], $vals['cols'], $vals['where']);	
			}
			else 
			{
				$res['sel']=$conn->select($tab, $vals['cols'], $vals['where']);
			}
		}
		else 
		{
			if(isset($vals['join']))
			{
				$res['sel']=$conn->select($tab, $vals['join'], $vals['cols']);
			}
			else 
			{
				$res['sel']=$conn->select($tab, $vals['cols']);
			}	
		}
		$numrows=count($res['sel']);
		$res['numrows']=$numrows;
		$res['succ']=true;
	}
	if($tipo=="ins")
	{
		$res['lastid']=$conn->insert($tab, $vals['data']);
	}
	if($tipo=="upd")
	{
		$res['rowsaff']=$conn->update($tab, $vals['data'], $vals['where']);
	}
	if($tipo=="del")
	{
		$res['rowsaff']=$conn->delete($tab, $vals['where']);
	}
	echo json_encode($res);
?>