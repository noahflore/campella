<html>
	
	
	<?php
	
		if ($_POST['valor']==1){
			
			
			for ($i=0;$i<=1000; $i++){
				if ((!is_dir("../../other/". $i ."/manu/")) and (is_dir("../../other/". $i))){mkdir("../../other/". $i ."/manu/",0777,true);}
				
				copy("../../other/exemplo/exemplo.txt","../../other/". $i ."/manu/1");
				copy("../../other/exemplo/exemplo.txt","../../other/". $i ."/manu/11");
				
			}
			
			
			
		}elseif ($_POST['valor']==0){
			
			for ($i=0;$i<=1000; $i++){
				if ((is_dir("../../other/". $i ."/manu/")) and (is_dir("../../other/". $i))){unlink("../../other/". $i ."/manu/1");}
				
				
				
				
				
			}
			
			
			
		}
	
	
	
	
	
	?>
	
	<form method="post" action="manu.php">
		
		<input type="number" name="valor" />
		<input type="submit" value="enviar" />
		
		
		
	</form>
	
	
	
	
	
	
	
</html>