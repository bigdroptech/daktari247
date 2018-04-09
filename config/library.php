<?php  
session_start();
$error ="";  
require_once 'script.php';


if (isset($_POST['signup'])){

if(empty($_POST["name"])||empty($_POST["password"])||empty($_POST["email"])||empty($_POST["phone"])){
$error = "Empty Fields";


} else {
    
$firstname = $_POST["firstname"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$county = $_POST["county"];
$password = $_POST["password"];

 
$firstname = pg_escape_string($db, $firstname);
$name = pg_escape_string($db, $name);
$email = pg_escape_string($db, $email);
$phone = pg_escape_string($db, $phone);
$gender = pg_escape_string($db, $gender);
$dob = pg_escape_string($db, $dob);
$county = pg_escape_string($db, $county);
$password = pg_escape_string($db, $password);
$password = md5($password);
date_default_timezone_set('UTC');
$date = date("Y-m-d H:i:s");
$activation = "0";
$hash = sha1( rand(0,1000) );
    
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $email)){
    // Return Error - Invalid Email
    $msg = 'The email you have entered is invalid, please try again.';
}else{
  

    $sql = "SELECT usr_email FROM stp_users WHERE usr_email='$email' AND usr_mobile_number='$phone'";

    $result = pg_query($db,$sql);

    $row = pg_fetch_array($result,MYSQLI_ASSOC);
 
if(pg_num_rows($result) == 1)
{
  echo "Sorry...This email already exist..";
}
else
      {
    
    $sql ="INSERT INTO js_core.stp_users (usr_first_name, usr_last_name, usr_email, usr_mobile_number, usr_gender, usr_dob, usr_county, usr_encrypted_password, usr_created_at, usr_enabled, usr_salt)VALUES 
    ('$firstname', '$name', '$email', '$phone', '$gender', '$dob', '$county', '$password','$date','$activation','$hash')";
    
    $query = pg_query($db,$sql);
 
if($query)
       
        {

$to      = $email; // Send email to our user
$subject = 'Daktari247 | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://www.doc.co/verify.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@doc.co' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
        }
    
     }
    }
}

    
}



?>