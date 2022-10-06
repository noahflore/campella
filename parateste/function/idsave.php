<?php

	function idsave($id){
		
		$id=$id;
		
		
		if(file_exists("../../other/var/index/update/update.txt")){
			
			$abrir=fopen("../../other/var/index/update/update.txt","r+");
			$ler=fgets($abrir);
			$ler++;
			if ($ler>=50){$ler=1;}
			copy("../../other/exemplo/exemplo.txt","../../other/var/index/update/". $ler .".txt");
			fclose($abrir);
			$abrir=fopen("../../other/var/index/update/update.txt","w+");
			fwrite($abrir,$ler);
			fclose($abrir);
			$abrir=fopen("../../other/var/index/update/". $ler .".txt","w+");
			fwrite($abrir,$id);
			fclose($abrir);
			
			
		}else{
			
			mkdir("../../other/var/index/update/",0777,true);
			copy("../../other/exemplo/exemplo.txt","../../other/var/index/update/update.txt");
			$abrir=fopen("../../other/var/index/update/update.txt","w+");
			fwrite($abrir,1);
			fclose($abrir);
			copy("../../other/exemplo/exemplo.txt","../../other/var/index/update/1.txt");
			$abrir=fopen("../../other/var/index/update/1.txt","w+");
			fwrite($abrir,$id);
			fclose($abrir);
			
			
		}
		
		
		
	}






?>