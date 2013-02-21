<?php
	include('conexion.php');
	$uid = $redis->get('auth:'.$_COOKIE['auth']);
	$usuario = json_encode(array('uid' => $uid,  'usuario' => $redis->get('uid:'.$uid.':usuario')));
	echo '{ "content" : [ '.$usuario.']}';
?>