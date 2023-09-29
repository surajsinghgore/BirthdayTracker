<?php
$host="localhost";
$password="";
$username="root";
$db="birthdaytracker";
$connection=mysqli_connect($host,$username,$password,$db);
if(mysqli_connect_error()){
    $alert = true;
    $mainMessage = "Server Internal Error !";
    $status = "alert-danger";
    $message = "Sorry Internal Server Error, Please Try Again After Some Time";

}
?>