<?php

	$servidor ="localhost";
	$usuario= "root";
	$senha= "";
	$dbase="pessoas";




	$cone= new mysqli($servidor,$usuario,$senha,$dbase);
	
	
	if (mysqli_connect_errno()){
		
		echo "<script> alert('erro na conexão')</script>". mysqli_connect_errno();
		
		
	}

?>