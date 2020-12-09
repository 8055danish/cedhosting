<?php
class user{
	function register($db,$email,$name,$mobile,$password,$select,$sinput){
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
        $query = "INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `password`, `security_question`, `security_answer`) VALUES ('".$email."','".$name."','".$mobile."','".md5($password)."','".$select."','".$sinput."')";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return "Registration Successful";   

	}

	function login($db,$email,$password){
		$password = md5($password);
		$user_check_query = "SELECT * FROM `tbl_user` WHERE `email` LIKE '%".$email."%' AND `password`='".$password."' LIMIT 1";
		$stmt = $db->prepare($user_check_query);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if(strcasecmp($user['email'],$email)=='0' and $user['password']==$password and $user['is_admin']=='1'){
			echo "admin";
			$_SESSION['alogin']='true';
			$_SESSION['aUser_id']= $user['id'];
			?><script>window.location.href="./admin";</script>
			<?php
		}
		if(strcasecmp($user['email'],$email)=='0' and $user['password']==$password and $user['email_approved']=='0' and $user['phone_approved']=='0') {
			

			$mail = new PHPMailer();
			$mail->isSMTP();
			//$mail->SMTPDebug = 2;                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'forzupee06@gmail.com'; // SMTP username
			$mail->Password = 'zupee@06'; // SMTP password
			$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; // TCP port to connect to

			$mail->setFrom('forzupee06@gmail.com', 'info');
			$mail->addAddress($email, $user['name']); // Add a recipient

			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$url = 'http://192.168.2.135/cedhosting/Verify/verify.php?id='.$user['id']; // Set email format to HTML
			
			$output = '<div>Thanks for registering.Please click this link to complete this registation <br>' . $url . '</div>';

			$mail->isHTML(true);

			$mail->Subject = 'Registeration confirmation';
			$mail->Body = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if (!$mail->send()) {
				return "Message could not be sent.";
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				return "Congratulation,Please verify your account link send to your gmail account.";
			
			}
		}
	
		else if(strcasecmp($user['email'],$email)=="0" and $user['password']==$password and $user['is_admin']=='0' and $user['email_approved']=='1' || $user['phone_approved']=='1') {
			if(isset($_POST['check'])){
				setcookie('email',$email,time()+60*60*7);
				setcookie('password',$password,time()+60*60*7);
			}
			$_SESSION['login'] = "true";
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
		
			?><script>window.location.href="./index.php";</script>
			<?php
		}
		
		else{
			return "Email or Password Incorrect";
		}
	}

}
?>