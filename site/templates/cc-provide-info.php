<?php 
namespace ProcessWire;
$checkCard = $pages->get("id={$input->get->card}");
if ($checkCard) {
	$card = $checkCard;
}
include 'partials/header_cc.php'; 

?>

<style type="text/css">
	.btngrey{background: grey;}
	.checkmark {
	    position: absolute;
	    top: 0;
	    left: -6px;
	    height: 16px;
	    width: 16px;
	    background-color: #fff;
	    border-radius: 50%;
	    border: 2px solid #00a546;
	}
	/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		  background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
		  /* background-color: #00A54E; */
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
		  display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
		  top: 4px;
		  left: 4px;
		  width: 8px;
		  height: 8px;
		  border-radius: 50%;
		  background: #00a546;
		}

		.field_label{
	      top: -23px;color: #000!important;
	    }
	.cc-banner-heading{
		font-weight: 700;
		left: 0%;
		right: 0;
		width: 47%;
		padding-top:10px;
		top:3%;
	}
	.uk-slideshow-nav{
		position: absolute;
	    bottom: 12%;
    	z-index: 999;
    	left: 21%;
	}
	.cc-banner-heading ul img{
		width: 47px;float: left;
		margin-right: 15px;
	}
	.cc_img{
		width: 280px;margin-top:30px;margin-bottom: 20px;
	}
	.listing{
		margin-top: 35px;
	}
	.uk-subnav li a{
        border-bottom: 1px solid #fff;
        background-color: #fff!important;
      }
      .uk-subnav li.uk-active a,.uk-subnav-pill>.uk-active>a{
        border-bottom: 1px solid #0775B1;background-color: #fff!important
      }
    .eligibility_list{
    	line-height: 2em;
    }
    .head_desk{
			display: flex;justify-content: center;align-items: center;
		}
	
	.uk-slideshow-items img {opacity: 1;}
	/*.value-table tr td:first-child{width: 40%}*/
	
    @media screen and (max-width:767px){
		
		.listing{
			margin-top: 5px;
		}
		
		.uk-list li {float: left;}
		.cc-banner-holder {background: none;}
		.uk-padding {padding: 0 10px;}
		
		
    	.cc-banner-heading{
    		width: 100%;
    		padding: 0;
		    width: 94%;
		    margin:0 3%;
		    top: 3%;
    	}
    	.cc-banner-heading h2{
    		font-size: 18px;
    		text-align: center !important;
    	}
    	.cc-banner-heading ul{
			margin-top: 5px;
			font-size: 15px;
		}
		.cc-banner-heading ul li{
			overflow: auto;
		}
    	.cc-banner-heading ul img{
    		width: 40px;
    		float: left;
		}
	}
	 @media screen and (max-width:320px){
		.cc-banner-heading ul img{
			width: 37px;
		}
	 }
	 @media screen and (width:768px){
    	.cc-banner-heading{
    		padding: 15px;
			top: 5%;
    	}
    	.cc-banner-heading h2{
    		font-size: 23px;
    		text-align: center !important;
    	}
    	.cc-banner-heading ul{
			margin-top: 15px;
			font-size: 16px;
		}
    	.cc-banner-heading ul li span{
    		position: relative;
    		top: 0;
    	}
    	.uk-slideshow-nav{
    		bottom: 64%;
    		left: 45%;
    	}
    	.cc-banner-heading ul img{
    		width: 40px;
		}
		.cc-banner-heading{
    		width: 94%;
		 }
		 .uk-width-1-1\@s {
			 width: 45%;
		 }
		 .form_section {
			 margin-top: -60px;
		 }
		 .listing{
			 margin-top: 15px;
		 }
		 .form_section h2 {
    		font-size: 30px;
   			 top: 20px;
		}
		 .cc-banner-holder {
			 padding-bottom: 20px;
		 }
	}
    @media screen and (min-width:1024px) and (max-width:1300px){
    	.cc-banner-heading{
    		padding-top:0px;
			width: 50%;
			top:20%;
    	}
		.cc-banner-heading h2{
			font-size: 22px;
		}
		.cc-banner-heading ul img{
			width: 40px;
		}
		.cc-banner-heading ul{
			font-size: 14px;
		}
		.uk-slideshow-nav{
			bottom: 22%;
		}
		.cc_img{
			width: 250px;
		}
		.listing{
			margin-top: 20px;
		}
		.form_section {
			width: 40%;
		}
		.cc_banner_img {
			width: 100%;
			height: 450px;
		}
    }
    @media screen and (min-width:1441px){
    	.cc-banner-heading{
			padding-top: 25px;
			left: 5%
		}
		.uk-slideshow-nav{
			bottom: 8%;
			left: 24%;
		}
		.cc_img{
			margin-right: 25px;width: 210px;
		}
    }
    @media screen and (min-width:1601px){
    	.cc-banner-heading h2{
			font-size: 38px;
		}
		.cc-banner-heading ul{
			font-size: 20px;
			margin-top: 15px;
		}
		.uk-slideshow-nav{
			bottom: 22%;
			left: 28%;
		}
		.cc-banner-heading{
			padding-top: 25px;
			left: 9%
		}
		.cc-banner-heading ul img{
			margin-right: 20px;width: 40px;
		}
		.listing {
    		margin-top: 15px;
		}
		.cc_img{
			margin-right: 25px;
		}
    }
    @media screen and (min-width:1700px){
    	.cc_img {
		    margin-right:30px;width: 245px;
		}
		.cc-banner-heading ul{
			font-size: 25px;
		}
		.cc-banner-heading ul li{
			margin-top: 15px;
		}
    }
    @media (max-width: 640px){
    	.value-table tr td:first-child{width: auto}
    	.value-table tr td{font-size: 14px !important}
    }
