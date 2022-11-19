<?php
	session_start();
	require_once "conexao.php";
	require_once "objeto/Usuario.php";
	
	
	
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
					
					if ($tipo=="SBWM0000"){
						
						unset($consulta);
						
						$pin=random_bytes(8);
						$pin= password_hash($pin,PASSWORD_DEFAULT);
						$user= new Usuario($nome,$sobrenome,$id,$cone);// esse arquivo tem que levar ao master
						
						$update= $cone->prepare("SELECT * FROM kants WHERE id= ?");
						$update->bind_param("i",$id);
						$update->execute();
						$update->store_result();

						$teste= $update->affected_rows;
					
							if ($teste==0){
								boasvinda(7000,$pin,$id,$cone);
								
							}
						unset($update);
						
					}
					
					if (!empty($consulta)){unset($consulta);}
					
					$dia= date("d");
					
					$update= $cone->prepare("UPDATE pessoa SET dia = ? WHERE pessoa . id = ?");
					$update->bind_param("ii",$dia,$id);
					$update->execute();
					unset($update);
					
					$update= $cone->prepare("SELECT * FROM kants WHERE id= ?");
					$update->bind_param("i",$id);
					$update->execute();
					$update->store_result();
					
					$teste= $update->affected_rows;
					
					if ($teste==0){
						
						$zero=0;
						$pin=random_bytes(8);
						$_SESSION['pin']= $pin;
						$pin= password_hash($pin,PASSWORD_DEFAULT);
						
						
						unset($update);
						
						$update= $cone->prepare("INSERT INTO kants VALUE (?,?,?)");
						$update->bind_param("iis",$id,$zero,$pin);
						$update->execute();
						
						
					}
					
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