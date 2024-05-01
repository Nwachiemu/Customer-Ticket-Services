<?php
$url = basename($_SERVER['PHP_SELF']); 
if ($url == "dbconfig.php")
{
	  //die ("Direct access not premitted");
	  echo "Direct access not premitted";
	 header("Refresh:1; url=../index.php");
}

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", '');
define("DB_NAME", "ticket");



?>



