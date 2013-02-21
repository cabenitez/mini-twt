<?php
	include('conexion.php');
	$result = 0;
	if (isset($_COOKIE['auth'])) {
		$uid = $redis->get('auth:'.$_COOKIE['auth']);
		if ($_COOKIE['auth'] == $redis->get('uid:'.$uid.':auth'))
			$result = 1;
	}
	if ($result == 0)
		header("Location: index.php");
?>
