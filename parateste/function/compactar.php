<?php



	function compacta($id){

	$zipa= new ZipArchive();
	$path= __DIR__ ."../other/". $id;
	$fullpath= $path ."/zip.zip";
		
		echo $fullpath;

	if ($zipa->open($fullpath,ZipArchive::CREATE)){
		
		if (is_dir($path ."/recado/")){
			
			if (file_exists($path ."/recado/pasta.txt")){
				
				$abrir=fopen($path ."/recado/pasta.txt","r+");
				$arma= fgets($abrir);
				fclose($abrir);
				
				for ($vare=1; $vare<=$arma; $vare++){
					
					for ($pro=1; $pro<=10; $pro++){
						
						if (is_dir($path ."/recado/". $vare ."/". $pro)){
							
							$com= array_diff(scandir($path ."/recado/". $vare ."/". $pro),['.','..']);
							
							$zipa->addFile($path ."/recado/". $vare ."/". $pro ."/". $com[2],"/recado/". $vare ."/". $pro ."/". $com[2]);
							$zipa->addFile($path ."/recado/". $vare ."/". $pro ."/". $com[3],"/recado/". $vare ."/". $pro ."/". $com[3]);
							
						}
						
						
					}
					
					
				}
				
				$zipa->close();
				
			}
			
			
			
		}
		
		
		
	}
	}




?>