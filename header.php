<?php session_start(); ?>
<?php
include "class/user.php";
$msg="";
if(isset($_POST['register'])){
	$email = $_POST['email'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$select = $_POST['select'];
	$sinput = $_POST['sinput'];

	$user = new user();
	$msg = $user->register($email,$name,$mobile,$password,$select,$sinput);

}
if(isset($_POST['login'])){
  $username = trim($_POST['email']," ");
  $password = $_POST['password'];
  $User = new user();
  $msg = $User->login($username,$password);
  echo $msg;
}

 ?>
<?php $current_file_name = basename($_SERVER['PHP_SELF']);?>
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
							<h1><a href="index.php"><span class="navbar-brand-left">Ced</span>&nbsp;<span class="navbar-brand-right"><span>Hosting</span></a></h1>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="<?php echo ($current_file_name=="index.php")? "active":" " ?>"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
							<li class="<?php echo ($current_file_name=="about.php")? "active":" " ?>"><a href="about.php">About</a></li>
							<li class="<?php echo ($current_file_name=="services.php")? "active":" " ?>"><a href="services.php">Services</a></li>
							<li class="<?php echo ($current_file_name=="linuxhosting.php"||$current_file_name=="wordpresshosting.php"||$current_file_name=="windowshosting.php"||$current_file_name=="cmshosting.php")? "active":" " ?> dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li class="<?php echo ($current_file_name=="linuxhosting.php")? "active":" " ?>"><a href="linuxhosting.php">Linux hosting</a></li>
									<li class="<?php echo ($current_file_name=="wordpresshosting.php")? "active":" " ?>"><a href="wordpresshosting.php">WordPress Hosting</a></li>
									<li class="<?php echo ($current_file_name=="windowshosting.php")? "active":" " ?>"><a href="windowshosting.php">Windows Hosting</a></li>
									<li class="<?php echo ($current_file_name=="cmshosting.php")? "active":" " ?>"><a href="cmshosting.php">CMS Hosting</a></li>
								</ul>			
							</li>
							<li class="<?php echo ($current_file_name=="pricing.php")? "active":" " ?>"><a href="pricing.php">Pricing</a></li>
							<li class="<?php echo ($current_file_name=="blog.php")? "active":" " ?>"><a href="blog.php">Blog</a></li>
							<li class="<?php echo ($current_file_name=="contact.php")? "active":" " ?>"><a href="contact.php">Contact</a></li>
							<li class="<?php echo ($current_file_name=="codes.php")? "active":" " ?>"><a href="codes.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
							<li class="<?php echo ($current_file_name=="login.php")? "active":" " ?>"><a href="login.php">Login</a></li>
						</ul>

					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<!---header--->