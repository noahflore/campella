<?php
	session_start();
	$id= $_SESSION['id'];
	
	
	if (!file_exists('../other/'. $id .'/fotos/contado.txt')){
		
		copy('../other/exemplo/exemplo.txt','../other/'. $id .'/fotos/contado.txt');
		$conta=fopen('../other/'. $id .'/fotos/contado.txt','w+');
		fwrite($conta,0);
		fclose($conta);
	}
	
	$conta=fopen('../other/'. $id .'/fotos/contado.txt','r+');
	$contado=fgets($conta);
	fclose($conta);
	$contado++;
	$conta=fopen('../other/'. $id .'/fotos/contado.txt','w+');
	fwrite($conta,$contado);
	fclose($conta);
	
	//print_r( $_FILES['foto']);
	if((!empty($_POST['album'])) || (!empty($_GET['album'])) and (!empty($_FILES['foto']))){
			$foto=$_FILES['foto'];
			$album=(isset($_POST['album'])) ? $_POST['album']:$_GET['album']; echo 'foi'. album;
			
		if(!is_dir('../other/'. $id .'/fotos/'. $album))
		{mkdir('../other/'. $id .'/fotos/'. $album);}
		move_uploaded_file($foto['tmp_name'],'../other/'. $id .'/fotos/'. $album .'/'. $contado.'.png');
		
		
		if ((!empty($_FILES['capa']))and (!empty($_POST['album']))){
		$capa=$_FILES['capa'];
		move_uploaded_file($capa['tmp_name'],'../other/'. $id .'/fotos/'. $album .'/capa.png');
		
		
	}
		
		
	}elseif ((!empty($_FILES['capa']))and (!empty($_POST['album']))){
		$capa=$_FILES['capa'];
		move_uploaded_file($capa['tmp_name'],'../other/'. $id .'/fotos/'. $album .'/capa.png');
		
		
	}


//	header('location: ../userpage/fotouser.php');


?>