<?php


include_once '../config/configure.php';


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


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/manage_admin.css">
    <style>
        .mwb-form-text-label {
	left: 2px;
	position: absolute;
	top: -23px;
	transition: 0.2s linear all;
}
    </style>
    <title>Food Order- Add Post</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<div class="container">






    <div class="main_content">
        <div class="wrapper">
            <strong class="styledHead">Add Post</strong>



        <!-- <div class="added_admin">
            <button class="btn status-paid mb-4 mt-4"><a href="add_admin.php">Add Admin</a></button>
        </div>    -->





        <div class="mwb-form-main-wrapper">
		<div class="mwb-form-main-container">
			<h1>What's on your mind?</h1>
			<form action="" method="POST" enctype='multipart/form-data'>
				<div class="mwb-form-group">


				<label for="title" class="mwb-form-text-label">Enter your Title*</label>
					<input type="text" class="mwb-form-control" value="" name="title">
					<div class="mwb-form-error">This Field Required*</div>
				</div>




                <div class="mwb-form-group">
				<label for="description" class="mwb-form-text-label">Description*</label>
					<textarea class="mwb-form-control" value="" name="description"></textarea>
					
				</div>


                <div class="mwb-form-group">
					<label for="image_name"  class="mwb-form-text-label">Select your Post Image*</label>
					<input type="file" class="mwb-form-control" name="image_name">
					
				</div>



                <div class="mwb-form-group">
				<label for="price" class="mwb-form-text-label">Price*</label>
					<input type="text" class="mwb-form-control" value="" name="price">
					
				</div>







                <div class="mwb-form-group">
					<label for="featured"  class="mwb-form-text-label">Select your featured Image*</label>
					<input type="file" class="mwb-form-control" name="featured">
					
				</div>





                <div class="mwb-form-group">
				<label for="category" class="mwb-form-text-label">Category*</label>
                <select class="mwb-form-control" name="category">
					<?php
					
					$sql = "SELECT * FROM `category`";
       $data = mysqli_query($connt,$sql);
       
       
       $i = 1;
       foreach ($data as $data_viewer) {
		   ?>


		<option value="<?php echo  $data_viewer['id'];?>"><?php echo  $data_viewer['title'];?></option>
					
					
					
					
					
					
				<?php $i++;}	?>
                               
								
					
                    </select>
					
				</div>












                <div class="mwb-form-group">
				<label for="status"  class="mwb-form-text-label">Status*</label>
					

                    <select class="mwb-form-control" name="status">
                                <option value="0">Public</option>
                                <option value="1">Out of Stock</option>
    
                    </select>
					
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



