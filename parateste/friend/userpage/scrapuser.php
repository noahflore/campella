<?php session_start();

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("../../other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("../../other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../../login.php");
		
	}




?>
<!doctype html>

<html>

	 <head>
		 
		 <?php
		 
			 $id= $_SESSION['id'];
		 	 $meunome=$_SESSION['nome'];
			 if (!empty($_GET['id'])){$_SESSION['seefriend']= $_GET['id'];}
		 
		 	$nomedoamigo=array_diff(scandir("../". $_SESSION['seefriend'] ."/"),['.','..']);
		 
					
					$sofia=str_replace("1-","",$nomedoamigo[2]);
		 			unset($nomedoamigo);
					
				
	 
			echo	" <title>$meunome na pagina d $sofia || kampella</title>";
				 
				 
				 ?>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../../defaultstyle/userpage.css" />
	 <link rel="icon" href="../../ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../../ico/logobanner.png" alt="logo do site" />
			<nav id="cabecuda"> 
				<ul>
					<?php echo "<li><a href='../../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><a href="../../principaldefault.php">principal</a></li>
					<li><span id="lista"><input type='button' onclick="config(5)" id="config" value='configuração' /></span></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair()">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		<section class="bloco">
				<aside>
						<?php
					
					
						if((is_dir("../../other/" . $_SESSION['seefriend'])) and (file_exists("../../other/" . $_SESSION['seefriend']."/fotoperso.png"))){
								
								echo "<img id='especial' src='../../other/". $_SESSION['seefriend'] ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
							<ul  class="lateral">
							<?php
								
								echo "<li><div><a href='fotouser.php?id=". $_SESSION['seefriend'] ."'>fotos</a><img src='../../ico/perfil.png' alt='foto_png' /></div></li>";
								
								
								
								
								
								
								?>
								<li><div><a href="videouser.php">videos</a><img src="../../ico/videos.png" alt="videos_png" /></div></li>
								<li><div><a href="scrapuser.php?index=1">recados</a><img src="../../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div><a href='depoiuser.php'>depoimento</a><img src='../../ico/depoi.png' alt='depoi_png' /></div></li>
								<li><div>valor<img src="../ico/logocampella.png" alt="valor_png" /></div></li>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
				<h1>pagina de recados</h1>
				
				<div>
					<div>
						
						<?php 
						
						$nomefriendu=array_diff(scandir("../../friend/". $_SESSION['seefriend']),['.','..']);
						
						for ($i=2;$i<=5;$i++){
							
							$nomefriendu[$i]=str_replace("1-","",$nomefriendu[$i]);
							
							
						}
						
						
					
					echo"	<h2>recados d ". $nomefriendu[2] ."</h2>";
							
							
							
							?>
							<?php
							
							$id=$_GET['id'];
							
								if((is_dir('../../other/' . $_SESSION['seefriend'] .'/recado')) && (!file_exists("../../other/". $_SESSION['seefriend'] ."/priva/p1"))){
									if ((file_exists("../../other/". $id ."/recado/min.txt")) and (file_exists("../../other/". $id ."/recado/max.txt")) and (file_exists("../../other/". $id ."/recado/index.txt"))){
										
										
										$abrir=fopen("../../other/". $id ."/recado/min.txt","r+");
										$abrir2=fopen("../../other/". $id ."/recado/index.txt","r+");
										$abrir3=fopen("../../other/". $id ."/recado/max.txt","r+");
										
										$min=fgets($abrir);
										$index=fgets($abrir2);
										$max=fgets($abrir3);
										
										fclose($abrir);
										fclose($abrir2);
										fclose($abrir3);
										
										if (!empty($_GET['bo'])){
											$bo=$_GET['bo'];
											
											if ($bo==">"){
												
												$abrir=fopen("../../other/". $id ."/recado/pasta.txt","r+");
												$ler=fgets($abrir);
												fclose($abrir);
												
												if (($ler!=$max) and ($max-$min==$max-4)){
													
													$abrir3=fopen("../../other/". $id ."/recado/max.txt","w+");
													fwrite($abrir3,$ler);
													//fclose($abrir);
													fclose($abrir3);
													
												}else{
													
													$abrir3=fopen("../../other/". $id ."/recado/max.txt","w+");
													fwrite($abrir3,$min+4);
													//fclose($abrir);
													fclose($abrir3);
													
													
													
												}
												
												if(($min-$max!=$max-4) and ($min-$max>5)){
													
													$abrir3=fopen("../../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$max-4);
													fclose($abrir3);
													
												}else{
													$abrir3=fopen("../../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,1);
													fclose($abrir3);
													
													
													
												}
												
												
												header("location: scrapuser.php?index=". $max ."&id=$id");
												
												
												
											}elseif ($bo=="<"){
												if ($min<=5){
													$max=5;
													$min=1;
													
													$abrir3=fopen("../../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$min);
													fclose($abrir3);
													header("location: scrapuser.php?index=". $min ."&max=$max&min=$min&id=$id");
													
												}else{
													$max=$min;
													$min=$min-4;
													$abrir3=fopen("../../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$min);
													fclose($abrir3);
													header("location: scrapuser.php?index=". $min ."&max=$max&min=$min&id=$id");
												}
												
												
												
											}
											
											
											
										}
										
									
									
									}else{
										copy("../../other/exemplo/exemplo.txt","../../other/". $id ."/recado/min.txt");
										copy("../../other/exemplo/exemplo.txt","../../other/". $id ."/recado/index.txt");
										copy("../../other/exemplo/exemplo.txt","../../other/". $id ."/recado/max.txt");
										
										
										$abrir=fopen("../../other/". $id ."/recado/pasta.txt","r+");
										$ler=fgets($abrir);
										fclose($abrir);
										$max=$ler;
										$min=($max-4>=5)? $max=-4:1;
										
										$abrir=fopen("../../other/". $id ."/recado/min.txt","w+");
										$abrir2=fopen("../../other/". $id ."/recado/index.txt","w+");
										$abrir3=fopen("../../other/". $id ."/recado/max.txt","w+");
										fwrite($abrir,$min);
										fwrite($abrir2,$ler);
										fwrite($abrir3,$max);
										fclose($abrir);
										fclose($abrir2);
										fclose($abrir3);
										
										header("location: scrapuser.php?index=$ler&id=$id");
										
									}//configura o minimo ,maximo e o index
									
									
									echo "<a href='scrapuser.php?id=". $id ."&bo=<'><< </a>";
									
									for($l=$min+1;$l<$max; $l++){
										
										
										
										echo  "<a href='scrapuser.php?index=". $l ."&id=$id'>". $l ."</a> ";
										
										
										
									}
									
									echo "<a href='scrapuser.php?bo=>&id=$id'> >> </a>";
									//exibi o index
									//print_r($mostrar);
									echo "<form method='post' action='../../function/recado.php?id=$id&todo=1'>
										  <textarea class='recado' type='text' placeholder='digita aqui seu recado' name='texto' cols='30' rows='5'></textarea>
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  
										  
										  
										  </div></form><br>
									
									
									
									
									
									";
									
									
									
									
										
										if(!empty($_GET['index'])){
											
											$index=$_GET['index'];
											
											$ab_tmp=fopen("../../other/". $id ."/recado/". $index ."/010.txt","r+");
											$tmp=fgets($ab_tmp);
											fclose($ab_tmp);
											
											for($i=1;$i<=$tmp; $i++){
												
												if (is_dir("../../other/". $id ."/recado/". $index ."/". $i)){
													$r=array_diff(scandir("../../other/". $id ."/recado/". $index ."/". $i),['.','..']);
													if (!empty($r[3])){$r[1]=$r[2]; $r[2]=$r[3];}
													if (file_exists("../../other/$r[1]/fotoperso.png")){ 
														$foto= 	"<img style='width: 50px' src='../../other/$r[1]/fotoperso.png' alt='foto_png_user' />";
														
														
													}else{
														
														$foto= "<img src='../../ico/perfil.png' alt='foto_png_user' />";
														
														
													}
													$po=fopen("../../other/". $id ."/recado/". $index ."/". $i ."/". $r[2],"r+");
													$receba=fgets($po);
													$r[2]=str_replace(".txt"," - ",$r[2]);
													fclose($po);
													
														echo "<div class='linha'>". $foto . $r[2]." ". $receba ."</div><br>";
													
												}
												
											}
											
										}//exibi os recados 
										
								}else{
									
									echo "<form method='post' action='../../function/recado.php?id=$id&todo=1'>
										  <textarea class='recado' type='text' placeholder='digita aqui seu recado' name='texto' cols='30' rows='5'></textarea>
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  essa pagina de recado está oculta pelo usuario<br>
										  você pode envia recado mas não pode ver o que tem dentro
										  
										  
										  </div>
									
									
									
									
									
									";
									
									
								}
							
							
							
							?>
					
					</div>
					<!-- função php para monta os arquivos-->
				
				</div>
				
				
				</div>
						
	
	 
		</section>
		 
		 <script src="../../js/scriptbasico.js"></script>
	 </body>





</html>