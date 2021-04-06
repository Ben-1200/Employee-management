<?php

if (isset($_POST['submit'])) {
	require 'conn.php';
	$id = $_POST['id'];
	$approve = $_POST['approve'];
	//this is for finding the email of the employeee
	$stmt = $conn->prepare("select email from employee where empid=?");
	$stmt->bind_param("s",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($row = $result->fetch_assoc()){
		 $email = $row['email'];
		}

	if(empty($id) || empty($approve)){
		header("location: ../approveleave.php?error=emptyfields");
		exit();
	}else{

		if($approve == "s"){
			$stmt = $conn->prepare("select * from leaveman where id=?");
			$stmt->bind_param("s",$id);
			$stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows == 0){
	        	header("Location: ../approveleave.php?error=nosuchid");
	        	exit();
	        }

            $stmt = $conn->prepare("update leaveman set approvestatus=? where id=?");
            $a="s";
            $stmt->bind_param("ss",$a,$id);
            $stmt->execute();

	       if($stmt->affected_rows >0){
					 $sub = "Approval From Admin For leave";
					 $content = "Your Leave Form has been approved successfully";
					 mail($email,$sub,$content);
	        	header("Location: ../approveleave.php? mess=success");
	        	exit();
	        }

		}
		else{
			$stmt = $conn->prepare("update leaveman set approvestatus=? where id=?");
			$b="n";

            $stmt->bind_param("ss",$b,$id);
            $stmt->execute();
						$sub = "Approval From Admin For leave";
						$content = "Your Leave Form has not been approved";
						mail($email,$sub,$content);
	        	header("Location: ../approveleave.php? mess=success");
	        	exit();

		}
	}
}
