<?php

include_once '../config/configure.php';




if (isset($_GET['editcat'])){
    $cat_id = $_GET['editcat'];

   $sqlsel = "SELECT * FROM `category` WHERE id = '$cat_id'";
   $data = mysqli_query($connt,$sqlsel);
   //echo("Error des" .mysqli_error($connt));
    $dataedit = mysqli_fetch_array($data);


?>

<?php

if (isset($_POST['Submit'])){

    $title = $_POST['title'];
    $featured = $_FILES['featured']['name'];
$tmp_img_name=$_FILES['featured']['tmp_name'];
move_uploaded_file($tmp_img_name,"../upload/".$featured);



$status = $_POST['status'];


    $updator = "UPDATE `category` SET 
    
    `title` = '$title',
    `featured` = '$featured',
    `status` = '$status'         


    WHERE `id` = '$cat_id'";



    $sqler = mysqli_query($connt, $updator);

    if($sqler){
        echo "Profile Updated";
        header('refresh:1;url=manage_category.php');
    }else{
        "Error Data Prosessing";
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
</style>





    <title>Edit here!</title>
</head>
<body>
<?php
include_once 'partials/main-menu.php'
?>













<div class="main_content">
        <div class="wrapper">
            



        <!-- <div class="added_admin">
            <button class="btn status-paid mb-4 mt-4"><a href="add_admin.php">Add Admin</a></button>
        </div>    -->





        <div class="mwb-form-main-wrapper">
		<div class="mwb-form-main-container">
			<h1>Change Your Details</h1>
			<form action="" method="POST" enctype='multipart/form-data'>
				<div class="mwb-form-group">
				<label for="name" class="mwb-form-text-label">Enter your Title*</label>
					<input type="text" class="mwb-form-control" value="" name="title">
					
				</div>



				<div class="mwb-form-group">
					<label for="featured"  class="mwb-form-text-label">Select your featured Image*</label>
					<input type="file" class="mwb-form-control" name="featured">
					
				</div>






                <div class="mwb-form-group">
				<label for="status"  class="mwb-form-text-label">Enter your Status*</label>
					<textarea  class="mwb-form-control" name="status"></textarea>
				
				</div>
				<div class="mwb-form-group">
					<input type="Submit" name="Submit" class="btn status-paid p-1" value="Save Details">
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