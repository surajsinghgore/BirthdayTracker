

<?php
$alert = false;
$status = "alert-success";
$mainMessage = "Error";
$message = "This is a success alert—check it out!";

  
// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name=$_REQUEST['name'];
$description=$_REQUEST['description'];
$dob=$_REQUEST['dob'];
$relationship=$_REQUEST['relationship'];
$reminder=$_REQUEST['reminder'];

if ((trim($name) == '') || (trim($description) == '') || (trim($dob) == '') || (trim($relationship) == '') || (trim($reminder) == '')) {
    $alert = true;
    $mainMessage = "Warning !";
    $status = "alert-warning";
    $message = "Please Fill All the Fields Properly ";
    exit;
  }


  

// get foreign key
session_start();
$activeUserId = $_SESSION['activeUserId'];

// established connection
require('./database/connection.php');
// insert query
$insertQuery="INSERT INTO `wishes` (`userId`,`description`, `dob`, `relation`, `reminder`) VALUES ($activeUserId,'$description', '$dob', '$relationship', '$reminder')";
$res=mysqli_query($connection,$insertQuery);
// on success
if($res){
    $alert = true;
    $mainMessage = "Success !";
    $status = "alert-success";
    $message = "Birthday successfully marked in calender";
    header('Location: /birthdayTracker/');

}
// on error
else{

    $alert = true;
    $mainMessage = "Error !";
    $status = "alert-error";
    $message = "Sorry Something went wrong ,Please Try again";

}
    

mysqli_close($connection);





}


?>

<!DOCTYPE html>
<html lang="en">
<?php require('./components/HeadTag.php'); ?>
<!-- css -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .container {

        max-width: 660px;
        margin: 5% auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 20px;
        margin-right: 3%;
    }

    .form-group1 {
        display: flex;
        margin-bottom: 3%;

    }

    .form-group1 div {
        display: flex;
        margin-right: 2%;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 2%;
    }

    input[type="text"],
    textarea,
    input[type="datetime-local"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        margin-top: 3%;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>
    <? require('./middleware/verifyLogin'); ?>
    <?php if ($alert) {
        echo "<div class=\"alert $status alert-dismissible fade show\" role=\"alert\">
  <strong>$mainMessage</strong> $message
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
    } ?>


    <div class="container">
        <h2>Create a New Event</h2>
        <form id="eventForm" action="AddBirthday.php" method="POST">
            <div class="form-group">
                <label for="title">Name of Person</label>
                <input type="text" id="title" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description about your relationship </label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Birthday Date:</label>
                <input type="date" id="date" name="dob" min="1920-01-01"  max="<?php echo date("Y-m-d"); ?>" required>
            </div>


            <label for="family">Relationship with this person</label>
            <div class="form-group1">
                <div class="div">
                    <input type="radio" id="family" name="relationship" value="family" checked>
                    <label for="family">Family Member</label>
                </div>
                <div class="div">
                    <input type="radio" id="bestFriend" name="relationship" value="bestFriend">
                    <label for="bestFriend">Best Friend</label>
                </div>

                <div class="div">
                    <input type="radio" id="girlfriend" name="relationship" value="girl/boyfriend">
                    <label for="girlfriend">Girl/Boy friend</label>
                </div>
                <div class="div">
                    <input type="radio" id="other" name="relationship" value="other">
                    <label for="other">Other</label>
                </div>
            </div>


            <div class="form-group">
                <label for="reminder">Reminder Date Every Year:</label>
                <input type="datetime-local" id="reminder" name="reminder"
                min="1920-01-01T12:00"
      max="<?php echo date("Y-m-d"); ?>T<?php date_default_timezone_set('Asia/Kolkata'); echo date('h:i:s a', time());?>"
                required
              
                >
               
            </div>
            <input type="submit" value="submit">
        </form>
    </div>


    <?php require('./components/BootstrapJavascript.php'); ?>

<!-- prevent page from re-submit data on page refresh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
   
</body>

</html>