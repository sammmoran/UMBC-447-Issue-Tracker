<html>
	<head>
		<title>History Display</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    
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

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container textarea[type=text], .form-container textarea[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add a neon green background color to the "add comment" button */
    .open-button {
      background-color: #008000;
      border-radius: 25px;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }

        
</style>
        
	</head>
	<body>
        
        <h2>Description goes somewhere here</h2>
		<table>
		<?php 
		
			$conn = mysqli_connect('localhost', 'root', '', 'issue_tracker');
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
			<th><b>Comment ID</b></th>
			<th><b>Ticket ID</b></th>
			<th><b>Commentator</b></th>
			<th><b>Comment</b></th>
			<th><b>Date</b></th>
			</tr>";
            
            
            /////////////this is test data
            echo"<tr>
            <td>A1</td>
            <td>1</td>
            <td>Peter</td>
            <td>he is fat</td>
            <td>11/5/19</td>
            </tr>
            <tr>
            <td>A2</td>
            <td>2</td>
            <td>Lois</td>
            <td>she is skinny</td>
            <td>11/6/19</td>
            </tr>
            <tr>
            <td>A3</td>
            <td>3</td>
            <td>Joe</td>
            <td>he is a cop</td>
            <td>11/7/19</td>
            </tr>
            <tr>
            <td>A4</td>
            <td>4</td>
            <td>Cleveland</td>
            <td>Wears a yellow shirt</td>
            <td>11/8/19</td>
        </tr>";
            ///////////////////////////////
            
            
			/*
			while($row = mysqli_fetch_assoc($result)){
				echo"<tr>
				<td>{$row['cid']}</td>
				<td>{$row['tid']}</td>
				<td>{$row['name']}</td>
				<td>{$row['comment']}</td>
				<td>{$row['date']}</td>
				</tr>";	
			}
			echo"</table>";
			*/			
			$conn->close();
		?>
	
		</table>
		
		<button class="open-button" onclick="openForm()"><b>ADD COMMENT<b></button>

		<div class="form-popup" id="myForm">
		  <form action="/commentspage.php" class="form-container">
			<h1>Add Comment</h1>

			<label for="name"><b>Name</b></label>
			<textarea type="text" placeholder="Enter Name" name="name" required></textarea>

			<label for="comment"><b>Comment</b></label>
			<textarea type="text" placeholder="Enter Comment" name="comment" required></textarea>
			
			<button type="submit" class="btn">Add Comment</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  </form>
		</div>

		<script>
		function openForm() {
		  document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		}
		</script>

		
		
	</body>
</html>
