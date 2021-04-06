<?php
require 'conn.php';
session_start();
$stmt = $conn->prepare("delete from leaveman where id=?");
$stmt->bind_param("s",$_SESSION['eid']);
$stmt->execute();
if($stmt->affected_rows > 0){
	header("Location: ../leavemanagement.php?mess=deleted");
}