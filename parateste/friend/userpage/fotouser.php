<?php session_start(); ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>userfoto || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 <link rel="stylesheet" href="../defaultstyle/fotouser.css" />
	 
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
						<?php
					$id= $_SESSION['id'];
					
						if((is_dir("../other/" . $id)) and (file_exists("../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
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
				<h1>galeria de fotos</h1>
				
				<div>
				
					<?php
						if (is_dir('../other/'. $id .'/fotos')){
							echo "<h2>criar o seu albuns de fotos</h2>
								   <div class='for'><form enctype='multipart/form-data' method='post' action='../function/criarfotos.php'>
										<input type='text' placeholder='nome do album' name='album' />
										<input type='file' name='capa' accept='imagem/png' />
										<input type='file' name='foto' accept='imagem/png' />
										<input type='submit' value='enviar' />
									
									
									
									</form></div>
							
							
							
							
							
							";
							if (is_dir('../other/'. $id .'/fotos/')) {
							$exibiralbum=array_diff(scandir('../other/'. $id .'/fotos/'), ['.','..','contado.txt']);
							
							foreach($exibiralbum as $li){
								if(file_exists('../other/'. $id .'/fotos/'. $li .'/capa.png')){
									echo"<div class='foto'><img src='../other/". $id ."/fotos/". $li ."/capa.png'  alt='foto_album' />". $li ."</div><br>
									
									
									
									
									";
									
								}else{
									echo"<div class='foto'><img src='../ico/album.png' alt='foto_album' />". $li ."</div><br>
									
									
									
									
									";
									
									
								}
									
								
							}
							
							}
							
							
							
						}else{
							
							mkdir('../other/'. $id .'/fotos',0777,true);
							echo "<h2>criar o seu albuns de fotos</h2>
									<form enctype='multipart/form-data' method='post' action='../function/criarfotos.php'>
										<input type='text' placeholder='nome do album' name='album' />
										<input type='file' name='foto' accept='imagem/png' />
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