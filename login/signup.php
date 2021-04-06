<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<style type="text/css">
	.emp-signin{
		margin-top: 9%;
	}
	.emp-signin > img{
		max-width: 100%;
		height:auto;
		border-radius: 30em;
		margin-left: 30%;
	}
    </style>
</head>
<body>
	<div  class="header">
	<h1>EMPLOYEE LOGIN</h1>
    </div>

<div class="emp-signin">
	<img src="images/logo/1.jpg" alt="logo" title="login">
   	<form  action = "includes/empsignin.php"  method="post">
   		<input type="text" name="uname" placeholder="Username"><br><br>
   		<input type="password" name="pwd"  placeholder="Password"><br><br>
   		<button type="submit" name="submit">Sign In</button>
   	</form>
</div>

    
</body>
</html>