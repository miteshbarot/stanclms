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
<iframe src="https://www.sc.com/in/interact/Client/Intermediate?entryType=DEFAULT&mediumType=C&subjectId=DEFAULT" width="100%" style="height:100vh" frameborder="0"></iframe>	
</body>
</html>
