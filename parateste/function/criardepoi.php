<?php
session_start();

	
	$id=$_SESSION['id'];
	$nome=$_SESSION['nome'];
	
	
	
	if (!empty($_POST['texto'])){
		$texto=$_POST['texto'];
		
		$amigo=$_GET['id'];
		if(file_exists("../other/". $amigo ."/depoi/update.txt")){
			$abrir=fopen("../other/". $amigo ."/depoi/update.txt","r+");
			$ler=fgets($abrir);
			fclose($abrir);
			$ler++;
			$abrir=fopen("../other/". $amigo ."/depoi/update.txt","w+");
			fwrite($abrir,$ler);
			fclose($abrir);
			
			if(!is_dir("../other/". $amigo ."/depoi/tmp/". $ler ."/")){mkdir("../other/". $amigo ."/depoi/tmp/". $ler ."/",0777,true);}
			
			
				
			
			
			copy("../other/exemplo/exemplo.txt","../other/". $amigo ."/depoi/tmp/". $ler ."/". $nome .".txt");
			$abrir=fopen("../other/". $amigo ."/depoi/tmp/". $ler ."/". $nome .".txt","w+");
			copy("../other/exemplo/exemplo.txt","../other/". $amigo ."/depoi/tmp/". $ler ."/$id");
			fwrite($abrir,$texto);
			fclose($abrir);
			
			
			
		}else{
			mkdir("../other/". $amigo ."/depoi/",0777,true);
			copy("../other/exemplo/exemplo.txt","../other/". $amigo ."/depoi/update.txt");
			$abrir=fopen("../other/". $amigo ."/depoi/update.txt","w+");
			fwrite($abrir,1);
			fclose($abrir);
			mkdir("../other/". $amigo ."/depoi/tmp/1/",0777,true);
			copy("../other/exemplo/exemplo.txt","../other/". $amigo ."/depoi/tmp/1/". $nome .".txt");
			copy("../other/exemplo/exemplo.txt","../other/". $amigo ."/depoi/tmp/1/$id");
			$abrir=fopen("../other/". $amigo ."/depoi/tmp/1/". $nome .".txt","w+");
			fwrite($abrir,$texto);
			fclose($abrir);
			
			
			
		}
		
		
		
	}


	header("location: ../friend/userpage/depoiuser.php?id=$amigo");



?>