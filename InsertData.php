<?php
	$host = '195.201.179.80';
	$username = 'orbitalu_unsorted';
	$dbPass = 'unsorted123';
	$dbName = 'orbitalu_unsorted';

	$con = mysqli_connect($host, $username, $dbPass, $dbName);
	if(mysqli_connect_errno()) {
		echo "Connection error";
		exit();
	}
	$studentID = $_POST["studentID"];
	$nusMail = $_POST["nusMail"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$course = $_POST["course"];
	$description = $_POST["description"];
	$mod1 = $_POST["mod1"];
	$studentIDCheckQuery = "SELECT studentID FROM students WHERE studentID = '" . $studentID . "'; " ; //check if studentID exists
	$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
	if(mysqli_num_rows($namecheck) > 0) {	
		echo "1";	//user exists
		exit();
	}
//	$hash = password_hash($password, PASSWORD_DEFAULT);
	$insertstudentquery = "INSERT INTO students (studentID, nusMail, password, name, course, description, mod1) VALUES ('" . $studentID . "', '" . $nusMail . "', '" . $password . "', '" . $name . "', '" . $course . "', '" . $description . "', '" . $mod1 . "');";
	mysqli_query($con, $insertstudentquery) or die ("2");
	echo("0");

?>
