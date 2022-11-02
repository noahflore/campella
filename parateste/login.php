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
	 
	 <title>login || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/form.css">
	 <link rel="stylesheet" href="defaultstyle/apresentacao.css" />
	<link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	
	 </head>
	 
	 <body>
		<form class="form" method="post" action="function/valida.php">
			<label for="login">login</label>
			<input type="email" id="login" name="email" />
			<label for="senha">senha</label>
			<input type="password" id="senha" name="senha" />
			<input type="submit" value="login">
		
		
		</form>
		ainda não tem uma conta? click<a href="formulario.php">registra</a>
		<?php if (isset($_SESSION['errologin'])){ echo $_SESSION['errologin']; unset($_SESSION['errologin']);} ?>
	
	 <footer><div><b>&copy; todos os direitos reservados</b></div>
			 <a href="sobre.html">sobre kampella</a>  <a href="whoiam.html">quem somos nůs</a> proximos passos </footer>
		 
	 </body>





</html>