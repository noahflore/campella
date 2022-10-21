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
								<li><div>fotos<img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div>videos<img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div>recados<img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div>depoimento<img src="../ico/depoi.png" alt="depoi_png" /></div></li>
								<li><div>valor<img src="../ico/logocampella.png" alt="valor_png" /></div></li>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
				<h1>enviar aquele depoimento</h1>
				
				<div>
					<?php
					
						echo "<form method='post' action='../../function/criardepoi.php'>
								
								<input type='text' name='texto' placeholder='não seja timido começa a digitar'  />
								<input type='submit' value='enviar' />
						
						
						
						
							</form>
						
						
						
						
						
						
						";
					
					
						$id=$_SESSION['id'];
					
					
						if (is_dir('../other/'. $id .'/depoi')){
							$exibir=array_diff(scandir('../other/'. $id .'/depoi/'),['.','..']);
							
							foreach($exibir as $li){
								
								echo "<div>". $li ."</div><br>";
								
								
							}
							
							
							
							
							
							
						}
					
					
					
					
					
					?>
					<!-- função php para monta os arquivos-->
				
				</div>
				
				
				</div>
						
	
	 
		</section>
	 </body>





</html>