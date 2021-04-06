<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/newstyle.css">
</head>
<body>

 
<div class="head">
<div  class="header">
	<h1>EMPLOYEE MANAGEMENT SYSTEM</h1>
    </div>
   
   

   <div class="admin">
    
   	<h1>Admin Login</h1><br>
   	
    <form  action = "includes/adminsignin.php"  method="post">
      <input type="text" name="uname" placeholder="Username/E-mail"><br>
      <input type="password" name="pwd"  placeholder="Password"><br>
      <button type="submit" name="submit">Sign In</button>
    </form>
   </div>


   <div class="employee">
   	
   	<h1>Employee Register/SignUp</h1><br><br>
   	<a href="register.php">Register</a><br><br>
    <a href="signup.php">SignUp</a>
   </div>
 
  </div>
</body>
</html>