<?php

	$gatos=array_diff(scandir("defaultstyle/"),['.','..']);
	$gatos2=array_diff(scandir("function/"),['.','..']);
	$mesa=date("m");
	$dai=date("d");
	$rora=date("h");
	$munuta=date("i");

	foreach ($gatos as $gatomm){
		
		
		
		$maluco=date("m",filemtime("defaultstyle/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("defaultstyle/". $gatomm));
		$maluco3=date("h",filemtime("defaultstyle/". $gatomm));
		$maluco4=date("i",filemtime("defaultstyle/". $gatomm));
		
		if (($maluco>=$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4!=$munuta)){
		echo $gatomm;
			
		}
		
		
	}

	foreach ($gatos2 as $gatomm){
		
		
		
		$maluco=date("m",filemtime("function/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("function/". $gatomm));
		$maluco3=date("h",filemtime("function/". $gatomm));
		$maluco4=date("i",filemtime("function/". $gatomm));
		
		if (($maluco>=$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4!=$munuta)){
		echo $gatomm;
			
		}
		
		
	}






?>