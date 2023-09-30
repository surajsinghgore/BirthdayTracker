
<!DOCTYPE html>
<html lang="en">
<?php require('components/HeadTag.php');?>
<body>
    

<?php
// verify
session_start();
$activeUserId=$_SESSION['activeUserId'];
$activeUserEmail=$_SESSION['activeUserEmail'];


// user not login success
if(!isset($_SESSION['activeUserId'])){
    header('Location: /birthdayTracker/Login.php');

    exit;
}



    



?>



</body>
</html>