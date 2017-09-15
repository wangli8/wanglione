<?php
       header('Access-Control-Allow-Origin:*');
      $cname=$_GET['CNAME'];
	   $id=$_GET['ID'];
     $db = Mysqli_connect('localhost','root','root','dudubas');
	 if(!$db){
		 echo "0_1";
		 return ;
	 }
	 $result = Mysqli_query($db,"update critys set crityName='".$cname."'where id=".$id);
	  if(!$result){                   
		 echo 0;
		 return ;
	 }
	 echo $result;
	 Mysqli_close($db);
?>