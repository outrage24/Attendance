<?php


if(isset($_POST['lastname'])){

if (preg_match('/[\'^Â£$%&*()}{@#~?><>|=_+Â¬-]/', $_POST['firstname']))
{
 $outputStudent.= " WOOOHH, No Need for HTML Special Chars in Firstname ";
}
else if (preg_match('/[\'^Â£$%&*()}{@#~?><>|=_+Â¬-]/', $_POST['lastname']))
{
 $outputStudent.= " WOOOHH, No Need for HTML Special Chars in Lastname ";
}
else{
$first = htmlspecialchars($_POST['firstname']);
$last = htmlspecialchars($_POST['lastname']);

$insert= " INSERT INTO students (FirstName,LastName) VALUES ('".$first."','".$last."')";

if(mysqli_query($link, $insert)){
$outputStudent = "Student Info Entered\n";
}
}
}
?>
