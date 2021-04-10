<?php
	$root = $config->urls->root;
	$tpl = $config->urls->templates;
	$siteUrl = $pages->get(1)->httpUrl;
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Apply for NRI Banking</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="<?=$tpl?>nri_partials/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=$tpl?>nri_partials/css/form.css">
	<link rel="stylesheet" href="<?=$tpl?>nri_partials/css/tab.css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
	<style type="text/css">
		.form-item,.thank_fs{
			display: none;
		}
		.form-item.active {
		    display: block;
		}
		.next-btn{
			right: -17px;
		    background: url(<?=$tpl?>nri_partials/images/next.png) 65px center no-repeat !important;
		    background-size: 15px auto !important;
		}
		.submit_nri_btn{
			cursor: pointer;
		}
	</style>
</head>

<body>