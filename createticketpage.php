<html>
<body>
	
	<h1>Create a New Ticket</h1>
	
	<p>
	Please provide a name for your issue (keep it concise please).</br>
	Please provide the contact information of the Service Agent you'd like to see this.</br>
	Thank you!</br>	
	</p>
	<form action="tickethandle.php" method="post">
		
		TicketTitle:<input type="text" name="tickettitle"/></br>
		TicketAuthor:<input type="text" name="ticketauthor"/></br>
		ServiceContact:<input type="text" name="servicecontact"/></br>
		Comments:<input type="text" name="prelim_comments"/><br>
		<input type="submit" name="Submit Ticket"/>
	</form>

</body>
</html>
