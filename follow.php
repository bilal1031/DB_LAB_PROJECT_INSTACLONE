<?php
    include_once 'connection.php';
    
    $follower   = $_GET['follower'];
    $following  = $_GET['following'];
    $sql = " INSERT INTO  followings (username, following) 
                VALUES ('$follower','$following');" ;
    
    if(mysqli_query ($conn,$sql)){

        $increment_following = mysqli_query ($conn, " UPDATE users 
                                                      SET following = following + 1
                                                      WHERE username = '$follower';"
                                            );

        $increment_follower  = mysqli_query ($conn, " UPDATE users 
                                                      SET followers  = followers + 1
                                                      WHERE username = '$following';"
                                            );
        if($increment_following){
            echo "done";
        }
    

    }                     

    header("Location: profile.php?curuser=$follower&username=$following");
    exit();
?>