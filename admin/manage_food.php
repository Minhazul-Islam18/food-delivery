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

.wrapper {
	padding: 0px !important;
}
    </style>
    <title>Food Order- Manage Food</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<!-- <div class="container"> -->






<div class="main_content">
<strong class="styledHead">Manage Food</strong></br>
<button class="btn status-paid mb-4 mt-4"><a href="add_post.php">Add Food</a></button>
        <div class="wrapper">
            

            

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
			<th>Title</th>
			<th>Description</th>
			<th>Price</th>
            <th>Category</th>
            <th>Category</th>
            <th>Featured</th>
            <th>Active</th>

		</tr>
	</thead>
 



    <?php
        $sql = "SELECT * FROM `food`";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {
          
          $category_id = $data_viewer['category_id'];
          ?>
   
<tr>
     <td>
     <?php echo $data_viewer['id']?></td>
        <td><?php echo$data_viewer['title']?></td>
        <td>
      
        <?php echo substr_replace($data_viewer['description'], "...", 60);?>

      </td>

        <td><?php echo$data_viewer['price']?></td>
        


        <td><?php 
        $sql = "SELECT * FROM `category` WHERE  id = $category_id";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {
          echo$data_viewer['title'];


          $i++;
        }
        
        ?></td>


        <td><img height="80px" width="80px" src="../upload/<?php echo$data_viewer['featured']?>" alt="<?php echo$data_viewer['featured']?>"></td>
        
        
        <td><?php
        $sql = "SELECT * FROM `food`";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {
          
          
          
        if ($data_viewer['active'] < 0 ) {
          echo "Yes";
        }else{

          echo "No";

        }
        
       break; }  ?></td>





        <td>
          <button class="status status-paid">
            <a href="editfood.php?editfood=<?php echo $data_viewer['id'];?>">Edit Item</a></button>|
          <button class="status status-unpaid"><a href="delete.php?caughtfood=<?php echo $data_viewer['id'];?>">Delete Item</a></button>
        </td>

      </tr>


      



      <?php  $i++; }?>


























      <!-- <tr>
        <td><a href="#">INV1002</a></td>
        <td>Sonic</td>
        <td>1/4/2021</td>
        <td>
          <button class="status status-paid">Paid</button>
          <button class="status status-unpaid">Unpaid</button>
        </td>

      </tr>
      <tr>
        <td><a href="#">INV1003</a></td>
        <td>Innercircle</td>
        <td>1/2/2021</td>
        <td>
          <button class="status status-pending">Pending</button>
          <button class="status status-unpaid">Unpaid</button>
        </td>

      </tr>
      <tr>
        <td><a href="#">INV1004</a></td>
        <td>Varsity Plus</td>
        <td>12/30/2020</td>
        <td>
          <button class="status status-pending">Pending</button>
          <button class="status status-unpaid">Unpaid</button>
        </td>

      </tr>
      <tr>
        <td><a href="#">INV1005</a></td>
        <td>Highlander</td>
        <td>12/18/2020</td>
        <td>
          <button class="status status-paid">Paid</button>
          <button class="status status-unpaid">Unpaid</button>
        </td>

      </tr> -->
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
