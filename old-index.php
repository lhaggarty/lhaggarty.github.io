<?php

// echo "hello world";

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
	$ytLink = '7WpImvsYl98';
	$html = '<!DOCTYPE html>
	<html>
		<head>
			<title>Live Off The Interest Limitless Clip</title>
			<meta name="description" content="Hot Potato - the online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" type="text/css" href="../css/style.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="https://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
		</head>
		
		<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		        </div>
		        <div class="navbar-collapse collapse">
		          <ul class="nav navbar-nav">
		            <li><a href="index.html">Home</a></li>
		            <li><a href="about.html">About &amp; Contact</a></li>
					<li><a href="but_why.html">But Why?</a></li>
		        </div><!--/.nav-collapse -->
		      </div>
		    </div>
		</div>
		
		<div class="row col-md-offset-2" id="videoPlayback" style="padding-top: 3%; padding-left: 5%">
		 
		<div id="JWvid"></div>

		<script>
		var endPosition;
		
		    jwplayer("JWvid").setup({
		        file: "https://www.youtube.com/watch?v='.$ytLink.'",
		        width: 640,
		        height: 360,
		    });
			jwplayer("JWvid").onPlay(function () {
				jwplayer("JWvid").seek(114);
			});
			jwplayer("JWvid").onTime(function (event){
				var realVal = event.position;
				
				if (realVal > 132){
					jwplayer("JWvid").pause();
				}
			});
			
			
		</script>
		</div>
		<img width="10" height="10" src="https://i.ytimg.com/vi/'.$ytLink.'/mqdefault.jpg" style="visibility:hidden"/>
		</body>
		</html>';
	
	
	return $html;

}

function createLink(){
$html = generateRandomString().'.html';
$create = fopen('links/'.$html, 'w') or die("can't open file");
fwrite($create, templateHTML());
fclose($create);
echo $html; 
}
//
//$url = new simpleUrl('https://www.hotpotato.me');
//
// echo $url;
//
// echo $_SERVER['REQUEST_URI'];

?>