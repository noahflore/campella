<?php session_start(); 

	if (!empty($_GET['id'])){$idfriend=$_GET['id'];}


?>
<!doctype html>

<html>

	 <head>
	 
	 <title>depoimento-user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../../defaultstyle/userpage.css" />
     <link rel="icon" href="../../ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../../ico/logobanner.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='../../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
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
					
					
					
						if((is_dir("../../other/" . $idfriend)) and (file_exists("../../other/" . $idfriend ."/fotoperso.png"))){
								
								echo "<img id='especial' src='../../other/". $idfriend ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../../ico/userdefault.png' alt='foto do usuario' />";
							
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
				<h1>enviar aquele depoimento</h1>
				
				<div>
					<?php
					
						echo "<form method='post' action='../../function/criardepoi.php?id=$idfriend'>
								
								<textarea cols='30' rows='5' name='texto' placeholder='não seja timido começa a digitar'  /></textarea>
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