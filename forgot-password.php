
<!DOCTYPE html>
<html lang="en">
  <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
          <title>Recover</title>


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
                          <label for="mail" class="form-control-label"> Email address: </label>
                          <input type="email" id="mail" class="form-control" name="resetmail" /> 
                        </div>

                        <div class="form-group"> <input type="submit" style="text-align:center !important;" name="mail" value="Reset" class="text-center submit accountsForm btn btn-default"/> </div>

                        <?php

                        if (isset($_POST['freequestion'])){

                         $resetmail = $_POST["resetmail"];

 
                            $resetmail = pg_escape_string($db, $resetmail);

                                if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $resetmail)){
                              // Return Error - Invalid Email
                              $msg = 'The email you have entered is invalid, please try again.';
                          } 
                          else{
  

                                $sql = "SELECT usr_email FROM js_core.stp_users WHERE usr_email='$resetmail'";

                                $result = pg_query($db,$sql);

                            if ($result) {
                             
                              $row = pg_fetch_array($result,pg_fetch_assoc());

                                                echo "That email does not exist" . $sql . "<br/>";
                                                echo pg_last_error();
                                                exit();
                                                
                            }
                            else{


                          $hash = sha1(0,100000);

                          $sql ="INSERT INTO js_core.stp_users (usr_reset_hash)VALUES 
                          ('$hash') WHERE usr_email='$resetmail'";




                            $to = $resetmail; // Send email to our user
                            $subject = 'Daktari247 | Reset Password'; // Give the email a subject 
                            $message = '
                             
                            We have received a password change request for your Daktari247 account email: '.$resetmail.'.

                            If you did not ask to change your password, then you can ignore this email and your password will not be changed. 
                            The link below will remain active for 25 hours.
                             
                            Please click this link to activate your account:
                            http://www.daktari247.co.ke/config/reset.php?email='.$resetmail.'&hash='.$hash.'
                             
                            '; // Our message above including the link
                                                 
                            $headers = 'From:noreply@doc.co' . "\r\n"; // Set from headers
                            mail($to, $subject, $message, $headers); // Send our email
                            }
                          }
                        }
                          
                        ?>

                    </form>

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
