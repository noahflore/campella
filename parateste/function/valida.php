<?php
	session_start();
	require_once "conexao.php";
	
	
	
	if (!empty($_POST['email']) && (!empty($_POST['senha']))){
		
		
		$email =$_POST['email'];
		$senha =$_POST['senha'];
		
		
		$consulta=$cone->prepare("select  * from pessoa where email = ? limit 1");
		$consulta->bind_param("s",$email);
		$consulta->execute();
		$consulta->bind_result($id,$nome,$sobrenome,$email,$teste,$sexo,$cre,$mod,$tipo);
		
		
			if ($consulta->fetch()){
				
				if (password_verify($senha,$teste)){
				
			
				$_SESSION['id']=$id;
				$_SESSION['nome']=$nome;
				$_SESSION['sobrenome']=$sobrenome;
				
				if (!is_dir('../friend/'. $id)){
					
						mkdir('../friend/'. $id,0777,true);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/'. $nome);
							
					}else{
						
						
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/'. $nome);
						

					}
				
				$_SESSION['login']="on";
				header("location: ../userdefault.php");
				
			}else{
				
				$_SESSION['errologin']="erro no login verificar se o email e a senha estão correto";
				header("location: ../login.php");
				
				
			}
			
			}
			
		
	}else{
		$_SESSION['errologin']= "erro no email ou senha";
		header("location: ../login.php");
		
		
	}

?>