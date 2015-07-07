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
	echo 'query ';
	
	while ($obj=mysqli_fetch_object($query)){
	    printf("%s (%s)\n",$obj->id,$obj->OutputLink);
		echo $obj->id;
	}							
// $function_result = array();
//    $i = 0;
//    while($row = mysqli_fetch_object($query)){
//       $function_result[$i] = $row;
//       $i++;
//    }
//   return $function_result;
// }
	mysqli_free_result($query);
}

// $lastEntry = mysqli_insert_id();
// echo 'stuff stuff '.$lastEntry;
// echo 'stuff stuff stuff '.$test;

  mysqli_close($conn);
die();
}
?>