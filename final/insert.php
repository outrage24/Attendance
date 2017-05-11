<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Timmsqlp24';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, 'attendance');


if($_POST['lastname'] != NULL && $_POST['firstname'] != NULL){
include 'insert.html.php';
}

else if(isset($_POST['date'])){
	if(!is_uploaded_file($_FILES['scanner']['tmp_name']) || $_POST['classSelect'] == NULL || $_POST['objectives'] == NULL){
	 $outputScanner = "Scanner Forms cannot be Null";
	}
	else{
	 	include 'scanner.php';
	}
}



include 'insert2.html.php';

?>
