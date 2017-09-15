<?php
      header('Access-Control-Allow-Origin:*');
    $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '0';
		return ;
	}
	$result = Mysqli_query($db,'select*from regulator order by id asc');
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