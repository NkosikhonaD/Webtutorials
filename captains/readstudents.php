<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$passowrd="";
	$dbname ="studentdb";

	$Name = "";
	$Surname ="";
	$studentno ="";
	$id = 0;
	$edit_state = false;


	$db = mysqli_connect($servername,$username,$passowrd,$dbname);
	if(isset($_POST['save']))
	{
		$Name = $_POST['Name'];
		$Surname = $_POST['Surname'];
		$studentno = $_POST['studentno'];
		$sql = "INSERT INTO personalinfo (Name, Surname, studentno) VALUES('$Name','$Surname','$studentno')";
		mysqli_query($db,$sql);
		$_SESSION['msg']="Data saved";
		header('location: services.php'); //redirec to services page after insert
	}
	if (isset($_POST['update']))
	{
		$edit_state = true;
		$Name = mysqli_real_escape_string($db,$_POST['Name']);
		$Surname = mysqli_real_escape_string($db,$_POST['Surname']);
		$studentno = mysqli_real_escape_string($db,$_POST['studentno']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$sql ="UPDATE personalinfo SET Name='$Name',Surname='$Surname',studentno='$studentno' WHERE id='$id'";
		mysqli_query($db,$sql);
		$_SESSION['msg']="Student details updated";
		header('location: services.php');

	}
	if (isset($_GET['del']))
	{
		$id = $_GET['del'];
		$sql = "DELETE FROM personalinfo WHERE id='$id'";
		mysqli_query($db,$sql);
		$_SESSION['msg'] ="Student record deleted";
		header('location: services.php');
	}
	$results = mysqli_query($db,"SELECT * FROM personalinfo");
	//$conn->close();
?>
