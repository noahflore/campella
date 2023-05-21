<?php session_start(); ?>
<!doctype html>

<html>

	 <head>
	 
	 <title>videouser || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../../defaultstyle/userpage.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li><a href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
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
								<li><div>fotos<img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div>videos<img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div>recados<img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div>depoimento<img src="../ico/depoi.png" alt="depoi_png" /></div></li>
								<li><div>valor<img src="../ico/logocampella.png" alt="valor_png" /></div></li>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
					
					<?php
					
						
					$idfriend= $_SESSION['idfriend'];
					//echo $id;
					
					$abrir=array_diff(scandir("../../friend/". $idfriend ."/"),['.','..']);
		

					$nomeF=str_replace("1-","",$abrir[2]);



				// print_r($abrir);
				   unset($abrir);
					
					echo	"<h1>galeria de videos D $nomeF</h1>

						<div>";
					
					
						if (is_dir('../../other/'. $idfriend .'/videos')){
							echo "<h2>procura aqui o video do youtube</h2>
								   <div class='for'><form method='post' action='../function/procuravideos.php'>
										<input style='background-color:white' type='text' placeholder='nome da playlist' name='play' />
										<input style='background-color:white' type='text' placeholder='url do video' name='link' />
										<input type='submit' value='enviar' />
									
									
									
									</form></div>
							
							
							
							
							
							";
							
							// o formulario de cima precisa se organizado
							
							
							if (is_dir('../../other/'. $idfriend .'/videos')) {
							$exibirvideo=array_diff(scandir('../../other/'. $idfriend .'/videos/'), ['.','..','contado.txt']);
							
							foreach($exibirvideo as $li){
									echo"<div><a href='listavideos.php?play=". $li ."'>". $li ."</a></div><br>
									
									
									
									
									
									";
									
								
							}
							
							}
							
							
							
						}else{
							
							mkdir('../other/'. $id .'/videos',0777,true);
							echo "<h2>coloque seu videos do youtube</h2>
									<form method='post' action='../function/criarvideos.php'>
										<input type='text' placeholder='nome da playlist' name='play' />
										<input type='text' placeholder='url do video' name='link' />
										<input type='submit' value='enviar' />
									
									
									
									</form>
							
							
							
							
							
							";
							
						}
					
					
					
					
					
					?>
					<!-- função php para monta os arquivos-->
				
				</div>
				
				
				</div>
						
	
	 
		</section>
	 </body>





</html>