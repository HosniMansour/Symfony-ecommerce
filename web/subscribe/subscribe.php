<?php
	require_once 'MCAPI.class.php';
	$api = new MCAPI('0a938164ba611b7d6c9bac835b705c80-us1');
	$merge_vars = array('FNAME'=>"Medo", 'LNAME'=>"medddor");

	$retval = $api->listSubscribe( '84f5f2a055', $_POST["emailchamp"], $merge_vars, 'html', false, true );

	if ($api->errorCode){
		echo "{'sucess':0}";
	} else {
		echo "{'sucess':1}";
	}
?>

