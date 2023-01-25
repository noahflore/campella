<?php
session_start();


	if ((!empty($_GET['id'])) and (!empty($_GET['outro'])) and (!empty($_GET['idcmm'])) and (!isset($_GET['true']))){
		
		
		$id=$_GET['id'];
		$outro=$_GET['outro'];
		$idcmm=$_GET['idcmm'];

			if (!is_dir("../../other/var/". $id ."/". $outro ."/tmp/")){mkdir("../../other/var/". $id ."/". $outro ."/tmp/",0777,true);}
				$nome=$_SESSION['nome'];
				$meuid=$_SESSION['id'];


				if (!file_exists("../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt")){
					
					copy("../../exemplo/exemplo.txt","../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt");
					$abrir=fopen("../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt","w+");
					fwrite($abrir,$idcmm);
					fclose($abrir);
					
					
				}else{
					
					$_SESSION['alerta']="você já clicou nesse botão aguarde o dono ou mod aceita";
					
					
				}

				

		



	}

	if ((!empty($_GET['id'])) and (!empty($_GET['outro'])) and (!empty($_GET['idcmm'])) and (isset($_GET['true']))){

		$id=$_GET['id'];
		$outro=$_GET['outro'];
		$idcmm=$_GET['idcmm'];
		$pu=$_GET['pu'];
		
			
			if (empty($_POST['deleta'])){
				
				
				if (!is_dir("../../other/var/". $id ."/". $idcmm ."/autoria/")){mkdir("../../other/var/". $id ."/". $idcmm ."/autoria/",0777,true);}

				copy ("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcmm ."/autoria/" .$pu);
				unlink("../../other/var/". $id ."/". $outro ."/tmp/". $pu .".txt");
				
				
			}else{
				
				unlink("../../other/var/". $id ."/". $outro ."/tmp/". $pu .".txt");
				
				
			}
		
		
		
		
		
	}


	header("location: todotpc.php?id=$id&outro=$outro&idcmm=$idcmm");


?>