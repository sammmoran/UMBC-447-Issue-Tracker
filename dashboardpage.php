<html>
	<head>
		<title>Dashboard Manager</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>

            h1{
                color: white; 
            }
            
            
            table, td{

              border-collapse: collapse;

            }    

            table, td, th {  
              text-align: left;
                border: 1px solid black;

            }

            table {
              border-collapse: collapse;
              width: 100%;
            }

            th {
                background-color: orange;
              color: white;
                }

            tr:nth-child(even){
                background-color: lightgray
            }

            tr {
                background-color: aliceblue

            }

            th, td {
              padding: 15px;
            }

            body {font-family: Arial, Helvetica, sans-serif;
                    background-color: #6495ed;}
            * {box-sizing: border-box;}
            
        </style>
	</head>
	<body>
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
			echo"<table boarder = 1>";
			echo"<tr>
			<th>Id</th>
			<th>Issue Title</th>
			<th>Status</th>
			<th>ServiceAgent</th>
            <th>ServiceAgent Email</th>
            <th>Date</th>
			<th>Comment History</th>
			</tr>";
        
			$store = get_all_tickets();
			foreach($store as $ticket){
				echo"<tr>";
				echo "<td>" . $ticket['tid'] . "</td>";
				echo "<td>" . $ticket['title'] . "</td>";
				echo "<td>" . $ticket['status'] . "</td>";
				echo "<td>" . $ticket['poc_name'] . "</td>";
				echo "<td>" . $ticket['poc_email'] . "</td>";
				echo "<td>" . $ticket['modified_date'] . "</td>";
				
				echo '<td> <form action = "commentspage.php" method="post">';
				echo '<input type="hidden"  name="tid" id="tid" value="' . $ticket['tid'] . '">';
				echo '<input type = "submit" value="Check History">';
				echo "</form> </td>";
				
				echo"</tr>";
			}
		?>
	
		</table>

	</body>
</html>