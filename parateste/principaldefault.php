<?php session_start(); require_once "compactar.php";
					   require_once "function/afiliado.php";
					   require_once "function/objeto/Usuario.php";
					   require_once "function/conexao.php";


	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (!empty($_GET["robots"])){
		$robots=$_GET['robots'];
		$nome="para";
		$sobrenome="bellas";
		$id=0;
		$login="on";
		
		
	}

	if (empty($_GET["robots"])){
	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}

	if (!empty($_SESSION['idfriend'])){ unlink("other/". $_SESSION['idfriend'] ."/true"); unset($_SESSION['idfriend']);}

	if ((!file_exists("other/". $_SESSION['id'] ."/true")) and (!file_exists("other/". $_SESSION['id'] ."/recado/1/1/bot.txt"))){compacta($_SESSION['id']); if (file_exists("other/". $_SESSION['id'] ."/open")){unlink("other/". $_SESSION['id'] ."/open");}}

	}

	$nome=$_SESSION['nome'];
	$sobrenome=$_SESSION['sobrenome'];
	$meuid=$_SESSION['id'];

	$user= new Usuario($nome,$sobrenome,$meuid,$cone);
?>
<!doctype html>

<html>

	 <head>
	 
	 <title>principal || kampella</title>
	 <meta charset="utf-8" />
	 <meta name="author" content="giovanne" />
	 <meta name="description" content="procura uma rede social nova e com uma nova maneira de socializa? ou apenas um passa-tempo em um lugar diferente? aqui é o lugar" />
     <meta name="robots" content="index,nofollow" />
	 <meta name="keywords" content="rede,social,amigos,jogos,bate papo,chat,depoimentos,recados,comunidades,fotos,gif,fake,prfil,preview" />
	 <meta name="viewport" content="width=device-width,initial-scale=0.0" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/bloco.css" />
	 <link rel="icon" href="ico/logoico.png" />
		 
		 
		 
		 <style>
			 
			 .cita{

				margin-left: 20px;
				margin-top: 5px;


	
			}
			 
			 
			 
			 
		 </style>
		 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" /><?php $v=random_int(1,3);echo "<span id='prop'>". anuncio("[p$v]") ."</span>";?>
			<nav id="cabecuda"> 
				<ul>
					<?php
					
						if (!empty($_GET['mode'])){
					
							echo "<li onclick='usuario(1)'><a href='userdefault.php?mode=1'>". $_SESSION['nome'] ."</a></li>"; 
					
						}else{
							
							echo "<li onclick='usuario(1)'><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; 
							
							
						}
					
					
					
					?>
					<!-- o de cima é nome do usuario-->
					<li><span id="lista"><input type='button' onclick="config(2)" id="config" value='configuração' /></span></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair(1)">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section class="lado">
			<!--lateral esq-->
			<aside class="flutuar">
			
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
								
								if (!empty($_GET['mode'])){
									
									echo "<li><div><a id='ben' onclick='preto(1)' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><span style='background-color:red;border-radius:5px;'><img src='ico/scrapbooka.png' alt='scrapbook_png' /></span></div></li>";
								
									
								}else{
									echo "<li><div><a id='ben' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><span style='background-color:red;border-radius:5px;'><img src='ico/scrapbooka.png' alt='scrapbook_png' /></span></div></li>";
								
									
								}
							}else{
								
								if (!empty($_GET['mode'])){
									
									echo "<li><div><a id='ben' onclick='preto(1)' href='userpage/scrapuser.php?index=1'>recados</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
									
								}else{
									
									echo "<li><div><a id='ben' href='userpage/scrapuser.php?index=1'>recados</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
									
									
									
								}
								
								
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
					
						<?php
						if (empty($_GET['robots'])){
							$valor=$user->mostrar();
							$user->bonusday();
						
						
							if (!empty($_SESSION['pin'])){
								
								$pin=$_SESSION['pin'];
								echo "<span id='pop' style='position:fixed; background-color:white;top:50%;'>essa é sua senha guarde em um local seguro<hr><br>
								<strong>senha:</strong> ". $pin ."</span>";
								unset($_SESSION['pin']);
								
								
								
							}
						//	print_r($user);
						
							if ($valor>$_SESSION['valor']){
								
								$_SESSION['valor']=$valor;
						
								echo "<li><div style='font-size:20px;color:green'>+". $_SESSION['valor'] ."<img src='ico/logocampella.png' alt='valor_png' /></div></li>";
								//unset($valor);
								
							}else {
								
								
								echo "<li><div>". $valor ."<img src='ico/logocampella.png' alt='valor_png' /></div></li>";
								
								
							}
						
						}
						?>
						<!-- use o php no valor ai cima-->
					
				</ul>
			
			
			</aside>
			<main>
				<div>
					<div id="descerb" style="margin-left:500px;">
					<h1>comunidades</h1>
							<div><a href="updatesee.php">campella-update</a></div>
					<!-- organizar as comunidades-->
						<input type="button" onclick="desce()" value="desce" id="descer" />
						
					</div>
					<?php
					$lista= 'other/var/index';
					$meuid=$_SESSION['id'];
					
					
					/* se esse codigo não for util excluar
					
					$primeiro=fopen("other/var/index/update.txt",'r');
					$esconde =  fgets($primeiro);
					$r= array_diff(scandir($lista,1), ['.','..','update.txt']);
					fclose($primeiro);
					*/
					$diferente=" ";
					for ($cc=1; $cc<=50; $cc++){
						
						if (file_exists("other/var/index/". $cc .".txt")){
							$care=fopen('other/var/index/'. $cc .'.txt','r+');
							$carregar=fgets($care);
							$r[$cc]=$carregar;
							fclose($care);
						}
						
						
					}
					$r=array_unique($r);
				//	print_r($r);corrigir o problema do array
					
						
					$lembra=1;
					$i=1;
					$dina=1;
					foreach ($r as $l){
						
						
							
							
							while(!is_dir("other/var/". $id ."/". $l ."/")){

								$abrir=fopen("other/var/index/update/update.txt","r+");
								$ler=fgets($abrir);
								fclose($abrir);
								for ($i=$lembra; $i<=$ler;$i++){
									$abrir=fopen("other/var/index/update/". $i .".txt","r+");
									$id=fgets($abrir);
									if (is_dir("other/var/". $id ."/". $l ."/")){break;}
									fclose($abrir);

								}
								break;
							}
							$lembra=$i;
						if(file_exists("other/var/". $id ."/". $l ."/momento.txt")){

							$assunto= fopen("other/var/". $id ."/". $l ."/momento.txt","r+");

						}


						if (file_exists("other/var/". $id ."/". $l . "/show2.txt")){
							$lendo2 = fopen("other/var/". $id ."/". $l . "/show2.txt",'r');


						}

						if (file_exists("other/var/". $id ."/". $l . "/show3.txt")){
							$lendo3 = fopen("other/var/". $id ."/". $l . "/show3.txt",'r');


						}


						if (file_exists("other/var/". $id ."/". $l . "/show.txt")){
							$lendo = fopen("other/var/". $id ."/". $l . "/show.txt",'r');
							$buffer4= (file_exists("other/var/". $id ."/". $l . "/momento.txt"))? fgets($assunto): " " ;
							while(!feof($lendo))
							{ $buffer= fgets($lendo);  
							  $buffer2= (file_exists("other/var/". $id ."/". $l . "/show2.txt"))? fgets($lendo2): " " ;
							  $buffer3= (file_exists("other/var/". $id ."/". $l . "/show3.txt"))? fgets($lendo3): " " ;
							  $sa=(file_exists("other/var/". $id ."/". $l . "/sa.txt")) ? fopen("other/var/". $id ."/". $l . "/sa.txt","r+"):"";
							  $sb=(file_exists("other/var/". $id ."/". $l . "/sb.txt")) ? fopen("other/var/". $id ."/". $l . "/sb.txt","r+"):"";
							  $sc=(file_exists("other/var/". $id ."/". $l . "/sc.txt")) ? fopen("other/var/". $id ."/". $l . "/sc.txt","r+"):"";
							  $saa= (!empty($sa)) ? fgets($sa):"";
							  $sba= (!empty($sb)) ? fgets($sb):"";
							  $sca= (!empty($sc)) ? fgets($sc):"";
							  if (!empty($sa)){fclose($sa);}
							  if (!empty($sb)){fclose($sb);}
							  if (!empty($sc)){fclose($sc);}
							  $fshow=(file_exists("other/". $saa ."/fotoperso.png"))? "<img class='ico' src='other/". $saa ."/fotoperso.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";
							  $fshow2=(file_exists("other/". $sba ."/fotoperso.png"))? "<img class='ico' src='other/". $sba ."/fotoperso.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";
							  $fshow3=(file_exists("other/". $sca ."/fotoperso.png"))? "<img class='ico' src='other/". $sca ."/fotoperso.png' alt='foto_show' />": "<img class='ico' src='ico/perfil.png' alt='foto_show' /> ";

							  $dina++;
							  $bina= $dina;
							  $tina= $dina;
							  $cina= $dina;

							$fonte= (is_dir("other/var/". $id ."/". $l ."/busca/")) ?array_diff(scandir("other/var/". $id ."/". $l ."/busca/"),['.','..']):"ico/fotocmm.png" ;
							if (!file_exists("other/var/". $id ."/". $fonte[2] ."/fotocmm.png")){$fotocmma="<img id='fotope' src='ico/fotocmm.png' alt='fotocmm' />";}else{$fotocmma="<img id='fotope' src='other/var/". $id ."/". $fonte[2] ."/fotocmm.png' alt='fotocmm' />";}
								
								
							
								echo "

								<div><div class='bloco'><div class='cmmestilo'>$fotocmma    <a href='userpage/usercmm/todotpc.php?id=$id&idcmm=$l' >" . $l . "</a></div><br>
								<div><b id='". $dina ."' ><span class='escuro'>". $buffer4 ."</span></b><input id='responde' type='button' value='responde' onclick='responde($dina,`d`)' /></div>
								<div id='t$tina'><a href='friend/userseeuser.php?id=$saa'>". $fshow ."</a><span class='escuro'>". $buffer . "<span><input id='responde' type='button' value='responde' onclick='responde($tina,`t`)' /></div>
								<div><a href='friend/userseeuser.php?id=$sba'>". $fshow2 ."</a><span id='b$bina'><span class='escuro'>". $buffer2 . "</span></span><input id='responde' type='button' value='responde' onclick='responde($bina,`b`)' /></div>
								<div id='c$cina'><a href='friend/userseeuser.php?id=$sca'>". $fshow3 ."</a><span class='escuro'>".  $buffer3 . "</span><input id='responde' type='button' value='responde' onclick='responde($cina,`c`)' /></div>";

							

							$meuid=$_SESSION['id'];
							
						

							if (is_dir("other/var/". $id ."/". $l ."/busca/")){


								$busca=array_diff(scandir("other/var/". $id ."/". $l ."/busca/"),['.','..']);

								if ((is_dir("other/var/". $id ."/". $busca[2] ."/privado/")) && (file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid))){

									$privado=0;


								}elseif (is_dir("other/var/". $id ."/". $busca[2] ."/privado/")){


									$abrir=fopen("other/var/". $id ."/". $busca[2] ."/privado/1.txt","r+");
									$privado=fgets($abrir);
									fclose($abrir);


								}

							}
							if (empty($privado)){$privado=0;}

							if ((file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid) && ($privado==0)) || ($id==$meuid)){
								echo "<form method='post' action='function/reccmm.php?idcmm=" . $l . "&&id=". $id ."'>
									<textarea id='di$dina' name='texto' cols='100' rows='5'></textarea>
									<input type='submit' value='enviar' />

									</form>
									</div><br><br><br></div>";



							}else{

								echo "</div><br><br>";

							}
							
				//		}

							}

							fclose($lendo);

						}
							else{

								if(file_exists("other/var/". $id ."/". $l ."/momento.txt")){

							$assunto= fopen("other/var/". $id ."/". $l ."/momento.txt","r+");

						}



						$buffer4= (file_exists("other/var/". $id ."/". $l . "/momento.txt"))? fgets($assunto): " " ;



								$fonte= (is_dir("other/var/". $id ."/". $l ."/busca/")) ?array_diff(scandir("other/var/". $id ."/". $l ."/busca/"),['.','..']):"ico/fotocmm.png" ;
							if ($fonte=="ico/fotocmm.png"){$fotocmma="<img src='ico/fotocmm.png' alt='fotocmm' />";}else{$fotocmma="<img id='fotope' src='other/var/". $id ."/". $fonte[2] ."/fotocmm.png' alt='fotocmm' />";}
								
								/*
								
								
							!!!!	o echo de baixo aparece quando não tem comentario   !!!!
								
								
								
								
								
								
								*/
								
								if (!empty($l)){
								
								echo "

							<p><div class='bloco'><div class='cmmestilo'>$fotocmma    <a href='userpage/usercmm/todotpc.php?id=$id&idcmm=$l' >" . $l . "</a></div><br>
							<div><b>". $buffer4 ."</b></div>
							<div></div><br>
							<div></div><br>
							<div></div>
							          </p>";

								}

								$meuid=$_SESSION['id'];
							
						

							if (is_dir("other/var/". $id ."/". $l ."/busca/")){


								$busca=array_diff(scandir("other/var/". $id ."/". $l ."/busca/"),['.','..']);

								if ((is_dir("other/var/". $id ."/". $busca[2] ."/privado/")) && (file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid))){

									$privado=0;


								}elseif (is_dir("other/var/". $id ."/". $busca[2] ."/privado/")){


									$abrir=fopen("other/var/". $id ."/". $busca[2] ."/privado/1.txt","r+");
									$privado=fgets($abrir);
									fclose($abrir);


								}

							}
							if (empty($privado)){$privado=0;}

							if ((file_exists("other/var/". $id ."/". $l ."/autoria/". $meuid) && ($privado==0)) || ($id==$meuid) and (!empty($l))){
								echo "<form method='post' action='function/reccmm.php?idcmm=" . $l . "&&id=". $id ."'>
									<textarea id='di$dina' name='texto' cols='100' rows='5'></textarea>
									<input type='submit' value='enviar' />

									</form>
									</div><br><br><br></div>";



							}else{

								echo "</div><br><br>";

							}

						//	}

						}
						
						
					}
				
				
					?>
				</div>
				
				<div id="subirb" style="margin-left:500px;margin-top:-50px;">
					
					<input type="button" value="subir" onclick="subi()" id="subir" />
					
					
				</div>
			</main>
			
			<!--lateral dir-->
			<aside class="fotopa" id="baixo">
				<ul>
					<li onclick="usuario(2)"><div><img src="ico/cmm.png" alt="cmm_ico" /><a href="comunidadesdefault.php">comunidades</a></div></li>
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
			<script src="js/principal.js"></script>
	 
	 </body>





</html>