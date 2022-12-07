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
	 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	<link rel="stylesheet" href="defaultstyle/apresentacao.css" />
	<link rel="icon" href="ico/logocampella.png" />
	 
		 <style>
			 footer{
	position:fixed;
	bottom:0%;
	background-color: #2D3842;
	display:flex;
	justify-content: space-between;
    width: 100%;
	height: 40px;
	
	
	
}



@media(max-width:980px){
	
	
	
	footer{
		
		
		top:0%;
		
		
	}
	
	footer b{
		
		font-size:10px;
		
	}
	
	footer a{
		
		font-size:10px;
		
	}
	
	p{
		
		font-size: 40px;	
		
		
		
		
		
	}
	
	div{
		
		font-size: 40px;	
		
		
	}
	
	#baixo{
		
		position:fixed;
		bottom:10%;
		
		
	}
			 
			 
			 
			 
		 </style>
		 
		 
	 </head>
	 
	 <body>
	 
		<h1>kampella</h1><br>
		groups AA
		<p>seja bem-vindo(a) a rede<wbr> social campella, aqui vocÃª pode fazer amigos, fletar, jogar<br>
		minigames em groupos ou sozinho. temos novidades para as primeiras pessoas se registra</p>
		<div>
		<span id="baixo"><a href="formulario.php">registra</a>
			<a href="login.php">login</a></span>
			<!-- o link parateste apenas para teste -->
	
		</div>
	 
		 
		 
		 
		 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos n—s</a> proximos passos </footer>
		 
		 
	 </body>





</html>