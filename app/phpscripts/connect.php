<?php

$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ukmbahagia_db";
$connection = new mysqli($host, $db_user, $db_pass, $db_name);
if ($connection->connect_error){
	die("error");
}
?>
