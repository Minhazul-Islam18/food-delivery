<?php

include_once '../config/configure.php';



if (isset($_GET['caught'])){

    $storeid= $_GET['caught'];

    //now exist delete insight
    $sql = "DELETE FROM `admin` WHERE id='$storeid'";
    $del = mysqli_query($connt,$sql);

    //then condition for delete
    if($del){

        echo "delete done";
        header('refresh:1;url=manage_admin.php');
    }else{
        echo "error";
    }

}


if (isset($_GET['caughtcat'])){

    $storeid= $_GET['caughtcat'];

    //now exist delete insight
    $sql = "DELETE FROM `category` WHERE id='$storeid'";
    $del = mysqli_query($connt,$sql);

    //then condition for delete
    if($del){

        echo "delete done";
        header('refresh:1;url=manage_category.php');
    }else{
        echo "error";
    }

}


if (isset($_GET['caughtfood'])){

    $storeid= $_GET['caughtfood'];

    //now exist delete insight
    $sql = "DELETE FROM `food` WHERE id='$storeid'";
    $del = mysqli_query($connt,$sql);

    //then condition for delete
    if($del){

        echo "delete done";
        header('refresh:1;url=manage_food.php');
    }else{
        echo "error";
    }

}