<?php
	require_once "mundo.php";

	if (!empty($_POST['com']) and ($_GET['on']==0)){
	
		$com=$_POST['com'];
		$exibir=jogo($com);
		$sel= (!empty($_GET['sel']))? $_GET['sel']:0;
		
			if ($exibir=="erro no start"){
				
			echo "<script>location=  'rpgdetexto.php?on=1'</script>";
		
				
			}else{
				
				echo "<script>location='rpgdetexto.php?exibi=$exibir&start=1&on=1&sel=$sel'</script>";
				
				
			}
	}else{
		
		$com=0;
		$exibir=jogo($com);	
		
		
	}


?>

<!doctype html>


<html>
	
	<head>
		
		
	</head>


	<body>
		
		<div style="margin-left:400px;margin-top:20px;border:solid;width:500px;height:600px;">
			
			<?php echo $exibir; ?>
			
			
		</div>
		
		<form method="post" action="rpgdetexto.php?on=0">
			
			<input type="text" style="margin-left:400px" name="com" />
			<input type="submit" value="enviar" />
			
			
		</form>
		
		
	</body>
	
	
	
	
</html>