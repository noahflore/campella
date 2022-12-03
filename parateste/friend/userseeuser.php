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
	if ((!file_exists("../other/". $idfriend ."/open")) and (file_exists("../other/". $idfriend ."/zip.zip"))){descompacta($idfriend);copy("../other/exemplo/exemplo.txt","../other/". $idfriend ."/open");}

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
	 <link rel="icon" href="../ico/logocampella.png" />
	 
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
					<li><button onclick="sair()">deslongar</button></li>
				
				
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
						<?php if (!file_exists("../other/". $idfriend ."/amigo/". $id .".txt")){echo "<li><div id='res'><button id='add' onclick='amigo($idfriend)'>mais^</button></div></li>";}else{echo "<div id='resa'>$idfriend</div>";}
							  if (!empty($_SESSION['add'])){ echo $_SESSION['add']; unset($_SESSION['add']);}?>
						<!-- use o php no valor ai cima-->
					</ul>
				
				
				</aside>
				<div class="caixa">
					<div id="fotoi">
						
						<?php
						
							if (file_exists("../other/". $idfriend ."/amigo/". $id .".txt")){
								
								
								echo "
										<img onclick='qualida($idfriend)' id='amor' src='../ico/heart.png' alt='amavel' />
										<img onclick='qualida($idfriend)' id='legal' src='../ico/cool.png' alt='legal' />
										<img onclick='qualida($idfriend)' id='fogo' src='../ico/fire.png' alt='sexy' />
										<img src='l' alt='bigode/bigode_de_ouro' />
										<img src='l' alt='conquista %' />
					
									";
								
								}else{
								
								
								echo "
										<img src='../ico/heart.png' alt='amavel' />
										<img src='../ico/cool.png' alt='legal' />
										<img src='../ico/fire.png' alt='sexy' />
										<img src='l' alt='bigode/bigode_de_ouro' />
										<img src='l' alt='conquista %' />
					
									";
								
							}
								?>
					
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
								
								if ($sexof=="o"){
									
									$abrir=fopen("../friend/". $idfriend ."/3-o","r+");
									$se=fgets($abrir);
									fclose($abrir);
									
								}elseif ($sexof=="f"){ $se="feminimo";}else{$se="masculino";}
													   
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
						
						echo "<div>";
						
						if(file_exists("../friend/". $idfriend ."/status.txt")){
							
							$abrir=fopen("../friend/". $idfriend ."/status.txt","r+");
							$status= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("../friend/". $idfriend ."/pais.txt")){
							
							$abrir=fopen("../friend/". $idfriend ."/pais.txt","r+");
							$pais= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("../friend/". $idfriend ."/estado.txt")){
							
							$abrir=fopen("../friend/". $idfriend ."/estado.txt","r+");
							$estado= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("../friend/". $idfriend ."/cidade.txt")){
							
							$abrir=fopen("../friend/". $idfriend ."/cidade.txt","r+");
							$cidade= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						
						$status= (isset($status))? $status: "";
						$pais= (isset($pais))? $pais: "";
						$estado= (isset($estado))? $estado: "";
						$cidade= (isset($cidade))? $cidade: "";
						
						echo "estado civil: ". $status ."<br>";
						echo "pais: ". $pais ."<br>";
						echo "estado: ". $estado ."<br>";
						echo "cidade: ". $cidade ."<br>";
						
						
						echo "</div>";
						?>
					
					</div>
					
					<div class="amigos">
						<?php
						// essa parte esta desativada
				
						?>
					
					</div>
					
				</div>
				
				<?php
					//	 echo $id;
							
							if (is_dir("../other/". $idfriend ."/amigo/")){
								
								$pu=0;
								$aju=0;
								$div=0; //essa variavel vai se usado no separado de index
								
								echo "<div>";
								
								for ($i=1; $i<=1000; $i++){
									
									$div++;
									
									if (file_exists("../other/". $idfriend ."/amigo/". $i .".txt")){
										$abrir=fopen("../other/". $idfriend ."/amigo/". $i .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
											
											$pu++;
											if ($pu<=4){ if ($aju==0){$aju=1;echo "<div>";}
												
												if (file_exists("../other/". $i ."/fotoperso.png")){
												

													echo "<span><img style='width: 50px;height: 50px;' src='../other/$i/fotoperso.png' alt='foto_user' /><a href='userseeuser.php?id=$i'>". $ler ."</a></span>  ";
													
													
													
												}else{
													
													echo "<span><img style='width: 50px;height: 50px;' src='../ico/perfil.png' alt='foto_user' /><a href='userseeuser.php?id=$i'>". $ler ."</a></span> ";
													
													
													
												}
												
												
											}else{
												
												echo "</div>";
												$aju=0;
												$pu=0;
												
												
												
											}
											
											
										
										
									
									
								}
								
								
								}
								
								
								
							}
				//	print_r($pu);
					if ($pu!=0){echo "</div>";}
						echo "</div>";
						
						
				
				
				
				
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
	 
	
		<script src="js/amigo.js"></script>
		 <script src="../js/scriptbasico.js"></script>
	 </body>





</html>