<?php

include_once '../config/configure.php';




if (isset($_GET['edit'])){
    $admin_id = $_GET['edit'];

   $sqlsel = "SELECT * FROM `admin` WHERE id = '$admin_id'";
   $data = mysqli_query($connt,$sqlsel);
   //echo("Error des" .mysqli_error($connt));
    $dataedit = mysqli_fetch_array($data);


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
    <title>Edit here!</title>
</head>
<body>
<?php
include_once 'partials/main-menu.php'
?>
<div class="container">
    <div class="row">
        <h2>Edit Data Here</h2>
        <div class="col-md-6">
            <form action="" method = "POST">


                <div>
                    <!--HtmlTag -->
                    <label for ="full_name">Full Name</label>
                    <input type="text"  value="<?php echo $dataedit['full_name']?>" name="full_name">
                </div>
                <div>
                    <label for ="username">Username</label>
                    <input type="text" name="username" value="<?php echo $dataedit['username']?>">
                </div>
                <div>
                    <label for ="password">Password</label>
                    <input type="text" name="password" value="<?php echo $dataedit['password']?>">
                </div>

                <input type="submit" class="submit mt-4 status-paid" name = "dataeditor">


            </form>
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






    <?php

    if (isset($_POST['dataeditor'])){

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo "edit done";


        $updator = "UPDATE `admin` SET 
        
        `full_name` = '$full_name',
        `username` = '$username',
        `password` = '$password'         


        WHERE id = '$admin_id'";



        $sqler = mysqli_query($connt, $updator);

        if($sqler){
            echo "Profile Updated";
            header('refresh:1;url=manage_admin.php');
        }else{
            "Error Data Prosessing";
        }
    }

    ?>
<?php } ?>