<?php 
if(isset($_POST['submitv'])){
    session_start();
    include("connection.php");
    $a=$_POST['otp'];
    if($a==$_SESSION['otp']){
        $query="Update user set active='1' where `userid` ='".$_SESSION['user']."'";
        if(mysqli_query($con,$query)){
            $_SESSION['msg1']="suc";
            unset($_SESSION['otp']);
            unset($_SESSION['user']);
            header("Location:login.php");
        }else{
            $query="Delete from user where userid='".$_SESSION['user']."'";
            mysqli_query($con,$query);
            $_SESSION['msg1']="err";
            unset($_SESSION['otp']);
            unset($_SESSION['user']);
            header("Location:signup.php");
        }
    }else{
        $_SESSION['msg1']="onm";
        header("Location:verify.php");
    }

}else{
    header("Location:login.php");
}
?>