$('#InputPlayPoint').timepicker({
    template: false,
    showInputs: false,
    minuteStep: 5,
	showSeconds: true,
	showMeridian: false,
	defaultTime: '0:01:00',
});
$('#InputEndPoint').timepicker({
    showInputs: false,
    minuteStep: 5,
	showSeconds: true,
	showMeridian: false,
	defaultTime: '0:02:00'
});

function myFunction(){
	var hms1 = $('input#InputPlayPoint').val();
	var hms2 = $('input#InputEndPoint').val();
	var secps1 = hms1.split(':'); // split it at the colons
	var secps2 = hms2.split(':'); // split it at the colons
	// minutes are worth 60 seconds. Hours are worth 60 minutes.
	var secondsIn = (+secps1[0]) * 60 * 60 + (+secps1[1]) * 60 + (+secps1[2]); 
	var secondsOut = (+secps2[0]) * 60 * 60 + (+secps2[1]) * 60 + (+secps2[2]);
	
	var shortYTLink;
	//shortYTLink = $( '#InputYouTubeLink' ).not( 'www.youtube.com/watch?v=' ).val();
	
	shortYTLink = getQueryVariable("v",$( '#InputYouTubeLink' ).val());
	$( '#OutputYouTubeLink' ).html( "https://www.youtube.com/v/" + shortYTLink + '%26start=' + secondsIn + '%26end=' + secondsOut);
	$("form").slideUp();
	document.getElementById('videoPlaybackFrame').src = $('#OutputYouTubeLink').html();
	document.getElementById('videoPlayback').style.display ="";
	document.getElementById('backButton').style.display ="";
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