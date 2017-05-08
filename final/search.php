<?php

$fName = $_POST['sFName'];
$lName = $_POST['sLName'];

$query = "SELECT objectives.ObjectiveNumber FROM objectives WHERE objectives.ClassID IN (SELECT attendance.ClassID FROM attendance where attendance.StudentID IN (SELECT students.StudentID from students where students.FirstName = '$fName' and students.LastName = '$lName')) ORDER BY objectives.ObjectiveNumber ASC";

$objectArray = mysqli_fetch_all(mysqli_query($link, $query));
$searchOutput =  $fName." ".$lName." has completed objectives:"." ";
for($i = 0; $i<count($objectArray); $i++){

$searchOutput .= $objectArray[$i][0].", ";
}

?>
