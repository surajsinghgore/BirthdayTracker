

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">

          <img src="Images/logo.png" alt="logo" width="40" height="45" class="bi me-2" />
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Dashboard</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <?php
          // user is login
          session_start();
          if ($_SESSION['activeUserId']) {
            echo " <button type=\"button\" class=\"btn btn-outline-light me-2\"><a href=\"/birthdayTracker/Logout.php\" class=\"text-reset text-decoration-none\">Logout</a></button>";
          }
          // user not login
          else {

            echo " <button type=\"button\" class=\"btn btn-outline-light me-2\"><a href=\"/birthdayTracker/Login.php\" class=\"text-reset text-decoration-none\">Login</a></button>
            <button type=\"button\" class=\"btn btn-outline-light me-2\"><a href=\"/birthdayTracker/Signup.php\" class=\"text-reset text-decoration-none\">Sign-Up</a></button>";
          }
         
          ?>


        </div>
      </div>
    </div>
  </header>




  <!-- bootstrap js  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>