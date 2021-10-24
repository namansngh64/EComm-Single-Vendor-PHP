<?php
session_start();
include("connection.php");
//    if(isset($_SESSION['id'])){
//        echo "Welcome ".$_SESSION['name'];
//    }else{
//        echo "Session Expired! Please Login Again";
//    }
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
                background-image: url(../image/3d-background.jpg);
                color: white;
*/
                
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
            
            #mytable{
                overflow-x: auto;
            }
            ::-webkit-file-upload-button {
                background: #ffcf04;
                color: black;
                padding: 5px;
                border-radius: 5px;
                transition: 0.3s;
                opacity: 0.7;
            }
            ::-webkit-file-upload-button:hover {
                background: #ffcf04;
                color: black;
                padding: 5px;
                border-radius: 5px;
                opacity:1;
            }
            ::-webkit-file-upload-button:focus {
                background: #ffcf04;
                color: black;
                padding: 5px;
                border-radius: 5px;
                opacity: 1;
                
            }
            .bi{
                background-color: #ff8900;
                opacity: 0.8;
                transition: 0.3s;
                color: white;
            }
            .bi:hover,.bi:focus{
                background-color: #ff8900;
                opacity: 1;
            }
/*
            .shadow:hover{
                box-shadow: 10px 10px 10px 5px grey;
                transition: 0.2s;
            }
*/
            .shadow:nth-child(even){
                background:#b8d1f3 ;
            }
            .shadow:nth-child(odd){
                background:#dae5f4;
            }
            .shadow{
                opacity: 1;
            }
            th{
                background: #0c0c5c;
                color: white;
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
                        <li class="active"><a href="main.php">Home</a></li>
                        <li><a href="addproduct.php">Add Product</a></li>
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
            <div class="row">
                <div class="col-xs-12">
                    <h1><center>Welcome Naman</center></h1>
                </div>
            </div>

            <br>
<!--
            <div class="row">
                <div class="col-xs-offset-9 col-xs-3" >
                    <a href="logout.php" class="btn btn-primary" style="float:right">LOG OUT</a>
                </div>
            </div>
-->
            <br><br><br>
            <div id="mytable" class="row">
                <div class="col-xs-12">
                    <table class="table" >
                        <thead>
                            
                                <tr>
                                    <th style="width:10%">
                                        Image
                                    </th>
                                    <th style="width:10%">
                                        Name
                                    </th >
                                    <th style="width:40%">
                                        Description
                                    </th>
                                    <th style="width:10%">
                                        Price
                                    </th>
                                    <th style="width:10%">
                                        Quantity
                                    </th>
                                    <th style="width:10%">
                                        
                                    </th>
                                    <th style="width:10%">
                                        
                                    </th>
                                </tr>    
                            
                        </thead>
                    
                        <tbody id="tbody1">
                            <?php
                                    
                                        $query="SELECT * FROM `item` ,`item_img` where item.ID=item_img.itemid order by name";
                                        $result=mysqli_query($con,$query);
                                        
                                        if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_array($result)){
                            ?>  
                                            
                                            <tr class="shadow">
                                                
                                                <td  id="i<?php echo $row[0];?>" >
                                                    <img src="<?php echo $row[7]; ?>" height='100' width='100' class='img-thumnail' /><br><br>
                                                    <form class="modifyel<?php echo $row[0]; ?>" action="requploadimg.php?id=<?php echo $row[0];?>&&path=<?php echo $row[7]; ?>" method="post" enctype="multipart/form-data") style="display:none">
                                                    <input type="file" id="i<?php echo $row[0];?>" name="image" required /><br>
                                                    <input type="submit" name="submit" value="Change" class="btn btn-default bi">    
                                                    </form>
                                                </td>
                                                <td id="a<?php echo $row[0];?>">
                                                    <?php echo $row[1]; ?>
                                                </td>
                                                <td id="b<?php echo $row[0];?>">
                                                    <?php echo $row[2]; ?>
                                                </td>
                                                <td id="c<?php echo $row[0];?>">
                                                    <?php echo $row[3]; ?>
                                                </td >
                                                <td id="d<?php echo $row[0];?>">
                                                    <?php echo $row[4]; ?>
                                                </td>
                                                <td class="modifyel<?php echo $row[0]; ?>" id="m<?php echo $row[0]; ?>" style="display:none">
                                                    <input type="button"  class="btn btn-warning " value="Modify" onClick="modifyrec(<?php echo $row[0];?>)" /> 
                                                </td>
                                                <td class="modifyel<?php echo $row[0]; ?>" id="del<?php echo $row[0]; ?>" style="display:none">
                                                    <input type="button"  class="btn btn-danger " value="Delete" onClick="deleterec(<?php echo $row[0];?>)" />
                                                </td>
                                                <td colspan="2" id="ymodify<?php echo $row[0]; ?>">
                                                    <center>
                                                    <a href="#"  onclick="modifyf('<?php echo $row[0]; ?>');">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    </center>
                                                </td>
                                            </tr>
                                            
                            <?php
                                        }
                                        }else{
                            ?>                
                                            
                                            <tr>
                                                <th colspan=6>
                                                    <center>Nothing to display</center>
                                                </th>
                                            </tr>
                            
                            <?php
                                        }
                                       
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
<!--
            <div class="row">
                <div class="col-xs-3">
                    <button class="btn btn-info" id="b1">Users</button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-info" id="b2">Search</button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-warning" id="b3">Modify <br> By ID</button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-danger" id="b4">Delete <br>By ID</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-offset-3 col-xs-3">
                        <form method="post">
                            <p><input class="form-control input1" type="text" id="t1" placeholder="Enter ID"></p>
                        </form>
                </div>
                <div class="col-xs-3">
                    <input class="form-control input1" type="text" id="t2" placeholder="Enter ID">
                </div>
                <div class="col-xs-3">
                    <input class="form-control input1" type="text" id="t3" placeholder="Enter ID">
                </div>
            </div>
            <br>
            <div id="mytable" class="row" style="display:none">
                <div class="col-xs-12">
                    <table class="table table-hover" >
                        <thead>
                            
                                <tr>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        User ID
                                    </th>
                                    <th>
                                        Password
                                    </th>
                                </tr>    
                            
                        </thead>
                    
                        <tbody id="tbody1"> 
