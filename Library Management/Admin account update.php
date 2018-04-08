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
<link rel="stylesheet" href="aaustyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="aaubackground.jpg"/>
<div id="caption1">
please <a href="Admin logout.php">Logout</a>
</div>
<div id="header">
	<ul>
            <li><a href="Admin account.php">Admin Account</a></li>
            <li><a href="#">Edition of Books<span><!--<img src="down3.png" width="13" height="13"/>--></span></a>
              <ul>
                        
                        <li><a href="Admin account add.php">Add<!--<span><img src="right.png" width="13" height="13"/><span>--></a></li>
                        <li><a href="Admin account update.php">Update</a></li>
                        <li><a href="Admin account delete.php">Delete</a></li>
              </ul>
            </li>
            <li><a href="Admin account delete c.php">Delete Student Account</a></li>
            <li><a href="Admin account delete k.php">Delete Staff Account</a></li>
            <li><a href="fine.php">Checking fine</a></li>
	</ul>
</div>
<div id="container">
	<form action="" method="POST" class="form">
	<label>serial no of the target book:</label><br/>
    <input type="text" name="sn"><br/><br/>
    <label>Updated Book name: </label><br/>
    <input type="text" name="bn"><br /><br/>
    <label>Updated Author: </label><br/>
    <input type="text" name="au"><br /><br/>
    <label>Updated Stock: </label><br/>
    <input type="int" name="st"><br /><br/>
    <label>Updated Category: </label><br/>
    <input type="text" name="ca"><br /><br/>
    <label>Updated Edition: </label><br/>
    <input type="text" name="ed"><br />	<br/><br/>
    <input type="submit" value="Update" name="submit" />
    </form>
</div>
<?php
	$con=mysql_connect('localhost','root','');
	mysql_select_db("project",$con);

	if(isset($_POST["submit"])){

	if(!empty($_POST['sn']) && !empty($_POST['bn'])&& !empty($_POST['au'])&& !empty($_POST['st'])&& !empty($_POST['ca'])&& !empty($_POST['ed'])){
		$sn=$_POST['sn'];
		$bn=$_POST['bn'];
		$au=$_POST['au'];
		$st=$_POST['st'];
		$ca=$_POST['ca'];
		$ed=$_POST['ed'];
		$i=1;
		$query=mysql_query("SELECT * FROM book_table WHERE serial_no='".$sn."'");
		$numrows=mysql_num_rows($query);
		if($numrows!=0)
		{
			$sql="UPDATE book_table 
			SET book_name='$bn',author='$au',stock='$st',availability='1',available_copies='$st',category='$ca',edition='$ed' where serial_no='".$sn."'";

			$result=mysql_query($sql);


			if($result){
			echo " Successfully Updated";
			} else {
			echo "Failure!";
			}

		}
		else {
			echo "Invalid serial no";
		}
	}
	else {
		echo "All fields are required!";
	}
}
?>
</body>
</html>
<?php
}
?>
