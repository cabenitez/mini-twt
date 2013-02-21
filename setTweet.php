<?php
	include('conexion.php');
	$uid = $redis->get('auth:'.$_COOKIE['auth']);
	$pid = $redis->incr("global:proximoPid");
	
	$post = $uid."|".time()."|".htmlentities($_POST['post']);
	$redis->set('post:'.$pid, $post);
	$redis->incr('uid:'.$uid.':nposts');

	$seguidores = $redis->sMembers("uid:".$uid.":seguidores");
	$seguidores[] = $uid;
	foreach($seguidores as $sid)
		$redis->lpush('uid:'.$sid.':posts',$pid);
	$redis->lpush("global:timeline",$pid);
	$redis->ltrim("global:timeline",0,20);
?>