<?php
    include "connection.php";

    $commentername = $_POST['username'];
    $comment = $_POST['comment'];
    $id = $_POST['postid'];

    echo $id;
    echo $commentername;
    echo $comment;
  
    $sql = "INSERT INTO comments (commentername,post_id,comment_text) VALUES ('$commentername',$id,'$comment')";
    //$sql = "INSERT INTO comments VALUES (16,'hello','bilal',null);";
    
    
    if ($conn->query($sql)) {
        header("Location:image-detail.php?post_id=$id&username=$commentername&curuser=$commentername");
 
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();


?>