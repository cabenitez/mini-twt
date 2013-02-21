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
			<h1><a class="titulo" href="index.php">Mini-twt</a></h1>
		</header> 
		<section class="wrapper">
			<article>
				<div id="login">
					<h2>Ingresar:</h2>
					<div class="result" id="log_result"></div>
					<form id="log_form" action="">
						<input type="text" id="log_usuario" placeholder="Usuario"/>
						<input type="text" id="log_clave" placeholder="Clave"/>
						<input type="button" id="log_btn" value="Ingresar" />
					</form>
				</div>
				<div id="registro">
					<h2>Registrarse:</h2>
					<div class="result" id="reg_result"></div>
					<form id="reg_form" action="">
						<input type="text" id="reg_usuario" placeholder="Usuario"/>
						<input type="text" id="reg_clave" placeholder="Clave"/>
						<input type="button" id="reg_btn" value="Registrarse" />
					</form>
				</div>
			</article>
		</section>
		<footer>
		</footer>
	</body>
</html>