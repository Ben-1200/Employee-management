<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/emplisting.css">
</head>
<body>
	<?php
   session_start();
     if (isset($_SESSION['id'])) {
        include 'nav.php';
     }
  ?>
<div class="main">
	<div>
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
</div>
</div>


</body>
</html>