<?php
	require_once('vendor/autoload.php');
	use PhpOffice\PhpWord\Settings;
	$dbhost='localhost';
	$dbname='docgen';
	$res;
	if(isset($_FILES['upload']))
	{
		//$res['recv']="recv";
		//$res['tn']=$_FILES['upload']['tmp_name'];
		$file=tempnam('template/', 'template_');
		$res['done']=move_uploaded_file($_FILES['upload']['tmp_name'], $file);
		if($res['done'])
		{
			$val['nome']=basename($file);
			$PHPWord = new \PhpOffice\PhpWord\PhpWord();
			$document=$PHPWord->loadTemplate('template/'.$val['nome']);
			$res['variables']=$document->getVariables();
			$res['n']=$val['nome'];
			$m=new Mongo("mongodb://$dbhost");
			$db=$m->$dbname;
			$collection=$db->templates;
			$template=array(
			"file"=>$val['nome'], 
			"nome"=>$_POST['nome'],
			"campi"=>$res['variables']);
			$collection->save($template);
			//$res['template']=$collection->findOne($template);
		}
	}
	echo json_encode($res);
?>
