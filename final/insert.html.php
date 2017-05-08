<?php


if(isset($_POST['lastname'])){

$insert= " INSERT INTO students (FirstName,LastName) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."')";

if(mysqli_query($link, $insert)){
$outputStudent = "Student Info Entered\n";
}
}

?>
