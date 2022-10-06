<?php session_start(); ?>
<!doctype html>


	<html>
	
		<head>
			
			<title>album_user || campella</title>
			<meta charset='utf-8' />
			<link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
			<link rel="stylesheet" href="../defaultstyle/user.css" />
			
		</head>
		
		
		<body>
		
			<header class="cabeça">
		
			<img src="../ico/logocampella.png" alt="logo do site" /><br>
			<nav> 
				<ul>
					<li><a href="principaldefault.php">principal</a></li>
					<li><a href="configdefault.php">configuração</a></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="userdefault.php?login=off">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		
		<section class="lado">
			<section class="user">
			<!--lateral esq com principal user-->
				<aside>
				<?php
					$id= $_SESSION['id'];
					
						if((is_dir("../other/" . $id)) and (file_exists("../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
					
					
					<ul class="fotopa">
						<li><div><a href="../userpage/fotouser.php">fotos</a><img src="../ico/perfil.png" alt="foto_png" /></div></li>
						<li><div><a href="../userpage/videouser.php">videos</a><img src="../ico/videos.png" alt="videos_png" /></div></li>
						<li><div><a href="../userpage/scrapuser.php">recados</a><img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
				
				</aside>
				
			
			
		
						<?php
						

							echo "<span>";
							
								if (!empty($_GET['album'])){
									
									$album=$_GET['album'];
									
									$r=array_diff(scandir('../other/'. $id .'/fotos/'. $album),['.','..']);
									
									$pular=0;
									foreach($r as $l){
										$pular++;
										
										if ($pular<10){
											echo "<img id='fotope' src='../other/". $id ."/fotos/". $album ."/". $l ."' alt='foto_user' />";}
										else{echo "<br><img id='fotope' src='../other/". $id ."/fotos/". $album ."/". $l ."' alt='foto_user' />"; $pular=0;}
										
									}
									
									
									
									echo "</span>";
									
								}



			?>
			</section>
			
			
		</section>
			
		</body>
		
	</html>