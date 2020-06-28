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
	$studentIDCheckQuery = "SELECT studentID FROM students WHERE studentID = '" . $studentID . "'; " ; //check if studentID exists
	$passwordCheckQuery = "SELECT password FROM students WHERE password = '" . $password. "'; " ;
	$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
	$passwordcheck = mysqli_query($con, $passwordCheckQuery) or die("query fails");
	if( mysqli_num_rows($namecheck) > 0 && mysqli_num_rows($passwordcheck) > 0) {	
		echo "0";	//user exists
		exit();
	} else if( mysqli_num_rows($namecheck) <= 0) {
		echo "1"; 	//user does not exist
		exit();
	} else if (mysqli_num_rows($passwordcheck) <= 0) {
		echo "2";
		exit();
	} 
	
	
		
?>