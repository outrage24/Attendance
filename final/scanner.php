<?php
if($_FILES["scanner"]["error"] > 0){
  $outputScanner = "Error: " . $_FILES["scanner"]["error"] . "<br>";
}
/* else{
    echo "File Name: " . $_FILES["scanner"]["name"] . "<br>";
    echo "File Type: " . $_FILES["scanner"]["type"] . "<br>";
    echo "File Size: " . ($_FILES["scanner"]["size"] / 1024) . " KB<br>";
    echo "Stored in: " . $_FILES["scanner"]["tmp_name"]."<br>";

}
*/


$objectiveString = $_POST['objectives'];

if (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $objectiveString))
{
 $outputScanner.= " WOOOHH, No Need for HTML Special Chars in Objectives ";
}
else{

// Create Class from Form
$insert = " INSERT INTO Class (ClassType, Date) Values('".$_POST['classType']."','".$_POST['date']."')";
if(mysqli_query($link, $insert)){
$outputScanner = "Class Created\n";
}
$classType = $_POST['classType'];
$classDate = $_POST['date'];
$classQuery = "Select ClassID FROM Class WHERE ClassType = '$classType'  and date = '$classDate'";
$result = mysqli_query($link, $classQuery);
$classInfo = mysqli_fetch_array($result);
$classID = $classInfo[0];

//Get Scanner Attendance File and screate backup
$fileString = file_get_contents($_FILES["scanner"]["tmp_name"]);
$insert = "INSERT INTO scannerBackUp (Date, ScannerOutput) VALUES ('".$_POST['date']."','".$fileString."')";
if(mysqli_query($link, $insert)){
$outputScanner.= '<br>'."File Stored to ScannerBackup";
}

//Insert objectives and create row in objective tabl


$objectiveNumbers = explode(",", $objectiveString);
for( $i = 0; $i< count($objectiveNumbers); $i++){
$insert = "INSERT INTO objectives (ObjectiveNumber, ClassID) VALUES ('$objectiveNumbers[$i]', '$classID')";
if(mysqli_query($link, $insert)){
$outputScanner .= '<br>'."Objective Table updated for Objective ".$objectiveNumbers[$i]."";
}


}
}

//Parse file into Each name available
$array = explode(PHP_EOL,$fileString);
for( $i = 0; $i < count($array); $i++){
$splitString = explode(",", $array[$i]);
$names[$i] = $splitString[0];
$splitName = explode(" ", $names[$i]);
$firstName = $splitName[0];
$lastName = $splitName[1];

//Search database for names in attendance
$nameQuery =  "SELECT StudentID, FirstName, LastName FROM students WHERE FirstName  = '$firstName' and LastName = '$lastName'";
$nameResult =  mysqli_query($link, $nameQuery);
//If name found create an attendance row
if(mysqli_num_rows($nameResult)> 0){
	$studentInfo = mysqli_fetch_array($nameResult);
	$studentID = $studentInfo[0];

	$studentList .='<br>'.$firstName." ".$lastName;


	$insert = "INSERT INTO attendance (ClassID, StudentID) VALUES ('$classID','$studentID')";
	if(mysqli_query($link, $insert)){
	$studentList .= '<b>'." (Student Attendance Created)".'</b>';
	}

}

}
?>
