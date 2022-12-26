<?php

session_start();


	$meuid=$_SESSION['id'];
	$nome=$_SESSION['nome'];
	
	
	if (!empty($_GET['id'])){
		
		$id=$_GET['id'];
		
		
			if ($_POST['aceita']=="aceita"){
				
				copy("../other/". $meuid ."/amigo/tmp/". $id .".txt","../other/". $meuid ."/amigo/". $id .".txt");
				if (!is_dir("../other/". $id ."/amigo/")){mkdir("../other/". $id ."/amigo/",0777,true);}
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/amigo/". $meuid .".txt");
				$abrir=fopen("../other/". $meuid ."/amigo/tmp/". $id .".txt","r+");
				$ler=fgets($abrir);
				fclose($abrir);
				$abrir=fopen("../other/". $id ."/amigo/". $meuid .".txt","w+");
				fwrite($abrir,$nome);
				fclose($abrir);
				unlink("../other/". $meuid ."/amigo/tmp/". $ler .".txt");
				unlink("../other/". $meuid ."/amigo/tmp/". $id .".txt");
				rmdir("../other/". $meuid ."/amigo/tmp/");
				
				
				
				
			}elseif ($_POST['aceita']=="recusa"){
				
				$abrir=fopen("../other/". $meuid ."/amigo/tmp/". $id .".txt","r+");
				$ler=fgets($abrir);
				fclose($abrir);
				unlink("../other/". $meuid ."/amigo/tmp/". $ler .".txt");
				unlink("../other/". $meuid ."/amigo/tmp/". $id .".txt");
				
				
				
				
			}
			
			
			
		
		
		
		
		
	}

		
		
		header("location: ../userdefault.php");






?>