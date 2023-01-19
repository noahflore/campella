<?php


	function anuncio($anu){
		
		
		$pro= array(
			
			"@\[p1\]@i"=>"<a target='_blank' href='https://go.hotmart.com/X77963602E'><img src='propaganda/p1.png' alt='propa_p1' /></a>",
			"@\[p2\]@i"=>"<a target='_blank' href='https://go.hotmart.com/G77963837N'><img src='propaganda/p2.png' alt='propa_p2' /></a>",
			"@\[p3\]@i"=>"<a target='_blank' href='https://go.hotmart.com/O77964119Y'><img src='propaganda/p3.png' alt='propa_p3' /></a>",
			"@\[p4\]@i"=>"<a target='_blank' href='3404294@vakinha.com.br'><img src='propaganda/p4.png' alt='propa_p4' /></a>",
			"@\[p5\]@i"=>"<a target='_blank' href='teste'><img src='propaganda/p5.png' alt='propa_p5' /></a>",
			"@\[p6\]@i"=>"<a target='_blank' href='teste'><img src='propaganda/p6.png' alt='propa_p6' /></a>",
			"@\[p7\]@i"=>"<a target='_blank' href='teste'><img src='propaganda/p7.png' alt='propa_p7' /></a>",
			"@\[p8\]@i"=>"<a target='_blank' href='teste'><img src='propaganda/p8.png' alt='propa_p8' /></a>",
			"@\[p9\]@i"=>"<a target='_blank' href='teste'><img src='propaganda/p9.png' alt='propa_p9' /></a>",
			"@\[pp1\]@i"=>"<a target='_blank' href='https://go.hotmart.com/X77963602E'><img src='../propaganda/p1.png' alt='propa_p1' /></a>",
			"@\[pp2\]@i"=>"<a target='_blank' href='https://go.hotmart.com/G77963837N'><img src='../propaganda/p2.png' alt='propa_p2' /></a>",
			"@\[pp3\]@i"=>"<a target='_blank' href='https://go.hotmart.com/O77964119Y'><img src='../propaganda/p3.png' alt='propa_p3' /></a>"
			
			
			
			
			
			);
		
		return preg_replace(array_keys($pro),array_values($pro),$anu);
		
		
		
		
		
		
	}










?>