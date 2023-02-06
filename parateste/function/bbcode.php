<?php


	
	function bbcode ($texto){
		
		
		$valor= array(
		
				"@\[b\](.*?)\[\/b\]@i"=>"<b>$1</b>",
				"@\[i\](.*?)\[\/i\]@i"=>"<i>$1</i>",
				"@\[s\](.*?)\[\/s\]@i"=>"<s>$1</s>",
				"@\[color\=(.*?)\](.*?)\[\/color\]@i"=>"<b style='color:$1'>$2</b>",
				"@\[quote\=(.*?)\](.*?)\[\/quote\]@i"=>"<div style='background-color:orange;width:10px'><div class='cita'>$1</div></div><br>$2",
				"@<script>(.*?)<\/script>@i"=> "script block",
				"@<script src='(.*?)'>(.*?)<\/script>@i"=> "script block"
				
		
		
		
		
		);
		
		
		
		return preg_replace(array_keys($valor),array_values($valor),$texto);
		
		
	}


    


?>