<?php
include "../class/query.php";
$ob = new Query;
$msg = '';
$classname = '';
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	$classname = $_GET['c'];
}

if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action == 'delete') {
		$id = $_GET['id'];
		$result = $ob->deleteData('tbl_product', ['id' => $id]);
		if ($result) {
			$result2 = $ob->deleteData('tbl_product_description', ['prod_id' => $id]);
			if ($result2) {
				$msg = "Deleted Succesfully";
				$classname = "success";
			} else {
				$msg = "something went wrong";
				$classname = "danger";
			}
		} else {
			$msg = "something went wrong";
			$classname = "danger";
		}
	}
}
$product = $ob->selectJoin('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id']);
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
		<div class="col-12 col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Products List</h5>
					<!-- <h6 class="card-subtitle text-muted">Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.</h6> -->
				</div>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th style="width:10%;">Prod Parent Name</th>
							<th style="width:5%">Product Name</th>
							<th style="width:5%">Monthly price</th>
							<th style="width:5%">Annual Price</th>
							<th style="width:5%">SKU</th>
							<th style="width:3%">Web Space</th>
							<th style="width:3%">Bandwidth</th>
							<th style="width:10%">Domain Name</th>
							<th style="width:15%">Technology</th>
							<th style="width:10%">Mailbox</th>
							<th style="width:5%">Availability</th>
							<th class="d-none d-md-table-cell" style="width:10%">Launch Date</th>
							<th style="width:10%">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($product as $key => $value): ?>
							<tr>
								<td style="width:10%;"><?php $res1 = $ob->getData('tbl_product', ['prod_name'], ['id' => $value['prod_parent_id']]);
echo ($res1[0]['prod_name']);?></td>
								<td style="width:5%;"><?php echo $value['prod_name']; ?></td>
								<td style="width:5%;"><?php echo $value['mon_price']; ?></td>
								<td style="width:5%"><?php echo $value['annual_price']; ?></td>
								<td style="width:5%"><?php echo $value['sku']; ?></td>
								<?php $desc = $value['description'];
$desc_dec = json_decode($desc);?>
								<td style="width:3%"><?php echo $desc_dec->space; ?>GB</td>
								<td style="width:3%"><?php echo $desc_dec->bandwidth; ?>GB</td>
								<td style="width:5%"><?php echo $desc_dec->domain; ?></td>
								<td style="width:15%"><?php echo $desc_dec->techno; ?></td>
								<td style="width:10%"><?php echo $desc_dec->mailbox; ?></td>
								<td style="width:5%"><?php echo ($value['prod_available'] == 1) ? "Availabile" : "Not Availabile" ?></td>
								<td class="d-none d-md-table-cell" style="width:10%"><?php echo $value['prod_launch_date']; ?></th>
									<td class="table-action" style="width:10%">
										<a href="addProduct.php?action=edit&id=<?php echo $value['prod_id'] ?>"><i class="align-middle" data-feather="edit-2"></i></a>
										<a href="viewProduct.php?action=delete&id=<?php echo $value['prod_id'] ?>"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
	<?php require "footer.php";?>