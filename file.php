 <?php
 $username = $_REQUEST["username"];
	if (is_uploaded_file($_FILES["pic"]["tmp_name"])) 
	{
	    move_uploaded_file($_FILES["pic"]["tmp_name"], "posted projects/$username/pic.jpg");
	   
	}  

 ?>