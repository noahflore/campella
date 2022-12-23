<?php session_start(); require_once "function/objeto/Usuario.php";
						require_once "function/conexao.php";
	

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}
	
	$nome=$_SESSION['nome'];
	$sobrenome=$_SESSION['sobrenome'];
	$id= $_SESSION['id'];

	$user= new Usuario($nome,$sobrenome,$id,$cone);




?>
<!doctype html>
<!--
		você tem que arruma essa config
		
		
-->
<html>

	 <head>
	 
	 <title>config || kampella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/user.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" /><br>
			<nav id="cabecuda"> 
				<ul>
				<?php echo "<li><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<li><a href="principaldefault.php">principal</a></li>
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
				<h1>configurar seu perfil</h1>
				<?php
					
					

					if((is_dir("other/" . $id)) and (file_exists("other/" . $id."/fotoperso.png"))){
						
						echo "<img id='especial' src='other/". $id ."/fotoperso.png' alt='foto do usuario' /><br>
							 <form method='post' action='configdefault.php' enctype='multipart/form-data'>
							 <div class='fotomobi'>
								<input type='file' accept='imagem/png' name='fotoperso' />
								<input type='submit' value='enviar' /><br>
								<input type='submit' name='remove' value='remove foto?'
								</div>";
						
						if (isset($_POST['remove'])){ 
						unlink('other/'. $id . '/fotoperso.png');
						header("location: configdefault.php");
						
						unset($_FILES['tmp_name']);
						
						}
						if (!empty($_FILES['fotoperso'])){
							$foto= $_FILES['fotoperso'];
							move_uploaded_file($foto['tmp_name'],'other/'. $id . '/fotoperso.png');
							copy('other/'. $id . '/fotoperso.png','friend/'. $id .'/fotoperso.png');
							unset($_FILES['tmp_name']);
							header("location: configdefault.php");
							
						}
						if (!is_dir('other/'. $id)){
						mkdir('other/'. $id,0777,true);
						}
						
						
					}else{
						echo "<img id='especial' src='ico/userdefault.png' alt='foto do usuario' /><br>
						
						<div class='fotomobi'>
							 <form method='post' action='configdefault.php' enctype='multipart/form-data'>
								<input type='file' accept='imagem/png' name='fotoperso' /><br>
								<input type='submit' value='enviar' />
							 
							 </form>
							 
							 </div>
						
						
						";
						
						if (!empty($_FILES['fotoperso'])){
							$foto= $_FILES['fotoperso'];
							move_uploaded_file($foto['tmp_name'],'other/'. $id . '/fotoperso.png');
							copy('other/'. $id . '/fotoperso.png','friend/'. $id .'/fotoperso.png');
							if (!is_dir('other/'. $id)){
							mkdir('other/'. $id,0777,true);
							}
							unset($_FILES['tmp_name']);
							header("location: configdefault.php");
							
						}
						
					}
					// o de cima modifica foto
					?>
					<ul class="fotopa">
						<li><div><a href="userpage/fotouser.php">fotos</a><img src="ico/perfil.png" alt="foto_png" /></div></li>
						<li><div><a href="userpage/videouser.php">videos</a><img src="ico/videos.png" alt="videos_png" /></div></li>
						
						<?php
						
							if(file_exists("other/". $id ."/recado/tmp/tmpupdate.txt")){
								
								$abrir=fopen("other/". $id ."/recado/tmp/tmpupdate.txt","r+");
								$ler=fgets($abrir);
								fclose($abrir);
								
								if (!empty($_GET['mode'])){
									
									echo "<li><div><a id='ben' onclick='preto(1)' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
									
								}else{
									echo "<li><div><a id='ben' href='userpage/scrapuser.php?index=1&&tmp=1'>recados   ". $ler ."</a><img src='ico/scrapbook.png' alt='scrapbook_png' /></div></li>";
								
									
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
					<form method="post" action="configdefault.php">
							<div class="formmobi">
								<?php
											echo "
												<textarea placeholder='escreva sua descrição' name='desc' cols='30' rows='5'></textarea>
												<input type='submit' value='enviar' />
												
											
											
											
											";
											
										if (!empty($_POST['desc'])){
											if(!is_dir('other/'. $id)){
												mkdir('other/'. $id,0777,true);
												
											}
											$text= $_POST['desc'];
											copy('other/exemplo/exemplo.txt','other/'. $id . '/desc.txt');
											$desc=fopen('other/'. $id .'/desc.txt', 'w+');
											fwrite($desc,$text);
											fclose($desc);
											
											
										}
								
								// esse muda a descrição
									
									
									
								
										
								?>
								
									
									
								
							
							</div>
					</form>
							
							<?php if ((!empty($_GET['true'])) and (($_GET['true']==1) || ($_GET['true']==2))){ $user->configsql();/*print_r($user);*/} ?>
					
					<div class="inputmobi">
							<form method='post' action='configdefault.php?true=1'>
											
								<fieldset><legend>genero</legend>
											
										<label for='f'>feminino</label>: 
										<input type='radio' id='f' name='genero' value='f' checked /><br>
										<label for='m'>masculino</label>: 
										<input type='radio' name='genero' id='m' value='m' /><br>
										<label for='o'>outro</label>
										<input type='radio' name='genero' id='o' value='o' /><br>
										<input type='text' name='outro' />
										<input type='submit' value='enviar' />
										
										
											
									
									
									
								</fieldset>
									
							</form>
					
								
								<form method='post' action='configdefault.php?true=2'>
									
									nome: <input type='text' name="nome" /><br>
									sobrenome: <input type='text' name="sobrenome" /><br>
									pais: <input type="text" name='pais' /><br>
									estado: <input type="text" name='estado' /><br>
									cidade:<input type="text" name='cidade' /><br>
									
									
									<?php
									
									if (file_exists("friend/". $id ."/status.txt")){
										
										$abrir=fopen("friend/". $id ."/status.txt","r+");
										$chaka=fgets($abrir);
										fclose($abrir);
										
										if ($chaka=="casado"){
											
											echo "		status civil: <select name='status'>

																	<option value='casado'>casado</option>
																	<option value='solteiro'>solteiro</option>
																	<option value='namorando'>namorando</option>
																	<option value='complicado'>complicado</option>


																		</select>";
											
											
										}elseif ($chaka=="solteiro"){
											
											echo "		status civil: <select name='status'>

																	<option value='solteiro'>solteiro</option>
																	<option value='casado'>casado</option>
																	<option value='namorando'>namorando</option>
																	<option value='complicado'>complicado</option>


																		</select>";
											
											
										}elseif ($chaka=="namorando"){
											
											echo "		status civil: <select name='status'>

																	<option value='namorando'>namorando</option>
																	<option value='casado'>casado</option>
																	<option value='solteiro'>solteiro</option>
																	<option value='complicado'>complicado</option>


																		</select>";
											
											
										}else{
											
											echo "		status civil: <select name='status'>

																	<option value='complicado'>complicado</option>
																	<option value='casado'>casado</option>
																	<option value='solteiro'>solteiro</option>
																	<option value='namorando'>namorando</option>
																	


																		</select>";
											
											
										}
										
										
										
										
										
									}else{
											echo "		status civil: <select name='status'>

																	<option value='casado'>casado</option>
																	<option value='solteiro'>solteiro</option>
																	<option value='namorando'>namorando</option>
																	<option value='complicado'>complicado</option>


																		</select>";

									}
										
										?>
												<input type="submit" value="enviar!" />
										
									
								</form>
						
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
	 
	
	 
	 </body>





</html>