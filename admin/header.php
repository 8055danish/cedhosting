<?php session_start();?>
<?php if (!isset($_SESSION['alogin'])) {
	header("location:../");
	if(isset($_POST['ulogin'])){
		header("location:../");
	}
}
?>
<?php $current_file_name = basename($_SERVER['PHP_SELF']);?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<title>Admin Panel</title>
	<link href="css/app.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
					<img src="img/icons/icon-48x48.png" alt="image missing">&nbsp;<span class="align-middle">Admin Panel</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item <?php echo ($current_file_name == "index.php") ? "active" : " " ?>">
						<a class="sidebar-link" href="index.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo ($current_file_name == "createCategory.php" || $current_file_name == "addProduct.php" || $current_file_name == "viewProduct.php") ? "active" : " " ?>">
						<a href="#ui1" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="archive"></i> <span class="align-middle">Products</span>
						</a>
						<ul id="ui1" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
							<li class="sidebar-item <?php echo ($current_file_name == "createCategory.php") ? "active" : " " ?>"><a class="sidebar-link" href="createCategory.php">Create Category</a></li>
							<li class="sidebar-item <?php echo ($current_file_name == "addProduct.php") ? "active" : " " ?>"><a class="sidebar-link" href="addProduct.php">Add Product</a></li>
							<li class="sidebar-item <?php echo ($current_file_name == "viewProduct.php") ? "active" : " " ?>"><a class="sidebar-link" href="viewProduct.php">View Products</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.php">Create New Offers</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#ui2" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Orders</span>
						</a>
						<ul id="ui2" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.php">Pending Orders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Completed Orders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Cancelled Orders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Generate Invoice</a></li>

						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#ui3" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Services</span>
						</a>
						<ul id="ui3" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.php">Active Services</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Expired Sevices</a></li>

						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#ui4" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Users</span>
						</a>
						<ul id="ui4" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.php">All User List</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Create New User</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#ui5" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Blog</span>
						</a>
						<ul id="ui5" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.php">Add New Blog</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">View All Blogs</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#ui6" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Accounts</span>
						</a>
						<ul id="ui6" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.php">Update Company Info</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.php">Billing Address</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-general.php"> Change Security Ques</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.php">Change Password</a></li>
						</ul>
					</li>


					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
						</a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.php">Form Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.php">Basic Inputs</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="tables-bootstrap.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
						</a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.php">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
						</a>
					</li>
				</ul>


			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="form-inline d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<div class="input-group-append">
							<button class="btn" type="button">
								<i class="align-middle" data-feather="search"></i>
							</button>
						</div>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
								<!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />--> <span class="text-dark">Admin</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.php"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.php"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>