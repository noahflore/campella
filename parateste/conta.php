<?php session_start(); require_once "compactar.php";
					   require_once "function/objeto/Usuario.php";
					   require_once "function/conexao.php";
	

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (!empty($_GET["robots"])){
		$robots=$_GET['robots'];
		$nome="para";
		$sobrenome="bellas";
		$id=0;
		$login="on";
		
		
	}

	if (empty($_GET["robots"])){
	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}

	if (!empty($_SESSION['idfriend'])){ unlink("other/". $_SESSION['idfriend'] ."/true"); unset($_SESSION['idfriend']);}

	if (!file_exists("other/". $_SESSION['id'] ."/true")){compacta($_SESSION['id']); if (file_exists("other/". $_SESSION['id'] ."/open")){unlink("other/". $_SESSION['id'] ."/open");}}

	}
?>
<!doctype html>

<html>

	 <head>
	 
	<?php echo "<title>conta d ". $_SESSION['nome'] ." || kampella</title>"; ?>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/bloco.css" />
	 <link rel="icon" href="ico/logoico.png" />
		 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" />
			<nav id="cabecuda"> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><span id="lista"><input type='button' onclick="config(2)" id="config" value='configuração' /></span></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair()">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		 
		 <div style="margin-left:200px;margin-top:90px;">
			 
			<?php
			 	$nome=$_SESSION['nome'];
			 	$sobrenome=$_SESSION['sobrenome'];
			 	$id=$_SESSION['id'];
			 
			 
			 	$user= new Usuario($nome,$sobrenome,$id,$cone);
			 
			 
			 ?>
			 
			 <form method="post" action="conta.php?true=1"><!-- em desenvolvimento -->
			
				 <fieldset><legend>muda sua senha</legend>
			nova senha:	 <input type="password" name="senha" /><br>
			pin: <input type="text" name="pin" /><br>
				 <input type="submit" value="enviar!" />
				 
					 
				 </fieldset>
			 </form>
			 
			 <form method="post" action="conta.php?true=2">
				 
				 
				 
				 
				 
			 </form>
			 
		 </div>
		 
		 
		 <script src="js/scriptbasico.js"></script>
	</body>
	
	
</html>