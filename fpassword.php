<?php require "header.php";?>
<?php
if (isset($_POST['fpassword'])) {
	$email = $_POST['email'];
	$result = $ob->getData('tbl_user', ['security_question', 'security_answer'], ['email' => $email]);
	if ($result) {

	}

}
?>
<div class="content">
	<div class="linux-section">
		<div class="container">

			<div class="text-center login-left">
				<h3>Forget Password</h3>
				<form name="form2" action="" method="POST" onsubmit="return validateForm2()">
					<div>
						<span>Email Address<label>*</label></span>
						<input type="text" placeholder="Enter Email" id="email" name="email">
					</div>
					<br>
					<input type="submit" name="fpassword" value="Forget Password">
				</form>

			</div>
		</div>
	</div>
</div>
<?php require "footer.php";?>