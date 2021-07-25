<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php

    include_once 'partials-main/navbar.php';

?>
    <!-- Navbar Section Ends Here -->

<?php


    if(isset($_GET['caught_id'])){
       $cat_id =  $_GET['caught_id'];





       $sql = "SELECT title FROM `category` WHERE id =  $cat_id";
       $data = mysqli_query($connt,$sql);
       
       
       $i = 1;
       foreach ($data as $data_viewer) {




    

       }


       
    }else{
        header('location:'.SITEURL);
    }



        ?>







    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $data_viewer['title'];?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            

                <?php


$sql = "SELECT * FROM `food` WHERE category_id=$cat_id";
$data = mysqli_query($connt,$sql);


$i = 1;
foreach ($data as $data_viewer) {?>


<div class="food-menu-box">
                <div class="food-menu-img">
                <?php



if ($data_viewer['featured'] == "") {
    echo "Image not Found";
} else {
    ?>

    <img src="upload/<?php echo$data_viewer['featured']?>" alt="<?php echo$data_viewer['featured']?>" class="img-responsive img-curve">
    <?php
}






?>
                </div>


                <div class="food-menu-desc">
                    <h4><?php echo$data_viewer['title']?></h4>
                    <p class="food-price"><?php echo$data_viewer['price']?></p>
                    <p class="food-detail">
                    <?php echo substr_replace($data_viewer['description'], "...", 60);?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>/order.php?caught_id=<?php echo $id = $data_viewer['id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


            <?php  $i++; }?>
            <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div> -->


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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