<?php require "header.php";?>
<div class="content">
	<div class="detailed-section">
		<div class="container">
			<h2>Cart</h2>
			<div class="detailed-grids">
				<?php if (isset($_SESSION['cart'])): ?>
				<?php foreach ($_SESSION['cart'] as $key => $value): ?>
				<?php $id = $value['id'];
				$result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product_description.prod_id', $id]);
				$result0 = $ob->getData('tbl_product',['prod_parent_id'],['id'=>$id]);
				$result1 = $ob->getData('tbl_product',['prod_name'],['id'=>$result0[0]['prod_parent_id']]);
				?>
				<div class="col-md-3 detailed-grid">
					<div class="detailed-top">
						<h4><?php echo $result1[0]['prod_name']."<br>".$result[0]['prod_name']; ?></h4>
					</div>
					<div class="detailed-bottom">
						<h5>Rs.<?php echo $result[0]['mon_price']; ?></h5>
						<ul>
							<?php $desc = $result[0]['description'];$desc_dec = json_decode($desc);?>
							<li><?php echo $desc_dec->space; ?> GB Space</li>
							<li><?php echo $desc_dec->bandwidth; ?> GB Bandwidth</li>
							<li><?php echo $desc_dec->mailbox; ?> Mailboxes</li>
							<li>1 Year Free Hosting</li>
							<li><?php echo $desc_dec->techno; ?></li>
						</ul>
						<input class="buy" type="submit" name="bcart" value="Buy now">
						<form action = "ajax.php" method="post">
							<input type="hidden" name="cartid" value=<?php echo $key; ?>>
							<input class="buy" type="submit" name="rCart" value="Remove cart">
						</form>
					</div>
				</div>
				<?php endforeach;?>
				<?php else:echo "No Record Found !!!";?>
				<?php endif;?>
			</div>
	    </div>
    </div>
</div>
<?php require "footer.php";?>