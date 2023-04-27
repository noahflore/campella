<?php

	$gatos=array_diff(scandir("defaultstyle/"),['.','..']);
	$gatos2=array_diff(scandir("function/"),['.','..']);
	$gatos3=array_diff(scandir("friend/"),['.','..']);
	$gatos4=array_diff(scandir("ico/"),['.','..']);
	$year=date("y");
	$mesa=date("m");
	$dai=date("d");
	$rora=date("h");
	$munuta=date("i");

	foreach ($gatos as $gatomm){
		
		
		$maluco1=date("y",filemtime("defaultstyle/". $gatomm));
		$maluco=date("m",filemtime("defaultstyle/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("defaultstyle/". $gatomm));
		$maluco3=date("h",filemtime("defaultstyle/". $gatomm));
		$maluco4=date("i",filemtime("defaultstyle/". $gatomm));
		
		if (($maluco1==$year) and ($maluco==$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4!=$munuta)){
		$gatomm=str_replace(".css","",$gatomm);
			$chamada="admin/super_admin/showupdate.php";
			header("location: ". $chamada ."?titulo=$gatomm&update=$gatomm esse estilo foi modificada&indi=1");
			
			
		}
		
		
	}

	foreach ($gatos2 as $gatomm){
		
		
		$maluco1=date("y",filemtime("function/". $gatomm));
		$maluco=date("m",filemtime("function/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("function/". $gatomm));
		$maluco3=date("h",filemtime("function/". $gatomm));
		$maluco4=date("i",filemtime("function/". $gatomm));
		
		if (($maluco1==$year) and ($maluco==$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4==$munuta)){
		$gatomm=str_replace(".php","",$gatomm);
			$chamada="admin/super_admin/showupdate.php";
			header("location: ". $chamada ."?titulo=$gatomm&update=$gatomm essa funcao foi modificada&indi=1");
			
		}
		
		
	}

	foreach ($gatos3 as $gatomm){
		
		
		$maluco1=date("y",filemtime("friend/". $gatomm));
		$maluco=date("m",filemtime("friend/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("friend/". $gatomm));
		$maluco3=date("h",filemtime("friend/". $gatomm));
		$maluco4=date("i",filemtime("friend/". $gatomm));
		
		if (($maluco1==$year) and ($maluco==$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4==$munuta)){
		$gatomm=str_replace(".php","",$gatomm);
			$chamada="admin/super_admin/showupdate.php";
			header("location: ". $chamada ."?titulo=$gatomm&update=$gatomm uma nova pessoa foi adicionada&indi=1");
			
		}
		
		
	}

	foreach ($gatos4 as $gatomm){
		
		
		$maluco1=date("y",filemtime("ico/". $gatomm));
		$maluco=date("m",filemtime("ico/". $gatomm)); //echo $maluco;
		$maluco2=date("d",filemtime("ico/". $gatomm));
		$maluco3=date("h",filemtime("ico/". $gatomm));
		$maluco4=date("i",filemtime("ico/". $gatomm));
		
		if (($maluco1==$year) and ($maluco==$mesa) and ($maluco2>=$dai) and ($maluco3>=$rora) and ($maluco4==$munuta)){
		$gatomm=str_replace(".png","",$gatomm);
			$chamada="admin/super_admin/showupdate.php";
			header("location: ". $chamada ."?titulo=$gatomm&update=$gatomm esse icone foi modificado&indi=1");
			
		}
		
		
	}






?>