<?php

// echo "hello world";
// include_once("http://localhost/hotpotatome/mysql_1edit_connect.php");

//$db = mysql_select_db('single_edits');
if($_GET){
    if(isset($_GET['createLink'])){
        createLink();
    }else {
		
    }
}

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function templateHTML() {
	$ytLink = $_GET['InputYouTubeLink'];
	$videoStart = $_GET['InTimeCode'];
	$videoStop = $_GET['OutTimeCode'];
	$ytVidCode = $_GET['ytVidCode'];
	
	//$ytCode = $_GET['shortCode'];
	
	$html = '<!DOCTYPE html>
	<html>
		<head>
			<title>Hot Potato Edit</title>
			<meta name="description" content="Hot Potato - the online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" type="text/css" href="../css/style.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="https://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
		
			<link rel="apple-touch-icon" sizes="57x57" href="css/favicon/apple-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="css/favicon/apple-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="css/favicon/apple-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="css/favicon/apple-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="css/favicon/apple-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="css/favicon/apple-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="css/favicon/apple-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="css/favicon/apple-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="css/favicon/apple-icon-180x180.png">
			<link rel="icon" type="image/png" sizes="192x192"  href="css/favicon/android-icon-192x192.png">
			<link rel="icon" type="image/png" sizes="32x32" href="css/favicon/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="css/favicon/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="css/favicon/favicon-16x16.png">
			<link rel="manifest" href="/manifest.json">
			
			<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		</head>
		
		<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding-left:4.7%">
	      
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		          </button>
		        </div>
		        <div class="navbar-collapse collapse">
		          <ul class="nav navbar-nav">
		            <li class="active"><a href="../index.html">Home</a></li>
					<li><a href="../feed.html">Feed</a></li>
					<li><a href="../sign-up.html">Sign Up</a></li>
				
					<li><a href="../potatoes-to-cut.html">New YouTube Videos</a></li>
		            <li><a href="../about.html">About &amp; Contact</a></li>
					<li><a href="../but_why.html">But Why?</a></li>
		        </div><!--/.nav-collapse -->
		      </div>
		
		<div class="row col-md-offset-3" id="videoPlayback" style="padding-top: 10%; padding-left: 5%">
		 
		<div id="JWvid"></div>

		<script>
	    jwplayer("JWvid").setup({
	        file: "'.$ytLink.'",
	        width: 643,
	        height: 542,
	    });
		var startPosition ='.$videoStart.';
		var endPositionz ='.$videoStop.';
		
			jwplayer("JWvid").onTime(function (event){
				var realVal = event.position;
				
				if (realVal < 2){
					jwplayer("JWvid").seek(startPosition);
				}
				else if (realVal > endPositionz){
					jwplayer("JWvid").pause();
				}
			});
			
			
		</script>
		</div>
		<img width="10" height="10" src="https://i.ytimg.com/vi/'.$ytVidCode.'/mqdefault.jpg" style="visibility:hidden"/>
		</body>
		</html>';
	
	
	return $html;

}

function createLink(){
$conn = mysqli_connect('mysql.1freehosting.com','u151108054_squir','squireprods2002','u151108054_1edit');
$ytLink = $_GET['InputYouTubeLink'];
$videoStart = $_GET['InTimeCode'];
$videoStop = $_GET['OutTimeCode'];
$html = generateRandomString().'.html';
// mysqlconnect('localhost','root','');
// mysql_select_db('single_edits');

// $sql="insert into LinksEditTimesDate(OutputLink) value ('$html');"
// if (mysql_query($sql)){
// 		echo "saved";
// 	}
// 	else {
// 		echo mysqlerror();
// 	}
	
	// if(mysqli_query("INSERT INTO LinksEditTimesDate(OutputLink,OriginalLink) VALUES(".$html.",'')")){
// 		echo "Successful Insertion!";
// 	}
// 	else
// 	{
// 		echo "Please try again";
// 	}

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = mysqli_query($conn,"SELECT OutputLink FROM single_edits WHERE OutputLink LIKE '%".$html."%'");
while ($html==$query){
	$html = generateRandomString().'.html';
}

// Perform queries 
mysqli_query($conn,"SELECT * FROM single_edits");
mysqli_query($conn,"INSERT INTO single_edits (OutputLink,OriginalLink,EditIn,EditOut) 
VALUES ('".$html."','".$ytLink."','".$videoStart."','".$videoStop."')");

mysqli_close($conn);

$create = fopen('single_edits/'.$html, 'w') or die("can't open file");
fwrite($create, templateHTML());
fclose($create);
header('Location: http://gethotpotato.me/single_edits/'.$html);
die();
}
//
//$url = new simpleUrl('https://www.hotpotato.me');
//
// echo $url;
//
// echo $_SERVER['REQUEST_URI'];

?>