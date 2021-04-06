<?php
require 'includes/conn.php';
$stmt = $conn->prepare("select count(*) from approve");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_row();
$total = $row[0];
if($total != 0){
	echo "<div class='appr'>".$total."</div>";
}
?>