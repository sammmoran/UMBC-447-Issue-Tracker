<?php

// Add a new ticket to the Database
function add_ticket($title, $poc_name, $poc_email, $description) {
	// Connect to the Database
	$pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker','cmsc447', 'demo');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$status = 1;				// default to Open
	$currdate = date("Y-m-d");  // YYYY-MM-DD
	
	$pdo->query("INSERT INTO tickets(title, status, poc_name, poc_email, description, modified_date)
							VALUES ('$title', $status, '$poc_name', '$poc_email', '$description', '$currdate');");
}

// Create new comment with FK reference to provided ticket_id 
function add_comment($tid, $name, $comment) {
	// Connect to the Database
	$pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker','cmsc447', 'demo');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	date_default_timezone_set("America/New_York");
	$currdatetime = date("Y-m-d h:i:s");
	
	$pdo->query("INSERT INTO comments(tid, name, comment, date)
							VALUES ($tid, '$name', '$comment', '$currdatetime');");

	return 0;
}

// Update Status
// 1: Open
// 2: In Progress
// 3: Closed - Pending Approval
// 4: Closed
function update_status($ticket_id, $new_status) {
	// Connect to the Database
	$pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker','cmsc447', 'demo');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Branch 1 - Set to "Open"
	if ($new_status == "Open") {
		$status = 1;
	}

	// Branch 2 - Set to "In Progress"
	if ($new_status == "In Progress") {
		$status = 2;
	}

	// Branch 3 - Set to "Closed - Pending Approval"
	// Send Email to provided email
	if ($new_status == "Closed - Pending Approval") {
		$status = 3;
	}

	// Branch 4 - Set to "Closed"
	// Send Email to provided email
	if ($new_status == "Closed") {
		$status = 4;
	}

}

/*// Delete a Ticket
function delete_ticket(ticket_id) {
	// Connect to the Database
	$pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker','cmsc447', 'demo');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}

function get_all_tickets() {
	// Connect to the Database
	$pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker','cmsc447', 'demo');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	global $db;
	$query = 'SELECT * FROM tickets
		  ORDER BY status';

	$statement = $db->prepare($query);
	$statement->execute();
	return $statement;
}*/



?>
