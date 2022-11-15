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
		$chavek=(!empty($_POST['chave']))? $_POST['chave']: 0;
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
				echo "<script>location.href=history.back()</script>";
				
			}else{
				
				$senha=password_hash($senha,PASSWORD_DEFAULT);
				
				
			}
			
			for ($i=1;$i<=1000;$i++){
				
				if (file_exists("../other/". $i ."/convida/". $chave)){
					
					$abrir=fopen("../other/". $i ."/convida/". $chave,"r+");
					$ler=fgets($abrir);
					fclose($abrir);
					$abrir=fopen("../other/". $i ."/convida/". $chave,"w+");
					fwrite($abrir,$ler-1);
					fclose($abrir);
					
				}
				
				
			}//esse for pode se usado tbm para dir, indir e especial
		
		
		
		$cada=$cone->prepare("insert into pessoa values (?,?,?,?,?,?,?,?,?)");
		$cada->bind_param("issssssss",$id,$nome,$sobrenome,$email,$senha,$sexo,$cre,$mod,$tipo);
		$cada->execute();
		
		$cada->store_result();
		$teste=$cada->affected_rows;
		
		if ($teste>0){
			
			$_SESSION['msg']="conta cadastrada com sucesso";
			header("location: ../formulario.php");
			
			
		}else{
			
			$_SESSION['msg']="não foi possivel cadastrar essa conta: motivos email já existe";
			header("location: ../formulario.php");
			
			
			
		}
		
		
		
		
		
	}else{
		
		
		$_SESSION['msg']="erro verificar se todos os campos estão correto";
		header("location: ../formulario.php");
		
		
		
	}







?>