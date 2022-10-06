<?php
session_start();

	$idcmm=$_GET['idcmm'];
	$id=$_GET['id'];
	$i=$_GET['i'];
	$nome=$_SESSION['nome'];

		unlink("../../other/var/". $id ."/". $idcmm ."/". $i ."/fotoperso.png");
		unlink("../../other/var/". $id ."/". $idcmm ."/". $i ."/". $nome .".txt");
		unlink("../../other/var/". $id ."/". $idcmm ."/". $i ."/$id");
		rmdir("../../other/var/". $id ."/". $idcmm ."/". $i);

		$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/numero.txt","r+");
		$ler= fgets($abrir);
		$ler--;
		fclose($abrir);
		$abrir=fopen("../../other/var/". $id ."/". $idcmm ."/numero.txt","w+");
		fwrite($abrir,$ler);
		fclose($abrir);
		
		header("location: todotpc.php?idcmm=$idcmm&id=$id");




?>