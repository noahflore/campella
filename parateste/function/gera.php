<?php


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

?>