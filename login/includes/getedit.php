<?php

$id = $_POST['id'];
$name = $_POST['column-name'];
$new = $_POST['new'];
function update($id,$name,$new){
	require 'conn.php';

   $stmt = $conn->prepare("update employee set ".$name."=? where empid=?");
   if(!$stmt){
   	header("Location: ../editadmin.php?error=server1");
   	exit();
   }
   
   $stmt->bind_param("ss",$new,$id);
   $stmt->execute();
   if($stmt->affected_rows > 0)
   {
   	header("Location: ../editadmin.php?mess=success");
   	exit();
   }
}

if(empty($id)||empty($name)||empty($new)){
  header("Location: ../editadmin.php?error=emptyfields");
  exit();
}
elseif ($name == "firstname") {
	if(!preg_match("/^[a-zA-Z ]*$/",$new)){
      header("Location: ../editadmin.php?error=invalidfname");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "lastname") {
	if(!preg_match("/^[a-zA-Z ]*$/",$new)){
      header("Location: ../editadmin.php?error=invalidlname");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "email") {
	if(!filter_var($new,FILTER_VALIDATE_EMAIL)){
      header("Location: ../editadmin.php?error=invalidemail");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "phoneno") {
	if (!preg_match("/^[0-9 ]*$/",$new)) {
   	header("Location: ../editadmin.php?error=invalidphno");
   	exit();
   }else{
    update($id,$name,$new);
   }
}
elseif ($name == "Age") {
	if (!preg_match("/^[0-9 ]*$/",$new)) {
   	header("Location: ../editadmin.php?error=invalidage");
   	exit();
   }else{
    update($id,$name,$new);
   }
}
elseif ($name == "dob") {
	update($id,$name,$new);
}

?>