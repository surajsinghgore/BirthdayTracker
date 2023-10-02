<?php
function delete($id){

    echo "<h1>$id</h1>";
}

?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/HeadTag.php'); ?>

<style>
    .testimonial-card .card-up {
        height: 120px;
        overflow: hidden;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    .testimonial-card .avatar {
        width: 110px;
        margin-top: -60px;
        overflow: hidden;
        border: 3px solid #fff;
        border-radius: 50%;
    }

    #update:hover {
        color: blue;
        cursor: pointer;
    }

    #delete:hover {
        cursor: pointer;

        color: red;
    }
</style>

<body>

    <div class="container">

        <!-- card section -->
        <section>
            <div class="row d-flex justify-content-center">

                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="mb-4 mt-5">Your Birthday List</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        Below is the list which you added
                    </p>
                </div>
            </div>


        

       <div class="row text-center mb-5">


           <!-- fetching data -->

           <?php 
            
            require('database/connection.php');
            $activeUserId=$_SESSION['activeUserId'];
            $fetchQuery="select*from wishes where userId=$activeUserId";
            $res = mysqli_query($connection, $fetchQuery);
// $data=mysqli_fetch_array($res); // return all cells in single single array
$len = mysqli_num_rows($res); // return rows in tables

// row wise printing
$count=0;
while ($data = mysqli_fetch_array($res)) {
   $count++;

   

if($count<4){
$imgPath="";
if($data['relation']=="family"){
    $imgPath="Images/family.png";
}
else if($data['relation']=="bestFriend"){
    $imgPath="Images/friends.png";
}
else if($data['relation']=="girl/boyfriend"){
    $imgPath="Images/girlboyfriend.png";
}
else {
    $imgPath="Images/other.png";
}


if($count==1){
    echo '<div class="col-md-4 mb-5 mb-md-0 pb-5">
    <div class="card testimonial-card">
        <div class="card-up pt-2" style="background-color: #9d789b;">
    '.$data['relation'].'
        </div>
        <div class="avatar mx-auto bg-white">
     
            <img src="'.$imgPath.'" class="rounded-circle img-fluid" />
    
        </div>
        <div class="card-body">
            <h4 class="mb-4">'.$data['name'].'</h4>
            <hr />
            <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>'.$data['description'].'
            </p>

            <div class="text-center">
            <i class="fa fa-calendar" aria-hidden="true"></i> '.$data['dob'].'
        
            </div>
            <div class="text-center mt-2">
            <i class="fa fa-bell" aria-hidden="true"></i>  '.$data['reminder'].'
            </div>


            <hr />
                <div class="d-flex justify-content-around">
                    <i class="fas fa-edit mr-3" id="update" title="update" onclick="update_birthday('.$data['id'].')" ></i>
                    <i class="fa-solid fa fa-trash" id="delete" title="delete" 
                    onclick="delete_birthday('.$data['id'].')"
                    ></i>
                </div>
        </div>
    </div>
    </div>';

}
if($count==2){
    echo '<div class="col-md-4 mb-5 mb-md-0 pb-5">
    <div class="card testimonial-card">
    <div class="card-up" style="background-color: #7a81a8;"></div>
    <div class="avatar mx-auto bg-white">
            <img src="'.$imgPath.'" class="rounded-circle img-fluid" />
    
        </div>
        <div class="card-body">
            <h4 class="mb-4">'.$data['name'].'</h4>
            <hr />
            <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>'.$data['description'].'
            </p>
            <div class="text-center">
            <i class="fa fa-calendar" aria-hidden="true"></i> '.$data['dob'].'
        
            </div>
            <div class="text-center mt-2">
            <i class="fa fa-bell" aria-hidden="true"></i>  '.$data['reminder'].'
            </div>

            <hr />
                <div class="d-flex justify-content-around">
                    <i class="fas fa-edit mr-3" id="update" title="update"
                    onclick="update_birthday('.$data['id'].')"
                    ></i>
                    <i class="fa-solid fa fa-trash" id="delete" title="delete"
                    onclick="delete_birthday('.$data['id'].')"
                    ></i>
                </div>
        </div>
    </div>
    </div>';

}
if($count==3){

    echo '<div class="col-md-4 mb-5 mb-md-0 pb-5">
    <div class="card testimonial-card">
    <div class="card-up" style="background-color: #6d5b98;"></div>
        <div class="avatar mx-auto bg-white">
            <img src="'.$imgPath.'" class="rounded-circle img-fluid" />
    
        </div>
        <div class="card-body">
            <h4 class="mb-4">'.$data['name'].'</h4>
            <hr />
            <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>'.$data['description'].'
            </p>
            <div class="text-center">
            <i class="fa fa-calendar" aria-hidden="true"></i> '.$data['dob'].'
        
            </div>
            <div class="text-center mt-2">
            <i class="fa fa-bell" aria-hidden="true"></i>  '.$data['reminder'].'
            </div>
            <hr />
                <div class="d-flex justify-content-around">
                    <i class="fas fa-edit mr-3" id="update" title="update"
                    onclick="update_birthday('.$data['id'].')"
                    ></i>
                    <i class="fa-solid fa fa-trash" id="delete" title="delete"
                    onclick="delete_birthday('.$data['id'].')"
                    ></i>
                </div>
        </div>
    </div>
    </div>';
    $count=0;
}
}




}
mysqli_close($connection);
            ?>
       



    
  


    
</div>
        </section>


    </div>

    <script>
function delete_birthday(num) {
    console.log(num);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  request.open("GET", "deleteBirthday.php", true);
  request.send();
}


function update_birthday(num) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
      location.reload();
    }
  };
  request.open("GET", "updateBirthday.php", true);
  request.send();
}
</script>


    <!-- font awesome -->
    <?php require('components/BootstrapJavascript.php'); ?>

</body>

</html>