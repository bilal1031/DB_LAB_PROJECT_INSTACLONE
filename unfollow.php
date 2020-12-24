<?php
    include_once 'connection.php';
    
    $follower     = $_GET['follower'];
    $unfollowing  = $_GET['unfollowing'];

    $remove_relation     = mysqli_query ($conn, "DELETE FROM followings
                                                 WHERE  username = '$follower' 
                                                            AND 
                                                        following = '$unfollowing' " 
                                        );
    
    if($remove_relation){
        $decrement_follower  = mysqli_query ($conn, " UPDATE users 
                                                      SET followers  = followers - 1
                                                      WHERE username = '$unfollowing'"
                                            );
    
        $decrement_following = mysqli_query ($conn, " UPDATE users 
                                                      SET following = following - 1
                                                      WHERE username = '$follower'"
                                            );
    }                     

    header("Location: profile.php?curuser=$follower&username=$unfollowing");
    exit();
?>