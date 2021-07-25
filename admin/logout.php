<?php

    session_destroy();
    // unset ($_SESSION['Login-checker']);
    
    header('refresh:1;url=login.php');

?>