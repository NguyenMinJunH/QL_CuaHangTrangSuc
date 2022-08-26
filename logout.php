<?php
    session_start();

    if( isset($_SESSION['txtusername'])){
        unset( $_SESSION['txtusername']);
    }

    header("location:login.php");
?>