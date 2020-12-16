<?php
include "../class/query.php";
$ob = new Query;
$msg = '';
$classname = '';
$id = "";
$select1 = '';
$prod_name = '';
$html = '';
$select2 = '';
$btnvalue = "Add";
if (isset($_GET['action'])) {
	if ($_GET['action'] == 'edit') {
		$id = $_REQUEST['id'];
		$data = $ob->getData('tbl_product', '', ["id" => $id]);
		$select1 = $data[0]['id'];
		$id = $data[0]['id'];
		$prod_name = $data[0]['prod_name'];
		$html = $data[0]['html'];
		$select2 = $data[0]['prod_available'];
		$btnvalue = "Update";
	}
	if ($_GET['action'] == 'delete') {

		$ob->deleteData('tbl_product', ['id' => $_GET['id']]);
            $msg = "Product Deleted Succesfully";
            $classname = "success";
	} 

}
if (isset($_POST['Add'])) {
	$parent_id = $_POST['select1'];
	$prod_name = $_POST['prod_name'];
	$html = $_POST['html'];
	$available = $_POST['select2'];
	$ob = new Query;
	$u = $ob->getData('tbl_product', '', ['prod_name' => ucfirst($prod_name)]);
	if ($u) {
		$msg = "Product Already Exist";
		$classname = "danger";
	} else {
		$ob->insertData('tbl_product', ['prod_parent_id' => $parent_id, 'prod_name' => $prod_name, 'html' => $html, 'prod_available' => $available]);
            $msg = "Added Succesfully";
            $classname = "success";
            $select1 = '';
		$prod_name = '';
		$html = '';
		$select2 = '';
	}
}
if (isset($_POST['Update'])) {
	$parent_id = $_POST['select1'];
	$prod_name = trim($_POST['prod_name'], " ");
	$html = trim($_POST['html'], " ");
	$available = $_POST['select2'];
	$u = $ob->getData('tbl_product', '', ['prod_name' => ucfirst($prod_name)]);
	if ($u) {
		$msg = "Product Already Exist";
		$classname = "danger";
	} else {
		$result1 = $ob->updateData('tbl_product', ['prod_name' => $prod_name, 'html' => $html, 'prod_available' => $available], ['id' => $id]);
		$msg = "Product Updated Succesfully";
		$classname = "success";
		$btnvalue = "Add";
		$select1 = '';
		$prod_name = '';
		$html = '';
		$select2 = '';
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

      <h1 class="h3 mb-3">Create Category</h1>

      <div class="row">
            <div class="col-md-12">

                  <div class="card">
                        <div class="card-header">
                              <!-- <h5 class="card-title">Inline form</h5>-->
                              <h6 class="mt-1 card-subtitle text-muted">Add Categories</h6>
                        </div>
                        <div class="card-body">
                              <form action="" method="post" class="form-inline" onsubmit="return validateForm3();">
                                    <select name="select1" id="select1" class="custom-select mb-2 mr-2">
                                          <option value=''>--Main Category--</option>
                                          <option value="1" <?php echo ($select1 != '') ? 'selected' : '' ?>>Hosting</option>
                                    </select>
                                    <input type="text" name="prod_name" id="prod_name" placeholder="Enter Product Name" value="<?php echo $prod_name; ?>" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" >
                                    <input type="text" name="html" class="form-control mb-2 mr-sm-2" placeholder="Enter html Address" id="inlineFormInputName2" value="<?php echo $html; ?>" >
                                    <select name="select2" id="select2" class="custom-select mb-2">
                                          <option  value="">--Is Available--</option>
                                          <option value="1" <?php echo ($select2 == '1') ? 'selected' : '' ?>>Yes</option>
                                          <option value="0" <?php echo ($select2 == '0') ? 'selected' : '' ?>>No</option>
                                    </select>

                                    <button type="submit" name="<?php echo $btnvalue; ?>" class="btn btn-primary mb-2 ml-2"><?php echo $btnvalue; ?></button>
                              </form>
                        </div>
                  </div>
            </div>

            <div class="col-12 col-xl-12">
                  <div class="card">
                        <div class="card-header">
                              <!--  <h5 class="card-title">Categories Table</h5> -->
                              <!-- <h6 class="card-subtitle text-muted">Use contextual classes to color table rows or individual cells.</h6> -->
                        </div>
                        <table class="table table-responsive">
                              <thead>
                                    <tr>
                                          <th style="width:5%;">Id</th>
                                          <th style="width:30%">Product Name</th>
                                          <th style="width:35%">Product Available</th>
                                          <th class="d-none d-md-table-cell" style="width:30%">Date of Birth</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php $result = $ob->getData('tbl_product', '', ['prod_parent_id' => 1]);?>
                                    <?php $c = 0;if (count($result) > 0): ?>
                                    <?php foreach ($result as $key => $value): ?>
                                          <tr  class="table-success">
                                                <td><?php echo ++$c; ?></td>
                                                <td><?php echo $value['prod_name']; ?></td>
                                                <td><?php echo ($value['prod_available'] == '1') ? "Available" : "Not Avaible" ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $value['prod_launch_date']; ?></td>
                                                <td class="table-action">
                                                      <a href="createCategory.php?action=edit&id=<?php echo $value['id']; ?>"><i class="align-middle" data-feather="edit-2"></i></a>
                                                      <a href="createCategory.php?action=delete&id=<?php echo $value['id']; ?>"><i class="align-middle" data-feather="trash"></i></a>
                                                </td>
                                          </tr>
                                    <?php endforeach;?>
                                    <?php else:echo "<h3 class='text-center'>No Record Found !!!</h3>";?>
																																									                                    <?php endif;?>
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>

</div>
</main>

<?php require "footer.php";?>

</body>

</html>