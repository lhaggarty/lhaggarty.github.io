<?php

// echo "hello world";
// include_once("http://localhost/hotpotatome/mysql_1edit_connect.php");

//$db = mysql_select_db('single_edits');
if($_GET){
    if(isset($_GET['createLink'])){
        createLink();
    }
	elseif (isset($_GET['resubmitLink'])){
	        postToFeed();
	}
	else {
		
	}
}
?>