<?php
    include "functions.php";
    include "inc/search-header.php";
    include  'inc/allsearch.php';


    if(isset($_GET['issues'])){

        $id = $_GET['issues'];
    } 

    else if(isset($_GET['speciality'])){

        $id = $_GET['speciality'];
    }


?>

    <div class="searchPage">
        <div class="container">
            <div class="s-results col-lg-8 col-md-8 col-sm-12 col-xs-12">

                <?php 
                    include  'script.php';

                    $query="SELECT dr_id, dr_code, dr_firstname, dr_middlename, dr_lastname, dr_mobile,
                        dr_acc_bal, dr_regno, dr_speciality, dr_qualification, dr_created_on,
                        dr_updated_on, dr_status, dr_pay_mobile, dr_image_url, dr_spid,
                        dr_o_consult_price, dr_c_consult_price
                    FROM js_core.m_doctors where dr_spid='$id'";



     
                    $result = pg_query($query);


                    while ($row = pg_fetch_assoc($result)) {
                           echo '<div class="result">'; 
                                echo '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 doc">'; //image div

                               
                                if (empty($row['dr_image_url'])){
                                 echo '<img src="img/team/photo_avatar.png" />';
                                } else {
                                     echo '<img src="'.$row['dr_image_url'].'">';
                                }

                                echo "</div>"; //image div

                                echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 doc-info">';
                                    echo '<div class="DocContent">';  
                                        echo $row['dr_firstname'] . "  " . $row['dr_lastname'];
                                    echo '</div>';

                                    echo '<div class="DocContent">';
                                        echo $row['dr_qualification'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row['dr_speciality'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row['dr_status'];
                                    echo '</div>';

                                    echo '<div class="DocContent">'; 
                                        echo $row['dr_updated_on'];
                                    echo '</div>';
                                echo "</div>"; //doctor info div

                                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                                    echo '<p><span class="glyphicon glyphicon-heart"></span> <span class="Pcount">';
                                        echo $row['dr_spid'];
                                    echo '</span> People Reached</p>';

                                    echo '<p><span class="glyphicon glyphicon-briefcase"></span> <span class="Pcount">';
                                        echo $row['dr_id'];
                                    echo '</span> Years Experience</p>';

                                    echo '<p><span class="glyphicon glyphicon-credit-card"</span> Consulting Fee <span class="Pcount">';
                                        echo $row['dr_c_consult_price'];
                                    echo '</span> Ksh</p>';

                                    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-comment">'; echo "</span></div>";
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-earphone">'; echo "</span></div>";
                                        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="glyphicon glyphicon-facetime-video">'; echo "</span></div>";
                                    echo '</div>';

                                    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                                        echo '<form action="consult.php" method="GET">'; //form
                                        //echo '<div class="consultBtn"><a href="consult.php" class="consult-online"> CONSULT ONLINE </a>';

                                        echo '<input type="hidden" value='.$row['dr_id'].' name="dr_id" class="form-control" id="email" >';

                                      echo '<div class="consultBtn"><input type="submit" name="consult" value="CONSULT ONLINE" style="float:right" class="consult-online" />';

                                        echo "</form>"; //end form
                                    echo '</div>'; //working




                                echo "</div>";//contact icons div

                                echo "</div>"; //doctor services count


                                
                            echo "</div>";//result div

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
    include "inc/search-footer.php";
    include "inc/footer.php";
?>
