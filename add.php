<?php
     header('Access-Control-Allow-Origin:*');
   
	$CRITY =$_GET['crity'];

    $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '0';
		return ;
	}
	$seekt = Mysqli_query($db,"select*from critys where crityName='".$CRITY."'"); 
	$arrs = [];
	while($srows = Mysqli_fetch_array($seekt)){
		array_push($arrs,$srows);
	}
   json_encode($arrs); 
    
	 if($arrs == []){
		   $result = Mysqli_query($db,"insert into critys(crityName) values('". $CRITY."')");
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