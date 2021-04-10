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
	<div class="uk-section">
		<div class="uk-container">
			<h1><?php echo $page->title; ?> Export for EDM</h1>
			<a class="uk-button uk-button-default" href="<?=$tpl?>assets/offers.xlsx" download>Download</a>			
		</div>
	</div>
</body>
</html>
