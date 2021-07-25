

<?php 
session_start();

define('SITEURL', 'http://localhost/food-order');
$ServerName  = 'localhost';
$UserName  = 'root';
$Password  = '';
$dbname  = 'food-order';



$connt = mysqli_connect($ServerName,$UserName,$Password,$dbname);

?>