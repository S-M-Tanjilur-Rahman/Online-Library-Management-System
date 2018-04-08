<?php
session_start();
//$i=100;
$_SESSION["sess_user"]=null;
unset($_SESSION['sess_user']);
session_destroy();
header("location:User login.php");

?>
