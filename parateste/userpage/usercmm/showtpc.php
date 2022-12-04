<?php
session_start();

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("../../other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("../../other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("../../other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../../login.php");
		
	}


?>

<!doctype html>

	<html>

		<head>
		<?php
			$idcm=$_GET['idcmm'];
							
								if (!empty($_GET['id'])){
									
									$id=$_GET['id'];	
									
								}else{
									
									$id=$_SESSION['id'];	
									
									
								}
				$nome=$_SESSION['nome'];
			
			
			
			
		echo "	<title>". $idcm ." d ". $nome ." || campella</title>";
				
				
				?>
			<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
			<link rel="stylesheet" href="../../defaultstyle/corpodacmm.css" />
			<link rel="icon" href="../../ico/logocampella.png" />
		
		
		</head>
		
		<body>
			
			<header	class="cabeça">
			
				<img src="../../ico/logocampella.png" alt="logo do site" />
				<nav> 
					<ul>
						<?php echo "<li onclick='usuario(1)'><a href='../../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
						<!-- o de cima é nome do usuario-->
						<li><a href="../../principaldefault.php">principal</a></li>
						<li>configuração</li>
						<li><s>camp</s></li>
						<li>feed back</li>
						<li><button onclick="sair()">deslongar</button></li>
					
					
					</ul>

				</nav>
			
			
			</header>
			
			<section class="grupo">
						<span class="coluna">
							<?php
								$idcm=$_GET['idcmm'];
							
								if (!empty($_GET['id'])){
									
									$id=$_GET['id'];	
									
								}else{
									
									$id=$_SESSION['id'];	
									
									
								}
								
								if (file_exists("../../other/var/". $id ."/". $idcm ."/fotocmm.png")){
									
								echo  "<img id='foto' src='../../other/var/". $id ."/". $idcm ."/fotocmm.png' />";
								
								
								}else{
									echo  "<img id='foto' src='../../ico/fotocmm.png' />";
									
								}
							
							
							
							
							?>
							<ul>
							<?php
								echo "<li><a href='criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
								
								?>
								<?php
								
								echo "<li><a href='../insidecmm.php?nomecmm=". $idcm ."' >inicio</a></li>";
								
								
								?>
							<li>enquetes</li>
							<li>configuração</li>
							</ul>
						</span>
					<section>
			<?php
				
				
				if (!empty($_GET['idcmm'])){
					
					$idcmm=$_GET['idcmm'];
					
						if (file_exists("../../other/var/". $id ."/". $idcmm ."/updatetcp.txt")){
							
							$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/updatetcp.txt", "r+");
							$ler=fgets($abrir);
							fclose($abrir);
							
							for ($i=1; $i<=$ler; $i++){
								
								$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/". $i .".txt","r+");
								$mostrar=fgets($abrir);
								fclose($abrir);
								
								echo "<a href='todotpc.php?idcmm=". $idcmm ."-". $mostrar ."'>". $mostrar ."</a><br>";
								
								
							}
							
							
						}
					
					
				}
			
			
			
			
			?>
			
					</section>
					
				</section>
			
			
		</body>
		
	</html>