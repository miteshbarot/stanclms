<?php 
$uid = $input->get->u;
$lead = $pages->get("unique_id={$uid}");
$card = $lead->cc_product;



//Check pincode
//master 25928
$pincode = $pages->findOne("template=cc_location_master,title={$lead->pincode}");
if ($pincode) {
	if ($pincode->company_cat != "NEGATIVE") {
	 	$approved = 1;

	 	//if approved then check for income
	 	switch ($lead->employment_type) {
	 		case '1':
	 			//salaried = 3L/annum
		 		$mi = $lead->mothly_income;

		 		if ($mi != "" && $mi != 0) {
		 			$ai = intval($mi) * 12;

		 			if ($ai > 300000 && $ai < 1199999) {
		 				$approved = 1;
		 			}elseif ($ai >= 120000 && $ai < 2399999) {
		 				//offer emirates card
		 				$approved = 1;
		 				$card = $pages->get("id=28237");

		 				$lead->of(false);
		 				$lead->cc_product = $card;
		 				$lead->save();

		 			}elseif ($ai >= 2400000) {
		 				//offer ultimate card
		 				$approved = 1;
		 				$card = $pages->get("id=28229");

		 				$lead->of(false);
		 				$lead->cc_product = $card;
		 				$lead->save();
		 			}else{
		 				$approved = 0;
		 			}

		 		}else{
		 			//income unknown
		 		}

	 			break;

	 		case '2':
	 			//Self-employed = 5L/annum
		 		$mi = $lead->total_income;
		 		$mi = intval($mi);
	 			if ($mi >= 500000 && $mi < 1199999) {
	 				$approved = 1;
	 			}elseif ($mi >= 120000 && $mi < 2399999) {
	 				//offer emirates card
	 				$approved = 1;
	 				$card = $pages->get("id=28237");

	 				$lead->of(false);
	 				$lead->cc_product = $card;
	 				$lead->save();
	 			}elseif ($mi >= 2400000) {
	 				//offer ultimate card
	 				$approved = 1;
	 				$card = $pages->get("id=28229");

	 				$lead->of(false);
	 				$lead->cc_product = $card;
	 				$lead->save();
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

/*	Send Email */
	$mail = \ProcessWire\wiremail();
	$mail->to($lead->email, $lead->fname);
	$mail->subject("Standard Chartered Credit Card Application Details");
	$mail->bodyHTML("<p>Hi {$lead->fname},<br/>Your Standard Chartered Credit Card application number is <strong>{$lead->unique_id}</strong>.<br/>You may use this application number for future references.<br/>You'll receive email notification about your application status once it's processed.</p><p>Thank you for your interest in Standard Chartered Bank Credit Cards.</p>");
	$numSent = $mail->send();
/*	End of Email code  */


 include(\ProcessWire\wire('files')->compile('partials/header_cc.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));

?>

<div class="uk-container">
	<div class="uk-text-center uk-margin-large-top">
		<ul class="timeline">
			<li class="active ff-helvetica active1 fs-18">Info</li>
			<li class="active ff-helvetica active1 fs-18">Application</li>
			<li class="active ff-helvetica fs-18">Approval</li>
			<li class="ff-helvetica">Documents</li>
		</ul>		  
	</div>
</div>

<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom" uk-height-viewport="offset-bottom:35">
	<div class="uk-card uk-card-default uk-card-body uk-position-relative fs-22 ff-light">
		<div class="approval-wrapper">

		
			
			<div class="approval-textholder">

		<?php if ($approved == 1): ?>
			<h4 class="fs-30 uk-margin-remove-top ff-normal uk-secondary">Congratulations!</h4>
			
			<p><?=$lead->person_title." ".$lead->fname." ".$lead->lname?>, your <?=$card->title?> application has been approved.<br>
			<span class="fs-20 ff-bold" style="color: #000;">Your application ID : <span><?=$lead->aip_ref_number?></span></span></p>
		<?php else: ?>
		
			
			<h4 class="fs-26 uk-margin-remove-top ff-light uk-margin-small-bottom uk-secondary">Apologies!</h4>
			
			<p><?=$lead->person_title." ".$lead->fname." ".$lead->lname?>, your <?=$card->title?> application has been rejected at this time.</p>
		<?php endif ?>
		
				<div class="approval-cc-image">
			<img src="<?=$card->image->url?>" alt="CC Image" style="display: inline-block; width: 245px; height: auto;" />
			</div>
		<!-- <div class="uk-text-lead">Your Application ID is <span class="ff-helvetica-bold"><?=$lead->unique_id?></span>.</div> -->
		</div>
			</div>
		


		<!-- <div class="uk-background-white uk-card-default uk-text-left uk-padding-small uk-margin-top"> -->
			<!-- <div class="uk-clearfix">
				<img src="<?=$tpl?>assets/images/svtt-cc.png" class="uk-align-left uk-margin-remove-bottom" alt="CC Image" style="display: inline-block; max-width: 120px; height: auto;" />
				<h1 class="uk-h4 uk-margin-remove"><span class="uk-text-67">You've applied for</span> <span class="uk-primary">Standard Chartered Super Value Titanium Credit Card</span></h1>
				<div class="uk-grid uk-child-width-expand@s uk-child-width-1-1 uk-margin-small-top">
					<div class="pad-mod">&bull; Get <span class="uk-text-black ff-helvetica-bold">5% cashback</span> on fuel, phone and utility bills</div>
					<div>&bull; Earn <span class="uk-text-black ff-helvetica-bold">rewards</span> on other spends</div>
					<div>&bull; Enjoy a host of <span class="uk-text-black ff-helvetica-bold">discounts and offers</span> across dining, shopping, travel and many more.</div>
				</div>	
			</div> -->
		<!-- </div> -->

		<!-- <span uk-icon="icon:check;ratio:3.0" class="uk-primary"></span> -->
		<?php if ($approved == 1): ?>
    	<p class="uk-text-31 uk-h2 uk-margin-large-top uk-margin-large-top uk-text-bold uk-text-center doc-process-title fs-20">Please choose how you'd like to process your documents</p>

    	<div class="uk-grid uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-child-width-1-1 uk-flex-center uk-text-center mt-40">
    		<div>
    			<div><span uk-icon="icon:location; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16 ff-normal">Our representative will call you for few information</p>
    			<a href="#modal-docPickup" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16 ff-normal" style="text-transform: none;" uk-toggle>Pickup documents</a>
    			<!-- <hr class="uk-hr" /> -->
    		</div>
    		<!--<div>
    			<div><span uk-icon="icon:cloud-upload; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16 ff-normal">Submit your documents online for speedy process</p>
    			<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16 ff-normal" style="text-transform: none;" uk-toggle>Upload documents/Fetch online</a>
    			 <hr class="uk-hr" /> 
    		</div>-->
    		<!-- <div class="uk-margin-top">
    			<div><span uk-icon="icon:world; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Fetch your KYC documents from the DigiLocker.</p>
    			<a href="#" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top">Fetch Online</a>
    		</div>
    		<div class="uk-margin-top">
    			<div><span uk-icon="icon:video-camera; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Complete your Video KYC from the comfort of your home. You can initiate your Video KYC now or schedule an appointment at your preferred date and time.</p>
    			<a href="#" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top">VKYC</a>
    		</div> -->
    	</div>
    	<?php endif ?>

	</div>
</div>

<div id="modal-docPickup" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light">Document pickup</h4>
    	<p>Please provide following details:</p>
    	<form>
    		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
    			<label>Pickup Location:</label>
	            <label><input class="uk-radio" type="radio" name="radio2" checked> Residence</label>
	            <label><input class="uk-radio" type="radio" name="radio2"> Office</label>
	        </div>
    		<div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Pincode">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Address Line 1">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Address Line 2">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Street Name, Locality">
	        </div>
	        
	        <div class="uk-grid uk-grid-small uk-margin">
	        	<div class="uk-width-1-2">
	        		<input type="text" class="uk-input" disabled value="Mumbai" />
	        	</div>
	        	<div class="uk-width-1-2">
	        		<input type="text" class="uk-input" disabled value="Maharashtra" />
	        	</div>
	        </div>
	        <hr>
	        <div class="uk-text-left">
	        	<h4 class="uk-h4 uk-margin-small-bottom uk-text-2D ff-helvetica-bold">Documents to keep ready</h4>
	        	<ul class="uk-margin-remove uk-text-2D" style="padding-left: 10px;">
	        		<li>Bank statement/Salary slip</li>
	        		<li>PAN</li>
	        		<li>Aadhar Card / Passport / Driving license</li>
	        		<!-- <li class="passport_details_doc">Passport</li> -->
	        		<!-- <li class="license_details_doc">Driving License</li> -->
	        	</ul>
	        </div>

	        <div class="uk-margin">
	        	<button class="uk-button uk-btn-green-bg uk-text-white">Request pickup</button>
	        </div>
	        
    	</form>
    </div>
</div>


<div id="modalPerfios" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light">Upload bank statement</h4>
    	<p class="uk-text-muted">Please choose how would you like to proceed:</p>
    	<form class="uk-margin-small">
    		<div><label class="uk-padding-small"><input class="uk-radio uk-margin-small-right" type="radio" name="docsupload" value="1" /> Use online banking</label></div>
    		<div class="uk-margin"><label class="uk-padding-small"><input class="uk-radio uk-margin-small-right" type="radio" name="docsupload" value="2" /> Documents upload</label></div>
    	</form>
    	<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top" uk-toggle>Continue</a>
    	<div class="uk-text-meta uk-margin-small-top">User continues to Perfios for documents processing.</div>
    </div>
</div>
<?php include(\ProcessWire\wire('files')->compile('partials/footer_cc.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>