<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Timmsqlp24';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, 'attendance');

if(isset($_POST['sFName']) || isset($_POST['sLName'])){
	if($_POST['sFName'] == NULL || $_POST['sLName'] == NULL){	
	$searchOutput = " Search Forms Cannot be Null";
	}
	else{
	 include 'search.php';
	}
}
include 'search.html.php';

?>
