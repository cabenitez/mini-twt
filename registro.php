<?php
	include('conexion.php');
	$result = 0;
	$uid  =  $redis->incr('global:proximoUid');
	$auth = md5($_POST['usuario'].$_POST['clave']);

	$redis->set('usuario:'.$_POST['usuario'].':uid', $uid);
	$redis->set('uid:'.$uid.':usuario', $_POST['usuario']);
	$redis->set('uid:'.$uid.':clave', md5($_POST['clave']));
	
	$redis->set('uid:'.$uid.':auth', $auth);
	$redis->sadd('usuarios',$uid);
	if ($redis->set('auth:'.$auth,$uid)) {
		setcookie("auth",$auth,time()+3600*24*365);
		$result = 1;
	}
	echo $result;
?>