<!doctype html>
<html>
<head>
	<title>User Registration Form</title>
    <link rel="stylesheet" href="urstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
</head>
<body>
	<img id="background" src="urbackground.jpg"/>
    <div id="caption"><b>User Registration Form</b></div>
    <div id="container">
    	<div id="header">
        	<ul>
            	<li><a href="H.html">Home</a></li>
                <li><a href="browse books.php">Browse Books</a></li>
                <li><a href="#">Rules & Regulations</a></li>
            </ul>
        </div>
        <br/>
        <br/>
    	<form action="" method="POST">
        <input type="text" name="un" align="middle" placeholder="Student Name"><br />
        <input type="text" name="ui" align="middle" placeholder="Student Id"><br />
        <input type="text" name="ud" align="middle" placeholder="Department"><br />
        <input type="text" name="usem" align="middle" placeholder="Semester"><br />
        <input type="text" name="usec" align="middle" placeholder="Section"><br />
        <input type="text" name="uad" align="middle" placeholder="Address"><br />
        <input type="text" name="ucon" align="middle" placeholder="Contact"><br />
        <input type="text" name="umail" align="middle" placeholder="E-mail"><br />
        <input type="text" name="user" align="middle" placeholder="Username"><br />
        <input type="password" name="pass" align="middle" placeholder="Password"><br /><br/>	
	`			<input type="submit" value="Register" name="submit" />
        </form>
    </div>
    <?php
	
	//$host = "localhost";
	//$user = "root";
	//$pass = "";
	//$database = "lms";
	
	$con = mysql_connect("localhost","root","");
	mysql_select_db("project", $con);
	if($con)
	{//echo "Connected";
	}
	if(isset($_POST["submit"])){

	if(!empty($_POST['un'])&&!empty($_POST['ui'])&&!empty($_POST['ud'])&&!empty($_POST['usem'])&&!empty($_POST['usec'])&&!empty($_POST['uad'])&&!empty($_POST['ucon'])&&!empty($_POST['umail'])&&!empty($_POST['user']) && !empty($_POST['pass'])){
		$un=$_POST['un'];
		$ui=$_POST['ui'];
		$ud=$_POST['ud'];
		$usem=$_POST['usem'];
		$usec=$_POST['usec'];
		$uad=$_POST['uad'];
		$ucon=$_POST['ucon'];
		$umail=$_POST['umail'];		
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$query=mysql_query("SELECT * FROM user_info WHERE user_name='".$user."'");
		$numrows1=mysql_num_rows($query);
		$query=mysql_query("SELECT * FROM user_info WHERE email='".$umail."'");
		$numrows2=mysql_num_rows($query);
		if($numrows1==0&&$numrows2==0)
		{
			$sql="INSERT INTO user_info(student_name,student_id,department,semester,section,email,user_name,password,contact,address,quota) VALUES('$un','$ui','$ud','$usem','$usec','$uad','$ucon','$umail','$user','$pass','2')";

			$result=mysql_query($sql);
			//echo '$un';

			if($result){
			echo "Account Successfully Created";
			} else {
			echo "Failure!";
			}

		}
		else
		{
			if($numrows1!=0&&$numrows2!=0)
			{
				echo "That username and e-mail already exists! Please try again with another.";
			}
			else
			{
				if($numrows1!=0)
				{
					echo "That username already exists! Please try again with another.";
				}
				else
				{
					echo "That e-mail already exists! Please try again with another.";
				}
			}
		}
	
	}
	else {
		echo "All fields are required!";
	}
}
	?>
</body>
</html>