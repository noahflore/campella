<?php

	$texto=$_GET['update'];
	$nome=$_GET['titulo'];
	$dia= date("d");
	$mes= date("m");
	$ano= date("y");
	
	$tempo= "update da data:  $dia/$mes/$ano    ";
	
	
	for ($i=0; $i<=1000; $i++){
		$pasta=$i;
		
		if (!is_dir("../../other/update/". $pasta)){
			mkdir("../../other/update/". $pasta,0777,true);
			copy("../../other/exemplo/exemplo.txt","../../other/update/". $pasta ."/". $nome .".txt");
			$abrir=fopen("../../other/update/". $pasta ."/". $nome .".txt","w+");
			fwrite($abrir,$tempo ."<b>$nome</b><br>". $texto);
			fclose($abrir);
			
			break;
			
		}
		
		
		
		
	}

	if (isset($_GET['indi'])){
		
	header("../../location: updatesee.php");
		
	}else{
		
		header("location: updatesee.php");
		
	}







?>