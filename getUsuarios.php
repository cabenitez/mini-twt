<?php
	include('conexion.php');
	$result = 0;
	$uid    =  $redis->get('auth:'.$_COOKIE['auth']);
	$uids   =  $redis->sDiff('usuarios', 'uid:'.$uid.':siguiendo');
	foreach ($uids as $id){
		if ($uid != $id)
			$usuario .= json_encode(array('uid' => $id,  'usuario' => $redis->get('uid:'.$id.':usuario'))).',';
	}
	echo '{ "content" : [ '.substr ($usuario, 0, -1).']}';
?>