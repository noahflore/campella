<?php session_start(); 

		if (!empty($_SESSION['login'])){
			
			$login=$_SESSION['login'];
	
		if ($login=="on"){
		
		header("location: userdefault.php");
		
		}

}

if (file_exists("user.txt")){
        
        $abrir=fopen("user.txt","r+");
        $ler=fgets($abrir);
        $ler++;
        fclose($abrir);
        $abrir=fopen("user.txt","w+");
        fwrite($abrir,$ler);
        fclose($abrir);
        
        
    }else{
        
        copy("other/exemplo/exemplo.txt","user.txt");
        $abrir=fopen("user.txt","w+");
        fwrite($abrir,1);
        fclose($abrir);
        
    }


?>
<!docktype html>

<html>

	 <head>
	 
	 <title>login || campella</title>
	 <meta charset="utf-8" />
	 <meta name="author" content="giovanne" />
	 <meta name="description" content="procura uma rede social nova e com uma nova maneira de socializa? ou apenas um passa-tempo em um lugar diferente? aqui é o lugar" />
	 <meta name="robots" content="index,follow" />
	 <meta name="keywords" content="rede,social,amigos,jogos,bate papo,chat,depoimentos,recados,comunidades,fotos,gif,fake" />
	 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/form.css" />
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
		<form class="form" method="post" action="function/valida.php">
			<label for="login">login</label>
			<input type="email" id="login" name="email" />
			<label for="senha">senha</label>
			<input type="password" id="senha" name="senha" />
			<input type="submit" value="login">
		
		
		</form>
		 <span id="baixo">ainda não tem uma conta? click<a href="formulario.php">registra</a></span>
		<?php if (isset($_SESSION['errologin'])){ echo $_SESSION['errologin']; unset($_SESSION['errologin']);} ?>
	
	 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos nós</a> proximos passos </footer>
		 
	 </body>





</html>