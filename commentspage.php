<html>
	<head>
		<title>History Display</title>
	</head>
	<body>
		<table>
		<?php 
		
			/*
				----- DELETE THIS ------
				Kyle and James will be providing the connection to the SQL database.			
			*/
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
			<td>Id</td>
			<td>Comment History</td>
			</tr>";
			while($row = mysqli_fetch_assoc($result)){
				echo"<tr>
				<td>{$row['id']}</td>
				<td>{$row['comments']}</td>
				</tr>";	
			}
			echo"</table>";			
			$conn->close();
		?>
	
		</table>

	</body>
</html>