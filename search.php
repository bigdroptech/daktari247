<?php
    include "functions.php";
    include "inc/search-header.php";


    if(isset($_GET['issues'])){

        $id = $_GET['issues'];
    } 

    else if(isset($_GET['commit'])){

        $id = $_GET['specs'];
        $id2= $_GET['town'];
  ?>
    <div class="searchPage">
        <div class="container">
            <?php
            include  'inc/allsearch.php';
            ?>
            <div class="s-results col-lg-8 col-md-8 col-sm-12 col-xs-12">

                <?php 
//first we connect to servers at javasoft======
                    include  'script.php';
//+++++++++++++++++++++++++++++collect the search id from specialities and laugh abit!!+++++++++++++++++++
                    $query1="select spid from js_core.m_common_specialities  where trim(js_core.m_common_specialities.spname)= trim('$id')";
                    $result1 = pg_query($query1);
                    if (!$result1) {
                    echo "Problem occured ";
                    echo pg_last_error();
                    exit();
                    }
                    $row1 = pg_fetch_assoc($result1); 
                    $spid=$row1['spid'];
//++++++++++++++++++++++++++collect the region Id from regions and dance abit...++++++++++++++++++++++++++++++++++++++++++                  
                    $query2="select jrg_id from js_core.js_regions  where trim(js_regions.jrg_name) =trim('$id2')";
                    $result2 = pg_query($query2);
                    if (!$result2) {
                    echo "Problem occured ";
                    echo pg_last_error();
                    exit();
                    }
                    $row2 = pg_fetch_assoc($result2); 
                    $rid=$row2['jrg_id'];
//++++++++++++++++++++++ WE NOW CREATE OUR 'GOOGLE SEARCH' FOR A HEAVY SEARCH ON OUR DB+++++++++++++++++TRUST ME IS HEAVY!!!

                  if  (empty($rid)){
                   $rid=1;
                  }
                  if  (empty($spid)){
                    $spid='spid';
                  }
                    $query3="SELECT
                    *
                    FROM
                    
                      js_core.m_doctors,
                      js_core.m_common_specialities,
                      js_core.js_regions
                    WHERE
                    
                      m_doctors.dr_spid = m_common_specialities.spid AND
                      js_regions.jrg_id = dr_rg_id AND
                      jrg_id=$rid AND spid=$spid";
                    $result3 = pg_query($query3);
                    if (!$result3) {
                    echo "Problem with query " . $query3 . "<br/>";
                    echo pg_last_error();
                    exit();
                    }
                    while ($row3 = pg_fetch_assoc($result3)) {
                          if (!$row3) {
                          echo "No records found for this search";
                           exit;
                             }else{
                          echo '<div class="result">'; 
                                echo '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 doc">'; //image div

                               
                                if (empty($row3['dr_image_url'])){
                                 echo '<img src="img/team/photo_avatar.png" />';
                                } else {
                                     echo '<img src="'.$row3['dr_image_url'].'">';
                                }

                                echo "</div>"; //image div

                                echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 doc-info">';
                                    echo '<div class="DocContent">';  
                                        echo $row3['dr_firstname'] . "  " . $row3['dr_lastname'];
                                    echo '</div>';

                                    echo '<div class="DocContent">';
                                        echo "<b>Qualification: </b>"; echo $row3['dr_qualification'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo "<b>Speciality: </b>"; echo $row3['spname'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row3['dr_updated_on'];
                                    echo '</div>';
                                echo "</div>"; //doctor info div

                                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                                    echo '<p><span class="glyphicon glyphicon-heart"></span> <span class="Pcount">';
                                        echo $row3['dr_spid'];
                                    echo '</span> People Reached</p>';

                                    /*echo '<p><span class="glyphicon glyphicon-briefcase"></span> <span class="Pcount">';
                                        echo $row3['dr_id'];
                                    echo '</span> Years Experience</p>';*/

                                    echo '<p><span class="glyphicon glyphicon-credit-card"</span> Consulting Fee <span class="Pcount">';
                                        echo $row3['dr_c_consult_price'];
                                    echo '</span> Ksh</p>';

                                    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-comment">'; echo "</span></div>";
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-earphone">'; echo "</span></div>";
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-facetime-video">'; echo "</span></div>";
                                    echo '</div>';

                                    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';

                                      echo '<form action="consult.php" method="GET">'; //form
                                        //echo '<div class="consultBtn"><a href="consult.php" class="consult-online"> CONSULT ONLINE </a>';

                                        echo '<input type="hidden" value='.$row3['dr_id'].' name="dr_id" class="form-control" id="email" >';

                                      echo '<div class="consultBtn"><input type="submit" name="consult" value="Consult Online" style="float:left" class="consult-online" />';

                                        echo "</form>"; //end form


                                        echo '</div'; //working
                                    echo '</div>'; //working

                                    echo '</div>'; //working



                                echo "</div>";//contact icons div

                                echo "</div>"; //doctor services count


                                
                            echo "</div>";//result div
                            }

                    }  

                ?>

            </div>
            <div class="s-results col-lg-4 col-md-4 col-sm-4 hidden-xs">
                <div class="right">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <img src="img/search/Banner.png"> </div>
                </div>
            </div>
        </div>
</div>

<?php
  }
else if(isset($_GET['commit2'])){

        $id = $_GET['town'];
        $id2= $_GET['ajax'];
        if(empty($_GET['town']) ){
          echo '<script language="javascript">';
  echo 'alert(System cannot perform search since no fields were entered)';  //not showing an alert box.
  echo '</script>';
        // echo'<script type="text/javascript">location.href="index.php"</script>';
            
        }
        else{
  ?>
    <div class="searchPage">
        <div class="container">
             <?php
            include  'inc/allsearch.php';
            ?>
            <div class="s-results col-lg-8 col-md-8 col-sm-12 col-xs-12">

                <?php 
//first we connect to servers at javasoft======
                    include  'script.php';
//+++++++++++++++++++++++++++++collect the search id from specialities and laugh abit!!+++++++++++++++++++
                    $spid='';
                    if($id2===''|| is_null($id2)  ){
                    }else{
                    $query1="select spid from js_core.m_common_specialities  where js_core.m_common_specialities.spname= '$id2'";
                    $result1 = pg_query($query1);
                    if (!$result1) {
                    echo "Problem with query " . $query1 . "<br/>";
                    echo pg_last_error();
                    exit();
                    }
                  
                    $row1 = pg_fetch_assoc($result1); 
                    $spid=htmlspecialchars($row1['spid']);
                     }
//++++++++++++++++++++++++++collect the region Id from regions and dance abit...++++++++++++++++++++++++++++++++++++++++++                  
                    $query2="select jrg_id from js_core.js_regions  where js_core.js_regions.jrg_name= '$id'";
                    $result2 = pg_query($query2);
                    if (!$result2) {
                    echo "Problem with query " . $query2 . "<br/>";
                    echo pg_last_error();
                    exit();
                    }
                    $row2 = pg_fetch_assoc($result2); 
                    $rid=htmlspecialchars($row2['jrg_id']);
//++++++++++++++++++++++ WE NOW CREATE OUR 'GOOGLE SEARCH' FOR A HEAVY SEARCH ON OUR DB+++++++++++++++++TRUST ME IS HEAVY!!!
 $query3='';
                    if  ($spid==  ''|| is_null($spid)){
$query3="SELECT * FROM

  js_core.m_hospitals,
  js_core.js_regions
  
WHERE
  
  m_hospitals.hosp_rg_id = js_regions.jrg_id AND
  jrg_id= $rid 
  ";
}
                    else {
                    $query3="SELECT * FROM
  js_core.m_hospital_speciality,
  js_core.m_hospitals,
  js_core.js_regions,
  js_core.m_common_specialities
WHERE
  m_hospital_speciality.hsp_id = m_hospitals.hosp_id AND
  m_hospital_speciality.hsp_sp_id = m_common_specialities.spid AND
  m_hospitals.hosp_rg_id = js_regions.jrg_id AND
  jrg_id= $rid AND
  spid= $spid ";
}
                    $result3 = pg_query($query3) or die(pg_last_error());
                    if (!$result3) {
                    echo "Problem with query " . $query3 . "<br/>";
                    echo pg_last_error();
                    exit();
                    }
                    while ($row3 = pg_fetch_assoc($result3)) {
                          if (!$row3) {
                          echo "No records found for this search";
                           exit;
                             }else{
                          echo '<div class="result">'; 
                                echo '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 doc">'; //image div

                               
                                if (empty($row3['dr_image_url'])){
                                 echo '<img src="img/team/photo_avatar.png" />';
                                } else {
                                     echo '<img src="'.$row3['dr_image_url'].'">';
                                }

                                echo "</div>"; //image div

                                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 doc-info">';
                                    echo '<div class="DocContent">';  
                                        echo $row3['hosp_name'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row3['hosp_type'];
                                    echo '</div>';

                                    echo '<div class="DocContent">';
                                        echo $row3['hosp_mobile_no'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row3['hosp_closing_hour'];
                                    echo '</div>';

                                    
                                echo "</div>"; //doctor info div

                                echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
                                    echo '<p><span class="glyphicon glyphicon-stats"></span> <span class="Pcount"> Bed Capacity: ';
                                        echo $row3['hosp_no_of_beds'];
                                    echo '</span></p>';

                                    echo '<p><span class="glyphicon glyphicon-star"></span> <span class="Pcount">';
                                        echo $row3['hosp_level'];
                                    echo '</span> Hospital</p>';

                                    echo '<p><span class="glyphicon glyphicon-time"</span><span class="Pcount"> ';
                                        echo $row3['hosp_days_not_available'];
                                    echo '</span>Days Closed </p>';

                                    

                                    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';

                                        echo '<div class="col-md-6">';
                                            $hospid =  $row3['hosp_id'];
                                            $hospemail =  $row3['hosp_email'];
                                            echo '<a href="#sendMessage" class="consult-online" data-toggle="modal" data-target="#sendMessage" role="button" data-id="'.$hospid.''.$hospemail.'"> Send Message </a>'; 
                                        echo '</div>';

                                        echo '<div class="col-md-6">';
                                            $lat =  $row3['hosp_latitude'];
                                            $long =  $row3['hosp_longitude'];
                                            echo '<a href="http://www.google.com/maps/place/'.$lat.','.$long.'" class="consult-online" target="_blank"> Get Location </a>';
                                         echo '</div>';

                                    echo '<div>';



                                        echo '</div'; //working
                                    echo '</div>'; //working

                                    echo '</div>'; //working



                                echo "</div>";//contact icons div

                                echo "</div>"; //doctor services count


                                
                            echo "</div>";//result div
                            }
                    }             
                         
        
                ?>

            </div>
            <div class="s-results col-lg-4 col-md-4 col-sm-4 hidden-xs">
                <div class="right">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <img src="img/search/Banner.png"> </div>
                </div>
            </div>
        </div>
</div>
<?php
        }
  
  }
    else{
        header('location:index.php'); //wont go to search
    }


?>


<?php
    include "inc/search-footer.php";
    include "inc/footer.php";
?>

<style>
    .consult-online:hover {
        float: left !important;}
</style>

<script type="text/javascript">
  $(document).ready(function(){
   $(".announce").click(function(){ // Click to only happen on announce links
     $("#mydata").val($(this).data('id'));
     $('#createFormId').modal('show');
   });
});
  
</script>


<!-- Free Question Modal -->
      <div class="modal fade" id="sendMessage" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Send Message</h4>
            </div>
            <div class="modal-body">
              <p><i><span style="color:#0271be;" class="glyphicon glyphicon-lock"></span> Note: The information you enter here is private and won't be shared</i></p>
                    <form action="config/send_msg.php" method="post" class="form-horizontal">

                        <input type="text" name="mydata" id="mydata" value="id" />
                        
                        <div class="form-group">
                          <label for="msgname" class="form-control-label"> Name: </label>
                          <input type="text" id="msgname" class="form-control" name="msgname" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="msgphone" class="form-control-label"> Phone No: </label>
                          <input type="phone" id="msgphone" class="form-control" name="msgphone" /> 
                        </div>
                        <div class="form-group"> 
                          <label for="msgmail" class="form-control-label"> Email address: </label>
                          <input type="email" id="msgmail" class="form-control" name="msgmail" /> 
                        </div>
                        <div class="form-group">
                           <label for="msg" class="form-control-label"> Message </label>
                          <textarea class="form-control" rows="3" id="msg" name="msg"></textarea>
                        </div>

                        <div class="form-group"> <input type="submit" name="msgsubmit" value="Submit Message" style="text-align:center !important;" class="submit accountsForm btn btn-default"/> </div>
                    </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      