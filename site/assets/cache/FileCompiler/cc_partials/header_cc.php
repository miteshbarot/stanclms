<?php
	$root = $config->urls->root;
	$tpl = $config->urls->templates;
	$siteUrl = $pages->get(1)->httpUrl;

	if ($card == "") {
		$card = $pages->get("id=28235");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Standard Chartered Bank - Credit Card</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/override.css">
</head>
<body>

<?php if ($input->get->mode != "sales"): ?>
<header>
	<div class="bg_band"></div>
	<div class="uk-container uk-container-large">
		<nav class="uk-navbar-container p-logo uk-navbar-transparent" uk-navbar>
		    <div class="uk-navbar-left">
		        <a href="<?=$siteUrl?>"><img class="logo" src="<?=$tpl?>assets/images/logo.png"></a>
		    </div>
		    <div class="uk-navbar-right">
		        <h1 class="uk-margin-remove fs-22 fs-16-mobile ff-helvetica-bold uk-primary uk-text-right hidden_on_mobile"><span class="ff-helvetica">You are applying for</span>
				<br><?=$card->title?></h1>
		    	<img class="cc-header" src="<?=$card->image->url?>">
		    </div>
		</nav>
	</div>
</header>
<?php endif ?>