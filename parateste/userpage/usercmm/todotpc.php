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
				
				
				$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/privado/1.txt","r+");
				$veri=fgets($abrir);
				fclose($abrir);
				
				
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
									
									
									
									echo "<li><a href='showtpc.php?idcmm=". $busca[2] ."&id=$id'>mostra topicos</a></li>";
									$outrocmm=$busca[2];
									
								}else{
								
									echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."'>mostra meus topicos</a></li>";
							
								}
								
								if (file_exists("../../other/var/". $id ."/". $busca[2] ."/privado/1.txt")){
									
									$abrir=fopen("../../other/var/". $id ."/". $busca[2] ."/privado/1.txt","r+");
									$privado=fgets($abrir);
									fclose($abrir);
									
								}else{
									
									$privado=0;
									
								}
								
								if ((file_exists("../../other/var/". $id ."/". $idcm ."/autoria/". $meuid)) || ($id==$meuid)){
									
									echo "<li><a href='usercmm/criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
									
								}elseif ($privado==0){
									
									echo "<li><a href='todotpc.php?id=$id&idcmm=$idcm&parti=1&outro=$outrocmm'>participar</a></li>";
									
									
									
								}
							
								if ($privado==2){
									
									echo "<li><a href='modera.php?id=$id&idcmm=$idcm&outro=$outrocmm'>participar</a></li>";
									
									
								}
								
								if ($id==$meuid){
									
									echo "<li><a href='config.php?idcmm=$idcm&outro=$outrocmm'> configuração</a></li>";
									
								}
								
								//verificar se é ou não dono da cmm
								
							?>
							<li>enquetes</li>
							
							</ul>
						</span>
						
						<?php
						
							if (!empty($_GET['idcmm'])){
								
								$idcmm=$_GET['idcmm'];
								
								$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/numero.txt","r+");
								$ler=fgets($abrir);
								fclose($abrir);
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
									
									if ((file_exists("../../other/var/". $id ."/". $idcmm ."/". $i ."/$id")) || (file_exists("../../other/var/". $id ."/". $idcmm ."/". $i ."/$meuid"))){
										$foto = (file_exists("../../other/var/". $id ."/". $idcmm ."/". $i ."/fotoperso.png")) ? "<img style='width: 30px; height: 30px;' src='../../other/var/". $id ."/". $idcmm ."/". $i ."/fotoperso.png' alt='foto_perfil' />": "<img src='../../ico/perfil.png' alt='foto_perfil' />";
										echo "<div>". $foto ."<span id='d$i'>". $guarda. "</span><input type='button' id='responde' value='responde' onclick='responde($i)' /><form method='post' action='apagarcome.php?idcmm=". $idcmm ."&id=". $id ."&i=". $i ."'>
										<input type='submit' value='apagar'  />
										
										
										
										
										</form>
										";
									
									
									}else{
										
										$foto = (file_exists("../../other/var/". $id ."/". $idcmm ."/". $i ."/fotoperso.png")) ? "<img style='width: 30px; height: 30px;' src='../../other/var/". $id ."/". $idcmm ."/". $i ."/fotoperso.png' alt='foto_perfil' />": "<img src='../../ico/perfil.png' alt='foto_perfil' />";
										echo "<div>". $foto ."<span id='d$i'>". $guarda. "</span><input type='button' id='responde' value='responde' onclick='responde($i)' /><br>";
									
										
										
									}
									
									}
									if ($stop>=10){
										$memoria=10; 
										$con=1;
										$num=1;
										
										do{
											
											
											//print_r($ler);
											echo "<a href='todotpc.php?id=$id&idcmm=$idcmm&memo=$memoria'>$num<a/> ==  "; 
											
											
										$memoria+=10;
										$num++;
										$con++;
										}while ($con*10<=$ler);
										$ler-=2;
										echo "<a href='todotpc.php?id$id&idcmm=$idcmm&memo=$ler'> >>></a>";
										
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
						
						
						
						
						?>
					<section>

					<script src="js/responde.js"></script>
	 
	</body>

</html>