<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Admin Register</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
                     
            <!--login modal-->
            <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
              
              <br><br><br>
                  
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="text-center">Register</h1>
                  </div>
                  <div class="modal-body">
                      <form id="login-form" action="admin_register_background.php" method="post" class="form col-md-12 center-block">
                        <div class="form-group">
                            <input type="text" id="username" name="username" class="form-control input-lg" required="" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control input-lg" required="" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control input-lg" required="" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-block">Sign Up</button>
                          
                        </div>
                      </form> 
                        
                      <br>
                      <span class="pull-right"><a href="admin_login.php">Log In</a></span>
                      
                  </div>
                  <div class="modal-footer">
                      <div class="col-md-12">
                        
<!--                          <br>
                          
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
                      </div>	
                  </div>
              </div>
              </div>
            </div>
            <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>