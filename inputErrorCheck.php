<?php 



	function validateNewTicket($title, $poc_name, $poc_email, $description){

		$ret = "";

		if (strlen($title) > 128){
			$ret = $ret."Your Issue Name should be less than 128 characters \n";
			$ret = $ret."<br>";
		}
		
		if (strlen($poc_email) > 64){
			$ret = $ret."Your email should be less than 64 characters \n";
			$ret = $ret."<br>";	
		}

		if (strlen($poc_name) > 64){
			$ret = $ret."Please keep your name less than 64 characters \n";
			$ret = $ret."<br>";
		}
		
		if (strlen($description) > 65000){
			$ret = $ret."Please keep your comments concise (less than 65,000 characters) \n";
			$ret = $ret."<br>";
		}

		return $ret;
		
	}



?>