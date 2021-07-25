<?php
include_once '../config/configure.php';

include_once 'login-check.php';
?>

<style>
    .status {
    border-radius:  0.2rem;
    background-color: red;
    padding: 0.2rem 1rem;
    text-align: center;
}
   .status-pending {
      background-color: #fff0c2;
      color: #a68b00;
    }

     .status-paid {
      background-color: #c8e6c9;
      color:  #388e3c;
      color: #111 !important;
    }

      .status-unpaid {
      background-color: #ffcdd2;
      color: #c62828;
    }
</style>
<div class="main_menu">
    <div id="nav">
        <div id="nav-wrapper">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="manage_admin.php">ADMIN</a></li>
                <li><a href="manage_category.php">CATEGORY</a></li>
                <li><a href="manage_food.php">FOOD</a></li>
                <li><a href="manage_order.php">ORDER</a></li>
                <li><a class="btn status-paid" href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
</div>

