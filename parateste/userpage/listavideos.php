<?php session_start(); require_once "../function/conexao.php";
					   require_once "../function/objeto/Usuario.php";

$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
$sobrenome=$_SESSION['sobrenome'];

$user= new Usuario($nome,$sobrenome,$id,$cone);



?>


<!doctype html>

<html>

	 <head>
	 
	 <title>videouser || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="../defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="../defaultstyle/userpage.css" />
	 <link rel="icon" href="../ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="../ico/logobanner.png" alt="logo do site" />
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
					
					
						if((is_dir("../other/" . $id)) and (file_exists("../other/" . $id."/fotoperso.png"))){
								
								echo "<img id='especial' src='../other/". $id ."/fotoperso.png' alt='foto do usuario' />";
							
						}else{
							
							echo"<img id='especial' src='../ico/userdefault.png' alt='foto do usuario' />";
							
						}
						
						?>
							<ul  class="lateral">
								<li><div>fotos<img src="../ico/perfil.png" alt="foto_png" /></div></li>
								<li><div>videos<img src="../ico/videos.png" alt="videos_png" /></div></li>
								<li><div><a href="scrapuser.php?index=1">recados</a><img src="../ico/scrapbook.png" alt="scrapbook_png" /></div></li>
								<li><div><a href='depoiuser.php'>depoimento</a><img src='../ico/depoi.png' alt='depoi_png' /></div></li>
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



<?php
	$id=$_SESSION['id'];
	$play=$_GET['play'];
	$exibir=array_diff(scandir('../other/'. $id .'/videos/'. $play .'/'),['.','..']);
	
	foreach ($exibir as $li){
		
		$abrir=fopen('../other/'. $id .'/videos/'. $play .'/'. $li,"r+");
		$ler=fgets($abrir);
		fclose($abrir);
		$ler=str_replace("https://www.youtube.com/watch?v=","www.youtube.com/embed/",$ler);
		
		echo "<div style='margin-top:60px;margin-left:20px;'><iframe width='200' height='200' src='https://". $ler ."' title='video_user' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>";
		
		
	}




?>
			
		</body>
</html>