<?php
    require('DB_Query_Functions.php');
    $tid = $_POST['del_tid'];

    delete_ticket($tid);

    header("Location: dashboardpage.php");
    exit();

?>