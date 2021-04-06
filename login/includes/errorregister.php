<?php
$fname = $lname = $mail = $phno = $age = "";
$fnameerror = $lnameerror = $mailerror = $phnoerror  = $ageerror = $passerror = "";
if(isset($_GET['error'])){
       
     if ($_GET['error'] == "invalidemail") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
          $mailerror = "Invalid Email";
         }
     if ($_GET['error'] == "invalidfname") {
          
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
          $fnameerror = "Invalid FristName";
           } 
     if ($_GET['error'] == "invalidlname") {
          $fname = $_GET['fname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
          $lnameerror = "Invalid LastName";
             }  
    if ($_GET['error'] == "invalidphno") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $age = $_GET['age'];
          $phnoerror = "Invalid Phonenumber";
                 }  
      if ($_GET['error'] == "invalidage") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $ageerror = "Invalid Age";
          }                   
      if ($_GET['error'] == "passwordnotsame") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
          $passerror = "Invalid Password";
          }                     
}