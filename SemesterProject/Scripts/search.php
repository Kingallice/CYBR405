<head>
	<link rel="stylesheet" href="..\styles.css">
</head>
<body style="margin:20px;">
	<h1>Search Results</h1>
</body>
<script>
function Redirect(path){
	document.location.replace(path);
}
</script>
<?php
$noresults = "<h2>0 Results Found</h2><h3>Please try again</h3>";

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
$search = strtolower($_GET['search']);
if($search == ""){
	echo $noresults;
	die();
}
$Tables = [];
$sql = "SHOW TABLES";
if ($result = mysqli_query($conn, $sql)) {
	//echo $result;
	while($row = $result->fetch_assoc()){
		array_push($Tables, $row["Tables_in_products"]);
	}
}
$found = false;
foreach($Tables as $x){
	if($x == $search) {
		$sql = "SELECT * FROM `$search`";
		if ($result = mysqli_query($conn, $sql)) {
			//output data of each row
			while($row = $result->fetch_assoc()) {
				$path = "../Products/$x/";
				$pathhtml = '"'.$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/".str_replace(" ","_",$row["Item"]).'.html"';
				echo "<div onclick='Redirect($pathhtml)' class='product' style='width:43%'>".
					"<img style='padding: 5px; float:left; width:auto; height:200px;' src='".$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/0.webp'></img><h2>".$row["Brand"]." ".$row["Item"]."</h2>".
					"<h3>Price: $ ".number_format($row["Price"],2)."</h3>".
					"<p>".substr($row["Description"],0,50)."...</p></div>";
				$found = true;
			}
		}
	}
	else {
		$sql = "SELECT * FROM `$x`";
		if ($result = mysqli_query($conn, $sql)) {
		  //output data of each row
		  while($row = $result->fetch_assoc()) {
			  $searches = strtolower(implode(",",$row));
			  if (strpos($searches,$search) !== false){
					$path = "../Products/$x/";
					$pathhtml = '"'.$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/".str_replace(" ","_",$row["Item"]).'.html"';
				echo "<div onclick='Redirect($pathhtml)' class='product' style='width:43%'>".
					"<img style='padding: 5px; float:left; width:auto; height:200px;' src='".$path.$row["Brand"].str_replace(" ","_",$row["Item"])."/0.webp'></img><h2>".$row["Brand"]." ".$row["Item"]."</h2>".
					"<h3>Price: $ ".number_format($row["Price"],2)."</h3>".
					"<p>".substr($row["Description"],0,50)."...</p></div>";
				$found = true;
			  }
		  }
		}
	}
}
if(!$found)
	echo $noresults;
$conn->close();
?>
<?php
#Opens directory and finds the html file and the picture to display
// function readDirectory($dirPath){
	// $html = ""; $pic = ""; $out = "";
	// if(is_dir($dirPath)){
		// if($dh = opendir($dirPath)){
			// while (($file = readdir($dh)) !== false){
				// if((strpos($file,"html")) !== false){
					// $fileh = $file;
					// $html = "<div style='background-color:grey; height:40%; width:60%; float:left;'><a href='" . $dirPath . "/" . $file . "'>";
				// }
				// if((strpos($file,"1.webp")) !== false){
					// $pic = "<img style='float:left; padding: 10px; width:auto; height:90%;' src='" . $dirPath . "/" . $file . "'></a><h1>" . $fileh ."</h1><h2><br>Hello</h2></div>";
				// }
			// }
			// $out = $html . $pic;
			// return [$fileh, $out];
		// }
	// }
	// return ["Error <br>","Error: No directory could not be found! <br>"];
// }
// function getDirectories($dirPath, $search){
	// $i = 0;
	// $dirArray = [null];
	// if(is_dir($dirPath)){
		// if($dh = opendir($dirPath)){
			// while($df = readdir($dh)){
				// if(strpos(strtolower($df),$search)){
					// $dirArray[$i] = $dirPath . "/" . $df;
					// echo $dirArray[$i] . "<br>";
					// $i++;
				// }
			// }
		// }
	// }
	// closedir($dh);
	// return $dirArray;
// }
// #echo "Hello World <br>";
// $in = $_GET['search'];
// $in = strtolower($in);
// $dir = "../Products";
// $fileArray = array();
// $dirArray = array();
// $pic = "";
// $filehtml = "";
// $fileh = "";

// if($in !== ""){
	// $i = 0;
	// $dirArray = getDirectories($dir, $in);
	// foreach($dirArray as $x){
		// $fileArray[$i] = readDirectory($x)[1];
		// $i++;
	// }
	// foreach($fileArray as $s){
		// echo "<head><link rel='stylesheet' href='../styles.css'></head><body>" . $s . "</body>";
	// }
// }
// else {
	// echo "<head><link rel='stylesheet' href='../styles.css'></head><body><h1 style='margin:15px'>Please enter a search term.</h1></body>";
// }

// ?>