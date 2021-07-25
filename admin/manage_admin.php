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
            <strong class="styledHead">Manage Admin</strong>



        <div class="ad_admin">
            <?php 
            
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            ?>
            <button class="btn status-paid mb-4 mt-4"><a href="add_admin.php">Add Admin</a></button>
        </div>   


            <table>
	<thead>
		<tr>
			<th>Admin ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>Action</th>

		</tr>
	</thead>
 



    <?php
        $sql = "SELECT * FROM `admin`";
        $data = mysqli_query($connt,$sql);


        $i = 1;
        foreach ($data as $data_viewer) {?>

<tr>
     <td>
     <?php echo $data_viewer['id']?></td>
        <td><?php echo$data_viewer['full_name']?></td>
        <td><?php echo$data_viewer['username']?></td>
        <td>
          <button class="status status-paid">
            <a href="editdata.php?edit=<?php echo $data_viewer['id'];?>">Edit Admin</a></button>|
          <button class="status status-unpaid"><a href="delete.php?caught=<?php echo $data_viewer['id'];?>">Delete Admin</a></button>
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