</style>

<div class="uk-position-relative uk-visible-toggle uk-light cc-banner-holder" tabindex="-1" uk-slideshow="animation: slide; ratio: 16:5;">
    <ul class="uk-slideshow-items cc-banner-holder-mobile">
    	<?php foreach ($pages->get("id=1016")->cc_carousel as $slide): ?>
        <li>
            <img class="hidden_on_mobile hidden_on_tab uk-width-1-1 cc_banner_img" src="<?=$slide->image->url?>">
            <img class="hidden_on_desktop hidden_on_tab cc_banner_img_mob" src="<?=$slide->image_alt->url?>">
            <div class="cc-banner-heading">
            	<div style="display: flex;align-items: center;flex-direction: column;">
            	<!-- <img class="cc_img" src="<?=$tpl?>assets/images/svtt-cc.png"> -->
            	<img class="cc_img" src="<?=$card->image->url?>">
	            <h2 class="fs-32 ff-helvetica-bold uk-margin-remove fs-22-mobile uk-text-center"><?=$card->stat?></h2>
	            </div>
	            <!-- <div class="uk-grid listing">
	            	<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-width-1-1">
	            		<ul class="uk-list uk-text-left fs-18 ff-helvetica uk-text-white fs-16-mobile">
			            	<li><img src="<?=$tpl?>assets/images/pay-new.png"><span>Pay only 5K joining fee and 10K MMT benefits FREE</span></li>
			            	<li><img src="<?=$tpl?>assets/images/reward-new.png"><span>Renewal fee for 5K will get you 5K worth Rewards point.</span></li>
			            	<li><img src="<?=$tpl?>assets/images/lounge-new.png"><span>Get complimentary Airport Lounge and Gold privileges.</span></li>
			            </ul>
	            	</div>
	            	<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-width-1-1 fs-16-mobile">
	            		<ul class="uk-list uk-text-left fs-18 ff-helvetica uk-text-white">
			            	<li><img src="<?=$tpl?>assets/images/get-new.png"><span>Get 3.3% rewards back with every spend of &#8377; 100.</span></li>
			            	<li><img src="<?=$tpl?>assets/images/markup-new.png"><span>Only 2% markup fee for all foreign spend.</span></li>
			            	<li><img src="<?=$tpl?>assets/images/cashback.png"><span>Get cashback on Uber rides & duty free spends.</span></li>
			            </ul>
	            	</div>
	            </div> -->
        	</div>
        </li>
        <?php endforeach ?>
    </ul>


	<div class="uk-position-absolute form_section uk-border-rounded">
		<div class="uk-background-white uk-br-med">
	   		<div class="uk-position-relative uk-text-center">
	   			<img class="form_bg" src="<?=$tpl?>assets/images/form-bg.png">
	   			<h2 class="uk-text-center ff-helvetica-bold fs-22 fs-20-mobile uk-margin-remove form_head cc_form_head">Get instant approval online</h2>
	   		</div>

	   		<div class="uk-text-center uk-margin-top">
			  <ul class="timeline">
			    <li class="active ff-helvetica">Select Card</li>
			    <li class="ff-helvetica">Application</li>
			    <li class="ff-helvetica">Approval</li>
			    <li class="ff-helvetica">Documents</li>
			  </ul>
			</div>

	   		<form class="form_slider uk-position-relative cc-form-height" id="cc_first_form" method="post">
	   			<div class="form-item active uk-padding-small form-item-1 uk-text-center">
	   				<div class="f-inn f-inn-radiobut">
					      <label>
					        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing relationship<br>with Standard Chartered Bank?<span class="uk-text-red">*</span></div>
					       	<div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input type="radio" class="cc_choice_1" name="choice_1" value="1" data-target="form-item-2" data-current="form-item-1"/><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div>
					        <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer"><label class="container uk-position-relative"><input type="radio" class="cc_choice_1" name="choice_1" value="0" data-target="form-item-4" data-current="form-item-1" /><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
					      </label>
					  </div>
			      <div class="uk-margin-medium-top">
			      	<span id="cc_choice_1_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-1" style="display: none;">Next</span>
			      </div>
			    </div>

			    <div class="form-item uk-padding-small form-item-2 uk-text-center">
			    	<div class="f-inn f-inn-radiobut">
				      <label>
				        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing<br>Standard Chartered Bank Credit Card?<span class="uk-text-red">*</span></div>
				        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input type="radio" name="choice_3" value="1"  data-current="form-item-2" /><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div> <!-- uk-toggle="target: #modal-rs1" -->

				        <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer"><label class="container uk-position-relative"><input type="radio" name="choice_3" value="0" data-target="form-item-3" data-current="form-item-2" /><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
				      </label>
				  	</div>
			      <div class="uk-margin-medium-top">
			      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">Back</span>

			      	<span class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-3" data-current="form-item-2">Next</span>
			      </div>
			    </div>


			    <div class="form-item uk-padding-small form-item-3 uk-text-center">
			    	<div class="f-inn f-inn-radiobut">
				      <label>
				        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing<br>Standard Chartered Bank Debit Card?<span class="uk-text-red">*</span></div>


				        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input class="cc_choice_debit" type="radio" name="choice_2" value="1" data-target="form-item-5" data-current="form-item-3" /><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div>


				        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input class="cc_choice_debit" type="radio" name="choice_2" value="0" data-target="form-item-4" data-current="form-item-3" /><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
				      </label>
				  	</div>

			      <div class="uk-margin-medium-top">
			      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">Back</span>

			      	<span id="cc_next_debit" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-3" style="display: none">Next</span>
			      </div>
			    </div>


			    <div class="form-item uk-padding-small form-item-4 uk-text-center">
			      <div class="uk-display-inline-block form-box">
			      	<div class="uk-position-relative">
			        	<label class="uk-form-label fs-14 uk-position-absolute field_label">Full Name</label>
		     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="full_name1" name="full_name1">
		     	 		<span class="error fullnameErr" style="display: none;">Error Here</span>
				    </div>
			        <div class="uk-position-relative">
			        	<label class="uk-form-label fs-14 uk-position-absolute field_label">Email ID</label>
		     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="email" placeholder="" id="email1" name="email1">
		     	 		<span class="error emailErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="mt-10 uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
				    		<span class="uk-form-icon icon-plus-91"></span>
				    		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="mobile1" name="mobile1" onkeypress="javascript:return isNumber(this,event);" maxlength="10" data-target="form-item-7" data-current="form-item-4">	
				    	</div>
		     	 		<span class="error mblErr" style="display: none;">Error Here</span>
				    </div>
			      </div>
			      <div class="uk-margin-medium-top">
			      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">Back</span>
			      	<span id="email_mobile_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-7" data-current="form-item-4" style="display: none;">Next</span>
			      </div>
			    </div>
			    <div class="form-item uk-padding-small form-item-5 uk-text-center">
			    	<div class="uk-margin-small-top uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Full Name<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded mobile2" type="text" placeholder="" id="full_name2" name="full_name2" >
			     	 	</div>
		     	 		<span class="error fullnameErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-small-top uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Email<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="email3" name="email3" >
			     	 	</div>
		     	 		<span class="error emailErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-small-top uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
				    		<span class="uk-form-icon icon-plus-91"></span>
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded mobile2" type="text" placeholder="" id="mobile2" name="mobile2" onkeypress="javascript:return isNumber(this,event);" maxlength="10">
			     	 	</div>
		     	 		<span class="error mblErr" style="display: none;">Error Here</span>
				    </div>

				    <div class="uk-margin-small-top uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Pincode<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded pincode2 chkpincode" type="text" placeholder="" id="pincode2" name="pincode2" onkeypress="javascript:return isNumber(this,event);" maxlength="6">
			     	 	</div>
		     	 		<span class="error pinErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-small-top uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Date of Birth<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded dob2" type="text" placeholder="dd/mm/yyyy" id="datepicker" name="dob2" maxlength="12">
			     	 	</div>
		     	 		<span class="error dob2Err" style="display: none;">Error Here</span>
				    </div>

				    <div class="fs-11 uk-text-left">
			            <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chkauth_cc1">&nbsp;I authorise Standard Chartered Bank to verify & conduct Credit Bureau Check *</label></div>
			            <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chktc_cc1">&nbsp;I have read the <a href="https://apply.standardchartered.co.in/site/templates/assets/images/cc-tnc.pdf" target="_blank">Terms & Conditions</a> and agree to the terms therein *</label></div>
			        </div>
			        <div class="uk-margin-top uk-overflow-auto">
			        	<!-- <button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn cc-btn-dsb" uk-toggle="target: #modal-otp-rtob" disabled="disabled">Proceed</button> -->
			        	<button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn cc-btn-dsb cc_first_submit btngrey" uk-toggle="target: #modal-otp-rtob" disabled="disabled">Proceed</button><!-- Removed modal-otp-rtob added modal-otp -->
			        </div>
				    <div class="uk-margin-top uk-overflow-auto">
				    	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-align-left uk-margin-remove">Back</span>
			        </div>
			        <!-- <div class="uk-text-67 uk-text-small">Continue to RTOB journey</div> -->
			    </div>
			    <div class="form-item uk-padding-small form-item-6 uk-text-center uk-position-relative">
			        <div class="uk-position-relative">
			        	<label class="uk-form-label fs-14 uk-position-absolute field_label">Email ID<span class="uk-text-red">*</span></label>
		     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Email ID*" id="email2" name="email2">
				    </div>
				    <div class="mt-35 uk-position-relative">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
				    	<div class="uk-inline">
				    		<span class="uk-form-icon icon-plus-91"></span>
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="mobile3" name="mobile3">
			     	 	</div>
				    </div>
				    <div class="fs-11 uk-text-left">
			            <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chkauth1">&nbsp;I authorise Standard Chartered Bank to verify & conduct Credit Bureau Check *</label></div>
			            <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chktc1">&nbsp;I have read the <a href="https://apply.standardchartered.co.in/site/templates/assets/images/cc-tnc.pdf" target="_blank">Terms & Conditions</a> and agree to the terms therein *</label></div>
			        </div>
			        <div class="uk-margin-top uk-overflow-auto">
			        	<button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn cc_first_submit btngrey" uk-toggle="target: #modal-rs1">Proceed</button>
			        </div>
				    <div class="uk-margin-top uk-overflow-auto">
				    	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-align-left uk-margin-remove">Back</span>
			        </div>
			        <!-- <div class="uk-text-67 uk-text-small">Continue to Rs.1 transaction</div> -->
			    </div>
			    <div class="form-item uk-padding-small form-item-7 uk-text-center">
				    <div class="uk-display-inline-block uk-position-relative form-box">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Residence Zip Code <span class="uk-text-red">*</span></label>
		     	 		<input class="uk-input uk-form-width-input uk-border-rounded chkpincode" type="text" placeholder="" id="zipcode" name="pincode" onkeypress="javascript:return isNumber(this,event);" maxlength="6" data-target="form-item-8" data-current="form-item-7">
		     	 		<span class="error pinErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">Back</span>
			      		<span id="zipcode_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-8" data-current="form-item-7" style="display: none;">Next</span>
			      	</div>
			    </div>
			    <div class="form-item uk-padding-small form-item-8 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
				    	<label class="uk-form-label fs-14 uk-position-absolute field_label">Source of Income<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded income_select" id="form-stacked-select" name="salaried_ac" >
			                <option selected="selected">Source of Income</option>
			                <option data-target="form-item-9" data-current="form-item-8" value="1">Salaried</option>
			                <option data-target="form-item-10" data-current="form-item-8" value="2">Self Employed Business</option>
			                <option data-target="form-item-10" data-current="form-item-8" value="3">Self Employed Professional</option>
				        </select>
			    	</div>
			    	<div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">Back</span>
			      		<span id="income_select_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-8" style="display: none;">Next</span>
			      	</div>
			    </div>
			    <div class="form-item uk-padding-small form-item-9 uk-text-center">
			      <div>
			        <div class="uk-margin-small-top uk-position-relative">
			        	<label class="uk-form-label fs-14 uk-position-absolute field_label">Gross Monthly Income<span class="uk-text-red">*</span></label>
			        	<input class="uk-input uk-form-width-input uk-border-rounded add-income" name="grossmonthlyincome" id="grossmonthlyincome" onkeypress="javascript:return isNumber(this,event);" data-current="form-item-9" type="text" placeholder="">
			        	<input type="hidden" name="cardid" id="cardid" value="<?php echo $checkCard->id; ?>" />
			        </div>
			        <div><span class="error mthlyErr" style="display: none;">Error Here</span></div>
			        <div class="fs-11 uk-text-left">
			            <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chkauth_cc2">&nbsp;I authorise Standard Chartered Bank to verify & conduct Credit Bureau Check *</label></div>
			            <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chktc_cc2">&nbsp;I have read the <a href="https://apply.standardchartered.co.in/site/templates/assets/images/cc-tnc.pdf" target="_blank">Terms & Conditions</a> and agree to the terms therein *</label></div>
			        </div>
			        <div class="uk-margin-top uk-overflow-auto">
			        	<button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn cc_first_submit btngrey" uk-toggle="target: #modal-otp" disabled="disabled">Proceed</button>
			        </div>
			        <div class="uk-margin-top uk-overflow-auto">
			        	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-align-left uk-margin-remove">Back</span>
			        </div>
			      </div>
			    </div>
			    <div class="form-item uk-padding-small form-item-10 uk-text-center">
			      <div>
			        <div class="uk-margin-top uk-position-relative">
			        	<label class="uk-form-label fs-14 uk-position-absolute field_label">Annual Income as per ITR*<span class="uk-text-red">*</span></label>
			        	<input class="uk-input uk-form-width-input uk-border-rounded add-income" name="annualincome" id="annualincome" onkeypress="javascript:return isNumber(this,event);" data-current="form-item-10" type="text" placeholder="">
			        	<input type="hidden" name="cardid" id="cardid" value="<?php echo $checkCard->id; ?>" />
			        </div>
			        <div><span class="error mthlyErr" style="display: none;">Error Here</span></div>
			        <div class="fs-11 uk-text-left">
			            <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chkauth_cc3">&nbsp;I authorise Standard Chartered Bank to verify & conduct Credit Bureau Check *</label></div>
			            <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" id="chktc_cc3">&nbsp;I have read the <a href="https://apply.standardchartered.co.in/site/templates/assets/images/cc-tnc.pdf" target="_blank">Terms & Conditions</a> and agree to the terms therein *</label></div>
			        </div>
			        <input type="hidden" name="input_flag" value="3">
          			<input type="hidden" name="product" value="2">
          			<input type="hidden" name="cc_product" value="<?=$input->get->card?>" />
          			<input type="hidden" name="product_url" value="<?=$checkCard->link?>" />
          			<input type="hidden" name="product_type" value="<?=$checkCard->code?>" />
          			<input type="hidden" name="campaign" value="<?=$checkCard->entity_name?>" />
          			<input type="hidden" name="product_image" value="<?=$checkCard->image->url?>" />
          			<input type="hidden" name="card_name" value="<?=$checkCard->title?>" />
                    <input type="hidden" name="utm_campaign" id="utm_campaign" />
                    <input type="hidden" name="utm_source" id="utm_source" />
                    <input type="hidden" name="utm_medium" id="utm_medium" />
                    <input type="hidden" name="utm_adgroup" id="utm_adgroup" />
                    <input type="hidden" name="utm_channel" id="utm_channel" />
                    <input type="hidden" name="utm_param" id="utm_param" />
                    <input type="hidden" name="city" id="city" />
                    <input type="hidden" name="state" id="state" />
                    <input type="hidden" name="initiatedby" id="initiatedby" />
			        <div class="uk-margin-top uk-overflow-auto">
			        	<button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn cc_first_submit btngrey" uk-toggle="target: #modal-otp" disabled="disabled">Proceed</button>
			        </div>
			        <div class="uk-margin-top uk-overflow-auto">
			        	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-align-left uk-margin-remove">Back</span>
			        </div>
			      </div>
			    </div>
	   		</form>

	   	</div>
	</div>
	<ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

