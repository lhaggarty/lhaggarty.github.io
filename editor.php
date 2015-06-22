<!DOCTYPE html>
<html>
		<head>
			<title>Hot Potato Tool</title>
			<meta name="description" content="Hot Potato - The Online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
	        
	        
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			
			<script src="https://apis.google.com/js/client.js"></script>
			<script src="http://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
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
		<!-- 
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		  Button with data-target
		</button>
		<div class="collapse" id="collapseExample">
		  <div class="well">
		    ...
		  </div>
		</div>
			-->
<body>
	<div class="container-fluid">
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding-left:4.7%">
	      
	        <div class="navbar-header" style="height:30px">
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
						
  		  	            <li role="presentation" class="active"><a href="editor.php"><img src="css/cut-video-image-black.png" class="blackImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"><img src="css/cut-video-image-white.png" class="whiteImage" alt="Hot Potato" width="35.24" height="23.5" style="padding-top:2px"> Editor</a></li>
						
  		  				<li role="presentation"><a href="feed.html"><img src="css/share-image-black.png" class="blackImage" alt="Hot Potato" width="55" height="21" style=""><img src="css/share-image-white.png" class="whiteImage" alt="Hot Potato" width="55" height="21" style=""> Feed</a></li>
  		  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
				
  		  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
		  				
  		  	        </div><!--/.nav-collapse -->
  		  	      </div>
	    
	</div>
	<div class="video-part">		
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="intro-message" >
							
							<h3>
								
							</h3>
						</div>
					</div>
				
			<div class="col-md-6 col-md-offset-3" style="padding-top:30px">
				<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame">
			 	<div id="videoPlaybackFrame"></div></div>
			</div>
			</div>
			<script>
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			})
			var ProgressBarBefore;
			var ProgressBarDuring;
			var ProgressBarAfter;
			var userEditCounter = 0;
			var inPoint = 0;
			var outPoint;
			var vidDuration;
			var videoLoadSwitch = 0;
			var videoProgress;
			
			var shortYTLink;
			var tempOutputYoutubeLink;
			var inputYTLink = "https://www.youtube.com/watch?v=yJDRop2ocFo";
			var vidWidth=$("#responsiveVideoFrame").width();
			var vidHeight=(vidWidth*0.5625);
			
			
		    jwplayer("videoPlaybackFrame").setup({
		        file: inputYTLink,
		        width: vidWidth,
		        height: vidHeight,
				stretching: "fill",
				image: "css/video-demo-thumbnail.jpg",
		    });
			
			// if (matchMedia('only screen and (max-width: 650px)').matches) {
			//     jwplayer().load([{width: 960,height: 540}]);
			// };
			
			jwplayer("videoPlaybackFrame").onPlay(function() {
				document.getElementById('videoTimeline').style.display="";
			});
			
			function initiateLiveVideoPlayer(){
				
				if ($( '#InputYouTubeLink' ).val() != ""){
					getQueryVariable($( '#InputYouTubeLink' ).val());
					inputYTLink = ( "https://www.youtube.com/watch?v=" + shortYTLink);
					document.getElementById('ytVidCode').value=shortYTLink;
					jwplayer().load([{file:inputYTLink}]);
				}
				else {
					shortYTLink = "yJDRop2ocFo";
				}
				
				videoLoadSwitch=1;
				document.getElementById('loadVideoButton').style.display ="none";
				document.getElementById("playPauseSpan").className="glyphicon glyphicon-pause";
				document.getElementById('playPauseButton').style.display ="";
				document.getElementById('videoTimeline').style.display="";
				document.getElementById('editVis').style.width ="";
				document.getElementById('postOutVis').style.width ="";
				document.getElementById('inputRowOne').style.display="none";
				document.getElementById('changeVideoButton').style.display="";
				document.getElementById('videoInPoint').disabled=false;
				userEditCounter=0;
				jwplayer("videoPlaybackFrame").play();
			};
			
			function playPauseVideo(){
			jwplayer("videoPlaybackFrame").play();
			if (jwplayer("videoPlaybackFrame").getState()=="PLAYING"){
				document.getElementById("playPauseSpan").className="glyphicon glyphicon-play";
			} else if (jwplayer("videoPlaybackFrame").getState()=="PAUSED" || jwplayer("videoPlaybackFrame").getState()=="BUFFERING"){
				document.getElementById("playPauseSpan").className="glyphicon glyphicon-pause";
			}
			};
			function videoInPoint(){
				inPoint = jwplayer("videoPlaybackFrame").getPosition();
				videoLoadSwitch=1;
				userEditCounter=1;
				document.getElementById("InTimeCode").value=inPoint;
				document.getElementById('videoOutPoint').style.display="";
				document.getElementById('videoInPoint').style.display="none";
				document.getElementById('submitEdit').style.display="none";
				document.getElementById('previewEdit').style.display="";
			};
			
			function videoOutPoint(){
				outPoint= jwplayer("videoPlaybackFrame").getPosition();
				videoLoadSwitch=1;
				userEditCounter=2;
				document.getElementById("OutTimeCode").value=outPoint;
				document.getElementById('previewEdit').disabled=false;
				
				document.getElementById('videoOutPoint').style.display="none";
				document.getElementById('videoInPoint').style.display="";
			};
			
			
			jwplayer("videoPlaybackFrame").onTime(function (event){
				var realVal = event.position;
				
				vidDuration = jwplayer("videoPlaybackFrame").getDuration();
				
				if (userEditCounter==0){
				ProgressBarBefore = (realVal/vidDuration);
				ProgressBarBefore = ProgressBarBefore*100;
				ProgressBarBefore = ProgressBarBefore.toPrecision(2);
				
				document.getElementById('preInVis').style.width =(ProgressBarBefore+"%");
				
				} else if (userEditCounter==1){
					ProgressBarBefore = ((inPoint)/vidDuration);
					ProgressBarBefore = ProgressBarBefore*100;
					ProgressBarBefore = ProgressBarBefore.toPrecision(2);
					document.getElementById('preInVis').style.width =(ProgressBarBefore+"%");
					
					ProgressBarDuring = ((realVal-inPoint)/vidDuration);
					ProgressBarDuring = ProgressBarDuring*100;
					ProgressBarDuring = ProgressBarDuring.toPrecision(2);
					document.getElementById('editVis').style.width =(ProgressBarDuring+"%");
					
					document.getElementById('postOutVis').style.width ="";
				} else if (userEditCounter==2){
				ProgressBarDuring = ((outPoint-inPoint)/vidDuration);
				ProgressBarDuring = ProgressBarDuring*100;
				ProgressBarDuring = ProgressBarDuring.toPrecision(2);
				document.getElementById('editVis').style.width =(ProgressBarDuring+"%");
				
				ProgressBarAfter = ((realVal-outPoint)/vidDuration);
				ProgressBarAfter = ProgressBarAfter*100;
				ProgressBarAfter = ProgressBarAfter.toPrecision(2);
				//$('#OutputYouTubeLink').html(progressBar1);
				document.getElementById('postOutVis').style.width =(ProgressBarAfter+"%");
				}
			
			if (videoLoadSwitch==5){
			if (realVal < inPoint || realVal > outPoint){
				jwplayer("videoPlaybackFrame").seek(inPoint);
				
			}
			}
			});
			</script>
		
		
  		<div class="row">
  		<div class="col-md-6 col-md-offset-3" style="">
  			<div class="progress" id="videoTimeline" style="display:none">	  
  		  <div class="progress-bar progress-bar-info" id="preInVis" role="progressbar" style="">
  		</div>	
  		  <div class="progress-bar progress-bar-warning progress-bar-striped" id="editVis" role="progressbar" style=""> NEW VIDEO</div>
    		  <div class="progress-bar progress-bar-info" id="postOutVis" role="progressbar" style="">
    			</div>
  		</div>
  		  </div>
  	  </div>
	  	<script>
	  		var OAUTH2_SCOPES = [
	  		  'https://www.googleapis.com/auth/youtube'
	  		];
	  		function checkAuth() {
	  		  gapi.client.setApiKey('AIzaSyACLrao747cjeAEyK_xBMZNQKtiE2Cyo8Y');
	  		  gapi.auth.authorize({
	  		    client_id: '321851057404-2pop70e54shcdv8kpcfud8fmaubo486v.apps.googleusercontent.com',
	  		    scope: OAUTH2_SCOPES,
	  		    immediate: true
	  		  });
	  		 loadAPIClientInterfaces();
	  		}
	  		function handleAuthResult(authResult) {
	  		  if (authResult && !authResult.error) {
	  		    // Authorization was successful. Hide authorization prompts and show
	  		    // content that should be visible after authorization succeeds.
	  		    $('.pre-auth').hide();
	  		    $('.post-auth').show();
	  		    loadAPIClientInterfaces();
			
	  		  } else {
	  		  }
	  	  }
	  	  // Load the client interfaces for the YouTube Analytics and Data APIs, which
	  	  // are required to use the Google APIs JS client. More info is available at
	  	  // http://code.google.com/p/google-api-javascript-client/wiki/GettingStarted#Loading_the_Client
	  	  function loadAPIClientInterfaces() {
	  	    gapi.client.load('youtube', 'v3', function() {
	  	      handleAPILoaded();
	  	    });
	  	  }
		
	  		// After the API loads, call a function to enable the search box.
	  		function handleAPILoaded() {
	  		  $('#createLink').attr('disabled', false);
		  
	  		}

	  		// Search for a specified string.
	  		function getYouTubeVideoSearchData() {
	  		  var searchTerm = $('#InputYouTubeLink').val();
		  
	  		  var request = gapi.client.youtube.search.list({
	  			type: 'video',
	  			videoSyndicated: 'true',
	  			q: searchTerm,
	  			part: 'snippet',
	  		  });
	  		  request.execute(function(response) {
	  		    var str = JSON.stringify(response.result);
	  		    $('#search-raw-data').html('<pre>' + str + '</pre>');
			
	  		  });
	  		  setTimeout(function(){turnYouTubeDataIntoPresentableInformation($('#search-raw-data').html())},300);
	  		}
			
			function getQueryVariable(userInput) {
				var query;
				var vars;
				if (userInput.indexOf("youtube") > -1){
				   query = userInput.split( "?" );
			       vars = query[1].split("&");
			       for (var i=0;i<vars.length;i++) {
			               var pair = vars[i].split("=");
			               if(pair[0] == "v"){return pair[1];}
			       }
				   shortYTLink = query[1];
			   }else if (userInput.indexOf("youtu.be") > -1){
			   		vars = userInput.split( ".be/" );
					query = vars[1].split("?");
					shortYTLink = query[1];
			   }else {
				   getYouTubeVideoSearchData();
				   // alert("YouTube Link Error.  Preferably enter a YouTube link that starts with 'youtube.com/...' or 'youtu.be/...'");
			   }
			}
	  		function turnYouTubeDataIntoPresentableInformation(searchResult) {
	  			var queryMatch = searchResult.match(/videoId/g);
	  			var maxQuery = queryMatch.length;
	  			var query;
	  			var value;
				
	  			query = searchResult.split("videoId");
	  			value = query[1].substr(3,11);
	  			document.getElementById("videoLinkArray").value=('"'+value+'"');
	  			document.getElementById("videoThumbnail"+1).src=("https://i.ytimg.com/vi/"+value+"/mqdefault.jpg");
	  			// var value[maxQuery];
			
	  		    for (var i=2;i<=maxQuery;i++) {
	  				query[i].split("videoId");
	  				value = query[i].substr(3,11);
	  				document.getElementById("videoLinkArray").value=($("#videoLinkArray").val()+', "'+value+'"');
	  				document.getElementById("videoThumbnail"+[i]).src=("https://i.ytimg.com/vi/"+value+"/mqdefault.jpg");
	  		    }
	  			query = searchResult.split("title");
	    			value = query[1].substr(3,65);
	  			value = value.split('"');
	  			document.getElementById("videoTitle"+[1]).innerHTML=(value[0]);
	     		    for (var i=2;i<=maxQuery;i++) {
	  				query[i].split("title");
	     				value = query[i].substr(3,65);
	  				value = value.split('"');
	     				document.getElementById("videoTitle"+[i]).innerHTML=(value[0]);
	     		    }
	  			document.getElementById("resultListing").style.display="";  
	  			  // $('#search-results').html(value);
	  		}
			assignSearchVideoPlayback(videoSearchNumber){
				videoLinkArray=document.getElementById("videoLinkArray").value;
				shortlink=videoLinkArray[videoSearchNumber];
				initiateLiveVideoPlayer();
			}
	  	</script>
		<div class="row">
		<div class="col-md-6 col-md-offset-3" style="height:62.5px" id="inputRowOne"> 
		<form role="form" action="linkBoi.php" method="get">
			<div class="form-group">
		    <label for="InputYouTubeLink">YouTube Video</label>
		    <input type="text" class="form-control commentarea" name="InputYouTubeLink" id="InputYouTubeLink" onclick='checkAuth()' placeholder="Enter a search term OR a youtube.com/watch.. link">
			<input id="videoLinkArray" type="text" style="display:none"/>
				</div>
				<input type="text" name="ytVidCode" id="ytVidCode" value="yJDRop2ocFo" style="display:none"/>
				<input type="text" name="InTimeCode" id="InTimeCode" style="display:none">
				<input type="text" name="OutTimeCode" id="OutTimeCode" style="display:none"/>
				<input type="submit" class="button" name="createLink" id="createLink" style="display:none"/>
			</form>
			<div class="well" id="search-raw-data" style="display:none"></div>
		</div>
	</div>
		<div class="row" id="resultListing" style="display:none">
		<div class="col-md-6 col-md-offset-3" style="padding-top:0.5%;">
		<table class="table table-hover">
		<tr onclick="assignSearchVideoPlayback(1)">
			<td>
				<img id="videoThumbnail1" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" width="185" height="104"/>
			</td>
			
			<td>
				<h3 id="videoTitle1">Title</h3>
			</td>
		</tr>
		<tr onclick="assignSearchVideoPlayback(2)">
			<td>
				<img id="videoThumbnail2" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" width="185" height="104"/>
			</td>
			
			<td>
				<h3 id="videoTitle2">Title</h3>
			</td>
		</tr>
		<tr onclick="assignSearchVideoPlayback(3)">
			<td>
				<img id="videoThumbnail3" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" width="185" height="104"/>
			</td>
			
			<td>
				<h3 id="videoTitle3">Title</h3>
			</td>
		</tr>
		<tr onclick="assignSearchVideoPlayback(4)">
			<td>
				<img id="videoThumbnail4" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" width="185" height="104"/>
			</td>
			
			<td>
				<h3 id="videoTitle4">Title</h3>
			</td>
		</tr>
		<tr onclick="assignSearchVideoPlayback(5)">
			<td>
				<img id="videoThumbnail5" src="https://i.ytimg.com/vi/KlE--TWCsX0/mqdefault.jpg" width="185" height="104"/>
			</td>
			
			<td>
				<h3 id="videoTitle5">Title</h3>
			</td>
		</tr>
	</table>
		</div></div>
	</div>
		<div class="dashboard-part" style="padding-bottom:259px">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="videoPlayerButtons">
				<button type="button" class="btn btn-default" id="loadVideoButton" onclick="initiateLiveVideoPlayer();" data-toggle="tooltip" data-placement="bottom" data-delay="400" title="Click here, or press enter, when you have a video input">
					<span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
					<span> LOAD</span>
				</button>
				
				<button type="button" class="btn btn-default" id="playPauseButton" onclick="playPauseVideo();" style="display:none">
					<span class="glyphicon glyphicon-play" id="playPauseSpan" aria-hidden="true"> </span>
				</button>
				<button type="button" class="btn btn-default" id="videoInPoint" onclick="videoInPoint()" data-toggle="tooltip" data-placement="bottom" data-delay="400" title="Begin your edit" disabled>
					<img src="css/scissors-closed.png"  width="15.1" height="14">
					<span> CUT</span>
				</button>
				
				<button type="button" class="btn btn-default" id="videoOutPoint" onclick="videoOutPoint()" data-toggle="tooltip" data-placement="bottom" data-delay="400" title="End your edit" style="display:none">
					<img src="css/scissors-open.png" width="15.1" height="14">
					<span> CUT</span>
				</button>
				<button type="button" class="btn btn-default" id="previewEdit" onclick="previewEdit();" data-toggle="tooltip" data-placement="bottom" data-delay="450" title="Video will playback from the &quot;IN&quot; to the &quot;OUT&quot; time selected" disabled>
					<span class="glyphicon glyphicon-film" aria-hidden="true"> </span>
					<span> PREVIEW</span>
				</button>
				<button type="button" class="btn btn-default" id="submitEdit" onclick="submitEdit();" data-toggle="tooltip" data-placement="bottom" data-delay="450" title="Creates a web link of the video edit" style="display:none">
					<span class="glyphicon glyphicon-film" aria-hidden="true"> </span>
					<span> SUBMIT</span>
				</button>
			
			
			<button type="button" class="btn btn-default" id="changeVideoButton" onclick="reloadVideoInput()" data-toggle="tooltip" data-placement="bottom" data-delay="450" title="Change the video input source" style="display:none">
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"> </span>
					<span> Change Video</span>
				</button>	
			</div>
		</div>
		
				<div class ="row">
				<div class="col-md-6 col-md-offset-3" style="padding-top: 1%;"> 
						<div class="progress-bar progress-bar-warning progress-bar-striped active" id="outputLoadingBar" role="progressbar" style="width:100%;display:none">EXPORTING</div>
				</div></div>
				
			<div class ="row">
			<div class="col-md-6 col-md-offset-3" style="display: none;" id="outputButtons">
					<button type="button" class="btn btn-default" id="selectAllButton" onclick="selectText('OutputYouTubeLink')">
						<span class="glyphicon glyphicon-hand-up" aria-hidden="true"> </span><span> Select Link</span></button>
					<button type="button" class="btn btn-default" id="backButton" onclick="backFunction()">
					<span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
						<span> Cut Again</span>
					</button>
					<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAlt" aria-expanded="false" aria-controls="collapseExample">
						<span class="glyphicon glyphicon-sort" aria-hidden="true"> </span>
						<span> Link Not Appearing?</span>
					</button>
				<div class="collapse" id="collapseAlt" style="padding-top:1%">
					<div class="well" id="collapseAltLink"></div>
				</div>
			</div></div>
		</div>
			<script>
				$(document).ready(function() {
				    $('.commentarea').keydown(function(event) {
				        if (event.keyCode == 13) {
							
							initiateLiveVideoPlayer();
							//this.form.submit();
				            return false;
				         }
				    });
				});
				
				function reloadVideoInput(){
					document.getElementById('InputYouTubeLink').value="";
					document.getElementById('inputRowOne').style.display="";
					document.getElementById('InputYouTubeLink').style.display="";
					document.getElementById('changeVideoButton').style.display="none";
					document.getElementById('videoTimeline').style.display="none";
					document.getElementById('videoInPoint').disabled=true;
					document.getElementById('videoOutPoint').disabled=true;
					document.getElementById('submitEdit').style.display="none";
					document.getElementById('previewEdit').style.display="";
					document.getElementById('previewEdit').disabled=true;
					inPoint = 0;
					outPoint = 0;
					videoLoadSwitch=1;
					jwplayer("videoPlaybackFrame").play();
				}
				
			
			
			function previewEdit(){
				document.getElementById('submitEdit').style.display="";
				document.getElementById('previewEdit').style.display="none";
				videoLoadSwitch=5;
				userEditCounter=1;
				document.getElementById('postOutVis').style.width="";
			}
			function submitEdit(){
				document.getElementById('outputLoadingBar').style.display ="";
				
				$('#collapseAltLink').html(inputYTLink);
				
				document.getElementById("createLink").click();
				$("form").slideUp();
				
				//document.getElementById('videoPlayback').style.display ="";
				document.getElementById('outputButtons').style.display ="";
			}
			</script>
			
			<script>
			function backFunction(){
				
				//document.getElementById('videoPlayback').style.display ="none";
				document.getElementById('outputButtons').style.display ="none";
				document.getElementById('outputLoadingBar').style.display ="";
				$("form").slideDown();
				
			}
			</script>
			<script type="text/javascript">
			function selectText( containerid ) {

			        var node = document.getElementById( containerid );

			        if ( document.selection ) {
			            var range = document.body.createTextRange();
			            range.moveToElementText( node  );
			            range.select();
			        } else if ( window.getSelection ) {
			            var range = document.createRange();
			            range.selectNodeContents( node );
			            window.getSelection().removeAllRanges();
			            window.getSelection().addRange( range );
			        }
			    };
			</script>
<img style="display:none" src="/css/hot-potato-functions-image.jpg" alt="" width="5" height="5" />
</div>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga("create", "UA-57874990-5", "auto");
  ga("send", "pageview");

</script>
</html> 
