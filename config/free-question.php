<?php
$error ="";  
require '../script.php';


if (isset($_POST['freequestion'])){


    
$forwho = $_POST["forwho"];
$describeissue = $_POST["describeissue"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$location = $_POST["location"];
$weight = $_POST["weight"];
$diagnose = $_POST["diagnose"];
$medication = $_POST["medication"];
$allergies = $_POST["allergies"];
$preffered = $_POST["preffered"];
$qsemail = $_POST["qsemail"];

 
$forwho = pg_escape_string($db, $forwho);
$describeissue = pg_escape_string($db, $describeissue);
$gender = pg_escape_string($db, $gender);
date_default_timezone_set('UTC');
$dob = date("Y-m-d");
$location = pg_escape_string($db, $location);
$weight = pg_escape_string($db, $weight);
$diagnose = pg_escape_string($db, $diagnose);
$medication = pg_escape_string($db, $medication);
$allergies = pg_escape_string($db, $allergies);
$preffered = pg_escape_string($db, $preffered);
$qsemail = pg_escape_string($db, $qsemail);
date_default_timezone_set('UTC');
$time = date("H:i:s");
$usrid = "2";
$qs_status ="UNANSWERED";
    
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $qsemail)){
    // Return Error - Invalid Email
    $msg = 'The email you have entered is invalid, please try again.';
} else
  {
    
    $sql ="INSERT INTO js_core.m_free_questions (q_usr_id, qa_person, q_question, qa_gender, qa_dob, qa_location, qa_weight, qa_pre_diagonised, qa_medication, qa_allergies, qa_pref_doctor, q_email, q_time, q_status)VALUES 
    ('$usrid', '$forwho', '$describeissue', '$gender', '$dob', '$location', '$weight', '$diagnose', '$medication','$allergies','$preffered','$qsemail','$time','$qs_status')";
    
    $query = pg_query($db,$sql);
    if($query){
         
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Your Question has been recieved, you will recieve an answer soon");'; 
        echo 'window.location.href = "../index.php";';
        echo '</script>';

       
        

    }

 

    
     }
}

    




?>