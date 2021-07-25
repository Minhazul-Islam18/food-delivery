<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .box-3 {
	width: 28%;
	float: left;
	margin: 2%;
	transition: 1s;
}
.box-3:hover h3 {
	bottom: 40%;
	left: 40%;
	transition: 1s;
	transition-timing-function: ease;
	transition-property: all;
	transform: rotate(360deg);
}
    </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php

    include_once 'partials-main/navbar.php';

?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>



            <?php


$sql = "SELECT * FROM `category`";
$data = mysqli_query($connt,$sql);


$i = 1;
foreach ($data as $data_viewer) {?>







    <a href="category-foods.html">
    <div class="box-3 float-container">



    <?php



    if ($data_viewer['featured'] == "") {
        echo "Image not Found";
    } else {
        ?>

        <img src="upload/<?php echo$data_viewer['featured']?>" alt="<?php echo$data_viewer['featured']?>" class="img-responsive img-curve">
        <?php
    }
    
        ?>






        

        <h3 class="float-text text-white"><?php echo$data_viewer['title']?></h3>
    </div>
    </a>

    


    <?php  $i++; }?>




            <!-- <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a> -->

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php

include_once 'partials-main/footer.php';

?>
    <!-- footer Section Ends Here -->

</body>
</html>