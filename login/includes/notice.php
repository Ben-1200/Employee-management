<?php
if(isset($_POST['submit'])){
require 'conn.php';
$title = $_POST['title'];
$content = $_POST['text'];
if(empty($title) || empty($content)){
	header("Location: ../notice.php?error=emptyfields");
	exit();
}
$stmt = $conn->prepare("insert into notice(title,content)values(?,?)");
if(!$stmt){
	header("Location: ../notice.php?err=servererr");
	exit();
}
$stmt->bind_param("ss",$title,$content);
$stmt->execute();
if($stmt->affected_rows > 0){
	header("Location: ../notice.php?mess=success");
	exit();
}
}
