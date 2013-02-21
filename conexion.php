<?php
	define('HOST','127.0.0.1');
	define('PUERTO',6379);
	define('BD',0);
	try{
		// instanciamos Redis
		$redis = new Redis();
		// nos conectamos al servidor
		$redis->connect(HOST, PUERTO);
		// seleccionamos la base de datos
		$redis->select(BD);
	}catch(Exception $e){
		die('ERROR '.$e->getCode().': '.$e->getMessage());
	}
?>
