
<?php require "header.php";?>
<?php
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
if (isset($_SESSION['cart'])) {
	
	// $result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product_description.prod_id', $_GET['id']]);
	// $desc = $result[0]['description'];
	// $desc_dec = json_decode($desc);
	// $space = $desc_dec->space;
	// $bandwidth = $desc_dec->bandwidth;
	// $domain = $desc_dec->domain;
	// $technology = $desc_dec->techno;
	// $mailbox = $desc_dec->mailbox;

}
?>
<div class="content">
	<div class="detailed-section">
		<div class="container">
			<h2>Cart</h2>
			<div class="detailed-grids">
				<?php foreach($_SESSION['cart'] as $key=>$value):?>
				<?php $id = $value['id'];
				$result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product_description.prod_id', $id]);
				?>	
				<div class="col-md-3 detailed-grid">
					<div class="detailed-top">
						<h4><?php echo $result[0]['prod_name']; ?></h4>
					</div>
					<div class="detailed-bottom">
						<h5>Rs.<?php echo $result[0]['mon_price']; ?></h5>
						<ul>
						<?php $desc = $result[0]['description'];$desc_dec = json_decode($desc); ?>
						<li><?php echo $desc_dec->space;?> GB Space</li>
						<li><?php echo $desc_dec->bandwidth;?> GB Bandwidth</li>
						<li><?php echo $desc_dec->mailbox;?> Mailboxes</li>
						<li>1 Year Free Hosting</li>
						<li><?php echo $desc_dec->techno;?></li>
						</ul>
						<input class="buy" type="submit" name="bcart" value="Buy now">
						<form action = "ajax.php" method="post">
							<input type="hidden" name="cartid" value=<?php echo $key; ?>>
							<input class="buy" type="submit" name="rCart" value="Remove cart">
						</form>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
	    </div>
    </div>
</div>
<?php require "footer.php";?>