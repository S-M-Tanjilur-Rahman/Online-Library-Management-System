<!doctype html>
<html>
	<head>
		<title>Browse Books</title>
			<link rel="stylesheet" href="bbstyle.css">
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<img id="background" src="hpp.jpg" width="1300" height="710"/>
		<div id="header">
             <ul>
                   	<li><a href="H.html">Home</a></li>
					<li><a href="#">Time</a></li>
					<li><a href="#">Upcoming Books</a></li>
					<li><a href="#">Rules & Regulations</li>
					<li><a href="#">Log in <span><img src="Down-Arrow.jpg" width="16" height="16"/></span>
						<ul>
							<li><a href="Staff login.php">Staff</a></li>
							<li><a href="User login.php">User</a></li>
							<li><a href="Admin login.php">Admin</a></li>
						</ul>
					</li>
					<li><a href="#">New Comer <span><img src="new_user.jpg" width="16" height="16"></span>
							<ul>
								<li><a href="Staff register.php">Staff?</a></li>
								<li><a href="User register.php">User?</a></li>
							</ul>
					</li>
                    <li><a href="#">About <span><img src="Down-Arrow.jpg" width="13" height="13"/></span></a>
                            <ul>
                                  <li><a href="#">Contact</a></li>
                                  <li><a href="#">Adress</a></li>
                            </ul>
                    </li>
               </ul>
        </div>
        <div id="container">
        	<!--<form action="" method="POST" class="form">
    			<input type="submit" value="Engineering" name="en" width="300" height="500"/>
    			<input type="submit" value="Medical" name="me" width="30" height="50"/>
    			<input type="submit" value="Literature" name="li" width="30" height="50"/>
    			<input type="submit" value="Business" name="bu" width="30" height="50"/>
    			<input type="submit" value="Philosophy" name="ph" width="30" height="50"/>
    			<!--<input type="text" name="ed"><br />	
    			<input type="submit" value="Update" name="submit" />
    		</form>-->	
    		<a href="browse books.php?cat=Engineering"><button type="button" width="300" height="500">Engineering</button></a>
    		<a href="browse books.php?cat=Medical"><button type="button" width="300" height="500">Medical</button></a>
    		<a href="browse books.php?cat=Literature"><button type="button" width="300" height="500">Literature</button></a>
    		<a href="browse books.php?cat=Philosophy"><button type="button" width="300" height="500">Philosophy</button></a>
    		<a href="browse books.php?cat=Business"><button type="button" width="300" height="500">Bussiness</button></a>

       </div>
       <div id="container1">
