<?php
    session_start();
include("connection.php");
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
            a{
                color: black;
            }
            a:hover{
                color: black;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        
            <?php 
                if(isset($_COOKIE['id'])){
                    $_SESSION['id']=$_COOKIE['id'];
                    $_SESSION['name']=$_COOKIE['name'];
                    $_SESSION['pid']=$_COOKIE['pid'];
                }
                if(isset($_SESSION['id'])){
                    
            ?>
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
                        <li class="active"><a href="main.php">Home</a></li>
                        <li><a href="confirmation.php">Awaiting Confirmation</a></li>
                        <li><a href="confirmed.php">Confirmed Orders</a></li>
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
                <div class="col-xs-12">
                    <center><marquee style="width:20%;color:red;font-size:20px" behavior="alternate" >Welcome <?php echo $_SESSION['name']; ?></marquee></center>
                </div>
            </div>
            <br>
            <div class="row p_row">
                <div class="col-xs-12">
                    <center><h3>List of Available Products</h3></center>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <input type="text" id="t1" class="form-control">
                </div>
                <div class="col-xs-9">
                    <input type="button" id="b2" value="Search" class="btn btn-default">
                </div>
            </div>
            <br>
            <?php 
                $query="SELECT * FROM `item` ,`item_img` where item.ID=item_img.itemid order by name";
                $result=mysqli_query($con,$query);                        
                while($row=mysqli_fetch_array($result)){
                ?>
                <div class="row p_row">
                    <a href="main.php?id=<?php echo $row[0]; ?>" >
                    <div class="col-xs-4">
                        <img src="../admin/<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' />
                    </div>
                    <div class="col-xs-6" >
                        <b><?php echo $row[1]; ?></b><br>
                        <span style="color:#9a4d00">Description-</span>
                        <div style="word-wrap:break-word;">
                            <?php
                                if(strlen($row[2])>120){
                                    echo substr($row[2],0,120);
                                    
                            ?>
                            ...<span style="color:red;text-decoration:underline">Read more</span>
                            <?php
                                }else{
                                    echo $row[2];
                                }
                                 
                            ?> 
                            </div>
                    </div>
                    <div class="col-xs-2">
                        <?php 
                            if($row[4]>0){
                        ?>
                        ₹
                        <?php
                                echo $row[3];?><span style="color:green"> (In Stock)</span>
                        <?php
                            }else{
                        ?>
                        ₹
                        <?php
                                echo $row[3];?><span style="color:red"> (Unavailable)</span>
                        <?php
                            } 
                        ?>
                    </div>
                    </a>
                    <div class="row">
                        <div class="col-xs-12">
                            <hr style="width:100%">
                        </div>
                    </div>
                </div>
           
                
            <?php
                }
                if(isset($_GET['id'])){
            ?>
            <script>
        
                $(".p_row").hide();
                
            </script>
            <?php
                    $id=$_GET['id'];
                    $query="SELECT * FROM `item` ,`item_img` where item.ID=item_img.itemid && item.ID='$id'";
                    $result=mysqli_query($con,$query);                        
                    $row=mysqli_fetch_array($result);
                    if(mysqli_num_rows($result)){
            ?>
            <div class="row p_row">
                <div class="col-xs-12">
                    <center><h3><b><?php echo $row[1]; ?></b></h3></center>
                </div>
            </div>
            <br>
            <div class="row p_row">
                <div class="col-xs-5">
                    <img src="../admin/<?php echo $row[7]; ?>" height='400' width='400' class='img-thumnail' />
                </div>
                <div class="col-xs-7">
                    
                    <?php echo $row[2]; ?><br>
                    <?php 
                            if($row[4]>0){
                        ?>
                        <br><b>₹
                        <?php
                                echo $row[3];?></b><span style="color:green"> (In Stock)</span>
                                <br><br>
                            <form method="post" action="reqorder.php">
                                <input type="text" value="<?php echo $row[0]; ?>" name="i_id" style="display:none">
                                <input type="text" value="<?php echo $_SESSION['pid']; ?>" name="c_id" style="display:none">
                                <button class="btn btn-default" name="order" type="submit" )>Buy</button>
                            </form>
                        <?php
                            }else{
                        ?>
                        <br><b>₹
                        <?php
                                echo $row[3];?></b><span style="color:red"> (Unavailable)</span>
                        <?php
                            } 
                        ?>
                </div>
            </div>    
            <?php
                    }else{
            ?>
                        <script>
        
                            window.location.href="main.php";
                
                        </script>
            <?php
                    }
                }elseif(isset($_GET['search'])){
                ?>    
                    <script>
        
                        $(".p_row").hide();
                
                    </script>
            <div class="row p_row">
                <div class="col-xs-12">
                    <center><h3>List of Available Products</h3></center>
                    
                </div>
                
            </div>
            
            <?php
                    $search=$_GET['search'];
                    $query="SELECT * FROM `item` ,`item_img` where item.ID=item_img.itemid && item.Name like '%$search%' order by name";
                    
                    $result=mysqli_query($con,$query);                        
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                    ?>
                    <div class="row p_row">
                        <a href="main.php?id=<?php echo $row[0]; ?>" >
                        <div class="col-xs-4">
                            <img src="../admin/<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' />
                        </div>
                        <div class="col-xs-6" >
                            <b><?php echo $row[1]; ?></b><br>
                            <span style="color:#9a4d00">Description-</span>
                            <div style="word-wrap:break-word;">
                                <?php
                                    if(strlen($row[2])>120){
                                        echo substr($row[2],0,120);

                                ?>
                                ...<span style="color:red;text-decoration:underline">Read more</span>
                                <?php
                                    }else{
                                        echo $row[2];
                                    }

                                ?> 
                                </div>
                        </div>
                        <div class="col-xs-2">
                            <?php 
                                if($row[4]>0){
                            ?>
                            ₹
                            <?php
                                    echo $row[3];?><span style="color:green"> (In Stock)</span>
                            <?php
                                }else{
                            ?>
                            ₹
                            <?php
                                    echo $row[3];?><span style="color:red"> (Unavailable)</span>
                            <?php
                                } 
                            ?>
                        </div>
                        </a>
                        <div class="row">
                            <div class="col-xs-12">
                                <hr style="width:100%">
                            </div>
                        </div>
                    </div>

                
            <?php
                }
                    }else{
            ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <center><b>No match found!</b></center>
                        </div>
                    </div>
            <?php
                    }
                }
                
                
            ?>
            
            
            
            <?php
                    if(isset($_SESSION['confirm'])){
                        if($_SESSION['confirm']==1){
                            alert_func("Order Placed!!Waiting for confirmation");
                            unset($_SESSION['confirm']);
                        }else{
                            alert_func("Something went wrong!");
                            unset($_SESSION['confirm']);
                        }
                    }
                }else{
                    header("Location:login.php");
                }
            ?>
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
    <script>
       $(function() {
        $("#t1").autocomplete({
            source: "reqsearch.php",
            type:"GET",
            select:function(e,ui){
                $("#b2").click();
            }
        });                

        });
    </script>
    <script>
        $(document).ready(function(){
        $("#b2").click(function(){
           var a=$("#t1").val();
            window.location.href=`main.php?search=${a}`;
        });
        });
    </script>
</html>