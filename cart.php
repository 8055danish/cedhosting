
<?php require "header.php";?>
<?php
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	// $result = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product_description.prod_id', $_GET['id']]);
	// $desc = $result[0]['description'];
	// $desc_dec = json_decode($desc);
	// $space = $desc_dec->space;
	// $bandwidth = $desc_dec->bandwidth;
	// $domain = $desc_dec->domain;
	// $technology = $desc_dec->techno;
	// $mailbox = $desc_dec->mailbox;
	$flag = false;
	if (count($_SESSION['cart']) == 0) {
		array_push($_SESSION['cart'], array('id' => $id, 'count' => 1));
	}
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($value['id'] == $id) {
			$_SESSION['cart'][$key]['count'] += 1;
			$flag = true;
		}
	}
	if ($flag == false) {
		array_push($_SESSION['cart'], array('id' => $id, 'count' => 1));
		$flag = true;
	}
}
?>
<div class="content">
	<div class="detailed-section">
		<div class="container">
			<h2>Cart</h2>
			<?php $c = 0;foreach ($_SESSION['cart'] as $key => $value): ?>
          <h3>(Service <?php echo $c++; ?>)ID:<?php print_r($_SESSION['cart'][$key]['id']);?>
          Count:<?php print_r($_SESSION['cart'][$key]['count']);?><br></h3>
			<?php endforeach?>
		</div>
	</div>
</div>
<?php require "footer.php";?>