
<!DOCTYPE html> 
  <head>
    <title>List of Students</title>
    <meta http-equiv="content-type"
        content="text/html; charset=utf-8"/>
  </head>
  <body>
	<b> <?php echo $output; ?> </b>
	 <p>Here are all the students in the database:</p>
	<?php echo $studentList; ?>


	<h1> Input New Cadet </h1>
	<b> <?php echo  $outputStudent;  ?></b>
	<form action="" method="post">
      <div><label for="firstname">First name:
        <input type="text" name="firstname" id="firstname"/></label>
      </div>
      <div><label for="lastname">Last name:
        <input type="text" name="lastname" id="lastname"/></label>
      </div>
      <div><input type="submit" value="GO"></div>
	</form>

	 <h2>Upload Scanner File</h2>
	<b> <?php echo $outputScanner; ?></b>
	<form action="" method="post" id="scannerForm" enctype="multipart/form-data">
        <label for="fileSelect">Filename:</label>
        <input type="file" name="scanner" id="scanner"><br>
        <label for="classType"> PE or LLAB:</label>
	<select name="classSelect" form="scannerForm">
		<option value=""></option>
		<option value="LLAB">LLAB</option>
		<option value="PE">PE</option>
	</select><br>
	<label for="date"> Date:</label>
	<input type="date" name="date" id="date"><br>
	<label for="objectives">Objectives (#,#,#):</label>
	<input type="text" name="objectives" id="objectives"><br>
	<input type="submit" name="submit" value="Upload">
	</form>

	<h3> Search  </h3>
	<b><?php echo $searchOutput; ?></b>
	<form action="" method="post" id="searchForm">
		<label for="sFName"> First Name: </label>
		<input type="text" name="sFName" id="sFName"><br>
		<labe for="sLName"> Last Name: </label>
		<input type="text" name="sLName" id="sLName"><br>
		<input type="submit" name="search" id= "search" value="Search">
	</form>
</body>
</html>
