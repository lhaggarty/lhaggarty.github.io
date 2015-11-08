<?php
grabLink ();

function grabLink (){
	$webpage = file_get_contents('http://squirescreen.tumblr.com/rss');
	
	echo '<!DOCTYPE html>
	<html>
		<head>
			<title>Uncut Video</title>
			<meta charset="UTF-8">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="http://content.jwplatform.com/libraries/FxXAImPG.js"></script>
			
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
						
    						<li role="presentation" class="active"><a href="original-youtube-video-feed.php"><img src="css/find-video-black-resize.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"><img src="css/find-video-white-resize.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"> Uncut Videos</a></li>
						
    		  	            <!-- <li role="presentation"><a href="editor.php"><img src="css/cut-video-image-black.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"> Editor</a></li> -->
						
    		  				<li role="presentation"><a href="feed.php"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
    		  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
				
    		  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
		  				
    		  	        </div><!--/.nav-collapse -->
    		  	      </div>
			    
			</div>
			<div id="rss-info" style="display:none">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
					<form role="form" action="indexToEditor.php" method="get">
						<div class="form-group">
						<input type="text" name="ytVidCode" id="ytVidCode" value="yJDRop2ocFo" style="display:none"/>
						<input type="text" name="ytVideoTitle" id="ytVideoTitle" value="" style="display:none"/>
						<input type="text" name="VideoSource" id="VideoSource" value="1" style="display:none"/>
						<input type="submit" class="button" name="originalVideo-to-editor" id="originalVideo-to-editor" style="display:none"/>
						</div>
					</form>
					<div class="well" id="youtube-rss-data" style="color: #000">'.$webpage.'</div>
					</div>
				</div>
			</div>
			<script>
			rssFeed = document.getElementById("youtube-rss-data").innerHTML;
			var links=[];
			var title=[];
			var OriginalLink=[];
			function getVideoIds(){
			if (rssFeed.indexOf("v=") > -1){
				var queryMatch = rssFeed.match(/v=/g);
	  			var maxQuery = queryMatch.length;
				
				var query;
		       // vars = query[1].split("&");
			   query = rssFeed.split( "v=" );
			   // links[1] = query[1].split("&quot;");
			   links[0] = query[1].substr(0,11);
			   OriginalLink[0]="https://www.youtube.com/watch?v="+links[0];
		       for (var i=2;i<(maxQuery+1);i++) {
				   query[i].split( "v=" );
		           // links[i] = query[1].split("&quot;");
				   links[i-1] = query[i].substr(0,11);
				   OriginalLink[i-1]="https://www.youtube.com/watch?v="+links[i-1];
		       }
		       for (var i=1;i<(maxQuery+1);i++) {
				   links.splice(i,1);
				   OriginalLink.splice(i,1);
		       }
			
			   
			// getYouTubeVideoIdData();
			}
			else {
				console.log("nadda");
			}
			}
			function getVideoTitles(){
			if (rssFeed.indexOf("description") > -1){
				var queryMatch = rssFeed.match(/title/g);
	  			var maxQuery = queryMatch.length;
				var vars;
				var query;
		       // vars = query[1].split("&");
			   query = rssFeed.split( "&lt;p&gt;" );
			   // links[1] = query[1].split("&quot;");
			   vars = query[1].split( ". A" );
			   title[0]= vars[0];
			   
		       for (var i=2;i<(maxQuery/2);i++) {
				   query[i].split( "&gt;p&gt;" );
		           // links[i] = query[1].split("&quot;");
				   vars = query[i].split( ". A" );
				   title[i-1] = vars[0];
				   
		       }
			
			// getYouTubeVideoIdData();
			}
			else {
				console.log("nadda");
			}
			}
			getVideoTitles();
			getVideoIds();
			
			</script>
			<div class="video-part" style="padding-bottom:20px">
				
				<div class="row" style="padding-top:30px">
					<div class="col-md-12" id="uncutVideoIntro">
					<div class="col-md-6 col-md-offset-3">
						<div id="video-title0" style="text-align:center">
							<h3></h3>
						</div>
					</div>

					<div class="col-md-6 col-md-offset-3">
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame0" onmouseout="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame0"></div>
				</div>
			
			
			<button type="button" class="btn btn-default bg-dark" id="launchEditor" onclick="launchEditor()">
				<img src="css/cut-video-image-black.png" class="blackImage" alt="cut video" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="edit video" width="35.24" height="23.5" style="padding-top:2px">
				<span> Edit Video</span></button>
			</div></div>
		</div>
			
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title1" style="text-align:center">
							<h3></h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame1" onmouseout="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame1"></div>
				</div>
				<button type="button" class="btn btn-default bg-dark" id="launchEditor" onclick="launchEditor()">
					<img src="css/cut-video-image-black.png" class="blackImage" alt="cut video" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="edit video" width="35.24" height="23.5" style="padding-top:2px">
					<span> Edit Video</span></button>
			</div></div>
			
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title2" style="text-align:center">
							<h3></h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3" >
					
					<div id="responsiveVideoFrame2" class="embed-responsive embed-responsive-16by9" onmouseout="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame2"></div>
				</div>
				<button type="button" class="btn btn-default bg-dark" id="launchEditor" onclick="launchEditor()">
					<img src="css/cut-video-image-black.png" class="blackImage" alt="cut video" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="edit video" width="35.24" height="23.5" style="padding-top:2px">
					<span> Edit Video</span></button>
			</div></div>
			
			</div>	
		<div class="dashboard-part">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
				<button type="button" class="btn btn-default bg-dark" id="previousPage" onclick="previousPage();" style="visibility:hidden">
					<span class="glyphicon glyphicon-film" aria-hidden="true"> </span>
					<span> PREVIOUS PAGE</span>
				</button>
			<button type="button" class="btn btn-default bg-dark" id="nextPage" onclick="nextPage();">
				<span class="glyphicon glyphicon-film" aria-hidden="true"> </span>
				<span> NEXT PAGE</span>
			</button>
		</div>
		
		</div>
	</div>		
		<script>
		var videoMultiple=0;
		
		var inputYTLink = "https://www.youtube.com/watch?v=yJDRop2ocFo";
		
		var vidWidth=$("#responsiveVideoFrame"+videoMultiple).width();
		var vidHeight=(vidWidth*0.5625);
		var currentVid;
		
		initiateTitles();
		initiateVideoPlayer();
		
		
		
		function initiateTitles(){
			for (var i=videoMultiple;i<(videoMultiple+3);i++){
				document.getElementById("video-title"+(i)).innerHTML="<h3>"+title[i]+"</h3>";
		}
		}
		function initiateVideoPlayer(){
			vidWidth=$("#responsiveVideoFrame"+videoMultiple).width();
			vidHeight=(vidWidth*0.5625);
			for (var i=videoMultiple;i<(videoMultiple+3);i++){
			// inputYTLink = OriginalLink[i];
		    jwplayer("videoPlaybackFrame"+i).setup({
		        file: OriginalLink[i],
		        width: vidWidth,
		        height: vidHeight,
				stretching: "fill",
		    });
			}
		}
		function changeCurrentVideo (currentElementId){
			var currentVidNumber;
			currentVidNumber=currentElementId.split("Frame");
			if (currentVid!=currentVidNumber[1]){	
				currentVid=currentVidNumber[1];
			
			}
			
		}
		function changeCurrentVideoClick (){
			jwplayer("videoPlaybackFrame"+currentVid).onPause(function (event){
				
				// ProgressBar = (relativePos/editEnd);
	// 			ProgressBar = ProgressBar*100;
	// 			ProgressBar = ProgressBar.toPrecision(2);
	//
	// 			document.getElementById("progressBarVis").style.width =(ProgressBar+"%");
			});
		}
		function launchEditor(){
			document.getElementById("ytVidCode").value=links[currentVid];
			document.getElementById("ytVideoTitle").value=title[currentVid];
			document.getElementById("originalVideo-to-editor").click();
		}
		function previousPage(){
			videoMultiple=videoMultiple-3;
			for (var i=(videoMultiple);i<(videoMultiple+3);i++){
				var j=i+3;
				document.getElementById("video-title"+(j)).id="video-title"+(i);
				document.getElementById("video-title"+(i)).innerHTML="<h3>"+title[i]+"</h3>";
				document.getElementById("responsiveVideoFrame"+(j)).id="responsiveVideoFrame"+(i);
				jwplayer("videoPlaybackFrame"+j).remove();
				document.getElementById("videoPlaybackFrame"+(j)).id="videoPlaybackFrame"+(i);
				j++;
			    jwplayer("videoPlaybackFrame"+i).setup({
			        file: OriginalLink[i],
			        width: vidWidth,
			        height: vidHeight,
					stretching: "fill",
			    });
				
			}
			
			document.getElementById("nextPage").style.visibility="visible";
			if ((videoMultiple-3)<=0){
			document.getElementById("previousPage").style.visibility="hidden";		
			}
		}
		function nextPage(){
			
			videoMultiple=videoMultiple+3;
			
			for (var i=videoMultiple;i<(videoMultiple+3);i++){
				var j=i-3;
				document.getElementById("video-title"+(j)).id="video-title"+(i);
				document.getElementById("video-title"+(i)).innerHTML="<h3>"+title[i]+"</h3>";
				document.getElementById("responsiveVideoFrame"+(j)).id="responsiveVideoFrame"+(i);
				// $( "div#responsiveVideoFrame"+i ).mouseout("changeCurrentVideo("+i+")");
				jwplayer("videoPlaybackFrame"+j).remove();
				document.getElementById("videoPlaybackFrame"+(j)).id="videoPlaybackFrame"+(i);
				j++;
			}
			initiateVideoPlayer();
			document.getElementById("previousPage").style.visibility="visible";
			if (OriginalLink.length<=(videoMultiple+3)){
			document.getElementById("nextPage").style.visibility="hidden";		
			}
			
			
		}
		</script>	
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
	die();
}
?>