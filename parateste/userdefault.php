<?php session_start();

	require_once "compactar.php";
	require_once "function/conexao.php";
	require_once "function/objeto/Usuario.php";
	require_once "function/afiliado.php";

	
	
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

	

	$user= new Usuario($_SESSION['nome'],$_SESSION['sobrenome'],$_SESSION['id'],$cone);
	$lixo=$user->testetipo(1);


	if (!empty($_SESSION['idfriend'])){ unlink("other/". $_SESSION['idfriend'] ."/true"); unset($_SESSION['idfriend']);}

	if ((!file_exists("other/". $_SESSION['id'] ."/true")) and (!file_exists("other/". $_SESSION['id'] ."/recado/1/1/bot.txt"))){compacta($_SESSION['id']); if (file_exists("other/". $_SESSION['id'] ."/open")){unlink("other/". $_SESSION['id'] ."/open");}}

	}
?>
<!doctype html>

<html>

	 <head>
	 
	 <title><?php if (!empty($_GET["robots"])){ echo $nome ."  ". $sobrenome;}else{ echo $_SESSION['nome']. "  ". $_SESSION['sobrenome'];} ?> || kampella</title>
	 <meta charset="utf-8" />
	 <meta name="author" content="giovanne" />
	 <meta name="description" content="procura uma rede social nova e com uma nova maneira de socializa? ou apenas um passa-tempo em um lugar diferente? aqui é o lugar" />
     <meta name="robots" content="index,nofollow" />
	 <meta name="keywords" content="rede,social,amigos,jogos,bate papo,chat,depoimentos,recados,comunidades,fotos,gif,fake,prfil,preview" />
	 <meta name="viewport" content="width=device-width,initial-scale=0.0" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/user.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" /><br><?php $v=random_int(1,3);echo "<span id='prop'>". anuncio("[p$v]") ."</span>";?>
			<div>bem-vindo <?php echo"<span style='line-height:50px;color:white'>". $_SESSION['nome'] ."</span>"; ?> </div>
			<nav id="cabecuda"> 
				<ul>
					
					<?php
					
						if ((!empty($_GET['mode'])) and (empty($_SESSION['modo']))){
							
							if (($_GET['mode']==1) and (empty($_SESSION['modo']))){

								$_SESSION['modo']=2;

								header("location: userdefault.php?mode=2");



							}else if (!empty($_SESSION['modo'])){
								
								
								unset($_SESSION['modo']);
								
							}
								
								
								}
					
						if (!empty($_GET['mode'])){
							
							echo "<li onclick='usuario(2)'><a href='principaldefault.php?mode=1'>principal</a></li>";
							
							
							
							}else{
							
							echo "<li onclick='usuario(2)'><a href='principaldefault.php'>principal</a></li>";
							
							
						}
							
							
							?>
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
					if(empty($_GET['robots'])){$id= $_SESSION['id'];}
					
						if((is_dir("other/" . $id)) and (file_exists("other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='ico/userdefault.png' alt='foto do usuario' />";
							
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
									
									echo "<li><div><a id='ben' onclick='preto(1)' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><span style='background-color:red;border-radius:5px;'><img style='width:30px;height:30px;' src='ico/scrapbooka.png' alt='scrapbook_png' /></span></div></li>";
								
									
								}else{
									echo "<li><div><a id='ben' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><span style='background-color:red;border-radius:5px;'><img style='width:30px;height:30px;' src='ico/scrapbooka.png' alt='scrapbook_png' /></span></div></li>";
								
									
								}
							}else{
								
								if (!empty($_GET['mode'])){
									
									echo "<li><div><a id='ben' onclick='preto(1)' href='userpage/scrapuser.php?index=1'>recados</a><img style='width:30px;height:30px;' src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
									
								}else{
									
									echo "<li><div><a id='ben' href='userpage/scrapuser.php?index=1'>recados</a><img style='width:30px;height:30px;' src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
									
									
									
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
				
					<?php $v=random_int(7,9);echo "<span id='prop'>". anuncio("[p$v]") ."</span>";?>
					
				</aside>
				<div class="caixa">
					<div id="fotoi">
						<img src="ico/heart.png" alt="amavel" />
						<img src="ico/cool.png" alt="legal" />
						<img src="ico/fire.png" alt="sexy" />
						<img src="l" alt="bigode/bigode_de_ouro" />
						<img src="l" alt="conquista %" />
					
					<!-- o php vai se usado para exibi a quantidade de icone no perfil -->
					</div>
					
					<div>
						
						<?php
						
							if (file_exists("other/$id/sorte/1.txt")){
								$diadd= date("d");
								
							if (file_exists("other/$id/sorte/dia.txt")){
								$abrir=fopen("other/$id/sorte/dia.txt","r+");
								$leituraviva=fgets($abrir);
								fclose($abrir);
								
								
								if ($leituraviva!=$diadd){$sorte=0;
									
									while(!file_exists("sorte/". $sorte .".txt")){
										
										$sorte=random_int(1,360);
										
										if (file_exists("sorte/". $sorte .".txt")){copy("sorte/". $sorte .".txt","other/$id/sorte/1.txt");}
										
										
										
									}
									$abrir=fopen("other/$id/sorte/dia.txt","w+");
									fwrite($abrir,$diadd);
									fclose($abrir);
														  
								}
								
							}
								
							}
						
							if (!file_exists("other/$id/sorte/dia.txt")){
								$diadd= date("d");
						
								if (!is_dir("other/$id/sorte/")){mkdir("other/$id/sorte/",0777,true);}
								copy("sorte/dia.txt","other/$id/sorte/dia.txt");
								$abrir=fopen("other/$id/sorte/dia.txt","r+");
								$leituraviva=fgets($abrir);
								fclose($abrir);
								
								
								if ($leituraviva!=$diadd){
								
									$sorte=random_int(1,360);
								do{	
									
									if (!file_exists("sorte/". $sorte .".txt")){
										
										$sorte=random_int(1,360);
									if (file_exists("sorte/". $sorte .".txt")){	copy("sorte/". $sorte .".txt","other/". $id ."/sorte/1.txt");$abrir=fopen("other/". $id ."/sorte/1.txt","r+");}
										
									}else{$abrir=fopen("sorte/". $sorte .".txt","r+");copy("sorte/". $sorte .".txt","other/". $id ."/sorte/1.txt");}}while(!file_exists("sorte/". $sorte .".txt"));
									$sss=fgets($abrir);
									fclose($abrir);
									
									
									$abrir=fopen("other/$id/sorte/dia.txt","w+");
									fwrite($abrir,$diadd);
									fclose($abrir);
									
									header("location: userdefault.php?sorte=$sss");
									
									
								}
							
							
							}elseif (file_exists("other/$id/sorte/1.txt")){
									
									$abrir=fopen("other/$id/sorte/1.txt","r+");
									$sss=fgets($abrir);
									fclose($abrir);
									
										echo "<b>sorte do dia: </b><span style='background-color:#806932;color:white'>$sss</span>";
										
										
									}else{
									
								
								do{	
									
									if (!file_exists("sorte/". $sorte .".txt")){
										
										$sorte=random_int(1,360);
									if (file_exists("sorte/". $sorte .".txt")){	copy("sorte/". $sorte .".txt","other/". $id ."/sorte/1.txt");$abrir=fopen("other/". $id ."/sorte/1.txt","r+");}
										
									}else{$abrir=fopen("sorte/". $sorte .".txt","r+");copy("sorte/". $sorte .".txt","other/". $id ."/sorte/1.txt");}}while(!file_exists("sorte/". $sorte .".txt"));
									$sss=fgets($abrir);
									fclose($abrir);
									
									
																
									header("location: userdefault.php?sorte=$sss");
									
									
								}
									
								
						
								
								
								
								
								
								?>
					</div>
					
					<div>
						
						<strong>emblemas: </strong>
						<?php
						
						
						
						
						
						?>
						
						
						
					</div>
					
					<div>
						<b>visitantes: </b><?php if (file_exists("other/". $id ."/priva/p2")){echo "você desativo visitas clicar em configuração para ativar";} ?>
							<?php
							
								$dia= date("d");
								
								if ((is_dir("other/". $id ."/visi/". $dia)) and (!file_exists("other/". $id ."/priva/p2"))){
									
									$scan=array_diff(scandir("other/". $id ."/visi/". $dia),['.','..']);
									
									foreach ($scan as $vi){
										
										$abrir=fopen("other/". $id ."/visi/". $dia ."/". $vi,"r+");
										$col=fgets($abrir);
										fclose($abrir);
										$vi= str_replace(".txt","",$vi);
										
										echo "<a style='color: blue; background-color:transparent;' href='friend/userseeuser.php?id=$vi'>". $col ." ,</a>  ";
										
										
									}
									
									
									
									
								}
							
							
							
							
							?>
					
					
					</div>
					<hr>
					<div>
						<?php
							if (file_exists("other/". $id ."/desc.txt")) {
								$abrir= fopen("other/". $id ."/desc.txt",'r');
								while (!feof($abrir)){
									$buffer= fgets($abrir);
									echo "<p>". $buffer ."</p>";
									
								}
								
							}
								else{
									echo "<p>escrever sua descrição</p>";
									
								}
						// descrição do usuario
						
						echo "<div>";
						
						if(file_exists("friend/". $id ."/status.txt")){
							
							$abrir=fopen("friend/". $id ."/status.txt","r+");
							$status= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("friend/". $id ."/pais.txt")){
							
							$abrir=fopen("friend/". $id ."/pais.txt","r+");
							$pais= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("friend/". $id ."/estado.txt")){
							
							$abrir=fopen("friend/". $id ."/estado.txt","r+");
							$estado= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						if(file_exists("friend/". $id ."/cidade.txt")){
							
							$abrir=fopen("friend/". $id ."/cidade.txt","r+");
							$cidade= fgets($abrir);
							fclose($abrir);
							
							
						}
						
						
						$status= (isset($status))? $status: "";
						$pais= (isset($pais))? $pais: "";
						$estado= (isset($estado))? $estado: "";
						$cidade= (isset($cidade))? $cidade: "";
						
						echo "<hr><div style='background-color: #806932;color:white;padding-top:5px'>";
						echo "estado civil: ". $status ."<br>";
						echo "pais: ". $pais ."<br>";
						echo "estado: ". $estado ."<br>";
						echo "cidade: ". $cidade ."<br>";
						
						echo "</div>";
						echo "</div>";
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
							
									if((is_dir('friend/' . $contado)) and ($contado!=$id) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
									if ((file_exists('friend/'. $contado .'/fotoperso.png')) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
										
											if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){//print_r("exploder na tela");
												$amigo[$li]=str_replace("1-","",$amigo[$li]);
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
											
									}elseif (($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
										
										if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){//print_r("exploder na tela 2");
											$amigo[$li]=str_replace("1-","",$amigo[$li]);
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
								while((!is_dir('friend/' . $contado)) and ($contado!=$id) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
										$contado=random_int(1,1000);
										if((is_dir('friend/' . $contado)) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
									$amigo= array_diff(scandir('friend/'. $contado),['.','..']);
									while ($li <3){
										if ((file_exists('friend/'. $contado .'/fotoperso.png')) and ($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
											
											if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){//print_r("exploder na tela 3");
												$amigo[$li]=str_replace("1-","",$amigo[$li]);
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
											
										}elseif (($contado!=$lem1) and ($contado!=$lem2) and ($contado!=$lem3) and ($contado!=$lem4) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){
											
										if (!file_exists("other/". $contado ."/amigo/block/". $id .".txt") and ($contado!=$id) and (!file_exists("other/". $id ."/amigo/". $contado .".txt"))){//print_r("exploder na tela 4");
											$amigo[$li]=str_replace("1-","",$amigo[$li]);
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
								$aju=0;
								$div=0; //essa variavel vai se usado no separado de index
								if (!empty($_GET['i'])){$dora=$_GET['i'];}else{$dora=1;}
								if (!empty($_GET['ma'])){$mar=$_GET['ma'];}else{$mar=0;}
								
								echo "<div class='caixa' onmouseout='carrega()' id='amigomobi'>";
								
								for ($i=$dora; $i<=1000; $i++){
									
									// print_r($i);
									
									if ($div>=16){$mar++;echo "<a href='userdefault.php?i=$i&ma=$mar'>>>></a>";break;}
									if (isset($_GET['ma'])){
										
										$mm=$_GET['ma'];
										for($golfe=1;$golfe<=$mm;$golfe++){
											$im= $im-16; if ($im<=0){$im=0;}
															
											echo "<a href='userdefault.php?i=$im&ma=$golfe'>$golfe</a>";
											
											
										}
										unset($_GET['ma']);
										
										
										
									}
									if (file_exists("other/". $id ."/amigo/". $i .".txt")){
										$abrir=fopen("other/". $id ."/amigo/". $i .".txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
											
											$pu++;
											if ($pu<=4){ if ($aju==0){$aju=1;echo "<div>";}
												
												if (file_exists("other/". $i ."/fotoperso.png")){
												

													echo "<span><img style='width: 50px; height: 50px;' src='other/$i/fotoperso.png' alt='foto_user' /><a href='friend/userseeuser.php?id=$i'>". $ler ."</a></span>  ";
													
													$div++;
													
												}else{
													
													echo "<span><img style='width: 50px; height: 50px;' src='ico/perfil.png' alt='foto_user' /><a href='friend/userseeuser.php?id=$i'>". $ler ."</a></span> ";
													
													$div++;
													
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
					<li onclick="usuario(2)"><div><img src="ico/cmm.png" alt="cmm_ico" /><a href="comunidadesdefault.php">comunidades</a></div></li>
					<li><div><img src="ico/game.png" alt="game_ico" /><a href="jogos.php">jogos</a></div></li>
					<li><div><img src="ico/jobs.png" alt="jobs_ico" /><a href="jobs.php">tarefas</a></div></li>
					<!--o de cima vai para versão final-->
					<li><div><img src="ico/loja.png" alt="loja_ico" />lojas</div></li>
					<li><div><img src="ico/premio.png" alt="premio_ico" /><a href="premio.php">premio</a></div></li>
					<li><div><img src="ico/ad.png" alt="ad_ico" /><a href="anun.php">anuncio</a></div></li>
				
				</ul>
				
				<?php $v=random_int(4,6);echo "<span id='prop'>". anuncio("[p$v]") ."</span>";?>
			
			</aside>
		</section>
	 
		
		<script src="js/scriptbasico.js"></script>
	 
	 </body>





</html>