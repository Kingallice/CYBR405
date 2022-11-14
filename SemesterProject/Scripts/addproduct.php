<?php
$servername = "localhost";#"127.0.0.1:3306";
$username = "admin";
$password = "";//$_POST["Password"];
//if($password == "")
	//$password = ".................";
$dbName = "products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($error = $conn->connect_error) {
	if (strpos($error, 'denied') !== false){
		echo "PASSWORDERROR";
		die();
	}
	else
		die("Connection failed: " . $conn->connect_error);
}
$catMenu = $_POST["CategoryMenu"];
$catText = $_POST["CategoryText"];
if ($catMenu == "other"){
	$Table = strtolower($catText);
	if(!is_dir("../Products/$Table./"))
		mkdir("../Products/".$Table."/");
	$sql = "CREATE TABLE `$Table` (
				Brand varchar(25),
				Item varchar(50),
				Description varchar(500),
				Price float(10,2),
				DiscountVal decimal(5,2),
				DiscountOn tinyint(1));";
	if(mysqli_query($conn,$sql))
		echo "Table Created!";
}
else
	$Table = strtolower($catMenu);
$Item = $_POST["Item"];
$Brand = $_POST["Brand"];
$Price = floatval($_POST["Price"]);
$Desc = $_POST["Desc"];
$i = 0;

$path = "../Products/".$Table."/".$Brand.str_replace(" ","_",$Item)."/";
if(!is_dir($path)){
	mkdir($path);

	$fileTemplate = fopen("ItemTemplate.txt", "r");
	$txtTemplate = fread($fileTemplate, filesize("ItemTemplate.txt"));
	$txtTemplate = str_replace("ITEMNAME",$Item,$txtTemplate);
	$fileHTML = fopen($path.str_replace(" ", "_", $Item).".html", "w");
	fwrite($fileHTML,$txtTemplate);
	fclose($fileTemplate);
	fclose($fileHTML);


	$extension=array("jpeg","jpg","png","gif","webp");
	foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
		$ext=pathinfo($_FILES["file"]["name"][$key],PATHINFO_EXTENSION);
		if(in_array($ext,$extension)) {
			$filename=$i.".webp";
			move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"][$key],$path.$filename);
			$i++;
		}
	}
	foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
		$ext=pathinfo($_FILES["files"]["name"][$key],PATHINFO_EXTENSION);
		if(in_array($ext,$extension)) {
			$filename=$i.".webp";
			move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$path.$filename);
			$i++;
		}
	}
}
else
	echo "";
$true = false;
$sql = "SELECT * FROM `$Table` WHERE `Item`='$Item'";
if($result = mysqli_query($conn, $sql))
	while($row = $result->fetch_assoc()){
		$row = $row["Item"];
		if (strpos($row, $Item) !== false)
		$true = true;
	}
if(!$true){
	$sql = "INSERT INTO `$Table` (Brand, Item, Description, Price) VALUES ('$Brand', '$Item', '".substr($Desc,0,500)."', '$Price')";
		if(mysqli_query($conn, $sql)){
			echo "1,Product Added Successfully!";
		}
		else
			echo "0,Error Occurred!";
}
else
	echo "0,Item Exists!";

$conn->close();
?>