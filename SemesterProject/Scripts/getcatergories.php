<?php
$servername = "localhost";#"127.0.0.1:3306";
$username = "user";
$password = "";
$dbName = "products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SHOW TABLES";
if ($result = mysqli_query($conn, $sql)) {
	//echo $result;
	while($row = $result->fetch_assoc()){
		echo $row["Tables_in_products"] . "_";
	}
}
$conn->close();
?>