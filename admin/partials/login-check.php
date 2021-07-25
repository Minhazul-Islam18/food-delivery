<?php
// include_once 'login.php';

if (isset($_SESSION["login-checker"])) {
    $_SESSION['Login-request'] =  "<div class='request'>Please Log In!</div>"; //Message for login request



    //redirecting
    header('refresh:1;url=login.php');
}