<?php
    $username = $_GET['username'];


   
    function retrive_comments($postid){
            include "connection.php";
            $sql = "SELECT commentername,comment_text FROM comments WHERE post_id = $postid LIMIT 1;";
            $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo  "<li class='photo__comment'>
                            <span class='photo__comment-author'>".$row['commentername']."</span>".$row['comment_text']."
                            </li>";
                }   
               

            }
    }
    function retrive(){
    
    include "connection.php";
    $username = $_GET['username'];

    $followerpost; 
    $followername; 
    $followerpostphoto; 
    $postdate;
    $postid;
    $text;


    $sql = "SELECT * FROM posts WHERE posts.post_id IN (SELECT max(posts.post_id) FROM posts
											INNER JOIN followings ON posts.username = followings.following 
											AND followings.username = '$username' GROUP BY posts.username);";

    $result = $conn->query($sql);

    

        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
           // $followerpost = $row['text']; 
            $followername = $row['username']; 
            $followerpostphoto = "/photos/".$row['photo']; 
            $postdate = $row['time_stamp']; 
            $postid = $row['post_id'];
            $likes = $row['likes'];
            $text = $row['text'];
            $sql1 = "SELECT profile_picture from users where username = '$followername';";
            $result1 = $conn->query($sql1);
            $row1 = mysqli_fetch_array($result1);
            $profile_pic = "/photos/".$row1['profile_picture'];

            echo "<section class='photo'>
                <header class='photo__header'>
                    <div class='photo__header-column'>
                        <img
                            class='photo__avatar'
                            src='$profile_pic'
                        />
                    </div>
                    <div class='photo__header-column'>
                        <a href ='profile.php?curuser=$username&username=$followername' class='photo__username'>
                        $followername</a>
                        <span class='photo__location'></span>
                    </div>
                </header>
                <div class='photo__file-container'>
                    <img
                        class='photo__file' ;width=50;height=500;
                        src='$followerpostphoto'
                    />
                </div>
                <div class='photo__info'>
                    <div class='photo__icons'>
                        <span class='photo__icon'> 
                             <a href = 'image-detail.php?post_id=".$postid."&username=".$followername."&curuser=".$_GET['username']."' class='fa fa-heart-o heart fa-lg'></a>
                        </span>
                        <span class='photo__icon'>
                            <a href =  'image-detail.php?post_id=".$postid."&username=".$followername."&curuser=".$_GET['username']."'  class='fa fa-comment-o fa-lg'></a>
                        </span>
                    </div>
                    <span class='photo__likes'>$likes likes</span>
                    <ul class='photo__comments'>
                         <li class='photo__comment'>
                            <span class='photo__comment-author'>$followername</span>$text;
                        </li>

                        ";
                retrive_comments($postid);

                echo "</ul>
                    <a href = 'image-detail.php?post_id=".$postid."&username=".$username."&curuser=".$_GET['username']."' class='phpto__comment' style='font-weight:bold'>see more...</a>
                    <span class='photo__time-ago'></span>
                  
                    <span class='photo__time-ago'>$postdate</span>
                    
                </form>
                    </div>
                </div>
            </section>";
        }
        } else {
                echo "No user found!";
        }
        $conn->close();
    }
  
?>