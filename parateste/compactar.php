<?php



	function compacta($id){

	$zipa= new ZipArchive();
	$path= __DIR__ ."/other/". $id;
	$fullpath= $path ."/zip.zip";
		

	if ($zipa->open($fullpath,ZipArchive::CREATE)){
		
		if (is_dir($path ."/recado/")){
			
			if (file_exists($path ."/recado/pasta.txt")){
				
				$abrir=fopen($path ."/recado/pasta.txt","r+");
				$arma= fgets($abrir);
				fclose($abrir);
				
				for ($vare=0; $vare<=$arma; $vare++){
					
					for ($pro=1; $pro<=10; $pro++){
						
						if (is_dir($path ."/recado/". $vare ."/". $pro)){
							
							$com= array_diff(scandir($path ."/recado/". $vare ."/". $pro),['.','..']);
							
							$zipa->addFile($path ."/recado/". $vare ."/". $pro ."/". $com[2],"/recado/". $vare ."/". $pro ."/". $com[2]);
							$zipa->addFile($path ."/recado/". $vare ."/". $pro ."/". $com[3],"/recado/". $vare ."/". $pro ."/". $com[3]);
							$zipa->addFile($path ."/recado/". $vare ."/010.txt","/recado/". $vare ."/010.txt");
							$zipa->addFile($path ."/recado/pasta.txt","/recado/pasta.txt");
							
						}
						
						
					}
					
					
				}
				
				$zipa->close();
				
			}
			
			
			
		}
		
		
		
	}
		
		if (is_dir($path ."/recado/")){
			
			if (file_exists($path ."/recado/pasta.txt")){
				
				$abrir=fopen($path ."/recado/pasta.txt","r+");
				$arma= fgets($abrir);
				fclose($abrir);
				
				for ($vare=0; $vare<=$arma; $vare++){
					
					for ($pro=1; $pro<=10; $pro++){
						
						if (is_dir($path ."/recado/". $vare ."/". $pro)){
							
							$com= array_diff(scandir($path ."/recado/". $vare ."/". $pro),['.','..']);
							
							unlink($path ."/recado/". $vare ."/". $pro. "/". $com[2]);
							unlink($path ."/recado/". $vare ."/". $pro. "/". $com[3]);
							rmdir($path ."/recado/". $vare ."/". $pro. "/");
							if (file_exists($path ."/recado/". $vare ."/010.txt")){unlink($path ."/recado/". $vare ."/010.txt");}
							
						}
						
					}
					
					rmdir($path ."/recado/". $vare ."/");
					if (file_exists($path ."/recado/pasta.txt")){unlink($path ."/recado/pasta.txt");}
					if (file_exists($path ."/recado/index.txt")){unlink($path ."/recado/index.txt");}
					if (file_exists($path ."/recado/min.txt")){unlink($path ."/recado/min.txt");}
					if (file_exists($path ."/recado/max.txt")){unlink($path ."/recado/max.txt");}
					if (file_exists($path ."/recado/tmp/tmpupdate.txt")){unlink($path ."/recado/tmpupdate.txt"); rmdir($path ."/recado/tmp/");}
					
					
				}
				
				rmdir($path ."/recado/");
				
			}
						
						
		}
		
	}

	function descompacta($id){
		
			$zipa= new ZipArchive();
			$path= __DIR__ ."/other/". $id;
			$fullpath= $path ."/zip.zip";
			echo $fullpath;
		
			if ($zipa->open("../other/$id/zip.zip")){
				
				$zipa->extractTo("../other/$id/");
				$zipa->close();
				
				
				
			}
		
		
		
	}




?>