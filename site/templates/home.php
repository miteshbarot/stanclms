<?php
header("Location:https://apply.standardchartered.co.in/credit-card/");
exit();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PL &amp; CC Journeys</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
</head>
<body>
<div id="wrapper">
	<br/>
	<div class="uk-section">
		<div class="uk-container uk-text-center">
			<div class="uk-grid uk-flex uk-flex-middle uk-child-width-1-2">
				<div class="uk-margin uk-margin-remove-top">
					<h3 class="uk-h4 uk-text-center">Personal Loan</h3>
					<div class="uk-margin uk-flex uk-flex-center">
						<a href="<?=$config->urls->root?>personal-loan/pre-approved-offer/" target="_blank"><img src="<?=$config->urls->templates?>assets/images/PL.jpg" style="width: 300px; height: 250px"/></a>
					</div>
					<small class="uk-small">Click on ad banner to see targeted journey for Personal Loan</small>
					<br/><br/>
					<a href="<?=$config->urls->root?>personal-loan/" class="uk-button uk-button-primary uk-width-1-1" target="_blank">Click to see PL ETB/NTB Journey</a>
				</div>
				<div class="uk-margin uk-margin-remove-top">
					<h3 class="uk-h4 uk-text-center">Credit Card</h3>
					<div class="uk-margin uk-flex uk-flex-center">
						<a href="<?=$config->urls->root?>credit-card/pre-approved-offer/" target="_blank"><img src="<?=$config->urls->templates?>assets/images/CC.jpg" style="width: 300px; height: 250px"/></a>
					</div>
					<small class="uk-small">Click on ad banner to see targeted journey for Credit Card</small>
					<br/><br/>
					<a href="<?=$config->urls->root?>credit-card/" class="uk-button uk-button-primary uk-width-1-1" target="_blank">Click to see CC ETB/NTB Journey</a>
				</div>
				<div class="uk-margin">
					<hr class="uk-hr" />
					<h3 class="uk-h4 uk-text-center">NRI</h3>
					<a href="<?=$config->urls->root?>nri/" class="uk-button uk-button-primary uk-width-1-1" target="_blank">Click to see NRI</a>
				</div>
				<div class="uk-margin">
					<hr class="uk-hr" />
					<h3 class="uk-h4 uk-text-center">Business Banking</h3>
					<a href="<?=$config->urls->root?>business-banking/" class="uk-button uk-button-primary uk-width-1-1" target="_blank">Click to see Business Banking</a>
				</div>
			</div>
		</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
</body>
</html>