<?php session_start();

		if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}







?>
<!docktype html>

<html>

	 <head>
	 
	 <title>comunidades || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/cmm.css" />
	 </head>
	 
	 <body>
		<header	class="cabeça">
		
			<img src="ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<li><a href="userdefault.php">user</a></li>
					<!-- o de cima é nome do usuario-->
					<li><a href="principaldefault.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
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
			
			<aside class="meucmm">
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
						
						foreach ($r as $lista){
							echo "<a href='userpage/insidecmm.php?nomecmm=". $lista ."'>". $lista . "</a><br>";
							
						};
				
					}
				//lembra de configura o id
				?>
			
			</aside>
		</section>
	 
	 </body>





</html>