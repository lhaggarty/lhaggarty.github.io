<?php

checkDb();

function checkDb(){
	
$conn = mysqli_connect('141.117.161.98','leonhaggarty','mdm123','hotpotato');
if (mysqli_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// mysqli_query($conn,"SELECT * FROM single_edits");
// $test=mysqli_query($conn,"SELECT * FROM single_edits ORDER BY id DESC LIMIT 1");
// $query = mysqli_query($conn,"SELECT id,OutputLink FROM single_edits WHERE MAX(id) LIKE 'qs1Nm.html'");
$query = mysqli_query($conn,"SELECT * FROM single_edits WHERE PostToFeed=1 ORDER BY id DESC");
if ($query==""){
	echo "nothing";
}
else{
	// $OriginalLinks=array();
// 	$EditInPoints[];
// 	$EditOutPoints[];
$i=0;
	while ($obj=mysqli_fetch_object($query)){
		$OriginalLinks[$i]= $obj->OriginalLink;
		$EditInPoints[$i]=$obj->EditIn;
		$EditOutPoints[$i]=$obj->EditOut;
		$videoTitle[$i]=$obj->title;
		$i++;
	}
	mysqli_free_result($query);
	echo '<!DOCTYPE html>
	<html>
		<head>
			<title>Feed</title>
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
						
    		  				<li role="presentation" class="active"><a href="feed.html"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
    		  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
				
    		  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
		  				
    		  	        </div><!--/.nav-collapse -->
    		  	      </div>
			    
			</div>
			<div class="video-part">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title0" style="text-align:center">
							<h3>'.$videoTitle[0].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					<img id="videoThumbnail0" class="img-responsive" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" style="width:100%" onclick="initiateVideoPlayer(0)"/>
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame0" style="display:none">
					<div id="videoPlaybackFrame0"></div>
				</div></div>
			</div>
			
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title1" style="text-align:center">
							<h3>'.$videoTitle[1].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					<img id="videoThumbnail1" class="img-responsive" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" style="width:100%" onclick="initiateVideoPlayer(1)"/>
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame1" style="display:none">
					<div id="videoPlaybackFrame1"></div>
				</div></div>
			</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title2" style="text-align:center">
							<h3>'.$videoTitle[2].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					<img id="videoThumbnail2" class="img-responsive" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" style="width:100%" onclick="initiateVideoPlayer(2)"/>
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame2" style="display:none">
					<div id="videoPlaybackFrame2"></div>
				</div></div>
			</div>
			
			</div>	
		<div class="dashboard-part">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
			<button type="button" class="btn btn-default" id="nextPage" onclick="nextPage();">
				<span class="glyphicon glyphicon-film" aria-hidden="true"> </span>
				<span> NEXT PAGE</span>
			</button>
		</div>
		
		</div>
	</div>		
		<script>
		var videoMultiple=0;
		var OriginalLink='.json_encode($OriginalLinks).';
		document.getElementById("videoThumbnail"+(videoMultiple)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple])+"/mqdefault.jpg";
		document.getElementById("videoThumbnail"+(videoMultiple+1)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple+1])+"/mqdefault.jpg";
		document.getElementById("videoThumbnail"+(videoMultiple+2)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple+2])+"/mqdefault.jpg";
		
		var inputYTLink = "https://www.youtube.com/watch?v=yJDRop2ocFo";
		var vidWidth=$("#responsiveVideoFrame").width();
		var vidHeight=(vidWidth*0.5625);
		
		var EditIn='.json_encode($EditInPoints).';
		var EditOut='.json_encode($EditOutPoints).';
		var title='.json_encode($videoTitle).';
		
		function initiateVideoPlayer(videoNumber){
			inputYTLink = OriginalLink[videoNumber];
			var vidWidth=$("#videoThumbnail"+videoNumber).width();
			var vidHeight=(vidWidth*0.5625);
			document.getElementById("videoThumbnail"+videoNumber).style.display="none";
			document.getElementById("responsiveVideoFrame"+videoNumber).style.display="";
			
		    jwplayer("videoPlaybackFrame"+videoNumber).setup({
		        file: inputYTLink,
		        width: vidWidth,
		        height: vidHeight,
				stretching: "fill",
		    });
		}
		function getYtShortcode(YtLink){
			var query;
			var vars;
			if (YtLink.indexOf("youtube") > -1){
			   query = YtLink.split( "?" );
		       vars = query[1].split("&");
			   
		       for (var i=0;i<vars.length;i++) {
		               var pair = vars[i].split("=");
		               if(pair[0] == "v"){query= pair[1];}
		       }
			return query;
			}
		}
		function nextPage(){
			videoMultiple=videoMultiple+3;
			document.getElementById("videoThumbnail"+(videoMultiple-3)).id="videoThumbnail"+(videoMultiple);
			document.getElementById("videoThumbnail1").id="videoThumbnail"+(videoMultiple+1);
			document.getElementById("videoThumbnail2").id="videoThumbnail"+(videoMultiple+2);
			document.getElementById("videoThumbnail"+(videoMultiple)).onclick="initiateVideoPlayer("+(videoMultiple)+")";
			document.getElementById("videoThumbnail"+(videoMultiple+1)).onclick="initiateVideoPlayer("+(videoMultiple+1)+")";
			document.getElementById("videoThumbnail"+(videoMultiple+2)).onclick="initiateVideoPlayer("+(videoMultiple+2)+")";
			
			document.getElementById("videoThumbnail"+(videoMultiple)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple])+"/mqdefault.jpg";
			document.getElementById("videoThumbnail"+(videoMultiple+1)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple+1])+"/mqdefault.jpg";
			document.getElementById("videoThumbnail"+(videoMultiple+2)).src="https://i.ytimg.com/vi/"+getYtShortcode(OriginalLink[videoMultiple+2])+"/mqdefault.jpg";
			
			document.getElementById("video-title"+(videoMultiple-3)).id="video-title"+(videoMultiple);
			document.getElementById("video-title1").id="video-title"+(videoMultiple+1);
			document.getElementById("video-title2").id="video-title"+(videoMultiple+2);
			document.getElementById("video-title"+(videoMultiple)).innerHTML="<h3>"+title[videoMultiple]+"</h3>";
			document.getElementById("video-title"+(videoMultiple+1)).innerHTML="<h3>"+title[videoMultiple+1]+"</h3>";
			document.getElementById("video-title"+(videoMultiple+2)).innerHTML="<h3>"+title[videoMultiple+2]+"</h3>";
			
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
}

// $lastEntry = mysqli_insert_id();
// echo 'stuff stuff '.$lastEntry;
// echo 'stuff stuff stuff '.$test;

  mysqli_close($conn);
die();
}
?>