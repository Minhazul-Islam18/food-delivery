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
    <!-- <link rel="stylesheet" href="../css/admin.css"> -->
    <link rel="stylesheet" href="../css/manage_admin.css">
    <style>
    .pr-3 {
      padding-right: 1.4rem !important;
    }
    td {
      padding: 20px 0px 20px 20px !important;
      text-align: center;
    }
    th {
      padding: 1.1rem 1rem !important;
      text-transform: uppercase;
      letter-spacing: 0.1rem;
      font-size: 0.7rem;
      font-weight: 900;
    }
    </style>
    <style>

.wrapper {
	padding: 0px !important;
}
    </style>
    <title>Food Order- Manage Order</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<!-- <div class="container"> -->






<div class="main_content">
<strong class="styledHead mb-5">Manage Order</strong></br>
<!-- <button class="btn status-paid mb-4 mt-4"><a href="add_post.php">Add Food</a></button> -->
        <div style="margin-top: 2rem;" class="wrapper">
            

            

        <div class="ad_food">
            <?php 
            
            if (isset($_SESSION['addpost'])) {
                echo $_SESSION['addpost'];
                unset ($_SESSION['addpost']);
            }
            ?>
            
        </div>   


            <table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Food</th>
			<th>Price</th>
			<th>Quentity</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Name</th>
            <th>Contact</th>
            <th>E-mail</th>
            <th>Adress</th>

		</tr>
	</thead>
 



    <?php
        $sql = "SELECT * FROM `food_order`";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {
          
          
          ?>
   
<tr>
     <td>
     <?php echo $data_viewer['id']?></td>
        <td><?php echo$data_viewer['food']?></td>
        <td><?php echo$data_viewer['price']?></td>
        <td><?php echo$data_viewer['quentity']?></td>
        <td><?php echo$data_viewer['total']?></td>

        <td><?php echo$data_viewer['order_date']?></td>
        


        <td><?php echo$data_viewer['status']?></td>
        
        <td><?php echo$data_viewer['customer_name']?></td>
        <td><?php echo$data_viewer['customer_contact']?></td>
        <td><?php echo$data_viewer['customer_email']?></td>
        <td><?php echo$data_viewer['customer_address']?></td>





        <td class="pr-3">
          <button class="status status-paid">
            <a href="update-order.php?updateorder=<?php echo $data_viewer['id'];?>">Edit Order</a></button>
         
        </td>

      </tr>


      



      <?php  $i++; }?>












</tr>

</table>
        </div>
    </div>

</div></br>


</div>



<?php
// include_once 'partials/footer.php'

?>

</body>
</html>
