<?php
$alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

$a0 = 0;
$a1 = 0;
$a2 = 0;

while ($a2 != 25) {
	$title = get_title("https://instaud.io/" . $alphabet[$a2] . $alphabet[$a1] . $alphabet[$a0]);
	if ($title != "") {
		echo $a0 . "<br>";
		echo $a1 . "<br>";
		echo $a2 . "<br><br>";
		echo "<a href='https://instaud.io/" . $alphabet[$a2] . $alphabet[$a1] . $alphabet[$a0] . "'>" . $title . "</a> --- " . $alphabet[$a2] . $alphabet[$a1] . $alphabet[$a0] . "<br>";
	}
	

	if($a0 == 25){
		$a1 = $a1 + 1;
		$a0 = 0;
	}else{
		$a0 = $a0 + 1;
	}

}

function get_title($url) {
	$str = @file_get_contents($url);
	if (strlen($str) > 0) {
		$str = trim(preg_replace('/\s+/', ' ', $str));
		// supports line breaks inside <title>
		preg_match("/\<title\>(.*)\<\/title\>/i", $str, $title);
		// ignore case
		return $title[1];
	}
}
?>