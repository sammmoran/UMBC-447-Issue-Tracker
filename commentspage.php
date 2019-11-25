<?php
  
  require('DB_Query_Functions.php');
  
  function validComment($comment, $name){
	  
		$ret = "";
		
		if (strlen($name) > 64){
			$ret = $ret."Your name should be less than 64 characters \n";
			$ret = $ret."<br>";	
		}
		
		if (strlen($comment) > 65000){
			$ret = $ret."Please keep your comments concise (less than 65,000 characters) \n";
			$ret = $ret."<br>";
		}

		return $ret;
	  
  }
  
  if ( isset($_POST['name']) && isset($_POST['comment']) && isset($_POST['tid']) ) {
	  if (strlen(validComment($_POST['comment'], $_POST['name'])) == 0){
		  	add_comment( $_POST['tid'], $_POST['name'], $_POST['comment'] );
	  }

    $tid = $_POST['tid'];
    header('Location: commentspage.php?tid='. $tid);
    exit();
  }
?>

<html>
	<head>
		<title>History Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/commentspage.css">    
  </head>
  
	<body>
        
    <button onclick="location.href='dashboardpage.php'" type="button" class="backbutton">
         DASHBOARD</button>
    
    <?php
      if ($_GET) {
        $tid = $_GET['tid'];
		$status = 1;
      }
      else {
        $tid = $_POST['tid'];
		$status = $_POST['status'];
      }     

      $ticketDetails = get_ticket_details($tid);
      echo "<br><h3>--- " . $ticketDetails['title'] . " ---<br><br>" . $ticketDetails['description'] . "</h3><br><br>";

    ?> 

    <center><h1 class="header">COMMENTS</h1></center>
	<table>
		<?php 
     		$store = get_comments_by_ticket($tid);
			echo"<table border = 1>";
			echo"<tr>
			<th><b>Date</b></th>
			<th><b>Commentator</b></th>
			<th><b>Comment</b></th>
			</tr>";
			
			
			foreach($store as $comment){
				echo"<tr>";
				echo "<td width='10%'>" . $comment['date'] . "</td>";	
				echo "<td width='15%'>" . $comment['name'] . "</td>";
				echo "<td>" . $comment['comment'] . "</td>";			
				echo"</tr>";
			}
		?>

	</table>
    
	<br><br><br><br><br><br>
	<?php
	if($status < 3)
	{
		echo(<<<EOS
	<button class="open-button" onclick="openForm()"><b>ADD COMMENT<b></button>

	<div class="form-popup" id="myForm">
		<form action="./commentspage.php" class="form-container" method="post">
		<h1>Add Comment</h1>

			<label for="name"><b>Name</b></label>
			<textarea type="text" placeholder="Enter Name" name="name" required></textarea>

			<label for="comment"><b>Comment</b></label>
			<textarea type="text" placeholder="Enter Comment" name="comment" required></textarea>
			
			<button name="submit" type="submit" class="btn">Add Comment</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      <input type="hidden" name="tid" id="tid" value='$tid'/>
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
EOS
);
	}
	
	
	?>		
		
	</body>
</html>
