<?php
    include "connection.php";
    function usercheck($username){
        $flag = false;
             include "connection.php";
             $query = "SELECT 1 AS verified FROM users WHERE username = '$username';";
             $result = $conn->query($query);
             $row = mysqli_fetch_array($result);
             echo $row['verified'];
             if($row['verified']){
                    $flag = true;
             }else{
                    $flag = false;
             }
            return $flag;
    }
    if(isset($_POST["register"]))
    {   
        $username = $_POST['username'];
        $password =  $_POST['password'];
        $profilename = $_POST['profilename'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];

        if (isset($_POST['register'])) {
            if(usercheck($username)){
              // echo "working";
               header("Location:registration.php?reg=0");
               exit();
            }else{
                echo "here";

                $image = $_FILES['image']['name'];
                /*if (file_exists($image)) {
                    echo "The file $image exists";
                } else {
                    echo "The file $image does not exist";
                }
                if(is_uploaded_file($_FILES['image']['tmp_name'])){
                        echo "uploaded<br>";
                }*/
                echo  $target =  "C:/xampp/htdocs/photos/".basename($_FILES['image']['name']);
                try{
                    if (copy($_FILES['image']['tmp_name'],$target)) {
                        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                        echo '<p>Uploaded image: <img src="' . $target . '"></p>';
                    }
                    else{
                        echo "not done";
                    } 
                 }
                 catch (Exception $e) {
                    echo $e->getMessage();
                }
                
                $query = "INSERT INTO users (username,password,profile_name,profile_picture,email,bio) VALUES ('$username','$password','$profilename','$image','$email','$bio')";
            
                if(mysqli_query($conn, $query)){
                   
                    $conn->close();
                    header("Location:index.php");
                    exit();

                }else{
                    $conn->close();
                    header("Location:registration.php?reg=0");
                    exit();
                    echo("Error description: " . mysqli_error($conn));
                }
            }
            
        }
    }else{
            header("Location:404.php");
            exit(); 
    }  

 ?>