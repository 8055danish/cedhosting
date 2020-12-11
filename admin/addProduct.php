<?php
include "../class/user.php";
$ob = new Query;
$msg = '';
if (isset($_POST['addProduct'])) {
	$select = $_POST['select'];
	$input1 = $_POST['input1'];
	$input2 = $_POST['input2'];
	$input3 = $_POST['input3'];
	$input4 = $_POST['input4'];
	$input5 = $_POST['input5'];
	$input6 = $_POST['input6'];
	$input7 = $_POST['input7'];
	$input8 = $_POST['input8'];
	$input9 = $_POST['input9'];
	$input10 = $_POST['input10'];

	$desc = json_encode(array("space" => $input6, "bandwidth" => $input6, "domain" => $input7, "techno" => $input8, "mailbox" => $input9));

	$result = $ob->insertData('tbl_product', ['prod_parent_id' => $select, 'prod_name' => $input1, 'link' => $input2]);

	if ($result) {
		$result = $ob->insertData('tbl_product_description', ['prod_id' => $result, 'description' => $desc, 'mon_price' => $input3, 'annual_price' => $input4, 'sku' => $input5]);
		if ($result) {
			$msg = "Product Added Successfully";
			$classname = "success";
		} else {
			$ob->deleteData('tbl_product', ['id' => $result]);
			$msg = "Something went wrong";
			$classname = "danger";
		}
	} else {
		$msg = "Something went wrong";
		$classname = "danger";
	}

}
?>
<?php require "header.php";?>
<main class="content">
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
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Add New Product</h1>
		<!-- <h6 class="text-muted "></h6> -->
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="" onsubmit="return validateForm4()">
					<div class="card">
						<div class="card-header">
							<h5 class="lead">Create New Product</h5>
							<h6 class="card-subtitle text-muted mt-1">Enter Product Details</h6>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="select">Select Product Category <span class="form-required">*</span></label>
									<select id="select" name="select" class="form-control">
										<option value='' selected>Choose...</option>
										<?php $r = $ob->getData('tbl_product', ['id', 'prod_name'], ['prod_parent_id' => 1]);?>
										<?php foreach ($r as $key => $value): ?>
											<option value="<?php echo $value['id']; ?>"><?php echo $value['prod_name']; ?></option>
										<?php endforeach;?>


									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="input1">Enter Product Name <span class="form-required">*</span></label>
									<input type="text" name="input1" class="form-control" id="input1" placeholder="Enter Product Name">
								</div>
								<div class="form-group col-md-4">
									<label for="input2">Page Url <span class="form-required">*</span></label>
									<input type="text" name="input2" class="form-control" id="input2" placeholder="Enter Page Url">
								</div>
							</div>

						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h5 class="lead">Product Description</h5>
							<h6 class="card-subtitle text-muted mt-1">Enter Product Description Below</h6>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="input3">Enter Monthly Price <span class="form-required">*</span></label>
									<input type="text" class="form-control" id="input3" name="input3" placeholder="Enter Monthly Price" onkeypress="return /[0-9.]/i.test(event.key)">
								</div>
								<div class="form-group col-md-4">
									<label for="input4">Enter Annual Price <span class="form-required">*</span></label>
									<input type="text" class="form-control" id="input4" name="input4" placeholder="Enter Annual Price" onkeypress="return /[0-9.]/i.test(event.key)">
								</div>
								<div class="form-group col-md-4">
									<label for="input5">SKU <span class="form-required">*</span></label>
									<input type="text" class="form-control" id="input5" name="input5" placeholder="Enter SKU">
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h5 class="lead">Features</h5>
							<!-- <h6 class="card-subtitle text-muted">Enter Product Details</h6> -->
						</div>
						<div class="card-body">

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="input6">Web Space(in GB) <span class="form-required">*</span></label>
									<input type="text" class="form-control" id="input6" name="input6" placeholder="Ex: 0.5 for 512 MB" onkeypress="return /[0-9.]/i.test(event.key)">
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="input7">Bandwidth(in GB) <span class="form-required">*</span></label>
								<input type="text" class="form-control" id="input7" name="input7" placeholder="Ex: .5 for 512" onkeypress="return /[0-9.]/i.test(event.key)">
							</div>
							<div class="form-group col-md-6">
								<label for="input8">Free Domain <span class="form-required">*</span></label>
								<input type="text" class="form-control" id="input8" name="input8" placeholder="Enter 0 if no domain available in this services">
							</div>
							<div class="form-group col-md-6">
								<label for="input9">Language / Technology Support <span class="form-required">*</span></label>
								<input type="text" class="form-control" id="input9" name="input9" placeholder="Ex: PHP, MySQL, MongoDB">
							</div>
							<div class="form-group col-md-6">
								<label for="input10">Mailbox <span class="form-required">*</span></label>
								<input type="text" class="form-control" id="input10" name="input10" placeholder="Enter Number of Mailbox,0 if none" onkeypress="return /[0-9]/i.test(event.key)">
							</div>
						</div>

					</div>
				</div>
				<button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
			</form>
		</div>
	</div>
</div>
</main>
<?php require "footer.php";?>