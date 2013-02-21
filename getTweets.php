<?php
	include('conexion.php');
	$uid    = $redis->get('auth:'.$_COOKIE['auth']);
	$lista 	= $_POST['lista'];
	$cant   = 10;
	if ($_POST['lista'] == '') {
		$clave = 'uid:'.$uid.':posts';
		$cant = 0;
	}elseif($lista == 'default') {
		$clave = 'global:timeline';
	}else{
		$clave = 'uid:'.$lista.':posts';
	}
	$posts 	= $redis->lRange($clave,0,$cant);
	foreach($posts as $pid) {
		$aux	 = explode("|", $redis->get('post:'.$pid));
		$id 	 = $aux[0];
		$hora	 = horaConFormato($aux[1]);
		$post 	 = html_entity_decode($aux[2]);
		$usuario = $redis->get('uid:'.$id.':usuario');  
		$timeline .= json_encode(array('uid'=>$id, 'usuario'=>$usuario, 'post'=>$post, 'hora'=>$hora)).',';
	}
	echo '{ "content" : [ '.substr ($timeline, 0, -1).']}';
	function horaConFormato($hora) {
		$d = time() - $hora;
		if ($d < 60) return "$d segundos";
		if ($d < 3600) {
			$m = (int)($d/60);
			return "$m minuto".($m > 1 ? "s" : "");
		}
		if ($d < 3600*24) {
			$h = (int)($d/3600);
			return "$h hora".($h > 1 ? "s" : "");
		}
		$d = (int)($d/(3600*24));
			return "$d dia".($d > 1 ? "s" : "");
	}
?>