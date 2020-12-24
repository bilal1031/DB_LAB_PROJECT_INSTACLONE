
<!DOCTYPE html>
<html>
<body>
<?php 
    include_once 'connection.php';

     $result = mysqli_query($conn, "SELECT profile_picture from users");
      echo  "<html>";          
     while($row = mysqli_fetch_array($result)){
            echo '<img src="/photos/'.$row['profile_picture'].'">'; 
           
     }
      
      echo "</html>";
?>


</body>
</html>
