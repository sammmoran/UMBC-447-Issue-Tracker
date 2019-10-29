<?php 

	/*
		----- DELETE THIS ----
		Kyle and James will be providing the connection to the SQL database.
	*/
	require('database.php');
	
	
	/*
		Collect the new comment to be added, as well as the ticket ID for reference.
		This will get passed along to the appropriate ticket.
	*/
	$comments = $_POST['add_comment'];
	$id = $_POST['id'];
	
	
	/*
		------- DELETE THIS ------
		Kyle and James will be providing a function that handles this.
	*/
	$query = 'INSERT INTO commhistory (id,comments) VALUES (:id,:comments)';
	$sqprep = $conn->prepare($query);
	$sqexec = $sqprep->execute(array(":id"=>$id,":comments"=>$comments));
	
	/*
		------- DELETE THIS -------
		There shouldn't be check here.
	*/
	if ($sqexec){
		echo "Added comment";
	}
	else
		echo "Query failed";

?>