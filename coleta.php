<!docktype html>

<html>

	 <head>
	 
	 <title>coletando</title>
	 <meta charset="utf-8" />
	 <?php
		$nome =$_POST["nome"];
		$sobrenome =$_POST["sobrenome"];
		$email =$_POST["email"];
		$senha =$_POST["senha"];
		$repita =$_POST["repita"];
	 
	 
	 ?>
	 
	 </head>
	 
	 <body>
		<?php
			echo "$nome <br>";
			echo "$sobrenome <br>";
			echo "$email<br>";
			echo "$senha<br>";
			echo $repita;
			
			if($senha!= $repita){
				
			echo  "erro";
				
				
			}
		
		
		?>
	
	 
	 </body>





</html>