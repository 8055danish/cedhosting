<?php require "header.php";?>
<div class="content">
	<div class="detailed-section">
		<div class="container">
			<h2>Cart</h2>
			<div class="detailed-grids">
				<table id="table_id" class="table table-responsive">
					<thead>
						<th>ID</th>
						<th>Product Name</th>
						<th>Product Category</th>
						<th>SKU</th>
						<th>Billing Cycling</th>
						<th>Amount</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php if (isset($_SESSION['cart'])): ?>
						<?php foreach ($_SESSION['cart'] as $key => $value): ?>
						<?php $id = $value['id'];
						$result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product_description.prod_id', $id]);
						$result0 = $ob->getData('tbl_product',['prod_parent_id'],['id'=>$id]);
						$result1 = $ob->getData('tbl_product',['prod_name'],['id'=>$result0[0]['prod_parent_id']]);
						?>
						<tr>
							<th><?php echo $value['id']; ?></th>
							<th><?php echo $result[0]['prod_name'];?></th>
							<th><?php echo $result1[0]['prod_name'].$result[0]['prod_name'];?></th>
							<th><?php echo $result[0]['sku'];?></th>
							<th></th>
							<th><?php echo $result[0]['mon_price']; ?></th>
							<th>
								<form action = "ajax.php" method="post">
									<input type="hidden" name="cartid" value=<?php echo $key; ?>>
									<input type="submit" name="rCart" value="Remove cart">
								</form>
							</th>
						</tr>
						<?php endforeach;?>
						<?php else:echo "No Record Found !!!";?>
						<?php endif;?>
					</tbody>
				</table>
		    </div>
	    </div>
   </div>
</div>
<?php require "footer.php";?>