<?php
	include('conexion.php');
	$result = 0;
	$uid = $redis->get('usuario:'.$_POST['usuario'].':uid');
	if ($uid) {
		$clave = $redis->get('uid:'.$uid.':clave');
		if ($clave == md5($_POST['clave'])){
			setcookie("auth",$redis->get('uid:'.$uid.':auth'),time()+3600*24*365);
			$result = 1;
		}	
	}
	echo $result;
?>
