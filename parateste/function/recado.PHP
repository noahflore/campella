<?php
	session_start();	include_once "../function/bbcode.php"; 

		$dia= date("d");
		$mes= date("m");
		$ano= date("Y");
		$hora= date("h");
		$min= date("i");

		$tempo="enviado as $dia/$mes/$ano as $hora:$min horas";


	$texto= $_POST['texto'];
	$nome=$_SESSION['nome'];
	$separa=1;
	$meuid=$_SESSION['id'];
	
	
	
	$texto= bbcode($texto ."    ". $tempo);
	
		if (!empty($_GET['id'])){
			
			$id=$_GET['id'];
			
			
		}else{
			
			$id= $_SESSION['id'];
			
			
		}
	
	if(file_exists("../other/". $id ."/recado/pasta.txt")){
		
		$abrir=fopen("../other/". $id ."/recado/pasta.txt","r+");
		$ler=fgets($abrir);
		fclose($abrir);
		
		$abrir=fopen("../other/". $id ."/recado/tmp/tmpupdate.txt","r+");
		$jesus=fgets($abrir);
		fclose($abrir);
		$jesus++;
		$abrir=fopen("../other/". $id ."/recado/tmp/tmpupdate.txt","w+");
		fwrite($abrir,$jesus);
		fclose($abrir);
		
		if (file_exists("../other/". $id ."/recado/". $ler ."/010.txt")){
			
			$abrir=fopen("../other/". $id ."/recado/". $ler ."/010.txt","r+");
			$guarda=fgets($abrir);
			fclose($abrir);
			$guarda++;
			$abrir=fopen("../other/". $id ."/recado/". $ler ."/010.txt","w+");
			fwrite($abrir,$guarda);
			fclose($abrir);
			
			if ($guarda<=10){
				
				mkdir("../other/". $id ."/recado/". $ler ."/". $guarda ."/",0777,true);
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/". $ler ."/". $guarda ."/". $nome .".txt");
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/". $ler ."/". $guarda ."/$meuid");
				$abrir=fopen("../other/". $id ."/recado/". $ler ."/". $guarda ."/". $nome .".txt","w+");
				fwrite($abrir,$texto);
				fclose($abrir);
				
				
			}else{
				$ler++;
				$abrir=fopen("../other/". $id ."/recado/pasta.txt","w+");
				fwrite($abrir,$ler);
				fclose($abrir);
				
				
				$abrir=fopen("../other/". $id ."/recado/tmp/tmpupdate.txt","r+");
				$jesus=fgets($abrir);
				fclose($abrir);
				$jesus++;
				$abrir=fopen("../other/". $id ."/recado/tmp/tmpupdate.txt","w+");
				fwrite($abrir,$jesus);
				fclose($abrir);
				
				mkdir("../other/". $id ."/recado/". $ler ."/1",0777,true);
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/". $ler ."/1/". $nome .".txt");
				$abrir=fopen("../other/". $id ."/recado/". $ler ."/1/". $nome .".txt","w+");
				fwrite($abrir,$texto);
				fclose($abrir);
				
				copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/". $ler ."/010.txt");
				$abrir=fopen("../other/". $id ."/recado/". $ler ."/010.txt","w+");
				fwrite($abrir,1);
				fclose($abrir);
				
				
			}
			
			
		}
		
		
	}else{
		
		mkdir("../other/". $id ."/recado/tmp/",0777,true);
		copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/pasta.txt");
		copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/tmp/tmpupdate.txt");
		$abrir=fopen("../other/". $id ."/recado/pasta.txt","w+");
		fwrite($abrir,1);
		fclose($abrir);
		$abrir=fopen("../other/". $id ."/recado/tmp/tmpupdate.txt","w+");
		fwrite($abrir,1);
		fclose($abrir);
		mkdir("../other/". $id ."/recado/1",0777,true);
		copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/1/010.txt");
		
		
		$abrir=fopen("../other/". $id ."/recado/1/010.txt","w+");
		fwrite($abrir,1);
		fclose($abrir);
		
		mkdir("../other/". $id ."/recado/1/1",0777,true);
		
		copy("../other/exemplo/exemplo.txt","../other/". $id ."/recado/1/1/". $nome .".txt");
		$abrir=fopen("../other/". $id ."/recado/1/1/". $nome .".txt","w+");
		fwrite($abrir,$texto);
		fclose($abrir);
		
	}
	if (!empty($_GET['todo'])){
		
		header("location: ../friend/userpage/scrapuser.php?id=$id&index=1");
		
		
	}else{
		header("location:../userpage/scrapuser.php?index=1");
		
		
		
	}
?>