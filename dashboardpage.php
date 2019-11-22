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
		<th>TID</th>
		<th>Status</th>
		<th>Issue Title</th>
		<th>Ticket Owner</th>
		<th>Owner Email</th>
		<th>Date</th>
		<th width='15%'>Actions</th>
		</tr>";
	
		$store = get_all_tickets();
		foreach($store as $ticket){
			echo"<tr>";
			echo "<td width='5%'>" . $ticket['tid'] . "</td>";
			if ($ticket['status'] == 1){
				echo "<td width='5%'> Open </td>";			
			}
			elseif ($ticket['status'] == 2){
				echo "<td width='5%'> Requested Closure </td>";
			}
			elseif ($ticket['status'] == 3){
				echo "<td width='5%'> Closed </td>";				
			}
			else{
				echo "<td width='5%'> Error </td>";
			}
			echo "<td width='15%'>" . $ticket['title'] . "</td>";
			echo "<td>" . $ticket['poc_name'] . "</td>";
			echo "<td>" . $ticket['poc_email'] . "</td>";
			echo "<td>" . $ticket['modified_date'] . "</td>";
			
			echo '<td> <form action="./commentspage.php" method="post">';
			echo '<input type="hidden" name="tid" id="tid" value="' . $ticket['tid'] . '">';
			echo '<input type = "submit" value="View Comments">';
			echo "</form>";

			if ($ticket['status'] == 1){
				echo '<form action="./update_status.php" method="post">';
				echo '<input type="hidden" name="tid" id="tid" value="' . $ticket['tid'] . '">';
				echo '<input type="hidden" name="status" id="status" value="2">';
				echo '<input type = "submit" value="Request Closure">';
				echo "</form>";			
			}
			elseif ($ticket['status'] == 2){
				echo '<form action="./update_status.php" method="post">';
				echo '<input type="hidden" name="tid" id="tid" value="' . $ticket['tid'] . '">';
				echo '<input type="hidden" name="status" id="status" value="3">';
				echo '<input type = "submit" value="Confirm Closure">';
				echo "</form>";

				echo '<form action="./update_status.php" method="post">';
				echo '<input type="hidden" name="tid" id="tid" value="' . $ticket['tid'] . '">';
				echo '<input type="hidden" name="status" id="status" value="1">';
				echo '<input type = "submit" value="Reopen Ticket">';
				echo "</form>";
			}
			
			echo '<form action="./delete_ticket.php" method="post">';
			echo '<input type="hidden" name="del_tid" id="del_tid" value="' . $ticket['tid'] . '">';
			echo '<input type = "submit" value="Delete" class="delete" >';
			echo '</form>';

			echo"</td></tr>";
		}
		?>
		</table>

	</body>
</html>