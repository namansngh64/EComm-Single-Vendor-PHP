<?php
session_start();
if(isset($_COOKIE['id'])){
    $_SESSION['id']=$_COOKIE['id'];
}
if(isset($_SESSION['id'])){
    header("Location:main.php");
}

?>
<html>
    <head>
        <?php
            include("header.php");
        ?>
        <style>
            .login{
                margin:10% 33%;
                border: 1px darkviolet solid;
                border-radius: 10px;
                width: 34%;
                background-color: white;
            }
            form{
                padding: 10px;
            }
            .company{
                color: red;
                font-family: 'Orbitron' ,sans-serif;
                
            }
            body{
                background-image: url(../image/login-background.png);
                background-repeat: no-repeat;
                background-size: cover;
                
/*
                background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(251,255,121,1) 0%, rgba(0,212,255,1) 100%);
*/
            }
/*
            .admin{
                background-color: darkslateblue;
*/
                
            
            .blogin{
               border-radius: 10px;
               transition: 0.3s;
            }
            .blogin:hover{
                background-color: #23e223;
            }
            .blogin:focus{
                background-color: #23e223;
                 
            }
/*
            .signup{
                background-color: darkgoldenrod;
*/
            
            @media only screen and (max-width: 650px){
                .login{
                    width: 50%;
                    margin: 10% 25%;
                        
                    
                }
            } 
            
            @media only screen and (max-width: 412px){
                .login{
                    width: 60%;
                    margin: 10% 20%;
                    
                }
            }                
        </style>
    </head>
    <body onload="load()">
        <div class="container">
            <div id="snackbar"></div>
            
            <div class="login">
                <div class="row">
                <div class="col-xs-12 company">
                    <center>
                        <h1>GODLY LTD.</h1>
                    </center>
                </div>
            </div>
                <div class="row">
                    <h3><center>Welcome</center></h3>
                    <div class="col-xs-12" >
                        <form action="reqlogin.php" method="post">
                            <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="user" required>
                            </div>
                            <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pass" required>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-default blogin" name="login">Log In</button><br>
                            <h5>Not registered yet? Signup <a href="signup.php">here</a></h5>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
</html>
<script>
    function load(){
        $(".company").animate({
            top:"-=10",
            opacity:0
        },200,function(){
            $(".company").animate({
               top:"+=10",
               opacity:1    
            },200);
        });
        $(".login").animate({
            top:"-=10",
            opacity:0
        },200,function(){
            $(".login").animate({
               top:"+=10",
               opacity:1    
            },200);
        });
    }
</script>
<?php
    if(isset($_SESSION['msg'])){
        if($_SESSION['msg']=="ude"){
            echo "<script>mysnackbar('Email ID Does Not Exist');</script>";
            unset($_SESSION['msg']);
        }elseif($_SESSION['msg']=="pnm"){
            echo "<script>mysnackbar('Incorrect Password');</script>";
            unset($_SESSION['msg']);
        }
    }
    if(isset($_SESSION['msg1'])){
        if($_SESSION['msg1']=="suc"){
            echo "<script>mysnackbar('SIGN UP SUCCESSFULL');</script>";
            unset($_SESSION['msg1']);
        }
    }
?>