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
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #9d789b;">

                        </div>
                        <div class="avatar mx-auto bg-white">
                            <img src="Images/family.png" class="rounded-circle img-fluid" />

                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">Rani Rana</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                                <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet eos adipisci,
                                consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #7a81a8;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="Images/friends.png" class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">Lisa Cudrow</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                                <i class="fas fa-quote-left pe-2"></i>Neque cupiditate assumenda in maiores
                                repudi mollitia architecto.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card testimonial-card">
                        <div class="card-up" style="background-color: #6d5b98;"></div>
                        <div class="avatar mx-auto bg-white">
                            <img src="Images/girlboyfriend.png" class="rounded-circle img-fluid" />
                        </div>
                        <div class="card-body">
                            <h4 class="mb-4">John Smith</h4>
                            <hr />
                            <p class="dark-grey-text mt-4">
                                <i class="fas fa-quote-left pe-2"></i>Delectus impedit saepe officiis ab
                                aliquam repellat rem unde ducimus.
                            </p>
                            <hr />
                            <div class="d-flex justify-content-around">
                                <i class="fas fa-edit mr-3" id="update" title="update"></i>
                                <i class="fa-solid fa fa-trash" id="delete" title="delete"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>


    </div>




    <!-- font awesome -->
    <?php require('components/BootstrapJavascript.php'); ?>

</body>

</html>