<?php 
# SESSION Start...
session_start();

include ('../config/connection.php');

if ($_POST) {
    $q = "SELECT * FROM user WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
    $r = mysqli_query($dbc, $q);
    
    if (mysqli_num_rows($r) == 1) {
        $_SESSION['username'] = $_POST['email'];
        header('Location: index.php');
    } else {?>
        <div class="alert alert-warning">
            <?php echo "Wrong username or password";?>
        </div>
    <?php }
}?>
<!DOCTYPE HTML>
<html>
	
    <head>

        <title><?php echo 'Login | Mirror';?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php include ('./config/css.php');?>
        <?php include ('./config/js.php');?>
        
    </head>
	
    <body>
        
        <div id="wrap">
            
            <?php // include (D_TEMPLATE.'/navigation.php');?>
            <div class="container" style="padding-top: 20px">
                
                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="panel panel-default" id="login-container">
                        
                        <div class="panel-heading">
                            <h4><strong>Login</strong></h4>
                        </div>
                        
                        <div class="panel-body">
                            
                            <form action="login.php" method="post" role="form">

                                <div class="form-group">
                                    <label for="inputEmail">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>

                                <button type="submit" class="btn btn-block">Submit</button>
                                
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            
            </div>
            
        </div><!-- End wrap -->
        
    </body>
	
</html>