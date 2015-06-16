<?php

// echo "hello world";
// include_once("http://localhost/hotpotatome/mysql_1edit_connect.php");

//$db = mysql_select_db('single_edits');
if($_GET){
    if(isset($_GET['createLink'])){
        createLink();
    }elseif (isset($_GET['openLink'])){
        openLink();
    }
	elseif (isset($_GET['backToTool'])){
	        backToTool();
	}
}

function openLink(){
	$html=$_GET['hotPotatoLink'];
	header('Location: http://www.hotpotato.me/single_edits/'.$html);
	die();
}

function backToTool(){
	header('Location: http://hotpotato.me');
	die();
}

function generateRandomStringFiveC($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function templateVideoHTML() {
	$ytLink = $_GET['InputYouTubeLink'];
	$videoStart = $_GET['InTimeCode'];
	$videoStop = $_GET['OutTimeCode'];
	$ytVidCode = $_GET['ytVidCode'];
	$cutLength = $videoStop-$videoStart;
	
	
	$html = '<!DOCTYPE html>
	<html>
		<head>
			<title>Hot Potato Edit</title>
			<meta name="description" content="Hot Potato - the online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" type="text/css" href="../css/style-outro.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="https://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="apple-touch-icon" sizes="57x57" href="../css/favicon/apple-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="../css/favicon/apple-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="../css/favicon/apple-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="css/favicon/apple-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="../css/favicon/apple-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="../css/favicon/apple-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="../css/favicon/apple-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="../css/favicon/apple-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="../css/favicon/apple-icon-180x180.png">
			<link rel="icon" type="image/png" sizes="192x192"  href="../css/favicon/android-icon-192x192.png">
			<link rel="icon" type="image/png" sizes="32x32" href="../css/favicon/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="../css/favicon/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="../css/favicon/favicon-16x16.png">
			<link rel="manifest" href="../css/favicon/manifest.json">
			
			<meta name="msapplication-TileImage" content="../css/favicon/ms-icon-144x144.png">
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
					<li role="presentation"><a href="index.html"><img src="css/hot-potato-text-with-logo.png" alt="Hot Potato" width="84" height="18"></a></li>
	  	            <li role="presentation"><a href="editor.php"> Video Editor</a></li>
	  				<li role="presentation"><a href="feed.html">Feed</a></li>
	  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
		
	  				<li role="presentation"><a href="potatoes-to-cut.html">New YouTube Videos</a></li>
	  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
  				
	  	        </div><!--/.nav-collapse -->
	  	      </div>
		
		<div class="row">
		<div class="col-md-6 col-md-offset-3" id="videoPlayback" style="padding-top: 8%;">
		<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame">
		<div id="JWvid"></div>
		</div></div></div>
		
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="progress">
	  	<div class="progress-bar progress-bar-info" id="progressBarVis" role="progressbar" style="">
	</div>	
		</div></div></div>
		
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<button type="button" class="btn btn-default" id="repeatVid" name="repeatVid" onclick="repeatVid()">
		<span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
			<span> Loop Video</span>
		</button></div></div>
		
		<script>
		var vidWidth=$("#responsiveVideoFrame").width();
		var vidHeight=(vidWidth*0.5625);
		var ProgressBar;
		var realVal;
		var editEnd='.$cutLength.';
		var relativePos;
		var userViewMode=0;
		
	    jwplayer("JWvid").setup({
	        file: "'.$ytLink.'",
	        width: vidWidth,
	        height: vidHeight,
			stretching: "fill",
	    });
		
		function repeatVid(){
			jwplayer("JWvid").seek(inPoint);
			userViewMode=2;
		}
		var inPoint ='.$videoStart.';
		var outPoint ='.$videoStop.';
		
			jwplayer("JWvid").onTime(function (event){
				realVal = event.position;
				relativePos = realVal - inPoint;
			if (userViewMode==0){
				if (realVal < 2){
					jwplayer("JWvid").seek(inPoint);
				}
				else if (realVal > outPoint){
					jwplayer("JWvid").pause();
				}
			} else if (userViewMode==2){
				if (realVal < inPoint || realVal > outPoint){
					jwplayer("JWvid").seek(inPoint);
				}
			}
				
				ProgressBar = (relativePos/editEnd);
				ProgressBar = ProgressBar*100;
				ProgressBar = ProgressBar.toPrecision(2);
				
				document.getElementById("progressBarVis").style.width =(ProgressBar+"%");
			});
				
				
				
		</script>
		
		<img width="10" height="10" src="https://i.ytimg.com/vi/'.$ytVidCode.'/hqdefault.jpg" style="visibility:hidden"/>
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
	
	
	return $html;

}



function createLink(){
$conn = mysqli_connect('141.117.161.98','leonhaggarty','mdm123','hotpotato');
//$conn = mysqli_connect('mysql.1freehosting.com','u151108054_squir','squireprods2002','u151108054_1edit');
$ytLink = $_GET['InputYouTubeLink'];
$videoStart = $_GET['InTimeCode'];
$videoStop = $_GET['OutTimeCode'];
$html = 'jsTj5.html';

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

// if (mysqli_connect_errno()){
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// $query = mysqli_query($conn,"SELECT OutputLink FROM single_edits WHERE OutputLink LIKE '%".$html."%'");
// while ($html==$query){
// 	$html = generateRandomStringFiveC().'.html';
// }
//
// // Perform queries
// mysqli_query($conn,"SELECT * FROM single_edits");
// mysqli_query($conn,"INSERT INTO single_edits (OutputLink,OriginalLink,EditIn,EditOut)
// VALUES ('".$html."','".$ytLink."','".$videoStart."','".$videoStop."')");
//
// mysqli_close($conn);
//
// $create = fopen('single_edits/'.$html, 'w') or die("can't open file");
// fwrite($create, templateVideoHTML());
// fclose($create);

echo '<!DOCTYPE html>
<html>
		<head>
			<title>Hot Potato Tool</title>
			<meta name="description" content="Hot Potato - The Online Video Editor. Try the tool and share your edits!  No rendering required.">
			<meta name="keywords" content="Hot Potato, YouTube, video, editor, edits, sharing, cut, personalize, render, free, online">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	        	
	        
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			
			<!-- <script src="https://apis.google.com/js/client.js"></script>-->
			<script src="http://jwpsrv.com/library/F3JbossrEeSDgg4AfQhyIQ.js"></script>
			<script type="text/javascript" src="js/jquery.zclip.js"></script>
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
  	          <ul class="nav nav-pills" style="padding-left:4.7%;">
				<li role="presentation"><a href="index.html"><img src="css/hot-potato-text-with-logo.png" alt="Hot Potato" width="84" height="18"></a></li>
  	            <li role="presentation"><a href="editor.php"> Video Editor</a></li>
  				<li role="presentation"><a href="feed.html">Feed</a></li>
  				<li role="presentation"><a href="sign-up.html">Sign Up</a></li>
		
  				<li role="presentation"><a href="potatoes-to-cut.html">New YouTube Videos</a></li>
  	            <li role="presentation"><a href="about.html">About &amp; Contact</a></li>
  				
  	        </div><!--/.nav-collapse -->
  	      </div>
	    
	</div>
	<div class="video-part">		
	<div class="row">
		<div class="col-md-4" style="padding-left:7%">
			<div class="intro-message" >
				
				<h3>
					
				</h3>
			</div>
		</div>
	
<div class="col-md-6 col-md-offset-3" style="padding-top:6%;">
	<div class ="embed-responsive embed-responsive-16by9" id="responsiveVideoFrame">
 	<div id="videoPlaybackFrame"></div></div>
</div>
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
			var vidWidth=$("#responsiveVideoFrame").width();
			var vidHeight=(vidWidth*0.5625);
			
		    jwplayer("videoPlaybackFrame").setup({
		        file: inputYTLink,
		        width: vidWidth,
		        height: vidHeight,
				stretching: "fill",
				
		    });
			
			if (matchMedia("only screen and (max-width: 650px)").matches) {
 			    //jwplayer().load([{width: 960,height: 540}]);
				document.getElementById("copy-button").style.display="none";
 			};
			
			
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
		
		<div class="col-md-6 col-md-offset-3" style="padding-top: 1%;" id="inputRowOne"> 
		<form role="form" action="linkBoi.php" method="get">
				
				<input type="text" name="ytVidCode" value="'.$ytLink.'" id="ytVidCode" style="display:none"/>
				<input type="text" name="InTimeCode" value="'.$videoStart.'" id="InTimeCode" style="display:none">
				<input type="text" name="OutTimeCode" value="'.$videoStop.'" id="OutTimeCode" style="display:none"/>
				<input type="submit" class="button" name="createLink" id="createLink" style="display:none"/>
			</form>
		</div>
		
		<div class="row">
		<div class="col-md-6 col-md-offset-3" style="">
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
	  
	  			<div class = "row">
				 
				<div class="col-md-6 col-md-offset-3" style="">
				
						<div class="well" style="" id="OutputYouTubeLink">www.hotpotato.me/single_edits/'.$html.'</div>
						
				</div>
				
				</div>
	</div>
	<div class="dashboard-part">		
			<div class ="row" >
			<div class="col-md-6 col-md-offset-3" style="" id="outputButtons">
			<input type="text" name="hotPotatoLink" value="'.$html.'" id="hotPotatoLink" style="display:none"/>
			<button type="button" class="btn btn-default" id="copy-button">
			<span class="glyphicon glyphicon-paperclip" aria-hidden="true"> </span><span id="copy-button-text"> Copy</span></button>
					<button type="button" class="btn btn-default" name="openLink" id="openLink" onclick="openLink()">
						<span class="glyphicon glyphicon-file" aria-hidden="true"> </span><span> Open</span></button>
					<button type="button" class="btn btn-default" id="selectAllButton" onclick="selectText(OutputYouTubeLink)" style="display:none">
						<span class="glyphicon glyphicon-hand-up" aria-hidden="true"> </span><span> Select Link</span></button>
					<button type="button" class="btn btn-default" id="backToTool" name="backToTool" onclick="backToTool()">
					<span class="glyphicon glyphicon-refresh" aria-hidden="true"> </span>
						<span> Reset</span>
					</button>
					<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAlt" aria-expanded="false" aria-controls="collapseAlt">
						<span class="glyphicon glyphicon-sort" aria-hidden="true"> </span>
						<span> Embed</span>
					</button>
				<div class="collapse" id="collapseAlt" style="padding-top:1%">
					<div class="well" id="collapseAltLink" style="color:#000">&lt;iframe width=&quot;662&quot; height=&quot;450&quot; src=&quot;http://www.hotpotato.me/single_edits/'.$html.'&quot; style=&quot;position: relative; top: -94px; left: -24px; overflow: hidden&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;</div>
				</div>
				
			</div>
			</div>
			<script>
			function openLink(){
				window.location="http://www.hotpotato.me/single_edits/'.$html.'";
				
			}
			
			function backToTool(){
				window.location="http://www.hotpotato.me";
				
			}
			</script>
			<script>
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
$(document).ready(function(){				
    $("button#copy-button").zclip({
        path:"js/ZeroClipboard.swf",
        copy:$("div#OutputYouTubeLink").text(),
		afterCopy:function(){
			
			document.getElementById("copy-button-text").innerHTML=" Copied";
			
		}
    });
});
</script>
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
//
//$url = new simpleUrl('https://www.hotpotato.me');
//
// echo $url;
//
// echo $_SERVER['REQUEST_URI'];
?>