<?php

function getPost($mysqli, $id)
{
    $post = $mysqli->query("SELECT * FROM `posts` WHERE `id` = '$id'");
    if (mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "massage" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}


function getPosts($mysqli)
{
    $posts = $mysqli->query("SELECT * FROM posts");
    $postsList = [];
    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    echo json_encode($postsList);
}


function addPosts($mysqli, $data, $file_data)
{
    if (empty($data['disc']) || empty($file_data['file'])) {
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];
        echo json_encode($res);
    } else {
        $disc = $data['disc'];
        $img = addslashes(file_get_contents($file_data['file']['tmp_name']));
        $img = base64_encode($img);
        $mysqli->query("INSERT INTO posts VALUES (NULL, '$disc' ,'$img')");
        http_response_code(201);
        $res = [
            "status" => true,
            "post_id" => mysqli_insert_id($mysqli)
        ];
        echo json_encode($res);
    }
}

function updatePosts($mysqli, $id, $data)
{
    if (empty($data['disc']) || empty($data['disc'])) {
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];

        echo json_encode($res);
        return;
    }

    $discription = $data['disc'];
    $mysqli->query("UPDATE posts SET disc = '$discription' WHERE id = '$id'");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Order is updated'
    ];

    echo json_encode($res);
}


function deletePosts($mysqli, $id)
{
    $id = intval($id);
    $mysqli->query("DELETE FROM `posts` WHERE `posts`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Post is deleted'
    ];
    echo json_encode($res);
}
