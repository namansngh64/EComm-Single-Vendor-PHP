<?php 
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['aname']);
    setcookie("admin","",time()-3600);
    header("Location:login.php");
?>