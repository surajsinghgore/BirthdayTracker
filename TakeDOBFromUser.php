<?php

$alert = false;
$status = "alert-success";
$mainMessage = "Error";
$message = "This is a success alert—check it out!";
// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // handle user data
  session_start();
  $activeUserId = $_SESSION['activeUserId'];
  $activeUserDob = $_SESSION['activeUserDob'];
$dateofbirthDOB=$_REQUEST['dateofbirthDOB'];
  if ((is_null($dateofbirthDOB))) {
    $alert = true;
    $mainMessage = "Warning !";
    $status = "alert-warning";
    $message = "Please Fill DOB Fields Properly ";
  }

  // check whether user already registered or not 

  require('./database/connection.php');
  $resultGet = mysqli_query($connection, "update users set dob='$dateofbirthDOB' where id=$activeUserId");
  // no user found
  if ($resultGet == 0) {

    $alert = true;
    $mainMessage = "Server Error !";
    $status = "alert-warning";
    $message = "Please try Again ";

    header('Location: /birthdayTracker/Logout.php');
    exit;
  }
  //success
  else {
    $alert = true;
    $mainMessage = "Update !";
    $status = "alert-success";
    $message = " DOB SuccessFully Insert ";
    $_SESSION['activeUserDob'] = $dateofbirthDOB;
    // header('Location: /birthdayTracker');
  }




  //0 if success 1 if not 
  if (strcmp(gettype($activeUserDob), 'string')) {
     

  }
  // /success
  else{

    header('Location: /birthdaytracker/');
    exit;
}

}
?>



<!DOCTYPE html>
<html lang="en">
<?php require('./components/HeadTag.php'); ?>
<style>
  [type="date"] {
    background: #fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png) 97% 50% no-repeat;
  }

  [type="date"]::-webkit-inner-spin-button {
    display: none;
  }

  [type="date"]::-webkit-calendar-picker-indicator {
    opacity: 0;
  }

  /* custom styles */

  label {
    display: block;
  }

  input {
    border: 1px solid #c4c4c4;
    border-radius: 5px;
    background-color: #fff;
    padding: 3px 5px;
    box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
    width: 190px;
  }
</style>

<body>

  <!-- require header -->
  <?php require('./layout/Header.php'); ?>
  <?php if ($alert) {
    echo "<div class=\"alert $status alert-dismissible fade show\" role=\"alert\">
  <strong>$mainMessage</strong> $message
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
  } ?>


  <div class="container text-center">
    <form action="TakeDOBFromUser.php" method="POST">
      <h1 class="mt-5">ENTER YOUR DOB</h1>
      <label for="dateofbirth">DOB</label>
      <div class="mt-1">

        <input type="date" name="dateofbirthDOB" id="dateofbirth">
      </div>
      <input type="submit" value="Submit" class="btn btn-primary btn-block mb-4" style="margin-top:2%" />

    </form>
  </div>

  <?php require('./components/BootstrapJavascript.php'); ?>


</body>

</html>