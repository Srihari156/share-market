<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=share_market', 'root', '');
    } catch (PDOException $e) {
        die('connection failed \n'. $e->getMessage());
    }
?>