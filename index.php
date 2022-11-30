<?php session_start();

	if (!empty($_SESSION['login'])){
	$login=$_SESSION['login'];
	
	if ($login=="on"){
		
		header("location: userdefault.php");
		
	}

}

 ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>kampella</title>
	 <meta charset="utf-8" />
	 <meta name="author" content="giovanne" />
	 <meta name="description" content="procura uma rede social nova e com uma nova maneira de socializa? ou apenas um passa-tempo em um lugar diferente? aqui Ž o lugar" />
     <meta name="robots" content="index,follow" />
	 <meta name="keywords" content="rede,social,amigos,jogos,bate papo,chat,depoimentos,recados,comunidades,fotos,gif,fake" />
	<link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	<link rel="stylesheet" href="defaultstyle/apresentacao.css" />
	<link rel="icon" href="ico/logocampella.png" />
	 
	 </head>
	 
	 <body>
	 
		<h1>kampella</h1><br>
		groups AA
		<p>seja bem-vindo(a) a rede<wbr> social campella, aqui vocÃª pode fazer amigos, fletar, jogar<br>
		minigames em groupos ou sozinho. temos novidades para as primeiras pessoas se registra</p>
		<div>
			<a href="formulario.php">registra</a>
			<a href="login.php">login</a>
			<!-- o link parateste apenas para teste -->
	
		</div>
	 
		 
		 
		 
		 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos n—s</a> proximos passos </footer>
		 
		 
	 </body>





</html>