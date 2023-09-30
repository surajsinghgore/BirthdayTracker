<!DOCTYPE html>
<html lang="en">
<?php require('./components/HeadTag.php');?>
<body>
    

<!-- require header -->
<?php require('./layout/Header.php');?>
<!-- middleware require -->
<?php require('./middleware/verifyLogin.php'); ?>


<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>