</div>


<div id="modal-otp" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
    	<h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
    	<form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle" name="pl_otpfrmetb" id="pl_otpfrmetb">
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Mobile number</label>
    			<div class="uk-inline">
				    <span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
	    			<input class="uk-input uk-form-width-input uk-border-rounded verifymobile" name="verifymobile" id="verifymobile" type="tel" value="" tabindex="1" maxlength="10" onkeypress="javascript:return isNumber(this,event);" />
	    		</div>
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Verification OTP</label>
    			<input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus onkeypress="javascript:return isNumber(this,event);" />
    			<input name="otpvalue" type="hidden" id="otpvalue">
				<input name="otpcheck" type="hidden" id="otpcheck">
				<input name="hiddenlink" type="hidden" id="hiddenlink">
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>&nbsp;</label>
    			<div>
	    			<a href="#" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white go_etb otpplvalidate">Go</a>
		    		<button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill" onclick="OTPResendfn('verifymobile','otpvalue','CC');">Resend</button>		
    			</div>
    		</div>
    	</form>	
    </div>
</div>

<!-- no need to modal popus both are same below one no used  -->
<div id="modal-otp-rtob" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
    	<h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
    	<form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Mobile number</label>
    			<div class="uk-inline">
				    <span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
	    			<input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile1" id="verifymobile1" type="tel" value="" tabindex="1" maxlength="10" onkeypress="javascript:return isNumber(this,event);" />
	    		</div>
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Verification OTP</label>
    			<input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile1" id="otpmobile1" type="tel" value="" tabindex="2" autofocus onkeypress="javascript:return isNumber(this,event);" />
    			<input name="otpvalue" type="hidden" id="otpvalue1">
				<input name="otpcheck" type="hidden" id="otpcheck1">
				<input name="hiddenlink" type="hidden" id="hiddenlink1">
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>&nbsp;</label>
    			<div>
	    			<a href="#" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white preapproved otpccvalidate">Go</a>
		    		<button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill" onclick="OTPResendfn('verifymobile1','otpvalue1','CC');">Resend</button>		
    			</div>
    		</div>
    	</form>	
    </div>
