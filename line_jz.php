<?php
    
      header('Access-Control-Allow-Origin:*');
	  $ID=$_GET['id'];
    $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '0';
		return ;
	}
	$result = Mysqli_query($db,'select*  from  site_path inner join station on site_path.stieID = station.id where site_path.lineID='.$ID);
	if(!$result){
		echo '0_1';
		return ;
	}
	$arrs = [];
	while($srows = Mysqli_fetch_array($result)){
		array_push($arrs,$srows);
	}
	echo json_encode($arrs);
	Mysqli_free_result($result);
	Mysqli_close($db);
?>