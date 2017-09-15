<?php
     header('Access-Control-Allow-Origin:*');
    $USER = $_GET['NAME'];
	$PASSWORD =$_GET['PASSWORDS'];

    $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '0';
		return ;
	}
	$seekt = Mysqli_query($db,"select*from regulator where user=".$USER." and password=".$PASSWORD); 
	$arrs = [];
	while($srows = Mysqli_fetch_array($seekt)){
		array_push($arrs,$srows);
	}
   json_encode($arrs); 
    
	 if($arrs == []){
		   $result = Mysqli_query($db,"insert into regulator(user,password) values(". $USER.",".$PASSWORD.")");
	       if(!$result){
		    echo '0_1';
		    return ;
	      }
	       echo '添加成功';
	  }else{
		  echo "账号已存在";
	  }
	
	//Mysqli_free_result($result);
	Mysqli_close($db);
?>