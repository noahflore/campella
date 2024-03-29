<?php
	session_start();
	require_once "conexao.php";
	require_once "objeto/Usuario.php";
	
	
	
	if (((!empty($_POST['email'])) && (!empty($_POST['senha']))) || ((!empty($_GET['email'])) and (!empty($_GET['senha'])))){
		
		
		$email =(!empty($_POST['email']))? $_POST['email']:$_GET['email'];
		$senha =(!empty($_POST['senha']))? $_POST['senha']:$_GET['senha'];
		
		
		$consulta=$cone->prepare("select  * from pessoa where email = ? limit 1");
		$consulta->bind_param("s",$email);
		$consulta->bind_result($id,$nome,$sobrenome,$email,$teste,$sexo,$cre,$mod,$diau,$tipo,$ip);
		$consulta->execute();
		
		
			if ($consulta->fetch()){
				
				if (password_verify($senha,$teste)){
				
			
				$_SESSION['id']=$id;
				$_SESSION['nome']=$nome;
				$_SESSION['sobrenome']=$sobrenome;
					
					if ($tipo=="SBWM0000"){
						
						unset($consulta);
						
						$code=random_bytes(8);
						$pin=bin2hex($code);
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
						$code=random_bytes(8);
						$pin=bin2hex($code);
						$_SESSION['pin']= $pin;
						$pin= password_hash($pin,PASSWORD_DEFAULT);
						
						
						unset($update);
						
						$update= $cone->prepare("INSERT INTO kants VALUE (?,?,?,?)");
						$update->bind_param("iisi",$id,$zero,$pin,$zero);
						$update->execute();
						
						
					}
					
					if ($id==1){
						
						$_SESSION['login']= "on";
						header("location: admin/super_admin/useradmin.php");
						
						
					}
				
				if (!is_dir('../friend/'. $id)){
					
						mkdir('../friend/'. $id,0777,true);
						mkdir('../other/'. $id .'/recado/1/1/',0777,true);
						mkdir('../other/'. $id .'/recado/tmp/',0777,true);
						copy('../other/exemplo/exemplo.txt','../other/'. $id .'/recado/1/010.txt');
						copy('../other/exemplo/bemvindo.txt','../other/'. $id .'/recado/1/1/bot.txt');
						copy('../other/exemplo/exemplo.txt','../other/'. $id .'/recado/tmp/tmpupdate.txt');
						copy('../other/exemplo/exemplo.txt','../other/'. $id .'/recado/pasta.txt');
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/1-'. $nome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/2-'. $sobrenome);
						copy('../other/exemplo/exemplo.txt','../friend/'. $id . '/3-'. $sexo);
							
					
						$abrir=fopen('../other/'. $id .'/recado/1/010.txt','w+');
						fwrite($abrir,1);
						fclose($abrir);
						$abrir=fopen('../other/'. $id .'/recado/tmp/tmpupdate.txt','w+');
						fwrite($abrir,1);
						fclose($abrir);
						$abrir=fopen('../other/'. $id .'/recado/pasta.txt','w+');
						fwrite($abrir,1);
						fclose($abrir);
					
					
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