<?php
$fname = $lname = $mail = $phno = $age = "";

if(isset($_GET['error'])){
       if($_GET['error'] == "emptyfields"){
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
       }
       elseif ($_GET['error'] == "invalidemail") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
         }
       elseif ($_GET['error'] == "invalidfname") {
          
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
           } 
       elseif ($_GET['error'] == "invalidlname") {
          $fname = $_GET['fname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
             }  
       elseif ($_GET['error'] == "invalidphno") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $age = $_GET['age'];
                 }  
        elseif ($_GET['error'] == "invalidage") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          }                   
        elseif ($_GET['error'] == "passwordnotsame") {
          $fname = $_GET['fname'];
          $lname = $_GET['lname'];
          $mail = $_GET['mail'];
          $phno = $_GET['phno'];
          $age = $_GET['age'];
          }                     
}