<?php session_start(); ?>






<?php
	$id=$_SESSION['id'];
	$play=$_GET['play'];
	$exibir=array_diff(scandir('../other/'. $id .'/videos/'. $play .'/'),['.','..']);
	
	foreach ($exibir as $li){
		
		echo "<iframe width='724' height='407' src='https://www.youtube.com/embed/". $li ."' title='video_user' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
		
		
	}




?>