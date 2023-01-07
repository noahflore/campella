<?php


	if (!empty($_GET['id'])){//em  desenvolvimento
		$id=$_GET['id'];
		
		
		if (!empty($_POST['amo'])){
			
			if ($_POST['amo']==1){
				
				$amo=0;	
				
			}elseif ($_POST['amo']==2){
				
				$amo=25;
				
			}elseif ($_POST['amo']==3){
				
				$amo=50;
				
			}else{
				
				$amo=100;
				
			}
			
			if (!is_dir("../other/". $id ."/score/")){mkdir("../other/". $id ."/score/",0777,true);		 }
			
			
			copy("../other/exemplo/exemplo.txt","../other/". $id ."/score/amo.txt");
			$abrir=fopen("../other/". $id ."/score/amo.txt","w+");
			fwrite($abrir,$amo);
			fclose($abrir);
			
			
			
		}
		
		
		if (!empty($_POST['legal'])){
			
			if ($_POST['legal']==1){
				
				$legal=0;	
				
			}elseif ($_POST['legal']==2){
				
				$legal=25;
				
			}elseif ($_POST['legal']==3){
				
				$legal=50;
				
			}else{
				
				$legal=100;
				
			}
			
			if (!is_dir("../other/". $id ."/score/")){	mkdir("../other/". $id ."/score/",0777,true);	 }
			
			
			copy("../other/exemplo/exemplo.txt","../other/". $id ."/score/legal.txt");
			$abrir=fopen("../other/". $id ."/score/legal.txt","w+");
			fwrite($abrir,$legal);
			fclose($abrir);
			
			
		}
		
		
		if (!empty($_POST['fogo'])){
			
			if ($_POST['fogo']==1){
				
				$fogo=0;	
				
			}elseif ($_POST['fogo']==2){
				
				$fogo=25;
				
			}elseif ($_POST['fogo']==3){
				
				$fogo=50;
				
			}else{
				
				$fogo=100;
				
			}
			
			if (!is_dir("../other/". $id ."/score/")){	mkdir("../other/". $id ."/score/",0777,true);	 }
			
			
			copy("../other/exemplo/exemplo.txt","../other/". $id ."/score/fogo.txt");
			$abrir=fopen("../other/". $id ."/score/fogo.txt","w+");
			fwrite($abrir,$fogo);
			fclose($abrir);
			
			
			
		}
		
		
		
		
	}

	header("location: ../friend/userseeuser.php?id=$id");




?>