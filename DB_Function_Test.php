<?php
    require("DB_Query_Functions.php");

    $title =  $_POST['title'];
    $poc_name =  $_POST['name'];
    $poc_email =  $_POST['email'];
    $description =  $_POST['desc'];

    add_ticket($title, $poc_name, $poc_email, $description);

?>