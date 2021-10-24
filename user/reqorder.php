<?php 
    if(isset($_POST['order'])){
        session_start();
        include("connection.php");
        $i_id=$_POST['i_id'];
        $c_id=$_POST['c_id'];
        $query="Insert into item_order(i_id,c_id,confirm) values('$i_id','$c_id','1')";
        if($result=mysqli_query($con,$query))
            $_SESSION['confirm']=1;
        else
            $_SESSION['confirm']=0;
        header("Location:main.php");
    }else{
        header("Location:main.php");
    }
?>