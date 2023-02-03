<?php session_start(); ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>update || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/bloco.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><a href="configdefault.php">configuração</a></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section class="lado">
			<!--lateral esq-->
			<aside>
			
			<?php
					$id= $_SESSION['id'];
					
						if((is_dir("other/" . $id)) and (file_exists("other/" . $id."/fotoperso.png"))){
								
								echo "<img id='principal' src='other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='principal' src='ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
				
				
				
				
				<ul class="fotopa">
						<li><div><a href="premio.php">fotos</a><img src="ico/perfil.png" alt="foto_png" /></div></li>
						<li><div><a href="premio.php">videos</a><img src="ico/videos.png" alt="videos_png" /></div></li>
						
						<?php
						
							if(file_exists("other/". $id ."/recado/tmp/tmpupdate.txt")){
								
								$abrir=fopen("other/". $id ."/recado/tmp/tmpupdate.txt","r+");
								$ler=fgets($abrir);
								fclose($abrir);
								
								echo "<li><div><a href='userpage/scrapuser.php?index=1'>recados   ". $ler ."</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
							}else{
								
								echo "<li><div><a href='userpage/scrapuser.php?index=1'>recados</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
								
								
							}
							
							if(file_exists("other/". $id ."/depoi/update.txt")){
								$abrir=fopen("other/". $id ."/depoi/update.txt","r+");
								$noti=fgets($abrir);
								fclose($abrir);
								
								
								echo	"<li><div><a href='userpage/depoiuser.php'>depoi ". $noti ."</a><img src='ico/depoi.png' alt='depoi_png' /></div></li>";
						
						
							}else{
								
								echo	"<li><div><a href='userpage/depoiuser.php'>depoimento</a><img src='ico/depoi.png' alt='depoi_png' /></div></li>";
						
								
								
							}
						
						
						?>
						<li><div>valor<img src="ico/logocampella.png" alt="valor_png" /></div></li>
						<!-- use o php no valor ai cima-->
					
				</ul>
			
			
			</aside>
			<main>
				<div class='vermobi'>
					<h1><a href="principaldefault.php"> voltar a comunidades</a></h1>
					<div><a href="updatesee.php">campella-update</a></div>
					<!-- mostra as atualização-->
					
					<?php
					
						if (is_dir("other/update/")){
							
							for ($i=0; $i<=1000; $i++){
								
								if (is_dir("other/update/". $i)){
								$r= array_diff(scandir("other/update/". $i),['.','..']);
								$abrir= fopen("other/update/". $i ."/". $r[2], "r+");
								while (!feof($abrir)){$ler=$ler . fgets($abrir);}
								fclose($abrir);
								
								echo "<div style='background-color:red'>". $ler ."</div><br><br><br>";
								unset($ler);
								
								
								}
								
								
								
							}
							
							
							
							
						}
				
					?>
				</div>
				
			
			</main>
			
			<!--lateral dir-->
			<aside class="fotopa" id="baixo">
				<ul>
					<li><div><img src="ico/cmm.png" alt="cmm_ico" /><a href="comunidadesdefault.php">comunidades</a></div></li>
					<li><div><img src="ico/game.png" alt="game_ico" /><a href="jogos.php">jogos</a></div></li>
					<li><div><img src="ico/jobs.png" alt="jobs_ico" /><a href="jobs.php">tarefas</a></div></li>
					<!--o de cima vai para versão final-->
					<li><div><img src="ico/loja.png" alt="loja_ico" />lojas</div></li>
					<li><div><img src="ico/premio.png" alt="premio_ico" /><a href="premio.php">premio</a></div></li>
					<li><div><img src="ico/ad.png" alt="ad_ico" />anuncio</div></li>
				
				</ul>
			
			
			</aside>
		</section>
	 
			<script src="js/principal.js"></script>
	 
	 </body>





</html>