</div>
<div id="rtobModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top">User continues to RTOB for further journey.</h4>
    </div>
</div>

<div id="modal-rs1" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top ff-light uk-primary">Congratulations!</h4>
    	<p>Since you are an existing Standard Chartered credit card client, you do not need to submit any additional documentation! It's simple. <br/>
    		<ul class="uk-text-left" style="padding-left: 15px;">
    			<li>You just need to do a Rs. 1 transaction using your existing Standard Chartered credit card.</li>
    			<li> On successful authentication, your request for an additional card will be processed,subject to bank approvals.</li>
    			<li>The new card will then be sent to your address registered with us.</li>
    			<li>In case your address has changed, please update it first by visiting your nearest branch with supporting documents.</li>
    		</ul>
		</p>

		<hr class="uk-hr">

    	<form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
    		<div class="uk-width-1-1 uk-margin-small">
    			<label><div class="uk-margin-small">Select the name of Standard Chartered credit card you currently hold</div></label>
    			<select name="cc" class="uk-select cc_rs">
    				<option>Select Card</option>
    				<option>Emirates World</option>
    				<option>Manhattan Platinum</option>
    				<option>Super Value Titanium</option>
    				<option>Platinum Rewards</option>
    				<option>Ultimate</option>
    			</select>
    		</div>
    		<div class="uk-width-1-1 uk-margin uk-text-center">
    			<label><input type="checkbox" class="uk-checkbox uk-margin-small-left" name="check-cibil" checked/> Check my eligibility for Credit Limit increase</label>
	    		<a href="#billdeskModal" class="uk-button uk-margin uk-btn-green-bg uk-margin-small-right uk-text-white uk-close" uk-toggle>Proceed to Authenticate</a>
	    		<!-- <a href="#billdeskModal" class="uk-button uk-margin uk-btn-green-bg uk-margin-small-right uk-text-white" uk-toggle>Proceed to Authenticate</a> -->
    		</div>
    	</form>	
    </div>
