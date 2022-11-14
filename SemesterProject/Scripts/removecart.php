<?php
$servername = "localhost";#"127.0.0.1:3306";
$username = "user";
$password = "";
$dbName = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$number = $_POST['accnumber'];
$item = $_POST['itemname'];
//echo $sql . "<br>";
//$result = $conn->query($sql);

$sql = "DELETE FROM `cart` WHERE `AccNumber`='$number' AND `Item`='$item'";
if ($result = mysqli_query($conn, $sql)) {
	echo "Remove Successful";
}
else
	echo "Error Occurred";
$conn->close();
?>