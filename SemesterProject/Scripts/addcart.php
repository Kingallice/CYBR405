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
$accNumber = $_POST['accnumber'];
$quantity = $_POST['quantity'];
$item = $_POST['item'];
$cat = $_POST['cat'];

$true = false;
$sql = "SELECT `Quantity` FROM `cart` WHERE `AccNumber`=\"$accNumber\" AND `Item`=\"$item\"";
if ($result = mysqli_query($conn, $sql)) {
	//echo $result;
	$row = $result->fetch_assoc();
	if($row != ""){		
		$quantity = intval($quantity) + intval($row["Quantity"]); 
		$sql = "UPDATE `cart` SET `Quantity`=\"$quantity\" WHERE `AccNumber`=\"$accNumber\" AND `Item`=\"$item\"";
		if (mysqli_query($conn, $sql)) {
			echo "1,";
		} else {
		  echo "0,";
		}
	}
	else 
	$true = True;
} 
if ($true){
	$sql = "INSERT INTO `cart`(`Item`, `Quantity`, `AccNumber`,`Category`) VALUES (\"$item\",\"$quantity\",\"$accNumber\",\"$cat\")";
	//echo $sql . "<br>";
	//$result = $conn->query($sql);

	if (mysqli_query($conn, $sql)) {
		echo "1,";
	} else {
	  echo "0,";
	}
}


$conn->close();
?>