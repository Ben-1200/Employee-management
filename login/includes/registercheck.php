
<?php

if(isset($_POST['submit'])){
   require 'conn.php';
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $phno = $_POST['phno'];
   $age = $_POST['Age'];
   $dob = $_POST['dob'];
   $pwd = $_POST['pwd'];
   $rpwd = $_POST['rpwd'];

   if(empty($fname) || empty($lname) || empty($email) || empty($phno) || empty($age)  || empty($pwd) ||empty($rpwd) || empty($dob))
   {
   	header("Location: ../register.php?error=emptyfields&fname=".$fname."&lname=".$lname."&mail=".$email."&phno=".$phno."&age=".$age);
   	exit();
   }
   elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: ../register.php?error=invalidemail&fname=".$fname."&lname=".$lname."&phno=".$phno."&age=".$age);
   	exit();
   }
   elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)){
      header("Location: ../register.php?error=invalidfname&lname=".$lname."&mail=".$email."&phno=".$phno."&age=".$age);
   	exit();
   }
   elseif (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
   	header("Location: ../register.php?error=invalidlname&fname=".$fname."&mail=".$email."&phno=".$phno."&age=".$age);
   	exit();
   }
   elseif (!preg_match("/^[0-9 ]*$/",$phno)) {
   	header("Location: ../register.php?error=invalidphno&fname=".$fname."&lname=".$lname."&mail=".$email."&age=".$age);
   	exit();
   }
   elseif (!preg_match("/^[0-9 ]*$/",$age)) {
   	header("Location: ../register.php?error=invalidage&fname=".$fname."&lname=".$lname."&mail=".$email."&phno=".$phno);
   	exit();
   }
   elseif ($pwd !== $rpwd) {

   	header("Location: ../register.php?error=passwordnotsame&fname=".$fname."&lname=".$lname."&mail=".$email."&phno=".$phno."&age=".$age);
   	exit();
   }
   else
   {
   $stmt = $conn->prepare("Select email from employee  where email=?");
   if(!$stmt){
	header("Location: ../register.php?error=servererror");
   }
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $result = $stmt->get_result();
   if($result->num_rows > 0){
   	header("Location: ../register.php?error=emailexists");
   	exit();
   }
   else{
   $stmt = $conn->prepare("Insert into employee(firstname,lastname,email,	phoneno,Age,dob,Pwd) values (?,?,?,?,?,?,?)");
   if(!$stmt){
	header("Location: ../register.php?error=server1");
	exit();
   }
   $hpwd = password_hash($pwd, PASSWORD_DEFAULT);
   $stmt->bind_param("sssssss",$fname,$lname,$email,$phno,$age,$dob,$hpwd);
   $stmt->execute();
   if($stmt->affected_rows > 0)
   {
    $sub = "Registration";
    $content = "This to inform u that u have been selected successfully";
    mail($email,$sub,$content);
   	header("Location: ../register.php?mess=success");
   	exit();
   }
   }
   }

}else{
        header("Location: ../register.php?mess=invalidentry");
        exit();
}
