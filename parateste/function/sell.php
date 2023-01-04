<?php	session_start();

	for ($i=1;$i<=50;$i++){
		
		
		if (file_exists("../propaganda/v". $i .".png")){
			
			echo "<img src='../propaganda/v". $i .".png' /><form method='post' action='gera.php?id=$id&v=v$i&outro=2'>
			
															<input type='submit' value='enviar!' />
															
															
															</form>
			
			
			<br>";
			
			
			
		}
		
		
		
		
		
		
		
	}









?>