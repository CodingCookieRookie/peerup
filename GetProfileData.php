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
	$mod1= $_POST["mod1"];
	$isMatching = $_POST["isMatching"];
	$studentIDCheckQuery = "SELECT * FROM students WHERE NOT studentID = '" . $studentID . "' AND mod1 = '" . $mod1 . "' AND isMatching = '1' AND matchID IS NULL LIMIT 1; " ; 
	$namecheck = mysqli_query($con, $studentIDCheckQuery) or die("query fails");	// die if query fails
	$row = mysqli_fetch_assoc($namecheck);
	$student2ID = $row["studentID"];
	$matchAvatar = $row["avatar"];
	$matchName = $row["name"];
	$matchDescription = $row["description"];
	$details = "$matchAvatar$matchName/$matchDescription";
	$insertstudentquery = "UPDATE students SET mod1 = '" . $mod1 . "', isMatching = $isMatching WHERE studentID = '" . $studentID . "' ;" ;
	/*if( mysqli_num_rows($namecheck) <=0 ) {	
		$insertstudentquery = "UPDATE students SET mod1 = '" . $mod1 . "', isMatching = $isMatching WHERE studentID = '" . $studentID . "' ;" ;
	} else {
	    	$insertstudentquery = "UPDATE students SET mod1 = '" . $mod1 . "', matchID = '" . $student2ID . "', isMatching = $isMatching WHERE studentID = '" . $studentID . "' ;" ;
        	$insertstudentquery2 = "UPDATE students SET matchID = '" . $studentID . "' WHERE studentID = '" . $student2ID . "' ;" ;
        	mysqli_query($con, $insertstudentquery2) or die ("3");
        	
	}*/

	if( mysqli_num_rows($namecheck) >= 1 ){
	    	$insertstudentquery = "UPDATE students SET mod1 = '" . $mod1 . "', matchID = '" . $student2ID . "', isMatching = $isMatching WHERE studentID = '" . $studentID . "' ;" ;
        	$insertstudentquery2 = "UPDATE students SET matchID = '" . $studentID . "' WHERE studentID = '" . $student2ID . "' ;" ;
        	mysqli_query($con, $insertstudentquery2) or die ("3");
        	
	}
	mysqli_query($con, $insertstudentquery) or die ("2");
	echo($details);

?>