<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/approveleave.css">
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
	$stmt = $conn->prepare("select * from leaveman");
	if(!$stmt){
		exit();
	}
	$stmt->execute();
	$result = $stmt->get_result();
	echo "<table  cellpadding=10  class='table'>";
	while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['reason']."</td>";
      echo "</tr>";
	}
	echo "</table>";
	?>
	</div>

	<div class="form">
		<form action="includes/approveleave.php" method="post">
			
    	<input type="text" name="id" placeholder="Id"><br><br>
    	<select name="approve">
    		<option value="s">YES</option>
    		<option value="n">NO</option>
    	</select><br><br>
    	<button type="submit" name="submit">Submit</button>
        </form>
	</div>
</div>
</body>
</html>
