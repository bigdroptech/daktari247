<?php
    include "script.php";
    include "functions.php";
    include "inc/main-header.php";
    ?>

    <!-- Header -->

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/lady.jpg');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/stethescope.jpg');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/header-bg1.jpg');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-pre"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-nex"></span>
        </a>
            <div class="search-div">
                <h1>Find a doctor and book an appointment <br/>with a single click !</h1>
                <div class="row">
                    <form class="indexSearch" action="search.php" method="GET">
                        <div class="col-md-12">
                        <?php 
                            $query= "select * from js_core.m_common_specialities;";     
                            $result = pg_query($query);
                           echo ' <div class="input-aligns col-md-4">'; 
                               echo'<datalist id="specs">';
                                  while ($row = pg_fetch_assoc($result)) {
                                  echo '<option name="'.htmlspecialchars($row['spid']).'" >'.htmlspecialchars($row['spname']).'</option>';
                                  }
                               echo' </datalist>';  
                            echo'<input type="text" id="specs" for="forMore" class="form-control" name="specs" list="specs" placeholder="Doctor speciality">';
                            echo' </div>';
                        ?>

                        <?php 
                        $query= "select * from js_core.js_regions;";
                        $result = pg_query($query);
                           echo ' <div class="input-aligns col-md-4">'; 
                                echo'<datalist id="town">';
                                  while ($row = pg_fetch_assoc($result)) {
                                  echo '<option value="'.htmlspecialchars($row['jrg_name']).'">'.htmlspecialchars($row['jrg_name']).'</option>';
                                  }
                               echo' </datalist>'; 
                              echo'<input type="text" id="town" class="form-control" name="town" list="towns" placeholder="Region">';
                           echo' </div>';
                        ?>
                            
                            <div class="input-aligns input-col col-md-4"> 
                                <input name="commit" value="Find a Doctor" class="btn btn-success btn-block btn-home" type="submit">
                            </div>
                       </div>
                    </form>
                </div>
                <div class="callToAction text-center row"> <span>or</span> </br>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-12">
                            <div class="col-md-6 col-sm-6 col-xs-12 freeQsFind"><a class="page-scroll" href="#quickSearch">Find a Hospital</a></div>
                            <div class="col-md-6 col-sm-6 col-xs-12 freeQs"> <a data-toggle="modal" data-target="#freequestion">Ask a Free Question</a></div>
                        </div>
                    </div>
                </div>
            </div>

    </header>

    <section class="MainHow">
        <div class="container">
            <div class="row forMainHow">
                <div class="col-md-6 col-md-offset-3"> <h2 class="section-heading text-center"> How it works</h2></div>
            </div>
            <div class="row forMainHowRow">
                <div class="col-md-12 col-sm-12 theProcess">
                        <h3 class="text-center"> The Process</h3><br/>
                        <div class="col-md-3 col-sm-3 text-center">
                            <div class="col-md-12"> <img src="img/getapp.png" alt="Get App"> </div>
                            <div class="col-md-12 processNames">Get App</div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center">
                            <div class="col-md-12"> <img src="img/finddoc.png" alt="Find Doctor"> </div>
                            <div class="col-md-12 processNames">Find Doctor</div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center">
                            <div class="col-md-12"> <img src="img/makepay.png" alt="Pay Consultation Fee"> </div>
                            <div class="col-md-12 processNames">Pay Consultation Fee</div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center">
                            <div class="col-md-12"> <img src="img/consultdoc.png" alt="Get Consultation"> </div>
                            <div class="col-md-12 processNames">Get Consultation</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- common specialities Section -->
    <section id="specialities" class="bg-light-gray">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-center"> Common Specialities</h2>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/skin.png" class="image-responsive" /></div>
                    <div class="top-text"><h5> 
                        <form method="GET" action="common.php">
                            <button value="5" name="speciality"> Dermatologist</button>
                        </form> 
                        </h5> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/three.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5> 
                        <form method="GET" action="common.php">
                            <button value="4" name="speciality"> Dentist</button>
                        </form>  
                    </h5> </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="help-images"><img src="img/sexologist.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5> 
                        <form method="GET" action="common.php">
                            <button value="17" name="speciality"> Sexologist</button>
                        </form>   
                        </h5> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="help-images"><img src="img/spinal.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5> 
                        <form method="GET" action="common.php">
                            <button value="32" name="speciality"> Orthopedist</button>
                        </form> 
                    </h5> </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/five.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5> 
                        <form method="GET" action="common.php">
                            <button value="17" name="speciality"> Gynaecologist </button>
                        </form>
                    </h5> </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/screen3.png" class="image-responsive" /></div>
                    <div class="top-text"><h5>
                        <form method="GET" action="common.php">
                            <button value="37" name="speciality"> Paediatrician </button>
                        </form> 
                    </h5> </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/heart.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5>
                        <form method="GET" action="common.php">
                            <button value="2" name="speciality"> Cardiologist </button>
                        </form>  
                    </h5> </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="help-images"><img src="img/four.jpg" class="image-responsive" /></div>
                    <div class="top-text"><h5>
                        <form method="GET" action="common.php">
                            <button value="41" name="speciality"> Psychiatrist </button>
                        </form>  
                    </h5> </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4 class="section-heading text-center forMore"> <a class="page-scroll" href="#myCarousel"><label id="forMore"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> View More <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </label></a></h4>
                    </div>
            </div>
        </div>
    </section>

        <!-- common issues Section -->
    <section id="issues" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"> Common Issues</h2>
                </div>
            </div>
            
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="help-images">
                                <img src="img/skin.png" class="image-responsive" />
                            </div>
                            <div class="top-text"><h5>
                                <form method="GET" action="common.php">
                                    <button value="5" name="issues"> Acne/Pimples</button>
                                </form>
                            </h5> </div>  
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="help-images"><img src="img/hair.png" class="image-responsive" /></div>
                        <div class="top-text"><h5> 
                            <form method="GET" action="common.php">
                                    <button value="5" name="issues"> Hair Fall</button>
                            </form>
                        </h5> </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="help-images"><img src="img/cough.jpg" class="image-responsive" /></div>
                        <div class="top-text"><h5>
                            <form method="GET" action="common.php">
                                <button value="10" name="issues"> Cold Cough</button>
                            </form>
                        </h5> </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="help-images"><img src="img/one.jpg" class="image-responsive" /></div>
                        <div class="top-text"><h5> 
                            <form method="GET" action="common.php">
                                <button value="37" name="issues"> Childcare</button>
                            </form>
                        </h5> </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="help-images"><img src="img/depression.jpg" class="image-responsive" /></div>
                        <div class="top-text"><h5> 
                            <form method="GET" action="common.php">
                                <button value="41" name="issues"> Depression </button>
                            </form>
                        </h5> </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="help-images"><img src="img/two.jpg" class="image-responsive" /></div>
                        <div class="top-text"><h5>
                            <form method="GET" action="common.php">
                                <button value="6" name="issues"> Diabetes </button>
                            </form>
                        </h5> </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="help-images"><img src="img/periods.png" class="image-responsive" /></div>
                        <div class="top-text"><h5> 
                            <form method="GET" action="common.php">
                                <button value="17" name="issues"> Irregular Periods </button>
                            </form> 
                        </h5> </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="help-images"><img src="img/acidity.png" class="image-responsive" /></div>
                        <div class="top-text"><h5> 
                            <form method="GET" action="common.php">
                                <button value="10" name="issues"> Acidity </button>
                            </form> 
                        </h5> </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4 class="section-heading text-center forMore"> <a class="page-scroll" href="#myCarousel"><label id="forMore"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> View More <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </label></a></h4>
                    </div>
            </div>
                </div>
        </div>
    </section>


  <!-- How it works -->
    <section id="how" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"> Why Daktari247</h2>
                    <h4>Daktari247 helps you to live healthy. Now, you can consult medical 
                        experts via mobile phone, text or online platform.</h4>
                </div>
            </div>
 

            <div class="row HowBigArea">
                <div class="col-lg-12 text-center">

                    <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                        <div class="col-md-12 forPatient">
                            <div class="col-md-12 text-center"> <div class="pImage"><img src="img/patient.png"></div></div>
                            <div class="col-md-12 text-center"><h3><br>Daktari247 For All of us<br></h3></div>
                        </div>
                        <div class="col-md-12 forPatient">
                            <b>Talk to Doctor:</b>You can ask queries for free or get into one-one-one interaction with doctors on payment of fees online. Using your mobile phone, you can anonymously communicate with doctors from various specialties.
                            <br/><b>Stay healthy and fit:</b>The Heath Feed from healthcare experts aims to keep you healthy and fit. If that is not all, you can find a doctor nearby, check doctor's profile and book an appointment too.
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                        <div class="col-md-12 forDoctor">
                            <div class="col-md-12 text-center"> <div class="pImage pImageAlign"><img src="img/doctor.png"></div> </div>
                            <div class="col-md-12 text-center"><h3><br>Doctors<br></h3></div>
                        </div>
                        <div class="col-md-12 forDoctor">
                            Through Daktari medical experts grows their outreach to their clients across the country and its environs. This 
                            is made easier by the application interaction between medics and patients. They will not only give consultation to 
                            their clients but also guidance on the maternal care to the women with children under the age of 5.
                        </div>
                    </div>

                </div>
          

            </div>
        </div>
    </section>


   

<?php
    include "inc/search-footer.php";
    include "inc/footer.php";
?>

                        
