 <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="copyright">Copyright &copy; Daktari247 2016 | Powered by Smart People Africa | <a href="terms_and_condition.html">Terms & Conditions</a></span>
                </div>
            </div>
        </div>
    </footer>

    <style>
    footer a{
      color: #fff;
    }

    </style>

      <!-- Free Question Modal -->
      <div class="modal fade" id="freequestion" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ask a Free Question</h4>
            </div>
            <div class="modal-body">
              <p><i><span style="color:#0271be;" class="glyphicon glyphicon-lock"></span> Note: The information you enter here is private and won't be shared</i></p>
                    <form action="config/free-question.php" method="post" class="form-horizontal">
                        <div class="form-group">
                          <select class="form-control" id="forwho" name="forwho">
                            <option disabled selected hidden>Is this question for you or someone else</option>
                            <option value="myself">Myself</option>
                            <option value="someoneelse">Someone else</option>
                          </select> 
                        </div>
                        <div class="form-group">
                          <label for="mainquestion" class="form-control-label"> Describe the issue here in detail: </label>
                          <textarea class="form-control" rows="3" id="mainquestion" name="describeissue"></textarea>
                        </div>
                        <p>Basic Info</p>
                        <div class="radio">
                          <p><b>Gender:</b></p>
                          <label class="radio-inline">
                            <input type="radio" id="inlineCheckbox1" value="male" name="gender"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Male</span> 
                          </label>
                          <label class="radio-inline">
                            <input type="radio" id="inlineCheckbox2" value="female" name="gender"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Female</span> 
                          </label>
                          <label class="radio-inline">
                            <input type="radio" id="inlineCheckbox2" value="other" name="gender"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Other</span> 
                          </label>
                        </div>
                        <div class="form-group"> 
                          <label for="dob" class="form-control-label"> Date Of Birth: </label>
                          <input type="date" id="dob" class="form-control" name="dob" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="location" class="form-control-label"> Location: </label>
                          <input type="text" id="location" class="form-control" name="location" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="Weight" class="form-control-label"> Weight: </label>
                          <input type="text" id="Weight" class="form-control" name="weight" /> 
                        </div>
                         <div class="form-group"> 
                          <label for="Diagnose" class="form-control-label"> Do you have any previous diagnosed condition: </label>
                          <input type="text" id="Diagnose" class="form-control" name="diagnose" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="diagnose" class="form-control-label"> Do you take any medication: </label>
                          <input type="text" id="diagnose" class="form-control" name="medication" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="allergies" class="form-control-label"> Do you have any allergies: </label>
                          <input type="text" id="allergies" class="form-control" name="allergies" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="preffered" class="form-control-label"> Preffered Doctor: </label>
                          <input type="text" id="preffered" class="form-control" name="preffered" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="qsemail" class="form-control-label"> Email address: </label>
                          <input type="email" id="qsemail" class="form-control" name="qsemail" /> 
                        </div>

                        <div class="form-group"> <input type="submit" name="freequestion" value="Ask Question" style="text-align:center !important;" class="submit accountsForm btn btn-default"/> </div>
                    </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>








    <!-- Sign in Modal -->

      <div class="modal fade" id="signIn" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body">
              <p>Enter your account details to sign in</p>
                    <form action="config/login.php" method="post" class="form-horizontal">
                        <div class="form-group"> 
                          <label for="phone" class="form-control-label"> Phone No: </label>
                          <input type="phone" id="phone" class="form-control" name="signinphone" /> 
                        </div>

                        <div class="form-group">
                          <label for="password" class="form-control-label"> Password: </label>
                          <input type="password" id="password" class="form-control" name="signpassword" /> 
                        </div>
          
                        <p><?php echo $error; ?></p>

                        <div class="form-group"> <input type="submit" style="text-align:center !important;" name="signin" value="Sign In" class="text-center submit accountsForm btn btn-default"/> </div>
                    </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Sign up Modal -->

      <div class="modal fade" id="signUp" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sign Up</h4>
            </div>
              <div class="modal-body">
                <p>Enter you details below to sign up</p>
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
                                  <label class="radio-inline"> <input class="form-horizontal" type="radio" name="gender" id="male" value="male" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male </label>
                                  <label class="radio-inline"> <input class="form-horizontal" type="radio" name="gender" id="female" value="female"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female </label>
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
          </div>
        </div>





    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>



  <!-- Search Angluar Script -->
  <script type="text/javascript">
      // Get the <datalist> and <input> elements.

      //ajax for city#quicksearch

      var dataList = document.getElementById('towns');
      var input = document.getElementById('town');

      // Create a new XMLHttpRequest.
      var request = new XMLHttpRequest();

      // Handle state changes for the request.
        request.onreadystatechange = function(response) {
        if (request.readyState === 4) {
          if (request.status === 200) {
              // Parse the JSON
          var jsonOptions = JSON.parse(request.responseText);
       // Loop over the JSON array.
       jsonOptions.forEach(function(item) {
       // Create a new <option> element.
       var option = document.createElement('option');
       // Set the value using the item in the JSON array.
                                    option.value = item;
                                    // Add the <option> element to the <datalist>.
                                    dataList.appendChild(option);
                                  });
                                  
                                  // Update the placeholder text.
                                  input.placeholder = "select region/town";
                                } else {
                                  // An error occured :(
                                  input.placeholder = "Couldn't load options :(";
                                }
                              }
                            };

                            // Update the placeholder text.
                            input.placeholder = "select region/town";

                            // ############################################################----next ajax for hospital speciality------#########

                            //ajax for city#quicksearch

                            var dataList = document.getElementById('languages');
                            var input = document.getElementById('ajax');

                            // Create a new XMLHttpRequest.
                            var request = new XMLHttpRequest();

                            // Handle state changes for the request.
                            request.onreadystatechange = function(response) {
                              if (request.readyState === 4) {
                                if (request.status === 200) {
                                  // Parse the JSON
                                  var jsonOptions = JSON.parse(request.responseText);
                              
                                  // Loop over the JSON array.
                                  jsonOptions.forEach(function(item) {
                                    // Create a new <option> element.
                                    var option = document.createElement('option');
                                    // Set the value using the item in the JSON array.
                                    option.value = item;
                                    // Add the <option> element to the <datalist>.
                                    dataList.appendChild(option);
                                  });
                                  
                                  // Update the placeholder text.
                                  input.placeholder = "Search by speciality";
                                } else {
                                  // An error occured :(
                                  input.placeholder = "Couldn't load options :(";
                                }
                              }
                            };

                            // Update the placeholder text.
                            input.placeholder = "Search by speciality";

                            // Set up and make the request.

                            // ############################################################----next ajax for hospital speciality------#########

                            //ajax for city#quicksearch

                            var dataList = document.getElementById('specs');
                            var input = document.getElementById('specs');

                            // Create a new XMLHttpRequest.
                            var request = new XMLHttpRequest();

                            // Handle state changes for the request.
                            request.onreadystatechange = function(response) {
                              if (request.readyState === 4) {
                                if (request.status === 200) {
                                  // Parse the JSON
                                  var jsonOptions = JSON.parse(request.responseText);
                              
                                  // Loop over the JSON array.
                                  jsonOptions.forEach(function(item) {
                                    // Create a new <option> element.
                                    var option = document.createElement('option');
                                    // Set the value using the item in the JSON array.
                                    option.value = item;
                                    // Add the <option> element to the <datalist>.
                                    dataList.appendChild(option);
                                  });
                                  
                                  // Update the placeholder text.
                                  input.placeholder = "Doctor speciality";
                                } else {
                                  // An error occured :(
                                  input.placeholder = "Couldn't load options :(";
                                }
                              }
                            };

                            // Update the placeholder text.
                            input.placeholder = "Doctor speciality";

                            // Set up and make the request.


                            </script>

                            <style>
                              input[list="languages"] {
                                  width: 12em;
                                  border: none;
                                  background: #eee;
                                }
                                select {
                                  width: 12em;
                                  margin: 0;
                                }

                            </style>




</body>

</html>
