<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/leavemanagement.css">
  <link rel="stylesheet" type="text/css" href="css/nave.css">
</head>
<body>
<div class="main">
 <?php
   include 'nave.php';

 ?>
 <?php 	$mess="";
 	if(isset($_GET['mess'])){
 		$mess = "Leave Form Submitted Successfully";
 	}else if(isset($_GET['error'])){
 		$mess = "Leave Form Not Submitted Successfully";
 	}
  ?>
<div class="log">
<?php
session_start();
if (isset($_SESSION['eid'])) {
     echo "
        <form action='includes/logout.php' method='post'>
            <button type='submit' name='logout'>Log Out</button>
        </form>
             ";
  }
?>
</div>

<div class="form">
    <form action="includes/leavemanagement.php" method="post">
			<?php echo "<p style = 'margin-left:20%;color:white;'>".$mess."</p><br>"; ?>
    	<input type="text" name="id" placeholder="Id" value= <?php echo $_SESSION['eid'] ; ?>><br><br>
    	<input type="text" name="email" placeholder="email"><br><br>
    	<textarea rows="10" cols="30" name="reason"></textarea><br><br>
    	<button type="submit" name="submit">Submit</button>
    </form>
</div>

<div class="approve">
 <?php
 require 'includes/conn.php';

 $stmt = $conn->prepare("select * from leaveman where id=?");
 $stmt->bind_param("s",$_SESSION['eid']);
 $stmt->execute();
 $result = $stmt->get_result();

 if($row = $result->fetch_assoc()){
  $approval = $row['approvestatus'];

 }
 echo "<h2>Status</h2><br>";
if(empty($approval)){
  echo "<p> Status Pending For Approval...</p>";
}else{
  if($approval == "s"){
    echo "<br><p>Yes Approved</p><br>";
    unset($approval);
    echo "<form action='includes/deletes.php' method='post'>
          <button type='submit'>Ok</button>
        </form>";
  }else{
    echo "<br><p>Not Approved</p><br>";
    unset($approval);
    echo "<form action='includes/deletes.php' method='post'>
          <button type='submit'>Ok</button>
        </form>";
  }

}

 ?>
</div>

</div>
</body>
</html>
