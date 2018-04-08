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
<link rel="stylesheet" href="aaastyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="aaabackground.jpg"/>
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
	<label>Book name: </label><br/>
    <input type="text" name="bn" placeholder="Book Name"><br /><br />
    <label>Author: </label><br/>
    <input type="text" name="au" placeholder="Author"><br /><br />
    <label>Stock: </label><br/>
    <input type="int" name="st" placeholder="Stock"><br /><br />
    <label>Category: </label><br/>
    <input type="text" name="ca" placeholder="Category"><br /><br />
    <label>Edition: </label><br/>
    <input type="text" name="ed" placeholder="Edition"><br /><br/><br />	
    <input type="submit" value="Add" name="submit" />
    </form>
</div>
<?php
$con = mysql_connect("localhost","root","");
	mysql_select_db("project", $con);
	if($con)
	{//echo "Connected";
	}
	if(isset($_POST["submit"])){

	if(!empty($_POST['bn']) && !empty($_POST['au']) && !empty($_POST['st']) && !empty($_POST['ca']) && !empty($_POST['ed'])){
		$bn=$_POST['bn'];
		$au=$_POST['au'];
		$st=$_POST['st'];
		$ca=$_POST['ca'];
		$ed=$_POST['ed'];
		$i=1;
		$query=mysql_query("SELECT * FROM book_info WHERE book_name='".$bn."'");
		$numrows=mysql_num_rows($query);
		//echo $numrows;
		if($numrows==0)
		{
			$sql="INSERT INTO book_info(book_name,author,availability,category,edition) VALUES('$bn','$au','$i','$ca','$ed')";
			//$result=mysql_query($sql);
			//echo 'result=';
			//echo $result;
			for($i=1;$i<=$st;$i++)
			{
				$result=mysql_query($sql);
			}
			$sql="INSERT INTO stock_table (book_name, author, category, edition, stock) VALUES ('$bn', '$au', '$ca', '$ed', '$st')";
			$result=mysql_query($sql);
			if($result){
			echo "Successfully Added";
			} else {
			echo "Failure!";
			}

		}
		else {
			////terific region
			//echo "That username already exists! Please try again with another.";
			//echo "else else else else else ";
			$a="SELECT stock FROM stock_table WHERE book_name='".$bn."'";
			$query=mysql_query($a);//query= os
			// echo $a;
			// echo $a;
			$y=mysql_fetch_array($query);

			

			$x=$y["stock"];//o.s
			$t1=$x+$st;//f.s
			echo $x."<br>";
			$sql="UPDATE stock_table SET stock='$t1' where book_name='".$bn."'";
			$result=mysql_query($sql);
			$sql="INSERT INTO book_info(book_name,author,availability,category,edition) VALUES('$bn','$au','$i','$ca','$ed')";
			for($i=1;$i<=$st;$i++)
			{
				$result=mysql_query($sql);
			}
			//$sql="INSERT INTO stock_table(book_name,author,category,stock) VALUES('$bn','$au','$ca','$st')";
			//$result=mysql_query($sql);
			if($result){
			echo "Successfully Added";
			} else {
			echo "Failure!";
			}
			//t1= current stock
			//$st=$st+$x;//st=final stock
			// $query=mysql_query("SELECT count(*) FROM book_table WHERE book_name='".$bn."' and availability='1'");//query= ca
			// $final=$query+$t1;//final= final available copies
			// $sql="INSERT INTO book_table(book_name,author,stock,availability,available_copies,category,edition) 					VALUES('$bn','$au','$st','$i','$final','$ca','$ed')";
			// for($i=1;$i<=$t1;$i++)
			// {
			// 	$result=mysql_query($sql);
			// }
			// if($result){
			// echo "Successfully Added";
			// } else {
			// echo "Failure!";
			// }

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
