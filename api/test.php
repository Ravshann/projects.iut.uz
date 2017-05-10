<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="test.php" method="post" enctype="multipart/form-data"> 
Upload an image as your avatar: 
<input type="file" name="pic" /> 
<input type="text" name="username"/> 
<input type="submit" /> </form>
<?php 
	$username = $_REQUEST["username"];
	if (is_uploaded_file($_FILES["avatar"]["tmp_name"])) 
	{
		move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../posted projects/$username/avatar.jpg");
		//print "Saved uploaded file as avatar.jpg\n";
	} else 
	{
		//print "Error: required file not uploaded";
	}
?>
</body>
</html>