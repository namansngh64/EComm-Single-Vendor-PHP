<?php
session_start();
if(isset($_SESSION['admin'])){
    
    include("connection.php");
    if(isset($_POST['submit'])){
        $name=input_test($_POST['name']);
        $desc=input_test($_POST['desc']);
        $price=input_test($_POST['price']);
        $id;
        $quantity=input_test($_POST['quantity']);
        $target_dir="uploads/image/namansngh64/";
        $target_file=$target_dir.basename($_FILES["image"]["name"]);
        
        $d=date("Y-m-d").";".date("h-i-sa");
        $arr=explode(".",$target_file);
        $temp=$arr[count($arr)-2].$d;
        
        $target_file=str_replace($arr[count($arr)-2],$temp,$target_file);
            
        
        $file=addslashes($target_file);
        $query="Insert into `item`(name,description,price,quantity) values('$name','$desc','$price','$quantity')";
            if($result=mysqli_query($con,$query)){
                $_SESSION['uploadok']=2;
                //header("Location:addproduct.php");
            }else{
                $_SESSION['uploadok']=1;
            }
        if($_SESSION['uploadok']==2){
            $query="Select * from item where name='$name' && description='$desc' && price='$price' && quantity='$quantity'";
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){
                $id=$row[0];
            }
            $query = "Insert into `item_img`(itemid,image) values ('$id','$file')";
            if($result=mysqli_query($con,$query)){  
                $_SESSION['uploadok']=2; 

            }else{

                $_SESSION['uploadok']=0; 
                
            }
            if($_SESSION['uploadok']==2){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    $_SESSION['uploadok']=2; 
                    header("Location:addproduct.php");
                }else{
                    $query="Delete from item where id='$id'";
                    $result=mysqli_query($con,$query);
                    $query="Delete from item_img where itemid='$id' && image='$file'";
                    $result=mysqli_query($con,$query);
                    $_SESSION['uploadok']=0; 
                    header("Location:addproduct.php");
                }
            }else{
                $query="Delete from item where id='$id'";
                $result=mysqli_query($con,$query);
                
                header("Location:addproperty.php");    
            }
        }else{
            header("Location:addproperty.php");
        }
    }else{
        header("Location:addproduct.php");
    }
}else{
    header("Location:login.php");
}

?>