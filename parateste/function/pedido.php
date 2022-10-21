<?php

session_start();


	$meuid=$_SESSION['id'];
	
	
	if (!empty($_GET['id'])){
		
		$id=$_GET['id'];
		
		
			if ($_POST['aceita']=="aceita"){
				
				copy("../other/". $meuid ."/amigo/tmp/". $id .".txt","../other/". $meuid ."/amigo/". $id .".txt");
				$abrir=fopen("../other/". $meuid ."/amigo/tmp/". $id .".txt","r+");
				$ler=fgets($abrir);
				fclose($abrir);
				unlink("../other/". $meuid ."/amigo/tmp/". $ler .".txt");
				unlink("../other/". $meuid ."/amigo/tmp/". $id .".txt");
				
				
				
				
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