<?php        
        defined("db_host") || define("db_host","localhost");
        defined("db_name") || define("db_name","project2");
        defined("db_pass") || define("db_pass","");
        defined("db_user") || define("db_user","root");
//        defined("db_admin") || define("db_admin","admin");
        $con=mysqli_connect(db_host,db_user,db_pass,db_name)
        or die("Database Connection Error :".mysqli_connect_error());
            function input_test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function alert_func($data){
            //echo "<script> alert('$data'); </script>";
            echo "<script>mysnackbar('$data');</script>";
        }
?>