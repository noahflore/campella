<?php


	
	function bbcode ($texto){
		
		$texto=str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$texto);
		$texto= str_replace("script","block script",$texto);
		$texto=str_replace("\n","<br>",$texto);
		$texto=str_replace(".js",".png",$texto);
		
		$valor= array(
		
				"@\[b\](.*?)\[\/b\]@i"=>"<b>$1</b>",
				"@\[i\](.*?)\[\/i\]@i"=>"<i>$1</i>",
				"@\[s\](.*?)\[\/s\]@i"=>"<s>$1</s>",
				"@\[color\=(.*?)\](.*?)\[\/color\]@i"=>"<b style='color:$1'>$2</b>",
				"@\[img\=(.*?)\]\[\/img\]@i"=>"<img style='width:400px;height:400px' src='$1' alt='image_out_website' />",
				"@\[quote\=(.*?)\](.*?)\[\/quote\]@i"=>"<div style='background-color:orange;width:10px'><div class='cita'>$1</div></div><br>$2",
				"@\[youtube=(.*?)\]\[\/youtube\]@i"=>"<iframe width='200' height='200' src='$1' title='video_user' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen=''></iframe>",
				"@\[youtube=(.*?)\](.*?)\[\/youtube\]@i"=>"<fieldset><legend><h2>$2</h2></legend><iframe width='200' height='200' src='$1' title='video_user' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen=''></iframe></fieldset>",
				"@\[link\=(.*?)\]\[\/link\]@i"=>"<a href='$1' target='_blank'>$1</a>",
				"@\[link\=(.*?)\](.*?)\[\/link\]@i"=>"<a href='$1' target='_blank'>$2</a>",
				"[:\)]"=>"<span>&#x1F60A;</span>",
				"[:\(]"=>"<span>&#x1F61F;</span>",
				"[:S]"=>"<span>&#x1F615;</span>",
				"[:D]"=>"<span>&#x1F92D;</span>",
				"[<3]"=>"<span>&#x2764;</span>",
				"@\?help\?@i"=>"[link=url do site]titulo do site [/link]<br>[b]<strong>palavra em negrito</strong>[/b]<br>[i]<i>palavra em italica</i>[/i]<br>[s]<strong>palavra sublinada</s>[/s]<br>[quote]cita um comntario de alguém[/quote]<br>[color= o valor da cor]cor da palavra[/color]<br>[youtube=url do video]um titulo por video[/youtube]<br>[img=url da image][/img]<br>"
		
		
		
		
		);
		
		
		
		return preg_replace(array_keys($valor),array_values($valor),$texto);
		
		
	}
		
	//echo bbcode ("<3");

?>