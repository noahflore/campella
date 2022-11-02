<?php session_start(); require_once "../compactar.php";




	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../login.php");
		
	}

	
	$id= $_SESSION['id'];
	$nome= $_SESSION['nome'];
	$idfriend=$_GET['id'];
	$_SESSION['idfriend']= $idfriend;
	$dia= date("d");

	copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/true");
	if (!file_exists("../other/". $idfriend ."/open")){descompacta($idfriend);copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/open");}

	if (file_exists("../other/". $idfriend ."/amigo/block/". $id .".txt")){
		
		header("location: ../userdefault.php");
		
	}

		if (is_dir("../other/". $idfriend ."/visi/")){
			
			$ante=array_diff(scandir("../other/". $idfriend ."/visi/"),['.','..']);
			
		
			foreach ($ante as $an){
				
				if ($an !=$dia){
					
					$del=array_diff(scandir("../other/". $idfriend ."/visi/". $an),['.','..']);
					
					foreach ($del as $dd){
						
						unlink("../other/". $idfriend ."/visi/". $an ."/". $dd);
						
					}
					rmdir("../other/". $idfriend ."/visi/". $an);
					
					
				}
				
				
			}


		}
	if (!is_dir("../other/". $idfriend ."/visi/". $dia)){
		
		mkdir("../other/". $idfriend ."/visi/". $dia,0777,true);
		copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/visi/". $dia ."/". $id .".txt");
		$abrir=fopen("../other/". $idfriend ."/visi/". $dia ."/". $id .".txt","w+");
		fwrite($abrir,$nome);
		fclose($abrir);
		
		
	}else{
		
		copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/visi/". $dia ."/". $id .".txt");
		$abrir=fopen("../other/". $idfriend ."/visi/". $dia ."/". $id .".txt","w+");
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
					<li><a href="../principaldefault.php">principal</a></li>
					<li><a href="../configdefault.php">configuração</a></li>
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
						<?php if (!file_exists("../other/". $idfriend ."/amigo/". $id .".txt")){echo "<li><div id='res'><button id='add' onclick='amigo($idfriend)'>mais^</button></div></li>";}
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
						<?php
						
							if (!empty($_GET['id'])){
								
								$info= array_diff(scandir("../friend/". $idfriend ."/"),['.','..']);
								
								for ($pro=2;$pro<=5;$pro++){
									
									
									if(empty($nomef)){$nomef=str_replace("1-","",$info[$pro]);}elseif
									(empty($sobrenomef)){$sobrenomef=str_replace("2-","",$info[$pro]);}
									elseif(empty($sexof)){$sexof=str_replace("3-","",$info[$pro]);}
									
									
									//print_r($info);
								}
								
								if ($sexof=="f"){ $se="feminimo";}else{$se="masculino";}
													   
							echo $nomef ."  ". $sobrenomef ."  do sexo: ". $se;
								
								
								
								
							}
						
						
						
						
						
						
						?>
					
					</div>
					<div>
						<?php
							if (file_exists("../other/". $idfriend ."/desc.txt")) {
								$abrir= fopen("../other/". $idfriend ."/desc.txt",'r');
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
						
							
							if (is_dir("../other/". $idfriend ."/amigo/")){
								
								
								$pu=0;
								echo "<div style='display:flex; flex-direction: column'><div>";
								
								for ($i=1; $i<=1000; $i++){
									
									$pu++;
									
									if (file_exists("../other/". $idfriend ."/amigo/". $i .".txt")){
										$abrir=fopen("../other/". $idfriend ."/amigo/". $i .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
											
											
											if ($pu<=3){
												
												if (file_exists("../other/". $i ."/fotoperso.png")){
												

													echo "<img style='width: 50px;' src='../other/$i/fotoperso.png' alt='foto_user' />". $ler ."  ";
													$pu++;
													
													
												}else{
													
													echo "<div><img style='width: 50px;' src='../ico/perfil.png' alt='foto_user' />". $ler ." ";
													$pu++;
													
													
												}
										
												
											
											
											}else{
												
												if (file_exists("../other/". $i ."/fotoperso.png")){
												
													echo "<img style='width: 50px;' src='../other/$i/fotoperso.png' alt='foto_user' />". $ler. "</div>";
													$pu=0;
													
													
													}else{
													
													echo "<img style='width: 50px;' src='../ico/perfil.png' alt='foto_user' />". $ler ."</div>  ";
													$pu=0;
													
													
												}
												
												
												
											}
										
										
									
									
								}
								
								
								}
								
								
								echo "</div>";
							}
						
						
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