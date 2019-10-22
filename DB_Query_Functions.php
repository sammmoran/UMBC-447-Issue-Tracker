<?php

// Functions to interact with the database (In Progress)


// Add New Ticket
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
	
	// Remove Ticket (SQL Query)
}

function display_tickets() {
	// Retrieve items from DB for display on webpage
}

?>