<?php 

	require('database.php');
	
	$title = $_POST['tickettitle'];
	$status = "Open";
	$service_agent = $_POST['servicecontact'];
	$history = $_POST['prelim_comments'];
	
	$query = 'INSERT INTO dashboard (title,status,service_agent,history) VALUES (:title,:status,:service_agent,:history)';
	$sqprep = $conn->prepare($query);
	$sqexec = $sqprep->execute(array(":title"=>$title, ":status"=>$status, ":service_agent"=>$service_agent,":history"=>$history));
	
	if ($sqexec){
		include('success_ticket_handle_response.php');		
	}
	else
		echo "Query failed";
	
	include('pulldata.php');

?>