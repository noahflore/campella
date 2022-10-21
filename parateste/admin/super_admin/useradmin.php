<?php session_start();
	
	/*
	if(!empty($_GET['login'])){
		$_SESSION['login']=$_GET['login'];
		$login=$_SESSION['login'];
		
	
	}
	
	
	
	if ($login=="off"){
		
		header("location: ../../index.php");
		
	}

	*/

?>
<!docktype html>

<html>

	 <head>
	 
	 <title>user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../../defaultstyle/user.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../../ico/logocampella.png" alt="logo do site" /><br>
			<div>bem-vindo <?php echo $_SESSION['nome']; ?> </div>
			<nav> 
				<ul>
					<li><span id="res"><input type="button" value="root" id="root" onclick="root()" /></span></li>
					<li><a href="principaldefault.php">principal</a></li>
					<li><a href="configdefault.php">configuração</a></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="userdefault.php?login=off">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section  onmouseout="sair()" class="lado">
			<section class="user">
			<!--lateral esq com principal user-->
				<aside>
				<?php
					$id= $_SESSION['id'];
					
						if((is_dir("../../other/" . $id)) and (file_exists("../../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
					
					
					<ul class="fotopa">
						<li><div><a href="../../userpage/fotouser.php">fotos</a><img src="../../ico/perfil.png" alt="foto_png" /></div></li>
						<li><div><a href="../../userpage/videouser.php">videos</a><img src="../../ico/videos.png" alt="videos_png" /></div></li>
						<li><div><a href="../../userpage/scrapuser.php">recados</a><img src="../../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
						
						<?php
							
							if(file_exists("../../other/". $id ."/depoi/update.txt")){
								$abrir=fopen("../../other/". $id ."/depoi/update.txt","r+");
								$noti=fgets($abrir);
								fclose($abrir);
								
								
								echo	"<li><div><a href='../../userpage/depoiuser.php'>depoi ". $noti ."</a><img src='../../ico/depoi.png' alt='depoi_png' /></div></li>";
						
						
							}else{
								
								echo	"<li><div><a href='../../userpage/depoiuser.php'>depoimento</a><img src='../../ico/depoi.png' alt='depoi_png' /></div></li>";
						
								
								
							}
						
						
						?>
						<li><div>valor<img src="../../ico/logocampella.png" alt="valor_png" /></div></li>
						<!-- use o php no valor ai cima-->
					</ul>
				
				
				</aside>
				<div class="caixa">
					<div id="fotoi">
						<img src="../../ico/perfil.png" alt="amavel" />
						<img src="l" alt="legal" />
						<img src="l" alt="sexy" />
						<img src="l" alt="bigode/bigode_de_ouro" />
						<img src="l" alt="conquista %" />
					
					
					</div>
					
					<div>
						<b>sorte do dia</b>
					
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
						// descrição do usuario
						
						?>
					
					</div>
					
					<div class="amigos">
						<?php/*
							$li=2;
							$loop=0;
							while($loop<=5){
							$contado=random_int(1,30);
									if(is_dir('friend/' . $contado)){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
									if (file_exists('friend/'. $contado .'/fotoperso.png')){
											echo "<div class='perfilu'><img id='fotomenor' src='friend/". $contado."/fotoperso.png' alt='foto_usuario' /><a href='friend/userseeuser.php'>". $amigo[$li] .'</a></div> ';
											$_SESSION['seefriend']=$contado;
											$li++;
											
									}else{
										echo "<div class='perfilu'><img id='fotomenor' src='ico/userdefault.png' alt='foto_usuario' /><a href='friend/userseeuser.php'>". $amigo[$li] .'</a></div> ';
											$li++;
											$_SESSION['seefriend']=$contado;
										
										
									}
									}
						
							}else{
								while(!is_dir('friend/'. $contado)){
										$contado=random_int(1,30);
										if(is_dir('friend/' . $contado)){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
										if (file_exists('friend/'. $contado .'/fotoperso.png')){
											echo "<div class='perfilu'> <img id='fotomenor' src='friend/". $contado."/fotoperso.png' alt='foto_usuario' /><a href='friend/userseeuser.php'>". $amigo[$li] .'</a></div> ';
											$li++;
											$_SESSION['seefriend']=$contado;
											
										}else{
										echo "<div class='perfilu'><img id='fotomenor' src='ico/userdefault.png' alt='foto_usuario' /><a href='friend/userseeuser.php'>". $amigo[$li] .'</a></div> ';
											$li++;
											$_SESSION['seefriend']=$contado;
										
										
										}
									}
										
									}
							
								}
							}
							$loop++;
							$li=2;
							}
							//exibi 5 pessoas para add como amigo*/
						?>
					
					</div>
					
				</div>
				
			</section>
			<!--lateral dir-->
			<aside class="fotopa">
				<ul>
					<li><div><img src="../../ico/cmm.png" alt="cmm_ico" /><a href="comunidadesdefault.php">comunidades</a></div></li>
					<li><div><img src="../../ico/game.png" alt="game_ico" /><a href="jogos.php">jogos</a></div></li>
					<li><div><img src="../../ico/jobs.png" alt="jobs_ico" /><a href="jobs.php">tarefas</a></div></li>
					<!--o de cima vai para versão final-->
					<li><div><img src="../../ico/loja.png" alt="loja_ico" />lojas</div></li>
					<li><div><img src="../../ico/premio.png" alt="premio_ico" /><a href="premio.php">premio</a></div></li>
					<li><div><img src="../../ico/ad.png" alt="ad_ico" />anuncio</div></li>
				
				</ul>
			
			
			</aside>
		</section>
	 
	
		<script src="root.js"></script>
	 </body>





</html>