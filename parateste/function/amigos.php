<?php

session_start();

	$id=$_GET['id'];
	$meuid=$_SESSION['id'];
	$nome=$_SESSION['nome'];
	
	
		if ($_POST['friend']=="add"){
			
			if (is_dir("../other/". $id ."/amigo/")){
				
				if (!file_exists("../other/". $id ."/amigo/tmp/". $meuid .".txt")){
					
					
					copy("../other/exemplo/exemplo.txt","../other/". $id ."/amigo/tmp/". $meuid .".txt");
					$abrir=fopen("../other/". $id ."/amigo/tmp/". $meuid .".txt","w+");
					fwrite($abrir,$nome);
					fclose($abrir);
					copy("../other/exemplo/exemplo.txt","../other/". $id ."/amigo/tmp/". $nome .".txt");
					
					
					header("location: ../friend/userseeuser.php?id=$id");
					
				
				}else{
					
					$_SESSION['add']="você já adicionou!";
					header("location: ../friend/userseeuser.php?id=$id");
					
					
				}
				
				
			}else{
				
				mkdir("../other/". $id ."/amigo/tmp/",0777,true);
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/amigo/tmp/". $meuid .".txt");
				$abrir=fopen("../other/". $id ."/amigo/tmp/". $meuid .".txt","w+");
				fwrite($abrir,$nome);
				fclose($abrir);
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/amigo/tmp/". $nome .".txt");
				
				
				
				header("location: ../friend/userseeuser.php?id=$id");
				
			}
			
			
			
		}elseif ($_POST['friend']=="block"){
			
				mkdir("../other/". $meuid ."/amigo/block/",0777,true);
				copy("../other/exemplo/exemplo.txt","../other/". $meuid ."/amigo/block/". $id .".txt");
				
				
				
			
			header("location: ../friend/userseeuser.php?id=$id");
			
			
			
		}
		
		
		if ($_POST['friend']=="denuncia"){
			$motivo=$_POST['motivo'];
			
			if (!is_dir("../other/1/amigo/denuncia/")){
			mkdir("../other/1/amigo/denuncia/",0777,true);}
			copy("../other/exemplo/exemplo.txt","../other/1/amigo/denuncia/q". $meuid ."-". $id ."a.txt");
			$abrir=fopen("../other/1/amigo/denuncia/q". $meuid ."-". $id ."a.txt","w+");
			fwrite($abrir,$motivo);
			fclose($abrir);
			
			
			header("location: ../userdefault.php");
			
			
		}

	  if ($_POST['friend']=="remove"){
		  
		  unlink("../other/". $meuid ."/amigo/". $id .".txt");
		  unlink("../other/". $id ."/amigo/". $meuid .".txt");
		  $veri= array_diff(scandir("../other/". $meuid ."/amigo/tmp/"),['.','..']);
		  if (empty($veri[2])){rmdir("../other/". $meuid ."/amigo/tmp/");}
		  
				    $_SESSION['add']="você já removeu essa pessoa!";
					header("location: ../friend/userseeuser.php?id=$id");
		  
		  
	  }









?>