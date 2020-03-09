<?php

	$dbhost = 'localhost';
	$dbuser = 'cancerportal';
	$dbpwd  = 'informatics';
	$dbname = 'omrs_portal';
	
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpwd);
	$db   = mysql_select_db($dbname, $conn);
?>