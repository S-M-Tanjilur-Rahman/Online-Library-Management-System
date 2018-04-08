<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("project", $con);


	$a = "SELECT * FROM book_info";

	$query = mysql_query($a);
	echo "<pre>";
	while($row = mysql_fetch_array($query))://{

		print_r($row['serial_no']);
		echo "<br>";
	//}
	endwhile;
	echo "</pre>"

?>