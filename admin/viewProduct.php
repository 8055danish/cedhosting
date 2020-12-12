<?php
include "../class/query.php";
$ob = new Query;
$msg = '';
$product = $ob->selectJoin('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id']);
if (isset($_POST['updateProduct'])) {
	echo "Hello";
}
?>
<?php require "header.php";?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="col-12 col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Products List</h5>
					<!-- <h6 class="card-subtitle text-muted">Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.</h6> -->
				</div>
				<table class="table table-striped">
					<thead>
						<tr>

							<th style="width:10%;">Prod Parent Name</th>
							<th style="width:15%">Monthly Price</th>
							<th style="width:15%">Annual Price</th>
							<th style="width:15%">Desc</th>
							<th style="width:15%">Annual Price</th>
							<th style="width:15%">Desc</th>
							<th class="d-none d-md-table-cell" style="width:25%">Launch Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($product as $key => $value): ?>
							<tr>
								<th style="width:10%;"><?php ?></th>
							<th style="width:10%;"><?php echo $value['prod_name'] ?></th>
							<th style="width:15%">Monthly Price</th>
							<th style="width:15%">Annual Price</th>
							<th style="width:15%">Desc</th>
							<th style="width:15%">Annual Price</th>
							<th style="width:15%">Desc</th>
							<th class="d-none d-md-table-cell" style="width:25%">Launch Date</th>
								<td class="table-action">
									<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
									<a href="#"><i class="align-middle" data-feather="trash"></i></a>
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