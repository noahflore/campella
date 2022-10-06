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
			<title>cmm_do_user || campella</title>
			<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
			<link rel="stylesheet" href="../../defaultstyle/corpodacmm.css" />
		
		
		</head>
		
		<body>
			
			<header	class="cabeça">
			
				<img src="../../ico/logocampella.png" alt="logo do site" />
				<nav> 
					<ul>
						<li><a href="userdefault.php">user</a></li>
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
						<span>
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
								echo "<li><a href='usercmm/criartpc.php?idcmm=". $idcm ."' >criar topicos</a></li>";
								
								?>
								
							<?php
								echo "<li><a href='usercmm/showtpc.php?idcmm=". $idcm ."'>mostra meus topicos</a></li>";
							
							
							
							?>
							<li>enquetes</li>
							<li>configuração</li>
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
			
							
							?>
					</section>
					
					<section>
					
						<?php
						
							if (is_dir("../../other/var/". $id ."/". $idcm ."/autoria/")){
								
								$li=array_diff(scandir("../../other/var/". $id ."/". $idcm ."/autoria/"),['.','..']);
								
								foreach ($li as $varia){
									
									echo "<img style='width: 50px;' src='../../other/$varia/fotoperso.png' />";
									
									
								}
								
								
								
							}
						
						
						
						?>
					
					
					
					
					</section>
					
				</section>
			
			
		</body>
		
	</html>