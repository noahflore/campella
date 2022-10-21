<?php
session_start();

	if (!empty($_GET['id'])){
		
		$id=$_GET['id'];
		
	}else{
		$id=$_SESSION['id'];

		
	}


?>

<!doctype html>

	<html>

		<head>
			<title>cmm_do_user || campella</title>
			<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
			<link rel="stylesheet" href="../../defaultstyle/corpodacmm.css" />
		
		
		</head>
		
		<body>
			
			<header	class="cabeça">
			
				<img src="../../ico/logocampella.png" alt="logo do site" />
				<nav> 
					<ul>
						<li><a href="userdefault.php">user</a></li>
						<!-- o de cima é nome do usuario-->
						<li><a href="../../principaldefault.php">principal</a></li>
						<li>configuração</li>
						<li><s>camp</s></li>
						<li>feed back</li>
						<li><a href="sair">sair</a></li>
					
					
					</ul>

				</nav>
			
			
			</header>
			
			<section class="grupo">
						<span>
							<?php
								$idcm=$_GET['idcmm'];
								
								if (file_exists("../../other/var/". $id ."/". $idcm ."/fotocmm.png")){
									
								echo  "<img id='foto' src='../../other/var/". $id ."/". $idcm ."/fotocmm.png' />";
								
								
								}else{
									echo  "<img id='foto' src='../../ico/fotocmm.png' />";
									
								}
							
							
							
							
							?>
							<ul>
							<?php
								echo "<li><a href='usercmm/criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
								
								?>
								
							<?php
								echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."'>mostra meus topicos</a></li>";
							
							
							
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