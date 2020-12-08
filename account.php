		<?php require "header.php"; ?>
		<!---login--->
		<div class="content">
			<?php if($msg!=""): ?>
			<div class="container text-center alert alert-danger alert-dismissible" role="alert"><?php echo $msg;$msg=""; ?>
			</div>
			<?php endif; ?>
			<div class="container text-center alert alert-danger alert-dismissible hide" id="alert-div" role="alert">
			</div>
			<!-- registration -->
			<div class="main-1">
				<div class="container">
					<div class="register">
						<form action="" method="POST" name="form1" onsubmit="return validateForm1()"> 
							<div class="register-top-grid">
								<h3>personal information</h3>
								<div>
									<span>Email Address<label>*</label></span>
									<input type="text" id="email" name="email"> 
								</div>
								<div>
									<span>Full Name<label>*</label></span>
									<input type="text" placeholder="Enter Name" id="name" name="name" onkeypress="return /[a-zA-Z\s]/i.test(event.key)"> 
								</div>
								<div>
									<span>Mobile<label>*</label></span>
									<input type="text" id="mobile" name="mobile" maxlength="10" onkeypress="return /[0-9]/i.test(event.key)"> 
								</div>
								<div class="clearfix"> </div>
								<a class="news-letter" href="#"></a>
							</div>
							<div class="register-bottom-grid">
								<h3>login information</h3>
								<div>
									<span>Password<label>*</label></span>
									<input type="password" id="password" name="password">
								</div>
								<div>
									<span>Confirm Password<label>*</label></span>
									<input type="password" id="cpassword" name="cpassword">
								</div>
								<div>
									<span>Security Question<label>*</label></span>
									<select class="form-control" name="select" id="select">
										<option>What was your childhood nickname?</option>
										<option>-What is the name of your favourite childhood friend?</option>
										<option>What was your favourite place to visit as a child?</option>
										<option>What was your dream job as a child?</option>
										<option>What is your favourite teacher's nickname?</option>
									</select>
								</div>
								<div>
									<span>Answer<label>*</label></span>
									<input id="sinput" name="sinput" type="text"> 
								</div>
							</div>
							<div class="clearfix"> </div>
							<div class="register-but">
								<input type="submit" name="register" value="submit">
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- registration -->

		</div>
		<!-- login -->
		<?php require "footer.php"; ?>