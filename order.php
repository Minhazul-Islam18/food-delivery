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
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>


            <?php

    if(isset($_GET['caught_id'])){

        $cat_id =  $_GET['caught_id'];





        $sql = "SELECT * FROM `food` WHERE id =  $cat_id";
        $data = mysqli_query($connt,$sql);
        
        
        $i = 1;
        foreach ($data as $data_viewer) {?>



            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

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
                    <input type="hidden" name="food" id="" value="<?php echo$data_viewer['title']?>">
                    <p class="food-price">$<?php echo$data_viewer['price']?></p>
                    <input type="hidden" name="price" id="" value="<?php echo$data_viewer['price']?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                


                <?php
            
        } 
       
       
       }
       ?>






                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Your Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@customer.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>



           





            <?php


// include_once '../config/configure.php';


 if(isset($_POST['submit'])){

	$food = $_POST['food'];
    $quentity = $_POST['qty'];
    $price = $_POST['price'];
    $total = (int)$price*(int)$quentity;
	$order_date = date('Y-m-d H:i:s');
	$customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
	$status = "Ordered";
	
	$insertering_data="INSERT INTO `food_order`(`food`, `price`, `quentity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$food','$price','$quentity','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";



	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['Order'] = "Order Placed Successfully";
        header('location:'.SITEURL);

		// header("location:".SITEURL.'/admin/manage_post.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }



?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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