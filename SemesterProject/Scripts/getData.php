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
$tables = "";
$search = $_GET['item'];

$sql = "SHOW TABLES";
if ($result = mysqli_query($conn, $sql)) {
	//echo $result;
	while($row = $result->fetch_assoc()){
		$tables .= $row["Tables_in_products"] . "_";
	}
}

foreach(explode("_", $tables) as $x){
	$sql = "SELECT * FROM `$x` WHERE `Item`='$search'";;
	//echo $sql . "<br>";
	//$result = $conn->query($sql);

	if ($result = mysqli_query($conn, $sql)) {
	  //output data of each row
	  while($row = $result->fetch_assoc()) {
		echo $row["Brand"]. "_" . $row["Item"]. "_" . number_format($row["Price"],2) . "_" . $row["Description"] . "_" . $x;
	  }
	} 
}
$conn->close();
?>