-->
                                <?php
                                    
//                                        $query="Select * from `user`";
//                                        $result=mysqli_query($con,$query);
//                                        while($row=mysqli_fetch_array($result)){
//                                            echo "<tr>
//                                            <td>
//                                            $row[0]
//                                            </td>
//                                            <td>
//                                            $row[1]
//                                            </td>
//                                            <td>
//                                            $row[2]
//                                            </td>
//                                            <td>
//                                            $row[3]
//                                            </td>
//                                            <td>
//                                            <input type='button' class='btn btn-danger' value='Delete' onClick=deleterecord('$row[2]'); >
//                                            </td>
//                                            </tr>";
//                                        }
//                                       
                            ?>
    <!--
                        <div class="row">
                            <div class="col-xs-12">
                                <tr>
                                    <td>
                                        First Name
                                    </td>
                                    <td>
                                        Last Name
                                    </td>
                                    <td>
                                        User ID
                                    </td>
                                    <td>
                                        Password
                                    </td>
                                </tr>    
                            </div>
                        </div>
    -->
<!--
                        </tbody>
                    </table>
                </div>
            </div>
-->

        </div>
        <br>
        <div class="footer">
            <center><h5>Developed by Namanpreet Singh</h5></center>
        </div>
    </body>
    <script>
//        $(document).ready(function(){
//            $("#b2").hover(function(){
//                $("#t1").removeClass("input1");
//                $("#t1").addClass(" textfield"); 
//            });
//            $("#b3").hover(function(){
//                $("#t2").removeClass("input1");
//                $("#t2").addClass(" textfield"); 
//            });
//            $("#b4").hover(function(){
//                $("#t3").removeClass("input1");
//                $("#t3").addClass(" textfield"); 
//            });
//            $("#b1").click(function(){
//                $("#mytable").toggle("fast");
//                ref();
//                
//            });
//            $("#b2").click(function(){
//                var id=$("#t1").val();
//                if(id){
//                    $.ajax({
//                        url:"reqmain.php",
//                        type:"GET",
//                        data:{
//                            operation: "search",
//                            todo:id    
//                        },success:function(data){
//                            $("#mytable").show("fast");
//                            $("#tbody1").html(data);
//                        }
//                });
//                }
//            });
//            
//        });
//        
//        function ref(){
//            $.ajax({
//                    url:"reqmain.php",
//                    type:"GET",
//                    data:{
//                      operation: "users"
//                    },success:function(data){
//                        $("#tbody1").append($("#tbody1").html(data));
//                    }
//                });
//        }
//        function deleterecord(id){
//            
//            if(confirm("Do you really wanna do this??srsly?")){
//            $.ajax({
//                    url:"reqmain.php",
//                    type:"GET",
//                    data:{
//                      operation: "delete",
//                      todo:id    
//                    },success:function(data){
//                        alert("Deleted!!!");
//                        ref();
//                    }
//                });
//            }
//        }
//        function modifyrecord(id){
//            $.ajax({
//                    url:"reqmain.php",
//                    type:"GET",
//                    data:{
//                      operation: "modify",
//                      todo:id    
//                    },success:function(data){
//                        $("#"+id).html(data);
//                    }
//                });
//        }
//        function cancelfunc(id){
//            $.ajax({
//                    url:"reqmain.php",
//                    type:"GET",
//                    data:{
//                      operation: "cancel",
//                      todo:id    
//                    },success:function(data){
//                        $("#"+id).html(data);
//                    }
//                });
//        }
//        function okfunc(id){
//            var val1=$("#"+id+"a").val();
//            var val2=$("#"+id+"b").val();
//            var val3=$("#"+id+"c").val();
//            var val4=$("#"+id+"d").val();
//            if(val1 && val2 && val3 && val4){
//                if(confirm("Do you really wanna do this??srsly?")){
//                    $.ajax({
//                        url:"reqmain.php",
//                        type:"GET",
//                        data:{
//                            operation: "ok",
//                            todo:id,
//                            first:val1,
//                            last:val2,
//                            user:val3,
//                            pass:val4
//                        },success:function(data){
//                            $("#"+id).html(data);
//                        }
//                    });
//                }
//            }
//        }
        function modifyrec(rec){
            var a=$("#a"+rec).html().trim();
            var b=$("#b"+rec).html().trim();
            var c=$("#c"+rec).html().trim();
            var d=$("#d"+rec).html().trim();
            
            //var i=$("#i"+rec)[0].files[0];
            //$("#i"+rec).append($("#i"+rec).html(`<input type="file" id="f${rec}" required />`));
           // $("#f"+rec).show();
            $("#a"+rec).html(`<input type="text" id="t1${rec}" class="form-control" value="${a}" required/>`);
            $("#b"+rec).html(`<input type="text" id="t2${rec}" class="form-control" value="${b}" required/>`);
            $("#c"+rec).html(`<input type="text" id="t3${rec}" class="form-control" value="${c}" required/>`);
            $("#d"+rec).html(`<input type="text" id="t4${rec}" class="form-control" value="${d}" required/>`);  
            $("#m"+rec).html(`<a onClick=okfunc(${rec});  >
                            <span class='glyphicon glyphicon-ok'></span>
                        </a>`);
            $("#del"+rec).html(`<a onClick=cancelfunc();>
                            <span class='glyphicon glyphicon-remove'></span>
                        </a>`);
        }
        function okfunc(rec){
            
            var a=$("#t1"+rec).val();
            var b=$("#t2"+rec).val();
            var c=Math.round($("#t3"+rec).val());
            var d=Math.floor($("#t4"+rec).val());
//            var i=$("#f"+rec).val();
//            if(i!=""){
//                var extension=$("#f"+rec).val().split(".").pop().toLowerCase();
//                var arr=['jpg','jpeg','png'];
//               if($.inArray(extension,arr)==-1){
//                   alert("Select valid image");
//                   return false;
//               }else{
//                   if((Number.isNaN(c)) || (Number.isNaN(d)) || (c<0) || (d<0) ){
//                        alert("Enter valid values");
//                    }else{
//                        if(confirm("Do you want to modify?")){
//                            window.location.href=`reqmain.php?operation=ok&&todo=${rec}&&name=${a}&&desc=${b}&&price=${c}&&quantity=${d}`;    
//                        }else{
//
//                        }
//               }
//            }
            
            if((Number.isNaN(c)) || (Number.isNaN(d)) || (c<0) || (d<0) ){
                mysnackbar("Enter valid values");
            }else{
                if(confirm("Do you want to modify?")){
                    window.location.href=`reqmain.php?operation=ok&&todo=${rec}&&name=${a}&&desc=${b}&&price=${c}&&quantity=${d}`;    
                }else{
                    
                }
                
            }
        }
        
            
        function cancelfunc(){
            window.location.href="main.php";
            
        }
        function deleterec(rec){
            if(confirm("Do you want to delete this?You won't be able to undo this")){
                window.location.href=`reqmain.php?operation=delete&&todo=${rec}`;
            }else{
                
            }
        }
//        function loadanimate(t){
//            alert("yeah");
//            $("#"+t).addClass("shadow");
////            $("#"+t).animate({
////                marginTop:"-=10",
////                opacity:0
////            },200,function(){
////                $("#"+t).animate({
////                marginTop:"+=10",
////                opacity:1
////                }),200}
////            );
//        }
        function modifyf(t){
            $("#ymodify"+t).hide();
            $(".modifyel"+t).show();
        }
    </script>
        
<!--
    <script type="text/javascript">
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
-->
</html>
<?php 
                }else{
                    header("Location:login.php");
?>
<!--
                    <script>
                        window.location.href="login.php";
                    </script>          
-->
<?php
                    
                    
                }
?>