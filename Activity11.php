<style>
	body{
		font-size:15pt;
	}
</style>
<?php
$str1 ='033000';  
$str2 = 'PHP stands for PHP: Hypertext Preprocessor, it is a widely-used, open source scripting language'; 
$str3 = 'www.example.com/public_html/index.php'; 
$str4 = 'the quick brown fox jumps over the lazy dog.';
$str5 = 'football'; 
$str6 = 'footboll'; 

//1. splits passed string into segments length 2 and places ':' between the segments
function Q1($str){
	$lenSplit = 2;
	$outString = "";
	for($i = 0; $i < strlen($str); $i++){
		if($i%$lenSplit == 0 && $i != 0)
			$outString = $outString.":";
		$outString = $outString.$str[$i];
	}
	echo "Splits the string into segments of length 2, placing ':' between.<br>
			1. $outString<br>";
}

//2. Checks passed string for PHP - displays first location if present, otherwise displays not present
function Q2($str){
	if(strpos($str, "PHP") !== false)
		echo "<br>Checks passed string for 'PHP', and displays first location if present.<br>
			2. The 'PHP' word is present at index ".strpos($str, "PHP").".<br>";
	else
		echo "<br>Checks passed string for 'PHP', and displays first location if present.<br>
			2. The 'PHP' word is not present.<br>";
}

//3. Pulls filename from passed string
function Q3($str){
	$str = explode("/", $str);
		echo "<br>Pulls the filename from passed string.<br>
				3. ".$str[count($str)-1]."<br>";
}

//4. Replaces first occurrence of 'the' with 'That' in passed string
function Q4($str){
	$search = "the";
	$replace = "That";
	$first = strpos($str, $search) + strlen($search);
	echo "<br>Replaces first occurrence of 'the' with 'That' in passed string.<br>
		4. ".str_replace($search,$replace,substr($str,0,$first)).substr($str,$first)."<br>";
}

//5. Determines the first different character between passed strings
function Q5($check1,$check2){
	for($i = 0; $i < strlen($check1); $i++){
		if($check1[$i] != $check2[$i]){
			echo "<br>Determines the first different character between passed strings.<br>
				5. The character at index $i in '$check1' and '$check2' is different. It is '$check1[$i]' in '$check1' and '$check2[$i]' in '$check2'.<br>";
			break;
		}
	}
}

//6. Encrypts passed string by setting each character to next character in alphabetical order or numerical order
function Q6($str){
	$alphabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","t","u","v","w","x","y","z"];
	$strOut = "";
	for($i = 0; $i < strlen($str); $i++){
		$x = strtolower($str[$i]);
		if(array_search($x, $alphabet) !== false){
			$strOut = $strOut.$alphabet[(array_search($x, $alphabet) + 1)%count($alphabet)];
		}
		else if(intval($x) > -1)
			$strOut = $strOut.(intval($x)+1)%10;
		else
			$strOut = $strOut.$x;
	}
	echo "<br>Encrypts passed string as each char to next char in sequence.<br>
		6. ".$strOut;
}

echo "The strings given are<br><br>str1 = $str1<br>str2 = $str2<br>str3 = $str3<br>str4 = $str4<br>str5 = $str5<br>str6 = $str6<br><br>";
//calls functions for each question, passing the correct string
Q1($str1);
Q2($str2);
Q3($str3);
Q4($str4);
Q5($str5, $str6);
Q6($str6);
?>