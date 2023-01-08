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

	if ((!empty($_GET['chave'])) and (!empty($_GET['id'])) and (empty($_GET['pro']))){
		
		
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
		
		
	if ((!empty($_GET['ver'])) and (!empty($_GET['id']))){ 
		
		
		$id=$_GET['id'];
		$n=$_POST['nome'];
		$ns=$_POST['sobrenome'];
		$num=$_POST['telefone'];
		$email=$_POST['email'];
		$instar=$_POST['insta'];
		$estado=$_POST['estado'];
		$cidade=$_POST['cidade'];
		$cep=$_POST['cep'];
		$cpf=$_POST['cpf'];
		$chave=$_GET['chave'];
		drop($id,$n,$ns,$num,$chave,$email,$instar,$estado,$cidade,$cep,$cpf,$cone);
	
	
	}

	if ((!empty($_GET['chave'])) and (!empty($_GET['id'])) and (!empty($_GET['pro']))){
		
		
		$pro=$_GET['pro'];// echo $pro;
		$id=$_GET['id'];// echo $id;
		$chave=$_GET['chave'];// echo "other/$id/venda/". $pro ."dropmagic.txt";
		
		if (is_file("other/$id/venda/". $pro ."dropmagic.txt")){
			
			//echo $pro;
			echo "<div id='buy'>
			
					<img style='width:100px;height:100px;' src='other/$id/fotoperso.png' />
					
					<form method='post' action='buy.php?ver=1&id=$id&chave=$chave'>
					
					nome:      <input type='text' name='nome' /><br>
					sobrenome: <input type='text' name='sobrenome' /><br>
					telefone:  <input type='number' name='telefone' /><br>
					email:     <input type='email' name='email' /><br>
					instagram: <input type='text' name='insta' /><br>
					estado:    <input type='text' name='estado' /><br>
					cidade:    <input type='text' name='cidade' /><br>
					cep:       <input type='text' name='cep' /><br>
					cpf:       <input type='text' name='cpf' /><br>
							  <input type='submit' value='concordo em entra contato com vedendor' />
					
					
					
					</form>
					</div>";
			
			
			
		}
		
		
		
	}








?>
		
	</body>
</html>