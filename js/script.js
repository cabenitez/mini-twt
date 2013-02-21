$(document).ready(function(){
	// login
	$(document).on('click', '#log_btn', function(){
		login();
	});
	// set usuario
	$(document).on('click', '#reg_btn', function(){
		setUsuario();
	});
	// get info usuario
	if ($('#usuario').size()) {
		getUsuario();
		getTweetsUsuario();
		getSeguidores();
		getSiguiendo();
		getUsuarios();
		getTweets('default');
	};
	// seguir a
	$(document).on('click', '.usuarios', function(e){
		e.preventDefault();
		seguir($(this));
	});	
	// twtear
	$(document).on('click', '#post_btn', function(){
		setTweet();
	});	
	// timeline de Usuario
	$(document).on('click', '.usuarioTl', function(e){
		e.preventDefault();
		getTweets($(this).attr('uid'));
	});
});
function login() {
	if ($('#log_usuario').val() != '' && $('#log_clave').val() != '') {
		$.post("login.php","usuario="+$('#log_usuario').val()+"&clave="+$('#log_clave').val(),
			function(data){
				if (data == 1)
					window.location = "home.php";
				else
					$('#log_result').html('Usuario o clave incorrectos');
			}
		);
	}
}
function setUsuario() {
	if ($('#reg_usuario').val() != '' && $('#reg_clave').val() != '') {
		$.post("registro.php","usuario="+$('#reg_usuario').val()+"&clave="+$('#reg_clave').val(),
			function(data){
				if (data == 1)
					window.location = "home.php";
				else
					$('#reg_result').html(msg);
			}
		);
	}
}
function getUsuario() {
	$.post("getUsuario.php",'',
		function(data){
			var id,usuario;
			var items = eval('(' + data + ')');
			for (var i in items) {
				for (var j in items[i]) {
					uid 	= items[i][j]['uid'];
					usuario = items[i][j]['usuario'];
					$('#usuario').append('<a class="usuarioTl" uid="'+uid+'" href="#">'+usuario+'</a>');
				}
			}
		}
	);
}
function getSeguidores(){
	$.post("getSeguidores.php",'',
		function(data){
			$('#seguidores').html(data>1?data+' SEGUIDORES':data+' SEGUIDOR');
		}
	);
}
function getSiguiendo(){
	$.post("getSiguiendo.php",'',
		function(data){
			$('#siguiendo').html(data+' SIGUIENDO');
		}
	);
}
function getTweetsUsuario(){
	$.post("getTweetsUsuario.php",'',
		function(data){
			$('#tweets').html(data+' TWEETS');
		}
	);
}
function seguir(element) {
	$.post("seguir.php","usuario="+element.attr('uid'),
		function(){
			getSiguiendo();		
		});
	element.remove();
}
function getUsuarios(){
	$.post("getUsuarios.php",'',
		function(data){
			var id,usuario;
			var items = eval('(' + data + ')');
			for (var i in items) {
				for (var j in items[i]) {
					uid 	= items[i][j]['uid'];
					usuario = items[i][j]['usuario'];
					$('#usuarios').append('<a class="usuarios" uid="'+uid+'" href="#">'+usuario+'</a>');
				}
			}
		}
	);
}

function setTweet(){
	$.post("setTweet.php","post="+$('#post').val(),
		function(data){
			$('#post').val('');
			getTweets('');
			getTweetsUsuario();
		});
}
function getTweets(lista){
	if (lista != '' && lista != 'default')
		$('#timeline').html('');
	$.post("getTweets.php",'lista='+lista,
		function(data){
			var id,usuario;
			var items = eval('(' + data + ')');
			for (var i in items) {
				for (var j in items[i]) {
					uid 	= items[i][j]['uid'];
					usuario = items[i][j]['usuario'];
					post 	= items[i][j]['post'];
					hora 	= items[i][j]['hora'];
					html 	= '<div class="post"><a class="usuarioTl" uid="'+uid+'" href="#">'+usuario+'</a> - <span>Hace '+hora+'</span> <p>'+post+'</p></div>';
					if (lista != '')
						$('#timeline').append(html);
					else
						$('#timeline').prepend(html);
				}
			}
		}
	);
}