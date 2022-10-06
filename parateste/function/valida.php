<?php
	session_start();
	require_once "conexao.php";
	
	
	
	if (isset($_POST['email']) && (isset($_POST['senha']))){
		
		//$senha= md5($senha);
		
		
		
		$email =mysqli_real_escape_string($cone,$_POST['email']);
		$senha =mysqli_real_escape_string($cone,$_POST['senha']);
		
		$consulta= "select * from pessoa where email = '$email' && senha = '$senha';";
		$id= "select id from pessoa where email = '$email';";
		$nome= "select nome from pessoa where email = '$email';";
		$teste = mysqli_query($cone,$consulta);
		
		$resultado=mysqli_fetch_assoc($teste);
		$t1=mysqli_query($cone,$nome);
		$t2=mysqli_query($cone,$id);
		
		
		if (empty($resultado)){
			$_SESSION['errologin'] = "erro no login";
			header("location: ../login.php");
			
			
		}else{
				$nome=mysqli_fetch_array($t1);
				$_SESSION['nome']= $nome[0];
				
				$id=mysqli_fetch_array($t2);
				$_SESSION['id']= $id[0];
				
					
	
						$amigos= "SELECT * FROM `pessoa`;";
						$reposta= mysqli_query($cone,$amigos);
						while($exibir=mysqli_fetch_assoc($reposta)){
						if (!is_dir('../friend/'. $exibir['id'])){
							mkdir('../friend/'. $exibir['id'],0777,true);
							
						}
						copy('../other/exemplo/exemplo.txt','../friend/'. $exibir['id'] . '/'. $exibir['nome']);
						

						}

				
			
			$_SESSION['login']="on";
			header("location: ../userdefault.php");
			
			
		}
		
	}else{
		$_SESSION['errologin']= "erro no email ou senha";
		header("location: ../login.php");
		
		
	}

?>