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
    <link rel="stylesheet" href="../css/manage_admin.css">
    <title>Food Order- Add Category</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<div class="container">






    <div class="main_content">
        <div class="wrapper">
            <strong class="styledHead">Add Category</strong>



        <!-- <div class="added_admin">
            <button class="btn status-paid mb-4 mt-4"><a href="add_admin.php">Add Admin</a></button>
        </div>    -->





        <div class="mwb-form-main-wrapper">
		<div class="mwb-form-main-container">
			<h1>Place Your Details</h1>
			<form action="" method="POST" enctype='multipart/form-data'>
				<div class="mwb-form-group">
				<label for="name" class="mwb-form-text-label">Enter your Title*</label>
					<input type="text" class="mwb-form-control" value="" name="title">
					<div class="mwb-form-error">This Field Required*</div>
				</div>



				<div class="mwb-form-group">
					<label for="featured"  class="mwb-form-text-label">Select your featured Image*</label>
					<input type="file" class="mwb-form-control" name="featured">
					<div class="mwb-form-error">This Field Required*</div>
				</div>






                <div class="mwb-form-group">
				<label for="status"  class="mwb-form-text-label">Enter your Status*</label>
					<input type="text" class="mwb-form-control" name="status">
					<div class="mwb-form-error">This Field Required*</div>
				</div>
				<div class="mwb-form-group">
					<input type="Submit" name="Submit" class="btn status-paid p-1" value="Save Details">
				</div>
			</form>
		</div>
	</div>

        </div>
    </div>

</div></br>



<!-- <script>
    jQuery(document).ready(function($) {
			$(".mwb-form-control").focus(function(){
				var tmpThis = $(this).val();
				if(tmpThis == '' ) {
					$(this).parent(".mwb-form-group").addClass("focus-input");
				}
				else if(tmpThis !='' ){
					$(this).parent(".mwb-form-group").addClass("focus-input");
				}
			});
			$(".mwb-form-control").blur(function(){
				var tmpThis = $(this).val();
				if(tmpThis == '' ) {
					$(this).parent(".mwb-form-group").removeClass("focus-input");
					$(this).siblings('.mwb-form-error').slideDown("3000");
				}
				else if(tmpThis !='' ){
					$(this).parent(".mwb-form-group").addClass("focus-input");
					$(this).siblings('.mwb-form-error').slideUp("3000");
					
				}
			});
			
		}); 
</script> -->
</body>
</html>





<?php



 if(isset($_POST['Submit'])){

	$title = $_POST['title'];
	$featured = $_FILES['featured']['name'];
    $tmp_img_name=$_FILES['featured']['tmp_name'];
    move_uploaded_file($tmp_img_name,"../upload/".$featured);



	$status = $_POST['status'];

	
	$insertering_data="INSERT INTO `category`(`title`, `featured`, `status`) VALUES ('$title','$featured','$status')";



	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['add'] = "Category Added Successfully";
		header("location:".SITEURL.'/admin/manage_category.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }



?>