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

$table = $_GET["table"];

$path = "Products/$table/";

$sql = "SELECT * FROM `$table`";
if ($result = mysqli_query($conn, $sql)) {
	echo "<h2>$table</h2>";
	//echo $result;
	while($row = $result->fetch_assoc()){
		$pathhtml = '"'.$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/".str_replace(" ","_",$row["Item"]).'.html"';
		echo "<div onclick='Redirect($pathhtml)' class='product' style='width:45%'>".
				"<img style='padding: 5px; float:left; max-width: 250px; max-height:200px;' src='".$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/0.webp'></img><h2>".$row["Brand"]." ".$row["Item"]."</h2>".
				"<h3>Price: $ ".number_format($row["Price"],2)."</h3>".
				"<p>".substr($row["Description"],0,50)."...</p></div>";
	}
}
$conn->close();
?>