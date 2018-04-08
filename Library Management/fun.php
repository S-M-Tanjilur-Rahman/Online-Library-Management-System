<?php
	
	//session_start();

	function loggedin()
	{
		if(isset($_SESSION['sess_user']) && !empty($_SESSION['sess_user']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


?>