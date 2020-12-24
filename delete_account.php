<?php
   include "connection.php";
    $username = $_GET['username'];
    $sql = "DELETE FROM users WHERE username = '$username';";
    $confirm = $_GET['confirmation'];    

    if($confirm){
        if(mysqli_query($conn,$sql)){
            header("Location:index.php");
            exit();
        }
    }else{
        echo '<!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Profile</title>
                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
                        <link href="css/style.css" rel="stylesheet">
                        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    </head>
                    <body>
                        <div class="popUp " style= "display: block;">
                            <div class="popUp__container">
                                <div class="popUp__buttons">
                                    <a href="#" class="popUp__button">Are you sure?</a>
                                    <a href="delete_account.php?username=<?php echo $username?>&confirmation=1" class="popUp__button">Yes</a>
                                    <a href="index.php" class="popUp__button" id="cancelPopUp">No</a>
                                </div>
                            </div>
                        </div>
                        <script
                        src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous"></script>
                        <script src="js/app.js"></script>
                    </body>
                </html> ';

    }


?>