<table id="table" width="600" cellpadding="1" cellspacing="1">
       			<tr>
       				<th><center>Book Name</center></th>
       				<th><center>Author Name</center></th>
       				<th><center>Edition</center></th>
       				<th><center>Available copies</center></th>
       				<!--<form action="" method="POST" class="form" id="rb">
       					<input type="submit" value="Reserve" name="rb" width="300" height="500"/><br/>
       				</form>-->
       				<th><center>Reservation</center></th>	
       			</tr>
       			<?php
       				include 'fun.php';
       			?>
       			<?php
       			//echo '"gy"'.'<html><big>hello</big></html>'.'"hello"'." 'yg'";
       			//echo '<script>parent.window.location.reload(true);</script>';
					$con = mysql_connect("localhost","root","");
					mysql_select_db("project", $con);

					
					//GLOBAL $ds;
					$ds='df';
					$a;

					//$a = "SELECT * FROM stock_table WHERE category='Engineering'";

					//$query = mysql_query($a);
					//echo "<pre>";
					//while($row = mysql_fetch_array($query)):
						//echo "<tr>";

						//echo "<td>".$row['book_name']."</td>";

						//echo "<td>".$row['author']."</td>";

						//echo "<td>".$row['author']."</td>";

						//echo "<td>".$row['stock']."</td>";

						//echo "</tr>";


					//endwhile;
				//echo "</pre>"
					if(isset($_GET['cat']))
					{
						$ds=$_GET['cat'];
						//echo $ds;
						$a = "SELECT * FROM stock_table WHERE category='".$ds."'";
						//echo $a;
						$query = mysql_query($a);
						//echo "<pre>";
						while($row = mysql_fetch_array($query)):

							$aa="SELECT sum(availability) FROM book_info WHERE book_name='".$row['book_name']."' and category='".$ds."'";
							$q = mysql_query($aa);
							$x = mysql_fetch_array($q);
							//$available = $row['stock']-$x[0];
							//$
							//print_r("sum=".$available."<br>"); 
							echo '<tr>';

							echo "<td>".$row['book_name']."</td>";

							echo "<td>".$row['author']."</td>";

							echo "<td>".$row['edition']."</td>";
							//if ($x[0]==$row['stock']) 
							//{							
								//echo "<td>".$row['stock']."</td>";
							//}
							//else
							//{
								echo "<td>".$x[0]."</td>";
							//}
							
							//if(session_start()==1
							//echo <td>.<<<HTML
							//<a href="rb.php">Click here</a>
//HTML.</td>;
							echo '<td>'.'<html><form action="" method="POST"><input type="submit" value="Reserve" name="'.$row['book_name'].'" /></form></html>'.'</td>';
							echo "</tr>";

							//echo "hello";
							endwhile;

					}

					

					//echo $ds."end \n";

					/*if(loggedin())
					{
						print '  true  ';
					}
					else
					{
						print '   false  ';
					}*/


					
					$a="SELECT * FROM stock_table WHERE category='".$ds."'";
					//echo "\n<html><br/></html> NEW1".$a;
					//echo $a;
						$quer = mysql_query($a);
						//echo "<pre>";
						while($row=mysql_fetch_array($quer)):
							//echo "\n".$row['book_name']."\t";
					if(isset($_POST[$row['book_name']])){

							//echo "\n in button ".$a;
							session_start();

							//echo "hello";
							if(loggedin())
							{
								

								$con = mysql_connect("localhost","root","");
	    						mysql_select_db("project", $con);
	    						$q=mysql_query("SELECT student_id FROM user_info WHERE user_name='".$_SESSION['sess_user']."'");
	    						$ro=mysql_fetch_assoc($q);
	    						$id=$ro['student_id'];
	    						
	    						
	    						$q="SELECT quota FROM user_info WHERE student_id='".$id."'";
	    						$query=mysql_query($q);
	    						$ro=mysql_fetch_assoc($query);
	    						$quota=$ro['quota'];
	    						//echo $id.'     '.$row['book_name'].'    '.$quota.'  '."<br />";

	    						if($quota>0)
	    						{
	    							//echo "hello";
	    							$q="SELECT book_name from reservation_info where student_id='$id' and book_name='".$row['book_name']."'and submit='0'";
	    							$query=mysql_query($q);
	    							$numrows=mysql_num_rows($query);
	    							if($numrows==0)
	    							{
		    							$q="SELECT serial_no FROM book_info WHERE book_name='".$row['book_name']."' and availability='1'";
		    							$que=mysql_query($q);
		    							$ro=mysql_fetch_assoc($que);
		    							$serial_no=$ro['serial_no'];
		    							//$q="SELECT CURDATE()";
		    							
		    							/*$phpdate=null;

		    							$mysqldate = date( '2016-07-14', $phpdate );
										$phpdate = strtotime( $mysqldate );

										echo $phpdate;
		    							//echo "<br>".$serial_no;*/
		    							//$date=date("d-m-Y");
		    							//echo $date;
										$q="SELECT book_name from book_info where book_name='".$row['book_name']."' and availability='1'";
	    							$qury=mysql_query($q);
	    							$numr=mysql_num_rows($qury);

	    								if($numr==0)
	    								{
	    									echo 'Sorry this book is not available';
	    								}
	    								else
	    								{
	    									$q="insert into reservation_info(student_id,book_name,bserial_no,issuedate,returndate,fine,submit) values('$id','".$row['book_name']."','$serial_no',curdate(),date_add(curdate(),interval 14 day),'0','0')";
			    							$qu=mysql_query($q);

			    							$q="update book_info set availability='0' where serial_no='$serial_no'";
											$qu=mysql_query($q);
											$quota--;
											//echo $quota;
											$q="update user_info set quota='$quota' where user_name='$id'";
											$qu=mysql_query($q);
											//header("location:browse books.php");
											 //echo "<html>javascript:history.go(0)</html>";
											//header("Refresh: 7; url=browse books.php");
											echo '<html><div id="container3"><big>You have successfully reserved book '.$row['book_name'].'</big></div></html>';
	    								}
		    							
	    							}
	    							else
	    							{
	    								echo "You already have this book.You can't issue this book";
	    							}





	    						}
	    						else
	    						{
	    							echo "Sorry your quota is finshed";
	    						}
								//header("location:rb.php");
								
							}
							else
							{
								//echo "yes";
								header("location:User login.php");
								//echo '<html><a href="User login.php"></a></html>';
							}
							
						}
					endwhile;
				?>
       		</table>

       </div>
	</body>
</html>