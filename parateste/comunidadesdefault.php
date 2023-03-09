<?php session_start(); require_once "compactar.php";

	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}


	if (!empty($_SESSION['idfriend'])){ unlink("other/". $_SESSION['idfriend'] ."/true"); unset($_SESSION['idfriend']);}

	if ((!file_exists("other/". $_SESSION['id'] ."/true")) and (!file_exists("other/". $_SESSION['id'] ."/recado/1/1/bot.txt"))){compacta($_SESSION['id']); if (file_exists("other/". $_SESSION['id'] ."/open")){unlink("other/". $_SESSION['id'] ."/open");}}




?>
<!doctype html>

<html>

	 <head>
	 
	 <title>comunidades || kampella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/cmm.css" />
	 <link rel="icon" href="ico/logoico.png" />
		 
	 </head>
	 
	 <body>
		<header	class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" />
			<nav id="cabecuda"> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li onclick='usuario(2)'><a href="principaldefault.php">principal</a></li>
					<li><span id="lista"><input type='button' onclick="config(2)" id="config" value='configuração' /></span></li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair(1)">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section>	
			<main class="cmm">
				<h1>criar sua comunidade</h1>
					<form method="post" action="function/criarcmm.php" enctype="multipart/form-data">
						<label for="cmm">nome da comunidade</label>
						<input type="text" name="nomecmm" id="cmm" />
						<label for="des">decrisção da comunidade</label><br>
						<textarea cols="30" rows="5" id="des" name="desc" ></textarea><br>
						<label for="fotocmm">foto da comunidade</label>
						<input type="file" accept="image/png" id="fotocmm" accept="image/png" name="fotocmm" />
						<input type="submit" value="enviar" />
						<!-- camp
						<label for="corfundo">cor de fundo</label>
						<input type="color" id="corfundo" />
						-->
				
					</form>
			
			</main>
			
			<aside style="margin-top:110px">
				
				<?php
					$id= $_SESSION['id'];
					if (is_dir('other/var/'. $id)){
						//$r= array_diff(scandir('other/var/'. $id), ['.','..']);
						
						if(file_exists("other/var/". $id ."/updatecmm.txt")){
							
							$abrir=fopen("other/var/". $id ."/updatecmm.txt","r+");
							$ler=fgets($abrir); //print_r($ler);
							fclose($abrir);
							
							for( $l=$ler; $l>=1; $l--){
								
								$abrir=fopen("other/var/". $id ."/". $l .".txt","r+");
								$guarda=fgets($abrir);
								$r[$l]=$guarda;
								fclose($abrir);
								//print_r($r);
								
							}
							//print_r($r);
							$r=array_unique($r);
							sort($r);
						}
						
						$pula=1;
						$fecho=true;
						foreach ($r as $lista){
							
							if ((!isset($_GET['index'])) or ($_GET['index']==$lista) or ($fecho==false)){$fecho=false;
								
								echo "<a href='userpage/insidecmm.php?nomecmm=". $lista ."'>". $lista . "</a><br>";
								$pula++;
								if ($pula>=10){$inde=$lista;echo "<a href='comunidadesdefault.php?index=$inde'>>></a>"; break;}
								
							}
						}
						if (isset($_GET['index'])){$pp=0;
						
							$loob=array_keys($r);// print_r($loob);
							foreach ($loob as $mane){
								
								$looba=$mane;
								
							}
							for ($i=0;$i<=$looba;$i+=10){
								$pp++;
								echo "<a href='comunidadesdefault.php?index=". $r[$i] ."&nume=$i'>$pp ,</a>";
								
							}
							
							echo "<a href='comunidadesdefault.php'><<</a>";
						
						
						}
					}
				//lembra de configura o id
				?>
			
			</aside>
		</section>
	 
		 
		 <script src="js/scriptbasico.js"></script>
	 </body>





</html>