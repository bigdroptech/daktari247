 <aside id="quickSearch" class="quickSearch">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 findHospital">
                    <div class="col-md-12 text-center"><h3><br>Find A Hospital</h3></div>
                    <form method="GET" action="search.php">
                        <div class="col-md-12 inputFindHospital">
                            <?php 
                                      $query= "select * from js_core.js_regions;";
                                        $result = pg_query($query);

                                echo ' <div class="col-md-4">'; 
                                    echo'<datalist id="towns">';
                                  while ($row = pg_fetch_assoc($result)) {
                                     
                                   echo '<option value="'.htmlspecialchars($row['jrg_name']).'">'.htmlspecialchars($row['jrg_name']).'</option>';
                                  }
                                echo' </datalist>'; 
                              ?>
                               <input type="text" id="town" class="form-control" style="width:100%;"  name="town" list="towns" placeholder="Search by region">
                                 <datalist id="towns"></datalist>
                            </div>
                        <?php 
                            $query= "select * from js_core.m_common_specialities;";
                            $result = pg_query($query);
                           echo '<div class="col-md-4">'; 
                                echo'<datalist id="languages">';
                                  while ($row = pg_fetch_assoc($result)) {
                                     
                                  echo '<option value="'.htmlspecialchars($row['spname']).'">'.htmlspecialchars($row['spname']).'</option>';
                                  }
                               echo' </datalist>'; 
                              ?>
                               <input type="text" id="ajax"  name="ajax" list="languages" style="width:100%; background:#fff;" class="form-control" placeholder="select speciality">
                                 <datalist id="languages"></datalist>
                           </div>
                       <div class="col-md-4"> <input name="commit2" value="Find a Hospital" class="btn btn-success btn-block btn-home" type="submit"></div>
                   </form>

                </div>
            </div>
        </div>
    </aside>

    <aside id="quickSearch" class="quickSearch">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Daktari 247</h3>
                    <ul class="footer_left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Daktari 247</a></li>
                    <li><a href="feeds.php">Feeds</a></li>
                    <li><a href="#">Frequently Asked Questions</a></li>
                    <li><a href="signup.php">Are you a doctor? List Your Practice!</a></li>
                    </ul>
                </div>

                <div class="col-md-8">
                    <h3>Popular Searches</h3>
                        <div class="col-md-4 frequent-searches">
                            <ul class="footer_left">
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="1" name="region" hidden>
                                        <button value="4" name="popular"> Dentist in Narobi</button>
                                    </form> 
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="1" name="region" hidden>
                                        <button value="17" name="popular"> Gynecologist in Nairobi </button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="1" name="region" hidden>
                                        <button value="16" name="popular"> General Practitioner in Nairobi </button>
                                    </form>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="1" name="region" hidden>
                                        <button value="37" name="popular"> Pediatrician in Nairobi </button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="1" name="region" hidden>
                                        <button value="5" name="popular"> Dermatologist in Nairobi </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 frequent-searches">
                            <ul class="footer_left">
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="2" name="region" hidden>
                                        <button value="4" name="popular"> Dentist in Mombasa</button>
                                    </form> 
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="2" name="region" hidden>
                                        <button value="17" name="popular"> Gynecologist in Mombasa</button>
                                    </form> 
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="2" name="region" hidden>
                                        <button value="16" name="popular"> General Practitioner in Mombasa</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="2" name="region" hidden>
                                        <button value="37" name="popular"> Pediatrician in Mombasa</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="2" name="region" hidden>
                                        <button value="5" name="popular"> Dermatologist in Mombasa</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 frequent-searches">                    
                            <ul class="footer_left">
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="3" name="region" hidden>
                                        <button value="4" name="popular"> Dentist in Kisumu</button>
                                    </form> 
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="3" name="region" hidden>
                                        <button value="17" name="popular"> Gynecologist in Kisumu</button>
                                    </form> 
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="3" name="region" hidden>
                                        <button value="16" name="popular"> General Practitioner in Kisumu</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="3" name="region" hidden>
                                        <button value="37" name="popular"> Pediatrician in Kisumu</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="GET" action="popular.php">
                                        <input value="3" name="region" hidden>
                                        <button value="5" name="popular"> Dermatologist in Kisumu</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                </div>

                
            </div>
        </div>
    </aside>

     <aside id="forHelp" class="forHelp">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 findHospital">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="fa fa-phone contacticon"></span>
                            Need help ?
                        </div>
                        <div class="col-md-4">
                            <a href="tel:+212608085656">+254 725 368 549</a>
                        </div>
                        <div class="col-md-4">
                            <a href="mailto:contact@dabadoc.com">doc@daktari247.co.ke</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
