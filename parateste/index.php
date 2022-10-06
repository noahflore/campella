<?php session_start();

	$login=$_SESSION['login'];
	
	if ($login=="on"){
		
		header("location: userdefault.php");
		
	}



 ?>


<!docktype html>

<html>

	 <head>
	 
	 <title>Campella</title>
	 <meta charset="utf-8" />
	 
	 </head>
	 
	 <body>
	 
		<h1>campella-teste</h1><br>
		groups AA
		<p>seja bem-vindo(a) a rede social campella, aqui você pode fazer amigos, fletar, jogar<br>
		minigames em groupos ou sozinho. temos novidades para as primeiras pessoas se registra</p>
		<div>
			<a href="formulario.php">registra</a>
			<a href="login.php">login</a>

	
		</div>
	 
	 </body>





</html>