<?php 

 include(\ProcessWire\wire('files')->compile("partials/_general_function.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));
$msg=$amount="";
//$msg =$_GET['m'];
//$amount =$_GET['am'];
$p = $pages->get("unique_id={$input->get->u}");

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
	$mail = \ProcessWire\wiremail();
	$mail->to($p->email, $p->fname);
	$mail->subject("Standard Chartered Personal Loan Application Details");
	$mail->bodyHTML("<p>Hi {$p->fname},<br/>Your Standard Chartered Personal Loan application number is <strong>{$p->unique_id}</strong>.<br/>You may use this application number for future references.<br/>You'll receive email notification about your application status once it's processed.</p><p>Thank you for your interest in Standard Chartered Bank Personal Loan.</p>");
	//$numSent = $mail->send();
        smssend($smsurl);
/*	End of Email code  */


 include(\ProcessWire\wire('files')->compile('partials/header_pl.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>


<div class="uk-container">
	<div class="uk-text-center uk-margin-large-top">
		<ul class="timeline">
			<li class="active ff-helvetica fs-18 active1">Eligibility</li>
			<li class="active ff-helvetica fs-18 active1">Offer</li>
			<li class="active ff-helvetica fs-18 active1">Application</li>
			<li class="active ff-helvetica">Documents</li>
		</ul>		  
	</div>
</div>

<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom" uk-height-viewport="offset-bottom:35">
	<div class="uk-card uk-card-default uk-card-body uk-position-relative uk-text-center">

		

		<div class="uk-padding-small uk-text-center" style="padding-top: 0;">
			<h4 class="uk-h2 uk-margin-top uk-secondary fs-24"><span class="fs-34">Congratulations</span><br> <?=$p->person_title_opt->title." ".$p->fname." ".$p->lname?>, your Standard Chartered Personal Loan application <br/> has been 
				<?php if($p->stat == 'APPROVE'){
						echo "APPROVED";
					}elseif($p->stat == 'DECLINE'){
						echo 'REJECTED';
					}

				?>
				
		</h4>

	<?php
	$msg="Thank%20you%20for%20applying%20for%20a%20Standard%20Chartered%20Personal%20Loan%20online.%20Your%20application%20reference%20number%20for%20future%20correspondence%20is%20".$p->unique_id;
	$smsurl ="http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=381682&username=7045098739&password=Apply%4012345&To=".$p->mobile."&Text=".$msg;
			smssend($smsurl);
		?>
			
			<!-- <h1 class="uk-h3 uk-primary ff-light">You've applied for personal loan of <span class="ff-helvetica-bold">&#8377;&nbsp;10,00,000</span> for the tenure of <span class="ff-helvetica-bold">4years</span> at the Interest rate of <span class="ff-helvetica-bold">12.05%</span>.</h1> -->
			<div class="uk-flex uk-flex-center uk-flex-middle uk-flex-column">
				<div class="uk-h2 fs-20 uk-text-left mt-40">Your Application Details</div>
				<ul class="uk-primary uk-text-lead uk-text-left uk-margin-small-top fs-18" style="padding-left: 19px">
					<li>Application ID : #<?=$p->unique_id?></li>
					<!-- <li>ReferenceNo : <?=$p->application_id?></li> aip_ref_number-->
					<li>Loan Amount : <?=$p->loan_amount?></li>
					<li>Approved Amount : <?=$p->loan_amount?></li>
					<li>Tenure : <?php echo $p->tenure; ?> Years</li>
					<li>Rate of Interest : <?=$p->interest_rate?>%</li>
				</ul>
			</div>
			
		</div>

		<!-- <div class="uk-grid uk-margin-medium">
			<div class="uk-width-1-2@s">
				<img src="<?=$tpl?>assets/images/cc-image.png" alt="CC Image" />
			</div>
			<div class="uk-width-1-2@s uk-text-left@s">
				<h1 class="uk-h2 uk-margin"><span class="uk-h4 uk-text-67">You're eligible for</span><br/><span class="uk-primary">Standard Chartered Bank's DigiSmart Credit Card</span></h1>
				<p class="uk-h4 uk-margin-small uk-text-67">DigiSmart Card is the ideal credit card for online shopping. Enjoy attractive offers on travel, dining, groceries & more.</p>
			</div>			
		</div> -->

		<!-- <span uk-icon="icon:check;ratio:3.0" class="uk-primary"></span> -->
		
    	<h3 class="uk-margin-remove-top uk-h2 fs-20  uk-margin-medium-bottom ">Please choose how you'd like to process your documents</h3>

    	<div class="uk-grid uk-grid-divider  uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-child-width-1-1 uk-text-center uk-margin-medium-top">
    		<div>
    			<div><span uk-icon="icon:location; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Our representative will call you for few information</p>
    			<a href="#modal-docPickup" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16" uk-toggle>Pickup Documents</a>
    			<!-- <hr class="uk-hr" /> -->
    		</div>
    		<div>
    			<div><span uk-icon="icon:cloud-upload; ratio:3.0"></span></div>
    			<p class="uk-text-89 fs-16">Submit your documents online for speedy process</p>
    			<a href="#modalPerfios" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top fs-16" uk-toggle>Upload Documents/Fetch Online</a>
    			<!-- <hr class="uk-hr" /> -->
    		</div>
    		<!-- 
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
    	<a href="<?=$root."integrations/perfios/?id=".$p->id?>" class="uk-button uk-btn-green-bg uk-text-white uk-margin-small-top">Continue</a>
    	<div class="uk-text-meta uk-margin-small-top">User continues to Perfios for documents processing.</div>
    </div>
</div>



<?php include(\ProcessWire\wire('files')->compile('partials/footer_pl.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>