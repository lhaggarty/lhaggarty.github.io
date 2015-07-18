<?php
grabLink ();

function grabLink (){
	$webpage = file_get_contents('http://squirescreen.tumblr.com/rss');
	
	echo '<!DOCTYPE html>
	<html>
		<head>
			<title>New YouTube Videos</title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="http://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>

			<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
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

    						<li role="presentation"><a href="potatoes-to-cut.html"><img src="css/find-video-black-resize.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"><img src="css/find-video-white-resize.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"> New YouTube Videos</a></li>

    		  	            <li role="presentation"><a href="editor.php"><img src="css/cut-video-image-black.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"> Editor</a></li>

    		  				<li role="presentation" class="active"><a href="feed.php"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
    		  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>

    		  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>

    		  	        </div><!--/.nav-collapse -->
    		  	      </div>

			</div>
			<div class="video-part" style="padding-bottom:20px">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
					<div class="well" id="youtube-rss-data" style="color: #000" onclick="getVideos()">'.$webpage.'</div>
					</div>
				</div>
			</div>
			<script>
			rssFeed = document.getElementById("youtube-rss-data").innerHTML;
			var links=[];
			function getVideos(){
			if (rssFeed.indexOf("v=") > -1){
				var queryMatch = rssFeed.match(/v=/g);
	  			var maxQuery = queryMatch.length;
				
				var query;
		       // vars = query[1].split("&");
			   query = rssFeed.split( "v=" );
			   // links[1] = query[1].split("&quot;");
			   links[1] = query[1].substr(0,11);
		       for (var i=2;i<(maxQuery+1);i++) {
				   query[i].split( "v=" );
		           // links[i] = query[1].split("&quot;");
				   links[i] = query[i].substr(0,11);
		       }
			console.log(links);   
			// getYouTubeVideoIdData();
			}
			else {
				console.log("nadda");
			}
			}
			
			</script>
			</body>
			</html>
			';
			
}
?>