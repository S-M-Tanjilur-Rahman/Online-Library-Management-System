<!doctype html>
<html>
<head>
	<title>Staff Registration Form</title>
    <link rel="stylesheet" href="srstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
</head>
<body>
	<img id="background" src="srbackground.jpg"/>
    <div id="caption"><b>Staff Registration Form</b></div>
    <div id="container">
        <div id="header">
            <ul>
                <li><a href="H.html">Home</a></li>
                <li><a href="browse books.php">Browse Books</a></li>
                <li><a href="#">Rules & Regulations</a></li>
            </ul>
        </div>
   	  <form action="" method="POST"> 
        <input type="text" name="sn" align="middle" placeholder="Staff Name"><br />   
        <input type="text" name="si" align="middle" placeholder="Staff Id:"><br />   
        <input type="text" name="sad" align="middle" placeholder="Address"><br /> 
        <input type="text" name="scon" align="middle" placeholder="Contact"><br />       
        <input type="text" name="smail" align="middle" placeholder="E-mail"><br /> 
        <input type="text" name="user" align="middle" placeholder="Username"><br />
        <input type="password" name="pass" align="middle" placeholder="Password"><br /><br/>
    	<input type="submit" value="Register" name="submit" />
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

	if(!empty($_POST['sn'])&&!empty($_POST['si'])&&!empty($_POST['sad'])&&!empty($_POST['scon'])&&!empty($_POST['smail'])&&!empty($_POST['user'])&&!empty($_POST['pass'])){
		$sn=$_POST['sn'];
		$si=$_POST['si'];
		$sad=$_POST['sad'];
		$scon=$_POST['scon'];
		$smail=$_POST['smail'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$query=mysql_query("SELECT * FROM staff_info WHERE user_name='".$user."'");
		$numrows1=mysql_num_rows($query);
		$query=mysql_query("SELECT * FROM staff_info WHERE email='".$smail."'");
		$numrows2=mysql_num_rows($query);
		if($numrows1==0&&$numrows2==0)
		{
			$sql="INSERT INTO staff_info(staff_name,staff_id,address,contact,email,user_name,password) VALUES('$sn','$si','$sad','$scon','$smail','$user','$pass')";

			$result=mysql_query($sql);
			//echo '$un';

			if($result){
			echo "Account Successfully Created";
			//<div></div>
			} else {
			echo "Failure!";
			}

		}
		else
		{
			if($numrows1!=0&&$numrows2!=0)
			{
				echo "That username or e-mail already exists! Please try again with another.";
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
//<div></div>
	?>

</body>
</html>