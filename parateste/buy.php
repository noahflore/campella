<?php require_once "function/conexao.php"; require_once "function/objeto/Usuario.php";?>



<!doctype html>

<html>
	
	<head>
		
		<title>comprando via kampella</title>
		<meta charset="utf-8" />
		<meta name="author" content="giovanne" />
		<meta neme="description" content="essa pagina apenas redireciona para lojas e as informação coletas são usada para valida a referencia" />
		<meta name="robots" content="noindex,nofollow" />
		<link rel="icon" href="ico/logoico.png" />
		<link rel="stylesheet" href="defaultstyle/baseestilo.css" />
		
		<style>
			
			#buy{
				
				margin-top:100px;
				margin-left:500px;
				
				
				
			}
			
			
			#buy img{
				
				margin-left:50px;	
				
				
				
			}
			
			
			
			
		</style>
		
	</head>
	
	<body>
		
		
		
<?php
		
		
		if ((!empty($_GET['true'])) and (!empty($_GET['id']))){ $id=$_GET['id'];$n=$_POST['nome'];$ns=$_POST['sobrenome'];$num=$_POST['telefone'];$chave=$_GET['chave'];registra($id,$n,$ns,$num,$chave,$cone);}

	if ((!empty($_GET['chave'])) and (!empty($_GET['id']))){
		
		
		$chave=$_GET['chave'];
		$id=$_GET['id'];
		
		if (file_exists("other/$id/venda/". $chave .".txt")){
			
			
			echo "<div id='buy'>
			
					<img style='width:100px;height:100px;' src='other/$id/fotoperso.png' />
					
					<form method='post' action='buy.php?true=1&id=$id&chave=$chave'>
					
					nome:      <input type='text' name='nome' /><br>
					sobrenome: <input type='text' name='sobrenome' /><br>
					telefone:  <input type='number' name='telefone' /><br>
							  <input type='submit' value='concordo em se redirecionado' />
					
					
					
					</form>
					</div>";
			
			
			
		}
		
		
		
	}








?>
		
	</body>
</html>