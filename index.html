'<!DOCTYPE html>
<html>
		<head>
			<title>Hot Potato Tool</title>
			<meta name="description" content="Hot Potato - The Online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	        
	        
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			
			<!-- <script src="https://apis.google.com/js/client.js"></script>-->
			<script src="http://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
			
			
			
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
	            <li class="active"><a href="index.php">Home</a></li>
				<li><a href="feed.html">Feed</a></li>
				<li><a href="sign-up.html">Sign Up</a></li>
				
				<li><a href="potatoes-to-cut.html">New YouTube Videos</a></li>
	            <li><a href="about.html">About &amp; Contact</a></li>
				<li><a href="but_why.html">Tell Me More</a></li>
	        </div><!--/.nav-collapse -->
	      </div>
	    
	</div>
			
				<div class="row">
					<div class="col-md-4">
						<div class="intro-message" >
							
							<h3>
								Every video can be a Hot Potato
							</h3>
						</div>
					</div>
				
			<div class="col-md-6 col-md-offset-3" style="padding-top:0.75%">
			 	<div id="videoPlaybackFrame"></div>
			</div>
			</div>
			<script>
			
			var ProgressBarBefore;
			var ProgressBarDuring;
			var ProgressBarAfter;
			var userEditCounter = 0;
			var inPoint = 0;
			var outPoint;
			var vidDuration;
			var videoLoadSwitch = 0;
			
			var shortYTLink;
			var tempOutputYoutubeLink;
			var inputYTLink = "https://www.youtube.com/watch?v=yJDRop2ocFo";
			
		    jwplayer("videoPlaybackFrame").setup({
		        file: inputYTLink,
		        width: 643,
		        height: 362,
		    });
			
			if (matchMedia('only screen and (max-width: 650px)').matches) {
			    jwplayer().load([{width: 960,height: 540}]);
			};
			
			function initiateLiveVideoPlayer(){
				shortYTLink = getQueryVariable("v",$( '#InputYouTubeLink' ).val());
				inputYTLink = ( "https://www.youtube.com/watch?v=" + shortYTLink);
				document.getElementById('ytVidCode').value=shortYTLink;
			
				tempOutputYoutubeLink = ( "https://www.youtube.com/v/" + shortYTLink);
				videoLoadSwitch=1;
			    jwplayer().load([{file:inputYTLink}]);
			
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
				document.getElementById('videoOutPoint').disabled=false;
			};
			
			function videoOutPoint(){
				outPoint= jwplayer("videoPlaybackFrame").getPosition();
				videoLoadSwitch=1;
				userEditCounter=2;
				document.getElementById("OutTimeCode").value=outPoint;
				document.getElementById('previewEdit').disabled=false;
			};
			
			
			jwplayer("videoPlaybackFrame").onTime(function (event){
				var realVal = event.position;
				vidDuration = jwplayer("videoPlaybackFrame").getDuration();
				var videoProgress;
				if (videoLoadSwitch==5){
				if (realVal < inPoint || realVal > outPoint){
					jwplayer("videoPlaybackFrame").seek(inPoint);
					
				}
				}
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
			});
			</script>
		<div class="row">
		
		<div class="col-md-8 col-md-offset-3" style="padding-top: 1%; padding-right:21.75%" id="inputRowOne"> 
		<form role="form" action="linkBoi.php" method="get">
			<div class="form-group">
				
		    <label for="InputYouTubeLink" >Enter YouTube Video Link Here</label>
		    <input type="text" class="form-control commentarea" name="InputYouTubeLink" id="InputYouTubeLink" placeholder="www.youtube.com..." >
				</div>
				<input type="text" name="ytVidCode" id="ytVidCode" style="display:none"/>
				<input type="text" name="InTimeCode" id="InTimeCode" style="display:none">
				<input type="text" name="OutTimeCode" id="OutTimeCode" style="display:none"/>
				<input type="submit" class="button" name="createLink" id="createLink" style="display:none"/>
			</form>
		</div>
	</div>
		
		
		<div class="row">
		<div class="col-md-8 col-md-offset-3" style="padding-right:21.75%">
			<div class="progress" id="videoTimeline" style="display:none">	  
		  <div class="progress-bar progress-bar-info" id="preInVis" role="progressbar" style="">
		</div>	
		  <div class="progress-bar progress-bar-warning progress-bar-striped" id="editVis" role="progressbar" style="">
			</div>
  		  <div class="progress-bar progress-bar-info" id="postOutVis" role="progressbar" style="">
  			</div>
		</div>
		  </div>
	  </div>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-3" id="videoPlayerButtons" >
				<button type="button" class="btn btn-default btn-lg" id="loadVideoButton" onclick="initiateLiveVideoPlayer();">
					<span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
					<span> LOAD</span>
				</button>
				
				<button type="button" class="btn btn-default btn-lg" id="playPauseButton" onclick="playPauseVideo();" style="display:none">
					<span class="glyphicon glyphicon-play" id="playPauseSpan" aria-hidden="true"></span>
				</button>
				<button type="button" class="btn btn-default btn-lg" id="videoInPoint" onclick="videoInPoint()" disabled>
					<span class="glyphicon glyphicon-scissors" aria-hidden="true"> </span>
					<span> IN</span>
				</button>
				
				<button type="button" class="btn btn-default btn-lg" id="videoOutPoint" onclick="videoOutPoint();updateEditTimecode()" disabled>
					<span class="glyphicon glyphicon-scissors" aria-hidden="true"> </span>
					<span> OUT</span>
				</button>
				<button type="button" class="btn btn-default btn-lg" id="previewEdit" onclick="previewEdit();" disabled>
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					<span> PREVIEW</span>
				</button>
				<button type="button" class="btn btn-default btn-lg" id="submitEdit" onclick="submitEdit();" style="display:none">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					<span> SUBMIT</span>
				</button>
			
			
			<button type="button" class="btn btn-default btn-lg" id="changeVideoButton" onclick="reloadVideoInput()" style="display:none">
				<span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
					<span> Change Video</span>
				</button>
			
			</div>
		</div>
		
		
				<div class="col-md-6 col-md-offset-3" style="padding-top: 1%; padding-right:5.5%"> 
				
				<div class ="row" >
						<div class="progress-bar progress-bar-warning progress-bar-striped active" id="outputLoadingBar" role="progressbar" style="width:100%;display:none">EXPORTING
				</div>
				</div>
			<div class ="row" style="display: none;" id="outputButtons">
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
			</div>
			
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
				}
				
			
			function updateEditTimecode(){
				
				tempOutputYoutubeLink = ( "https://www.youtube.com/v/" + shortYTLink + '?start=' + inPoint + '&end=' + outPoint);
				
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
				
				$('#collapseAltLink').html(tempOutputYoutubeLink);
				
				document.getElementById("createLink").click();
				$("form").slideUp();
				
				//document.getElementById('videoPlayback').style.display ="";
				document.getElementById('outputButtons').style.display ="";
			}
			
			function getQueryVariable(name,url) {
				   var query = url.split( "?" );
			       var vars = query[1].split("&");
			       for (var i=0;i<vars.length;i++) {
			               var pair = vars[i].split("=");
			               if(pair[0] == name){return pair[1];}
			       }
			       return(query);
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

</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57874990-4', 'auto');
  ga('send', 'pageview');

</script>
</html> 
