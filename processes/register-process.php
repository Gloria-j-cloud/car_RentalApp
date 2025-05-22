<?php 

  session_start();

require "../config/db-connect.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'] ?? " ";
$email = $_POST['email'];
$msg = " ";


    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['error'] = $msg;

 
       
 if(empty($first_name || $last_name)){
   header("Location: ../register.php");
   exit();
};

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   header("Location: ../register.php");
   exit();

};
  
if(!ctype_digit($phone)){
   $msg = '<p class="text-danger">Please enter valid number</p>';
   //echo $msg;
   header("Location: ../register.php");
   exit();
};

 
   header("Location: ../dashboard.php");
   exit();


?>