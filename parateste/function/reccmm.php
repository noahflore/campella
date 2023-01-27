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
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/sc.txt");
			$cuca=fopen("../other/var/". $id ."/". $idcmm . "/sc.txt","w+");
			fwrite($cuca,$meuid);
			fclose($cuca);
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show3.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			
		}elseif (file_exists("../other/var/". $id ."/". $idcmm . "/show.txt") && (file_exists("../other/var/". $id ."/". $idcmm . "/show2.txt")) && (file_exists("../other/var/". $id ."/". $idcmm . "/show3.txt"))){
			$copia1 = "../other/var/". $id ."/". $idcmm . "/show.txt";
			$copia2 = "../other/var/". $id ."/". $idcmm . "/show2.txt";
			$copia3 = "../other/var/". $id ."/". $idcmm . "/show3.txt";
			copy("../other/var/". $id ."/". $idcmm . "/sb.txt","../other/var/". $id ."/". $idcmm . "/sa.txt");
			copy("../other/var/". $id ."/". $idcmm . "/sc.txt","../other/var/". $id ."/". $idcmm . "/sb.txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/sc.txt");
			$cuca=fopen("../other/var/". $id ."/". $idcmm . "/sc.txt","w+");
			fwrite($cuca,$meuid);
			fclose($cuca);
			
			
			copy($copia2,$copia1);
			copy($copia3,$copia2);
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			$copia3 = fopen("../other/var/". $id ."/". $idcmm . "/show3.txt",'w+');
			fwrite($copia3,$texto);
			fwrite($escreve,$texto);
			
		}
			
			
			
			
		
		
		
		if(file_exists("../other/var/". $id ."/". $idcmm . "/show.txt") && (!file_exists("../other/var/". $id ."/". $idcmm . "/show2.txt"))){
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/show2.txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/sb.txt");
			$cuca=fopen("../other/var/". $id ."/". $idcmm . "/sb.txt","w+");
			fwrite($cuca,$meuid);
			fclose($cuca);
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show2.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			
		}elseif (!file_exists("../other/var/". $id ."/". $idcmm . "/show.txt")){
		
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/show.txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm . "/sa.txt");
			$cuca=fopen("../other/var/". $id ."/". $idcmm . "/sa.txt","w+");
			fwrite($cuca,$meuid);
			fclose($cuca);
			
			mkdir("../other/var/". $id ."/". $idcmm ."/". $tmp,0777,true);
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/". $nome .".txt");
			copy($abrir,"../other/var/". $id ."/". $idcmm ."/". $tmp ."/$meuid");
			$copia = fopen("../other/var/". $id ."/". $idcmm . "/show.txt",'a+');
			$escreve = fopen("../other/var/". $id ."/". $idcmm .  "/". $tmp ."/". $nome. ".txt",'a+');
			fwrite($copia,$texto);
			fwrite($escreve,$texto);
			
			
			
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