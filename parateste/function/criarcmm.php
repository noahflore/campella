		<?php
			session_start();
			$id= $_SESSION['id'];
			
			
			if(!empty($_POST["nomecmm"])){
				if (!is_dir('../other/var/'. $id)){
					$nome = $_POST["nomecmm"];
					mkdir('../other/var/'. $id,0777,true);
					

						
				}
				$nome = $_POST["nomecmm"];
			}
			if (!empty($nome)){
				if (!is_dir('../other/var/'. $id . '/' . $nome)){
				mkdir('../other/var/'. $id . '/' . $nome,0777,true);}
				if(!empty($_POST['desc'])){
						$desc= $_POST['desc'];
						
						
						if (!file_exists("../other/var/". $id ."/". $nome ."/desc.txt")){
						copy('../other/exemplo/exemplo.txt',"../other/var/". $id ."/". $nome ."/desc.txt");
						}
						$escreva=fopen("../other/var/". $id ."/". $nome ."/desc.txt",'w+');
						fwrite($escreva,$desc);
						fclose($escreva);
				}
				if (!empty($_FILES['fotocmm'])){
					$fotocmm=$_FILES['fotocmm'];
					move_uploaded_file($fotocmm['tmp_name'],'../other/var/'. $id .'/'. $nome. '/fotocmm.png');
					
				}
				
				
				
				if(file_exists("../other/var/". $id ."/updatecmm.txt")){
					$abrir_cmm=fopen("../other/var/". $id ."/updatecmm.txt","r+");
					$guarda=fgets($abrir_cmm);
					fclose($abrir_cmm);
					$guarda++;
					$abrir_cmm=fopen("../other/var/". $id ."/updatecmm.txt","w+");
					fwrite($abrir_cmm,$guarda);
					fclose($abrir_cmm);
					
					$lo=$guarda;
					for( $cmm=$guarda; $cmm>=1; $cmm--){
						--$lo;
						
						if (file_exists("../other/var/". $id ."/". $lo .".txt")){
						copy("../other/var/". $id ."/". $lo .".txt","../other/var/". $id ."/". $cmm .".txt");}
						
						
					}
					
					
					$abrir_cmm=fopen("../other/var/". $id ."/1.txt","w+");
						fwrite($abrir_cmm,$nome);
						fclose($abrir_cmm);
					
				}else {
					
					copy("../other/exemplo/exemplo.txt","../other/var/". $id ."/updatecmm.txt");
					$abrir_cmm=fopen("../other/var/". $id ."/updatecmm.txt","w+");
					fwrite($abrir_cmm,1);
					fclose($abrir_cmm);
					
					for( $cmm=2; $cmm>=1; $cmm--){
						
						
						copy("../other/exemplo/exemplo.txt","../other/var/". $id ."/". $cmm .".txt");
						$abrir_cmm=fopen("../other/var/". $id ."/". $cmm .".txt","w+");
						fwrite($abrir_cmm,$nome);
						fclose($abrir_cmm);
						
					}
					
					
				}//atualiza cmm do usuario em si e não no index
				
			};
				if (file_exists('../other/var/index/update.txt')){
					
					$ab_up=fopen('../other/var/index/update.txt','r+');
					$carregar=fgets($ab_up);
					fclose($ab_up);
					$carregar++;
					$ab_up=fopen('../other/var/index/update.txt','w+');
					fwrite($ab_up,$carregar);
					fclose($ab_up);
						$lo=$carregar;
						for($li=$carregar; $li>=1; --$li){
							
							if(file_exists('../other/var/index/'. $li .'.txt')){//print_r($li);
		
								--$lo;
								if (file_exists('../other/var/index/'. $lo .'.txt')){
								copy('../other/var/index/'. $lo .'.txt','../other/var/index/'. $li .'.txt');}
								
								
								
							}else{
								--$lo;
							copy('../other/exemplo/exemplo.txt','../other/var/index/'. $li .'.txt');
							copy('../other/var/index/'. $lo .'.txt','../other/var/index/'. $li .'.txt');
						//	echo $lo." ". $li;
							
							}
						}
						
				/*		
					$ab=fopen('../other/var/index/1.txt','w+');
					fwrite($ab,$nome);
					fclose($ab);
					
					
					*/
					if ($carregar== 50){
						$recomeçar=fopen('../other/var/index/update.txt','w+');
						fwrite($recomeçar,1);
						fclose($recomeçar);
						
					}
						
				}else{
					copy('../other/exemplo/exemplo.txt','../other/var/index/update.txt');
					copy('../other/exemplo/exemplo.txt','../other/var/index/1.txt');
					$ab_up=fopen('../other/var/index/update.txt','w+');
					fwrite($ab_up,1);
					fclose($ab_up);
					
					
					
				}//serve para atualiza as comunidades
			
			header('location: ../comunidadesdefault.php');
		
		?>
	
	 