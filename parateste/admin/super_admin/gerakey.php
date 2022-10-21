<?php

	$op=$_POST['link'];
	
	
	echo "<div><form method='get' action='criarkey.php'>
	
			<input type='number' name='keydir' placeholder='chave direta' max='1000' /><input name='key' type='submit' value='dir' />
			<input type='number' name='keyindi' placeholder='chave indireta' max='1000' /><input name='key' type='submit' value='indi' />
			<input type='number' name='keyespecial' placeholder='chave especial' max='1000' /><input name='key' type='submit' value='especial' />
	
		
		</form>
	
	
	
	
	
	";
	if(file_exists('../../other/dir/update.txt')){
		$exibir=array_diff(scandir('../../other/dir/'),['.','..','update.txt']);
		
		echo"<div style='display: flex'><h1>chave direta</h1>";
		
		foreach ($exibir as $lista){
			
			echo"
					$lista<br>
			
			
			
			
			";
			
			
			
		}
		
		
		
	}
	
	if(file_exists('../../other/indi/update.txt')){
		$exibir=array_diff(scandir('../../other/indi/'),['.','..','update.txt']);
		
		echo"<h1>chave indireta</h1>";
		
		foreach ($exibir as $lista){
			
			echo"
					$lista<br>
			
			
			
			
			";
			
			
			
		}
		
		echo"</div>";
		
	}








?>