
    <?php
        if(isset($_POST['submit'])){
        session_start(); 
            include("connection.php");
        $first1=input_test($_POST['first']);
        $last1=input_test($_POST['last']);
        $userid1=input_test($_POST['userid']);
        $pass1=input_test($_POST['pass']);
        $pass2=input_test($_POST['pass1']);
        if($pass1!=$pass2){
            $_SESSION['msg1']="pns";
            header("Location:signup.php");
        }
        if($first1 && $last1 && $userid1 && $pass1){
            $query="Select * from ".db_admin." where `UserID`='$userid1'";
            $result=mysqli_query($con,$query);
            if($row=mysqli_fetch_array($result)){
                $_SESSION['msg1']="une";
                header("Location:signup.php");
            }
            else{
                $query="Insert into ".db_admin." (`Name`, `LastName`, `UserID`, `Password`,`active`) values('$first1','$last1','$userid1','$pass1','0')";
                mysqli_query($con,$query);
                
                unset($_SESSION['msg']);
                $_SESSION['otp']=rand(10000,99999);
                $_SESSION['user']=$userid1;
//                $sub="<h1>Your OTP is :".$_SESSION['otp']."</h1>";
//                if(mail("$userid1","Verification OTP","$sub")){
                header("Location:verify.php");
                
            }
        }
        }else{
            header("Location:signup.php");
        }
    ?>

<!--
<html>
    <head>
        
        <style>
            .signupsuc{
                margin: 200px;
                border: 1px black solid;
                padding: 10px;
                display: block;
            }
            h3{
                color: #ff0058
            }
            .signupfail{
                margin: 200px;
                border: 1px black solid;
                padding: 10px;
                display: none;
            }
            @media only screen and (max-width: 600px){
                .signupsuc{
                    margin:200px 100px;
                    
                    
                }
                .signupfail{
                    margin:200px 100px;
                    
                    
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="signupsuc">
                <div class="row">
                    <div class="col-xs-12">
                        <h3><center>SIGNED UP!!!</center></h3>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <center>
                            <a href="login.php" class="btn btn-primary">OK</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="signupfail">
                <div class="row">
                    <div class="col-xs-12">
                        <h3><center>USERNAME EXIST!!!</center></h3>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <center>
                            <a href="signup.php" class="btn btn-primary">OK</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
-->
