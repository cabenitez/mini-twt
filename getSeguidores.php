<?php
	include('conexion.php');
	$uid = $redis->get('auth:'.$_COOKIE['auth']);
	echo $redis->sCard('uid:'.$uid.':seguidores');
?>