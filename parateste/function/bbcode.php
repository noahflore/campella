<?php


	
	function bbcode ($texto){
		
		
		$valor= array(
		
				"@\[b\](.*?)\[\/b\]@i"=>"<b>$1</b>",
				"@\[i\](.*?)\[\/i\]@i"=>"<i>$1</i>",
				"@\[s\](.*?)\[\/s\]@i"=>"<s>$1</s>",
				"@\[color\=(.*?)\](.*?)\[\/color\]@i"=>"<b style='color:$1'>$2</b>",
				"@\[quote\=(.*?)\](.*?)\[\/quote\]@i"=>"<p><q style='background-color:orange'>$1</q></p><br>$2"
		
		
		
		
		);
		
		
		
		return preg_replace(array_keys($valor),array_values($valor),$texto);
		
		
	}


    


?>