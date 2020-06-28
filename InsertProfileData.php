<?php
	$host = 'localhost';
	$username = 'id13822073_orbital_access';
	$dbPass = 'Hellop@nda123';
	$dbName = 'id13822073_orbital';

	$con = mysqli_connect($host, $username, $dbPass, $dbName);
	if(mysqli_connect_errno()) {
		echo "Connection error";
		exit();
	}
	$studentID = $_POST["studentID"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$course = $_POST["course"];
	$description = $_POST["description"];
	$avatar = $_POST["avatar"];
	$studentIDCheckQuery = "SELECT studentID FROM students WHERE studentID = '" . $studentID . "'; " ; 
	$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
	$insertstudentquery = "UPDATE students SET name = '" . $name . "', course = '" . $course . "', description = '" . $description. "', avatar = '" . $avatar . "' WHERE studentID = '" . $studentID . "' ;" ;
	mysqli_query($con, $insertstudentquery) or die ("2");
	echo("0");

?>