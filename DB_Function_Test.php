<?php
    require("DB_Query_Functions.php");

    $title =  $_POST['title'];
    $poc_name =  $_POST['name'];
    $poc_email =  $_POST['email'];
    $description =  $_POST['desc'];
    $tid = $_POST['tid'];
    $comment = $_POST['comment'];

    add_ticket($title, $poc_name, $poc_email, $description);
    add_comment($tid, $poc_name, $comment);
    update_status(3, "In Progress");
    update_status(1, "Closed - Pending Approval");

?>