<?php
$password = $_GET['psw'];
$login= $_GET['uname'];
    header("Location: http://{$login}:{$password}@localhost:8080/admin/admin.php");
    exit();