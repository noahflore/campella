<?php session_start(); 

	if (!empty($_SESSION['login'])){
	$login=$_SESSION['login'];
	
	if ($login=="on"){
		
		header("location: userdefault.php");
		
	}

}




?>


<!doctype html>

<html>

	 <head>
	 
	 <title>registro || kampella</title>
	 <meta charset="utf-8" />
	 <meta name="author" content="giovanne" />
	 <meta name="description" content="procura uma rede social alternativa ao orkut ,anônimo,chat online? ou apenas fazer amizades em um lugar diferente? vem para kampella aqui você vai encontra pessoas divertidas ,engraçadas ,paquera e até encontra um love; compartilhar com seus familiares essa nova rede social" />
	 <meta name="robots" content="index,follow" />
	 <meta name="keywords" content="chat,anÔnimo,rede,social,amigos,jogos,bate papo,chat,depoimentos,recados,comunidades,fotos,gif,fake,anonimo,agradavel,saudavel,fletar,amizade,passa tempo,novidade,novo,divertido,site,dating,email" />
	 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/form.css" />
	 <link rel="stylesheet" href="defaultstyle/apresentacao.css" />
 	 <link rel="icon" href="ico/logoico.png" />
	 
	 
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
		 
		 <?php
		 
		 if (file_exists("other/1/manu/1")){
			 
			 
			 echo "o site está em mmanuteção voltei mais tarde";
			 
			 
			 
		 }else{
		 
 	echo"		<h1>faça seu registro</h1>
		<form class='form' method='post' action='function/coleta.php'>
			<label for='nome'>nome</label>
			<input type='text' id='nome' name='nome' required />
			<label for='sobrenome'>sobrenome</label>
			<input type='text' id='sobrenome' name='sobrenome' required />
			<label for='email'>email</label>
			<input type='email' id='email'  name='email' required />
			<label for='senha'>senha</label>
			<input type='password' id='senha' name='senha'  required />
			<label for='repita'>repita a senha</label>
			<input type='password' id='repita' name='repita'  required /><br>
coloca sua chave: <input type='text' name='chave' placeholder='esse campo é opcional' />
			<input type='submit' value='enviar' />
		
		
		
		</form>
		<span id='baixo'>	tem uma conta? click 
			<a href='login.php'>login</a></span>";  if (!empty($_SESSION['msg'])){ echo "<span style='color:white;background-color:red'>". $_SESSION['msg'] ."</span>"; unset($_SESSION['msg']);}} ?>
		 
	
	 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos nós</a> proximos passos </footer>
		 
	 </body>





</html>