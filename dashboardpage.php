<html>
	<head>
		<title>Dashboard Manager</title>
	</head>
	<body>
		<table>
		<?php 
		
			/*
				---- DELETE THIS -----
				Kyle and James will be providing the function for connecting to the database.
			*/
			$conn = mysqli_connect('localhost', 'root', '', 'testdb');
			if ($conn->connect_error){
				die('Connection failed:'.$conn->connect_error);				
			}			
			$sql = 'SELECT * FROM dashboard';
			$result = $conn->query($sql);
			
			
			
			
			
			/*
				Set up a table that will make use of the SQL query retrieved from the database.
				This will display a dashboard with the ticket's id, title, status, service agent, and
				comment history.
				
				----- NOTE ------ 
				We want to do something about the history column. Could be links. But it needs to be a way
				that the code returns a page with the ticket history.
			*/
			echo"<table boarder = 1>";
			echo"<tr>
			<td>Id</td>
			<td>Issue Title</td>
			<td>Status</td>
			<td>ServiceAgent</td>
			<td>Comment History</td>
			</tr>";
			while($row = mysqli_fetch_assoc($result)){
				echo"<tr>
				<td>{$row['id']}</td>
				<td>{$row['title']}</td>
				<td>{$row['status']}</td>
				<td>{$row['service_agent']}</td>
				<td>{$row['history']}</td>
				</tr>";	
			}
			echo"</table>";			
			$conn->close();
		?>
	
		</table>

	</body>
</html>