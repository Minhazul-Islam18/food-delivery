<?php

include_once '../config/configure.php';




if (isset($_GET['updateorder'])){
    $food_id = $_GET['updateorder'];

   $sqlsel = "SELECT * FROM `food_order` WHERE id = '$food_id'";
   $data = mysqli_query($connt,$sqlsel);
   //echo("Error des" .mysqli_error($connt));
    $dataedit = mysqli_fetch_array($data);



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









$insertering_data="UPDATE `food` SET `title`= '$title',`description`='$description',`price`='$price',`image_name`='$image_name',`category_id`='$category',`featured`='$featured',`active`= '$status' WHERE `id`= '$food_id'";

	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['addpost'] = "Post Updated Successfully";
        header('refresh:1;url=manage_food.php');

		// header("location:".SITEURL.'/admin/manage_post.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }



?>



<?php


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
	$status = $_POST['status'];
	
	$insertering_data="UPDATE `food_order` SET `food`='$food',`price`= '$price',`quentity`='$quentity',`total`='$total',`order_date`='$order_date',`status`='$status',`customer_name`='$customer_name',`customer_contact`='$customer_contact',`customer_email`='$customer_email',`customer_address`='$customer_address' WHERE id = $food_id";



	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['Order'] = "Order Updated Successfully";
        header('location:'.SITEURL);

		// header("location:".SITEURL.'/admin/manage_post.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }







?>


<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/manage_admin.css">

    <link rel="stylesheet" href="../css/style.css">


<style>
    .mwb-form-main-wrapper {
	font-family: 'Lato', sans-serif;
	line-height: 1.5;
	padding: 20px;
	width: 100%;
}
.mwb-form-main-container {
	background-color: #fff;
	box-shadow: 1px 2px 10px rgba(0,0,0,.11);
	color: #7b7878;
	margin: 0 auto;
	width: 100% !important;
}
.mwb-form-text-label {
	left: 4px;
	position: absolute;
	top: -23px;
	transition: 0.2s linear all;
}








select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: #2c3e50;
  background-image: none;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select */
.select {
  position: relative;
  display: flex;
  width: 20em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
}
select {
  flex: 1;
  padding: 0 .5em;
  color: #fff;
  cursor: pointer;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  padding: 0 1em;
  background: #34495e;
  cursor: pointer;
  pointer-events: none;
  -webkit-transition: .25s all ease;
  -o-transition: .25s all ease;
  transition: .25s all ease;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}
.input-responsive {
	width: 96%;
	padding: 1%;
	margin-bottom: 3%;
	border-radius: 5px;
	font-size: 1rem;
	border: 1px solid #2c3e50 !important;
}
.food-menu-desc {
	width: 70%;
	float: left;
	margin-left: 0% !important;
}
fieldset {
	border: 1px solid #eee !important;
	margin: 5%;
	padding: 3%;
	border-radius: 5px;
	box-shadow: -6px 0px 50px -7px rgba(11,64,255,0.24);
}
</style>





    <title>Edit here!</title>
</head>
<body>
<?php
include_once 'partials/main-menu.php'
?>













<div class="main_content">
        <div class="wrapper">
            


        <div class="mwb-form-main-wrapper">
		<div class="mwb-form-main-container">
			<h1>Edit your Item?</h1>
			<form action="" method="POST" enctype='multipart/form-data'>
				<div class="mwb-form-group">

                <?php
        $sql = "SELECT * FROM `food_order` WHERE `id` = '$food_id'";
        $data = mysqli_query($connt,$sql);


        
        foreach ($data as $data_viewer) {?>


<fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                <?php









?>
                </div>
    
                    <div class="food-menu-desc">
                    <h4><?php echo$data_viewer['food']?></h4>
                    <input type="hidden" name="food" id="" value="<?php echo$data_viewer['food']?>">
                    <p class="food-price">$<?php echo$data_viewer['price']?></p>
                    <input type="hidden" name="price" id="" value="<?php echo$data_viewer['price']?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        <div class="order-label">Status</div>
                    <div class="select">
                        
  <select name="status" id="slct">
    <option selected disabled>Choose an option</option>
    <option value="Ordered">Ordered</option>
    <option value="Delivered">Delivered</option>
    <option value="On Delivery">On Delivery</option>
    <option value="cancelled">cancelled</option>
  </select>
</div> 
                    </div>

                   
                </fieldset>
                








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

                    <!-- <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary"> -->
                </fieldset>

                
                <?php  break; }?>



				<div class="mwb-form-group">
					<input type="Submit" name="submit" class="btn status-paid p-1" value="Save Details">
				</div>
			</form>



            
		</div>
	</div>




        

        </div>
    </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>






   
<?php } ?>