<?php
if(isset($_POST['submit'])){
	require 'conn.php';
	$id = $_POST['id'];
	$dep = $_POST['dep'];
     
	if(empty($id) || empty($dep)){
		header("Location: ../departmentadd.php?err=emptyfields");
		exit();
	}
	else{
		
		$stmt = $conn->prepare("update employee set dep=? where empid=?");
		if(!$stmt){
		header("Location: ../departmentadd.php?err=server");
		exit();
		}
		$stmt->bind_param("ss",$dep,$id);
		$stmt->execute();
		
		header("Location: ../departmentadd.php?mess=success");
		exit();	
		
	}

}else{
	header("Location: ../departmentadd.php?err=empty");
		exit();
}