<?php session_start(); include "../../function/idsave.php"; ?>
<!doctype html>

<html>

	<head>
		<title> titulo</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../defaultstyle/baseestilo.css" />
		<link rel="stylesheet" href="../../defaultstyle/stylecmm.css" />
		
		
	</head>

	<body>
		
		<header	class="cabeça">
		
			<img src="../../ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<li><a href="userdefault.php">user</a></li>
					<!-- o de cima é nome do usuario-->
					<li><a href="../../principaldefault.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		<div>
		
			<?php
				$id=$_SESSION['id'];
				$idcmm=$_GET['idcmm'];
				
				if ((!empty($_POST['tpc'])) or (!empty($_POST['resumo']))){
					$tpc=$_POST['tpc'];
					$resumo=(!empty($_POST['resumo']))? $_POST['resumo']: " " ;
					
					if (!is_dir('../../other/var/'. $id .'/'. $idcmm .'-'. $tpc)){
					mkdir('../../other/var/'. $id .'/'. $idcmm .'-'. $tpc ."/busca/",0777,true);
					copy ("../../other/exemplo/exemplo.txt","../../other/var/". $id ."/". $idcmm ."-". $tpc ."/busca/$idcmm");
					if(file_exists('../../other/var/'. $id .'/'. $idcmm .'/fotocmm.png')){
						
						copy('../../other/var/'. $id .'/'. $idcmm .'/fotocmm.png','../../other/var/'. $id .'/'. $idcmm .'-'. $tpc .'/fotocmm.png');
						
					}elseif (file_exists('../../other/var/'. $id .'/'. $idcmm .'/desc.txt')){
						
						
						copy('../../other/var/'. $id .'/'. $idcmm .'/desc.txt','../../other/var/'. $id .'/'. $idcmm .'-'. $tpc .'/desc.txt');
						
						
						
					}
					}
						copy('../../other/exemplo/exemplo.txt','../../other/var/'. $id .'/'. $idcmm .'-'. $tpc .'/momento.txt');
					$abrir=fopen('../../other/var/'. $id .'/'. $idcmm .'-'. $tpc .'/momento.txt','r+');
					fwrite($abrir,$resumo);
					fclose($abrir);
					
					if (file_exists('../../other/var/'. $id .'/'. $idcmm .'/updatetcp.txt')){
						idsave($id);
						$meu_tcp=fopen('../../other/var/'. $id .'/'. $idcmm .'/updatetcp.txt','r+');
						$cmm_p=fgets($meu_tcp);
						$cmm_p++;
						fclose($meu_tcp);
						$meu_tcp=fopen('../../other/var/'. $id .'/'. $idcmm .'/updatetcp.txt','w+');
						fwrite($meu_tcp,$cmm_p);
						fclose($meu_tcp);
						
						$bb=$cmm_p;
						
						for ($lertcp=$cmm_p; $lertcp>=1; $lertcp--){
							--$bb;
							if (file_exists('../../other/var/'. $id .'/'. $idcmm .'/'. $bb .'.txt')){
								copy('../../other/var/'. $id .'/'. $idcmm .'/'. $bb .'.txt', '../../other/var/'. $id .'/'. $idcmm .'/'. $lertcp .'.txt');
							}
							
						}
						$abrir=fopen('../../other/var/'. $id .'/'. $idcmm .'/1.txt','w+');
						
						fwrite($abrir,$tpc);
						
						fclose($abrir);
						
					}else{
						idsave($id);
						copy('../../other/exemplo/exemplo.txt', '../../other/var/'. $id .'/'. $idcmm .'/updatetcp.txt');
						$meu_tcp=fopen('../../other/var/'. $id .'/'. $idcmm .'/updatetcp.txt','w+');
						fwrite($meu_tcp,1);
						fclose($meu_tcp);
						for ($lertcp=2; $lertcp>=1; $lertcp--){
							
							copy('../../other/exemplo/exemplo.txt', '../../other/var/'. $id .'/'. $idcmm .'/'. $lertcp .'.txt');
							$meu_tcp=fopen('../../other/var/'. $id .'/'. $idcmm .'/'. $lertcp .'.txt', 'w+');
							fwrite($meu_tcp,$tpc);
							fclose($meu_tcp);
							
							
						}// isso faz que a cmm se linka ao topico
						
						
						
					}
					
					
				//	print_r($tpc);
					
				if (file_exists('../../other/var/index/update.txt')){
					
					$ab_up=fopen('../../other/var/index/update.txt','r+');
					$carregar=fgets($ab_up);
					fclose($ab_up);
					$carregar++;
					$ab_up=fopen('../../other/var/index/update.txt','w+');
					fwrite($ab_up,$carregar);
					fclose($ab_up);
						$lo=$carregar;
						for($li=$carregar; $li>=1; --$li){
							
							if(file_exists('../../other/var/index/'. $li .'.txt')){//print_r($li);
		
								--$lo;
								if (file_exists('../../other/var/index/'. $lo .'.txt')){
								copy('../../other/var/index/'. $lo .'.txt','../../other/var/index/'. $li .'.txt');}
								
								
								
							}else{
								--$lo;
							copy('../../other/exemplo/exemplo.txt','../../other/var/index/'. $li .'.txt');
							copy('../../other/var/index/'. $lo .'.txt','../../other/var/index/'. $li .'.txt');
						//	echo $lo." ". $li;
							
							}
						}
						
						
					$ab=fopen('../../other/var/index/1.txt','w+');
					fwrite($ab,$idcmm ."-". $tpc);
						fclose($ab);
					if ($carregar== 50){
						$recomeçar=fopen('../../other/var/index/update.txt','w+');
						fwrite($recomeçar,1);
						fclose($recomeçar);
						
						
						
					}
						
				}else{
					copy('../../other/exemplo/exemplo.txt','../../other/var/index/update.txt');
					copy('../../other/exemplo/exemplo.txt','../../other/var/index/1.txt');
					$ab_up=fopen('../../other/var/index/update.txt','w+');
					fwrite($ab_up,1);
					fclose($ab_up);
					
					
					
				}//serve para atualiza as comunidades
					
					
				}
			
				echo "<div class='ajuste'><form method='post' action='criartpc.php?idcmm=". $idcmm ."' >
				<input type='text' name='tpc' placeholder='nome do topico' />
				<input type='text' name='resumo' placeholder='assunto do topico' />
				<input type='submit' value='enviar' />
			
			
				</form></div>";
				
				
			
			?>
			
			
		
		</div>






	</body>

</html>