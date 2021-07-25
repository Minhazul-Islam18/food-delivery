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

include_once 'partials-main/navbar.php'

?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>











            <?php


$sql = "SELECT * FROM `food`";
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
                    <p class="food-price">$<?php echo$data_viewer['price']?></p>
                    <p class="food-detail">
                    <?php echo substr_replace($data_viewer['description'], "...", 60);?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>/order.php?caught_id=<?php echo $id = $data_viewer['id'];?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>



            <?php  $i++; }?>






<?php


include_once 'config/configure.php';


 if(isset($_POST['Submit'])){

	$title = $_POST['title'];
    $description = $_POST['description'];
    $image_name = $_FILES['image_name']['name'];


    $tmp_img_name=$_FILES['image_name']['tmp_name'];
    move_uploaded_file($tmp_img_name,"../upload/".$image_name);





    $price = $_POST['price'];
	$featured = $_FILES['featured']['name'];



    $tmp_img_name=$_FILES['featured']['tmp_name'];
    move_uploaded_file($tmp_img_name,"../upload/".$featured);


    $category = $_POST['category'];
	$status = $_POST['status'];

	
	$insertering_data="INSERT INTO `food`(`title`, `description`,`image_name`, `price`, `category_id`, `featured`, `active`) VALUES ('$title','$description','$image_name','$price','$category','$featured','$status')";



	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['addpost'] = "Post Added Successfully";
        header('refresh:1;url=manage_food.php');

		// header("location:".SITEURL.'/admin/manage_post.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }



?>

            <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
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
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
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

include_once 'partials-main/footer.php'

?>
    <!-- footer Section Ends Here -->

</body>
</html>