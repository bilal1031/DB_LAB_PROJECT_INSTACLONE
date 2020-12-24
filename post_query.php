<?php 
            include "connection.php";
            if(isset($_POST['button'])){
                         $username = $_POST['username'];
                         $text = $_POST['text'];
                         $image = $_FILES['image']['name'];
                         $target =  "C:/xampp/htdocs/photos/".basename($_FILES['image']['name']);
                         $name = basename($_FILES['image']['name']);
                            try{
                                if (copy($_FILES['image']['tmp_name'],$target)) {
                                    $sql = "INSERT INTO posts (username,photo,text) VALUES ('$username','$image','$text');";
                                    if($conn->query($sql)){
                                            $sql1 = "UPDATE users SET posts = posts + 1 WHERE username = '$username';";
                                            if($conn->query($sql1)){

                                                header("Location:feed.php?username=$username");
                                                exit();
                                            }

                                    }
                                }
                                else{
                                    echo "not done";
                                } 
                            }
                            catch (Exception $e) {
                                echo $e->getMessage();
                            } 

                }else{
                         header("Location:404.php");
                         exit();

                }




?>