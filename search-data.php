<?php
    function getdata(){
         $susername = $_POST['susername'];
         $username = $_POST['myuser'];

        include "connection.php";
   
        $sql = "SELECT profile_picture,username,profile_name from users where username like '".$susername."%'";

        $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
       
                    echo  '<li class="people__person">
                                <div class="people__column">
                                    <div class="people__avatar-container">
                                        <img 
                                            src="/photos/'.$row['profile_picture'].'"
                                            class="people__avatar"
                                        />
                                    </div>
                                    <div class="people__info">
                                        <span class="people__username">'.$row['username'].'</span>
                                        <span class="people__full-name"'.$row['profile_name'].'</span>
                                    </div>
                                </div>
                                <div class="people__column">
                                    <a href="profile.php?curuser='.$_POST['myuser'].'&username='.$row['username'].'">Show Profile</a>
                                </div>
                            </li>';
                }   
               

            }
    }




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Explore | Instaclone</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <nav class="navigation">
            <a href="feed.php?username=<?php echo $username;?>">
                <img 
                    src="images/navLogo.png"
                    alt="logo"
                    title="logo"
                    class="navigation__logo"
                />
            </a>
            <div class="navigation__search-container">
             <form action="search-data.php" method="post">
                <i class="fa fa-search"></i>
                <input type="text" name ="susername"placeholder="Search">
                <input type="hidden" name ="myuser" value ="<?php echo $username;?>">
                <input type="submit" value="Search"></input>
              </form>
            </div>
            <div class="navigation__icons">
                <a href="explore.html" class="navigation__link">
                    <i class="fa fa-compass"></i>
                </a>
                <a href="#" class="navigation__link">
                    <i class="fa fa-heart-o"></i>
                </a>
                <a href="profile.php?curuser=<?php echo $_POST['myuser']?>&username=<?php echo $_POST['myuser']?>" class="navigation__link">
                    <i class="fa fa-user-o"></i>
                </a>
            </div>
        </nav>
        <main class="explore">
            <section class="people">
                <ul class="people__list">
                            <?php getdata();?>
                </ul>
            </section>
        </main>
        <footer class="footer">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">about us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">language</a></li>
                </ul>
            </nav>
            <span class="footer__copyright">© 2017 instagram</span>
        </footer>
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
        <script src="js/app.js"></script>
    </body>
</html>