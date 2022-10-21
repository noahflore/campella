<?php

	if (!empty($_FILES['foto'])){
		
		$foto=$_FILES['foto'];
		$id=$_GET['id'];
		$idcm=$_GET['outro'];
		$idcmm=$_GET['idcmm'];
		
		
		
		move_uploaded_file($foto['tmp_name'],"../../other/var/". $id ."/". $idcm ."/fotocmm.png");
		unset($foto['tmp_name']);
		
		
		
	}
	
	
	if (!empty($_POST['desc'])){
		
		$desc=$_POST['desc'];
		$id=$_GET['id'];
		$idcm=$_GET['outro'];
		$idcmm=$_GET['idcmm'];
		
			
			if (file_exists("../../other/var/". $id ."/". $idcm ."/desc.txt")){
				
				
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/desc.txt","w+");
				fwrite($abrir,$desc);
				fclose($abrir);
		
		
			}else{
				
				copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcm ."/desc.txt");
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/desc.txt","w+");
				fwrite($abrir,$desc);
				fclose($abrir);
				
				
				
			}
		
	}
	
	
	if (!empty($_POST['visi'])){
		
		$visi=$_POST['visi'];
		$id=$_GET['id'];
		$idcm=$_GET['outro'];
		$idcmm=$_GET['idcmm'];
		
		
		
		if ($visi=="publico"){
			
			copy("../../other/exemplo/exemplo.txt","../../other/var/index/1.txt");
			$abrir=fopen("../../other/var/index/1.txt","w+");
			fwrite($abrir,$idcmm);
			fclose($abrir);
			
			if (file_exists("../../other/var/". $id ."/". $idcm ."/privado/1.txt")){
				
				
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/privado/1.txt","w+");
				fwrite($abrir,0);
				fclose($abrir);
			
			
			}
			
		}
		
		
		if ($visi=="mod"){
			
		
			
			copy("../../other/exemplo/exemplo.txt","../../other/var/index/1.txt");
			$abrir=fopen("../../other/var/index/1.txt","w+");
			fwrite($abrir,$idcmm);
			fclose($abrir);
			
			if (file_exists("../../other/var/". $id ."/". $idcm ."/privado/1.txt")){
				
				
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/privado/1.txt","w+");
				fwrite($abrir,2);
				fclose($abrir);
			
			}
			
			
			
		}
		
		
		
		
		if ($visi=="privado"){
			
			for ($i=0; $i<=50; $i++){
				
				if (file_exists("../../other/var/index/". $i .".txt")){
					
					
					$abrir=fopen("../../other/var/index/". $i .".txt","r+");
					$ler=fgets($abrir);
					fclose($abrir);
					
						if ($ler==$idcmm){
							
							unlink("../../other/var/index/". $i .".txt");
							
						}
				
				
				}
				
				
			}
			
			if (is_dir("../../other/var/". $id ."/". $idcm ."/privado/")){
				
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/privado/1.txt","w+");
				fwrite($abrir,1);
				fclose($abrir);
				
				
			}else{
				
				mkdir ("../../other/var/". $id ."/". $idcm ."/privado/",0777,true);
				copy("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcm ."/privado/1.txt");
				$abrir=fopen("../../other/var/". $id ."/". $idcm ."/privado/1.txt","w+");
				fwrite($abrir,1);
				fclose($abrir);
				
				
			}
			
		}
		
	}

	header("location: config.php?idcmm=$idcmm&outro=$idcm");



?>