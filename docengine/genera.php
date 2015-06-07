<?php
	require_once '../vendor/autoload.php';
	use PhpOffice\PhpWord\Settings;
	$PHPWord = new \PhpOffice\PhpWord\PhpWord();
	extract($_POST);
	$dbhost='localhost';
	$dbname='docgen';
    $m=new Mongo("mongodb://$dbhost");
	$db=$m->$dbname;
	$cd=$db->documents;
	$docfields=$cd->findOne(array('_id'=>new MongoId($document)));
	$documentgen=$PHPWord->loadTemplate('../template/'.$docfields['template']['file']);
	foreach($docfields['campi'] as $key=>$val)
	{
		$documentgen->setValue($key, $val);
	}
	$tempfile=tempnam(sys_get_temp_dir(), 'docgen');
	$documentgen->saveAs($tempfile);
	header('Content-Description: File Transfer');
	header('Content-Type: application/msword');
	$headerstring='Content-Disposition: attachment; filename="'.$docfields['template']['nome'];
	foreach($docfields['template']['titolo'] as $tk=>$tv)
	{
		$headerstring.=' '.$docfields['campi'][$tv];
	}
	$headerstring.='.docx"';
	header($headerstring);
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($tempfile));
	readfile($tempfile);
	unlink($tempfile);
?>