<?php
if (!isset($_GET['id']) || $_GET['id']=='') {
	header("location:index.php");
}
?>
<?php require "header.php";?>
<?php
$ob = new Query;
if (isset($_GET['id'])) {
	$result = $ob->getData('tbl_product', '', ['id' => $_GET['id']]);

	$result2 = $ob->selectJoin2('tbl_product', 'tbl_product_description', ['tbl_product' => '*', 'tbl_product_description' => '*'], ['tbl_product' => 'id', 'tbl_product_description' => 'prod_id'], 'AND', ['tbl_product.prod_parent_id', $_GET['id']]);
}
?>
<!---singleblog--->
<div class="content">
	<?php echo $result[0]['html']; ?>
	<div class="tab-prices">
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
					<li role.buy-button:hover{background: #E7663F;}="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						<div class="linux-prices">
							<?php if ($result2 != 0): ?>
								<?php foreach ($result2 as $key => $value): ?>
									<div class="col-md-3 linux-price">
										<div class="linux-top">
											<?php $desc = $value['description'];
											$desc_dec = json_decode($desc);
											?>
											<h4><?php echo $result[0]['prod_name'] . " " . $value['prod_name']; ?></h4>
										</div>
										<div class="linux-bottom">
											<h5>Rs.<?php echo $value['mon_price']; ?> <span class="month">per month</span></h5>
											<h6><?php echo $desc_dec->domain; ?> Domain</h6>
											<ul>
												<li><strong>Space </strong><?php echo $desc_dec->space; ?>GB</li>
												<li><strong>Bandwidth </strong><?php echo $desc_dec->bandwidth; ?>GB</li>
												<li><strong>Technology </strong><?php echo $desc_dec->techno; ?></li>
												<li><strong>Email Box </strong> <?php echo $desc_dec->mailbox; ?></li>
												<li><strong>location</strong> : <img src="images/india.png"></li>
											</ul>
										</div>
										<form action="ajax.php" method="POST" class="buy-button">
											<input type="hidden" value="<?php echo $value['prod_id']; ?>" name="id">
											<input type="hidden" value="<?php echo $_GET['id']; ?>" name="pageid">
											<input type="submit" class="buy"  value="Add Cart" name="submit">
										</form>
									</div>
								<?php endforeach;?>
								<?php else:echo "Sorry,No Record Found!!!";?>
								<?php endif;?>
								<div class="clearfix"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							<div class="linux-prices">
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Standard</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$259 <span class="month">per month</span></h5>
										<h6>Single Domain</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong>  Global CDN</li>
											<li><strong>High Performance</strong>  Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Advanced</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$359 <span class="month">per month</span></h5>
										<h6>2 Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong>  Global CDN</li>
											<li><strong>High Performance</strong>  Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Business</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$539 <span class="month">per month</span></h5>
										<h6>3 Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong>  Global CDN</li>
											<li><strong>High Performance</strong>  Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="col-md-3 linux-price">
									<div class="linux-top us-top">
										<h4>Pro</h4>
									</div>
									<div class="linux-bottom us-bottom">
										<h5>$639 <span class="month">per month</span></h5>
										<h6>Unlimited Domains</h6>
										<ul>
											<li><strong>Unlimited</strong> Disk Space</li>
											<li><strong>Unlimited</strong> Data Transfer</li>
											<li><strong>Unlimited</strong> Email Accounts</li>
											<li><strong>Includes </strong>  Global CDN</li>
											<li><strong>High Performance</strong>  Servers</li>
											<li><strong>location</strong> : <img src="images/us.png"></li>
										</ul>
									</div>
									<a href="#" class="us-button">buy now</a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- clients -->
		<div class="clients">
			<div class="container">
				<h3>Some of our satisfied clients include...</h3>
				<ul>
					<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
					<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
					<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
					<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
					<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
					<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
				</ul>
			</div>
		</div>
		<!-- clients -->
		<div class="whatdo">
			<div class="container">
				<h3>Linux Features</h3>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="what-grids">
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 what-grid">
						<div class="what-left">
							<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Expert Web Design</h4>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
	<?php require "footer.php";?>