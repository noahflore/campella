<?php

	$gatos=array_diff(scandir("defaultstyle/"),['.','..']);
	$data=fopen("function/data","r+"); 
	$datadd=fgets($data); //echo $datadd;
	fclose ($data);

	foreach ($gatos as $gatomm){
		
		
		
		$ver=str_replace(".css","",$gatomm) . date("m d h:i",filemtime("defaultstyle/". $gatomm));
		
		if (date("m d h:i",filemtime("defaultstyle/". $gatomm))>$datadd){
		echo $ver;
			
		}
		
		
	}






?>