</div>
<div id="billdeskModal" class="uk-flex-top" uk-modal style="display: none;">
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<h4 class="uk-h2 uk-margin-top">User continues to Billdesk for Rs.1 transaction.</h4>
    </div>
</div>

<div class="uk-margin-large-top uk-container cc-container">
<div class="">

<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
<?php 
// if($_GET['card']=='28229'){

// $features = $pages->get("id=1016");
// }else{
$features = $pages->get("id={$input->get->card}");
//}
	
	
	$f = 1;
	foreach ($features->feature_tabs as $t): 
		if ($f == 1) {
			$factive = "tabs_head_active";
		}else{
			$factive = "";
		}
	?>

	<div id="head_<?=$f?>" class="tabs_head <?=$factive?> uk-width-1-5 uk-text-center p-25 head_desk">
		<h5 class="fs-20 uk-text-35 ff-light"><?=$t->title?></h5>
	</div>

	<?php $f++;
	endforeach ?>
</div>

<div class="tabs_content">

<?php 
// if($_GET['card']=='28229'){

// $features = $pages->get("id=1016");
// }else{
$features = $pages->get("id={$input->get->card}");
//}
$f = 1;
foreach ($features->feature_tabs as $t): 
	if ($f == 1) {
		$factive = "tabs_head_active";
	}else{
		$factive = "";
	}
