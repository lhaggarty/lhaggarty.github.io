<!DOCTYPE html>
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
	            <li class="active"><a href="index.html">Home</a></li>
				<li><a href="feed.html">Feed</a></li>
				<li><a href="sign-up.html">Sign Up</a></li>
				
				<li><a href="potatoes-to-cut.html">New YouTube Videos</a></li>
	            <li><a href="about.html">About &amp; Contact</a></li>
				<li><a href="but_why.html">Tell Me More</a></li>
	        </div><!--/.nav-collapse -->
	      </div>
	    
	</div>
			
				<div class="row">
					<div class="col-md-5">
						<div class="intro-message" >
							
							<h3>
								Try the tool and share your edits!
							</h3>
						</div>
					</div>
				</div>
				
			<div class="row col-md-offset-3" style="padding-top:1%;padding-left:0.5%">
			 	<div id="videoPlaybackFrame"></div>
			</div>
			<script>
			
			var ProgressBarBefore;
			var ProgressBarDuring;
			var ProgressBarAfter;
			var userEditCounter = 1;
			var inPoint = '.$videoStart.';
			var outPoint = '.$videoStop.';
			var vidDuration;
			var videoLoadSwitch = 5;
			
			var shortYTLink;
			var tempOutputYoutubeLink;
			var inputYTLink = "'.$ytLink.'";
			
		    jwplayer("videoPlaybackFrame").setup({
		        file: inputYTLink,
		        width: 643,
		        height: 362,
		    });
			
			// if (matchMedia("only screen and (max-width: 650px)").matches) {
// 			    jwplayer().load([{width: 960,height: 540}]);
// 			};
			
			
			function playPauseVideo(){
			jwplayer("videoPlaybackFrame").play();
			if (jwplayer("videoPlaybackFrame").getState()=="PLAYING"){
				document.getElementById("playPauseSpan").className="glyphicon glyphicon-play";
			} else if (jwplayer("videoPlaybackFrame").getState()=="PAUSED" || jwplayer("videoPlaybackFrame").getState()=="BUFFERING"){
				document.getElementById("playPauseSpan").className="glyphicon glyphicon-pause";
			}
			};
			
			jwplayer("videoPlaybackFrame").onTime(function (event){
				var realVal = event.position;
				vidDuration = jwplayer("videoPlaybackFrame").getDuration();
				var videoProgress;
				
				ProgressBarBefore = ('.$videoStart.'/vidDuration);
				ProgressBarBefore = ProgressBarBefore*100;
				ProgressBarBefore = ProgressBarBefore.toPrecision(2);
				document.getElementById("preInVis").style.width =(ProgressBarBefore+"%");
				
				if (realVal < inPoint || realVal > outPoint){
					jwplayer("videoPlaybackFrame").seek(inPoint);
				}
				
				if (userEditCounter==1){
					ProgressBarDuring = ((realVal-inPoint)/vidDuration);
					ProgressBarDuring = ProgressBarDuring*100;
					ProgressBarDuring = ProgressBarDuring.toPrecision(2);
					document.getElementById("editVis").style.width =(ProgressBarDuring+"%");
					
				}
			});
			</script>
		<div class="row">
		
		<div class="col-md-6 col-md-offset-3" style="padding-top: 1%; padding-right:5.1%" id="inputRowOne"> 
		<form role="form" action="linkBoi.php" method="get">
			<div class="form-group">
				
		    <label for="InputYouTubeLink" >Enter YouTube Video Link Here</label>
		    <input type="text" class="form-control commentarea" name="InputYouTubeLink" id="InputYouTubeLink" placeholder="www.youtube.com..." >
				</div></div>
				<input type="text" name="hotPotatoLink" value="'.$html.'" id="hotPotatoLink" style="display:none"/>
				<input type="text" name="ytVidCode" value="'.$ytLink.'" id="ytVidCode" style="display:none"/>
				<input type="text" name="InTimeCode" value="'.$videoStart.'" id="InTimeCode" style="display:none">
				<input type="text" name="OutTimeCode" value="'.$videoStop.'" id="OutTimeCode" style="display:none"/>
				<input type="submit" class="button" name="createLink" id="createLink" style="display:none"/>
			</form>
		</div>
		
		
		<div class="row">
		<div class="col-md-6 col-md-offset-3" style="padding-right:5.1%">
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
				<div class="col-md-6 col-md-offset-3" style="padding-top: 1%; padding-right:5.5%">
				
				<div class = "row">
						<div class="well" style="" id="OutputYouTubeLink">http://localhost/hotpotatome/single_edits/'.$html.'</div>
				</div>
				<form action="linkBoi.php" method="get"> 
			<div class ="row" style="" id="outputButtons">
			<input type="text" name="hotPotatoLink" value="'.$html.'" id="hotPotatoLink" style="display:none"/>
					<button type="button" class="btn btn-default" name="openLink" id="openLink">
						<span class="glyphicon glyphicon-hand-up" aria-hidden="true"> </span><span> Open Link</span></button>
					<button type="button" class="btn btn-default" id="selectAllButton" onclick="selectText(OutputYouTubeLink)" style="display:none">
						<span class="glyphicon glyphicon-hand-up" aria-hidden="true"> </span><span> Select Link</span></button>
					<button type="button" class="btn btn-default" id="backToTool" name="backToTool">
					<span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
						<span> Reset</span>
					</button>
					<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAlt" aria-expanded="false" aria-controls="collapseAlt">
						<span class="glyphicon glyphicon-sort" aria-hidden="true"> </span>
						<span> Embed Link</span>
					</button>
				<div class="collapse" id="collapseAlt" style="padding-top:1%">
					<div class="well" id="collapseAltLink">&lt;iframe width=&quot;662&quot; height=&quot;450&quot; src=&quot;http://gethotpotato.me/single_edits/'.$html.'&quot; style=&quot;position: relative; top: -94px; left: -24px; overflow: hidden&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;</div>
				</div>
				</form>
			</div>
			
			<script>
			document.getElementById("InputYouTubeLink").style.display="none";
				$(document).ready(function() {
				    $(".commentarea").keydown(function(event) {
				        if (event.keyCode == 13) {
							initiateLiveVideoPlayer();
							//this.form.submit();
				            return false;
				         }
				    });
				});
			
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
  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

  ga("create", "UA-57874990-4", "auto");
  ga("send", "pageview");

</script>
</html>