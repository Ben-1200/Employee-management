<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/eadminstyle.css">
	<style>
		.main{
			background-image: url("images/bg/a3.jpg");
		}

		input{
			border:2px solid #fff;
			color:#fff;
			background-color: unset;
		}
		button{
			border:2px solid #fff;
			color:#fff;
			background-color: unset;
			border-radius: 23px;
		}
		.log button{
			border:2px solid #fff;
			color:#fff;
		}

		table,th,td{
			border:2px solid #fff;
			border-collapse: collapse;
			color:white;
			padding: 7px;
			font-size:15px;
			width:40%;
			height:30%;
		}
		</style>
</head>
<body>
	<?php
   session_start();
     if (isset($_SESSION['id'])) {
        include 'nav.php';
     }
  ?>
	<?php 	$mess="";
  	if(isset($_GET['mess'])){
  		$mess = "Department Added Successfully";
  	}else if(isset($_GET['err'])){
  		$mess = "Department  Not Added";
  	}
   ?>
<div class="main">
	</div>
	<div class="table">
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
      echo "<td>".$row['dep']."</td>";
      echo "</tr>";
	}
	echo "</table>";
	?>
</div>
	<div class="form">
		<form action="includes/departmentadd.php"  method="post">
			<?php echo "<p style = 'margin-left:20%;color:white;'>".$mess."</p><br>"; ?>
			<input type="text" name="id" placeholder="Employee Id"><br><br>
			<input type="text" name="dep" placeholder="department"><br><br>

  	       <button type="submit" name="submit">Change</button>
		</form>
	</div>
</div>
</body>
</html>
