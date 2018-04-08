<?php
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:User login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="uastyle.css">
	<meta charset="utf-8">
	<meta name="viewport" conten-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxct="width=devicedn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
</head>
<body>
<img id="background" src="uabackground.jpg"/>
<div id="caption1">
please <a href="User logout.php">Logout</a>
</div>
<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2><br/>
<div id="container">
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
              <th>Renew</th>
              <th>Determine Fine</th>
              <th>Fine</th>
              
            </tr>

<?php
//$q=mysql_query('select curdate()');
include 'fun.php';
date_default_timezone_set("Asia/Dhaka");
//echo "The time is " . date("Y-m-d")."<br/>";
$Cdate=date('Y-m-d');
$con = mysql_connect("localhost","root","");
                  mysql_select_db("project", $con);
$qp=mysql_query("SELECT student_id FROM user_info WHERE user_name='".$_SESSION['sess_user']."'");
                  $row=mysql_fetch_assoc($qp);
                  $id=$row['student_id'];
//$q='select '
/*$date = date_create('2000-01-01');
date_add($date, date_interval_create_from_date_string('10 days'));
echo date_format($date, 'Y-m-d');*/
//echo $q;
 $q="select * from reservation_info where student_id='$id'";
 $qery=mysql_query($q);
 $w=0;
 $x=1;
 
 $y=-1;
 //$row=mysql_fetch_assoc($q);
                  while($row = mysql_fetch_array($qery)):

             
              echo '<tr>';
              echo '<td>'.$row['student_id'].'</td>';
              echo "<td>".$row['book_name']."</td>";

              echo "<td>".$row['bserial_no']."</td>";

              echo "<td>".$row['issuedate']."</td>";

              echo '<td>'.$row['returndate'].'</td>';
              echo '<td>'.$row['deliverydate'].'</td>';
              if($row['submit']==0)
              {
                echo "<td>".'<html><form action="" method="POST"><input type="submit" name="'.$y.'" value="RENEW"/></form></html>'."</td>";
                if(isset($_POST[$y]))
                {
                  date_default_timezone_set('Asia/Dhaka');
                  $cdate=date_create(date('Y-m-d'));
                  $rdate=date_create($row['returndate']);
                  $diff=date_diff($cdate,$rdate);//-
          $fine=$diff->format('%R%a');
                  if($fine>=0)
                  {
                    $fine=0;
                    $qb="update reservation_info set fine='".$fine."' where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
                    mysql_query($qb);
                  }
                  else
                  {
                    $fine=$fine*2;
                    $fine=(int)$fine;
                    $fine=abs($fine);
                    $q="update reservation_info set fine='".$fine."' where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
                    mysql_query($q);
                    //echo '<td>'.$fine.'</td>';
                    //echo "do update";
                  }
                  if($fine==0)
                  {
                    $qa="update reservation_info set returndate=date_add(curdate(),interval 14 day) where student_id='".$row['student_id']."' and book_name='".$row['book_name']."' and bserial_no='".$row['bserial_no']."' and issuedate='".$row['issuedate']."' and returndate='".$row['returndate']."' and submit='0'";
                    mysql_query($qa);
                    echo "Renewed succesfully";
                  }
                  else
                  {
                    echo "Your return date is already expired! You can't renew this book . Submit it Quickly and pay the fine";
                  }
                  /**/
                  
                }
              }
              else
              {
                echo "<td>"."submitted"."</td>";
              }
              if($row['submit']==0)
              {
                //calculate fine and send to db
                echo "<td>".'<html><form action="" method="POST"><input type="submit" name="'.$x.'" value="Calculate"/></form></html>'."</td>";
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
                  //echo '<td>'.strtotime(mysql_query($q)).'</td>';
                  //$diff=date_diff($cdate,$rdate);
                  //echo '<td>'.$diff->format("%R%a").'</td>';
                  //echo $diff->format("%R%a days");
                }
              }
              else
              {
                //show fine from db
                //button nai fixed lekha ashbe
                echo '<td>'.'fixed'.'</td>';
                echo '<td>'.$row['fine'].'</td>';
              }
              
              
             /* //echo "<td>"."h"."</td>";
              //echo "<td>"."k"."</td>";
              //echo '<td>'.'<html><form action="" method="POST"><input type="submit" value="Reserve" name="'.$row['book_name'].'" /></form></html>'.'</td>';
              if(isset($x))
              {
                /*$q="select * from reservation_info where student_id='$id' book_name='".;
                $quer=mysql_query($q);
                $ro= mysql_fetch_array($quer);
                //fine calculation and updating database
                //$w.value="hi";
              }*/
              
              
              $w++;
              $x++;
              $y--;
              echo "</tr>";

              //echo "hello";
              endwhile;
              

 //<th><form action="" method="POST"><input ></form></th>
 ?>
 </table>
 </div>
</body>
</html>

<?php
}
?>
