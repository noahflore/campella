<?php session_start(); ?>
<!docktype html>

<html>

	 <head>
	 
	 <title>principal || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../../defaultstyle/bloco.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../../ico/logocampella.png" alt="logo do site" />
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
						<li><div>fotos<img src="ico/perfil.png" alt="foto_png"/></div></li>
						<li><div>videos<img src="ico/videos.png" alt="videos_png" /></div></li>
						<li><div>recados<img src="ico/scrapbook.png" alt="scrapbook_png" /></div></li>
						<li><div>depoimento<img src="ico/depoi.png" alt="depoi_png" /></div></li>
						<li><div>valor<img src="ico/logocampella.png" alt="valor_png" /></div></li>
						<!-- use o php no valor ai cima-->
					
				</ul>
			
			
			</aside>
			<main>
				<div>
					<div>comunidades <a href="updatesee.php">campella-update</a></div>
					<!-- organizar as comunidades-->
						<input type="button" value="desce" id="desce" />
					<?php
					$lista= 'other/var/index';
					
					
					/* se esse codigo não for util excluar
					
					$primeiro=fopen("other/var/index/update.txt",'r');
					$esconde =  fgets($primeiro);
					$r= array_diff(scandir($lista,1), ['.','..','update.txt']);
					fclose($primeiro);
					*/
					$diferente=" ";
					for ($cc=1; $cc<=50; $cc++){
						
						if (file_exists("../../other/var/index/". $cc .".txt")){
							$care=fopen('../../other/var/index/'. $cc .'.txt','r+');
							$carregar=fgets($care);
							$r[$cc]=$carregar;
							fclose($care);
						}
						
						
					}
					$r=array_unique($r);
					print_r($r);// corrigir o problema do array
					
						
					$lembra=1;
					$i=1;
					$dina=1;
					foreach ($r as $l){
						
						
						while(!is_dir("../../other/var/". $id ."/". $l ."/")){
			
							$abrir=fopen("../../other/var/index/update/update.txt","r+");
							$ler=fgets($abrir);
							fclose($abrir);
							for ($i=$lembra; $i<=$ler;$i++){
								$abrir=fopen("../../other/var/index/update/". $i .".txt","r+");
								$id=fgets($abrir);
								if (is_dir("../../other/var/". $id ."/". $l ."/")){break;}
								fclose($abrir);
								
							}
							break;
						}
						$lembra=$i;
					if(file_exists("../../other/var/". $id ."/". $l ."/momento.txt")){
						
						$assunto= fopen("../../other/var/". $id ."/". $l ."/momento.txt","r+");
						
					}
					
					
					if (file_exists("../../other/var/". $id ."/". $l . "/show2.txt")){
						$lendo2 = fopen("../../other/var/". $id ."/". $l . "/show2.txt",'r');
						
						
					}
					
					if (file_exists("../../other/var/". $id ."/". $l . "/show3.txt")){
						$lendo3 = fopen("../../other/var/". $id ."/". $l . "/show3.txt",'r');
						
						
					}
					
					
					if (file_exists("../../other/var/". $id ."/". $l . "/show.txt")){
						$lendo = fopen("../../other/var/". $id ."/". $l . "/show.txt",'r');
						$buffer4= (file_exists("../../other/var/". $id ."/". $l . "/momento.txt"))? fgets($assunto): " " ;
						while(!feof($lendo))
						{ $buffer= fgets($lendo);  
						  $buffer2= (file_exists("../../other/var/". $id ."/". $l . "/show2.txt"))? fgets($lendo2): " " ;
						  $buffer3= (file_exists("../../other/var/". $id ."/". $l . "/show3.txt"))? fgets($lendo3): " " ;
						  $fshow=(file_exists("../../other/var/". $id ."/". $l . "/show.png"))? "<img class='ico' src='other/var/". $id ."/". $l ."/show.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";
						  $fshow2=(file_exists("../../other/var/". $id ."/". $l . "/show2.png"))? "<img class='ico' src='other/var/". $id ."/". $l ."/show2.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";
						  $fshow3=(file_exists("../../other/var/". $id ."/". $l . "/show3.png"))? "<img class='ico' src='other/var/". $id ."/". $l ."/show3.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";
						  
						  $dina++;
						  $bina= $dina;
						  $tina= $dina;
						  $cina= $dina;
						  
						echo "
						
						<div><div class='bloco'><div class='cmmestilo'><img id='fotope' src='other/var/". $id ."/". $l ."/fotocmm.png' alt='fotocmm' />    <a href='userpage/usercmm/todotpc.php?id=$id&idcmm=$l' >" . $l . "</a></div><br>
						<div><b id='". $dina ."' >". $buffer4 ."</b><input id='responde' type='button' value='responde' onclick='responde($dina,`d`)' /></div>
						<div id='t$tina'>". $fshow . $buffer . "<input id='responde' type='button' value='responde' onclick='responde($tina,`t`)' /></div>
						<div>". $fshow2 ."<span id='b$bina'>". $buffer2 . "</span><input id='responde' type='button' value='responde' onclick='responde($bina,`b`)' /></div>
						<div id='c$cina'>". $fshow3 .  $buffer3 . "<input id='responde' type='button' value='responde' onclick='responde($cina,`c`)' /></div>";
						
						
						
						if (file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid)){
					
						echo "<form method='post' action='function/reccmm.php?idcmm=" . $l . "&&id=". $id ."'>
							<textarea id='di$dina' name='texto' cols='100' rows='5'></textarea>
							<input type='submit' value='enviar' />
						
						</form>
						</div><br><br><br></div>";
						
						
						}
						
						
						}
						
						fclose($lendo);
						
					}
						else{
							
							if(file_exists("other/var/". $id ."/". $l ."/momento.txt")){
						
						$assunto= fopen("other/var/". $id ."/". $l ."/momento.txt","r+");
						
					}
					
					
					
					$buffer4= (file_exists("other/var/". $id ."/". $l . "/momento.txt"))? fgets($assunto): " " ;
							
							
							
							echo "
						
						<p><div class='bloco'><div class='cmmestilo'><img id='fotope' src='other/var/". $id ."/". $l ."/fotocmm.png' alt='fotocmm' />" . $l . "</div><br>
						<div><b>". $buffer4 ."</b></div>
						<div></div><br>
						<div></div><br>
						<div></div>";
						
						if (file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid)){
						
							echo "<form method='post' action='function/reccmm.php?idcmm=" . $l . "&&id=". $id ."'>
								  <textarea name='texto' cols='100' rows='5'></textarea>
								  <input type='submit' value='enviar' />
							
									</form>
									</div><br></p>";
							
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