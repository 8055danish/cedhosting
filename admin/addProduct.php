<?php
include "../class/query.php";
$ob = new Query;
$msg = '';
$classname = '';
$select = '';
$input1 = '';
$input2 = '';
$input3 = '';
$input4 = '';
$input5 = '';
$input6 = '';
$input7 = '';
$input8 = '';
$input9 = '';
$input10 = '';
$btnvalue = "Add Product";

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'edit') {
		$result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product.id', $_GET['id']]);
		$select = $result[0]['prod_parent_id'];
		$input1 = $result[0]['prod_name'];
		$input2 = $result[0]['html'];
		$input3 = $result[0]['mon_price'];
		$input4 = $result[0]['annual_price'];
		$input5 = $result[0]['sku'];
		$desc = $result[0]['description'];
		$desc_dec = json_decode($desc);
		$input6 = $desc_dec->space;
		$input7 = $desc_dec->bandwidth;
		$input8 = $desc_dec->domain;
		$input9 = $desc_dec->techno;
		$input10 = $desc_dec->mailbox;
		$btnvalue = "Update Product";
	}
}
if (isset($_POST['addProduct'])) {
	if (isset($_GET['action']) == 'edit') {
		if ($btnvalue == 'Update Product') {
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

			$desc = json_encode(array("space" => $input6, "bandwidth" => $input7, "domain" => $input8, "techno" => $input9, "mailbox" => $input10));

			$result = $ob->updateData('tbl_product', ['prod_parent_id' => $select, 'prod_name' => $input1, 'html' => $input2], ['id' => $_GET['id']]);

			$result2 = $ob->updateData('tbl_product_description', ['description' => $desc, 'mon_price' => $input3, 'annual_price' => $input4, 'sku' => $input5], ['prod_id' => $_GET['id']]);

			header("location:viewProduct.php?msg=Record Updated Successfully&c=success");

		}
	}
	if ($btnvalue == 'Add Product') {
		$select = $_POST['select'];
		$input1 = trim($_POST['input1'], " ");
		$u = $ob->getData('tbl_product', '', ['prod_parent_id' => $select, 'op' => 'AND', 'prod_name' => ucfirst($input1)]);
		if ($u) {
			$msg = "Product Already Exist";
			$classname = "danger";
		} else {
			$input2 = $_POST['input2'];
			$input3 = $_POST['input3'];
			$input4 = $_POST['input4'];
			$input5 = $_POST['input5'];
			$input6 = $_POST['input6'];
			$input7 = $_POST['input7'];
			$input8 = $_POST['input8'];
			$input9 = $_POST['input9'];
			$input10 = $_POST['input10'];

			$desc = json_encode(array("space" => $input6, "bandwidth" => $input7, "domain" => $input8, "techno" => $input9, "mailbox" => $input10));

			$result = $ob->insertData('tbl_product', ['prod_parent_id' => $select, 'prod_name' => $input1, 'html' => $input2]);

			if ($result) {
				$result1 = $ob->insertData('tbl_product_description', ['prod_id' => $result, 'description' => $desc, 'mon_price' => $input3, 'annual_price' => $input4, 'sku' => $input5]);
				if ($result1) {
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
				<form method="post" action="" id="prodForm">
					<div class="card">
						<div class="card-header">
							<h5 class="lead">Create New Product</h5>
							<h6 class="card-subtitle text-muted mt-1">Enter Product Details</h6>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="select">Select Product Category <span class="form-required">*</span></label>
									<select id="select2" name="select" class="form-control">
										<option value='' selected>Choose...</option>
										<?php $r = $ob->getData('tbl_product', ['id', 'prod_name'], ['prod_parent_id' => 1]);?>
										<?php foreach ($r as $key => $value): ?>
											<option value="<?php echo $value['id']; ?>" <?php echo ($select == $value['id']) ? 'selected' : '' ?>><?php echo $value['prod_name']; ?></option>
										<?php endforeach;?>
									</select>
									<span id="eb1"></span>
								</div>
								<div class="form-group col-md-4">
									<label for="input1">Enter Product Name <span class="form-required">*</span></label>
									<input type="text" name="input1" class="form-control" value="<?php echo $input1; ?>" id="input1" placeholder="Enter Product Name" >
									<span id="eb2"></span>
								</div>
								<div class="form-group col-md-4">
									<label for="input2">Page Url</label>
									<input type="text" name="input2" value="<?php echo $input2; ?>" class="form-control" id="input2" placeholder="Enter Page Url">
									<span id="eb3"></span>
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
									<input type="text" class="form-control" value="<?php echo $input3; ?>" id="input3" maxlength="15" name="input3" placeholder="Enter Monthly Price">
									<span id="eb4"></span>
								</div>
								<div class="form-group col-md-4">
									<label for="input4">Enter Annual Price <span class="form-required">*</span></label>
									<input type="text" maxlength="15" value="<?php echo $input4; ?>" class="form-control" id="input4" name="input4" placeholder="Enter Annual Price">
									<span id="eb5"></span>
								</div>
								<div class="form-group col-md-4">
									<label for="input5">SKU <span class="form-required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $input5; ?>" id="input5" name="input5" placeholder="Enter SKU">
									<span id="eb6"></span>
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
									<input type="text" class="form-control" value="<?php echo $input6; ?>" id="input6" name="input6" placeholder="Ex: 0.5 for 512 MB" maxlength="5">
									<span id="eb7"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="input7">Bandwidth(in GB) <span class="form-required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $input7; ?>" id="input7" name="input7" placeholder="Ex: .5 for 512" maxlength="5">
									<span id="eb8"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="input8">Free Domain <span class="form-required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $input8; ?>" id="input8" name="input8" placeholder="Enter 0 if no domain available in this services">
									<span id="eb9"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="input9">Language / Technology Support <span class="form-required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $input9; ?>" id="input9" name="input9" placeholder="Ex: PHP, MySQL, MongoDB">
									<span id="eb10"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="input10">Mailbox <span class="form-required">*</span></label>
									<input type="text" class="form-control" value="<?php echo $input10; ?>" id="input10" name="input10" placeholder="Enter Number of Mailbox,0 if none">
									<span id="eb11"></span>
								</div>
							</div>

						</div>
					</div>
					<button type="submit" id="button" name="addProduct" class="btn btn-primary disable"><?php echo $btnvalue; ?></button>
				</form>
			</div>
		</div>
	</div>
</main>
<?php require "footer.php";?>