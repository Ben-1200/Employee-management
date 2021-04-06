
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">

  </head>
<body>
 <div  class="header">
	<h1>EMPLOYEE REGISTRATION FORM</h1>
    </div>
    <?php
   session_start();
     if (isset($_SESSION['id'])) {
        include 'nav.php';
     }
  ?>
   <?php
      require 'includes/errorregister.php';
			$mess="";
			if(isset($_GET['mess'])){
				$mess = "User Added Successfully";
			}else if(isset($_GET['error'])){
				$mess = "Not Added";
			}
   ?>
   <div class="register-emp">

   	<form  action = "includes/registercheck.php"  method="post">
			<?php echo "<p style = 'margin-left:20%;color:green;'>".$mess."</p><br>"; ?>
   		<input type="text" name="fname" placeholder="Firstname" value= <?php echo $fname; ?>><?php if(!empty($fnameerror)) echo "<div class = 'err'>*".$fnameerror."</div>"; ?><br><br>
   		<input type="text" name="lname" placeholder="Lastname" value= <?php echo $lname; ?>><?php if(!empty($lnameerror)) echo "<div class = 'err'>*".$lnameerror."</div>"; ?><br><br>
   		<input type="text" name="email" placeholder="E-mail" value= <?php echo $mail; ?>><?php if(!empty($mailerror)) echo "<span class = 'err'>*".$mailerror."</span>"; ?><br><br>
   		<input type="text" name="phno" placeholder="PhoneNumber" value= <?php echo $phno; ?>><?php if(!empty($phnoerror)) echo "<div class = 'err'>*".$phnoerror."</div>"; ?><br><br>
   		<input type="text" name="Age" placeholder="Age" value= <?php echo $age; ?>><?php if(!empty($ageerror)) echo "<div class = 'err'>*".$ageerror."</div>"; ?><br><br>
   		<input type="date" name="dob" placeholder="Date"><br><br>
   		<input type="password" name="pwd"  placeholder="Password"><br><br>
   		<input type="password" name="rpwd"  placeholder="Retype-Password"><?php if(!empty($passerror)) echo "<div class = 'err'>*".$passerror."</div>"; ?><br><br>
   		<button type="submit" name="submit">Create Account</button>

   	</form>

   </div>


</body>
</html>
