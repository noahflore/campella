<?php session_start(); ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>login || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/form.css">
	 
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
	
	 
	 </body>





</html>