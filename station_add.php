<?php
     header('Access-Control-Allow-Origin:*');
   
	$site=$_GET['SITE'];
	$X=$_GET['x'];
	$Y=$_GET['y'];

    $db = mysqli_connect('localhost','root','root','dudubas');
	if(!$db){
		echo '0';
		return ;
	}
	$seekt = Mysqli_query($db,"select*from station where stationName='".$site."'"); 
	$arrs = [];
	while($srows = Mysqli_fetch_array($seekt)){
		array_push($arrs,$srows);
	}
   json_encode($arrs); 
    
	 if($arrs == []){
		   $result = Mysqli_query($db,"insert into station(stationName,stationY,stationX) values('". $site."',".$X.",".$Y.")");
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