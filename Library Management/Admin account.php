<?php
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:Admin login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="aastyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="aabackground.jpg"/>
<div id="caption1">
please <a href="Admin logout.php">Logout</a>
</div>
<div id="caption">
<big>Welcome <?=$_SESSION['sess_user'];?>!</big>
</div>
<div id="container">
	<div id="navigation">
    	<ul>
        	<li><a href="#">Edition of Books Table<span></span></a>
            	<ul>
                	<li><a href="Admin account add.php">Add</a></li>
                    <li><a href="Admin account update.php">Update</a></li>
                    <li><a href="Admin account delete.php">Delete</a></li>
                </ul>
            </li>
            <li><a href="Admin account delete c.php">Delete Student Account</a></li>
            <li><a href="Admin account delete k.php">Delete Staff Account</a></li>
            <li><a href="fine.php">Checking fine</a></li>
        </ul>
    </div>
</div>
</body>
</html>
<?php
}
?>
