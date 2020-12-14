<?php
require "./Verify/PHPMailer/PHPMailerAutoload.php";
require "./Verify/crediantial.php";
require "header.php";
?>
<!---login--->
<div class="content">
	<div class="main-1">
		<div class="container">
			<?php if ($msg != ""): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="text-center alert-message">
						<?php echo $msg; ?>
					</div>
				</div>
			<?php endif;?>
			<div class="container text-center alert alert-danger alert-dismissible" id="alert-div" role="alert">
			</div>
			<div class="login-page">
				<div class="account_grid">
					<div class="col-md-6 login-left">
						<h3>new customers</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="account.php">Create an Account</a>
					</div>

					<div class="col-md-6 login-right">
						<h3>registered</h3>
						<p>If you have an account with us, please log in.</p>
						<form name="form2" action="" method="POST" onsubmit="return validateForm2()">
							<div>
								<span>Email Address<label>*</label></span>
								<input type="text" placeholder="Enter Email" id="email" name="email">
							</div>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" placeholder="Enter Password" name="password">
							</div>
							<div> <input type="checkbox" id="check" name="check" value="check"> Remember Me</div>
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" name="login" value="Login">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- login -->
<?php require "footer.php";?>
