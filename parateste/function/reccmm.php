<?php
	session_start();
	include "bbcode.php";
	
	$id=$_GET['id'];
	$meuid=$_SESSION['id'];
	$nome=$_SESSION['nome'];
	$texto = $_POST["texto"];
	$abrir="../other/exemplo/exemplo.txt";
	$idcmm= $_GET["idcmm"];
	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");
	
		$texto= bbcode($nome ."-". $texto ."  ". $dia ."/". $mes ."/". $ano);
		/* se esse codigo não for util pode excluir
		while(!is_dir("../other/var/". $id ."/". $idcmm ."/")){
			
			$abrir=fopen("../other/var/index/update/update.txt","r+");
			$ler=fgets($abrir);
			fclose($abrir);
			for ($i=1; $i<=$ler;$i++){
				$abrir=fopen("../other/var/index/update/". $i .".txt","r+");
				$id=fgets($abrir);
				if (is_dir("../other/var/". $id ."/". $idcmm ."/")){break;}
				fclose($abrir);
				
			}
			break;
		}
		*/
		if (file_exists("../other/var/". $id ."/". $idcmm ."/numero.txt")){
			
			$abr_tmp=fopen("../other/var/". $id ."/". $idcmm ."/numero.txt","r+");
			$tmp=fgets($abr_tmp);
			fclose($abr_tmp);
			$tmp++;
			$abr_tmp=fopen("../other/var/". $id ."/". $idcmm ."/numero.txt","w+");
			fwrite($abr_tmp,$tmp);
			fclose($abr_tmp);
			
		}else{
			
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/numero.txt");
			$abr_tmp=fopen("../other/var/". $id ."/". $idcmm ."/numero.txt","w+");
			fwrite($abr_tmp,1);
			fclose($abr_tmp);
			$tmp=1;
			
		}
	
		
		if(file_exists("../other/var/". $id ."/". $idcmm . "/show.txt") && (file_exists("../other/var/". $id ."/". $idcmm . "/show2.txt")) && (!file_exists("../other/var/". $id ."/". $idcmm . "/show3.txt"))){
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/show3.txt");
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show3.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			if (file_exists("../other/". $meuid ."/fotoperso.png")){
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm .  "/". $tmp ."/fotoperso.png");
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm . "/show3.png");
				
				
				}
			
		}elseif (file_exists("../other/var/". $id ."/". $idcmm . "/show.txt") && (file_exists("../other/var/". $id ."/". $idcmm . "/show2.txt")) && (file_exists("../other/var/". $id ."/". $idcmm . "/show3.txt"))){
			$copia1 = "../other/var/". $id ."/". $idcmm . "/show.txt";
			$copia2 = "../other/var/". $id ."/". $idcmm . "/show2.txt";
			$copia3 = "../other/var/". $id ."/". $idcmm . "/show3.txt";
			copy($copia2,$copia1);
			copy($copia3,$copia2);
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			$copia3 = fopen("../other/var/". $id ."/". $idcmm . "/show3.txt",'w+');
			fwrite($copia3,$texto);
			fwrite($escreve,$texto);
			
			if (file_exists("../other/". $meuid ."/fotoperso.png")){
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm .  "/". $tmp ."/fotoperso.png");
				copy("../other/var/". $id ."/". $idcmm . "/show2.png","../other/var/". $id ."/". $idcmm . "/show.png");
				copy("../other/var/". $id ."/". $idcmm . "/show3.png","../other/var/". $id ."/". $idcmm . "/show2.png");
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm . "/show3.png");
				
				
				}
			
		}
			
			
			
			
		
		
		
		if(file_exists("../other/var/". $id ."/". $idcmm . "/show.txt") && (!file_exists("../other/var/". $id ."/". $idcmm . "/show2.txt"))){
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/show2.txt");
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show2.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			if (file_exists("../other/". $meuid ."/fotoperso.png")){
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm .  "/". $tmp ."/fotoperso.png");
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm . "/show2.png");
				
				}
			
		}elseif (!file_exists("../other/var/". $id ."/". $idcmm . "/show.txt")){
		
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/show.txt");
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			
			if (file_exists("../other/". $meuid ."/fotoperso.png")){
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm .  "/". $tmp ."/fotoperso.png");
				copy("../other/". $meuid ."/fotoperso.png","../other/var/". $id ."/". $idcmm . "/show.png");
				
				}
			
		}
		/* copy($abrir,'../other/var/index/first.txt');
		$primeiro = fopen("../other/var/index/first.txt",'w+');
		fwrite($primeiro,$idcmm);
		
			$backup=$idcmm;
			echo "<a href='../principaldefault.php?backup=". $backup ."'>volta</a>" */
	//você precisa configura o id de todos!
		
		
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
						
						
					$ab=fopen('../other/var/index/1.txt','w+');
					fwrite($ab,$idcmm);
					fclose($ab);
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
			
			
			if ($_GET['todo']==1){
				
				header("location: ../userpage/usercmm/todotpc.php?idcmm=$idcmm&id=$id&index=$id");
				
			}else{
			
			header("location: ../principaldefault.php");
			
			
			}
?>