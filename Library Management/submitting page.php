<?php
session_start();
include 'fun.php';
if(!isset($_SESSION["sess_user"])){
	header("location:Staff login.php");
} else {
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="spstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<img id="background" src="spbackground.jpg"/>
<div id="caption1">
please <a href="Staff logout.php">Logout</a>
</div>
<div id="caption2">
<a href="Staff account.php">Back to staff account</a>
</div>
<div id="container">
<table id="table" style="width:100%" cellpadding="1" cellspacing="10">
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
              <th>Submit</th>
              <th>Determine Fine</th>
              <th>Fine</th>
              
            </tr>
<?php
	$id=$_GET['id'];
	$bn=$_GET['bn'];
	//echo $id." ".$bn;
	function e($q,$id,$bn)
	{
		$con = mysql_connect("localhost","root","");
                  mysql_select_db("project", $con);
			
			$quer=mysql_query($q);
			$x=1;

			$y=-1;
          	while($row = mysql_fetch_array($quer)):

     
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
	          if(isset($_POST[$y]))
	          {
	          	date_default_timezone_set('Asia/Dhaka');
	              $cdate=date_create(date('Y-m-d'));
	              $rdate=date_create($row['returndate']);
	              $diff=date_diff($cdate,$rdate);//-
	      $fine=$diff->format('%R%a');
	              
	              if($fine<0)
	              {
	                $fine=$fine*2;
	                $fine=(int)$fine;
	                $fine=abs($fine);
	                $q="update reservation_info set fine='".$fine."' where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
	                mysql_query($q);
	                //echo '<td>'.$fine.'</td>';
	                //echo "do update";
	              }
	              $q="update reservation_info set deliverydate=curdate() where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
	                mysql_query($q);
	              $q="update reservation_info set submit='1' where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
	                mysql_query($q);
	              $q="update book_info set availability='1' where book_name='".$row['book_name']."' and serial_no='".$row['bserial_no']."'";
	               mysql_query($q);
	              $q="SELECT quota from user_info WHERE student_id='".$id."'";
	              $qu=mysql_query($q);
	              $ro=mysql_fetch_assoc($qu);
                  $quota=$ro['quota'];
                  $quota++;
                  $q="update user_info set quota='".$quota."' WHERE student_id='".$id."'";
                  mysql_query($q);
	          }

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
	          	echo "<td>"."paid"."</td>";
	          	echo "<td>".$row['fine']."</td>";
	          }
	          $x++;
	          $y--;
	          echo "</tr>";
	          //echo $id."  ".$bn;
	          endwhile;
	}
	if($id!=null)
	{
		if($id!=null&&$bn!=null)
		{
			$q="select * from reservation_info where student_id='".$id."' and book_name='".$bn."'";
			e($q,$id,$bn);
		}
		else
		{//normal

			$q="select * from reservation_info where student_id='".$id."'";
			e($q,$id,$bn);
			//echo "string";
		}
	}

?>
</table>
</div>
</body>
</html>
<?php
}
?>