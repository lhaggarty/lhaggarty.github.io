<?php


if($_GET){
    if(isset($_GET['createLink'])){
        testingData();
    }
	
}


function testingData() {
	$VideoSource = $_GET['VideoSource'];
	$SingleOrMulti = $_GET['SingleOrMulti'];
	$ytVideoTitle = $_GET['ytVideoTitle'];
	if ($VideoSource == 1){
		$ytLink = 'https://www.youtube.com/watch?v='.$ytVidCode;
		
	}else {
		$ytLink=$ytVidCode;
	}
	$ytVidCode = $_GET['ytVidCode'];

	$videoStartData = ($_GET['InTimeCode']);
	$videoStopData = ($_GET['OutTimeCode']);
	
	parse_str($videoStartData);
	parse_str($videoStopData);
	
	echo '<!DOCTYPE html>
	<html>
		<head>
			<title>'.$ytVideoTitle.'</title>
			<meta charset="UTF-8">
			
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="http://content.jwplatform.com/libraries/FxXAImPG.js"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<link rel="manifest" href="css/favicon/manifest.json">
			
			<meta name="msapplication-TileImage" content="css/favicon/ms-icon-144x144.png">
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
	  	          <ul class="nav nav-pills" style="padding-left:4.7%;">
					<li role="presentation"><a href="index.html"><img src="css/hot-potato-black-text-with-logo.png" class="blackImage" alt="Hot Potato" width="101.48" height="22" style="padding-bottom:0px;"><img src="css/hot-potato-white-text-with-logo.png" class="whiteImage" alt="Hot Potato" width="101.48" height="22" style="padding-bottom:0px;"></a></li>
			
					<li role="presentation"><a href="original-youtube-video-feed.php"><img src="css/find-video-black-resize.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"><img src="css/find-video-white-resize.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"> Uncut Videos</a></li>
			
	  	            <!-- <li role="presentation" class="active"><a href="editor.php"><img src="css/cut-video-image-black.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"> Editor</a></li> -->
			
	  				<li role="presentation"><a href="feed.php"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
	  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
	
	  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
				
	  	        </div><!--/.nav-collapse -->
	  	      </div>
			  
		<div class="video-part">
		<div class="row" style="padding-top:20px;padding-bottom:1%">
			<div class="col-md-6 col-md-offset-3" style="text-align:center">
			<h3>'.$ytVideoTitle.'</h3>
		</div></div>
		<div class="row">
		<div class="col-md-6 col-md-offset-3" id="videoPlayback">
		<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame">
		<div id="JWvid"></div>
		</div>
		<div class="progress">
	  	<div class="progress-bar progress-bar-warning" id="progressBarVis" role="progressbar" style="">
		</div></div>
		</div>
		
		<div class="col-md-3">
			<table class="table table-hover" style="text-align:center">
			<tr id="cut0-tableElement" onclick="assignVideoPlayback(0)" style="display:none">
			<td>
				<p>Clip 1</p>
			</td>
			</tr>
			<tr id="cut1-tableElement" onclick="assignVideoPlayback(1)" style="display:none">
			<td>
				<p>Clip 2</p>
			</td>
			</tr>
			<tr id="cut2-tableElement" onclick="assignVideoPlayback(2)" style="display:none">
			<td>
				<p>Clip 3</p>
			</td>
			</tr>
			<tr id="cut3-tableElement" onclick="assignVideoPlayback(3)" style="display:none">
			<td>
				<p>Clip 4</p>
			</td>
			</tr>
			<tr id="cut4-tableElement" onclick="assignVideoPlayback(4)" style="display:none">
			<td>
				<p>Clip 5</p>
			</td>
			</tr>
			<tr id="cut5-tableElement" onclick="assignVideoPlayback(5)" style="display:none">
			<td>
				<p>Clip 6</p>
			</td>
			</tr>
			<tr id="cut6-tableElement" onclick="assignVideoPlayback(6)" style="display:none">
			<td>
				<p>Clip 7</p>
			</td>
			</tr>
			<tr id="cut7-tableElement" onclick="assignVideoPlayback(7)" style="display:none">
			<td>
				<p>Clip 8</p>
			</td>
			</tr>
			<tr id="cut8-tableElement" onclick="assignVideoPlayback(8)" style="display:none">
			<td>
				<p>Clip 9</p>
			</td>
			</tr>
			<tr id="cut9-tableElement" onclick="assignVideoPlayback(9)" style="display:none">
			<td>
				<p>Clip 10</p>
			</td>
			</tr>
			<tr id="cut10-tableElement" onclick="assignVideoPlayback(10)" style="display:none">
			<td>
				<p>Clip 11</p>
			</td>
			</tr>
			</table>
		</div>
		</div>
		
		</div>
		<div class="dashboard-part" style="padding-bottom:200px">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<button type="button" class="btn btn-default bg-dark" id="repeatVid" name="repeatVid" onclick="repeatVid()" style="display:none">
		<span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
			<span> Loop Video</span>
		</button>
		<button type="button" class="btn btn-default bg-dark" id="viewOriginalVideo" onclick="viewOriginalVideo()">
		<span class="glyphicon glyphicon-transfer" aria-hidden="true"> </span>
			<span> Original Video</span>
		</button>
		<button type="button" class="btn btn-default bg-dark" id="viewVideoEdit" onclick="viewVideoEdit()" style="display:none">
		<span class="glyphicon glyphicon-transfer" aria-hidden="true"> </span>
			<span> Video Edit</span>
		</button>
		</div></div>
		</div>
		<script>
		var vidWidth=$("#responsiveVideoFrame").width();
		var vidHeight=(vidWidth*0.5625);
		var ProgressBar;
		var realVal;
		
		var relativePos;
		var relativeEnd;
		var userViewMode=0;
		var vidDuration;
		var inPoint =['.implode(",", $videoStart).'];
		var outPoint =['.implode(",", $videoStop).'];
		var vidDuration;
		var currentCut=0;
		
		$(function () {
			for (var i=0;i<(outPoint.length);i++){
				document.getElementById("cut"+i+"-tableElement").style.display="";
			}
		})
		
	    jwplayer("JWvid").setup({
	        file: "https://www.youtube.com/watch?v='.$ytVidCode.'",
	        width: vidWidth,
	        height: vidHeight,
			stretching: "fill",
	    });
	
	function repeatVid(){
		jwplayer("JWvid").seek(inPoint);
		userViewMode=2;
	}
	function viewOriginalVideo(){
		userViewMode=-2;
		document.getElementById("viewOriginalVideo").style.display="none";
		document.getElementById("viewVideoEdit").style.display="";
	}
	function viewVideoEdit(){
		userViewMode=1;
		document.getElementById("viewVideoEdit").style.display="none";
		document.getElementById("viewOriginalVideo").style.display="";
	}
	function assignVideoPlayback (editNumber){
		userViewMode=2;
		currentCut=editNumber;
		jwplayer("JWvid").seek(inPoint[currentCut]);
	}
	
	jwplayer("JWvid").onPlay(function (event){
		if (userViewMode==0){
		jwplayer("JWvid").seek(inPoint[0]);
		userViewMode=2;
		}
		vidDuration=jwplayer("JWvid").getDuration();
		
	});
	
	jwplayer("JWvid").onTime(function (event){
		realVal = event.position;
		relativePos = realVal - inPoint[currentCut];
		relativeEnd = outPoint[currentCut]-inPoint[currentCut];
		
		if (userViewMode==-2) {
			userViewMode=-1;
			jwplayer("JWvid").seek(realVal);
		} else if (userViewMode==1) {
			userViewMode=0;
			jwplayer("JWvid").seek(realVal);
		}
		
		if 	(userViewMode>-1){
			if (currentCut >= (outPoint.length-1) && realVal > outPoint[currentCut]){
			
				jwplayer("JWvid").pause(true);
			}
			else if (realVal > outPoint[currentCut] && realVal < inPoint[currentCut+1]){
				currentCut++;
				jwplayer("JWvid").seek(inPoint[currentCut]);
			} 
		ProgressBar = (relativePos/relativeEnd);
		document.getElementById("progressBarVis").className="progress-bar progress-bar-warning";
		}
		else if (userViewMode<0){
		ProgressBar = (realVal/vidDuration);
		document.getElementById("progressBarVis").className="progress-bar progress-bar-info";
		}
		ProgressBar = ProgressBar*100;
		ProgressBar = ProgressBar.toPrecision(2);
			
		document.getElementById("progressBarVis").style.width =(ProgressBar+"%");
		
	});		
				
		</script>
		
		<img width="10" height="10" src="https://i.ytimg.com/vi/cPAO-73B54o/hqdefault.jpg" style="visibility:hidden"/>
		</body>
		<script>
		  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

		  ga("create", "UA-57874990-5", "auto");
		  ga("send", "pageview");

		</script>
		</html>';
	
}
?>