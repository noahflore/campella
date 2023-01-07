<?php session_start(); 


	if(!empty($_GET['login'])){
		$_SESSION['login']="off";
		
		
	}

	if (file_exists("other/". $_SESSION['id'] ."/manu/1")){$_SESSION['login']="off"; $_SESSION['errologin']= "site em manutenção volte mais tarde";}
	if (file_exists("other/". $_SESSION['id'] ."/manu/11")){$_SESSION['login']="off"; $_SESSION['errologin']= "site foi atualizado durante você esteve offiline"; unlink("other/". $_SESSION['id'] ."/manu/11");}
		
	$login=$_SESSION['login'];
	
	
	if (($login=="off") || (empty($_SESSION['login']))){
		
		header("location: login.php");
		
	}

?>
<!doctype html>

<html>

	 <head>
	 
	 <title>loja || kampella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/userpage.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" />
			<nav id="cabecuda"> 
				<ul>
					<?php echo "<li><a id='click' href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<li><span id="lista"><input type='button' onclick="config(4)" id="config" value='configuração' /></span></li>
					<!-- o de cima é nome do usuario-->
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><button onclick="sair()">deslongar</button></li>
				
				
				</ul>

			</nav>
		
		
		</header>

<?php
		 
	$id=$_SESSION['id'];

		 
		 if (!empty($_SESSION['ref'])){ 
			 
			 $chave=$_SESSION['ref'];
			 
			 echo "<div style='margin-top:90px'>http://kampella.rf.gd/buy.php?chave=$chave&id=$id</div>";
			 echo "  <span style='color:white;background-color:red'>esse é seu link de divulgação copia ,compartilhar e ganhar</span>";
									  
									  
									  
									  
									  }
		 echo "<div style='margin-left:500px;margin-top:100px;'>";
	for ($i=1;$i<=50;$i++){
		
		
		if (file_exists("propaganda/a". $i .".png")){
			
			echo "<img style='height:100px;width:200px;' src='propaganda/a". $i .".png' /><form method='post' action='function/gera.php?id=$id&v=a$i&outro=2'>
			
															<input type='submit' value='gerar chave' />
															
															
															</form>
			
			
			<br>";
			
			
			
		}
		
		
		
		
		
		
		
	}

	echo "</div>";
		 
		 
		 
		 
		 
	 echo "<div style='margin-left:500px;margin-top:100px;'><h2>drop</h2>";
	for ($i=1;$i<=50;$i++){
		
		
		if (file_exists("propaganda/d". $i .".png")){
			
			echo "<img style='height:100px;width:200px;' src='propaganda/d". $i .".png' /><form method='post' action='function/gera.php?id=$id&d=d$i&outro=3'>
			
															<input type='submit' value='gerar chave' />
															
															
															</form>
			
			
			<br>";
			
			
			
		}
		
		
		
		
		
		
		
	}

	echo "</div>";








?>
		 <script src="../js/scriptbasico.js"></script>
	</body>
</html>