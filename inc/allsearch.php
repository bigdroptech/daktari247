
<div class="row allsearch">
  <div class="container">
  <form class="indexSearch" action="search.php" method="GET">
    <div class="col-md-1"> <h3>Search</h3></div>
    <div class="col-md-8">

        <?php 
          $query= "select * from js_core.m_common_specialities;";     
          $result = pg_query($query);
          echo ' <div class="input-aligns col-md-4">'; 
            echo'<datalist id="specs">';
              while ($row = pg_fetch_assoc($result)) {
                echo '<option value="'.htmlspecialchars($row['spname']).'">'.htmlspecialchars($row['spname']).'</option>';
                }
              echo' </datalist>';  
            echo'<input type="text" id="specs" class="form-control" name="specs" list="specs" placeholder="Doctor speciality">';
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
          <input name="commit" value="Find a Doctor" style="border: 3px solid #0271be;" class="btn btn-success btn-block btn-home" type="submit">
        </div>
      </div>
  </form>
  </div>
</div>