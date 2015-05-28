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
	        height: 362,
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
// header('Location: http://gethotpotato.me/single_edits/'.$html);
// die();
echo '<!DOCTYPE html>
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
			var outPoint = '.$videoEnd.';
			var vidDuration;
			var videoLoadSwitch = 5;
			
			var shortYTLink;
			var tempOutputYoutubeLink;
			var inputYTLink = '.$ytLink.';
			
		    jwplayer("videoPlaybackFrame").setup({
		        file: inputYTLink,
		        width: 643,
		        height: 362,
		    });
			
			// if (matchMedia("only screen and (max-width: 650px)").matches) {
// 			    jwplayer().load([{width: 960,height: 540}]);
// 			};
			vidDuration = jwplayer("videoPlaybackFrame").getDuration();
			ProgressBarBefore = ('.$videoStart.'/vidDuration);
			ProgressBarBefore = ProgressBarBefore*100;
			ProgressBarBefore = ProgressBarBefore.toPrecision(2);
			document.getElementById("preInVis").style.width =(ProgressBarBefore+"%");
			
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
				<input type="text" name="ytVidCode" id="ytVidCode" style="display:none"/>
				<input type="text" name="InTimeCode" id="InTimeCode" style="display:none">
				<input type="text" name="OutTimeCode" id="OutTimeCode" style="display:none"/>
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
						<div class="well" style="" id="OutputYouTubeLink" >'.$html.'</div>
				</div>
				
			<div class ="row" style="" id="outputButtons">
					<button type="button" class="btn btn-default" id="selectAllButton" onclick="selectText("OutputYouTubeLink")">
						<span class="glyphicon glyphicon-hand-up" aria-hidden="true"> </span><span> Select Link</span></button>
					<button type="button" class="btn btn-default" id="backButton" onclick="backFunction()">
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
			</div>
			
			<script>
				$(document).ready(function() {
				    $(".commentarea").keydown(function(event) {
				        if (event.keyCode == 13) {
							initiateLiveVideoPlayer();
							//this.form.submit();
				            return false;
				         }
				    });
				});
				
				function reloadVideoInput(){
					document.getElementById("InputYouTubeLink").value="";
					document.getElementById("inputRowOne").style.display="";
					document.getElementById("InputYouTubeLink").style.display="";
					document.getElementById("changeVideoButton").style.display="none";
					document.getElementById("videoTimeline").style.display="none";
					document.getElementById("videoInPoint").disabled=true;
					document.getElementById("videoOutPoint").disabled=true;
					document.getElementById("submitEdit").style.display="none";
					document.getElementById("previewEdit").style.display="";
					document.getElementById("previewEdit").disabled=true;
					inPoint = 0;
					outPoint = 0;
					videoLoadSwitch=1;
				}
				
			function submitEdit(){
				document.getElementById("OutputYouTubeLink").style.display ="";
				
				$( "#OutputYouTubeLink" ).html('.$html.');
				$("#collapseAltLink").html("<iframe width="662" height="450" src="http://gethotpotato.me/single_edits/'.$html.'" style="position: relative; top: -94px; left: -24px; overflow: hidden" frameborder="0" allowfullscreen=</iframe>");
				
				document.getElementById("createLink").click();
				$("form").slideUp();
				
				//document.getElementById("videoPlayback").style.display ="";
				document.getElementById("outputButtons").style.display ="";
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
				$("form").slideDown();
				<?php
				header("Location: http://gethotpotato.me");
				die();
				?>
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
</html>';
}
//
//$url = new simpleUrl('https://www.hotpotato.me');
//
// echo $url;
//
// echo $_SERVER['REQUEST_URI'];

?>