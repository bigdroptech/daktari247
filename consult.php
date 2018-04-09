<?php
    include "functions.php";
    include "inc/search-header.php";
    include  'inc/allsearch.php';


             ?>     
  <!-- Header -->

    <div class="searchPage ConsultSearch">
        <div class="container">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

               <?php 
                    include  'script.php';

                    if (isset($_GET['consult'])){
                           
                            $dr_id = $_GET['dr_id'];

                    

                    

                    $query="SELECT dr_id, dr_image_url, dr_qualification, dr_c_consult_price, dr_spid, dr_o_consult_price,
                    js_his.getpersname(dr_id) as dr_name, spname as dr_specialization
                    FROM js_core.m_doctors,js_core.m_common_specialities 
                    where dr_id ='$dr_id'
                    and spid=dr_spid

                    ";

                    $result = pg_query($query);

                        while ($row = pg_fetch_assoc($result)) {

                           $doc_name = $row['dr_name'];

                            $doc_speciality = $row['dr_specialization'];
                            $dr_qualification = $row['dr_qualification'];

                            echo '<div class="row consultDocHeader">'; // 1
                             echo    '<div class="col-lg-12 c-result">';//2
                                          
                                          echo '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 doc">';//3
                                             echo '<img src="'.$row['dr_image_url'].'" alt=""/>';
                                          echo "</div>";// end 3
                                           

                                           //Start left

                                          echo  '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 doc-info">';
                                          echo ' <div class="DocContent">'.$doc_name.'</div>';
                                          echo  '<div class="DocContent">'.$doc_speciality.'</div>';
                                          echo '<div class="DocContent">'.$dr_qualification.'</div>';
                                          echo   '<div class="DocContent"></div>';
                                          echo   '<div class="DocContent"></div>';

                                          echo '</div>';   //end left


                                          //Start right

                                        echo  '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';

                                          echo '<p><span class="glyphicon glyphicon-heart"></span> <span class="Pcount">';
                                          echo $row['dr_spid'];
                                          echo '</span> People Reached</p>';

                                          /*echo '<p><span class="glyphicon glyphicon-briefcase"></span> <span class="Pcount">';
                                              echo $row['dr_id'];
                                          echo '</span> Years Experience</p>';*/

                                          echo '<p><span class="glyphicon glyphicon-credit-card"</span> Consulting Fee <span class="Pcount">';
                                              echo $row['dr_c_consult_price'];
                                              $price = $row['dr_c_consult_price'];
                                          echo '</span> Ksh</p>';

                                        echo  '</div>';

                                          //end Right
                              
  echo "</div>"; //end of 2 

          // Consult section
                                        echo ' <div class="col-lg-12 c-result">';
                            echo '<div class="cRheader">';
                                echo 'CHOOSE METHOD OF CONSULTATION';
                           echo ' </div>';
                           echo ' <div class="onlineChat">';
                               echo ' <div class="col-lg-1 phoneConsult"> <span class="glyphicon glyphicon-comment">  </span> </div>';
                               echo ' <div class="col-lg-6 conTag">';
                                   echo ' <div class="col-lg-12"> <h4>Call/Chat Consultation</h4> </div>';
                                   echo ' <div class="col-lg-12"> <h6>30 minutes duration • 24 hours text chat </h6></div>';
                               echo ' </div>';
                               echo ' <div class="col-lg-2 creditTag"> <span class="glyphicon glyphicon-credit-card"> </span> <span class="Pcount">'.$row['dr_o_consult_price'].'</span> Ksh</div>';
                                  if (!(isset( $_SESSION['username']))) {
                                  echo ' <div class="col-lg-3 CBtn"> 
                                  <a href="#signIn" class="consult-online" data-toggle="modal" role="button"> Consult Online </a> </div>';
                                  echo '</div>';
                                  }else{
                                    echo '<div class="col-lg-3 CBtn">
                                    
                                    <a href="#consult-online" class="consult-online" data-toggle="modal" role="button" id="call_chat"> Consult Online </a> </div>';
                                    
                                  echo '</div>';
                                  }
                           echo '<div class="onlineChat">';
                               echo ' <div class="col-lg-1 phoneConsult"> <span class="glyphicon glyphicon-earphone">  </span> </div>';
                               echo ' <div class="col-lg-6 conTag">';
                                    echo '<div class="col-lg-12"> <h4>Book an appointment</h4> </div>';
                                    echo '<div class="col-lg-12"> <h6>Week Days • Working Hours </h6></div>';
                                echo '</div>';
                                echo '<div class="col-lg-2 creditTag"> <span class="glyphicon glyphicon-credit-card"> </span> <span class="Pcount">'.$row['dr_c_consult_price'].'</span> Ksh</div>';
                
                                 if (!(isset( $_SESSION['username'])))  {
                                echo '<div class="col-lg-3 CBtn"> <a href="#signIn" class="consult-online" data-toggle="modal" role="button" > Book Appointment </a> </div>';
                                echo '</div>';
                                }else{
                                  echo '<div class="col-lg-3 CBtn"> <a href="#consult-online" id="app_consult" class="consult-online" data-toggle="modal" role="button" > Book Appointment </a> </div>';
                                  echo '</div>';
                                }
                      echo '</div>';

                        // end of call section


echo '<div class="col-lg-12 c-result">
                            <div class="cRheader">
                                OUR ASSUARANCE
                            </div>

                            <div class="col-lg-12 assuarance">
                                <div class="col-lg-4"> 
                                    <div class="col-lg-12"> <span class="glyphicon glyphicon-user"></span> </div>
                                    <div class="col-lg-12"> Verified Doctors </div>
                                    <div class="col-lg-12"> <p>All Doctors go through a stringent verification process on Daktari247</p> </div>
                                </div>
                                <div class="col-lg-4"> 
                                    <div class="col-lg-12"> <span class="glyphicon glyphicon-lock"></span> </diV>
                                    <div class="col-lg-12"> 100% Privacy Protection </diV>
                                    <div class="col-lg-12"> <p>Your consultation details and personal data will remain confidential</p>  </diV>
                                </div>
                                <div class="col-lg-4"> 
                                    <div class="col-lg-12"> <span class="glyphicon glyphicon-ok-sign"></span> </diV>
                                    <div class="col-lg-12"> Satisfaction Guaranteed </diV>
                                    <div class="col-lg-12"> <p>If you are not satisfied with your experience, we will refund your money</p> </diV> 
                                </div>
                            </div>
                        
            </div>';

                             
                            echo "</div>"; //end of 1
                        }
                    }
               ?>

               
            </div>

            <div class="col-lg-4 col-md-4 col-sm-hidden col-xs-hidden">
                 <div class="right Cright">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <img src="img/search/Banner.png" alt=""/> </div>
                </div>
            </div>

        </div>
    </div>