?>

<div id="head_<?=$f?>" class="hidden_on_desktop hidden_on_tab tabs_head <?=$factive?> uk-text-center uk-padding-small">
	<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove"><?=$t->title?></h5>
</div>
<div id="para_<?=$f?>" class="tabs_para uk-padding">

	<?php if ($t->title == "Benefits"): ?>
		<ul class="uk-grid uk-flex-center">
			<?php foreach ($t->features as $tf): 
			if ($tf->depth == 0) { ?>
				<li class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
					<img src="<?=$tf->image->url?>">
					<div class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile">
						<?=$tf->headline?>
					</div>
				</li>
			<?php } ?>			
			<?php endforeach ?>
		</ul>
	
		<ul class="uk-switcher uk-margin">
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					foreach ($t->features as $tf):
					if ($tf->id == 28461 || $tf->id == 28462 || $tf->id == 28463 || $tf->id == 28464) {
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					foreach ($t->features as $tf):
					if ($tf->id == 28465 || $tf->id == 28466 || $tf->id == 28467) {
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					foreach ($t->features as $tf):
					if ($tf->id == 28468 || $tf->id == 28469) {
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
		</ul>
		
	<?php endif ?>

	<?php if ($t->chart_table): ?>
		<table class="uk-table uk-table-striped ff-helvetica fs-18 uk-text-center value-table">
			<?php foreach ($t->chart_table as $table): ?>
				<tr>
					<?php foreach ($table->table_row as $tr): ?>
						<?php if ($table->toggle == 1): ?>
							<th class="uk-text-center"><?=$tr->stat?></th>
						<?php else: ?>
							<td><?=$tr->stat?></td>
						<?php endif ?>	
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
	<?php endif ?>

	<?php if ($t->title == "Fees and charges"): ?>
		<div class="uk-grid uk-divider">
			<div class="uk-width-1-4 hidden_on_mobile"></div>
			<?php foreach ($t->features as $tf): ?>
				<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
		          <img class="docs_img" src="<?=$tf->image->url?>">
		          <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->desc?></h4>
		        </div>	
			<?php endforeach ?>
		    <div class="uk-width-1-4 hidden_on_mobile"></div>
		</div>
	<?php endif ?>

	<?php if ($t->title == "FAQs"): ?>
		<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
		   <ul class="faqs" uk-accordion="multiple: true">
			   	<?php 
				   	$fidex = 1;
					foreach ($t->faqs as $faq) {
						if ($findex == 1) {
							$faq_active = "uk-open";
						}else{
							$faq_active = "";
						}
				?>
				    <li class="<?=$faq_active?>">
				        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#"><?=$faq->headline?><span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
				        <div class="uk-accordion-content">
				            <p class="uk-text-89 fs-16"><?=$faq->summary?></p>
				        </div>
				    </li>
				<?php
					}
				?>
			</ul>
		</div>
	<?php endif ?>

	<?php if ($t->title == "Eligibility and documentation"): ?>
		<ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
			<?php foreach ($t->features as $tf):

			if ($tf->depth == 0) { ?>
				<li>
					<a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#"><?=$tf->headline?></a>
				</li>
			<?php } ?>			
			<?php endforeach ?>
		</ul>
	
		<ul class="uk-switcher uk-margin">
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					$i=1;
					foreach ($t->features as $tf):
						//echo $tf->id." ".$tf->headline;
					//if ($tf->id == 28473 || $tf->id == 28474 || $tf->id == 28475 || $tf->id == 28476) {
						if($tf->features_type->title=="eligibility criteria"){
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					foreach ($t->features as $tf):
					//if ($tf->id == 28477 || $tf->id == 28478 || $tf->id == 28479) {
					if($tf->features_type->title=="salaried"){
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
			<li>
				<div class="uk-grid uk-flex-center">
				<?php
					foreach ($t->features as $tf):
					//if ($tf->id == 28480 || $tf->id == 28481 || $tf->id == 28482) {
						if($tf->features_type->title=="self-employed"){
					?>
					<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
		              <img class="docs_img" src="<?=$tf->image->url?>">
		              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
		            </div>	
				<?php } endforeach  ?>
				</div>
			</li>
		</ul>
	<?php endif ?>

</div>

<?php $f++;
endforeach ?>
	
</div><!-- tabs_content -->
</div><!-- uk-box-shadow-large -->
</div><!-- cc-container -->


<div id="tnc-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Terms &amp; Conditions</h2>
        <button class="uk-modal-close-default" type="button" uk-close></button>
    </div>
</div>
<script type="text/javascript">
	var root = '<?php echo $root; ?>';
	function OTPfn(){
		console.log('OTPfn');
		//alert('hello'); return false;
		if($('#verifymobile').val()==""){
			alert('Please enter mobile number');
			return false;
		}else{
			alert('else here');
		var mob =$('#verifymobile').val();
		var data = "mobile="+mob+"&post_type=otp";
			$.ajax({
	  	        url: root+"apis/form-api-general/",
				type: 'GET',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response);
					console.log(response.genotp);
					if(response.status=="1"){
						alert("Error#"+response); 
						$("#otpvalue").val(response.genotp);
					}
					// }else{
					//   //$(".go_etb").attr("href","<?=$siteUrl?>personal-loan/view-quote/?e=1&u="+response.unique_id);
					// }
				},
				error:function(error){
					console.log(error);
				}

			});
		}

	}

</script>			
<?php include 'partials/footer_cc.php'; ?>