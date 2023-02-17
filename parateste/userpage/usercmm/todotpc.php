<?php session_start();

	  include_once "../../function/idsave.php";

	if (!empty($_GET['parti'])){
		$idsave=$_GET['parti'];
		$meuid=$_SESSION['id'];
		$nome=$_SESSION['nome'];
		$idcmm=$_GET['outro'];
		
			if (!empty($_GET['id'])){
					$id=$_GET['id'];
								
				}else{
					$id= $_SESSION['id'];
								
				}
				
				if (file_exists("../../other/var/". $id ."/". $idcmm ."/privado/1.txt")){
					
					
					$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/privado/1.txt","r+");
					$veri=fgets($abrir);
					fclose($abrir);
				
					
				}else{
					
					mkdir("../../other/var/". $id ."/". $idcmm ."/privado/",0777,true);
					copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcmm ."/privado/1.txt");
					$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/privado/1.txt","w+");
					fwrite($abrir,1);
					fclose($abrir);
					$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/privado/1.txt","r+");
					$veri=fgets($abrir);
					fclose($abrir);
					
				}
				
				
				if ($veri==2){
				
				
				mkdir("../../other/var/". $id ."/". $idcmm ."/tmp/",0777,true);
				copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcmm ."/tmp/". $meuid .".txt");
				$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/tmp/". $meuid .".txt","w+");
				fwrite($abrir,$nome);
				fclose($abrir);
				header("location: todotpc.php?id=$id&idcmm=$idcmm");
			
				
				}
			if ($idsave==1){
				$idcm=$_GET['idcmm'];
				
				if (!is_dir("../../other/var/". $id ."/". $idcm ."/autoria/")){
					
					mkdir("../../other/var/". $id ."/". $idcm ."/autoria/",0777,true);
					copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcm ."/autoria/". $meuid);
					header("location: todotpc.php?id=$id&idcmm=$idcm");
					
				}else{
					
					copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcm ."/autoria/". $meuid);
					header("location: todotpc.php?id=$id&idcmm=$idcm");
					
				}
				
				
			}
		
		
		
	}// participar das cmmss



 ?>
<!doctype html>

