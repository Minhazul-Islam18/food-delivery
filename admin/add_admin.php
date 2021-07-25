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
    <title>Food Order- Home Page</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<div class="container">






    <div class="main_content">
        <div class="wrapper">
            <strong class="styledHead">Add Admin</strong>



        <!-- <div class="added_admin">
            <button class="btn status-paid mb-4 mt-4"><a href="add_admin.php">Add Admin</a></button>
        </div>    -->





        <div class="mwb-form-main-wrapper">
		<div class="mwb-form-main-container">
			<h1>Place Your Details</h1>
			<form action="" method="POST">
				<div class="mwb-form-group">
				<label for="name" class="mwb-form-text-label">Enter your name*</label>
					<input type="text" class="mwb-form-control" value="" name="name">
					<div class="mwb-form-error">This Field Required*</div>
				</div>
				<div class="mwb-form-group">
					<label for="username"  class="mwb-form-text-label">Enter your Username*</label>
					<input type="text" class="mwb-form-control" name="username">
					<div class="mwb-form-error">This Field Required*</div>
				</div>

                <div class="mwb-form-group">
				<label for="password"  class="mwb-form-text-label">Enter your Password*</label>
					<input type="password" class="mwb-form-control" name="password">
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

	$name = mysqli_real_escape_string($connt,$_POST['name']);
	$username = mysqli_real_escape_string($connt,$_POST['username']);
	$password = mysqli_real_escape_string($connt,md5($_POST['password']));

	
	$insertering_data="INSERT INTO `admin`(`full_name`, `username`, `password`) VALUES ('$name','$username','$password')";



	$res = mysqli_query($connt, $insertering_data );



	if ($res) {
		$_SESSION['add'] = "Admin Added Successfully";
		header("location:".SITEURL.'/admin/manage_admin.php');
	}else{
		echo ("des:".mysqli_error($connt));
	}
 }



?>