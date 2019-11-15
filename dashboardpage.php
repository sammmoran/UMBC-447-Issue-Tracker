<html>
	<head>
		<title>Dashboard Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles/dashboardpage.css">            
	</head>
	<body>
        <button onclick="location.href='newTicket.html'" type="button" class="Ticket">
         Create New Ticket</button>
        <h1 ><center>DASHBOARD</center></h1>
		<table>
		<?php 
		
			require('DB_Query_Functions.php');
		
		
			/*
				---- DELETE THIS -----
				Kyle and James will be providing the function for connecting to the database.
			*/
					
			/*
				Set up a table that will make use of the SQL query retrieved from the database.
				This will display a dashboard with the ticket's id, title, status, service agent, and
				comment history.
				
				----- NOTE ------ 
				We want to do something about the history column. Could be links. But it needs to be a way
				that the code returns a page with the ticket history.
			*/
			echo"<table border = 1>";
			echo"<tr>
			<th>ID</th>
			<th>Status</th>
			<th>Issue Title</th>
			<th>Ticket Owner</th>
            <th>Owner Email</th>
            <th>Date</th>
			<th width='15%'>Comment History</th>
			</tr>";
        
			$store = get_all_tickets();
			foreach($store as $ticket){
				echo"<tr>";
				echo "<td width='5%'>" . $ticket['tid'] . "</td>";
				echo "<td width='5%'>" . $ticket['status'] . "</td>";
				echo "<td width='15%'>" . $ticket['title'] . "</td>";
				echo "<td>" . $ticket['poc_name'] . "</td>";
				echo "<td>" . $ticket['poc_email'] . "</td>";
				echo "<td>" . $ticket['modified_date'] . "</td>";
				
				echo '<td> <form action = "./commentspage.php" method="post">';
				echo '<input type="hidden"  name="tid" id="tid" value="' . $ticket['tid'] . '">';
				echo '<input type = "submit" value="Check History">';
				echo "</form> </td>";
				
				echo"</tr>";
			}
		?>
	
		</table>

	</body>
</html>