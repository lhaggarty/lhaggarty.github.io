<?php
if($_GET){
    if(isset($_GET['createUser'])){
        createUser();
	}
}

function generateRandomStringFiveC() {
	$length = 5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function createUser(){
	$username=$_GET['username'];
	$email=$_GET['email'];
	$password=generateRandomStringFiveC();
	$accountCreateCheck=0;
	
	$conn = mysqli_connect('141.117.161.98','leonhaggarty','mdm123','hotpotato');
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$query = mysqli_query($conn,"SELECT username FROM user_information WHERE username LIKE '%".$username."%'");
	if ($username==$query){
		$accountCreateCheck=-1;
		echo 'username is taken';
		die();
	}
	$query = mysqli_query($conn,"SELECT email FROM user_information WHERE email LIKE '%".$email."%'");
	if ($email==$query){
		$accountCreateCheck=-1;
		echo 'this emai is already associated with an account';
		die();
	}
	if ($accountCreateCheck>-1){
	// Perform queries 
	mysqli_query($conn,"SELECT * FROM user_information");
	mysqli_query($conn,"INSERT INTO user_information (username,email,password) 
	VALUES ('".$username."','".$email."','".$password."')");

	mysqli_close($conn);

	$create = fopen('profiles/'.$username, 'w') or die("can't open file");
	fwrite($create, templateProfileHTML());
	fclose($create);

	echo '<!DOCTYPE html>';
	die();
}else if {
	echo 'Error creating user account';
}
}
function templateProfileHTML() {
	$username=$_GET['username'];
	$html = '<!DOCTYPE html>';
}

?>