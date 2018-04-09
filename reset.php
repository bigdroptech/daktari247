
<!DOCTYPE html>
<html lang="en">
  <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
          <title>Reset</title>


          <!-- Bootstrap Core CSS -->
          <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

          <!-- Custom Fonts -->
          <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
          <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
          <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
          <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

          <!-- Main CSS -->
          <link href="css/doc.css" rel="stylesheet">
          <link href="css/full-slider.css" rel="stylesheet">
  </head>
<body>
  
  <div class="container">
      <div class="col-md-6 col-md-offset-3" style="margin-top:8%;" id="signIn" >
        <div class="row">
          <!-- Modal content-->
          <div class="modal-content" style="border:1px solid aliceblue;box-shadow:none;">
            <div class="modal-body">
              <p class="text-center"><span style="color:#0271be; padding:3px 10px; border-radius:3px;" title="Secure Login"><span class="glyphicon glyphicon-lock"></span></span> <br> Enter your Email Adreess below to reset your account</p>
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group">
                          <label for="password1" class="form-control-label"> Password: </label>
                          <input type="password" id="password1" class="form-control" name="password1" required/> 
                        </div>
                        <div class="form-group">
                          <label for="password2" class="form-control-label"> Confirm Password: </label>
                          <input type="password" id="password2" class="form-control" name="password2" required/> 
                        </div>

                        <div class="form-group"> <input type="submit" style="text-align:center !important;" name="resetpswd" value="Reset Password" class="text-center submit accountsForm btn btn-default"/> </div>
                    </form>

                    <?php
                      include "../script.php";

                      $hash = (isset($_GET[$hash]));
                      $resetmail = (isset($_GET[$resetmail]));

                      if (isset($_POST['resetpswd'])){
                        
                        // Define $username and $password
                        $password1=$_POST['password1'];
                        $password2=$_POST['password2'];

                        $password1=stripslashes($password1);
                        $password2=stripslashes($password2);
                        $password1 = pg_escape_string($db, $password1); // Set email variable
                        $password2 = pg_escape_string($db, $password2); // Set hash variable

                        $pass_crypted = sha1($password1);
                        $pass_crypted = sha1($password2);

                        if($password1 == $password2{
                          $sql="UPDATE js_core.stp_users Set (usr_encrypted_password) = ('$password1'),
                          Where usr_reset_hash='$hash'
                          AND usr_email='$resetmail'
                          ";
                        }

                        else{
                          header(Location: ../index.php);
                        }
                      }
                        
                      

                    ?>
            </div>
            <hr>
            <div class="text-center">
              <h5><a href="signup.php" style="color:#0271be;">Sign Up</a></h5>or<h5><a href="signin.php" style="color:#0271be;">Log in</a></h5> 
              <br>
              <p>Copyright © Daktari247 2016 | Powered by Smart People Africa</p>

            </div>

          </div>
        </div>
      </div>
      </div>

</body>
</html>
