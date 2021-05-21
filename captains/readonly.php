<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$passowrd="";
	$dbname ="studentdb";
	$out="";
	$Name = "";
	$Surname ="";
	$studentno ="";
	$id = 0;
	$edit_state = false;
    $all = "";
	$db = mysqli_connect($servername,$username,$passowrd,$dbname);
?>
