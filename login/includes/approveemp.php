<?php
session_start();
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
		header("location: ../approveemp.php?error=emptyfields");
		exit();
	}else{

		if($approve == "s"){
			$stmt = $conn->prepare("select * from approve where id=?");
			$stmt->bind_param("s",$id);
			$stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows == 0){
	        	header("Location: ../approveemp.php?error=nosuchid");
	        	exit();
	        }
	        if($row = $result->fetch_assoc()){
             $name = $row['name'];
             $new  = $row['new'];
					 }
            $stmt = $conn->prepare("update approve set approvestatus=? where id=?");
            $a="s";
            $stmt->bind_param("ss",$a,$id);
            $stmt->execute();

						//approval
	        $stmt = $conn->prepare("update employee set ".$name."=? where empid=?");
	        if (!$stmt) {
	        	header("Location: ../approveemp.php?error=sql");
	        	exit();
	        }
	        $stmt->bind_param("ss",$new,$id);
	        $stmt->execute();
	        if($stmt->affected_rows >0){
						$sub = "Approval From Admin";
						$content = "The changes you made to your profile has been approved successfully";
						mail($email,$sub,$content);
	        	header("Location: ../approveemp.php? mess=success");
	        	exit();
	        }

		}
		else{
			$stmt = $conn->prepare("update approve set approvestatus=? where id=?");
			$b="n";

            $stmt->bind_param("ss",$b,$id);
            $stmt->execute();
						$sub = "Approval From Admin";
						$content = "The changes you made to your profile has not been approved";
						mail($email,$sub,$content);
	        	header("Location: ../approveemp.php?mess=success");
	        	exit();
		}
	}
}