<?php
    include "inc/search-footer.php";
    include "inc/footer.php";
?>

      <!-- Sign in Modal -->

      <div class="modal fade" id="consult-online" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">The Process</h4>
            </div>
            <div class="modal-body">
              <p>1: Sign in first to get account number</p>
              <p>2: Make consultation <b>
                <?php
                    include  'script.php';

                    $dr_id = $_GET['dr_id'];

                    $query="SELECT dr_id, dr_code, dr_firstname, dr_middlename, dr_lastname, dr_mobile,
                         dr_acc_bal, dr_regno, dr_speciality, dr_qualification, dr_created_on,
                         dr_updated_on, dr_status, dr_pay_mobile, dr_image_url, dr_spid,dr_o_consult_price,dr_c_consult_price
                    FROM js_core.m_doctors
                    where dr_id ='$dr_id'";

                    $result = pg_query($query);

                        while ($row = pg_fetch_assoc($result)) {

                          echo $row['dr_o_consult_price'];
                   }
                ?>
                Ksh/=
              </b> to payment to paybill <b>718231</b></p>
              <p>3: Acc Number <b>
                <?php
                    include  'script.php';

                     $dr_id = $_GET['dr_id'];
                     $usr_id = $_SESSION['usr_id'];

                     $cmode='call';
                   //  $_SESSION['usr_id']=$usrid;

                    $sql = "SELECT js_his.insert_consult (CAST($1 AS NUMERIC),cast($2 as CHARACTER VARYING),cast($3 as numeric),cast($4 as bigint),cast($5 as numeric)) ";

                        $res = pg_prepare($db, "my_query", $sql);
                        $res = pg_execute($db, "my_query", array(null, 
                        $cmode,$usr_id,$dr_id,$price));

                       $row = pg_fetch_result($res,0,0);

                          echo $row;
                ?>
              </b></p>
              <p>4: Receive a confirmation sms to moblie phone</p>
              <p>5: Expect a call from the Doctor or download our app from the <a href="#">playstore</a></p>    
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href ='chat.php';">Close</button>
            </div>
          </div>
        </div>
      </div>