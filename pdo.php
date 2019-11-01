<?php
    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=issue_tracker', 
    'cmsc447', 'demo');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
