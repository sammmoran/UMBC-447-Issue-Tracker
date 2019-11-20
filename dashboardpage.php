<html>
	<head>
		<title>Dashboard Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles/dashboardpage.css">            
	</head>
	<body>
        <button onclick="location.href='newTicket.html'" type="button" class="Ticket">
         Create Ticket</button>
        <h1 ><center>DASHBOARD</center></h1>
		<table>
		<?php 		
		
		require('DB_Query_Functions.php');

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
			
			echo '<td> <form action="./commentspage.php" method="post">';
			echo '<input type="hidden" name="tid" id="tid" value="' . $ticket['tid'] . '">';
			echo '<input type = "submit" value="Check History">';
			echo "</form>";
			
			echo '<form action="./delete_ticket.php" method="post">';
			echo '<input type="hidden" name="del_tid" id="del_tid" value="' . $ticket['tid'] . '">';
			echo '<input type = "submit" value="Delete" class="delete" >';
			echo '</form></td>';
			echo"</tr>";
		}
		?>
		</table>

	</body>
</html>