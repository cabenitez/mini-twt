<?php
	include('getLogin.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mini-twt</title>
		<link type="text/css" href="css/style.css" rel="stylesheet" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<header>
			<h1><a class="titulo" href="home.php">Mini-twt</a></h1>
			<a class="salir" href="salir.php">Salir</a>
		</header>
		<div class="wrapper">
			<section class="info">
				<h2 id="usuario"></h2>
				<p id="tweets"></p>
				<p id="seguidores"></p>
				<p id="siguiendo"></p>
				<h3>Podes seguir a:</h3>
				<div id="usuarios"></div>
			</section>
			<section class="home">
				<article>
					<form id="post_form" action="">
						<textarea id="post" placeholder="Contale al mundo..."></textarea>
						<input type="button" id="post_btn" value="twtear" />
					</form>
					<div id="timeline"></div>
				</article>
			</section>
		</div>
		<footer>
		</footer>
	</body>
</html>