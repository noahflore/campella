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
		
			<img src="../ico/logobanner.png" alt="logo do site" /><br>
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
						

							echo "<span id='jane'>";
							
								if (!empty($_GET['album'])){
									
									$album=$_GET['album'];
									
									$r=array_diff(scandir('../other/'. $id .'/fotos/'. $album),['.','..']);
									
									$pular=0;
									$p=0;
									foreach($r as $l){
										$pular++;
										$p++;
										
										if ($pular<10){
											echo "<img onclick='des($p)' style='width:50px;height:50px' id='fotope$p' src='../other/". $id ."/fotos/". $album ."/". $l ."' alt='foto_user' />";}
										else{echo "<br><img onclick='des($p)' style='width:50px;height:50px'  id='fotope$p' src='../other/". $id ."/fotos/". $album ."/". $l ."' alt='foto_user' />"; $pular=0;}
										
									}
									
									
									
									echo "</span>";
									
								}



			?>
			</section>
			
			
		</section>
			
			<script>
				
				function des(p){
					
					let res= document.getElementById("jane")
					let fundo= document.createElement("div")
					let foto= document.getElementById("fotope" + p)
					
					fundo.setAttribute("style","position:fixed;top:0%;left:0%;background-color:#3c393187;width:100%;height:100%")
					fundo.setAttribute("id","sa")
					fundo.setAttribute("onclick",`fechou(${p})`)
					foto.removeAttribute("style")
					foto.setAttribute("style","width:500px;500px;margin-left:460px;margin-top:60px")
					
					fundo.appendChild(foto)
					res.appendChild(fundo)
					
					
					
					
				}
				
				function fechou(p){
					
					let res= document.getElementById("jane")
					let foto= document.getElementById("fotope" + p)
					let fundo= document.getElementById("sa")
					
					foto.removeAttribute("style")
					foto.setAttribute("style","width:50px;height:50px;")
					
					res.appendChild(foto)
					res.removeChild(fundo)
					
					
				}
				
				
			</script>
		</body>
		
	</html>