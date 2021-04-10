<?php namespace ProcessWire;

/* Handle the POST request */
if ($input->post->unique_id) {
	//echo "<pre>";
	//print_r($_POST);
	$updatePage = $pages->get("id={$input->post->id}");
	if ($input->post->submit_card) {
		//do nothing
	}
	if ($input->post->submit_other_card) {
		//update page
		if ($updatePage) {
			$updatePage->of(false);
			$updatePage->cc_product = $pages->get("id={$input->post->other_card}");
			$updatePage->save();
		}
	}
	//echo "</pre>";
	$session->redirect($config->urls->root."credit-card/application/?u=".$input->post->unique_id);
}

if(isset($_GET['u'])){
	$unique_id = $_GET['u'];
	$p = $pages->get("unique_id=$unique_id");
	$card = $p->cc_product;
	if($p->id == 0){
		$session->redirect($config->urls->root.'credit-card/');
	}
}else{
	$session->redirect($config->urls->root.'credit-card/');
}
$employment_type = $p->employment_type;


//Check pincode

//Cards master = 25928
//Ultimate = 28229
//DigiSmart = 28231
//Manhatten = 28233
//Super Value Titanium = 28235
//Emirates = 28237
//Platinum Rewards = 28239
//Visa Infinity = 28241
//$other_card = $pages->get("id=28233");

$pincode = $pages->findOne("template=cc_location_master,title={$lead->pincode}");
if ($pincode) {
	if ($pincode->company_cat != "NEGATIVE") {
	 	$approved = 1;

	 	//if approved then check for income
	 	switch ($employment_type) {
	 		case '1':
	 			//salaried = 3L/annum
		 		$mi = $p->mothly_income;

		 		if ($mi != "" && $mi != 0) {
		 			$ai = intval($mi) * 12;

		 			if ($ai > 300000 && $ai < 1199999) {
		 				$approved = 1;
		 				$other_card = $pages->get("id=28233");
		 			}elseif ($ai >= 120000 && $ai < 2399999) {
		 				//offer emirates card
		 				$approved = 1;
		 				$other_card = $pages->get("id=28237");
		 			}elseif ($ai >= 2400000) {
		 				//offer ultimate card
		 				$approved = 1;
		 				$other_card = $pages->get("id=28229");
		 			}else{
		 				$approved = 0;
		 			}

		 		}else{
		 			//income unknown
		 		}

	 			break;

	 		case '2':
	 			//Self-employed = 5L/annum
		 		$mi = $p->total_income;
		 		$mi = intval($mi);
	 			if ($mi >= 500000 && $mi < 1199999) {
	 				$approved = 1;
	 			}elseif ($mi >= 120000 && $mi < 2399999) {
	 				//offer emirates card
	 				$approved = 1;
	 				$other_card = $pages->get("id=28237");
	 			}elseif ($mi >= 2400000) {
	 				//offer ultimate card
	 				$approved = 1;
	 				$other_card = $pages->get("id=28229");
	 			}else{
	 				$approved = 0;
	 			}
	 			break;
	 		
	 		default:
	 			//salaried = 3L/annum
	 			break;
	 	}
	 }else{
	 	$approved = 0;
	 }
}else{
	//echo "Pincode not available";
	$approved = 1;
}

if ($card == $other_card) {
	$other_card = $pages->get("id=28233");
}

?>
<?php include 'partials/header_cc.php'; ?>

<div class="uk-container">
	<div class="uk-text-center uk-margin-large-top">
		<ul class="timeline">
			<li class="active ff-helvetica active1 fs-18">Info</li>
			<li class="active ff-helvetica fs-18">Application</li>
			<li class="ff-helvetica fs-18">Approval</li>
			<li class="ff-helvetica">Documents</li>
		</ul>		  
	</div>
</div>

<?php if ($approved == 1): ?>

<form class="choose_card uk-margin" id="cc_card_choice" action="<?=$page->url?>?u=<?=$unique_id?>" method="post">
<div class="uk-container" uk-height-viewport="expand:true">
	<h1 class="uk-h3 ff-bold uk-primary uk-text-center uk-margin-small uk-margin-large-top">Based on inputs, you are eligible for the cards below.</h1>
	<h2 class="uk-h4 uk-text-center uk-margin-remove uk-margin-large-bottom">Choose any one and proceed with the application for the card.</h2>
	<br/>
	<div class="uk-container uk-container-medium">
	<div class="uk-grid uk-child-width-1-2@s uk-margin-large-top">
		<div class="uk-margin-large-bottom">
			<div class="uk-grid uk-grid-small" style="min-height: 250px;">
				<div class="uk-width-1-3@s uk-margin-bottom">
					<img src="<?=$card->image->url?>" alt="<?=$card->title?>">
				</div>
				<div class="uk-width-2-3@s">
					<h2 class="uk-h4 ff-bold uk-secondary uk-margin-remove-top uk-margin-small-bottom"><?=$card->title?></h2>
					<div class="summary"><?=$card->summary?></div>
				</div>
				<div class="uk-width-1-1 uk-margin-top card-desc">
					<?=$card->desc?>
				</div>
			</div>
			<div class="uk-width-1-1 uk-margin-top">
				<input type="submit" name="submit_card" value="Apply now" class="uk-button uk-btn-apply uk-border-rounded" />
			</div>
		</div>
		<div class="uk-margin-large-bottom">
			<div class="uk-grid uk-grid-small" style="min-height: 250px;">
				<div class="uk-width-1-3@s uk-margin-bottom">
					<img src="<?=$other_card->image->url?>" alt="<?=$other_card->title?>">
				</div>
				<div class="uk-width-2-3@s">
					<h2 class="uk-h4 ff-bold uk-secondary uk-margin-remove-top uk-margin-small-bottom"><?=$other_card->title?></h2>
					<div class="summary"><?=$other_card->summary?></div>
				</div>
				<div class="uk-width-1-1 uk-margin-top card-desc">
					<?=$other_card->desc?>
				</div>
			</div>
			<div class="uk-margin-top">
				<input type="submit" name="submit_other_card" value="Apply now" class="uk-button uk-btn-apply uk-border-rounded" />
			</div>
		</div>
	</div>
	</div>

	<input type="hidden" name="id" value="<?=$p->id?>" />
	<input type="hidden" name="unique_id" value="<?=$unique_id?>" />
	<input type="hidden" name="current_card" value="<?=$card?>" />
	<input type="hidden" name="other_card" value="<?=$other_card?>" />
</div>
</form>

<?php else: ?>
<div class="uk-section">
	<div class="uk-container">
		<h4 class="fs-26 uk-margin-remove-top ff-light uk-margin-small-bottom uk-secondary">Apologies!</h4>
		<p><?=$p->person_title." ".$p->fname." ".$p->lname?>, your <?=$card->title?> application has been rejected at this time.</p>
	</div>
</div>
<?php endif ?>

<?php include 'partials/footer_cc.php'; ?>