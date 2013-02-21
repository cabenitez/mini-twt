<?php
	include('conexion.php');

	if (isset($_POST['usuario'])) {
		$uid = $redis->get('auth:'.$_COOKIE['auth']);
		$redis->sadd('uid:'.$uid.':siguiendo',$_POST['usuario']);
		$redis->sadd('uid:'.$_POST['usuario'].':seguidores',$uid);
		echo 1;
	}
?>