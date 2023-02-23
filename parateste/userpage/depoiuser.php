<?php session_start(); ?>
<!doctype html>

<html>

	 <head>
	 
	 <title>depoimento-user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logobanner.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		<section class="bloco">
				<aside>
						<?php
					$id= $_SESSION['id'];
					
						if((is_dir("../other/" . $id)) and (file_exists("../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
							<ul  class="lateral">
								<li><div><a href="../premio.php">fotos</a><img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div><a href="../premio.php">videos</a><img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div><a href="scrapuser.php?index=1">recados</a><img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div><a href='depoiuser.php'>depoimento</a><img src='../ico/depoi.png' alt='depoi_png' /></div></li>
								<li><div>valor<img src="../ico/logocampella.png" alt="valor_png" /></div></li>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
				<h1>depoimentos que recebi</h1>
				
				<div>
					<?php
						$id=$_SESSION['id'];
					
					
						if ((is_dir('../other/'. $id .'/depoi')) and (file_exists("../other/". $id ."/depoi/update.txt"))){
							$abrir=fopen("../other/". $id ."/depoi/update.txt","r+");
							$ler=fgets($abrir);
							fclose($abrir);
							
							if ($ler<50){$ler=50;}
							
							for($lo=1;$lo<=$ler;$lo++){
								
								
									
									
									if(is_dir("../other/". $id ."/depoi/tmp/". $lo)){
										$r=array_diff(scandir("../other/". $id ."/depoi/tmp/". $lo),['.','..']);
										$abrir=fopen("../other/". $id ."/depoi/tmp/". $lo ."/". $r[3],"r+");
										$mostrar=fgets($abrir);
									fclose($abrir);
									
									$r[3]=str_replace(".txt","",$r[3]);
										
										$foto= (file_exists("../other/$r[2]/fotoperso.png")) ? "../other/$r[2]/fotoperso.png":"../ico/perfil.png";
								
								echo "<div class='depoi'><img src='$foto' />". $r[3] ." ". $mostrar ."<br>
								<form method='post' action='../function/aceitar.php?mostrar=". $r[3] ."&li=". $lo ."&id=$r[2]'>
									<input type='submit' value='aceitar' name='delete' />
									<input type='submit' name='delete' value='deletar' />
								
								
								
								</form>
								
								</div><br>";
								
									}
								
							}
							
							
							
							
							
							
						}
					
						echo "<h2> depoimentos amostrar</h2><br>
						
						
						
						";
						if (is_dir('../other/'. $id .'/depoi/')){$ler=1000;
							
							
							
							
							for ($lo=1;$lo<=$ler;$lo++){
								
									
									if (is_dir('../other/'. $id .'/depoi/'. $lo ."/")){//echo $lo;
										$s=array_diff(scandir('../other/'. $id .'/depoi/'. $lo ."/"),['.','..']);
																					   
										if (file_exists("../other/". $id ."/depoi/". $lo ."/" . $s[3])){
											
											
											$abrir=fopen("../other/". $id ."/depoi/". $lo ."/" . $s[3],"r+");//print_r($s);
											$exibi= fgets($abrir);
											fclose($abrir);
											
										}else{
											
											$s[3]="";
											$exibir="";
											
										}
										
										$s[2]=str_replace(".txt","",$s[2]);
										$s[3]=str_replace(".txt","",$s[3]);
										$foto= (file_exists("../other/". $s[2] ."/fotoperso.png")) ? "../other/". $s[2] ."/fotoperso.png": "../ico/perfil.png";
										echo "<div class='depoi'><img src='$foto' />". $s[3] ." - ". $exibi ."</div><br>";
										
									}
									
									
								
							}
							
							
							
						}
					
					
					
					?>
					<!-- função php para monta os arquivos-->
				
				</div>
				
				
				</div>
						
	
	 
		</section>
	 </body>





</html>