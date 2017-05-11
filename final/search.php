<?php

if (preg_match('/[\'^Â£$%&*()}{@#~?><>|=_+Â¬-]/', $_POST['sFName']))
{
 $searchOutput.= " WOOOHH, No Need for HTML Special Chars in Firstname ";
}
else if (preg_match('/[\'^Â£$%&*()}{@#~?><>|=_+Â¬-]/', $_POST['sLName']))
{
 $searchOutput.= " WOOOHH, No Need for HTML Special Chars in Lastname ";
}
else{

$fName = $_POST['sFName'];
$lName = $_POST['sLName'];

$query = "SELECT objectives.ObjectiveNumber FROM objectives WHERE objectives.ClassID IN (SELECT attendance.ClassID FROM attendance where attendance.StudentID IN (SELECT students.StudentID from students where students.FirstName = '$fName' and students.LastName = '$lName')) ORDER BY objectives.ObjectiveNumber ASC";

$objectArray = mysqli_fetch_all(mysqli_query($link, $query));
if($objectArray[0] == NULL){
 $searchOutput.= $fName." ".$lName." doesnt exist in database or has not completed any objectives ";
}
else{
$searchOutput =  $fName." ".$lName." has completed objectives:"." ";
for($i = 0; $i<count($objectArray); $i++){

$searchOutput .= $objectArray[$i][0].", ";
}
}
}
?>
