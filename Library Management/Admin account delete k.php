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
<link rel="stylesheet" href="aadkstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="aadkbackground.jpg"/>
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
    Staff id: <input type="text" name="id" placeholder="Staff_id"><br /><br/>
        <input type="submit" value="delete" name="submit" />
    </form>
</div>
<?php
  $con=mysql_connect("localhost","root","");
  mysql_select_db("project", $con);
  
  if(isset($_POST["submit"])){
  if(!empty($_POST['id'])){
    $id=$_POST['id'];

    
    $query=mysql_query("SELECT * FROM staff_info WHERE staff_id='".$id."'");
    $numrows=mysql_num_rows($query);
    if($numrows!=0)
    {
      //$sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

      $sql = "DELETE FROM staff_info WHERE staff_id='".$id."'";

      $result = mysql_query($sql);


      if($result){
      echo "Account Successfully deleted";
      } else {
      echo "Failure!";
      }

    }
    else {
      echo "This staff don't exist.";
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
