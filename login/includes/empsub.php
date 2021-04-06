<?php

$id = $_POST['id'];
$name = $_POST['column-name'];
$new = $_POST['new'];

function update($id,$name,$new){
	require 'conn.php';
echo " hello1";
   $stmt = $conn->prepare("insert into approve (id,name,new) values (?,?,?)");
   if(!$stmt){
   	header("Location: ../emppage.php?error=server1");
   	exit();
   }

   $stmt->bind_param("sss",$id,$name,$new);
   $stmt->execute();
   if($stmt->affected_rows > 0)
   {
   	header("Location: ../emppage.php?mess=submittedsuccessfully");
   	exit();
   }

}


if(empty($id)||empty($name)||empty($new)){
  header("Location: ../emppage.php?error=emptyfields");
  exit();
}
elseif ($name == "firstname") {
	if(!preg_match("/^[a-zA-Z ]*$/",$new)){
      header("Location: ../emppage.php?error=invalidfname");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "lastname") {
	if(!preg_match("/^[a-zA-Z ]*$/",$new)){
      header("Location: ../emppage.php?error=invalidlname");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "email") {
	if(!filter_var($new,FILTER_VALIDATE_EMAIL)){
      header("Location: ../emppage.php?error=invalidemail");
   	  exit();
   }else{
     update($id,$name,$new);
   }
}
elseif ($name == "phoneno") {
	if (!preg_match("/^[0-9 ]*$/",$new)) {
   	header("Location: ../emppage.php?error=invalidphno");
   	exit();
   }else{
    update($id,$name,$new);
   }
}
elseif ($name == "Age") {
	if (!preg_match("/^[0-9 ]*$/",$new)) {
   	header("Location: ../emppage.php?error=invalidage");
   	exit();
   }else{
		 echo " hello";
    update($id,$name,$new);
   }
}
elseif ($name == "dob") {
	update($id,$name,$new);
}
