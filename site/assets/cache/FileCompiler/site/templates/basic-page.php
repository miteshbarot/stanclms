<?php
	$root = $config->urls->root;
	$tpl = $config->urls->templates;
	$siteUrl = $pages->get(1)->httpUrl;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Standard Chartered Bank - <?=$page->title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/override.css">
	<link rel="stylesheet" href="<?=$tpl?>assets/css/jquery-ui.min.css">
</head>
<body>
<header>
	<div class="bg_band"></div>
	<div class="uk-container uk-container-large">
		<nav class="uk-navbar uk-navbar-container p-logo uk-navbar-transparent" uk-navbar>
		    <div class="uk-navbar-left">
		        <a href="<?=$siteUrl?>"><img class="logo" src="<?=$tpl?>assets/images/logo.png"></a>
		    </div>
		    <div class="uk-navbar-right">
		        <h1 class="uk-margin-remove fs-22 fs-16-mobile ff-helvetica-bold uk-primary uk-text-right"><span class="ff-helvetica"><?=$page->parent->title?></span><br/><?=$page->title?></h1>
		    </div>
		</nav>
	</div>
</header>

<div class="uk-section">
	<div class="uk-container">
		<h1><?=$page->title?></h1>
		<div class="page-content">
			<?=$page->desc?>
		</div>
	</div>
</div>

<footer>
	<div class="uk-background-3D uk-text-center fs-14 uk-text-white uk-padding-small">
		&copy; 2020. Standard Chartered Bank. All Rights Reserved.
	</div>
</footer>

<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
</body>
</html>