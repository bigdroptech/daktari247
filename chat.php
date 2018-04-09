<?php
 error_reporting(E_ERROR);
 session_start();
 if (!(isset($_SESSION['username'])))  {
  header("location: index.php");
 }
 else{
    

    include "script.php";
    include "functions.php";
    include "inc/main-header.php";



echo'<section id="error">
        <div class="container">
          
          <div class="col-md-12">
            <h2 class="section-heading text-center">Our App</h2>
          </div>

          

          <h4 class="text-center">To get better experience download our Mobile on the <a href="#">playstore</a></h4>
          <div class="col-md-12 appImg text-center">
            <img src="img/app.png" alt="">
          </div>
            <div class="col-md-6 col-md-offset-3 text-center">
            </div>
        </div>
    </section>';


    include "inc/search-footer.php";
    include "inc/footer.php";

  } 
  ?>

