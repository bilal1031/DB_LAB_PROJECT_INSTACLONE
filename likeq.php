<?php
    include_once 'connection.php';
    $post_id = $_GET['post_id'];
    $ousername = $_GET['username'];  
    $curuser = $_GET['curuser'];    
    $isliked = $_GET['isliked'];

    if(!$isliked){
        $sql = "INSERT INTO likes (post_id,likername) VALUES ($post_id,'$curuser');";
        $sql1 = "UPDATE posts SET likes = likes +1 WHERE post_id = $post_id";

        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);
    }else{
        $sql = "DELETE FROM likes WHERE post_id = $post_id;";
        $sql1 = "UPDATE posts SET likes = likes - 1 WHERE post_id = $post_id";
        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);

    }

    header("Location:image-detail.php?curuser=$curuser&username=$ousername&post_id=$post_id");
    exit();







?>