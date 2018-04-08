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
<link rel="stylesheet" href="fstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		

</head>
<body>
<img id="background" src="fbackground.png"/>
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
<form action="" method="POST">
  <label>Desired Date:  </label><input type="text" name="d" placeholder="Year-Month-Date">
  
        <input type="submit" value="show" name="submit" />
</form>
</div>
<div id="x">
<table id="table" style="width:100%" cellpadding="1" cellspacing="1">
            <tr>
              
              <th align-text="center">Student id</th>
              <th>Book Name</th>
              <th>Serial NO</th>
              <th>Issue Date</th>
              <!--<form action="" method="POST" class="form" id="rb">
                <input type="submit" value="Reserve" name="rb" width="300" height="500"/><br/>
              </form>-->
              
              <th>Return Date</th>
              
              <th>Delivery Date</th>
              <th>Fine</th>
              
              <th>Total fine collected from this date</th>
            </tr>
<?php
  if(isset($_POST['submit']))
  {
    $date=$_POST['d'];
    $con = mysql_connect("localhost","root","");
          mysql_select_db("project", $con);

    //echo $date;
    $q="SELECT sum(fine) from reservation_info where deliverydate='".$date."'";
    $s=mysql_query($q);
    $x = mysql_fetch_array($s);
    echo '<tr>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      echo '<td>'." ".'</td>';
      if($x[0]!=null)
        echo '<td>'.$x[0].'</td>';
      else
        echo '<td>'."0".'</td>';

    echo '</tr>';
    $q="SELECT * FROM reservation_info where deliverydate='".$date."'";
    $s=mysql_query($q);
    while($row = mysql_fetch_array($s)):
      echo '<tr>';
            echo '<td>'.$row['student_id'].'</td>';
            echo "<td>".$row['book_name']."</td>";

          echo "<td>".$row['bserial_no']."</td>";

            echo "<td>".$row['issuedate']."</td>";

            echo '<td>'.$row['returndate'].'</td>';
            echo '<td>'.$row['deliverydate'].'</td>';
            echo '<td>'.$row['fine'].'</td>';
            //echo '<td>'.$row[''].'</td>';
            /*if($row['submit']==1)
              echo '<td>'."Submitted".'</td>';*/
        echo '</tr>';


      endwhile;
  }
?>
</table>
</div>
</body>
<?php
}
?>