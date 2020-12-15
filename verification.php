<?php
require "./Verify/PHPMailer/PHPMailerAutoload.php";
require "./Verify/crediantial.php";
require "header.php";
$msg = '';
$classname = '';
$id = '';
$result = $ob->getData('tbl_user', '', ['id' => $_SESSION['user_id']]);
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	$classname = "danger";
}

if (isset($_POST['submite'])) {
	$email = $result[0]['email'];
	$msg = $ob->emailverification($email, $result[0]['name'], $result[0]['id']);
	$msg = "Email verification successfully";
	$classname = "success";
}
if (isset($_POST['submitp'])) {
	$otp = rand(1000, 9999);
	$_SESSION['otp'] = $otp;
	$fields = array(
		"sender_id" => "FSTSMS",
		"message" => 'Your Otp is' . $otp,
		"language" => "english",
		"route" => "p",
		"numbers" => $result[0]['mobile'],
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($fields),
		CURLOPT_HTTPHEADER => array(
			"authorization:ANtypfOqFEGoDVMu6ITnZYlg5m8jS32PHebkzicvBCJXRWrxUhKucahOSRwCH7UsFxdGyrftL3vJYN8e",
			"accept: */*",
			"cache-control: no-cache",
			"content-type: application/json",
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$msg = "Something Went Wrong";
		$classname = "danger";
	} else {
		$msg = "Please Enter OTP";
		$classname = "success";
	}
}
if (isset($_POST['submito'])) {
	$otp = $_POST['otp'];
	if ($otp != $_SESSION['otp']) {
		$msg = "Something Went Wrong";
		$classname = "danger";
	} else {
		$ob->updateData('tbl_user', ['phone_approved' => '1'], ['id' => $_SESSION['user_id']]);
		$msg = "Phone Number Verified successfully";
		$classname = "success";
	}

}
?>
<!---login--->
<div class="content">
	<div class="main-1">
		<div class="container">
			<?php if ($msg != ""): ?>
				<div class="alert alert-<?php echo $classname; ?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="text-center alert-message">
						<?php echo $msg; ?>
					</div>
				</div>
			<?php endif;?>
			<div class="container row " style="margin-top:40px;margin-bottom:40px;">
				<div class="col-md-6 login-right">
					<h3>Email Verification</h3>
					<form action="verification.php" method="POST">
						<div>
							<span>Email Address<label>*</label></span>
							<input type="text" placeholder="Enter Email" id="email" name="email" value="<?php echo $result[0]['email']; ?>" disabled>
						</div>
						<div>
							<?php if ($result[0]['email_approved'] == '0'): ?>
								<input type="submit" name="submite" value="Email Verify">
								<?php else:echo "<input type='submit' style='background-color:green'; value='Verified' disabled>";?>																											<?php endif;?>
							</div>
						</form>
					</div>

					<div class="col-md-6 login-right">
						<h3>Phone Verification</h3>
						<form action="verification.php" method="POST">
							<div>
								<span>Phone Number<label>*</label></span>
								<input type="text" placeholder="Enter phone Number" id="mobile" name="mobile" value="<?php echo $result[0]['mobile']; ?>" disabled>
							</div>
							<div>
								<?php if ($result[0]['phone_approved'] == '0'): ?>

								<input type="submit" name="submitp" value="Send OTP">
								<br><br>
								</form action="verification.php" method="post">
								<input type="text" name="otp" placeholder="Please Enter Otp"><br><br><input type=submit name="submito">
							</form>
							<?php else:echo "<input type='submit' style='background-color:green'; value='Verified'>";?>
																															<?php endif;?>
						</div>


					</div>

					<div class="clearfix"> </div>
				</div>

			</div>
		</div>
	</div>
	<!-- login -->
	<?php require "footer.php";?>
