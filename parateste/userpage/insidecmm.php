<?php session_start(); 

	$meuid=$_SESSION['id'];

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("../other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("../other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("../other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../login.php");
		
	}



?>
<!doctype html>

<html>

	<head>
	<?php	echo "<title>cmm d || campella</title>"; ?>
		<link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
		<link rel="stylesheet" href="../defaultstyle/corpodacmm.css" />
		<link rel="icon" href="../ico/logoico.png" />
	
	
	</head>
	
	<body>
		
		<header	class="cabeça">
		
			<img src="../ico/logobanner.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><a href="../principaldefault.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair()">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>
			<section class='grupo'>
				<section>
						<?php
					
							if (!empty($_GET['id'])){
								
								$id=$_GET['id'];
								
							}else{
								$id= $_SESSION['id'];
								
							}
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
									
								
								if (empty($_GET['id'])){
								
									echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."'>mostra meus topicos</a></li>";
									
									
								}else{
									
									echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."&id=$id'>mostra  topicos</a></li>";
									
									
								}
							
							
							
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
			<aside class="aolado">
				
				<?php
						
						for ($i=1;$i<=1000;$i++){//corrigi o erro de varios usuarios do mesmo id
							$impa=0;
							$abrir=fopen("../other/var/". $id ."/". $idcm ."/updatetcp.txt","r+");
							$cmmcon=fgets($abrir);
							fclose($abrir);
							
							for ($p=0;$p<=$cmmcon;$p++){
								
								if (file_exists("../other/var/". $id ."/". $idcm ."/". $p .".txt")){
									
									$abrir=fopen("../other/var/". $id ."/". $idcm ."/". $p .".txt","r+");
									$naluz=fgets($abrir);
									fclose($abrir);
								
								if (is_dir("../other/var/". $id ."/". $idcm ."-". $naluz ."/")){
							
							if (file_exists("../other/var/". $id ."/". $idcm ."-". $naluz ."/autoria/$i")){
								
								$foto= (file_exists("../other/$i/fotoperso.png")) ? "<img style='width:50px;height:50px;' src='../other/$i/fotoperso.png' />":"<img style='width:50px;height:50px;' src='../ico/userdefault.png' />";
								
								if ($impa == 3)
									echo "<br>";
								else
								echo $foto;
								
								if ($impa == 3)
									$impa=0;
								else
								$impa++;
								
								
							}
								
							}
								}
							
							
						}
						
						
						
					}
				
				
				?>
				
				
			</aside>
		
		
		<script src="../js/scriptbasico.js"></script>
		</body>



</html>