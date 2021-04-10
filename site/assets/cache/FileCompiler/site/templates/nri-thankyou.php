<?php 
$p = $pages->get("unique_id={$input->get->u}");

/* Send Lead data to Athena Dialer */

if ($p->code == "") {
	//code i.e. Dialer reference code field is empty
	/*$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://123.201.124.130/onlindata/api/values",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS =>"{\n\"LeadID\" :\"{$p->unique_id}\",\n\"Campaign_Name\" :\"{$p->utm_campaign}\", \n\"Customer_Name\" :\"{$p->fname} {$p->lname}\", \n\"Mobile\" :\"{$p->mobile}\", \n\"Product_Name\" :\"{$p->product->title}\", \n\"dob\" :\"{$p->dob}\", \n\"Eligible_Amount\" :\"{$p->loan_amount}\", \n\"ROI\" :\"{$p->interest_rate}\",\n\"Salary\" :\"{$p->monthly_income}\",\n\"Address\" :\"{$p->address}\", \n\"Customer_City\" :\"{$p->city}\",\n\"Customer_State\" :\"{$p->state}\",\n\"Pincode\" :\"{$p->pincode}\",\n\"Email_Id\" :\"{$p->email}\",\n\"Pan_No\" :\"{$p->pan}\",\n\"Lead_Source\" :\"{$p->utm_source}\",\n\"Aadhaar_No\" :\"{$p->aadhar}\",\n\"Gender\" :\"{$p->gender->title}\",\n\"Company_Name\" :\"{$p->employer_name}\", \n\"Occupation\" :\"{$p->employment_type->title}\"\n}",
	  CURLOPT_HTTPHEADER => array(
	    "Content-Type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	curl_close($curl);

	$p->of(false);
	$p->code = str_replace('"', '', $response);
	$p->save();*/
}

/* End of Dialer code */

/*	Send Email */
	$mail = \ProcessWire\wiremail();
	$mail->to($p->email, $p->fname);
	$mail->subject("Standard Chartered NRI Banking Application Details");
	$mail->bodyHTML("<p>Hi {$p->fname},<br/>Your Standard Chartered NRI Banking application number is <strong>{$p->unique_id}</strong>.<br/>You may use this application number for future references.<br/>You'll receive email notification about your application status once it's processed.</p><p>Thank you for your interest in Standard Chartered Bank NRI Banking.</p>");
	$numSent = $mail->send();
/*	End of Email code  */

$tpl = $config->urls->templates;

 include(\ProcessWire\wire('files')->compile('partials/header-nri.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>

<div class="top"><img src="<?=$tpl?>nri_partials/images/top-line.jpg" width="1680" height="10" alt=""/></div>
<div class="top"> </div>
<div style="background: #FFF">
<header> 
<div><a href="<?=$pages->get("id=28258")->url?>"><img src="<?=$tpl?>assets/images/logo.png" style="width: 110px; height: auto" /></a></div>
<div> You are applying for <span>Standard Chartered NRI Banking </span>
</div>
</header>
</div>
	
<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/override.css">

<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom" uk-height-viewport="offset-bottom:35">
	<div class="uk-card uk-card-default uk-card-body uk-position-relative uk-text-center thankyou-box">

		<div class="uk-padding-small uk-text-center thankyou-msg" style="padding-top: 0;">
			<h4 class="uk-margin-top ff-light thankyou-big">Dear <span class="ff-helvetica-bold"><?php if ($p->fname) {
				echo $p->fname;
			}else{
				echo "Customer";
}?>,</span>
				</h4>
				<p>Thank you for expressing interest in our product(s)/service(s).<br/>Our representative will get in touch with you shortly.</p><p class="thankyou-big">Your Application ID is <span class="ff-helvetica-bold"><?=$p->unique_id?></span>.</p>
			
		</div>
		
    	<!-- <h3 class="uk-margin-remove-top uk-h2 fs-22 uk-text-bold  uk-margin-medium-bottom ff-helvetica-bold">Please choose how you'd like to process your documents</h3>

    	<div class="uk-grid uk-grid-divider  uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-child-width-1-1 uk-text-center uk-margin-medium-top">
    		<div>
    			<div><span uk-icon="icon:location; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Our representative will call you for few information</p>
    			<a href="#modal-docPickup" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top" uk-toggle>Pickup Documents</a>
    		</div>
    		<div>
    			<div><span uk-icon="icon:cloud-upload; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Submit your documents online for speedy process</p>
    			<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top" uk-toggle>Upload Documents/Fetch Online</a>
    		</div>
    	</div> -->

	</div>
</div>

<div id="modal-docPickup" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light">Document Pickup</h4>
    	<p>Please provide following details:</p>
    	<form>
    		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
    			<label>Pickup Location:</label>
    			<label><input class="uk-radio" type="radio" name="radio2" checked> Office</label>
	            <label><input class="uk-radio" type="radio" name="radio2"> Residence</label>
	        </div>
    		<div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Pincode" value="400605">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="8 flr, Devchand House">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Shiv Sagar Estate, Opp. Atria Mall">
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Worli, Mumbai">
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
	        		<li>Bank Statement/Salary Slip</li>
	        		<li>PAN</li>
	        		<li class="aadhar_details_doc">Aadhar Card</li>
	        		<li class="passport_details_doc">Passport</li>
	        		<li class="license_details_doc">Driving License</li>
	        	</ul>
	        </div>

	        <div class="uk-margin">
	        	<button class="uk-button uk-btn-green-bg uk-text-white">Request Pickup</button>
	        </div>
	        
    	</form>
    </div>
</div>

<div id="modalPerfios" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light">Upload Bank Statement</h4>
    	<p class="uk-text-muted">Please choose how would you like to proceed:</p>
    	<form class="uk-margin-small">
    		<div><label class="uk-padding-small"><input class="uk-radio uk-margin-small-right" type="radio" name="docsupload" value="1" /> Use Online Banking</label></div>
    		<div class="uk-margin"><label class="uk-padding-small"><input class="uk-radio uk-margin-small-right" type="radio" name="docsupload" value="2" /> Documents Upload</label></div>
    	</form>
    	<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top" uk-toggle>Continue</a>
    	<div class="uk-text-meta uk-margin-small-top">User continues to Perfios for documents processing.</div>
    </div>
</div>

<footer> © 2021. Standard Chartered Bank. All Rights Reserved.</footer>



<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<?php include 'partials/footer-nri.php' ?>