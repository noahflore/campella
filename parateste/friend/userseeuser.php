<?php session_start();

	
	$id= $_SESSION['id'];
	$nome= $_SESSION['nome'];
	$idfriend=$_GET['id'];
	$dia= date("d");
	if (file_exists("../other/". $idfriend ."/amigo/block/". $id .".txt")){
		
		header("location: ../userdefault.php");
		
	}

	if (!is_dir("../other/". $idfriend ."/visi/")){
		
		mkdir("../other/". $idfriend ."/visi/",0777,true);
		copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/visi/". $dia .".txt");
		$abrir=fopen("../other/". $idfriend ."/visi/". $dia .".txt","w+");
		fwrite($abrir,$nome);
		fclose($abrir);
		
		
	}else{
		
		copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/visi/". $dia .".txt");
		$abrir=fopen("../other/". $idfriend ."/visi/". $dia .".txt","w+");
		fwrite($abrir,$nome);
		fclose($abrir);
		
		
		
	}

?>
<!docktype html>

<html>

	 <head>
	 
	 <title>user-see-user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/user.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logocampella.png" alt="logo do site" /><br>
			<nav> 
				<ul>
					<li><a href="principaldefault.php">principal</a></li>
					<li><a href="configdefault.php">configuração</a></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section class="lado">
			<section class="user">
			<!--lateral esq com principal user-->
				<aside>
				<?php
					
					
					
						if((is_dir("../other/" . $idfriend)) and (file_exists("../other/" . $idfriend ."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $idfriend ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
					
					
					<ul class="fotopa">
						<li><div><a href="userpage/fotouser.php">fotos</a><img src="ico/perfil.png" alt="foto_png" /></div></li>
						<li><div>videos<img src="ico/videos.png" alt="videos_png" /></div></li>
						<?php
						echo "<li><div><a href='userpage/scrapuser.php?id=$idfriend&index=1'>recados</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
						
						
						
						?>
						<li><div><a href="userpage/depoiuser.php">depoimento</a><img src="ico/depoi.png" alt="depoi_png" /></div></li>
						<li><div>valor<img src="ico/logocampella.png" alt="valor_png" /></div></li>
						<?php echo "<li><div id='res'><button id='add' onclick='amigo($idfriend)'>mais^</button></div></li>";
							  if (!empty($_SESSION['add'])){ echo $_SESSION['add']; unset($_SESSION['add']);}?>
						<!-- use o php no valor ai cima-->
					</ul>
				
				
				</aside>
				<div class="caixa">
					<div id="fotoi">
						<img src="ico/perfil.png" alt="amavel" />
						<img src="l" alt="legal" />
						<img src="l" alt="sexy" />
						<img src="l" alt="bigode/bigode_de_ouro" />
						<img src="l" alt="conquista %" />
					
					
					</div>
					
					<div>
						nome e sobrenome do outro usuario
					
					</div>
					<div>
						<?php
							if (file_exists("other/". $id ."/desc.txt")) {
								$abrir= fopen("other/". $id ."/desc.txt",'r');
								while (!feof($abrir)){
									$buffer= fgets($abrir);
									echo $buffer;
									
								}
								
							}
								else{
									echo "<p>escrever sua descrição</p>";
									
								}
						
						
						?>
					
					</div>
					
					<div class="amigos">
						<?php
						
						
						?>
					
					</div>
					
				</div>
				
			</section>
			<!--lateral dir-->
			<aside class="fotopa">
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
	 
	
		<script src="js/amigo.js"></script>
	 </body>





</html>