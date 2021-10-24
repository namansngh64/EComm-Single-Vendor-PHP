<?php
    session_start();
include("connection.php");

                if(isset($_COOKIE['id'])){
                    $_SESSION['id']=$_COOKIE['id'];
                    $_SESSION['name']=$_COOKIE['name'];
                    $_SESSION['pid']=$_COOKIE['pid'];
                }
                if(isset($_SESSION['id'])){
                    
        
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
            a[href="#dec"]{
                color:red;
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
                        <li class="active"><a href="confirmation.php">Awaiting Confirmation</a></li>
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
                     <a href="#dec" style="float:right">● Declined Orders</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <center><h3><b>Awaiting Confirmation</b></h3></center>
                </div>
            </div>
            <br>
        <?php
            $query="SELECT * FROM `item` ,`item_img`,`item_order` where             item.ID=item_img.itemid && item.ID=item_order.i_id && item_order.c_id='".$_SESSION['pid']."' && item_order.confirm=1 order by item.Name";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){        
                while($row=mysqli_fetch_array($result)){
        ?>
            <div class="row">
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
                        <b>₹<?php echo $row['3'];?></b>
                    </div>
                </a>
                <div class="row">
                    <div class="col-xs-12" style="width:100%">
                        <hr>
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
                    <center><b>Nothing to display</b></center>
                </div>
            </div>
        <?php
            }
        ?>
           
            <br>
            <div class="row" id="dec">
                <div class="col-xs-12">
                    <center><h3><b>Declined Orders</b></h3></center>
                </div>
            </div>
            <br>
        <?php
            $query="SELECT * FROM `item` ,`item_img`,`item_order` where             item.ID=item_img.itemid && item.ID=item_order.i_id && item_order.c_id='".$_SESSION['pid']."' && item_order.confirm=0 order by item.Name";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){        
                while($row=mysqli_fetch_array($result)){
        ?>
            <div class="row">
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
                        <b>₹<?php echo $row['3'];?></b>
                    </div>
                </a>
                <div class="row">
                    <div class="col-xs-12" style="width:100%">
                        <hr>
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
                    <center><b>Nothing to display</b></center>
                </div>
            </div>
        
        <?php
            }
        ?>
            
        
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
</html>
<?php    
                }else{
                    header("Location:login.php");
                }
        ?>