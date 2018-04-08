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
<link rel="stylesheet" href="aadstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="aadbackground.jpg"/>
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
    <label>serial no of the book</label><br/>
    <input type="int" name="id" placeholder="Book id"><br /><br/>
    <label>serial no of the stock</label><br/> 
    <input type="int" name="sid" placeholder="Stock id"><br/><br/>
    <input type="submit" value="delete" name="submit" />
    </form>
</div>
<?php
  $con = mysql_connect("localhost","root","");
  mysql_select_db("project", $con);
  if(isset($_POST["submit"])){

  if(!empty($_POST['id']) && !empty($_POST['sid'])){

    $id=$_POST['id'];
    $sid=$_POST['sid'];
    $query=mysql_query("SELECT * FROM book_info WHERE serial_no='".$id."'");
    $numrows=mysql_num_rows($query);
    //echo $numrows;
    if($numrows!=0)
    {
      $sql="DELETE FROM book_info WHERE serial_no='".$id."'";
      $result=mysql_query($sql);
      //echo 'result=';
      //echo $result;
      //for($i=1;$i<=$st;$i++)
      //{
        //$result=mysql_query($sql);
      //}
      $sql="SELECT * FROM stock_table WHERE serial_no='".$sid."'";
      $result=mysql_query($sql);
      $y=mysql_fetch_array($result);
      $x=$y['stock']-1;
      print_r("stock=".$x."<br>");
      $sql="UPDATE stock_table SET stock='".$x."' where serial_no='".$sid."'";
      $result=mysql_query($sql);
      if($result){
      echo "Successfully Deleted";
      } else {
      echo "Failure!";
      }

    }
    else {
      echo "These book id do not exist";
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
