<?php session_start();

	if (!empty($_SESSION['login'])){
	$login=$_SESSION['login'];
	
	if ($login=="on"){
		
		header("location: userdefault.php");
		
	}

}

 ?>
<!docktype html>

<html lang="PT-BR">

	 <head>
	 
	 <title>kampella</title>
	 <meta charset="utf-8" />
	<link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	<link rel="stylesheet" href="defaultstyle/apresentacao.css" />
	 
	 </head>
	 
	 <body>
	 
		<h1>kampella</h1><br>
		groups AA
		<p>seja bem-vindo(a) a rede<wbr> social campella, aqui vocÃª pode fazer amigos, fletar, jogar<br>
		minigames em groupos ou sozinho. temos novidades para as primeiras pessoas se registra</p>
		<div>
			<a href="formulario.html">registra</a>
			<a href="login.html">login</a>
			<!-- o link parateste apenas para teste -->
	
		</div>
	 
		 
		 
		 
		 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos nós</a> proximos passos </footer>
		 
		 
	 </body>





</html>