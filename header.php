<?php session_start();?>
<?php if (isset($_SESSION['alogin'])) {
	header("location:logout.php");
}
?>
<?php
$current_file_name = basename($_SERVER['PHP_SELF']);
include "class/query.php";
$ob = new Query;
$msg = '';
$classname = '';
if (isset($_POST['login'])) {
	$email = trim($_POST['email'], " ");
	$password = $_POST['password'];
	$user = $ob->getData('tbl_user', '', ['email' => $email, 'op' => 'AND', 'password' => md5($password)]);
	if ($user[0]['is_admin'] == '1') {
		$_SESSION['alogin'] = 'true';
		header("location:admin/index.php");
	} else if ($user[0]['email_approved'] == '1' || $user[0]['phone_approved'] == '1') {
		$_SESSION['ulogin'] = 'true';
		$_SESSION['name'] = $user[0]['name'];
		header("location:index.php");
	} else if ($user[0]['email_approved'] == '0') {
		$msg = "Please Verify Your Account";
		$_SESSION['user_id'] = $user[0]['id'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("location:verification.php?&msg=Please Verify Your Account");

	} else {
		$msg = "Incorrect Email/Password";
	}
}
if (isset($_POST['register'])) {
	$email = trim($_POST['email'], " ");
	$name = trim($_POST['name'], " ");
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$select = $_POST['select'];
	$sinput = trim($_POST['sinput'], " ");
	$user = $ob->getData('tbl_user', '', ['email' => $email]);

	if ($user != 0) {
		// if user exists
		if (strcasecmp($user[0]['email'], $email) == "0") {
			$msg = "Email already exists";
			$classname = "danger";
		}

	} else {
		$ob->insertData('tbl_user', ['email' => $email, 'name' => $name, 'mobile' => $mobile, 'password' => md5($password), 'security_question' => $select, 'security_answer' => $sinput]);
		$msg = "Registration Successful";
		$classname = "success";
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ced Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<!---fonts-->
	<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!---fonts-->
	<!--script-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
	<script src="js/myjsfunction.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/mycss.css" type="text/css" media="screen">
	<!--lightboxfiles-->
	<!-- <script type="text/javascript">
		$(function() {
			$('.team a').Chocolat();
		});
	</script>	 -->
	<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
	<!-- <script type="text/javascript">
		$(function() {

			$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

		});
	</script> -->
	<!--script-->
</head>
<body>
	<!---header--->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<i class="sr-only">Toggle navigation</i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</button>
						<div class="navbar-brand">
							<h2><a href="index.php"><span class="navbar-brand-left"><strong>Ced</strong><img style="height:50px;" src="images/globe.png"></span></h1><h2><span class="navbar-brand-right"><strong>Hosting</strong></span></a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="<?php echo ($current_file_name == "index.php") ? "active" : " " ?>"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
							<li class="<?php echo ($current_file_name == "about.php") ? "active" : " " ?>"><a href="about.php">About</a></li>
							<li class="<?php echo ($current_file_name == "services.php") ? "active" : " " ?>"><a href="services.php">Services</a></li>
							<li class="<?php echo ($current_file_name == "catpage.php") ? "active" : " " ?> dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<?php $products = $ob->getData('tbl_product', ['id', 'prod_name', 'html'], ['prod_parent_id' => 1]);?>
									<?php foreach ($products as $key => $value): ?>
										<?php $html = $value['html'];?>
										<li class=""><a href="catpage.php?id=<?php echo $value['id']; ?>"><?php echo $value['prod_name']; ?></a></li>
									<?php endforeach;?>
								</ul>
							</li>
							<li class="<?php echo ($current_file_name == "pricing.php") ? "active" : " " ?>"><a href="pricing.php">Pricing</a></li>
							<li class="<?php echo ($current_file_name == "blog.php") ? "active" : " " ?>"><a href="blog.php">Blog</a></li>
							<li class="<?php echo ($current_file_name == "contact.php") ? "active" : " " ?>"><a href="contact.php">Contact</a></li>
							<li class="<?php echo ($current_file_name == "cart.php") ? "active" : " " ?>"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge"><?php echo (!isset($_SESSION['cart'])) ? "0" : count($_SESSION['cart']); ?></span></a></li>
							<?php if (!isset($_SESSION['ulogin'])): ?><li class="<?php echo ($current_file_name == "login.php") ? "active" : " " ?>"><a href="login.php">Login/Register</a></li><?php endif;?>
							<?php if (isset($_SESSION['ulogin'])): ?><li><a href="logout.php">Logout</a></li><?php endif;?>
						</ul>

					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<!---header--->