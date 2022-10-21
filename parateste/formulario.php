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
	 
	 <title>registro || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/form.css" />
	 
	 </head>
	 
	 <body>
		<h1>faça seu registro</h1>
		<form class="form" method="post" action="function/coleta.php">
			<label for="nome">nome</label>
			<input type="text" id="nome" name="nome" required />
			<label for="sobrenome">sobrenome</label>
			<input type="text" id="sobrenome" name="sobrenome" required />
			<label for="email">email</label>
			<input type="email" id="email"  name="email" required />
			<label for="senha">senha</label>
			<input type="password" id="senha" name="senha"  required />
			<label for="repita">repita a senha</label>
			<input type="password" id="repita" name="repita"  required />
			<input type="submit" value="enviar" />
		
		
		
		</form>
		tem uma conta? click 
			<a href="login.php">login</a> <?php if (!empty($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']);} ?>
	
	 
	 </body>





</html>