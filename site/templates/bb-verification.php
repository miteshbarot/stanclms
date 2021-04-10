<?php 
if ($input->get->u != "") {
	$p = $pages->get("unique_id={$input->get->u}");
}else{
	$session->redirect($config->urls->root."business-banking/");
}


/* Send Lead data to Athena Dialer */

if ($p->code == "") {
	//code i.e. Dialer reference code field is empty
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://114.143.146.102/onlindata/api/values",
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
	$p->save();
}

/* End of Dialer code */


/*	Send Email */
	$mail = wireMail();
	$mail->to($p->email, $p->fname);
	$mail->subject("Standard Chartered Business Banking Application Details");
	$mail->bodyHTML("<p>Hi {$p->fname},<br/>Your Standard Chartered Business Banking loan application number is <strong>{$p->unique_id}</strong>.<br/>You may use this application number for future references.<br/>You'll receive email notification about your application status once it's processed.</p><p>Thank you for your interest in Standard Chartered Bank product.</p>");
	$numSent = $mail->send();
/*	End of Email code  */

include 'partials/header_bb.php'; ?>

<!-- <div class="uk-container">
	<div class="uk-text-center uk-margin-large-top">
		<ul class="timeline three-steps">
			<li class="active ff-helvetica fs-18 active1">Select product</li>
			<li class="active ff-helvetica">Verification</li>
			<li class="active ff-helvetica fs-18 active1">Business details</li>
		</ul>		  
	</div>
</div> -->

<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom" uk-height-viewport="offset-bottom:35">
	<div class="uk-card uk-card-default uk-card-body uk-position-relative uk-text-center">

		

		<div class="uk-padding-small uk-text-center" style="padding-top: 0;">
			<h4 class="uk-h2 uk-margin-top uk-secondary fs-24"><span>Thank you,</span> <?=$p->person_title." ".$p->fname?>!<br/>Your Standard Chartered <?=$p->product_of_interest?> application <br/> has been received.</h4>

			<div class="uk-flex uk-flex-center uk-flex-middle uk-flex-column">
				<div class="uk-h2 fs-20 uk-text-left mt-40">Your Application Details</div>
				<ul class="uk-primary uk-text-lead uk-text-left uk-margin-small-top fs-18" style="padding-left: 19px">
					<li>Application ID : <strong><?=$p->unique_id?></strong></li>
					<li>Product Selected : <?=$p->product_of_interest?></li>
					<li>Preferred City : <?=$p->city?></li>
					<!-- <li>Rate of Interest : 12.05%</li> -->
				</ul>
			</div>
			
		</div>
		
    	<h3 class="uk-margin-remove-top uk-h2 fs-20  uk-margin-medium-bottom "><!-- Please choose how you'd like to process your documents --></h3>

    	<div class="uk-grid uk-flex-center uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-child-width-1-1 uk-text-center uk-margin-medium-top">
    		<div>
    			<div><span uk-icon="icon:location; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Our representative will call you for few information</p>
    			<a href="#modal-docPickup" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16" uk-toggle>Pickup Documents</a>
    		</div>
    		<!-- <div>
    			<div><span uk-icon="icon:cloud-upload; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Submit your documents online for speedy process</p>
    			<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16" uk-toggle>Upload Documents/Fetch Online</a>
    		</div>
    		
    		<div class="uk-margin-top">
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

	</div>
</div>

