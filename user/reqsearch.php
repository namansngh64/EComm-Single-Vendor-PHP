<?php
    session_start();
    if(isset($_SESSION['id'])){
        if(isset($_GET['term'])){
        include("connection.php");
        $s=$_GET['term'];
        $arr1=array();
        $query="Select * from `item` where Name like '%$s%'";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            $data['value']=$row['Name'];
            array_push($arr1,$data);
        }
        echo json_encode($arr1);
        }else{
            header("Location:main.php");    
        }
    }else{
        header("Location:main.php");
    }
  
?>