<?php
session_start();
if(isset($_SESSION['otp'])){
  
?>
<html>
    <head>
        <?php
            include("header.php");
        ?>
        <style>
            .row1{
                margin: 15%;
                border: 1px solid green;
                border-radius: 10px;
                background-color: white;
            }
            .o{
                color: green;
                
            }
            .company{
                color: red;
                font-family: 'Orbitron' ,sans-serif;
                
            }
            body{
                background-image: url(../image/unnamed.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <div id="snackbar"></div>
            
            <div class="row row1">
                <div class="row">
                <div class="col-xs-12 company">
                    <center>
                        <h1>GODLY LTD.</h1>
                    </center>
                </div>
            </div>
                <div class="col-xs-12">
                    <h1 class="o"><center>Enter OTP to activate account</center></h1>
                    <form action="reqverify.php" method="post">
                        <center><input type="text" style="width:20%" class="form-control" id="otp" name="otp" value=<?php echo $_SESSION['otp']; ?> />
                            
                            <br>
                        <input type="submit" class="btn btn-primary" value="Verify" name="submitv"/>
                            </center>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
</html>
<?php
if(isset($_SESSION['msg1'])){
    if($_SESSION['msg1']=="onm"){
        echo "<script>mysnackbar('OTP does not match.Please enter again');</script>";
        ?>
        <script>
            $(document).ready(function(){
                $("#otp").val('');    
            });
            
        </script>
<?php
        unset($_SESSION['msg1']);
    }
}
}else{
header("Location:login.php");
}
?>