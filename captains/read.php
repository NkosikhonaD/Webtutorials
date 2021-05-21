<?php

	$servername = "localhost";
	$username = "root";
	$passowrd="";
	$dbname ="studentdb";	

	$conn = new mysqli($servername,$username,$passowrd,$dbname);
	if($conn->connect_error)
	{
		die("Connection failed: " .$conn->connect_error);
	} 
	$sql = "SELECT Name, Surname FROM personalinfo";
	
	$result = $conn->query($sql);
	
	if($result->num_rows>0)
	{
		
		echo "<table align='center' border = 1px style ='width:60px; line-height:40px;'>";
		echo "<tr>";
		echo"<th>Name</th>";
		echo "<th>Surname</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc())
		{
			$name = $row['Name'];
			$surname= $row['Surname'];
			echo "<tr><td style='width: 20px;'>".$name."</td><td style='width: 60px;'>".$surname."</td></tr>";
		}	
		echo "</table>";	
	}
	else
	{
		echo "<table align='center' border = 1px style ='width:60px; line-height:40px;'>";
		echo "<tr><th>Name</th><th>Surname</th><tr/>";
		echo "</table>";
		echo "0 results";
	}
		
	$conn->close();
	
?>