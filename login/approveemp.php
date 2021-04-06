<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/approve.css">
</head>
<body>
	<?php
   session_start();
     if (isset($_SESSION['id'])) {
        include 'nav.php';
     }
  ?>
<div class="main">
   
   <div class="table">
	<?php
	require 'includes/conn.php';
	$stmt = $conn->prepare("select * from approve");
	if(!$stmt){
		exit();
	}
	$stmt->execute();
	$result = $stmt->get_result();
	echo "<table cellpadding=7  class='table'>";
	while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['new']."</td>";
      echo "</tr>";
	}
	echo "</table>";
	?> 
	</div>
	<div class="form">
	<form  action="includes/approveemp.php" method="post">
		<input type="text" name="id" placeholder="id"><br><br>
		<input type="text" name="approve" placeholder="approve"><br><br>
		<button type="submit" name='submit'>Submit</button>
	</form>
	</div>
</div>
</body>
</html>



