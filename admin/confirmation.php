<?php
    session_start();
include("connection.php");

                if(isset($_COOKIE['admin'])){
                    $_SESSION['admin']=$_COOKIE['admin'];
                }
                if(isset($_SESSION['admin'])){
                    
            
//    if(isset($_SESSION['id'])){
//        echo "Welcome ".$_SESSION['name'];
//    }else{
//        echo "Session Expired! Please Login Again";
//    }

?>
<html>
    <head>
        <?php
            include("header.php");
        ?>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <style>
/*
            .textfield{
                position: relative;
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.5s;
            }
            @-webkit-keyframes animatetop {
                from { top:-30px; opacity:0 } 
                to { top:0px; opacity:1 }
            }
            .input1{
                opacity: 0;
        
            }
*/
            body{
/*
                background: black;
                color: red;
*/
            }
            .nav{
                margin: 0 1%;
            }
            .footer{
                bottom: 0;
                position:fixed;
                background: black;
                width: 100%;
                margin: 0;
                
            }
            th:hover{
                background: white;
            }
            #mytable{
                overflow-x: auto;
            }
            ::-webkit-file-upload-button {
                background: blue;
                color: black;
                padding: 5px;
                border-radius: 10px;
            }
            .bc:hover,.bc:focus,.bc{
                background-color: #2be32b;
            }
            html{
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body>
        
            
            <nav class="navbar navbar-inverse nav">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="main.php" style="color: red;
                font-family: 'Orbitron' ,sans-serif;">GODLY LTD.</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                      <ul class="nav navbar-nav">
                        <li ><a href="main.php">Home</a></li>
                        <li><a href="addproduct.php">Add Product</a></li>
                        <li class="active"><a href="confirmation.php">Confirmations</a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                      </ul>
                    </div>
                </div>
            </nav>
        
            
                
            
        <div class="container">
            <div id="snackbar"></div>
            <div class="row">
                <div class="col-xs-12" >
                    <ul class="list-inline" style="float:right;">
                        <li>● <a href="#await" >Awaiting Confirmation</a></li>
                        <li>● <a href="#conf">Confirmed Orders</a></li>
                        <li>● <a href="#dec">Declined Orders</a></li>
                    </ul>
                </div>
            </div>

            
            <div class="row" id="await">
                <div class="col-xs-12">
                    <center><h3><b>Awaiting Confirmations</b></h3></center>
                </div>
            </div>
        <?php
            $query="SELECT * FROM `item` ,`item_img`,`item_order`,`user` where item.ID=item_img.itemid && item.ID=item_order.i_id && item_order.c_id=user.ID && item_order.confirm=1 order by item.Name";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
        ?>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover" >
                        <thead>
                            
                                <tr>
                                    <th style="width:20%">
                                        Image
                                    </th>
                                    <th style="width:40%">
                                        Item Description
                                    </th>
                                    <th style="width:20%">
                                        Client Info
                                    </th>
                                    <th style="width:20%">
                                        
                                    </th>
                                    
                                </tr>    
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' />
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[1]; ?>
                                    <br>
                                    <b style="font-size:15px;">Description: </b><?php echo substr($row[2],0,120); ?>...
                                    <br>
                                    <b style="font-size:15px">Price: </b>₹<?php echo $row[3]; ?>
                                    <b style="font-size:15px">Quantity: </b><?php echo $row[4]; ?>
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[12]." ".$row[13]; ?>
                                    <br>
                                    <b style="font-size:15px">Email: </b><?php echo $row[14]; ?>
                                    <b style="font-size:15px">Quantity Ordered: </b>1
                                </td>
                                <td>
                                    <button onclick="orderaccept(<?php echo $row[8]; ?>,2,<?php echo $row[0]; ?>)" class="btn btn-default bc">
                                        Confirm
                                    </button>
                                    <br><br>
                                    <button onclick="orderaccept(<?php echo $row[8];?>,0,0)" class="btn btn-danger">
                                        Decline
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php    
                }
            }else{
        ?>
            <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <center><b>All Done!</b></center>
                        </div>
            </div>
        <?php    
            }
        ?>
            <hr>
            <div class="row" id="conf">
                <div class="col-xs-12">
                    <center><h3><b>Confirmed Orders</b></h3></center>
                </div>
            </div>
        <?php
            $query="SELECT * FROM `item` ,`item_img`,`item_order`,`user` where item.ID=item_img.itemid && item.ID=item_order.i_id && item_order.c_id=user.ID && item_order.confirm=2 order by item.Name";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
        ?>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover" >
                        <thead>
                            
                                <tr>
                                    <th style="width:20%">
                                        Image
                                    </th>
                                    <th style="width:40%">
                                        Item Description
                                    </th>
                                    <th style="width:20%">
                                        Client Info
                                    </th>
                                    <th style="width:20%">
                                        
                                    </th>
                                    
                                </tr>    
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' />
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[1]; ?>
                                    <br>
                                    <b style="font-size:15px;">Description: </b><?php echo substr($row[2],0,120); ?>...
                                    <br>
                                    <b style="font-size:15px">Price: </b>₹<?php echo $row[3]; ?>
                                    <b style="font-size:15px">Quantity: </b><?php echo $row[4]; ?>
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[12]." ".$row[13]; ?>
                                    <br>
                                    <b style="font-size:15px">Email: </b><?php echo $row[14]; ?>
                                    <b style="font-size:15px">Quantity Ordered: </b>1
                                </td>
                                <td>
                                    
                                    
                                    <button onclick="orderaccept(<?php echo $row[8];?>,0,0)" class="btn btn-danger">
                                        Decline
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php    
                }
            }else{
        ?>
            <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <center><b>Nothing to display</b></center>
                        </div>
            </div>
        <?php    
            }        
        ?>
            <hr>
            <div class="row" id="dec">
                <div class="col-xs-12">
                    <center><h3><b>Declined Orders</b></h3></center>
                </div>
            </div>
        <?php
            $query="SELECT * FROM `item` ,`item_img`,`item_order`,`user` where item.ID=item_img.itemid && item.ID=item_order.i_id && item_order.c_id=user.ID && item_order.confirm=0 order by item.Name";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
        ?>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover" >
                        <thead>
                            
                                <tr>
                                    <th style="width:20%">
                                        Image
                                    </th>
                                    <th style="width:40%">
                                        Item Description
                                    </th>
                                    <th style="width:20%">
                                        Client Info
                                    </th>
                                    <th style="width:20%">
                                        
                                    </th>
                                    
                                </tr>    
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' />
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[1]; ?>
                                    <br>
                                    <b style="font-size:15px;">Description: </b><?php echo substr($row[2],0,120); ?>...
                                    <br>
                                    <b style="font-size:15px">Price: </b>₹<?php echo $row[3]; ?>
                                    <b style="font-size:15px">Quantity: </b><?php echo $row[4]; ?>
                                </td>
                                <td>
                                    <b style="font-size:15px">Name: </b><?php echo $row[12]." ".$row[13]; ?>
                                    <br>
                                    <b style="font-size:15px">Email: </b><?php echo $row[14]; ?>
                                    <b style="font-size:15px">Quantity Ordered: </b>1
                                </td>
                                <td>
                                    <button onclick="orderaccept(<?php echo $row[8]; ?>,2,<?php echo $row[0]; ?>)" class="btn btn-default bc">
                                        Confirm
                                    </button>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php    
                }
            }else{
        ?>
            <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <center><b>Nothing to display</b></center>
                        </div>
            </div>
        <?php    
            }
                    
                    
                    
                    
            if(isset($_GET['id'])&&isset($_GET['c'])&&isset($_GET['d'])){
                $id=$_GET['id'];
                $c=$_GET['c'];
                $d=$_GET['d'];
                $query="Update `item_order` set confirm='$c' where id='$id'";
                if($result=mysqli_query($con,$query)){
                    $_SESSION['accept']=1;
                    if($d){
                        $query="Update `item` set quantity=quantity-1 where id='$d'";
                        $result=mysqli_query($con,$query);
            ?>
                <script>
                    window.location.href="confirmation.php";
                </script>
            <?php            
                    }else{
            ?>
                <script>
                    window.location.href="confirmation.php";
                </script>
            <?php
                    }
                }else{
                    $_SESSION['accept']=0;
            ?>
                <script>
                    window.location.href="confirmation.php";
                </script>
            <?php        
                }
                
            }elseif(isset($_SESSION['accept'])){
                if($_SESSION['accept']==1){
                    alert_func("Done!");
                    unset($_SESSION['accept']);
                }else{
                    alert_func("Some error occured!");
                    unset($_SESSION['accept']);
                }    
            }
        ?>
        </div>
        
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
    <script>
        function orderaccept(rec,a,b=0){
            window.location.href=`confirmation.php?id=${rec}&&c=${a}&&d=${b}`;
        }
    </script>
</html>
<?php 
                }else{
                    header("Location:login.php");
                }
        ?>