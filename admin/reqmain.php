<?php
    if(isset($_GET['operation'])){
        include("connection.php");
        $operation=$_GET['operation'];
        if($operation=="ok"){
            $id=$_GET['todo'];
            $name=$_GET['name'];
            $desc=$_GET['desc'];
            $price=$_GET['price'];
            $quantity=$_GET['quantity'];
//            $img=$_GET['img'];
            $query="Update `item` set name='$name' , description='$desc' , price='$price',quantity='$quantity' where id='$id'";
            $result=mysqli_query($con,$query);
//            if($img!=""){
//                header("Location:requploadimg.php?id=$id");
//            }else{
                header("Location:main.php");
//            }
        }elseif($operation=="delete"){
            $id=$_GET['todo'];
            $query="delete from `item` where id='$id' ";
            $result=mysqli_query($con,$query);
            header("Location:main.php");
        }
        
    }else{
        header("Location:main.php");
    }
//    if($operation=="delete"){
//        $id=$_GET['todo'];
//        $query="delete from `user` where userid='$id' ";
//        $result=mysqli_query($con,$query);   
//    }   
//    elseif($operation=="users"){
//        $query="Select * from `user`";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            echo "<tr id='$row[4]'>
//                    <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>
//                </tr>";
//        }
//    }
//    elseif($operation=="modify"){
//        $id=$_GET['todo'];
//        $query="Select * from `user` where id='$id'";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            echo "  <td>
//                        <input type='text' id='$row[4]a' class='form-control' value='$row[0]' required>
//                    </td>
//                    <td>
//                        <input type='text' id='$row[4]b' class='form-control' value='$row[1]' required>
//                    </td>
//                    <td>
//                        <input type='text' id='$row[4]c' class='form-control' value='$row[2]' required>
//                    </td>
//                    <td>
//                        <input type='text' id='$row[4]d' class='form-control' value='$row[3]' required>
//                    </td>
//                    <td>
//                        <a onClick=okfunc('$row[4]');>
//                            <span class='glyphicon glyphicon-ok'></span>
//                        </a>    
//                    </td>
//                    <td>
//                       <a onClick=cancelfunc('$row[4]');>
//                            <span class='glyphicon glyphicon-remove'></span>
//                        </a>
//                    </td>";
//        }
//    }
//    elseif($operation=="cancel"){
//        $id=$_GET['todo'];
//        $query="Select * from `user` where id='$id'";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            echo "  <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>";
//        }
//    }
//    elseif($operation=="ok"){
//        $id=$_GET['todo'];
//        $first=$_GET['first'];
//        $last=$_GET['last'];
//        $user=$_GET['user'];
//        $pass=$_GET['pass'];
//        $query="Update `user` set name='$first' , lastname='$last' , userid='$user',password='$pass' where id='$id'";
//        $result=mysqli_query($con,$query);
//        
//        $query="Select * from `user` where id='$id'";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            echo "
//                    <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>";
//        
//        }
//    }
//    elseif($operation=="search"){
//        $id=$_GET['todo'];
//        $query="Select * from `user` where userid like '%$id%'";
//        $result=mysqli_query($con,$query);
//        $r=array(".");
//        while($row=mysqli_fetch_array($result)){
//            
//            array_push($r,"$row[4]");
//            echo "<tr id='$row[4]'> 
//                    <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>
//                </tr>";
//        }
//        $query="Select * from `user` where name like '%$id%'";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            if(array_search("$row[4]",$r)){
//                continue;
//            }else{
//            
//            array_push($r,"$row[4]");
//            echo "<tr id='$row[4]'> 
//                    <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>
//                </tr>";
//        }
//        }
//        $query="Select * from `user` where lastname like '%$id%'";
//        $result=mysqli_query($con,$query);
//        
//        while($row=mysqli_fetch_array($result)){
//            if(array_search("$row[4]",$r)){
//                continue;
//            }else{
//            
//            array_push($r,"$row[4]");
//            echo "<tr id='$row[4]'> 
//                    <td>
//                        $row[0]
//                    </td>
//                    <td>
//                        $row[1]
//                    </td>
//                    <td>
//                        $row[2]
//                    </td>
//                    <td>
//                        $row[3]
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[4]'); >
//                    </td>
//                    <td>
//                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                    </td>
//                </tr>";
//                
//        }
//        }
//    }
//    else{
//        
//    }
?>
<!--

<td>
                        <input type='text' class='form-control' disabled value='$row[0]'>
                    </td>
                    <td>
                        <input type='text' class='form-control' disabled value='$row[1]'>
                    </td>
                    <td>
                        <input type='text' class='form-control' disabled value='$row[2]'>
                    </td>
                    <td>
                        <input type='text' class='form-control' disabled value='$row[3]'>
                    </td>
                    <td>
                       <input type='button' class='btn btn-warning' value='Modify' onClick=modifyrecord('$row[2]'); >
                    </td>
                    <td>
                       <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
                    </td>-->

