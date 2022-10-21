<?php session_start(); 

			if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}
	
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../login.php");
		
	}





?>
<!docktype html>

<html>

	 <head>
	 
	 <title>scrapbook-user || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li><a href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		<section class="bloco">
				<aside>
						<?php
					$id= $_SESSION['id'];
					
						if((is_dir("../other/" . $id)) and (file_exists("../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
							<ul  class="lateral">
								<li><div><a href="fotouser.php">fotos</a><img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div><a href="videouser.php">videos</a><img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div><a href="scrapuser.php?index=1">recados</a><img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div><a href='depoiuser.php'>depoimento</a><img src='../ico/depoi.png' alt='depoi_png' /></div></li>
								<li><div>valor<img src="../ico/logocampella.png" alt="valor_png" /></div></li>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
				<h1>pagina de recados</h1>
				
				<div>
					<div>
						<h2>meus recados</h2>
							<?php
								if (is_dir("../other/". $id ."/recado")){
									
									
									
									
									if ((file_exists("../other/". $id ."/recado/min.txt")) and (file_exists("../other/". $id ."/recado/max.txt")) and (file_exists("../other/". $id ."/recado/index.txt"))){
										
										
										$abrir=fopen("../other/". $id ."/recado/min.txt","r+");
										$abrir2=fopen("../other/". $id ."/recado/index.txt","r+");
										$abrir3=fopen("../other/". $id ."/recado/max.txt","r+");
										
										$min=fgets($abrir);
										$index=fgets($abrir2);
										$max=fgets($abrir3);
										
										fclose($abrir);
										fclose($abrir2);
										fclose($abrir3);
										
										if (!empty($_GET['bo'])){
											$bo=$_GET['bo'];
											
											if ($bo==">"){
												
												$abrir=fopen("../other/". $id ."/recado/pasta.txt","r+");
												$ler=fgets($abrir);
												fclose($abrir);
												
												if ($ler!=$max){
													
													$abrir3=fopen("../other/". $id ."/recado/max.txt","w+");
													fwrite($abrir3,$ler);
													//fclose($abrir);
													fclose($abrir3);
													
												}
												
												if($min-$max!=$max-4){
													
													$abrir3=fopen("../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$max-4);
													fclose($abrir3);
													
												}
												
												
												header("location: scrapuser.php?index=". $max);
												
												
												
											}elseif ($bo=="<"){
												if ($min<=5){
													$max=5;
													$min=1;
													
													$abrir3=fopen("../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$min);
													fclose($abrir3);
													header("location: scrapuser.php?index=". $min ."&max=$max&min=$min");
													
												}else{
													$max=$min;
													$min=$min-4;
													$abrir3=fopen("../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$min);
													fclose($abrir3);
													header("location: scrapuser.php?index=". $min ."&max=$max&min=$min");
												}
												
												
												
											}
											
											
											
										}
										
									
									
									}else{
										copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/min.txt");
										copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/index.txt");
										copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/max.txt");
										
										
										$abrir=fopen("../other/". $id ."/recado/pasta.txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
										$max=$ler;
										$min=($max-4>=5)? $max=-4:1;
										
										$abrir=fopen("../other/". $id ."/recado/min.txt","w+");
										$abrir2=fopen("../other/". $id ."/recado/index.txt","w+");
										$abrir3=fopen("../other/". $id ."/recado/max.txt","w+");
										fwrite($abrir,$min);
										fwrite($abrir2,1);
										fwrite($abrir3,$max);
										fclose($abrir);
										fclose($abrir2);
										fclose($abrir3);
										
										header("location: scrapuser.php?index=1");
										
									}//configura o minimo ,maximo e o index
									
									
									echo "<a href='scrapuser.php?bo=<'><< </a>";
									
									for($l=$min+1;$l<$max; $l++){
										
										
										
										echo  "<a href='scrapuser.php?index=". $l ."'>". $l ."</a> ";
										
										
										
									}
									
									echo "<a href='scrapuser.php?bo=>'> >> </a>";
									//exibi o index
									//print_r($mostrar);
									echo "<form method='post' action='../function/recado.php'>
										  <input class='recado' type='text' placeholder='digita aqui seu recado' name='texto' />
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  
										  
										  
										  </div><br></form>
									
									
									
									
									
									";
									
									
									
									
										
										if(!empty($_GET['index'])){
											
											$index=$_GET['index'];
											
											$ab_tmp=fopen("../other/". $id ."/recado/". $index ."/010.txt","r+");
											$tmp=fgets($ab_tmp);
											fclose($ab_tmp);
											
											for($i=1;$i<=$tmp; $i++){
												
												if (is_dir("../other/". $id ."/recado/". $index ."/". $i)){
													$r=array_diff(scandir("../other/". $id ."/recado/". $index ."/". $i),['.','..']);
													if (!empty($r[3])){$r[1]=$r[2]; $r[2]=$r[3];}
													$foto= (!empty($r[1]))? "<img style='width: 50px' src='../other/$r[1]/fotoperso.png' alt='foto_png_user' />": "<img src='../ico/perfil.png' alt='foto_png_user' />";
													$po=fopen("../other/". $id ."/recado/". $index ."/". $i ."/". $r[2],"r+");
													$receba=fgets($po);
													$puro= $r[2];
													$r[2]=str_replace(".txt"," - ",$r[2]);
													fclose($po);
													
														echo "<div>". $foto ."   ". $r[2]." ". $receba ."</div><form method='post' action='functionuser/recado.php?i=$i&r=$puro&index=$index&id=$r[1]'>
														
																							
																						<span id='res$i'><input class='aperta' type='button' value='responde' id='responde$i' onclick='responde($i,$r[1])' /></span>
																							<input class='aperta' type='submit' value='apagar' />
														
														</form><br>";
													
												
												}
												
											}
											
										}//exibi os recados 
										
								}else{
									
									echo "<form method='post' action='../function/recado.php'>
										  <input class='recado' type='text' placeholder='digita aqui seu recado' name='texto' />
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  
										  
										  
										  </div>
									
									
									
									
									
									";
									
									
								}
							
							
							
							
							?>
					
					</div>
					<!-- função php para monta os arquivos-->
				
				</div>
				
				
				</div>
				
				
				<p id="res">gostou do campella? quer que ele continua?<br>
					quer saber como?<br><br>
					 <button id="filho" onclick="popup()">clicar aqui ^</button></p>
						
	
	 
		</section>
		
		
			<script src="functionuser/responde.js"></script>
	 </body>





</html>