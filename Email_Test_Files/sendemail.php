<?php

$title =  $_POST['title'];
$poc_name =  $_POST['name'];
$poc_email =  $_POST['email'];
$description =  $_POST['desc'];

// the message
$msg = "This is a test email for CMSC447 Project";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$poc_email","Test Email For Issue Tracker",$msg);

?>