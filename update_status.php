<?php
    require('DB_Query_Functions.php');
    $tid = $_POST['tid'];
    $status = $_POST['status'];

    update_status($tid, $status);

    header("Location: dashboardpage.php");
    exit();

?>