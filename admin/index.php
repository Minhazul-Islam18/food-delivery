<?php

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Food Order- Home Page</title>

    <style>

.wrapper {
	display: flex !important;
}
.col-4 {
	flex: 0 0 auto !important;
	width: 24.333% !important;
	margin-right: .6rem !important;
}
.dash-element {
	box-shadow: 0px 2px 32px 8px rgba(0,0,0,0.2);
	border-radius: 4px;
	padding: 10px 18px;
	text-align: center;
	background: #14213d;
	margin-top: 2rem;
	color: #fff;
}
    </style>
</head>
<body>

<?php
        include_once 'partials/main-menu.php'
?>





<div class="container">






<div class="main_content">
<strong class="styledHead">Dashboard</strong>
    <div class="wrapper">
        
        <div class="dash-element col-4">
        <?php


$sql = "SELECT * FROM `category`";
$data = mysqli_query($connt,$sql);

$counter = mysqli_num_rows($data);
?>
            <h1><?php echo $counter ?></h1>
            Category
        </div>
        <div class="dash-element col-4">
        <?php


$sql = "SELECT * FROM `food`";
$data = mysqli_query($connt,$sql);

$counter = mysqli_num_rows($data);
?>
            <h1><?php echo $counter ?></h1>
            Foods
        </div>
        <div class="dash-element col-4">
        <?php


$sql = "SELECT * FROM `food_order`";
$data = mysqli_query($connt,$sql);

$counter = mysqli_num_rows($data);
?>
            <h1><?php echo $counter ?></h1>
            Orders
        </div>
        <div class="dash-element col-4">
        <?php


$sql = "SELECT SUM(total) AS total_rev FROM `food_order` WHERE status = 'Delivered'";
$data = mysqli_query($connt,$sql);


$rev_collector = mysqli_fetch_assoc($data);


$rev_count =$rev_collector['total_rev'];
?>
            <h1>
                <?php 
                
                if ($rev_count == "") {
                    echo "No earnings";
                } else {
                    echo $rev_count;
                }
                
                
                ?></h1>
            Revenue
        </div>
    </div>
    
</div>

</div>



<!-- <?php
    // include_once 'partials/footer.php'

?> -->

</body>
</html>
