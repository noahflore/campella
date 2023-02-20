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
		$ip=$_SERVER['REMOTE_ADDR'];
		//$ip= filter_input(INPUT_SERVER,REMOTE_ADDR,FILTER_VALIDATE_IP);
		
		
			if ($senha!=$repita){
				$_SESSION['msg']="erro senha e repitir a senha estão incorreto ,tente usar outra senha";
				echo "<script>location.href=history.back()</script>";
				
			}else{
				$senhapura=$senha;
				$senha=password_hash($senha,PASSWORD_DEFAULT);
				
				
			}
			
			for ($i=1;$i<=1000;$i++){
				
				if (file_exists("../other/". $i ."/convida/". $chavek)){
					
					$abrir=fopen("../other/". $i ."/convida/". $chavek,"r+");
					$ler=fgets($abrir);
					
					if($ler<=0){
						
						unlink("../other/". $i ."/convida/". $chavek);	
						rmdir("../other/". $i ."/convida/");
						fclose($abrir);
						
						$fast=$cone->prepare("SELECT * FROM kants WHERE id = ?");
						$fast->bind_param("i",$i);
						$fast->execute();
						$fast->bind_result($idf,$quaf,$chef,$mef);
						
						
						
							
							$quaf+=30000;
							unset($fast);
							
						
							$fast=$cone->prepare("UPDATE kants SET quantidade = ? WHERE kants . id = ? ");
							$fast->bind_param("ii",$quaf,$i);
							$fast->execute();
							unset($fast);
						
					}else{
						
						fclose($abrir);
						$abrir=fopen("../other/". $i ."/convida/". $chavek,"w+");
						fwrite($abrir,$ler-1);
						fclose($abrir);
						$tipo="SBWM0000";
						
						$fast=$cone->prepare("SELECT * FROM kants WHERE id = ?");
						$fast->bind_param("i",$i);
						$fast->execute();
						$fast->bind_result($idf,$quaf,$chef,$mef);
						
						
						
							
							$quaf+=30000;
							unset($fast);
							
						
							$fast=$cone->prepare("UPDATE kants SET quantidade = ? WHERE kants . id = ? ");
							$fast->bind_param("ii",$quaf,$i);
							$fast->execute();
							unset($fast);
							
					
							
						
						
					}
					
				}
				
				
			}//esse for pode se usado tbm para dir, indir e especial
		
		
		
		$cada=$cone->prepare("insert into pessoa values (?,?,?,?,?,?,?,?,?,?,?)");
		$cada->bind_param("issssssssss",$id,$nome,$sobrenome,$email,$senha,$sexo,$cre,$mod,$dia,$tipo,$ip);
		$cada->execute();
		
		$cada->store_result();
		$teste=$cada->affected_rows;
		
		if ($teste>0){
			
			$_SESSION['msg']="conta cadastrada com sucesso";
			header("location: valida.php?email=$email&senha=$senhapura");
			
			
		}else{
			
			$_SESSION['msg']="não foi possivel cadastrar essa conta: motivos email já existe";
			header("location: ../formulario.php");
			
			
			
		}
		
		
		
		
		
	}else{
		
		
		$_SESSION['msg']="erro verificar se todos os campos estão correto";
		header("location: ../formulario.php");
		
		
		
	}







?>