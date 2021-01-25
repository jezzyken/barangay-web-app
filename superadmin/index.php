

<?php include "includes/db.php" ?>

<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM tbl_admin WHERE username = '$username' and user_role = 'Super Admin'";

    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){

        $user_id = $row['user_id'];
        $user_name = $row['username'];
        $user_password = $row['password'];

    }

    if ($username === $user_name && $password === $user_password){

        header("Location: dashboard.php");

    }else{

         header("Location: index.php");
    }


}

?>




<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Maruti Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/maruti-login.css" />
    </head>
    <body>
      
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST">
				 <div class="control-group normal_text"> <h3><img src="../img/logo1.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" name="login"/></span>
                </div>
            </form>

            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
                </div>
            </form>
        </div>
        
        <script src="../js/jquery.min.js"></script>  
        <script src="../js/maruti.login.js"></script> 
    </body>

</html>
