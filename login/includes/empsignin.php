<?php


if (isset($_POST['submit'])) {
	require 'conn.php';

	//variables
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	if (empty($uname) || empty($pwd)) {
		header("Location: ../signup.php?error=emptyfields");
		exit();
	}else{

		$stmt = $conn->prepare("select * from employee where email=?");
		if(!$stmt){
			header("Location: ../signup.php?error=sqlerror");
		    exit();
		}
		else{
		$stmt->bind_param("s",$uname);
		$stmt->execute();
		$result = $stmt->get_result();
        if($result->num_rows == 0){
        	header("Location: ../signup.php?error=nosuchuser");
		        exit();
        }
        if($row = $result->fetch_assoc()){
        	
        	if(!password_verify($pwd,$row['Pwd'])){
        		header("Location: ../signup.php?error=wrongpassword");
		        exit();
        	}
        	else{
        		session_start();
        		$_SESSION['eid']    = $row['empId'];
        		$_SESSION['efname'] = $row['firstname'];
        		$_SESSION['eemail'] = $row['email'];
                
                header("Location: ../emppage.php?mess=success");
                exit();
        	}
        }
	    }

	

}}
else{
	header("Location  : ../signup.php");
	exit();
}