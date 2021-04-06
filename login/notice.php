<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/notice.css">
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
  		$mess = "Notice is Sent";
  	}else if(isset($_GET['error'])){
  		$mess = "There Are Errors";
  	}
   ?>
<div class="main">
<div class="log">
  <button onclick="edit()" name="button" id="a2">Edit</button><br><br>
</div>
<div class="form">
	<form action="includes/notice.php" method="post">
		<?php echo "<p style = 'margin-left:20%;color:white;'>".$mess."</p><br>"; ?>
		<input type="text" name="title" placeholder="Title"><br><br>
		<textarea rows="10" cols="30" name="text" placeholder="Notice"></textarea><br><br>
		<button type="submit" name="submit">Send</button>
	</form>
</div>
<div class="edit">

	<form action="includes/editnotice.php" method="post" id="a1">

		<input type="text" name="title" placeholder="Title Of the Content To be Changed"  ><br><br>
		<textarea rows="10" cols="30" name="text"  id="a2"></textarea><br><br>
		<button type="submit" name="submit">Send</button>
	</form>
</div>
</div>
<script type="text/javascript">
	function edit(){
    document.getElementById('a1').style.display="block";

	}
</script>
</body>
</html>
