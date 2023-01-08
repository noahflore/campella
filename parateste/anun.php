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

<html>

	 <head>
	 
	 <title>anuncio || kampella</title>
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


			<div style="margin-top:100px;margin-left:300px;background-color:red;color:white;"><p> aqui onde ficar suas referencias de anuncio<wbr> clicar em comfirma somente quando o cliente <wbr>
				 comprar o produto após confirma espera entre 7 dias que o dono vai te da sua recompensa</p></div>

			<?php
		 
		 
		 		if (!empty($_GET['true'])){$chave=$_GET['pro'];$numero=$_POST['num'];confirma($id,$chave,$numero,$cone);}
		 
		 		if (is_dir("other/$id/venda/")){
					
					$ref=array_diff(scandir("other/$id/venda/"),['.','..']);
					
					
					foreach ($ref as $l){
						
						$span=str_replace("dropmagic","",$l);
						$mi=str_replace("dropmagic","true",$l);
						
						if ($span==$mi){//echo $span . "  ";
							
							$abrir=fopen("other/$id/venda/$l","r+");
							$ler=fgets($abrir);
							fclose($abrir);

							$l=str_replace(".txt","",$l);
							echo "https://". $ler ."<form method='post' action='anun.php?true=1&pro=$l'>

													numero do cliente: <input type='number' name='num' />
													<input type='submit' value='confirma!' /></form><br>";

						
						
							
						}
					}
					
					
					
				}
		 
		 
		 
		 	?>
		 <div><p>aqui onde ficar seus "produtos"</p></div>
		 
		 
		 <?php
		 
		 	if (is_dir("other/$id/venda/")){
					
					$ref=array_diff(scandir("other/$id/venda/"),['.','..']);
					
					
					foreach ($ref as $l){
						
						$span=str_replace("dropmagic","",$l);
						$mi=str_replace("dropmagic","true",$l);
						
						if ($span!=$mi){
							
							$abrir=fopen("other/$id/venda/$l","r+");
							$ler=fgets($abrir);
							fclose($abrir);

							$l=str_replace(".txt","",$l);
							$l=str_replace("dropmagic","",$l);
							$l=str_replace("_"," ",$l);
							echo  $l ."  <h3>essa é sua chave use ela caso for necessario</h3> <span style='background-color:red;color:white'>$ler</span><br>";

						
						
							
						}
					}
					
					
					
				}
		 
		 
		 
		 
		 
		 ?>

	</body>
	
</html>
