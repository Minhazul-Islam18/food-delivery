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
    <title>Food Order- Manage Category</title>
</head>
<body>

<?php
include_once 'partials/main-menu.php'
?>





<div class="container">






    <div class="main_content">
        <div class="wrapper">
            <strong class="styledHead">Manage Category</strong>



        <div class="ad_admin">
            <?php 
            
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            ?>
            <button class="btn status-paid mb-4 mt-4"><a href="add_category.php">Add Category</a></button>
        </div>   


            <table>
	<thead>
		<tr>
			<th>Admin ID</th>
			<th>Title</th>
			<th>featured</th>
			<th>Status</th>

		</tr>
	</thead>
 



    <?php
        $sql = "SELECT * FROM `category`";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {?>

<tr>
     <td>
     <?php echo $data_viewer['id']?></td>
        <td><?php echo$data_viewer['title']?></td>
        <td><img height="80px" width="80px" src="../upload/<?php echo$data_viewer['featured']?>" alt="<?php echo$data_viewer['featured']?>"></td>
        <td>
          <button class="status status-paid">
            <a href="editcat.php?editcat=<?php echo $data_viewer['id'];?>">Edit Category</a></button>|
          <button class="status status-unpaid"><a href="delete.php?caughtcat=<?php echo $data_viewer['id'];?>">Delete Category</a></button>
        </td>

      </tr>


      



      <?php  $i++; }?>


























      <tr>
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

      </tr>
</tr>

</table>
        </div>
    </div>

</div></br>




</body>
</html>
