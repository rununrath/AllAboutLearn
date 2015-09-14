<?php 

	// Include required MySQL configuration file and functions 
	
	require_once('config.inc.php'); 
	
	require_once('functions.inc.php'); 
	
	// Start session 
	
	session_start(); 
	
	// Check if user is already logged in 
	
	if ($_SESSION['logged_in'] == true) { 
		 // If user is already logged in, redirect to main page 
		 redirect('../admin_home.php'); 
	
	} else { 
            
//            echo 'no session'."<br>";/////////////test//////////
//            echo $_POST['username']."  ".$_POST['password']."<br>";////////////test//////////
	
                // Make sure that user submitted a username/password 
		
		 if ( (!isset($_POST['username'])) || (!isset($_POST['password'])) ) { 
                     
//                        echo 'unset username & password';/////////////test//////////
			
		 	redirect('../admin_login.php'); 
	
		 } 
		
		 // Connect to database 
                 
		 $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE); 
                 
		 // Check connection 
		
		 if (mysqli_connect_errno()) { 
		
		 	printf("Unable to connect to database: %s", mysqli_connect_error()); 
		
                        exit(); 
                }
	 
                // Escape any unsafe characters before querying database 
                $username = $mysqli->real_escape_string($_POST['username']); 
                $password = $mysqli->real_escape_string($_POST['password']); 
                
//                echo $username."  ".$password."<br>";//////////////test/////////////

                // Construct SQL statement for query & execute 
                $sql = "SELECT * FROM username WHERE username = '" . addslashes($username ). "' AND password = '" . md5($password) . "'"; 

                $result = $mysqli->query($sql); 
                
//                echo $sql."<br>";////////////test/////////////

                // If one row is returned, username and password are valid 

                if (is_object($result) && $result->num_rows == 1) { 

                        // Set session variable for login status to true 
                       $_SESSION['username'] = $username;

//                       echo "username  ".$_SESSION['username']."<br>";////////////test//////////

                       $row = mysqli_fetch_array($result);


                       $_SESSION['uid'] = $row['id'];

//                       echo "id  ".$_SESSION['uid']."<br>";////////////test//////////               

                       $_SESSION['logged_in'] = true; 

//                       echo "logged_in  ".$_SESSION['logged_in']."<br>";////////////test//////////   

                       setcookie("uid", $row['id'], time() + (86400 * 30), "/");

                       redirect('../admin_home.php'); 

                } else { 

                        // If number of rows returned is not one, redirect back to login screen 

                        redirect('../admin_login.php'); 

                } 
	
	} 

?>