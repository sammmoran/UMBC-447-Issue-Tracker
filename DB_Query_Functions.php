<?php

function connectDB() {
	
	$dsn = 'mysql:host=localhost;dbname=issue_tracker';
	$username = 'root';
	$password = '';
	try{
		$conn = new PDO($dsn, $username, $password);
	}
	catch(PDOException $pe){
		die("Could not connect to database.".$pe->getMessage());		
		exit();
	}

	return $conn;
}

// Add a new ticket to the Database
function add_ticket($title, $poc_name, $poc_email, $description) {
	
	// Connect to ticket db
	$pdo = connectDB();	
	
	// Set status to "Open"
	$status = 1;
	
	// Grab the submission date
	$modified_date = date("Y-m_d");
	
	// Create query
	$query = 'INSERT INTO tickets(title,description,status,poc_name,poc_email,modified_date) VALUES(:title,:description,:status,:poc_name,:poc_email,:modified_date)';
	
	// Prepare and send query
	$sqprep = $pdo->prepare($query);
	$sqexec = $sqprep->execute(array(":title"=>$title, ":description"=>$description,":status"=>$status, ":poc_name"=>$poc_name, ":poc_email"=>$poc_email, ":modified_date"=>$modified_date));
	
	// Check if add successful
	if ($sqexec){
		return 0;
		
	}
	
	// If fail
	return 1;
}

// Create new comment with FK reference to provided ticket_id 
function add_comment($tid, $name, $comment) {
	// Connect to the Database
	$db = connectDB();

	date_default_timezone_set("America/New_York");
	$currdatetime = date("Y-m-d h:i:s");

	$db->query("INSERT INTO comments(tid, name, comment, date)
							VALUES ($tid, '$name', '$comment', '$currdatetime');");

	return 0;
}

// Update Status
// 1: Open
// 2: In Progress
// 3: Closed - Pending Approval
// 4: Closed
function update_status($tid, $new_status) {
	// Connect to the Database
	$db = connectDB();

	// Branch 1 - Set to "Open"
	if ($new_status == "Open") {
		$status = 1;
	}

	// Branch 2 - Set to "Closed - Pending Approval"
	// Send Email to provided email
	if ($new_status == "Closed - Pending Approval") {
		$status = 2;
	}

	// Branch 2 - Set to "Closed"
	// Send Email to provided email
	if ($new_status == "Closed") {
		$status = 3;
	}

	// Update Query
	$db->query("UPDATE tickets SET status=$status WHERE tid=$tid;");

	return 0;
}

// Delete a Ticket
function delete_ticket($tid) {
	// Connect to the Database
	$db	= connectDB();

	// Delete Query
	$query = "DELETE FROM tickets WHERE tid=$tid;";
	$ret = $db->query($query);
	return 0;
}

function get_all_tickets() {
	// Connect to the Database	
	$db = connectDB();
	
	$query = "SELECT * FROM tickets
		  		ORDER BY status";
	
	$statement = $db->prepare($query);
	$stateexec = $statement->execute();
	$ret = $statement->fetchall();
	$statement->closeCursor();
	return $ret;
}

function get_ticket_details($tid) {
	$db = connectDB();
	
	$query = "SELECT title,description FROM tickets WHERE tid=$tid;";
	$ret = $db->query($query);
	$ret = $ret->fetch(PDO::FETCH_ASSOC);
	return $ret;
}

function get_comments_by_ticket($tid){
	// Connect to the Database	
	$pdo = connectDB();
	
	$query = "SELECT * FROM comments
		  		WHERE tid=$tid
				ORDER BY date DESC;";
	$statement = $pdo->prepare($query);
	$statement->execute();
	$ret = $statement->fetchAll();
	$statement->closeCursor();
	return $ret;
}

?>
