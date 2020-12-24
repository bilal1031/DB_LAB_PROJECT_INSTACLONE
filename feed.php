<?php 

include "retrive_posts.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta charset="UTF-8">
        <title>Feed </title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

                <a href="create_post.php?username=<?php echo $username?>" class="navigation__link">
                    <i class="fa">+</i></span>
                </a>
                <a href="profile.php?curuser=<?php echo $username?>&username=<?php echo $username?>" class="navigation__link">
                    <i class="fa fa-user-o"></i>
                </a>
            </div>
        </nav>
        <main class="feed">
           
            <?php 
               retrive();
            ?>
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
            src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>       

    <script src="js/my_script.js" type="text/javascript"></script>
    </body>
</html>