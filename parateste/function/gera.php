<?php



	if (!empty($_GET['outro'])){

		
		if ($_GET['outro']==2){
			
			$id=$_GET['id'];
			$venda=$_GET['v'];
			
			$abrir=fopen("../propaganda/". $venda .".txt","r+");
			$ler=fgets($abrir);
			fclose($abrir);
			
			if (!is_dir("../other/$id/venda/")){mkdir("../other/$id/venda/",0777,true);}
			copy("../other/exemplo/exemplo.txt","../other/$id/venda/". $ler .".txt");
			$chave=random_bytes(8);
			$chave=bin2hex($chave);
			
			
			$abrir=fopen("../other/$id/venda/". $ler .".txt","w+");
			fwrite($abrir,$chave);
			fclose($abrir);
			
			
			//em manutenção
		}
		
		
		if ($_GET['outro']==1){
			
			
			if(!empty($_GET['id'])){

				$id=$_GET['id'];

				if(!is_dir("../other/". $id ."/convida/")){

					mkdir("../other/". $id ."/convida/",0777,true);

					$cod=random_bytes(8);
					$recebe=bin2hex($cod);

					copy("../other/exemplo/exemplo.txt","../other/". $id ."/convida/". $recebe);
					$abrir=fopen("../other/". $id ."/convida/". $recebe,"w+");
					fwrite($abrir,10);
					fclose($abrir);
					echo "esse é o seu codigo de convite <b>$recebe</b> você pode usa 10 vezes e recebe valor de kants";


				}else{

					echo "<script>alert('você já gerou uma chave termine de usa ela antes de gera outra!');location.href=history.back()</script>";	


				}



			}//o arquivo job.php precisa se revisado antes de mexer aqui

		}
		
	}
?>