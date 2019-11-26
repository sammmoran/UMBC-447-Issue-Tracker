<?php 
	
	require('inputErrorCheck.php');
	require('DB_Query_Functions.php'); 
	/*
		Capture variables from newTicket.html file.
		Organize data and validate. 
	*/
	$title = htmlspecialchars($_POST['title']);
	$poc_name = htmlspecialchars($_POST['poc_name']);
	$poc_email = htmlspecialchars($_POST['poc_email']);
	$description = htmlspecialchars($_POST['description']);
	
	$valInput = validateNewTicket($title, $poc_name, $poc_email, $description);
	if (strlen($valInput) > 1){
		header("refresh:5;url=newTicket.html");
		echo "----- ERROR ------ \n";
		echo "<br>";
		echo "Read the following error output \n";
		echo "<br>";
		echo $valInput;
	}	
	
	// Pass to database
	// Will return 0 if it works; -1 if fails
	elseif (add_ticket($title, $poc_name, $poc_email, $description) == 0){
		header("refresh:2;url=dashboardpage.php");		
		echo "Your new ticket has been added! \n";
		echo "<br>";
	}
	else{
	    header("refresh:5;url=newTicket.html");
		echo "TICKET ADD FAILURE";
		echo "<br>";
		echo "Try Again.";
	}

?>
