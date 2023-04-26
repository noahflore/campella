<?php session_start(); 

	require_once "../compactar.php";
	require_once "../function/objeto/Usuario.php";
	require_once "../function/conexao.php";

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: ../login.php");
		
	}
	if (!empty($_SESSION['idfriend'])){ unlink("../other/". $_SESSION['idfriend'] ."/true"); unset($_SESSION['idfriend']);}

	if (file_exists("../other/". $_SESSION['id'] ."/zip.zip")){descompacta($_SESSION['id']);unlink("../other/". $_SESSION['id'] ."/zip.zip");}

	if (file_exists("../other/". $_SESSION['id'] ."/tmp/tmpupdate.txt")){unlink("../other/". $_SESSION['id'] ."/tmp/tmpupdate.txt"); rmdir("../other/". $_SESSION['id'] ."/tmp/");}


	
	$nome=$_SESSION['nome'];
	$sobrenome=$_SESSION['sobrenome'];
	$id= $_SESSION['id'];

	$user= new Usuario($nome,$sobrenome,$id,$cone);
?>
<!doctype html>

<html>

	 <head>
	 
	 <title><?php echo "recados d ". $_SESSION['nome']; ?> || kampella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 <link rel="icon" href="../ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logobanner.png" alt="logo do site" />
			<nav id="cabecuda"> 
				<ul>
					<?php echo "<li><a id='click' href='../userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<li><span id="lista"><input type='button' onclick="config(4)" id="config" value='configuração' /></span></li>
					<!-- o de cima é nome do usuario-->
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair()">deslongar</button></li>
				
				
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
								<li><div><a href="../premio.php">fotos</a><img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div><a href="../premio.php">videos</a><img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div><a href="scrapuser.php?index=1">recados</a><img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div><a href='depoiuser.php'>depoimento</a><img src='../ico/depoi.png' alt='depoi_png' /></div></li>
								<?php
						if (empty($_GET['robots'])){
							$valor=$user->mostrar();
							$compara=$user->bonusday();
						
						
							if (!empty($_SESSION['pin'])){
								
								$pin=$_SESSION['pin'];
								echo "<span id='pop' style='position:fixed; background-color:white;top:50%;'>essa é sua senha guarde em um local seguro<hr><br>
								<strong>senha:</strong> ". $pin ."</span>";
								unset($_SESSION['pin']);
								
								
								
							}
						//	print_r($user);
						
							if (($compara>$valor) and ($compara>0)){
								
								$_SESSION['valor']=$compara;
						
								echo "<li><div style='font-size:20px;color:green'>+". $_SESSION['valor'] ."<img src='../ico/logocampella.png' alt='valor_png' /></div></li>";
								//unset($valor);
								
							}else {
								
								
								echo "<li><div>". $valor ."<img src='../ico/logocampella.png' alt='valor_png' /></div></li>";
								
								
							}
						
						}
						?>
								<!-- use o php no valor ai cima-->
							</ul>
						
						
						
				</aside>
				
					
				<div class="caixa">
				<h1>pagina de recados</h1>
				
				<div>
					<div>
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
												
												if (($ler!=$max) and ($max-$min==$max-4)){
													
													$abrir3=fopen("../other/". $id ."/recado/max.txt","w+");
													fwrite($abrir3,$ler);
													//fclose($abrir);
													fclose($abrir3);
													
												}else{
													
													$abrir3=fopen("../other/". $id ."/recado/max.txt","w+");
													fwrite($abrir3,$min+4);
													//fclose($abrir);
													fclose($abrir3);
													
													
													
												}
												
												if(($min-$max!=$max-4) and ($min-$max>5)){
													
													$abrir3=fopen("../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,$max-4);
													fclose($abrir3);
													
												}else{
													$abrir3=fopen("../other/". $id ."/recado/min.txt","w+");
													fwrite($abrir3,1);
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
										fwrite($abrir2,$ler);
										fwrite($abrir3,$max);
										fclose($abrir);
										fclose($abrir2);
										fclose($abrir3);
										
										header("location: scrapuser.php?index=$ler");
										
									}//configura o minimo ,maximo e o index
									
									
									echo "<a href='scrapuser.php?bo=<'><< </a>";
									
									for($l=$min+1;$l<$max; $l++){
										
										
										
										echo  "<a href='scrapuser.php?index=". $l ."'>". $l ."</a> ";
										
										
										
									}
									
									echo "<a href='scrapuser.php?bo=>'> >> </a>";
									//exibi o index
									//print_r($mostrar);
									echo "<form method='post' action='../function/recado.php'>
										  <textarea cols='90' rows='5' class='recado' type='text' placeholder='digita aqui seu recado' name='texto'></textarea>
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  
										  
										  
										  </div></form><br>
									
									
									
									
									
									";
									
									
									
									
										
										if(!empty($_GET['index'])){
											
											$index=$_GET['index'];
											
											$ab_tmp=fopen("../other/". $id ."/recado/". $index ."/010.txt","r+");
											$tmp=fgets($ab_tmp);
											fclose($ab_tmp);
											
											for($i=1;$i<=$tmp; $i++){
												
												if ((is_dir("../other/". $id ."/recado/". $index ."/". $i)) and (!file_exists("../other/". $id ."/recado/". $index ."/". $i ."/bot.txt"))){
													$r=array_diff(scandir("../other/". $id ."/recado/". $index ."/". $i),['.','..']);
													if (!empty($r[3])){$r[1]=$r[2]; $r[2]=$r[3];}
													if (file_exists("../other/$r[1]/fotoperso.png")){ 
														$foto= 	"<img style='width: 50px' src='../other/$r[1]/fotoperso.png' alt='foto_png_user' />";
														
														
													}else{
														
														$foto= "<img src='../ico/perfil.png' alt='foto_png_user' />";
														
														
													}
													$po=fopen("../other/". $id ."/recado/". $index ."/". $i ."/". $r[2],"r+");
													$receba=fgets($po);
													$r[2]=str_replace(".txt"," - ",$r[2]);
													fclose($po);
													
														echo "<div class='linha'>". $foto ."   ". $r[2]." ". $receba ."</div><form method='post' action='functionuser/recado.php?i=$i&r=$r[2]&index=$index&ap=$r[1]'>
														
																							
																						<span id='res$i'><input class='aperta' type='button' value='responde' id='responde$i' onclick='responde($i,$r[1])' /></span>
																							<input class='aperta' type='submit' value='apagar' />
														
														</form><br>";
													
												
												}elseif (file_exists("../other/". $id ."/recado/". $index ."/". $i ."/bot.txt")){
													
													$r=array_diff(scandir("../other/". $id ."/recado/". $index ."/". $i),['.','..']);
													if (!empty($r[3])){$r[1]=$r[2]; $r[2]=$r[3];}
													$foto= (!empty($r[1]))? "<img style='width: 50px' src='../other/$r[1]/fotoperso.png' alt='foto_png_user' />": "<img src='../ico/perfil.png' alt='foto_png_user' />";
													$po=fopen("../other/". $id ."/recado/". $index ."/". $i ."/". $r[2],"r+");
													
													while (!feof($po)){	$receba= $receba . fgets($po);}
													$r[2]=str_replace(".txt"," - ",$r[2]);
													
													
													echo "<div class='linha'>". $foto ."   ". $r[2]." ". $receba ."</div><form method='post' action='functionuser/recado.php?i=$i&r=$r[2]&index=$index&ap=-1'>
														
																							
																						
																							<input class='aperta' type='submit' value='apagar' />
														
														</form><br>";
													
													
													fclose($po);
												}
												
											}
											
										}//exibi os recados 
										
								}else{
									
									echo "<form method='post' action='../function/recado.php'>
										  <textarea cols='30' rows='5' class='recado' type='text' placeholder='digita aqui seu recado' name='texto'></textarea>
										  <input class='recado' type='submit' value='enviar' />
										  <div class='recadomeu'>
										  
										  
										  
										  </div>
									
									
									
									
									
									";
									
									
								}
							
							if (!empty($_GET['tmp'])){
								
								$aptmp=$_GET['tmp'];
								
									if ($aptmp==1){
										
										if (file_exists("../other/". $id ."/recado/tmp/tmpupdate.txt")){
											
											unlink("../other/". $id ."/recado/tmp/tmpupdate.txt");
											rmdir("../other/". $id ."/recado/tmp/");
											
										}
										
									}
								
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
		 	<script src="../js/scriptbasico.js"></script>
	 </body>





</html>