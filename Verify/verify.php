<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<title></title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php
include "../class/query.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$ob = new Query();
	$result = $ob->updateData('tbl_user', ['email_approved' => '1'], ['id' => $id]);
	if ($result) {
		?>
			<script>swal("verification successful.")
			.then((value) => {
				location.href="../login.php";
			});</script>

		<?php
}}
?>
	</body>
	</html>