<?php
session_start();


	$id=$_SESSION['id'];
	
	
		if (!empty($_GET['p'])){
			
			
			if ($_GET['p']==1){
				
				$p=$_GET['p'];
					
					if (!is_dir("../other/". $id ."/priva/")){
						
						mkdir("../other/". $id ."/priva/",0777,true);
						copy("../other/exemplo/exemplo.txt","../other/". $id ."/priva/p1");
						
					}else{
						
						if (file_exists("../other/". $id ."/priva/p1")){
							
							unlink("../other/". $id ."/priva/p1");
							
							
						}else{
							
							
							copy("../other/exemplo/exemplo.txt","../other/". $id ."/priva/p1");
						
						
						}
						
					}
				
				
			}elseif ($_GET['p']==2){
				
				if (!is_dir("../other/". $id ."/priva/")){
						
						mkdir("../other/". $id ."/priva/",0777,true);
						copy("../other/exemplo/exemplo.txt","../other/". $id ."/priva/p2");
						
					}else{
						
						
						if (file_exists("../other/". $id ."/priva/p2")){
							
							unlink("../other/". $id ."/priva/p2");
							
							
						}else{
							
							
							copy("../other/exemplo/exemplo.txt","../other/". $id ."/priva/p2");
						
						
						}
						
						
					}
				
				
				
			}
			
			
			
			
			echo "<script> location.href= window.history.back()</script>";
			
			
		}else{
			
			
			echo "<script>location.href=window.history.go(-2)</script>";
			
			
			
		}









?>