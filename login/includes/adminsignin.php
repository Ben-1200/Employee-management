<?php

if (isset($_POST['submit'])) {
	require 'conn.php';
	//variables
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	if (empty($uname) || empty($pwd)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{
		$stmt = $conn->prepare("select * from admin where email=?");
		if(!$stmt){
			header("Location: ../index.php?error=sqlerror");
		exit();
		}
		else{
		$stmt->bind_param("s",$uname);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows == 0){
        	header("Location: ../index.php?error=nosuchuser");
		        exit();
        }
        if($row = $result->fetch_assoc()){
        	if(!password_verify($pwd,$row['PWD'])){
        		header("Location: ../index.php?error=wrongpassword");
		        exit();
        	}
        	else{
        		session_start();
        		$_SESSION['id']    = $row['id'];
        		$_SESSION['name']  = $row['name'];
        		$_SESSION['email'] = $row['EMAIL'];

                header("Location: ../adminpage.php");
                exit();
        	}
        }
	    }

	}

}else{

}