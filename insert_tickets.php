<?php 
	require('DB_Query_Functions.php'); 
	/*
		Capture variables from newTicket.html file.
		Organize data and validate. 
	*/
	$title = $_POST['title'];
	$poc_name = $_POST['poc_name'];
	$poc_email = $_POST['poc_email'];
	$description = $_POST['description'];

	include('inputErrorCheck.php');
	$valInput = validateNewTicket($title, $poc_name, $poc_email, $description);
	if (strlen($valInput) > 1){
		echo "----- ERROR ------ \n";
		echo "<br>";
		echo "Read the following error output \n";
		echo "<br>";
		echo $valInput;
		header("refresh:5, url=newTicket.html");
	}	
	
	// Pass to database
	// Will return 0 if it works; -1 if fails
	if (add_ticket($title, $poc_name, $poc_email, $description)){
		echo "Your new ticket has been added! \n";
		echo "<br>";
		header("refresh:2, url=dashboardpage.php");		
	}
	else
		echo "Didnt work";
		header("refresh:2, url=newTicket.html");

?>
