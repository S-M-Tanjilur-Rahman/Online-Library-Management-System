<?php
session_start();
include 'fun.php';
if(!isset($_SESSION["sess_user"])){
	header("location:Staff login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Staff account page</title>
<link rel="stylesheet" href="sastyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		


</head>
<body>
<img id="background" src="sabackground.jpg"/>
<div id="caption1">
please <a href="Staff logout.php">Logout</a>
</div>
<h2>Welcome, <?=$_SESSION['sess_user'];?>!</h2><br/><br/>
<div id="container">
<form action="" method="GET">
	<label>Student ID:</label><br />
    <input type="text" name="id" align="middle" placeholder="student_id"><br /><br />
    <label>Book Name:</label><br />  
    <input type="text" name="bn" align="middle" placeholder="Book Name"><br /><br />
        <button name="h">search</button>
</form>
</div>
<?php
//include 'fun.php';
//$id='hi';
//$bn='hi';
	if(isset($_GET['h']))
	{
		if(!empty($_GET['id']))
		{
			if(!empty($_GET['id'])&&!empty($_GET['bn']))
			{
				$id=$_GET['id'];
				$bn=$_GET['bn'];
				header("location: Submitting page.php?id=$id&bn=$bn");
			}
			else
			{
				$id=$_GET['id'];
				$bn=null;
				header("location: Submitting page.php?id=$id&bn=$bn");
			}
		}
		else
		{
			echo "Student_id must be filled up";
		}
		
	}
	

?>
</body>
</html>
<?php
}
?>
