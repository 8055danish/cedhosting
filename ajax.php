<?php 
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
if(isset($_POST['submit'])){
    $id = $_POST['id'];
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
    
    header("location:catpage.php?id={$_POST['pageid']}");

}
if(isset($_POST['rCart'])){
	$id = $_POST['cartid'];
	unset($_SESSION['cart'][$id]);
	header("location:cart.php");
}
?>