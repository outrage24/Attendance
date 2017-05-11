<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Timmsqlp24';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, 'attendance');


$output = 'Database connection established.';

$query = "SELECT FirstName, LastName FROM students";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result))
{

$studentList .= $row['FirstName']." ".$row['LastName']."<br>";
}

include 'home.html.php';





?>
