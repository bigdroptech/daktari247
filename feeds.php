<?php
    include "functions.php";
    include "inc/search-header.php";
?>

    <!-- Header -->

    <div class="searchPage">
        <div class="container">
            <?php
            include  'inc/allsearch.php';
            ?>
            <div class="s-results col-lg-8 col-md-8 col-sm-12 col-xs-12">

            



                <?php

                    include  'script.php';

                    $query="SELECT id, fd_dr_id, name, image, status, dr_image_url as profile_pic, time_stamp, url, usr_id, 
                    js_his.getpersname(fd_dr_id) as dr_name, spname as dr_specialization, dr_count_like 
                    FROM js_core.m_feeds,js_core.m_doctors,js_core.m_common_specialities where dr_id=fd_dr_id 
                    and spid=dr_spid";



     
                    $result = pg_query($query);

                        while ($row = pg_fetch_assoc($result)) {
                                    echo '<div class="feedResults col-md-12 col-lg-12 col-sm-12 col-xs-12">';
                                        echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 paddingFeeds">';

                                            //beggining of first div *sharing tagging and reporting and date/timestamp
                                            echo '<div class="row">';
                                                echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 paddingFeeds">';
                                                    echo '<div class="col-md-4 col-lg-4 col-sm-8">';
                                                        echo '<div class="col-md-4 col-lg-4 col-sm-sm col-xs-2 paddingFeeds">';
                                                            echo '<span class="paddingFeeds glyphicon glyphicon-share-alt" title="Share" aria-hidden="true">'; echo '</span>';
                                                        echo "</div>";
                                                        echo '<div class="col-md-4 col-lg-4 col-sm-sm col-xs-2 paddingFeeds">';
                                                            echo '<span class="glyphicon paddingFeeds glyphicon-tag" title="Bookmark" aria-hidden="true">'; echo "</span>";
                                                        echo "</div>"; 
                                                        echo '<div class="col-md-4 col-lg-4 col-sm-sm col-xs-2 paddingFeeds">';
                                                            echo '<span class="glyphicon paddingFeeds glyphicon-flag" title="Report" aria-hidden="true">'; echo "</span>";
                                                        echo "</div>"; 
                                                    echo "</div>";
                                                    echo '<div class="col-md-8 col-lg-8 col-sm-4 feedsAlign">'; echo $row['time_stamp']; echo '</div>';
                                                echo "</div>";
                                            echo "</div>";
                                            //end of first div *sharing tagging and reporting and date/timestamp

                                            //beggining of first div *sharing tagging and reporting and date/timestamp
                                            echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 paddingFeeds feeds_link">';
                                                echo '<h4 style="color:#0271be;">';
                                                    echo '<a href="feeds_article.php?article='.$row['id'].'">'.$row['name'].'</a>';
                                                echo "</h4>";
                                            echo "</div>";
                                            //end of first div *sharing tagging and reporting and date/timestamp

                                            //beggining of 2nd div *doc info and cosult online call to action button
                                            echo '<div class="row">';
                                                echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 docSection">';
                                                    echo '<div class="col-md-4 col-xs-4 doc">';
                                                    if (empty($row['profile_pic'])){
                                                     echo '<img src="img/photo_avatar.png" />';
                                                    } else {
                                                         echo '<img src="'.$row['profile_pic'].'">';
                                                    }
                                                    echo '</div>';
                                                    echo '<div class="col-md-8 col-xs-8">';
                                                        echo '<div class="DocContent"> <b>Doctor: &nbsp; &nbsp;&nbsp; </b>';
                                                           echo $row['dr_name'];
                                                        echo '</div>';
                                                        echo '<div class="DocContent"> <b>Speciality: </b>'; echo $row['dr_specialization']; echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                            //end of 2nd div *doc info and cosult online call to action button

                                            //beggining of 3rd div *main post
                                            echo '<div class="row">';
                                                echo '<div class="col-md-12 col-lg-12 TxtHeight">';
                                                    
                                                    echo' <p class="show-read-more">'; 
                                                        echo $row['status'];
                                                    echo '</p>';
                                                    
                                                echo '</div>';
                                            echo '</div>';
                                            //end of 3rd div *main post

                                            //beggining of 4th div *post image
                                            echo '<div class="row">';
                                                echo '<div class="col-md-12 col-lg-12 imgHeight">';
                                                    if (($row['image']) != "null"){
                                                        echo '<a href="feeds_article.php?article='.$row['id'].'"> <img src="'.$row['image'].'"> </a>';
                                                    } else {
                                                         
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                            //end of 4th div *post image

                                            //beggining of 5th and last div *usefulness & like
                                            echo '<div class="row appreciateAlign">';
                                                echo '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 appreciateAlignBtn">';
                                                    echo '<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12"> Did you find this helpful?</div> ';
                                                    echo '<div class="consultBtnFeed col-md-6 col-lg-6 col-sm-6 col-xs-12">';
                                                        echo '<div class="consultBtn col-md-4 col-lg-4 col-xs-6">'; 
                                                            echo '
                                                                <form action="" method="POST">
                                                                    <input type="submit" value="Like" name="like" class="consult-online" style="padding:10px 30px; outline:none; float:right;"/>
                                                                </form>
                                                            </div>';

                                                        echo '<div class="consultBtn col-md-8 col-lg-8 col-xs-6">';

                                                            echo '<form action="consult.php" method="GET">

                                                            <input type="hidden" value='.$row['fd_dr_id'].' name="dr_id" class="form-control" id="email" >

                                                            <div class="consultBtn"><input type="submit" name="consult" style="float:right; outline:none;" value="Consult Online" class="consult-online" />

                                                            </form>'; //end form

                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';echo '</div>';

                                        echo "</div>"; // feeds full div
                                    echo "</div>"; // feeds full div
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



<!-- For Read More Script -->
<script type="text/javascript">
$(document).ready(function(){
    var maxLength = 500;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">...read more</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
</script>

<style type="text/css">
    .show-read-more .more-text{
        display: none;
        transition: all ease-in-out 0.3s;
        -webkit-transition: all ease-in-out 0.3s;
    }
</style>