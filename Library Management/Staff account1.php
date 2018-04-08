<?php
session_start();
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
<img id="background" src=""/>
<div id="caption1">
please <a href="Staff logout.php">Logout</a>
</div>
<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2><br/>
<div id="container">
<form action="" method="POST">
    Student ID:<input type="text" name="id" align="middle" placeholder="student_id">  Book Name:<input type="text" name="bn" align="middle" placeholder="Book Name">
        <input type="submit" value="search" name="search" />
</form>
<table id="table" style="width:100%" cellpadding="1" cellspacing="1">
            <tr>
              <th align-text="center">Student id</th>
              <th>Book Name</th>
              <th>Serial NO</th>
              <th>Issue Date</th>
              
              <th>Return Date</th>
              
              <th>Delivery Date</th>
              <th>Submit</th>
              <th>Determine Fine</th>
              <th>Fine</th>
              
            </tr>
<?php
		$con = mysql_connect("localhost","root","");
        mysql_select_db("project", $con);
		$id='  bush';
		$bn='  bush';
		if(isset($_POST['search']))
		{
			if(!empty($_POST['id']))
			{
				if(!empty($_POST['id'])&&!empty($_POST['bn']))
				{///critical
					$id=$_POST['id'];
					$bn=$_POST['bn'];
					//echo $id."  ".$bn;
					$q="select * from reservation_info where student_id='".$id."' and book_name='".$bn."'";
					$query=mysql_query($q);
					$x=1;
 
					 $y=-1;
	                  while($row = mysql_fetch_array($query)):

	             
		              echo '<tr>';
		              echo '<td>'.$row['student_id'].'</td>';
		              echo "<td>".$row['book_name']."</td>";

		              echo "<td>".$row['bserial_no']."</td>";

		              echo "<td>".$row['issuedate']."</td>";

		              echo '<td>'.$row['returndate'].'</td>';
		              echo '<td>'.$row['deliverydate'].'</td>';
		              if($row['submit']==0)
		              {
		              	echo "<td>".'<html><form action="" method="POST"><input type="submit" name="'.$y.'" value="SUBMIT"/></form></html>'."</td>";

		              }
		              else
		              {
		              	echo "<td>"."Submitted"."</td>";
		              }

		              if($row['submit']==0)
		              {
		              	echo "<td>".'<html><form action=" " method="POST"><input type="submit" name="'.$x.'" value="CALCULATE"/></form></html>'."</td>";
		              	if(isset($_POST[$x]))
		                {
		                  //echo '<td>'.'fixed'.'</td>';
		                  date_default_timezone_set('Asia/Dhaka');
		                  $cdate=date_create(date('Y-m-d'));
		                  $rdate=date_create($row['returndate']);
		                  $diff=date_diff($cdate,$rdate);//-
		          $fine=$diff->format('%R%a');
		                  if($fine>=0)
		                  {
		                    //echo 'no update';
		                    //$fine=$fine*2;
		                    //echo $fine;
		                    $q="select fine from reservation_info where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
		                    $query=mysql_query($q);
		                    $ro=mysql_fetch_array($query);
		                    echo '<td>'.$ro['fine'].'</td>';
		                  }
		                  else
		                  {
		                    $fine=$fine*2;
		                    $fine=(int)$fine;
		                    $fine=abs($fine);
		                    $q="update reservation_info set fine='".$fine."' where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
		                    mysql_query($q);
		                    echo '<td>'.$fine.'</td>';
		                    //echo "do update";
		                  }
		                  
                  
                		}
		              }
		              else
		              {
		              	echo "<td>"."Fixed"."</td>";
		              	echo "<td>".$row['fine']."</td>";
		              }
		              $x++;
		              $y--;
		              echo "</tr>";
		              echo $id."  ".$bn;
		              endwhile;
				}
				else
				{// normal
					$id=$_POST['id'];
					//echo $id;
					$q="select * from reservation_info where student_id='".$id."'";
					$query=mysql_query($q);
					$x=1;
 
					 $y=-1;
	                  while($row = mysql_fetch_array($query)):

	             
		              echo '<tr>';
		              echo '<td>'.$row['student_id'].'</td>';
		              echo "<td>".$row['book_name']."</td>";

		              echo "<td>".$row['bserial_no']."</td>";

		              echo "<td>".$row['issuedate']."</td>";

		              echo '<td>'.$row['returndate'].'</td>';
		              echo '<td>'.$row['deliverydate'].'</td>';
		              if($row['submit']==0)
		              {
		              	echo "<td>".'<html><form action="" method="POST"><input type="submit" name="'.$y.'" value="SUBMIT"/></form></html>'."</td>";

		              }
		              else
		              {
		              	echo "<td>"."Submitted"."</td>";
		              }

		              if($row['submit']==0)
		              {
		              	echo "<td>".'<html><form action="" method="POST"><input type="submit" name="'.$x.'" value="CALCULATE"/></form></html>'."</td>";

		              }
		              else
		              {
		              	echo "<td>"."Fixed"."</td>";
		              	echo "<td>".$row['fine']."</td>";
		              }
		              $x++;
		              $y--;
		              echo "</tr>";
		              endwhile;
				}
			}
			else
			{
				echo "student_id field must be filled up";
			}
		}



?>
</table>

</body>
</html>
<?php
}
?>
