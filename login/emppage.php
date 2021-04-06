<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estyle1.css">
</head>
<body>
<div class="main">

<div class="log">
<?php

if (isset($_SESSION['eid'])) {
     echo "
        <form action='includes/logout.php' method='post'>
            <button type='submit' name='logout'>Log Out</button>
        </form>
             ";
     echo "<h1>WELCOME ".strtoupper($_SESSION['efname'])."</h1>";
}
?>
</div>
<?php
$mess = "";
if($_GET['mess'] == "submittedsuccessfully"){
  $mess = "Sent To Your Admin For Updation";
}

 ?>

<div class="form">
  <h2>Edit</h2><br>
<form action="includes/empsub.php"  method="post" >
  	<input type="text" name="id" placeholder="Employee Id" value= <?php echo $_SESSION['eid'] ; ?>><br><br>
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
    <?php echo"<p style='color:green'>".$mess."</p>";?>
 </form>
</div>


 <div class="approve">
 <?php
 require 'includes/conn.php';

 $stmt = $conn->prepare("select * from approve where id=?");
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
    echo "<form action='includes/deletestatus.php' method='post'>
          <button type='submit'>Ok</button>
        </form>";
  }else{
    echo "<br><p>Not Approved</p><br>";
    unset($approval);
    echo "<form action='includes/deletestatus.php' method='post'>
          <button type='submit'>Ok</button>
        </form>";
  }

}

 ?>
</div>
<div class="notice">
  <h1> Notice </h1>
  <?php
   date_default_timezone_set('Asia/Kolkata');
    require 'includes/conn.php';
    $stmt = $conn->prepare("select * from notice");
    $stmt->execute();
    $result = $stmt->get_result();
    while($rows = $result->fetch_assoc()){
     $date=date_create($rows['Post']);
     $date = date_format($date,"Y-m-d");
     if(!(strcmp($date,date("Y-m-d")))){
         echo "<h2>".$rows['title']."</h2><br>";
         echo "<p>".$rows['content']."</p><br>";
     }

    }
  ?>
</div>
 <div class="leave">
   <a href="leavemanagement.php">Leave Form</a>
 </div>
</div>
</body>
</html>
