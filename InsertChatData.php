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
	$studentIDCheckQuery = "SELECT * FROM students WHERE studentID = '" . $studentID . "'; " ; //check if studentID exists
	$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
	$row = mysqli_fetch_assoc($namecheck);
	$student2ID = $row["matchID"];
	$rowChat = $row["chat"];
	$chat = "$rowChat" ;
	if(isset($_POST["userInput"])) {
	    $userInput= $_POST["userInput"];
	    $chat = "$rowChat$userInput" ;
	}
	$insertstudentquery = "UPDATE students SET chat = '" . $chat . "' WHERE studentID = '" . $studentID . "' OR studentID = '" . $student2ID . "';" ;
	mysqli_query($con, $insertstudentquery) or die ("2");
	echo($chat);

?>