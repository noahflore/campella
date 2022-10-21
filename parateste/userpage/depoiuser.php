<?php session_start(); ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>depoimento-user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<li><a href="../userdefault.php">user</a></li>
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
						<img id="especial" src="../ico/userdefault.png" alt="foto do usuario" />
							<ul  class="lateral">
								<li><div><a href="fotouser.php">fotos</a><img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div><a href="videouser.php">videos</a><img src="../ico/videos.png" alt="videos_png" /></div></li>
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
					
					
						if (is_dir('../other/'. $id .'/depoi')){
							$abrir=fopen("../other/". $id ."/depoi/update.txt","r+");
							$ler=fgets($abrir);
							fclose($abrir);
							
							if ($ler<50){$ler=50;}
							
							for($lo=1;$lo<=$ler;$lo++){
								
								
									
									
									if(is_dir("../other/". $id ."/depoi/tmp/". $lo)){
										$r=array_diff(scandir("../other/". $id ."/depoi/tmp/". $lo),['.','..']);
										$abrir=fopen("../other/". $id ."/depoi/tmp/". $lo ."/". $r[2],"r+");
										$mostrar=fgets($abrir);
									fclose($abrir);
									
								
								echo "<div>". $r[2] ." ". $mostrar ."<br>
								<form method='post' action='../function/aceitar.php?mostrar=". $r[2] ."&li=". $lo ."'>
									<input type='submit' value='aceitar' name='delete' />
									<input type='submit' name='delete' value='deletar' />
								
								
								
								</form>
								
								</div><br>";
								
									}
								
							}
							
							
							
							
							
							
						}
					
						echo "<h2> depoimenntos amostrar</h2><br>
						
						
						
						";
						if (is_dir('../other/'. $id .'/depoi')){
							
							if ($ler<1000){$ler=1000;};
							
							
							for ($lo=1;$lo<=$ler;$lo++){
								
									
									if (is_dir('../other/'. $id .'/depoi/'. $lo)){
										$s=array_diff(scandir('../other/'. $id .'/depoi/'. $lo),['.','..']);
										$abrir=fopen("../other/". $id ."/depoi/". $lo ."/" . $s[2],"r+");
										$exibi= fgets($abrir);
										fclose($abrir);
										echo "<div>". $s[2] ." - ". $exibi ."</div><br>";
										
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