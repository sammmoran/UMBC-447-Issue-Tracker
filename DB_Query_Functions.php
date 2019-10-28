<?php

// Functions to interact with the database (In Progress)

function add_ticket(assigner, email) {
		$status="Open"
				//Ticket_ID is auto incremented
				// Create new table entry (SQL Query)
}

// Add New Comment
function add_comment(ticket_id, comment) {
		// Create new comment with FK reference to provided ticket_id 
}

// Update Status
function update_status(ticket_id, new_status) {
		// Branch 1 - Set to "In Progress"

		// Branch 2 - Set to "Closed - Pending Approval"
			// Send Email to provided email

		// Branch 3 - Set to "Closed"
}

// Delete a Ticket
function delete_ticket(ticket_id) {

		// remove associated comments (SQL Query)
	global $db;
	$query = 'DELETE FROM comments
		  WHERE ticket_id = :ticket_id';
	$statement = $db->prepare($query);
	$statement->execute();

		// Remove Ticket (SQL Query)
	$query = 'DELETE FROM tickets
		  WHERE id = :ticket_id';
	$statement = $db->prepare($query);
	$statement->execute();
}

function get_all_tickets() {
		// Retrieve items from DB for display on webpage

	//I don't have the DB in front of me as I write this, so I don't have the 
	//table names and field names.  This will need revision, since we don't want
	//to return EVERYTHING, just the info needed to generate the dashboard

	global $db;
	$query = 'SELECT * FROM tickets
		  ORDER BY status';

	$statement = $db->prepare($query);
	$statement->execute();
	return $statement;
}



?>
