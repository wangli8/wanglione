<?php
 header('Access-Control-Allow-Origin:*');
     $Id = $_GET['id'];

    $ab = mysqli_connect('localhost','root','root','dudubas');
	  if(!$ab){
		  echo '链接失败';
		  return ;
	   }
	  $result = mysqli_query($ab,'delete from regulator where id='.$Id);
	  if(!$result){
		  echo '获取失败';
		  return ;
	  }
	
	  echo $result;
	  //ysqli_free_result($result);
	  Mysqli_close($ab);
?>