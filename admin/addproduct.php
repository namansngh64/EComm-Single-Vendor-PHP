<?php
    session_start();
include("connection.php");

                if(isset($_COOKIE['admin'])){
                    $_SESSION['admin']=$_COOKIE['admin'];
                }
                if(isset($_SESSION['admin'])){
            
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
            .myform{
                width: 50%;
                display: inline-block;
                margin:0 25%;
                
            }
            @media only screen and (max-width: 500px){
                .myform{
                    width: 100%;
                    margin:0% ;
                    
                }
                .form-control{
                    width:80%;
                    float: right;
                }
            }
            @media only screen and (max-width: 900px){
/*
                .myform{
                    width: 100%;
                    margin:0% ;
                    
                }
*/
                .form-control{
                    width:80%;
                    float: right;
                }
            }
            ::-webkit-file-upload-button {
                background: white;
                color: black;
                padding: 5px;
                border-radius: 5px;
                transition: 0.3s;
            }
            ::-webkit-file-upload-button:hover {
                background: #4500ff;
                color: black;
                padding: 5px;
                border-radius: 5px;
                
            }
            ::-webkit-file-upload-button:focus {
                background: #4500ff;
                color: black;
                padding: 5px;
                border-radius: 5px;
                
            }
            .ba,.ba:focus,.ba:hover{
                background-color: #00ff00;
            }
/*
            #addp{
                border: 1px solid black;
                margin: 7% 25%;
                padding: 0;
                border-radius: 10px;
            }
*/
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
                        <li class="active"><a  href="addproduct.php">Add Product</a></li>
                        <li><a href="confirmation.php">Confirmations</a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                      </ul>
                    </div>
                </div>
            </nav>
        
            
                
            
        <div class="container">
            <div id="snackbar"></div>
<!--
            <div class="row">
                <div class="col-xs-12">
                    <h1><center>Welcome Naman</center></h1>
                </div>
            </div>
-->
            <br>
            <br>
            <div id="addp">
            <div class="row">
                <div class="col-xs-12">
                    <center><h3><b>Product's Details</b></h3></center>
                </div>
            </div>
            <br><br>
            <form class="form-horizontal myform" action="reqaddproduct.php" method="post" enctype="multipart/form-data" >
                  <div class="form-group" >
                    <label class="control-label col-xs-2" for="name">Name:</label>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                    </div>
                  </div>
                <div class="form-group" >
                    <label class="control-label col-xs-2" for="image">Image:</label>
                    <div class="col-xs-10">
                      <input type="file" id="image" name="image" required>
                    </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-xs-2" for="desc">Description:</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="desc" id="desc" placeholder="Enter description" required></textarea>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="control-label col-xs-2" for="price">Price:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" required>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="control-label col-xs-2" for="quantity">Quantity:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-xs-12">
                      <center><button type="submit" id="submit" name="submit" class="btn btn-default ba">Add</button></center>
                    </div>
                  </div>
            </form>
            </div>
            <?php 
                    if(isset($_SESSION['uploadok'])){
                        if($_SESSION['uploadok']==0){
                            alert_func("Something went wrong while uploading the image");
                            unset($_SESSION['uploadok']);
                        }elseif($_SESSION['uploadok']==1){
                            alert_func("Something went wrong while uploading the data");
                            unset($_SESSION['uploadok']);
                        }elseif($_SESSION['uploadok']==2){
                            alert_func("Uploaded!!");
                            unset($_SESSION['uploadok']);
                        }
                    }else{
                        
                    }
                ?>
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
    <script>
        $(document).ready(function(){
           $("#submit").click(function(e){
                var c=Math.round($("#price").val());
                var d=Math.floor($("#quantity").val());
               
                if((Number.isNaN(c)) || (Number.isNaN(d)) || (c<0) || (d<0) ){
                    mysnackbar("Enter valid values");
                    e.preventDefault();
                }
               if($("#image").val()==""){
                   mysnackbar("Please select a file");
                   return false;
               }else{
                   var extension=$("#image").val().split(".").pop().toLowerCase();
                   var arr=['jpg','jpeg','png'];
                   if($.inArray(extension,arr)!=-1){
                        if(confirm("Do you want to add this?")){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                       mysnackbar("Please select a valid image");
                       e.preventDefault(); 
                   }
                } 
           }); 
        });
        
    </script>
</html>
<?php
       }
                else{
                    
                    header("Location:login.php");
                }
            ?>             