<html>

	<head>
		<title>tudotpc || campella</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
		<link rel="stylesheet" href="../../defaultstyle/corpodacmm.css" />
		<link rel="icon" href="../ico/logoico.png" />


	</head>

	<body>
	
		<header	class="cabeça">
			
				<img src="../../ico/logobanner.png" alt="logo do site" />
				<nav> 
					<ul>
						<?php echo "<li onclick='usuario(1)'><a href='../../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
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
							
								$meuid=$_SESSION['id'];
							if (!empty($_GET['id'])){
								$id=$_GET['id'];
								
							}else{
								$id= $_SESSION['id'];
								
							}
								$idcm=$_GET['idcmm'];
								
								if (file_exists("../../other/var/". $id ."/". $idcm ."/fotocmm.png")){
									
								echo  "<img id='foto' src='../../other/var/". $id ."/". $idcm ."/fotocmm.png' />";
								
								
								}else{
									echo  "<img id='foto' src='../../ico/fotocmm.png' />";
									
								}
							
							
							
							
							?>
							<ul>
							<?php
									
								if (is_dir("../../other/var/". $id ."/". $idcm ."/busca/")){
							
							
									$busca=array_diff(scandir("../../other/var/". $id ."/". $idcm ."/busca/"),['.','..']);
									
									if ((is_dir("../../other/var/". $id ."/". $busca[2] ."/privado/")) && (file_exists("../../other/var/". $id ."/". $idcm ."/autoria/". $meuid))){
										
										$privado=0;
										
										
									}elseif (is_dir("../../other/var/". $id ."/". $busca[2] ."/privado/")){
										
										
										$abrir=fopen("../../other/var/". $id ."/". $busca[2] ."/privado/1.txt","r+");
										$privado=fgets($abrir);
										fclose($abrir);
										
										
									}//verificar permisão
									
						}
								
								
								
								
								if ((!empty($_GET['id'])) || ($id==$meuid)){
									
									$busca= array_diff(scandir("../../other/var/". $id ."/". $idcm ."/busca/"),['.','..']);
									
									
									$outrocmm=$busca[2];
									echo "<li><a href='showtpc.php?idcmm=". $busca[2] ."&id=$id&outro=$outrocmm&correto=$idcm'>mostra topicos</a></li>";
									
									
								}else{
								
									echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."&outro=$outrocmm&correto=$idcm'>mostra meus topicos</a></li>";
							
								}
								
								if (file_exists("../../other/var/". $id ."/". $busca[2] ."/privado/1.txt")){
									
									$abrir=fopen("../../other/var/". $id ."/". $busca[2] ."/privado/1.txt","r+");
									$privado=fgets($abrir);
									fclose($abrir);
									
								}else{
									
									$privado=0;
									
								}
								
								if ((file_exists("../../other/var/". $id ."/". $idcm ."/autoria/". $meuid)) || ($id==$meuid)){
									
									//echo "<li><a href='criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
									
									// esse echo criar uma cmm fantasma apaga se não tem como corrigir
									
								}elseif ($privado==0){
									
									echo "<li><a href='todotpc.php?id=$id&idcmm=$idcm&parti=1&outro=$outrocmm'>participar</a></li>";
									
									
									
								}
							
								if (($privado==2) and (!file_exists("../../other/var/". $id ."/". $idcm ."/autoria/". $meuid)) and ($id!=$meuid)){
									
									echo "<li><a href='modera.php?id=$id&idcmm=$idcm&outro=$outrocmm'>participar</a></li>";
									
									
								}
								
								if ($id==$meuid){
									
									echo "<li><a href='config.php?idcmm=$idcm&outro=$outrocmm'> configuração</a></li>";
									
								}
								
								//verificar se é ou não dono da cmm
								
							?>
							<li>enquetes</li>
								
							<?php if (!empty($_SESSION['alerta'])){echo "<span style='background-color:white'>". $_SESSION['alerta'] ."</span>"; unset($_SESSION['alerta']);} ?>
							
							</ul>
						</span>
						
						<?php
						
							if (!empty($_GET['idcmm'])){
								
								$idcmm=$_GET['idcmm'];
								
								if (file_exists("../../other/var/". $id ."/". $idcmm ."/numero.txt")){
								$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/numero.txt","r+");
								$ler=fgets($abrir);
								fclose($abrir);}else{$ler=2;}
								$meuid=$_SESSION['id'];
								$stop= 1;
								
								if (!empty($_GET['memo'])){$i=$_GET['memo'];}else{$i=1;}
								for ($i=$i; $i<=$ler; $i++){
									$stop++; 
									
									
									
									
									if (is_dir("../../other/var/". $id ."/". $idcmm ."/". $i)){
									$exibir= array_diff(scandir("../../other/var/". $id ."/". $idcmm ."/". $i),['.','..','fotoperso.png',$id]);
									if (empty($exibir[3])){$exibir[3]=$exibir[4];/*print_r($exibir);*/}
									$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/". $i ."/". $exibir[3],"r+"); 
									$guarda=fgets($abrir);
									fclose($abrir);
									
									if ((file_exists("../../other/var/". $id ."/". $idcmm ."/". $i ."/$meuid")) or ($id==$meuid)){
										$busca= array_diff(scandir("../../other/var/". $id ."/". $idcmm ."/". $i ."/"),['.','..']);
										$foto = (file_exists("../../other/". $busca[2] ."/fotoperso.png")) ? "<img style='width: 30px; height: 30px;' src='../../other/". $busca[2] ."/fotoperso.png' alt='foto_perfil' />": "<img style='width: 30px; height: 30px;' src='../../ico/perfil.png' alt='foto_perfil' />";
										echo "<div>". $foto ."<span id='d$i'>". $guarda. "</span><input type='button' id='responde' value='responde' onclick='responde($i)' /><form method='post' action='apagarcome.php?idcmm=". $idcmm ."&id=". $id ."&i=". $i ."'>
										<input type='submit' value='apagar'  />
										
										
										
										
										</form>
										";
									
									
									}else{
										
										$busca= array_diff(scandir("../../other/var/". $id ."/". $idcmm ."/". $i ."/"),['.','..']);
										$foto = (file_exists("../../other/". $busca[2] ."/fotoperso.png")) ? "<img style='width: 30px; height: 30px;' src='../../other/". $busca[2] ."/fotoperso.png' alt='foto_perfil' />": "<img style='width: 30px; height: 30px;' src='../../ico/perfil.png' alt='foto_perfil' />";
										echo "<div>". $foto ."<span id='d$i'>". $guarda. "</span><input type='button' id='responde' value='responde' onclick='responde($i)' /><br>";
									
										
										
									}
									
									}
									if ($stop>=10){
										$memoria=10; 
										$con=1;
										$num=1;
										
										do{
											
											
											//print_r($ler);
											echo "<a href='todotpc.php?id=$id&idcmm=$idcmm&memo=$memoria'>$num<a/> , "; 
											
											
										$memoria+=10;
										$num++;
										$con++;
										}while ($con*10<=$ler);
										$ler-=2;
										echo "<br><br><a href='todotpc.php?id=$id&idcmm=$idcmm&memo=$ler'> >>></a>";
										
										
										
											break;
										
										}
									
								}
								
								if ((file_exists("../../other/var/". $id ."/". $idcm ."/autoria/". $meuid)) || ($id==$meuid)){
								 echo "<br></div><br><form method='post' action='../../function/reccmm.php?id=$id&&idcmm=$idcmm&&todo=1'>
											<textarea name='texto' id='res' cols='70' rows='5'></textarea>
											<input type='submit' value='enviar' />
												
												
												</form>
								 
								 ";
								 
								 if (!empty($_GET['index'])){
									 
									 $indexado=$_GET['index'];
									 idsave($indexado);
									 header("location: todotpc.php?id=$id&idcmm=$idcm");
									 
								 }
								
								}
								//print_r($exibir);
								
							}
				
							if (isset($_GET['memo'])){
										
										$ista=$_GET['memo'];
										$ist=1;
										$i=1;
										$nn=1;
										
										if ($ista>=10){
											
											while ($i<=$ista){
												
												echo "<a href='todotpc.php?id=$id&idcmm=$idcmm&memo=$ist'>$nn , </a>";
												$ist+=10;
												$i+=10;
												$nn++;
											}
											
											
											
											
										}
								
									echo "<a href='todotpc.php?id=$id&idcmm=$idcmm&memo=1'><<< , </a>";
									
									}
						
						
						
						
						?>
					<section>

					<script src="js/responde.js"></script>
	 
	</body>

</html>