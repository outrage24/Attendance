<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Timmsqlp24';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, 'attendance');

if (!$link)
{
  $output = 'Unable to connect to the database server.';
  include 'output.html.php';
  exit();
}
if (!mysqli_set_charset($link, 'utf8'))
{
  $output = 'Unable to set database connection encoding.';
  include 'output.html.php';
  exit();
}
if (!mysqli_select_db($link, 'attendance'))
{
  $output = 'Unable to locate the attendance database.';
  include 'output.html.php';
  exit();
}
$output = 'Database connection established.';

$query = "SELECT FirstName, LastName FROM students";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result))
{

$studentList .= $row['FirstName']." ".$row['LastName']."<br>";
}

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
else if(isset($_POST['sFName']) || isset($_POST['sLName'])){
	if($_POST['sFName'] == NULL || $_POST['sLName'] == NULL){	
	$searchOutput = " Search Forms Cannot be Null";
	}
	else{
	 include 'search.php';
	}
}


include 'output.html.php';

?>
