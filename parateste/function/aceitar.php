<?php
session_start();

	$id=$_SESSION['id'];
	
	
		if (!empty($_POST['delete'])){
			$delete=$_POST['delete'];
			$mostrar=$_GET['mostrar'];
			$li=$_GET['li'];
			
			
			if ($delete=="aceitar"){
				
					$ale=random_int(1,1000);
					
					
					if(!is_dir("../other/". $id ."/depoi/". $ale ."/")){
					mkdir("../other/". $id ."/depoi/". $ale ."/",0777,true);}
				
				
				
				
				copy("../other/". $id ."/depoi/tmp/". $li ."/". $mostrar,"../other/". $id ."/depoi/". $ale ."/". $mostrar);
				unlink("../other/". $id ."/depoi/tmp/". $li ."/". $mostrar);
				rmdir("../other/". $id ."/depoi/tmp/". $li);
				$abrir=fopen("../other/". $id ."/depoi/update.txt","r+");
				$ler=fgets($abrir);
				$ler--;
				
				
				if($ler==0){
					
					unlink("../other/". $id ."/depoi/update.txt");
					fclose($abrir);
					
				}else{
						fclose($abrir);
						$abrir=fopen("../other/". $id ."/depoi/update.txt","w+");
						fwrite($abrir,$ler);
						fclose($abrir);
						
						
				}
				
				
				
			}elseif($delete=="deletar"){
				
				
				unlink("../other/". $id ."/depoi/tmp/". $li ."/". $mostrar);
				rmdir("../other/". $id ."/depoi/tmp/". $li);
				$abrir=fopen("../other/". $id ."/depoi/update.txt","r+");
				$ler=fgets($abrir);
				$ler--;
				
				
				if($ler==0){
					
					unlink("../other/". $id ."/depoi/update.txt");
					fclose($abrir);
					
				}else{
						fclose($abrir);
						$abrir=fopen("../other/". $id ."/depoi/update.txt","w+");
						fwrite($abrir,$ler);
						fclose($abrir);
						
						
				}
				
				
				
				
			}
			
			
			
			
		}



?>