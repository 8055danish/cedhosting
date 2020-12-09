<?php 
include "../class/user.php";
include "../class/dbcon.php";
$database = new Database();
$db = $database->getConnection();

//if(isset($_POST['login'])){
	
	$id = $_GET['id'];

	$query = "UPDATE `tbl_user` SET `email_approved`='1',`active` = '1' WHERE id = '".$id."'";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($stmt) {
		echo "verification successful. you can log in now<br><a href='../login.php'>Click to index</a>";
	}else{
		echo "verification failed";
	}

//}

?>