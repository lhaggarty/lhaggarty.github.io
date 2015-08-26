<?php

// echo "hello world";
// include_once("http://localhost/hotpotatome/mysql_1edit_connect.php");

//$db = mysql_select_db('single_edits');
if($_GET){
    if(isset($_GET['createLink'])){
        testingData();
    }
	elseif (isset($_GET['resubmitLink'])){
	        postToFeed();
	}
	else {
		
	}
}

function testingData() {
	
	$videoStart = array($_GET['InTimeCode']);
	$videoStopData = ($_GET['OutTimeCode']);
	$videoStop = parse_str($videoStopData);
	$ytVidCode = $_GET['ytVidCode'];
	var_dump($videoStop);
}
?>