<!doctype html>
<html>
<head>
	<title>User Login Page</title>
    <link rel="stylesheet" href="ulstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
</head>
<body>
	<img id="background" src="ulbackground.jpg"/>
    <div id="caption"><b>User Login page</b></div>
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
    <input type="text" name="user" align="middle" placeholder="Username"><br /><br/>
    <input type="password" name="pass" align="middle" placeholder="Password"><br /><br/>	
         <input type="submit" value="Login" name="submit" />
    </form>
    <div id="button">
        	<a href="User register.php"><u>Not registered yet?</u></a>
        </div>
    </div>
    <?php
        include 'fun.php';
    ?>
	<?php
    $con = mysql_connect("localhost","root","");
    mysql_select_db("project", $con);
    if($con)
    {//echo "Connected";
    }
    $rb=15;

    if(isset($_POST["submit"])){

        if(!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $query=mysql_query("SELECT * FROM user_info WHERE user_name='".$user."' AND password='".$pass."'");
            $numrows=mysql_num_rows($query);
            if($numrows!=0)
            {
            while($row=mysql_fetch_assoc($query))
            {
            $dbusername=$row['user_name'];
            $dbpassword=$row['password'];
            }
        
            if($user == $dbusername && $pass == $dbpassword)
            {
            	$rb=1;
            session_start();
            $_SESSION['sess_user']=$user;
        
            /* Redirect browser */
            header("Location: User account.php");
            }
            } else {
            echo "Invalid username or password!";
            }
        
        } else {
            echo "All fields are required!";
        }
        }
    ?>    
</body>
</html>