<?php
    $id = $_GET['id'];
    $id = (int) $id;
    $mysqli = new mysqli("mysql", "user", "mypass", "appDB2");
    $result = $mysqli->query("DELETE FROM orders WHERE id=$id");
    header("Location: http://localhost:8080/index.php");
    exit();
