<?php
$alert = false;
$status = "alert-success";
$mainMessage = "Error";
$message = "This is a success alert—check it out!";
// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // handle user data
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];
    // check null values error
    if (($username == "") || ($email == "") || ($password == "") || ($confirm_password == "")) {

        $alert = true;
        $mainMessage = "Warning !";
        $status = "alert-warning";
        $message = "Please Fill All the Fields Properly ";
    }
     if(($password!=$confirm_password)){
        $alert = true;
        $mainMessage = "Warning !";
        $status = "alert-warning";
        $message = "Password And Confirm Password Not match";
     
    }else{
        // check whether user already registered or not 

        require('./database/connection.php');
        $resultGet = mysqli_query($connection,"SELECT * FROM users where email='$email'");
        $rows = mysqli_num_rows($resultGet);

if($rows>0){
    $alert = true;
    $mainMessage = "Duplicate account Warning !";
    $status = "alert-warning";
    $message = "User Already Exits With this Email";

}else{
$insertQuery="INSERT INTO `users` ( `username`, `email`, `password`) VALUES ( '$username', '$email', '$password')";
$resultGet = mysqli_query($connection,$insertQuery);
$alert = true;
$mainMessage = "Account Created !";
$status = "alert-success";
$message = "Account Registered SuccessFully ";
 $_REQUEST['username']=" ";
 $_REQUEST['email']=" ";
 $_REQUEST['password']=" ";
 $_REQUEST['confirm_password']=" ";
}


       
    }
} else {
    $alert = true;
    $mainMessage = "Server Error !";
    $status = "alert-danger";
    $message = "Only Post Request Is Allowed ! ";
}
?>



<!DOCTYPE html>
<html lang="en">
<?php require('./components/HeadTag.php'); ?>

<body>
    <?php if ($alert) {
        echo "<div class=\"alert $status alert-dismissible fade show\" role=\"alert\">
  <strong>$mainMessage</strong> $message
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
    } ?>
    <div class="container w-50 p-3 mt-5 shadow p-3 mb-5 bg-white rounded pt-5">


        <form action="Signup.php" method="POST">
            <!-- name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">User Name</label>
                <input type="text" id="form2Example1" class="form-control" maxlength="30" name="username" required value="<?php if(isset($_REQUEST['username'])){echo $_REQUEST['username'];}?>" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Email address</label>
                <input type="email" id="form2Example2" maxlength="40" class="form-control" name="email" required value="<?php if(isset($_REQUEST['email'])){echo $_REQUEST['email'];}?>" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example3">Password</label>
                <input type="password" id="form2Example3" maxlength="30" class="form-control" name="password" required />
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example4">Confirm Password</label>
                <input type="password" id="form2Example4" maxlength="30" class="form-control" name="confirm_password" required />
            </div>

            <!-- Submit button -->

            <input type="submit" value="Sign up" class="btn btn-primary btn-block mb-4" />

            <!-- Register buttons -->
            <div class="text-center">
                <p>already have account? <a href="/birthdayTracker/Login.php">Login</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </div>


    <?php require('./components/BootstrapJavascript.php'); ?>
</body>

</html>