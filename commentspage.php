<html>
	<head>
		<title>History Display</title>
	</head>
	<body>
		<table>
		<?php 
		
			$conn = mysqli_connect('localhost', 'root', '', 'testdb');
			if ($conn->connect_error){
				die('Connection failed:'.$conn->connect_error);				
			}
			$sql = 'SELECT * FROM commhistory';
			$result = $conn->query($sql);
			
			
			/*
				Take the SQL comment history query and display it a table format.
				
				--- NOTE --- 
				
				Need to make this chronological - from newest at top and oldest at bottom.
			*/
			echo"<table boarder = 1>";
			echo"<tr>
			<td>Comment ID</td>
			<td>Ticket ID</td>
			<td>Commentator</td>
			<td>Comment</td>
			<td>Date</td>
			</tr>";
			/*
			while($row = mysqli_fetch_assoc($result)){
				echo"<tr>
				<td>{$row['cid']}</td>
				<td>{$row['tid']}</td>
				<td>{$row['name']}</td>
				<td>{$row['comments']}</td>
				<td>{$row['date']}</td>
				</tr>";	
			}
			echo"</table>";
			*/			
			$conn->close();
		?>
	
		</table>

	</body>
</html>
