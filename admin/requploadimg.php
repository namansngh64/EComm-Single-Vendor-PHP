<?php
    if(isset($_POST['submit'])){
        include("connection.php");
        $target_dir="uploads/image/namansngh64/";
        $target_file=$target_dir.basename($_FILES["image"]["name"]);
        
        $d=date("Y-m-d").";".date("h-i-sa");
        $arr=explode(".",$target_file);
        $temp=$arr[count($arr)-2].$d;
        
        $target_file=str_replace($arr[count($arr)-2],$temp,$target_file);
            
        
        $file=addslashes($target_file);
        $id=$_GET['id'];
        $path=$_GET['path'];
        unlink($path);
        $query="Delete from `item_img` where itemid='$id'";
        $result=mysqli_query($con,$query);
        $query = "Insert into `item_img`(itemid,image) values ('$id','$file')";
        $result=mysqli_query($con,$query);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            header("Location:main.php");
    }else{
        header("Location:main.php");
    }
?>
