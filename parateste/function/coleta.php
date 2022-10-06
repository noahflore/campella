<?php	
session_start();

	require_once "conexao.php";


	if ((!empty($_POST['nome'])) and (!empty($_POST['sobrenome'])) and (!empty($_POST['email'])) and (!empty($_POST['senha'])) and (!empty($_POST['repita']))){
		
		$id=0;
		$nome=$_POST['nome'];
		$sobrenome=$_POST['sobrenome'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$repita=$_POST['repita'];
		$sexo="f";
		$tipo="DBWM0000";
		$ano= date("Y");
		$mes= date("m");
		$dia= date("d");
		$hora= date("h");
		$min= date("i");
		$cre= "$ano-$mes-$dia $hora:$min:00";
		$mod= "0000-00-00 00:00:00";
		
			if ($senha!=$repita){
				$_SESSION['msg']="erro senha e repitir a senha estão incorreto ,tente usar outra senha";
				header("location: ../formulario.php");
				
			}else{
				
				$senha=md5($senha);
				
				
			}
		
		$cada=$cone->prepare("insert into pessoa values (?,?,?,?,?,?,?,?,?)");
		$cada->bind_param("issssssss",$id,$nome,$sobrenome,$email,$senha,$sexo,$cre,$mod,$tipo);
		$cada->execute();
		
		$cada= $cone->prepare("select `email` from ?");
		$cada->bind_param("s",$email);
		$cada->execute();
		$cada->bind_result($veri);
		
		if ($veri==$email){
			
			$_SESSION['msg']="conta cadastrada com sucesso";
			header("location: ../formulario.php");
			
			
		}else{
			
			$_SESSION['msg']="erro conta não foi cadastrada";
			header("location: ../formulario.php");
			
			
			
		}
		
		
		
		
		
	}else{
		
		
		$_SESSION['msg']="erro verificar se todos os campos estão correto";
		header("location: ../formulario.php");
		
		
		
	}







?>