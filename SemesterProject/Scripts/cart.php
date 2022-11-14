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
					$path = "Products/".$x[2]."/".$row["Brand"].str_replace(" ","_",$row["Item"])."/";
					echo "<div class='cartProduct' style='width:70%'>".
							"<img class='cartPic' onclick='Redirect(\"$path".str_replace(" ","_",$row["Item"]).".html\")' style='padding: 5px; float:left; width:auto; height:300px;' src='".$path."0.webp'></img>".
							"<h1>".$row["Brand"]." ".$row["Item"]."</h1>".
							"<h2>Price: $ ".number_format($row["Price"], 2)."</h2>".
							"<h3>Quantity: ".number_format($x[1])."</h3>".
							"<h3 class='Totals'>Total: $ ".number_format($total = intval($x[1])*floatval($row["Price"]),2)."</h3><input class='removeCart' value='Remove From Cart' type='button' onclick='removeCart(\"".$row["Item"]."\")'></div>";
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
			<input id='cartCheckout' type='button' value='Checkout' onclick='checkOut()'>
			</div>";
	//echo "1!".$output;
}
else
	echo "<div style='margin:30px;'><h2>No Items Found</h2><h3>Please add an item to your cart!</h3></div>";
$conn->close();
?>