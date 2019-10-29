<?php 

	/*	
		----- DELETE THIS -----
		Establish connection
		- This should be removed becuase Kyle and James are going to handle this
	*/
	require('database.php');
	
	/*
		Capture variables from newTicket.html file.
		Organize data and send to SQL database.
		Kyle and James will have SQL functions to handle SQL aspects.
	*/
	$title = $_POST['issueName'];
	$status = "Open";
	$service_agent = $_POST['contactInfo'];
	$history = $_POST['description'];
	
	
	/*
		------ DELETE THIS ----
		This will be handled by James and Kyle 
	*/
	$query = 'INSERT INTO dashboard (title,status,service_agent,history) VALUES (:title,:status,:service_agent,:history)';
	$sqprep = $conn->prepare($query);
	$sqexec = $sqprep->execute(array(":title"=>$title, ":status"=>$status, ":service_agent"=>$service_agent,":history"=>$history));
	
	
	
	/*Remove this if statement*/
	if ($sqexec){
		echo "It worked";
	}
	/*Debugging statement*/
	else
		echo "Query failed";

?>