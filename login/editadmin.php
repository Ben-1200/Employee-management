
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/eadminstyle.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<style>
		table,th,td{
			border:1px solid #000;
			border-collapse: collapse;
			color:white;
			background-color: #E9967A
		}
	</style>
</head>
<body>
	<?php 	$mess="";
		if(isset($_GET['mess'])){
			$mess = "Edited Successfully";
		}else if(isset($_GET['error'])){
			$mess = "Cannot Be Edited";
		}
	 ?>
  <?php
   session_start();
     if (isset($_SESSION['id'])) {
        include 'nav.php';
     }
  ?>
	<div class = "main">
<!--    <div class="log">
  <?php
  /*require 'logouticon.php';*/
  ?>
  </div> -->
	<?php
	require 'includes/conn.php';
	$stmt = $conn->prepare("select * from employee");
	if(!$stmt){
		exit();
	}
	$stmt->execute();
	$result = $stmt->get_result();
	echo "<table cellpadding=3  class='table'>";
	while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td>".$row['empId']."</td>";
      echo "<td>".$row['firstname']."</td>";
      echo "<td>".$row['lastname']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['phoneno']."</td>";
      echo "<td>".$row['Age']."</td>";
      echo "<td>".$row['dob']."</td>";
      echo "</tr>";
	}
	echo "</table>";
	?>
    <div class="form">
  <form action="includes/getedit.php"  method="post" >
		<?php echo "<p style = 'margin-left:20%;color:green;'>".$mess."</p><br>"; ?>
  	<input type="text" name="id" placeholder="Employee Id"><br><br>
  	<select  name="column-name">
  		<option value="firstname">First Name</option>
  		<option value="lastname">Last Name</option>
  		<option value="email">Email</option>
        <option value="phoneno">Phone Number</option>
  		<option value="Age">Age</option>
  		<option value="dob">Date of Birth</option>
  	</select><br><br>
    <input type="text" name="new" placeholder="New data"><br><br>
  	<button type="submit">Change</button>
 </form>
    </div>
 </div>
</body>
</html>
