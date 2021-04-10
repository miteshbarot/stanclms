<?php
$tpl = $config->urls->templates;
$root = $config->urls->root;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sales Portal - DOC Process</title>
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/style.css">
</head>
<body>
<div id="wrapper">
	<header id="top-head" class="uk-position-fixed uk-background-white">
		<div class="uk-container uk-container-large">
			<nav class="uk-navbar uk-dark" data-uk-navbar="mode:click; duration: 250">
				<div class="uk-navbar-left">
					<div class="uk-navbar-item">
						<a class="uk-logo" href="#"><img class="custom-logo" src="<?=$tpl?>assets/images/sc_logo.png" alt=""></a>
					</div>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav">
						<li><a href="#" data-uk-icon="icon:user" title="Your profile" data-uk-tooltip></a></li>
						<li><a href="#" data-uk-icon="icon: settings" title="Settings" data-uk-tooltip></a></li>
						<li><a href="#" data-uk-icon="icon:  sign-out" title="Sign Out" data-uk-tooltip></a></li>
						<li><a class="uk-navbar-toggle" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav" title="Offcanvas" data-uk-tooltip></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<div id="content">
		<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
			<div class="uk-panel">
				<h1 class="uk-h2 uk-margin-bottom uk-text-light">DOC Process</h1>
				<ul class="uk-tab uk-text-bold">
				    <li><a href="<?=$root?>sales-portal/">CALL Process</a></li>
					<li><a href="#">CALL Reject</a></li>
					<li class="uk-active"><a href="<?=$root?>sales-portal/doc-process/">DOC Process</a></li>
					<li><a href="#">DOC Reject</a></li>
					<li><a href="#">DIP Process</a></li>
					<li><a href="#">DIP reject</a></li>
					<li><a href="#">Dispatch</a></li>
					<li><a href="#">Search</a></li>
				</ul>

				<!-- <div class="uk-margin">
					<div class="uk-grid uk-child-width-auto uk-grid-match uk-flex-center uk-text-center">
						<div>
							<h3 class="uk-h2 uk-margin-remove uk-text-primary uk-text-lighter">177</h3>
							<h3 class="uk-h5 uk-text-green uk-margin-remove">My Apps (total)</h3>
						</div>
						<div>
							<h3 class="uk-h2 uk-margin-remove uk-text-primary uk-text-lighter">177</h3>
							<h3 class="uk-h5 uk-text-green uk-margin-remove">No Action Required</h3>
						</div>
						<div>
							<h3 class="uk-h2 uk-margin-remove uk-text-primary uk-text-lighter">177</h3>
							<h3 class="uk-h5 uk-text-green uk-margin-remove">Call (Today)</h3>
						</div>
						<div>
							<h3 class="uk-h2 uk-margin-remove uk-text-primary uk-text-lighter">177</h3>
							<h3 class="uk-h5 uk-text-green uk-margin-remove">New Apps</h3>
						</div>
						<div>
							<h3 class="uk-h2 uk-margin-remove uk-text-primary uk-text-lighter">177</h3>
							<h3 class="uk-h5 uk-text-green uk-margin-remove">Call Lapsed</h3>
						</div>
					</div>
				</div> -->
				<div class="uk-margin">
					<div class="uk-card uk-card-body uk-card-small uk-card-default">
						<div class="uk-flex uk-flex-middle uk-flex-between">
							<a href="#filtersForm" class="uk-display-block uk-width-expand" uk-toggle><h1 class="uk-h4 uk-text-blue uk-margin-remove">Filter Card Applications</h1></a>
							<a href="#filtersForm" class="uk-icon-link uk-margin-small-right" uk-icon="icon:chevron-down;ratio:1.5" uk-toggle></a>
						</div>
						<form action="./" method="get" id="filtersForm" class="uk-margin-top" hidden>
						<div class="uk-grid uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2">
							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">App Code</div>
									<input type="text" class="uk-input" tabindex="1" name="app-code" />
								</label>
							</div>

							<div class="uk-margin-small uk-margin-remove-top">
								<label>
									<div class="uk-margin-small-bottom">Select City</div>
									<select name="city" class="uk-select" tabindex="2">
										<option>All</option>
									</select>
								</label>
							</div>

							<div class="uk-margin-small uk-margin-remove-top">
								<label>
									<div class="uk-margin-small-bottom">Enter from Date <span class="uk-text-small uk-text-muted">(applied after)</span></div>
									<input type="text" class="uk-input" tabindex="3" name="from-date" />
								</label>
							</div>

							<div class="uk-margin-small uk-margin-remove-top">
								<label>
									<div class="uk-margin-small-bottom">Enter to Date <span class="uk-text-small uk-text-muted">(applied before)</span></div>
									<input type="text" class="uk-input" tabindex="4" name="to-date" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Select Credit Card</div>
									<select name="cc" class="uk-select" tabindex="5">
										<option>All</option>
									</select>
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">PAN <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
									<input type="text" class="uk-input" tabindex="6" name="pan" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Firstname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
									<input type="text" class="uk-input" tabindex="7" name="firstname" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Lastname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
									<input type="text" class="uk-input" tabindex="8" name="lastname" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Select Loan Status</div>
									<select name="loan-status" class="uk-select" tabindex="9">
										<option>All</option>
									</select>
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Mobile number</div>
									<input type="tel" class="uk-input" tabindex="10" name="mobile" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Email ID <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
									<input type="email" class="uk-input" tabindex="11" name="email" />
								</label>
							</div>

							<div class="uk-margin-small">
								<label>
									<div class="uk-margin-small-bottom">Select Lead Source</div>
									<select name="loan-status" class="uk-select" tabindex="12">
										<option>All</option>
									</select>
								</label>
							</div>

							<div class="uk-width-1-1 uk-text-center uk-margin">
								<input type="submit" class="uk-button uk-button-primary" value="Search" name="submit" />
								<?php if (!$user->hasRole('sales-executive')): ?>
									<a href="<?=$tpl?>assets/cc_export.xlsx" type="button" class="uk-button uk-button-secondary" download>Export</a>
								<?php endif ?>
							</div>
						</div>
						</form>
					</div>
				</div>
				<!-- Getting Leads -->
				<?php 
				$count = $pages->find("template=lead_template,product=2,docs_status=3|4|5")->count();
				$leads = $pages->find("template=lead_template,product=2,docs_status=3|4|5,sort=id,limit=10");
				$pagination = $leads->renderPager();
				?>
				<!-- End of getting leads -->
				<div class="list-wrap">
					<h4 class="uk-h5">Showing <?=count($leads)?> of <?=$count?></h4>
					<div class="uk-overflow-auto">
						<table class="uk-table uk-text-small uk-table-striped uk-table-hover uk-table-divider">
							<tr>
								<th style="width: 50px" class="uk-text-center">#</th>
								<th style="width: 100px">App. Entry</th>
								<th style="width: 50px">App Code / AIP No.</th>
								<th style="width: 100px">Name<br/>Contact</th>
								<th style="width: 60px">City</th>
								<th style="width: 100px">Credit Card</th>
								<th style="width: 100px">Applicant Type</th>
								<th style="width: 50px">Lock / Unlock</th>
								<th style="width: 100px">Status</th>
								<th style="width: 50px">Next Call Time</th>
								<th style="width: 50px">View</th>
							</tr>
							<!-- <tr>
								<td>6793777</td>
								<td>13-Jun 13:46<br/>(Mobile Form)<br/>(N)</td>
								<td></td>
								<td>
									<div>Vineet Sawant</div>
									<div>vineetsawant18@gmail.com</div>
									<div>9892579082 <span class="uk-badge badge-green" uk-icon="icon:check;ratio: 1"></span></div>
								</td>
								<td>Bangaluru</td>
								<td>Platinum Rewards</td>
								<td>
									<div>Salaried</div>
									<div>Monthly: 200,000</div>
								</td>
								<td><a href="#" class="uk-label uk-label-large uk-label-default uk-text-uppercase">Lock</a></td>
								<td><div>Pre: Mobile site partial entry</div></td>
								<td></td>
								<td><a href="#" title="View" class="uk-button uk-button-small uk-button-default" uk-tooltip>View</a></td>
							</tr>
							<tr>
								<td>6793777</td>
								<td>13-Jun 13:46<br/>(Mobile Form)<br/>(N)</td>
								<td></td>
								<td>
									<div>Vineet Sawant</div>
									<div>vineetsawant18@gmail.com</div>
									<div>9892579082 <span class="uk-badge" uk-icon="icon:close;ratio: 1"></span></div>
								</td>
								<td>Bangaluru</td>
								<td>Platinum Rewards</td>
								<td>
									<div>Salaried</div>
									<div>Monthly: 200,000</div>
								</td>
								<td><a href="#" class="uk-label uk-label-large uk-label-warning uk-text-uppercase">Unlock</a></td>
								<td><div>Pre: Mobile site partial entry</div></td>
								<td></td>
								<td><a href="#" title="View" class="uk-button uk-button-small uk-button-default" uk-tooltip>View</a></td>
							</tr> -->
							<?php foreach ($leads as $l): ?>
							<?php
							//find city
							$city = $pages->get("template=cc_location_master,title={$l->pincode}");
							?>
							<tr>
								<td><?=$l->unique_id?></td>
								<td>13-Jun 13:46<br/>(Mobile Form)<br/>(N)</td>
								<td></td>
								<td>
									<div><?=$l->fname." ".$l->lname?></div>
									<div><?=$l->email?></div>
									<div><?=$l->mobile?> 
										<?php if ($l->otp_status): ?>
											<span class="uk-badge badge-green" uk-icon="icon:check;ratio: 1"></span>
											<?php else: ?>
											<span class="uk-badge" uk-icon="icon:close;ratio: 1"></span>
										<?php endif ?>
									</div>
								</td>
								<td><?=$city->city?> <!--Pull from Master--></td>
								<td><?=$l->cc_product->title?> <!--Setup page reference field--></td>
								<td>
									<div><?=$l->employment_type?></div>
									<div>Monthly: <?=$l->monthly_income?></div>
								</td>
								<td><a href="#" class="uk-label uk-label-large uk-label-default uk-text-uppercase">Lock</a></td>
								<td><div>Pre: Mobile site partial entry</div></td>
								<td></td>
								<td><a target="_blank" href="<?=$root?>credit-card/application/?u=<?=$l->unique_id?>&mode=sales" title="View" class="uk-button uk-button-small uk-button-default" uk-tooltip>View</a></td>
							</tr>
							<?php endforeach ?>
						</table>
					</div><!-- overflow-auto -->

					<!-- <ul class="uk-pagination uk-margin-medium uk-flex-center" uk-margin>
					    <li><a href="#"><span uk-pagination-previous></span></a></li>
					    <li class="uk-active"><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li class="uk-disabled"><span>...</span></li>
					    <li><a href="#">8</a></li>
					    <li><a href="#"><span uk-pagination-next></span></a></li>
					</ul> -->
					<div class="uk-margin-medium uk-flex-center">
						<?=$pagination?>
					</div>
				</div><!-- list-wrap -->
			</div><!-- uk-section -->
		</div><!-- uk-container -->
		<footer class="uk-section uk-section-small uk-text-center">
			<hr>
			<div class="uk-container">
				<p class="uk-text-small uk-text-center">Copyright 2020.</p>
			</div>
		</footer>
	</div>
<!-- /CONTENT -->
</div><!-- wrapper -->

<!-- OFFCANVAS -->
<div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
	<div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
		<button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
		<ul class="uk-nav uk-nav-default">
			<li class="uk-active"><a href="#">Active</a></li>
			<li class="uk-parent">
				<a href="#">Parent</a>
				<ul class="uk-nav-sub">
					<li><a href="#">Sub item</a></li>
					<li><a href="#">Sub item</a></li>
				</ul>
			</li>
			<li class="uk-nav-header">Header</li>
			<li><a href="#js-options"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: table"></span> Item</a></li>
			<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: thumbnails"></span> Item</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: trash"></span> Item</a></li>
		</ul>
		<h3>Title</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
</div>
<!-- /OFFCANVAS -->

<!-- JS FILES -->
<script src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="<?=$tpl?>assets/js/chartScripts.js"></script> -->
</body>
</html>