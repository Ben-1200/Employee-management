<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
  
</head>
<body>

<div class = "main"> 
<?php
  require 'logouticon.php';
  echo "<h1>WELCOME ".strtoupper($_SESSION['name'])."</h1>";
?>
 <div class="add">
   <h2>Add Employee</h2><br>
   <a href="register.php">Click Here</a>
 </div>
 <div class="edit">
   <h2>Edit Employee</h2><br>
   <a href="editadmin.php">Click Here</a>
 </div>
 <div class="approve">
   <h2>Approve</h2><br>
   <a href="approveemp.php">Click Here</a>
   <?php
     include 'notification.php';
   ?>
 </div>
 <div class="notice">
   <h2>Notice</h2><br>
   <a href="notice.php">Click Here</a>
 </div>
 <div class="leave">
   <h2>Leave</h2><br>
   <a href="approveleave.php">Click Here</a>
   <?php
     include 'leavenotification.php';
   ?>
 </div>
 <div class="listing">
   <h2>List Of Employees</h2><br>
   <a href="emplisting.php">Click Here</a>
 </div>
 <div class="department">
   <h2>Department Assign</h2><br>
   <a href="departmentadd.php">Click Here</a>
 </div>
</div>
  



 </body>
</html>



