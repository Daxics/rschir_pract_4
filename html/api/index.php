<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

require 'connect.php';
require 'functions.php';

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
if (isset($params[1])) {
    $id = $params[1];
}


$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        if ($type === 'posts') {
            if (isset($id)) {
                getPost($mysqli, $id);
            } else {
                getPosts($mysqli);
            }
        }
        break;
    case 'POST':
        if ($type === 'posts') {
            addPosts($mysqli, $_POST, $_FILES);
        }
        break;
    case 'PATCH':
        if ($type === 'posts') {
            if (isset($id)) {
                $data = json_decode(file_get_contents("php://input"), true);
                updatePosts($mysqli, $id, $data);
            }
        }
        break;
    case 'DELETE':
        if ($type === 'posts') {
            if (isset($id)) {
                deletePosts($mysqli, $id);
            }
        }
        break;
}
