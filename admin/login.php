<?php
session_start();
if(isset($_COOKIE['admin'])){
    $_SESSION['admin']=$_COOKIE['admin'];
}
if(isset($_SESSION['admin'])){
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
                margin:10% 35%;
                border: 1px darkviolet solid;
                border-radius: 10px;
                width: 30%;
                background-color: white;
            }
            form{
                padding: 10px;
            }
            .company{
                color: red;
                font-family: 'Orbitron' ,sans-serif;
                
            }
            .text{
                border: 0;
                width: 100%;
                border-bottom: 1px solid green;
            }
            .text:focus{
                outline: none;
            }
            body{
                background-color: #413d3d;
                background-image: url("../image/31709.jpg");
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
                
            }
            .blogin{
               border-radius: 10px;
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
                    <h3><center>Admin Page</center></h3>
                    <div class="col-xs-12" >
                        <form method="post">
                            <div class="form-group">
                            <label for="email">Username:</label><br>
                            <input type="text" class=" text" name="user" required>
                            </div>
                            <div class="form-group">
                            <label for="pwd">Password:</label><br>
                            <input type="password" class=" text" name="pass" required>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-default blogin" name="login">Log In</button><br>
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
    if(isset($_POST['login'])){
        
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if($user=="namansngh64" && $pass=="naman"){
            $_SESSION['admin']=$user;
            $_SESSION['aname']="Naman";
            if(isset($_POST['remember'])){
                $time=30*24*60*60;
                setcookie("admin",$user,time()+$time);
            }
?>
            <script>
                window.location.href="main.php";
            </script>
<?php
                
            
        }else{
            ?>
            <script>
                 mysnackbar("Username or Password Incorrect");
            </script>
<?php
            header("Location:login.php");
        }
    }
?>
