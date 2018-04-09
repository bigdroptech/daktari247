<?php
include "functions.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
          <title>Sign Up</title>


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
      <div class="col-md-6 col-md-offset-3" style="margin-top:4%;" id="signIn" >
        <div class="row">
          <!-- Modal content-->
          <div class="modal-content" style="border:1px solid aliceblue;box-shadow:none;">
            <div class="modal-body">
              <p class="text-center"><span style="color:#0271be; padding:3px 10px; border-radius:3px;" title="Secure Signup"><span class="glyphicon glyphicon-lock"></span></span> <br> Enter your details to create an account</p>
                    <form action="functions.php" method="post" class="form-horizontal">
                          <div class="form-group"> 
                            <label for="firstname" class="form-control-label"> First Name: </label>
                            <input type="text" id="firstname" class="form-control" name="firstname" required/> 
                          </div>
                          <div class="form-group">
                            <label for="SecondName" class="form-control-label"> Second Name: </label>
                            <input type="text" class="form-control" id="SecondName" name="name" required/> 
                          </div>
                          <div class="form-group">
                            <label for="Email" class="form-control-label"> Email </label>
                            <input type="email" class="form-control" id="Email" name="email" required/> 
                          </div>
                          <div class="form-group">
                            <label for="Phone" class="form-control-label"> Phone No: </label>
                            <input type="phone" class="form-control" id="Phone" name="phone" required/> 
                          </div>
                          <div class="form-group">
                              <label class="form-control-label">Gender</label>
                                  <label class="radio-inline"> <input class="form-horizontal" type="radio" name="gender" id="male" value="male" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male </label>
                                  <label class="radio-inline"> <input class="form-horizontal" type="radio" name="gender" id="female" value="female"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female </label>
                          </div>
                          <div class="form-group">
                            <label for="dob" class="form-control-label"> Date of Birth: </label>
                            <input type="date" class="form-control" id="dob" name="dob" required/> 
                          </div>
                          <div class="inputs form-group">
                              <label for="town" class="form-control-label"> County: </label>  
                              <?php 
                              $query= "select * from js_core.js_regions;";
                              $result = pg_query($query);
                                  echo'<datalist id="towns">';
                                    while ($row = pg_fetch_assoc($result)) {
                                    echo '<option value="'.htmlspecialchars($row['jrg_name']).'">'.htmlspecialchars($row['jrg_name']).'</option>';
                                    }
                                     echo' </datalist>'; 
                                    echo'<input type="text" id="town" class="form-control" name="county" list="towns" placeholder="County">';
                              ?>
                          </div>
                          <div class="form-group">
                            <label for="Password" class="form-control-label"> Password: </label>
                            <br/> <input type="password" class="form-control" id="Password" name="password" required/> 
                          </div>
                          <div class="form-group"> <input type="submit" style="text-align:center !important;" class="submit btn btn-default accountsForm" name="signup" value="Sign Up" myFunction="data" /> </div>
                      </form>
            </div>
            <hr>
            <div class="text-center">
              Or Sign in if you already have an account <br>
              <h3><a href="signin.php" style="color:#0271be;">Sign In</a></h3> <br>
              <p>Copyright © Daktari247 2016 | Powered by Smart People Africa</p>

            </div>

          </div>
        </div>
      </div>
      </div>

        </body>
        </html>