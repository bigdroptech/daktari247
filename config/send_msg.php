    <?php
        $error ="";  
        require '../script.php';


        if (isset($_POST['msgsubmit'])){

        $hosp_id = $_GET['hosp_id'];
        $hosp_email = $_GET['hosp_email'];
            
        $msgname = $_POST["msgname"];
        $msgphone = $_POST["msgphone"];
        $msgmail = $_POST["msgmail"];
        $msg = $_POST["msg"];


         
        $msgname = pg_escape_string($db, $msgname);
        $msgphone = pg_escape_string($db, $msgphone);
        $msgmail = pg_escape_string($db, $msgmail);
        $msg = pg_escape_string($db, $msg);

        date_default_timezone_set('UTC');
        $date = date("Y-m-d");
            
            if (!filter_var($msgmail, FILTER_VALIDATE_EMAIL)) { throw new \Exception('Invalid email'); 
        } else
          {
        
        $sql ="INSERT INTO js_core.m_hospital_messages (hm_name, hm_phone, hm_email, hm_message, hm_date, hm_hp_id)VALUES 
        ('$msgname', '$msgphone', '$msgmail', '$msg', '$date' '$hosp_id')";
        
        $query = pg_query($db,$sql);
     
        if($query){

        $to      = $hosp_email; // Send email to our user
        $subject = 'Daktari247 | Hospital Message'; // Give the email a subject 
        $message = $msg . "\r\n" . "from:" . $msgname . "\r\n" . "Phone No:" .  $msgphone . "\r\n" . "Email Adrress:" . $msgmail; // Our message above including the link
                             
        $headers = $msgmail . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
        }

        

        

     

        
         }
    }

        




    ?>