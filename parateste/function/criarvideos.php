<?php
	session_start();
	$id=$_SESSION['id'];

	if ((!empty($_POST['play'])) and (!empty($_POST['link']))){
	$youtube=$_POST['link'];
	$play=$_POST['play'];
	
	if(!is_dir('../other/'. $id .'/videos/'. $play))
	{mkdir('../other/'. $id .'/videos/'. $play,0777,true);}
	copy('../other/exemplo/exemplo.txt','../other/'. $id .'/videos/'. $play .'/'. $youtube);


	}


?>