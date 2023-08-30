<?php
session_start();

	if (!empty($_GET['id'])){
		
		$id=$_GET['id'];
		
	}else{
		$id=$_SESSION['id'];

		
	}


?>

<!doctype html>

	<html>

		<head>
			<?php echo "<title>cmm de ". $_SESSION['nome'] ." || campella</title>"; ?>
			<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
			<link rel="stylesheet" href="../../defaultstyle/corpodacmm.css" />
			<link rel="icon" href="../../ico/logoico.png" />
		
		
		</head>
		
		<body>
			
			<header	class="cabeça">
			
				<img src="../../ico/logobanner.png" alt="logo do site" />
				<nav> 
					<ul>
						<?php echo "<li onclick='usuario(1)'><a href='../../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
						<!-- o de cima é nome do usuario-->
						<li><a href="../../principaldefault.php">principal</a></li>
						<li>configuração</li>
						<li><s>camp</s></li>
						<li>feed back</li>
						<li><a href="sair">sair</a></li>
					
					
					</ul>

				</nav>
			
			
			</header>
			
			<section class="grupo">
						<span class="coluna">
							<?php
								$idcm=$_GET['idcmm'];
								$outrocmm=$_GET['outro'];
								
								if (file_exists("../../other/var/". $id ."/". $outrocmm ."/fotocmm.png")){
									
								echo  "<img id='foto' src='../../other/var/". $id ."/". $outrocmm ."/fotocmm.png' />";
								
								
								}else{
									echo  "<img id='foto' src='../../ico/fotocmm.png' />";
									
								}
							
							
							
							
							?>
							<ul>
							<?php
								echo "<li><a href='criartpc.php?idcmm=". $outrocmm ."&id=$id' >criar topicos</a></li>";
								
								?>
								
							<?php
								echo "<li><a href='showtpc.php?idcmm=". $outrocmm ."&id=$id'>mostra meus topicos</a></li>";
							
							
							
							?>
							<li>enquetes</li>
							</ul>
						</span>
					<section>
							<?php
								
								
								
								echo "<h1> configuração do $idcm</h2><br>";
								
								if (file_exists("../../other/var/". $id ."/". $idcm ."/fotocmm.png")){
									
									echo "<form method='post' action='ajuste.php?id=$id&outro=$outrocmm&idcmm=$idcm' enctype='multipart/form-data'>
									
											<label for='foto'>mudar a foto</label>
											<input type='file' accept='imagem/png' id='foto' name='foto' />
											<input type='submit' value='enviar' />
									
									
											</form>";
									
									
								}else{
									
									echo "<form method='post' action='ajuste.php?id=$id&outro=$outrocmm&idcmm=$idcm' enctype='multipart/form-data'>
									
											<label for='foto'>adicionar foto</label>
											<input type='file' accept='imagem/png' id='foto' name='foto' />
											<input type='submit' value='enviar' />
									
									
											</form>";
									
									
								}
								
							
							
							//echo "<a href='../../other/var/". $id ."/". $outrocmm ."/pivado/1.txt'>golfe</a>";
							
							if (file_exists("../../other/var/". $id ."/". $outrocmm ."/privado/1.txt")){//echo "aaaaaaaaaaaa";
								
								$abrir=fopen("../../other/var/". $id ."/". $outrocmm ."/privado/1.txt","r+");
								$priv=fgets($abrir);
								fclose($abrir);
								
								
								if ($priv==1){
								
								echo "<form method='post' action='ajuste.php?id=$id&idcmm=$idcm&outro=$outrocmm'>
								
										<textarea name='desc' rows='5' cols='30' placeholder='coloque aqui sua descrição'></textarea><br>
										<fieldset style='border-color: black'> <legend>visibilidade</legend>
											<select name='visi'>
													<option value='privado'>privado</option>
													<option value='publico'>publico</option>
													<option value='mod'>moderado</option>
																							</select>
																							
										</fieldset>
										<input type='submit' value='enviar' />
								
								
									</form>";
									
									
								}elseif ($priv==0){
									
									
								echo "<form method='post' action='ajuste.php?id=$id&idcmm=$idcm&outro=$outrocmm'>
								
										<textarea name='desc' rows='5' cols='30' placeholder='coloque aqui sua descrição'></textarea><br>
										<fieldset style='border-color: black'> <legend>visibilidade</legend>
											<select name='visi'>
													<option value='publico'>publico</option>
													<option value='mod'>moderado</option>
													<option value='privado'>privado</option>
																							</select>
																							
										</fieldset>
										<input type='submit' value='enviar' />
								
								
									</form>";
									
									
								}elseif ($priv==2){
									
									
								echo "<form method='post' action='ajuste.php?id=$id&idcmm=$idcm&outro=$outrocmm'>
								
										<textarea name='desc' rows='5' cols='30' placeholder='coloque aqui sua descrição'></textarea><br>
										<fieldset style='border-color: black'> <legend>visibilidade</legend>
											<select name='visi'>
													<option value='mod'>moderado</option>
													<option value='publico'>publico</option>
													<option value='privado'>privado</option>
																							</select>
																							
										</fieldset>
										<input type='submit' value='enviar' />
								
								
									</form>";
									
									
									
									
									
									
								}
								
								
								
								
							}
			
							
							?>
					</section>
					
					<section>
					
						<h2>pessoas participando da cmm </h2>
						<?php
						
							if (is_dir("../../other/var/". $id ."/". $idcm ."/autoria/")){
								
								$li=array_diff(scandir("../../other/var/". $id ."/". $idcm ."/autoria/"),['.','..']);
								
								foreach ($li as $varia){
									
									$foto= (file_exists("../../other/$varia/fotoperso.png")) ? "<img style='width: 50px;height:50px' src='../../other/$varia/fotoperso.png' />": "<img style='width: 50px;' src='../../ico/userdefault.png' />";
									$nomedolado= array_diff(scandir("../../friend/$varia/"),['.','..']);
									$nomedolado[2]=str_replace("1-","",$nomedolado[2]);
									
									echo "<span>". $foto ." <a href='../../friend/userseeuser.php?id=$varia'>". $nomedolado[2] ."</a></span>";
									
									
								}
								
								
								
							}// exibi pessoas que participa da comunidade
						
						
						  if (is_dir("../../other/var/". $id ."/". $outrocmm ."/tmp/")){
							  
							  echo "<h2>pessoas querendo participa</h2><br>";
							  
							  
							  $redi=array_diff(scandir("../../other/var/". $id ."/". $outrocmm ."/tmp/"),['.','..']);
							  
							  
							  	foreach ($redi as $pula){
									
									$abrir=fopen("../../other/var/". $id ."/". $outrocmm ."/tmp/". $pula,"r+");
									$ler=fgets($abrir);
									fclose($abrir);
									
									$pula= str_replace(".txt","",$pula);
									$foto= (file_exists("../../other/$pula/fotoperso.png")) ? "<img style='width: 50px;height:50px' src='../../other/$pula/fotoperso.png' />": "<img style='width: 50px;' src='../../ico/userdefault.png' />";
									
									echo $foto ."<form method='post' action='modera.php?id=$id&idcmm=$ler&outro=$outrocmm&pu=$pula&true=1'>
									
									
												<input type='submit' value='aceita' />
												<input type='submit' name='deleta' value='deleta' />
									
																																</form>";
									
									
								}
							  
							  
							  
							  
							  
							  
							  
							  
						  }
						
						
						
						?>
					
					
					
					
					</section>
					
				</section>
			
			
		</body>
		
	</html>