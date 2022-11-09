<?php
	session_start();
	require_once "conexao.php";
	
	
	
	if (!empty($_POST['email']) && (!empty($_POST['senha']))){
		
		
		$email =$_POST['email'];
		$senha =$_POST['senha'];
		
		
		$consulta=$cone->prepare("select  * from pessoa where email = ? limit 1");
		$consulta->bind_param("s",$email);
		$consulta->bind_result($id,$nome,$sobrenome,$email,$teste,$sexo,$cre,$mod,$diau,$tipo);
		$consulta->execute();
		
		
			if ($consulta->fetch()){
				
				if (password_verify($senha,$teste)){
				
			
				$_SESSION['id']=$id;
				$_SESSION['nome']=$nome;
				$_SESSION['sobrenome']=$sobrenome;
					
					unset($consulta);
					
					$dia= date("d");
					
					$update= $cone->prepare("UPDATE pessoa SET dia = ? WHERE pessoa . id = ?");
					$update->bind_param("ii",$dia,$id);
					$update->execute();
					
					if ($id==1){
						
						$_SESSION['login']= "on";
						header("location: admin/super_admin/useradmin.php");
						
						
					}
				
				if (!is_dir('../friend/'. $id)){
					
						mkdir('../friend/'. $id,0777,true);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/1-'. $nome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/2-'. $sobrenome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/3-'. $sexo);
							
					}else{
						
						
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/1-'. $nome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/2-'. $sobrenome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/3-'. $sexo);
						

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