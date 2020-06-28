<?php
	$host = 'localhost';
	$username = 'orbitalu_unsorted';
	$dbPass = 'unsorted123';
	$dbName = 'orbitalu_unsorted';

	$con = mysqli_connect($host, $username, $dbPass, $dbName);
	if(mysqli_connect_errno()) {
		echo "Connection error";
		exit();
	}
	$studentID = $_POST["studentID"];
	$password = $_POST["password"];
	$matchIDCheckQuery = "SELECT matchID FROM students WHERE studentID = '" . $studentID . "'; ";
	$matchIDCheck = mysqli_query($con, $matchIDCheckQuery) or die("query fails");	// die if query fails
	$row = mysqli_fetch_assoc($matchIDCheck);
	$matchID = $row["matchID"];
	$details = "";
	if(!is_null($matchID)) {
		$studentIDCheckQuery = "SELECT * FROM students WHERE studentID = '" . $matchID . "' ; " ;
		$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
		$row = mysqli_fetch_assoc($namecheck);
		$matchAvatar = $row["avatar"];
		$matchName = $row["name"];
		$matchDescription = $row["description"];
		$details = "$matchAvatar$matchName/$matchDescription";
	}
	echo($details);

?>
