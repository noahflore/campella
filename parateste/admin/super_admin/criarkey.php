<?php

	if ($_GET['key']=='dir'){
		$chave= $_GET['keydir'];
		
		for($i=1;$i<=$chave;$i++){
			$cod=random_bytes(8);
			$recebe=bin2hex($cod);
			copy('../../other/exemplo/exemplo.txt','../../other/dir/'. $recebe);
			
			
			
		}
		
		
		if(!file_exists('../../other/dir/update.txt')){
			copy('../../other/exemplo/exemplo.txt','../../other/dir/update.txt');
			$abrir=fopen('../../other/dir/update.txt','w+');
			fwrite($abrir,$chave);
			fclose($abrir);
		
		}else{
			
			$abrir=fopen('../../other/dir/update.txt','r+');
			$ler=fgets($abrir);
			fclose($abrir);
			$ler+=$chave;
			$abrir=fopen('../../other/dir/update.txt','w+');
			fwrite($abrir,$ler);
			fclose($abrir);
			
			
		}
		
		
	}else if($_GET['key']=='indi'){
		
		$chave= $_GET['keyindi'];
		
			$cod=random_bytes(8);
			$recebe=bin2hex($cod);
			copy('../../other/exemplo/exemplo.txt','../../other/indi/'. $recebe .'.txt');
			$abrir=fopen('../../other/indi/'. $recebe .'.txt','w+');
			fwrite($abrir,$chave);
			fclose($abrir);
			
			
			if (!file_exists('../../other/indi/update.txt')){
				
				copy('../../other/exemplo/exemplo.txt','../../other/indi/update.txt');
				$abrir=fopen('../../other/indi/update.txt','w+');
				fwrite($abrir,1);
				fclose($abrir);
				
				
				
			}else{
				
				$abrir=fopen('../../other/indi/update.txt','r+');
				$ler=fgets($abrir);
				$ler++;
				fclose($abrir);
				$abrir=fopen('../../other/indi/update.txt','w+');
				fwrite($abrir,$ler);
				fclose($abrir);
				
				
				
			}
		
	}
	
	if($_GET['key']=='especial'){
		
		
		
	}
		
		
		
		
	







?>