<div id="modal-docPickup" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light">Document Pickup</h4>
    	<p>Please provide following details:</p>
    	
		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
			<label>Pickup Location:</label>
			<label><input class="uk-radio" type="radio" name="radio2" checked> Office</label>
            <label><input class="uk-radio" type="radio" name="radio2"> Residence</label>
        </div>
		<div class="uk-margin">
            <input class="uk-input" type="text" name="pickup_pincode" placeholder="Pincode" value="">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="pickup_address1" placeholder="Room Number, Apartment">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="pickup_address2" placeholder="Street Address, Landmark">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="pickup_address3" placeholder="Address Line 3">
        </div>
        
        <div class="uk-grid uk-grid-small uk-margin">
        	<div class="uk-width-1-2">
        		<input type="text" class="uk-input" name="pickup_city" value="City" />
        	</div>
        	<div class="uk-width-1-2">
        		<input type="text" class="uk-input" name="pickup_state" value="State" />
        	</div>
        </div>
        <hr>
        <div class="uk-text-left">
        	<h4 class="uk-h4 uk-margin-small-bottom uk-text-2D ff-helvetica-bold">Documents to keep ready</h4>
        	<ul class="uk-margin-remove uk-text-2D" style="padding-left: 10px;">
        	<?php switch ($p->product_of_interest) {
        		case 'Business Instalment Loan': ?>
        			<li>Documents related to establishment of entity, identity and address proof</li>
	        		<li>GST/VAT statements of latest 12 months</li>
	        		<li>Latest 2-years annual return including Profit & Loss (P&L) statement, balance sheet and income tax returns</li>
	        		<li>Latest 6 months bank statements</li>
	        		<li>Specific details would be provided by the sales officer</li>
        	<?php	break;
        		case 'Guaranteed Instalment Loan':?>
        			<li>Documents related to establishment of entity, identity and address proof</li>
	        		<li>GST/VAT statements of latest 12 months</li>
	        		<li>Latest 2-years annual return including Profit & Loss (P&L) statement, balance sheet and income tax returns</li>
	        		<li>Latest 6 months bank statements</li>
	        		<li>Specific details would be provided by the sales officer</li>
        	<?php		break;
        		case 'Loan Against Property':?>
        			<li>Documents related to establishment of entity, identity and address proof</li>
					<li>Documents pertaining to your property</li>
	        		<li>Latest 2-years annual return including Profit & Loss (P&L) statement, balance sheet and income tax returns</li>
	        		<li>Latest 6 months bank statements</li>
	        		<li>Specific details would be provided by the sales officer</li>
        	<?php		break;
        		case 'Business Working Capital':?>
        			<li>KYC documents of the directors & the company (MOA/AOA/PAF etc)</li>
	        		<li>12 month GST returns for Turnover computation</li>
	        		<li>Latest 2 years complete audited financials</li>
	        		<li>Latest 6 months operating bank statement</li>
	        		<li>Documents related to establishment of entity, identity and address proof documents.</li>
	        		<li>Specific details will be provided by the BWC Relationship Manager</li>
	        		<li>Other details required basis the product requirement such as - Order copies for BGs, Invoices for LCs etc</li>
        	<?php		break;
        		case 'Current Account':?>
        			<li>Individual and Entity KYC Documents</li>
        			<li>Specific details would be provided by the sales officer</li>
        	<?php		break;
        		case 'Insurance/Investment':?>
        			<li>Bank Statement/Salary Slip</li>
	        		<li>PAN</li>
	        		<li class="aadhar_details_doc">Aadhar Card</li>
	        		<li class="passport_details_doc">Passport</li>
	        		<li class="license_details_doc">Driving License</li>
	        		<li>Specific details would be provided by the sales officer</li>
        	<?php		break;
        		case 'Trade/FX':?>
        			<li>Individual and Entity KYC Documents</li>
        			<li>Specific details would be provided by the sales officer</li>
        	<?php		break; } ?>
        	</ul>
        </div>

        <div class="uk-margin">
        	<button class="uk-button uk-btn-green-bg uk-text-white" uk-toggle="target:#modal-docPickup">Request Pickup</button>
        </div>
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
    	<!-- <div class="uk-text-meta uk-margin-small-top">User continues to Perfios for documents processing.</div> -->
    </div>
</div>


<script src="//code.jquery.com/jquery.min.js"></script>
<?php include 'partials/footer_bb.php'; ?>