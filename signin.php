<?php

         // Starting Session
        $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
        session_set_cookie_params(3600 * 24 * 7);
        session_start();

        include "script.php";

        $error=''; // Variable To Store Error Message

        if (isset($_POST['signin'])) {
        if (empty($_POST['signinphone']) || empty($_POST['signpassword'])) {
            
            
            
             $error = "Phone or Password is invalid";
        }
        else
        {
        // Define $username and $password
        $phone=$_POST['signinphone'];
        $password=$_POST['signpassword'];
            

        // To protect MySQL injection for Security purpose
            
            
            $phone = stripslashes($phone);
            $password = stripslashes($password);
            $phone = pg_escape_string($db, $phone); // Set email variable
            $password = pg_escape_string($db, $password); // Set hash variable
              
            $pass_crypted = sha1($password);
            
        // SQL query to fetch information of registerd users and finds user match.
            
            $sql="SELECT usr_id, usr_email, usr_first_name, usr_last_name, 
                  usr_encrypted_password,
                          usr_salt, usr_stos_id, usr_pers_id, usr_username, usr_updated_at,
                          usr_created_at, usr_enabled, usr_role_id, usr_jbrn_id, 
                  usr_mobile_number,
                          stp_acc_id, usr_location, usr_mobile_imei, usr_type
                      FROM js_core.stp_users

                      where usr_mobile_number='$phone'

                      AND usr_encrypted_password='$pass_crypted'
                      OFFSET 0 LIMIT 1
                     ";
            $result=pg_query($db, $sql);

            $rows = pg_num_rows($result);
            
            if ($rows != 0) {
                  $_SESSION['phone']=$phone; // Initializing Session
                    while ($row3 = pg_fetch_assoc( $result)) {
                          if (!$row3) {
                            echo "no rows found!";
                          }
                          else{
                          $_SESSION['username'] = $row3['usr_last_name'];
                            if(isset($_SESSION['url'])) 
                               $url = $_SESSION['url']; // holds url for last page visited.
                            else 
                               $url = "index.php"; 

                            header("Location: $url");

                          }
                 

             // Closing Connection

            }

            }
             else{
               header("Location: ../signin.php?s=1");
                $error = "Password and Username not found";
            }
}

}
        ?>




<!DOCTYPE html>
<html lang="en">
  <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
          <title>Sign in</title>


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
              <p class="text-center"><span style="color:#0271be; padding:3px 10px; border-radius:3px;" title="Secure Login"><span class="glyphicon glyphicon-lock"></span></span> <br> Enter your account details to sign in</p>
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group"> 
                          <label for="phone" class="form-control-label"> Phone No: </label>
                          <input type="phone" id="phone" class="form-control" name="signinphone" /> 
                        </div>

                        <div class="form-group">
                          <label for="password" class="form-control-label"> Password: </label>
                          <input type="password" id="password" class="form-control" name="signpassword" /> 
                        </div>

                        <div class="form-group"> <input type="submit" style="text-align:center !important;" name="signin" value="Sign In" class="text-center submit accountsForm btn btn-default"/> </div>
                        <?php
                          $error = false;
                          if(isset($error)){
                          echo '<div class="col-md-12 text-center" style="background: #d43531; color:#d4d4d4; padding:5px;">';
                          echo "Password and Username not found";
                          echo "</div>";
                          }
                        ?>
                    </form>
            </div>
            <hr>
            <div class="text-center">
              Or Sign up if you do not have an account <br>
              <h3><a href="signup.php" style="color:#0271be;">Sign Up</a></h3> <br>
              <p>Copyright © Daktari247 2016 | Powered by Smart People Africa</p>

            </div>

          </div>
        </div>
      </div>
      </div>

        </body>
        </html>
