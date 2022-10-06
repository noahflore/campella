<?php
session_start();

	$id=$_GET['id'];
	$outro=$_GET['outro'];
	$idcmm=$_GET['idcmm'];

	if (is_dir("../../other/var/". $id ."/". $outro ."/tmp/")){
		$nome=$_SESSION['nome'];
		$meuid=$_SESSION['id'];
		
		
		copy("../../exemplo/exemplo.txt","../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt");
		$abrir=fopen("../../other/var/". $id ."/". $outro ."/tmp/". $meuid .".txt","w+");
		fwrite($abrir,$nome);
		fclose($abrir);
		
		header("location: todotpc.php?id=$id&outro=$outro&idcmm=$idcmm");
		
	}






?>