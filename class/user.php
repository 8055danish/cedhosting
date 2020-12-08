<?php
class user{
	function register($email,$name,$mobile,$password,$select,$sinput){
		include "dbcon.php";
		$database = new Database();
		$db = $database->getConnection();
		$user_check_query = "SELECT `email`,`mobile` FROM `tbl_user` WHERE email LIKE '%".$email."%' OR mobile='".$mobile."' LIMIT 1";
		$stmt = $db->prepare($user_check_query);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) { // if user exists
        	if (strcasecmp($user['email'],$email)=="0") {
        		return "Email already exists";
        	}
        	if ($user['mobile']==$mobile) {
        		return "Mobile number already exist";
        	}
        }
        $query = "INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `password`, `security_question`, `security_answer`) VALUES ('".$email."','".$name."','".$mobile."','".$password."','".$select."','".$sinput."')";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return "Registration Successful";   

	}

	function login($email,$password){
		include "dbcon.php";
		$database = new Database();
		$db = $database->getConnection();
		$user_check_query = "SELECT * FROM `tbl_user` WHERE `email` LIKE '%".$email."%' AND `password`='".$password."' LIMIT 1";
		$stmt = $db->prepare($user_check_query);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if(strcasecmp($user['email'],$email)=='0' and $user['password']==$password and $user['email_approved']=='0' and $user['phone_approved']=='0') {
			return "Email & Phone Number is not verified yet";
		}

		else if(strcasecmp($user['email'],$email)=="0" and $user['password']==$password and $user['email_approved']=='1' || $user['phone_approved']=='1') {
			if(isset($_POST['check'])){
				setcookie('email',$user_name,time()+60*60*7);
				setcookie('password',$password,time()+60*60*7);
			}
			$_SESSION['login'] = "true";
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			header("location:index.php");
		}
		
		else{
			return "Email or Password Incorrect";
		}
	}

}
?>