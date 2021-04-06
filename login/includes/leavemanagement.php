<?php
if (isset($_POST['submit'])) {
	require 'conn.php';

	$id = $_POST['id'];
	$email = $_POST['email'];
	$reason = $_POST['reason'];
	if (empty($id) || empty($email) || empty($reason) ) {
		header("Location: ../leavemanagement.php?error=emptyfields");
		exit();
	}
	else{
		$stmt = $conn->prepare("insert into leaveman(id,email,reason) values(?,?,?)");
		if (!$stmt) {
			header("Location: ../leavemanagement.php?error=server");
			exit();
		}
		$stmt->bind_param("sss",$id,$email,$reason);
		$stmt->execute();
        if ($stmt->affected_rows > 0) {
        	header("Location: ../leavemanagement.php?mess=success");
			exit();
        }
        else{
        	header("Location: ../leavemanagement.php?error=cantsent");
			exit();
        }
	}
}