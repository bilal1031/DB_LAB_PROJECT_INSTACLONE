<?php

    if(isset($_POST['submit'])){

        $curr_us        = $_GET['curr_us'];
        $new_username   = $_POST['username'];
        $name           = $_POST['name'];
        $pass     = $_POST['password'];
        $email          = $_POST['email'];
        $bio            = $_POST['bio'];
        
        include_once 'connection.php';
        echo $sql = "UPDATE users
                                        SET 
                                            username     = '$new_username',
                                            profile_name = '$name',
                                            password     = '$pass',
                                            email        = '$email',
                                            bio          = '$bio'
                                        WHERE 
                                            username     = '$curr_us' ";
        $result = mysqli_query ($conn,$sql);
        if(!$result){
            echo "SOMETHING WENT WRONG!";
        }
    }
    
    header("Location: edit-profile.php?username=$curr_us");
    exit();
?>