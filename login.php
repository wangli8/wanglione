<?php
    header('Access-Control-Allow-Origin:*');
	$Users =$_GET['name'];
	$Passwords =$_GET['password'];
	
       $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '数据库链接错误';
		return ;
	}
	$result = Mysqli_query($db,"select*from regulator where user=".$Users." and password=".$Passwords."order by asc");
	if(!$result){
		echo '密码或用户名错误';
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