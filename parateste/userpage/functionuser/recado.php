<?php
session_start();

	if ((!empty($_GET['i'])) and (!empty($_GET['r'])) and (!empty($_GET['index'])) and (!empty($_GET['ap']))){
		
		$id=$_SESSION['id'];
		$index=$_GET['index'];
		$i=$_GET['i'];
		$t=$_GET['r'];
		$idapaga=$_GET['ap'];
		
		$t=str_replace(" - ","",$t);
		
			unlink("../../other/". $id ."/recado/". $index ."/". $i ."/". $t .".txt");
			unlink("../../other/". $id ."/recado/". $index ."/". $i ."/". $idapaga);
			rmdir("../../other/". $id ."/recado/". $index ."/". $i ."/");
			
			/*
			$abrir=fopen("../../other/". $id ."/recado/". $index ."/010.txt","w+");
			fwrite($abrir,--$i);
			fclose($abrir);
			*/
		
		
		
		
	}



		header("location: ../scrapuser.php?index=1");



?>