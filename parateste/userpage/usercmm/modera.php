<?php
session_start();


	if ((!empty($_GET['id'])) and (!empty($_GET['outro'])) and (!empty($_GET['idcmm']))){
		
		
		$id=$_GET['id'];
		$outro=$_GET['outro'];
		$idcmm=$_GET['idcmm'];

			if (!is_dir("../../other/var/". $id ."/". $outro ."/tmp/")){mkdir("../../other/var/". $id ."/". $outro ."/tmp/",0777,true);}
				$nome=$_SESSION['nome'];
				$meuid=$_SESSION['id'];


				if (!file_exists("../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt")){
					
					copy("../../exemplo/exemplo.txt","../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt");
					$abrir=fopen("../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt","w+");
					fwrite($abrir,$nome);
					fclose($abrir);
					
					
				}else{
					
					$_SESSION['alerta']="você já clicou nesse botão aguarde o dono ou mod aceita";
					
					
				}

				header("location: todotpc.php?id=$id&outro=$outro&idcmm=$idcmm");

		



	}


?>