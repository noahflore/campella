<?php session_start();

	require_once "conexao.php";


		$ano= date('Y');
		$mes= date('m');
		$dia= date('d');
		$hora= date('h');
		$minuto= date('i');

		$data= "$ano-$mes-$dia $hora:$dia:00";


		if (!empty($_POST['genero'])){
			
			$genero=$_POST['genero'];
			
			if (($genero== "f") || ($genero== "m")){
				
				$id=$_SESSION['id'];
				
				$change= $cone->prepare("UPDATE pessoa SET sexo = ? WHERE pessoa . id = ? ");
				$change->bind_param("si",$genero,$id);
				$change->execute();
				
				$changemod= $cone->prepare("UPDATE pessoa SET mod = ? WHERE pessoa . id = ? ");
				$changemod->bind_param("si",$data,$id);
				$changemod->execute();
				
				
				
			}elseif (!empty($_POST['outro'])){
				
				
				$id=$_SESSION['id'];
				
				$change= $cone->prepare("UPDATE pessoa SET sexo = ? WHERE pessoa . id = ? ");
				$change->bind_param("si",$genero,$id);
				$change->execute();
				
				
			}
			
			
			
			
		}


	

		header("location: ../configdefault.php");








?>