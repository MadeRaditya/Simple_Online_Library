<?php
    session_start();
    session_unset();
    $_SESSION = [];
    session_destroy();

    setcookie("e", '', time()-3600);
    setcookie('i', '', time()-3600);

    header("Location:login.php");
    exit;

?>