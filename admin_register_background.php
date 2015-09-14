<?php

    //include
    require_once('include/config.inc.php');
    
    // Include required functions file 
    require_once('include/functions.inc.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    
//    echo $username.' '.$password.' '.$confirm.'<br>';/////test//////
    
    //connect Database
    $link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD) or die("Could not connect to host");
    mysqli_select_db($link, DB_DATABASE) or die("Could not find database");
    
    $sql = "SELECT username FROM username WHERE username='".$username."'";
    
    $result = mysqli_query($link, $sql);
    
    $num_row = mysqli_num_rows($result);
    
    if($num_row == 0) {
        
        if(strcmp($password, $confirm) == 0) {
        
            $sql_user = "INSERT INTO `username`(`username`, `password`) VALUES ('".$username."', '".md5($password)."')";

//            echo $sql_user;/////test/////

            try {
                $result = mysqli_query($link, $sql_user);

            ?>
                <script>
                    alert("Success");
                    location.replace("admin_login.php");
                </script>
             <?php       
                header("location:admin_login.php");

            }catch(Exception $e){
//                echo "fail";
             ?>
                <script>
                    alert("Have a problem in process. Please try again.");
                    location.replace("admin_register.php");
                </script>
            <?php
            }
            
        }
        else {
//            echo "fail";
        ?>
            <script>
                    alert("Password and Confirm Password aren't same. Please try again.");
                    location.replace("admin_register.php");
            </script>
        <?php
        }
    } 
    else {
//            echo "fail";
      ?>
            <script>
                    alert("You cannot use this username. Please try again.");
                    location.replace("admin_register.php");
            </script>
        <?php
        
    }
    
    //close connect
    mysqli_close($link);
    
?>

