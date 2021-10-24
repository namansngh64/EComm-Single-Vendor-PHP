<?php 
session_start();
?>
<html>
    <head>
        <?php 
            include("header.php");
        ?>
        <style>
            .signup{
                border: 1px darkviolet solid;
                
                margin: 5% 25%;
                border-radius: 10px;
                width: 50%;
                background-color: white;
            }
            form{
                padding: 10px;
                
            }
            .company{
                color: red;
                font-family: 'Orbitron' ,sans-serif;
                
            }
            .bsignup{
                border-radius: 10px;
            }
            .bsignup:hover{
                background-color: orange;
            }
            .bsignup:focus{
                background-color: orange;
            }
             @media only screen and (max-width: 600px){
                .signup{
                    margin:10% 15%;
                    width: 70%;
                    
                }
            } 
            body{
                background-image: url(../image/login_full_bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="snackbar"></div>
            
            <div class="signup">
                <div class="row">
                <div class="col-xs-12 company">
                    <center>
                        <h1>GODLY LTD.</h1>
                    </center>
                </div>
            </div>
                <h2><center>WELCOME</center></h2>
                <form class="form-horizontal" action="reqsignup.php" method="post">
                    <div class="row form-group">
                        <div class="control-label col-xs-4">
                            <b>First Name:</b>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="first" class="form-control" placeholder="Enter First Name" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="control-label col-xs-4">
                            <b>Last Name:</b>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="last" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="control-label col-xs-4">
                            <b>User ID:</b>
                        </div>
                        <div class="col-xs-8">
                            <input type="email"  class="form-control" placeholder="Enter User ID" name="userid" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="control-label col-xs-4">
                            <b>Password:</b>
                        </div>
                        <div class="col-xs-8">
                            <input type="password" id="pass1" class="form-control" placeholder="Enter Password" name="pass" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="control-label col-xs-4">
                            <b>Confirm Password:</b>
                        </div>
                        <div class="col-xs-8">
                            <input type="password" id="pass2" class="form-control" placeholder="Confirm Password" name="pass1" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <center><input type="submit" id="signup1" class="btn btn-default bsignup" value="SIGN UP" name="submit"></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
    <script>
        $(document).ready(function(){
           $("#signup1").click(function(event){
               if($("#pass1").val()!=$("#pass2").val()){
                   mysnackbar("PASSWORD DOES NOT MATCH");
                   event.preventDefault();
               }
           }); 
        });
    </script>
    <?php 
    if(isset($_SESSION['msg1'])){
    
    if($_SESSION['msg1']=="une"){
        echo "<script>mysnackbar('USERNAME ALREADY EXIST!!');</script>";
        unset($_SESSION['msg1']);
    }elseif($_SESSION['msg1']=="pns"){
        echo "<script>mysnackbar('Password does not match!!!');</script>";
            unset($_SESSION['msg1']);
    }
    }
    
    ?>
</html>