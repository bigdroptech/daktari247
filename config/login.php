<?php
         // Starting Session
        session_set_cookie_params(3600 * 24 * 7);
        session_start();

        include "../script.php";

        $error=''; // Variable To Store Error Message

        if (isset($_POST['signin'])) {
        if (empty($_POST['signinphone']) || empty($_POST['signpassword'])) {
            
            
            
             $error = "Phone or Password is invalid";
        }
        else
        {
        // Define $username and $password
        $phone=$_POST['signinphone'];
        $password=$_POST['signpassword'];
            

        // To protect MySQL injection for Security purpose
            
            
            $phone = stripslashes($phone);
            $password = stripslashes($password);
            $phone = pg_escape_string($db, $phone); // Set email variable
            $password = pg_escape_string($db, $password); // Set hash variable
              
            $pass_crypted = sha1($password);
            
        // SQL query to fetch information of registerd users and finds user match.
            
            $sql="SELECT usr_id, usr_email, usr_first_name, usr_last_name, 
                  usr_encrypted_password,
                          usr_salt, usr_stos_id, usr_pers_id, usr_username, usr_updated_at,
                          usr_created_at, usr_enabled, usr_role_id, usr_jbrn_id, 
                  usr_mobile_number,
                          stp_acc_id, usr_location, usr_mobile_imei, usr_type
                      FROM js_core.stp_users

                      where usr_mobile_number='$phone'

                      AND usr_encrypted_password='$pass_crypted'
                      OFFSET 0 LIMIT 1
                     ";
            $result=pg_query($db, $sql);

            $rows = pg_num_rows($result);
            
            if ($rows != 0) {
                  $_SESSION['usr_id']=$usrid; // Initializing Session
                  $_SESSION['phone']=$phone; // Initializing Session
                    while ($row3 = pg_fetch_assoc( $result)) {
                          if (!$row3) {
                           
                          }
                          else{
                          $_SESSION['username'] = $row3['usr_last_name'];
                            if(isset($_SESSION['url'])) 
                               $url = $_SESSION['url']; // holds url for last page visited.
                            else 
                               $url = "index.php"; 

                            header("Location: $url");

                          }

                 

             // Closing Connection

            }
            } else{
               header("Location: ../signin.php?s=1");
                $error = "Password and Username not found";
            }
}

}
        ?>

