<?php

checkDb();

function checkDb(){
	
$conn = mysqli_connect('141.117.161.98','leonhaggarty','mdm123','hotpotato');
if (mysqli_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// mysqli_query($conn,"SELECT * FROM edits");
// $test=mysqli_query($conn,"SELECT * FROM edits ORDER BY id DESC LIMIT 1");
// $query = mysqli_query($conn,"SELECT id,OutputLink FROM edits WHERE MAX(id) LIKE 'qs1Nm.html'");
$query = mysqli_query($conn,"SELECT * FROM edits WHERE PostToFeed=1 ORDER BY id DESC");
if ($query==""){
	echo "nothing";
}
else{
	// $OriginalLinks=array();
// 	$EditInPoints[];
// 	$EditOutPoints[];
$i=0;
	while ($obj=mysqli_fetch_object($query)){
		$OutputLink[$i]= $obj->OutputLink;
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
			<title>Hot Potato Edit Feed</title>
			<meta charset="UTF-8">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="http://content.jwplatform.com/libraries/FxXAImPG.js"></script>
			<script type="text/javascript" src="js/jquery.zclip.js"></script>
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
						
    						<li role="presentation"><a href="original-youtube-video-feed.php"><img src="css/find-video-black-resize.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"><img src="css/find-video-white-resize.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:1px"> Uncut Videos</a></li>
						
    		  	            <!-- <li role="presentation"><a href="editor.php"><img src="css/cut-video-image-black.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"> Editor</a></li> -->
						
    		  				<li role="presentation" class="active"><a href="feed.php"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
    		  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
				
    		  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
		  				
    		  	        </div><!--/.nav-collapse -->
    		  	      </div>
			    
			</div>
			<div class="video-part" style="padding-bottom:20px">
				<div class="row" style="padding-top:30px">
					<div class="col-md-12" id="hpVideoFeedIntro">
					<div class="col-md-6 col-md-offset-3" style="">
						<div id="video-title0" style="text-align:center">
							<h3>'.$videoTitle[0].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame0" onmouseover="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame0"></div>
				</div>
				<div class="col-sm-7 noLeftPadding">
				<div class="well well-sm" id="outputLink0" style="color: #000;text-align:center">www.hotpotato.me/edits/'.$OutputLink[0].'</div></div>
				<!-- <button type="button" class="btn btn-default" id="copy-button">
				<span class="glyphicon glyphicon-link" aria-hidden="true"> </span><span id="copy-button-text"> Double Click To Copy</span></button> -->
				<button type="button" class="btn btn-default bg-dark btn-mod" id="openLink0" onclick="openIndividualVideoPage(this.id)">
					<span class="glyphicon glyphicon-file" aria-hidden="true"></span><span> Open</span>
				</button>
			</div></div>
		</div>
			
			
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title1" style="text-align:center">
							<h3>'.$videoTitle[1].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3">
					
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame1" onmouseover="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame1"></div>
				</div>
				<div class="col-sm-7 noLeftPadding">
				<div class="well well-sm" id="outputLink1" style="color: #000;text-align:center">www.hotpotato.me/edits/'.$OutputLink[1].'</div></div>
				<!-- <button type="button" class="btn btn-default" id="copy-button">
				<span class="glyphicon glyphicon-link" aria-hidden="true"> </span><span id="copy-button-text"> Double Click To Copy</span></button> -->
				<button type="button" class="btn btn-default bg-dark btn-mod" id="openLink1" onclick="openIndividualVideoPage(this.id)">
					<span class="glyphicon glyphicon-file" aria-hidden="true"></span><span> Open</span>
				</button>
			</div></div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
						<div id="video-title2" style="text-align:center">
							<h3>'.$videoTitle[2].'</h3>
						</div>
					</div>
				
				<div class="col-md-6 col-md-offset-3" >
					
					<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame2" onmouseover="changeCurrentVideo(this.id)" onclick="changeCurrentVideoClick()">
					<div id="videoPlaybackFrame2"></div>
				</div>
				<div class="col-sm-7 noLeftPadding">
				<div class="well well-sm" id="outputLink2" style="color: #000;text-align:center">www.hotpotato.me/edits/'.$OutputLink[2].'</div></div>
				<!-- <button type="button" class="btn btn-default" id="copy-button">
				<span class="glyphicon glyphicon-link" aria-hidden="true"> </span><span id="copy-button-text"> Double Click To Copy</span></button> -->
				<button type="button" class="btn btn-default bg-dark btn-mod" id="openLink2" onclick="openIndividualVideoPage(this.id)">
					<span class="glyphicon glyphicon-file" aria-hidden="true"></span><span> Open</span>
				</button>
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
	<div id="data-dump-section" style="display:none">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
			
			<div class="well" id="copyText" style="color: #000"></div>
			</div>
		</div>
	</div>		
		<script>
		var videoMultiple=0;
		var OriginalLink='.json_encode($OriginalLinks).';
		var OutputLink='.json_encode($OutputLink).';
		
		var inputYTLink = "https://www.youtube.com/watch?v=yJDRop2ocFo";
		var vidWidth=$("#responsiveVideoFrame").width();
		var vidHeight=(vidWidth*0.5625);
		
		var inPoint='.json_encode($EditInPoints).';
		var outPoint='.json_encode($EditOutPoints).';
		var title='.json_encode($videoTitle).';
		var vidWidth=$("#responsiveVideoFrame"+videoMultiple).width();
		var vidHeight=(vidWidth*0.5625);
		var currentVid;
		
		
		initiateVideoPlayer();
		function initiateVideoPlayer(){
			
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
			jwplayer("videoPlaybackFrame"+currentVid).onPlay(function (event){
			
				jwplayer("videoPlaybackFrame"+currentVid).seek(inPoint[currentVid]);
			});
			jwplayer("videoPlaybackFrame"+currentVid).onTime(function (event){
				var realVal = event.position;
				relativePos = realVal - inPoint[currentVid];
			
				if (realVal > outPoint[currentVid]){
					jwplayer("videoPlaybackFrame"+currentVid).seek(inPoint[currentVid]);
				}
				// ProgressBar = (relativePos/editEnd);
	// 			ProgressBar = ProgressBar*100;
	// 			ProgressBar = ProgressBar.toPrecision(2);
	//
	// 			document.getElementById("progressBarVis").style.width =(ProgressBar+"%");
			});
		}
		
		$(document).ready(function(){				
		    $("button#copy-button").zclip({
		        path:"js/ZeroClipboard.swf",
		        copy:document.getElementById("copyText").innerHTML,
				afterCopy:function(){
					setInterval(function(){myTimer()},300);
					function myTimer() {
					document.getElementById("copy-button-text").innerHTML=" Copied To Clipboard";
					
					}
				}
		    });
		});
		function openIndividualVideoPage(currentElementId){
			var currentVidNumber;
			currentVidNumber=currentElementId.split("openLink");
			if (currentVid!=currentVidNumber[1]){	
				currentVid=currentVidNumber[1];
			
			}
			window.location="http://www.hotpotato.me/edits/"+OutputLink[currentVid];
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
		function previousPage(){
			videoMultiple=videoMultiple-3;
			for (var i=(videoMultiple);i<(videoMultiple+3);i++){
				var j=i+3;
				document.getElementById("video-title"+(j)).id="video-title"+(i);
				document.getElementById("video-title"+(i)).innerHTML="<h3>"+title[i]+"</h3>";
				document.getElementById("responsiveVideoFrame"+(j)).id="responsiveVideoFrame"+(i);
				jwplayer("videoPlaybackFrame"+j).remove();
				document.getElementById("videoPlaybackFrame"+(j)).id="videoPlaybackFrame"+(i);
				document.getElementById("openLink"+(j)).id="openLink"+(i);
				
				document.getElementById("outputLink"+j).id="outputLink"+i;
				document.getElementById("outputLink"+i).innerHTML="www.hotpotato.me/edits/"+OutputLink[i];
				
				j++;
			    jwplayer("videoPlaybackFrame"+i).setup({
			        file: OriginalLink[i],
			        width: vidWidth,
			        height: vidHeight,
					stretching: "fill",
			    });
			}
			
			
			// document.getElementById("video-title"+(videoMultiple+3)).id="video-title"+(videoMultiple);
// 			document.getElementById("video-title"+(videoMultiple-2)).id="video-title"+(videoMultiple+1);
// 			document.getElementById("video-title"+(videoMultiple-1)).id="video-title"+(videoMultiple+2);
// 			document.getElementById("video-title"+(videoMultiple)).innerHTML="<h3>"+title[videoMultiple]+"</h3>";
// 			document.getElementById("video-title"+(videoMultiple+1)).innerHTML="<h3>"+title[videoMultiple+1]+"</h3>";
// 			document.getElementById("video-title"+(videoMultiple+2)).innerHTML="<h3>"+title[videoMultiple+2]+"</h3>";
// 			document.getElementById("video-title"+(videoMultiple+3)).innerHTML="<h3>"+title[videoMultiple+3]+"</h3>";
			
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
				jwplayer("videoPlaybackFrame"+j).remove();
				document.getElementById("videoPlaybackFrame"+(j)).id="videoPlaybackFrame"+(i);
				document.getElementById("openLink"+(j)).id="openLink"+(i);
				
				document.getElementById("outputLink"+j).id="outputLink"+i;
				document.getElementById("outputLink"+i).innerHTML="www.hotpotato.me/edits/"+OutputLink[i];
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
}

// $lastEntry = mysqli_insert_id();
// echo 'stuff stuff '.$lastEntry;
// echo 'stuff stuff stuff '.$test;

  mysqli_close($conn);
die();
}
?>