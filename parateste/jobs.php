<?php session_start(); require_once "compactar.php";
					   require_once "function/afiliado.php";
	

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
	 
	 <title>jobs || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
	 
	
	 
	 </body>
		<header class="cabeça">
			
				<img src="ico/logobanner.png" alt="logo do site" />
				<nav> 
					<ul>
						<?php echo "<li onclick='usuario(1)'><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
						<!-- o de cima é nome do usuario-->
						<li><a href="principaldefault.php">principal</a></li>
						<li>configuração</li>
						<li><s>camp</s></li>
						<li>feed back</li>
						<li><a href="sair">sair</a></li>
					
					
					</ul>

				</nav>
			
			
		</header>
			<div>
				<h1> faça tarefas e ganhar camp</h1>
				<div>
					<h2> listas</h2>
						<ul>
							<li>personaliza o estilo!</li>
							<li><s>validação</s></li>
							<li>monitor</li>
							<!-- o de cima vai analisa denuncia e tals-->
						<?php /*	echo "<li><a href='function/gera.php?id=$id'>convida um amigo/a</a></li>"; */?>
							<li><a href="sell.php">vendas de produtos</a></li>
						
						
						</ul>
					
				</div>
			
			
			</div>




</html>