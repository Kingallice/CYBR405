<?php
function getTables($conn){
	$arrTables = "";
	$sql = "SHOW TABLES";
	if ($result = mysqli_query($conn, $sql)) {
	//echo $result;
		while($row = $result->fetch_assoc()){
			$arrTables .= $row["Tables_in_products"] . "_";
		}
	$arrTables = explode("_", $arrTables);
	}
	return $arrTables;
}

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
	
$sql = "SELECT * FROM `cart` WHERE `AccNumber`='$number'";
//echo $sql . "<br>";
//$result = $conn->query($sql);
$return = "";
if ($result = mysqli_query($conn, $sql)) {
  //output data of each row
  while($row = $result->fetch_assoc()) {
	$return .= "," .$row["Item"]. "_" . $row["Quantity"] . "_" . $row["Category"];
  }
} else 
  echo "0!Error";

$arrTotals = array();
$itemCount = 0;
$totalprice = 0;

if($return != ""){
	$output="";
	$conn->close();
	$conn = new mysqli($servername, $username, $password, "products");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$return = explode(",",$return);
	foreach($return as $x){
		$x = explode("_",$x);
		foreach(getTables($conn) as $table){
			$sql = "SELECT * FROM `$table` WHERE `Item`='$x[0]'";
			if ($result = mysqli_query($conn, $sql)) {
				//output data of each row
				while($row = $result->fetch_assoc()) {
					number_format($total = intval($x[1])*floatval($row["Price"]),2);
					$itemCount += intval($x[1]);
					array_push($arrTotals, $total);
				}
			} 
			else {
				//echo "0!Error";
			}
		}
	}
	foreach($arrTotals as $x){
		$totalprice += floatval($x);
	}
	$totalprice = "$ ".number_format($totalprice, 2);
	$itemCount = number_format($itemCount);
	echo "<div id='cartTotal'>
			<h1>Your Cart Total</h1>
			<h2>Price: $totalprice</h2>
			<h2>Total Items: $itemCount</h2>
			<input id='cartCheckout' type='button' value='Place Order' onclick='succeed()'>
			</div>";
	//echo "1!".$output;
}
else
	echo "<div style='margin:30px;'><h2>No Items Found</h2><h3>Please add an item to your cart!</h3></div>";
$conn->close();
?>