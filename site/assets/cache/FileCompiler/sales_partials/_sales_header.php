<?php
$tpl = $config->urls->templates;
$root = $config->urls->root;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sales Portal - <?=$page->title?></title>
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/style.css">
	<script src="https://code.jquery.com/jquery.min.js"></script>
</head>
<body>
<div id="wrapper">
<?php if ($input->get->view == 'iframe'): ?>
	<div id="content" class="uk-margin-remove">
<?php else: ?>
	<header id="top-head" class="uk-width-1-1 uk-position-fixed uk-background-white">
		<div class="uk-container uk-container-large">
			<nav class="uk-navbar uk-dark" data-uk-navbar="mode:click; duration: 250">
				<div class="uk-navbar-left">
					<div class="uk-navbar-item">
						<a class="uk-logo" href="<?=$root?>sales-portal/"><img class="custom-logo" src="<?=$tpl?>assets/images/sc_logo.png" alt=""></a>
					</div>
					<div class="uk-navbar-item">
						<!-- <ul class="uk-navbar-nav">
							<li><a href="<?=$pages->get("id=25925")->url?>" title="Reports Dashboard">Reports Dashboard</a></li>
							<li><a href="<?=$pages->get("id=25925")->url?>credit-card/" title="Credit Card">Credit Card</a></li>
							<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/" title="Personal Loan">Personal Loan</a></li>
							<li><a href="<?=$pages->get("id=25925")->url?>nri/" title="NRI Banking">NRI Banking</a></li>
							<li><a href="<?=$pages->get("id=25925")->url?>business-banking/" title="Business Banking">Business Banking</a></li>
						</ul> -->
					</div>
				</div>
				<div class="uk-navbar-right">
					<form class="uk-search uk-search-default uk-grid uk-grid-collapse uk-margin-small-right" method="get" action="<?=$root?>sales-portal/search/" style="min-width: 350px;padding:3px">
				        <div class="uk-width-expand uk-position-relative uk-margin-small-right">
					        <input class="uk-search-input" type="search" placeholder="Search..." name="q" style="padding-right: 100px" value="<?=$input->get->q?>" />
					        <select name="c" class="uk-select uk-position-center-right" style="width: 90px;border: none; height: 30px;margin-right: 5px;font-size: 13px;background-color: #f6f6f6">
					        	<option>Category</option>
					        	<option value="unique_id">App Code</option>
					        	<option value="mobile">Mobile Number</option>
					        	<option value="email">Email</option>
					        	<option value="fname">First name</option>
					        	<option value="lname">Last name</option>
					        </select>
				        </div>
				        <div class="uk-width-auto">
				        	<button type="submit" class="uk-icon-button uk-button-primary" uk-icon="search"></button>	
				        </div>
				    </form>
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
<?php endif ?>