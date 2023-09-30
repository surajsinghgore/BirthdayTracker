
<!DOCTYPE html>
<html lang="en">
<?php require('components/HeadTag.php');?>
<body>
    

<?php
// verify
$activeUserId=$_SESSION['activeUserId'];
$activeUserEmail=$_SESSION['activeUserEmail'];
$activeUserDob=$_SESSION['activeUserDob'];

// user not login success
if(!isset($_SESSION['activeUserId'])){
    header('Location: /birthdayTracker/Login.php');
    
    exit;
}

    // take user DOb First time for new user
 //0-> if success , 1->if not 
    if(strcmp(gettype($activeUserDob),'NULL')){
       
        
    }
else{
 header('Location: /birthdaytracker/TakeDOBFromUser.php');
 exit;

}

    



?>



</body>
</html>