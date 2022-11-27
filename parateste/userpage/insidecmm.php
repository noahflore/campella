<?php session_start(); 

	$meuid=$_SESSION['id'];

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}
	
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../login.php");
		
	}



?>
<!doctype html>

<html>

	<head>
		<title>cmm_do_user || campella</title>
		<link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
		<link rel="stylesheet" href="../defaultstyle/corpodacmm.css" />
	
	
	</head>
	
	<body>
		
		<header	class="cabeça">
		
			<img src="../ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><a href="../principaldefault.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
			<section class='grupo'>
				<section>
						<?php
							$id= $_SESSION['id'];
							$idcm= $_GET['nomecmm'];
							
							if (file_exists("../other/var/". $id ."/". $idcm ."/fotocmm.png")){
								
							echo  "<img id='foto' src='../other/var/". $id ."/". $idcm ."/fotocmm.png' />";
							
							
							}else{
								echo  "<img id='foto' src='../ico/fotocmm.png' />";
								
							}
						
						
						
						
						?>
						<ul>
						<?php
							
								
									
								echo "<li><a href='usercmm/criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
									
								
								
								
								echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."'>mostra meus topicos</a></li>";
							
							
							
							?>
						
						<li>enquetes</li>
						<li>configuração</li>
						</ul>
				</section>
				<div class='corpo'>
					<?php
					
						if (file_exists('../other/var/'. $id. '/'. $idcm .'/desc.txt')){
							$abrir=fopen('../other/var/'. $id. '/'. $idcm .'/desc.txt','r+');
							while(!feof($abrir)){
								$ler=fgets ($abrir);
								echo $ler;
								
								
							}
							fclose($abrir);
							
							
						}
					
					
					
					
					?>
				
				
				</div>
			</section>
		
		</body>



</html>