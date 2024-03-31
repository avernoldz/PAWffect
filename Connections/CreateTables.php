<!DOCTYPE html>
<html>

<head>
	<title>Pawffect</title>
</head>

<body>

	<?php
    include "Include.php";

	$events = "CREATE TABLE Events(
		eventsid int(100)  AUTO_INCREMENT PRIMARY KEY,
		eventsname varchar(255) NOT NULL,
		eventsdate date,
		eventstime varchar(255) NOT NULL,
		eventsdescription varchar(255) NOT NULL,
		adminid int(100) NOT NULL
		)";

	if(mysqli_query($conn, $events)) {
	    echo "Table Events";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}

	$location = "CREATE TABLE Location(
		locationid int(100) AUTO_INCREMENT PRIMARY KEY,
		locationname varchar(255) NOT NULL,
		city varchar(255) NOT NULL,
		eventid int(100) NOT NULL
		)";

	if(mysqli_query($conn, $location)) {
	    echo "Table Location";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}


	$Participant = "CREATE TABLE Participant(
			participantid int(100) AUTO_INCREMENT PRIMARY KEY,
			firstname char(255) NOT NULL,
			middlename char(255) NULL,
			lastname char(255) NOT NULL,
			phonenumber varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			street varchar(255) NOT NULL,
			brgy varchar(255) NOT NULL,
			city varchar(255) NOT NULL,
			province varchar(255) NOT NULL,
			region varchar(255) NOT NULL,
			registrationstatus varchar(255) NOT NULL,
			eventid int(100) NOT NULL
			)";

	if(mysqli_query($conn, $Participant)) {
	    echo "Table Participant";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}

	$pets = "CREATE TABLE Pets(
			petid int(100) AUTO_INCREMENT PRIMARY KEY,
			type varchar(255)  NOT NULL,
			name varchar(255) NOT NULL,
			gender varchar(255) NOT NULL,
			age varchar(255) NOT NULL,
			weight varchar(255) NOT NULL,
			breed varchar(255) NOT NULL,
			participantid int(100) NOT NULL
			)";

	if(mysqli_query($conn, $pets)) {
	    echo "Table Pets";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}

	$volunteers = "CREATE TABLE Volunteers(
			volunteersid int(100) AUTO_INCREMENT PRIMARY KEY,
			firstname char(255) NOT NULL,
			middlename char(255) NULL,
			lastname char(255) NOT NULL,
			email varchar(255) NOT NULL,
			phonenumber varchar(255) NOT NULL,
			address varchar(255) NOT NULL,
			age varchar(255) NOT NULL,
			gender varchar(255) NOT NULL,
			school varchar(255) NOT NULL,
			course varchar(255) NOT NULL,
			studentid varchar(255) NOT NULL,
			eventid int(100) NOT NULL
			)";

	if(mysqli_query($conn, $volunteers)) {
	    echo "Table Volunteer";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}

	$admin = "CREATE TABLE Admins(
			adminid int(100) AUTO_INCREMENT PRIMARY KEY,
			username varchar(255) UNIQUE NOT NULL,
			password varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phonenumber varchar(100) NOT NULL
			)";

	if(mysqli_query($conn, $admin)) {
	    echo "Table Admin";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}


	/*
	FOREIGN KEY (divisionid) REFERENCES Division(divisionid)
	*/

    

	$services = "CREATE TABLE Services(
			servicesid int(100) AUTO_INCREMENT PRIMARY KEY,
			servicename varchar(255) NOT NULL,
			description varchar(255) NOT NULL, 
			cost decimal(20,2) NOT NULL	
			)";

	if(mysqli_query($conn, $services)) {
	    echo "Table services";
	} else {
	    echo "Error creating Table: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	?>

</body>

</html>