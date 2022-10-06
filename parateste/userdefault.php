<?php session_start();
	
	
	if(!empty($_GET['login'])){
		$_SESSION['login']=$_GET['login'];
	
	
	}
	$login=$_SESSION['login'];
	
	
	if ($login=="off"){
		
		header("location: index.php");
		
	}



?>
<!docktype html>

<html>

	 <head>
	 
	 <title>user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/user.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logocampella.png" alt="logo do site" /><br>
			<div>bem-vindo <?php echo $_SESSION['nome']; ?> </div>
			<nav> 
				<ul>
					<li onclick='usuario(2)'><a href="principaldefault.php">principal</a></li>
					<li><span id="lista"><input type='button' onclick="config(1)" id="config" value='configuração' /></span></li>
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
					
						if((is_dir("other/" . $id)) and (file_exists("other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
					
					
					<ul class="fotopa">
						<li><div><a href="userpage/fotouser.php">fotos</a><img src="ico/perfil.png" alt="foto_png" /></div></li>
						<li><div><a href="userpage/videouser.php">videos</a><img src="ico/videos.png" alt="videos_png" /></div></li>
						
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
				<div class="caixa">
					<div id="fotoi">
						<img src="ico/perfil.png" alt="amavel" />
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
						<?php
							$li=2;
							$loop=0;
							$lem1=$id;
							$lem2=$id;
							$lem3=$id;
							$lem4=$id;
							while($loop<=5){
							$contado=random_int(1,1000);
							
									if((is_dir('friend/' . $contado)) and ($contado!=$id) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
									if ((file_exists('friend/'. $contado .'/fotoperso.png')) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
										
											if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id)){//print_r("exploder na tela");
											echo "<div class='perfilu'><img id='fotomenor' src='friend/". $contado."/fotoperso.png' alt='foto_usuario' /><a href='friend/userseeuser.php?id=$contado'>". $amigo[$li] .'</a></div> ';
											$_SESSION['seefriend']=$contado;
											
											}
											$li++;
											
											if (($lem1!=$id) and ($lem2!=$id) and ($lem3!=$id) and ($lem4==$id)){
												
												$lem4=$contado;
												
											}elseif (($lem1!=$id) and ($lem2!=$id) and ($lem3==$id)){
												
												$lem3=$contado;
											}
											
											if (($lem1!=$id) and ($lem2==$id)){
												
												$lem2=$contado;
												
											}elseif (($lem1==$id)){
												
												$lem1=$contado;
												
											}
											
									}elseif (($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
										
										if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id)){//print_r("exploder na tela 2");
											echo "<div class='perfilu'><img id='fotomenor' src='ico/userdefault.png' alt='foto_usuario' /><a href='friend/userseeuser.php?id=$contado'>". $amigo[$li] .'</a></div> ';
											$_SESSION['seefriend']=$contado;
											
										}
										
										$li++;
										
										
											if (($lem1!=$id) and ($lem2!=$id) and ($lem3!=$id) and ($lem4==$id)){
												
												$lem4=$contado;
												
											}elseif (($lem1!=$id) and ($lem2!=$id) and ($lem3==$id)){
												
												$lem3=$contado;
											}
											
											if (($lem1!=$id) and ($lem2==$id)){
												
												$lem2=$contado;
												
											}elseif (($lem1==$id)){
												
												$lem1=$contado;
												
											}
										
									}
									
									}
						
							}else{
								while((!is_dir('friend/' . $contado)) and ($contado!=$id) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
										$contado=random_int(1,1000);
										if((is_dir('friend/' . $contado)) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
										if ((file_exists('friend/'. $contado .'/fotoperso.png')) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
											
											if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id)){//print_r("exploder na tela 3");
											echo "<div class='perfilu'> <img id='fotomenor' src='friend/". $contado."/fotoperso.png' alt='foto_usuario' /><a href='friend/userseeuser.php?id=$contado'>". $amigo[$li] .'</a></div> ';
											$_SESSION['seefriend']=$contado;
											
											}
											
											$li++;
											
											
											if (($lem1!=$id) and ($lem2!=$id) and ($lem3!=$id) and ($lem4==$id)){
												
												$lem4=$contado;
												
											}elseif (($lem1!=$id) and ($lem2!=$id) and ($lem3==$id)){
												
												$lem3=$contado;
											}
											
											if (($lem1!=$id) and ($lem2==$id)){
												
												$lem2=$contado;
												
											}elseif (($lem1==$id)){
												
												$lem1=$contado;
												
											}
											
										}elseif (($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4)){
											
										if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id)){//print_r("exploder na tela 4");
											echo "<div class='perfilu'><img id='fotomenor' src='ico/userdefault.png' alt='foto_usuario' /><a href='friend/userseeuser.php?id=$contado'>". $amigo[$li] .'</a></div> ';
											$_SESSION['seefriend']=$contado;
											
										}
										
										$li++;
											
											
											if (($lem1!=$id) and ($lem2!=$id) and ($lem3!=$id) and ($lem4==$id)){
												
												$lem4=$contado;
												
											}elseif (($lem1!=$id) and ($lem2!=$id) and ($lem3==$id)){
												
												$lem3=$contado;
											}
											
											if (($lem1!=$id) and ($lem2==$id)){
												
												$lem2=$contado;
												
											}elseif (($lem1==$id)){
												
												$lem1=$contado;
												
											}
										
										}
										
										
										
									}
										
									}
							
								}
							}
							$loop++;
							$li=2;
							}
							//exibi 5 pessoas para add como amigo
						?>
					
					</div>
					
					<div>
						
						<h2>meus depoimentos</h2>
						<?php
						
							if (is_dir("other/". $id ."/depoi/")){
								
								for ($i=0; $i<=1000; $i++){
									
									if (is_dir("other/". $id ."/depoi/". $i)){
										
										$depoi= array_diff(scandir("other/". $id ."/depoi/". $i),['.','..']);
										$abrir=fopen("other/". $id ."/depoi/". $i ."/". $depoi[2],"r+");
										$ler=fgets($abrir);
										fclose($abrir);
										
										echo "<div>". $ler ."</div><br>";
									
									
									
									}
									
								}
								
								
								
								
								
							}
						
						
						if (is_dir("other/". $id ."/amigo/tmp/")){
							
							echo "<h2>solicitação de amizade</h2><hr>";
							
							$lista= array_diff(scandir("other/". $id ."/amigo/tmp/"),['.','..']);
							
								
								
							
								foreach ($lista as $li){
									
									
									$li= str_replace(".txt","",$li);
									
									if (is_numeric($li)){
								
										$abrir=fopen("other/". $id ."/amigo/tmp/". $li .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
										$abrir=fopen("other/". $id ."/amigo/tmp/". $ler .".txt","w+");
										fwrite($abrir,$li);
										fclose($abrir);
								
								
									}
									
									
									
									
									for ($i=0; $i<=9; $i++){
									$li = str_replace($i,"",$li);}
									
									
									if (!empty($li)){//print_r($li);
									
										$abrir=fopen("other/". $id ."/amigo/tmp/". $li .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
										
										echo $li ."<form method='post' action='function/pedido.php?id=$ler'>
										
													<input type='submit' name='aceita' value='aceita' />
													<input type='submit' name='aceita' value='recusa' />
										
										
										
													</form><br>";
									
									
									}
									
									
								}
							
							
							
						}
						
						?>
					
					
					
					</div>
					
				</div>
				
					
					
						<?php
						
							if (is_dir("other/". $id ."/amigo/")){
								
								
								$pu=0;
								for ($i=1; $i<=1000; $i++){
									
									$pu++;
									
									if (file_exists("other/". $id ."/amigo/". $i .".txt")){
										$abrir=fopen("other/". $id ."/amigo/". $i .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
											
											if ($pu<=2){
												
												if (file_exists("other/". $i ."/fotoperso.png")){
												

													echo "<div style='display:flex; flex-direction: column'><img style='width: 50px;' src='other/$i/fotoperso.png' alt='foto_user' />". $ler ."</div>  ";
													$pu++;
													
													
												}else{
													
													echo "<div style='display:flex; flex-direction: column'><img style='width: 50px;' src='ico/perfil.png' alt='foto_user' />". $ler ."</div>  ";
													$pu++;
													
													
												}
										
											
											
											
											}else{
												
												if (file_exists("other/". $i ."/fotoperso.png")){
												
													echo "<div style='display:flex; flex-direction: column'><img style='width: 50px;' src='other/$i/fotoperso.png' alt='foto_user' />". $ler. "</div><br>";
													$pu=0;
													
													
													}else{
													
													echo "<div style='display:flex; flex-direction: column'><img style='width: 50px;' src='ico/perfil.png' alt='foto_user' />". $ler ."</div><br>  ";
													$pu=0;
													
													
												}
												
												
												
											}
										
									
									
								}
								
								
								}
								
							}
						
						
						
						
						?>
					
					
					
					
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
	 
		
		<script src="js/scriptbasico.js"></script>
	 
	 </body>





</html>