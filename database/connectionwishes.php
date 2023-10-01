<?php
//server connection Setup
// $host="localhost";
// $dbPassword="Suraj@3224";
// $dbUsername="id21329873_birthdaytracker01";
// $db="id21329873_birthdaytracker";
// $connection=mysqli_connect($host,$dbUsername,$dbPassword,$db);
// if(mysqli_connect_error()){
//     $alert = true;
//     $mainMessage = "Server Internal Error !";
//     $status = "alert-danger";
//     $message = "Sorry Internal Server Error, Please Try Again After Some Time";

// }


// local System Setup
$host="localhost";
$conPassword="";
$conUsername="root";
$db="wishes";
$connectionWishes=mysqli_connect($host,$conUsername,$conPassword,$db);
if(mysqli_connect_error()){
    $alert = true;
    $mainMessage = "Server Internal Error !";
    $status = "alert-danger";
    $message = "Sorry Internal Server Error, Please Try Again After Some Time";

}
?>