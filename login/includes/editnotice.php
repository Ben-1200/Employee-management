<?php
 

 $title = $_POST['title'];
 $text = $_POST['text'];

 if (isset($title)) {
 	require 'conn.php';
 	$stmt = $conn->prepare("update notice set content=? where title=?");
 	if(!$stmt){
 		header("Location: ../notice.php?error=server");
 		exit();
 	}
 	$stmt->bind_param("ss",$text,$title);
 	$stmt->execute();
 	if($stmt->affected_rows  > 0){
 		header("Location: ../notice.php?mess=success");
 		exit();
 	}
 }
