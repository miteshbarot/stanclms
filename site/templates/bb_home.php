<?php include "partials/header_bb.php";?>

<style>
.uk-subnav li a{
        border-bottom: 1px solid #fff;
        background-color: #fff!important;
      }
      .uk-subnav li.uk-active a,.uk-subnav-pill>.uk-active>a{
        border-bottom: 1px solid #0775B1;background-color: #fff!important
      }
      .field_label{
        top: -30px;color: #000!important;
      }
          /* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: -6px;
  height: 16px;
  width: 16px;
  background-color: #fff;
  border-radius: 50%;
  border: 2px solid #38d200;
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
#pl_employer_name.loading {
    background: url('<?=$tpl?>assets/images/loading.gif') no-repeat right center;
}
.dropdownList { 
  max-height: 200px; 
  overflow-y: scroll; 
  overflow-x: hidden;
}
</style>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: slide;ratio:16:5;">
    <ul class="uk-slideshow-items black-bg">
      <?php foreach ($page->carousel as $banner): ?>
        <li>
            <img class="hidden_on_mobile uk-width-1-1" src="<?=$banner->image->url?>"/>
            <img class="hidden_on_desktop hidden_on_tab" src="<?=$banner->image_alt->url?>"/>
            <h2 class="fs-32 uk-text-white banner_heading uk-margin-remove fs-22-mobile"><?=$banner->title?></h2>
        </li>
      <?php endforeach ?>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-position-bottom-center"></ul>

	<div class="uk-position-absolute form_section uk-border-rounded">
		<div class="uk-background-white uk-br-med">
	   		<div class="uk-position-relative uk-text-center">
	   			<img class="form_bg" src="<?=$tpl?>assets/images/form-bg.png">
	   			<h2 class="uk-text-center ff-helvetica-bold fs-26 fs-18-mobile uk-margin-remove form_head">Apply for Business banking</h2>
	   		</div>
	   		<div class="uk-text-center uk-margin-top">
			  <ul class="timeline three-steps">
			    <li class="active ff-helvetica">Select product</li>
			    <li class="ff-helvetica">Verification</li>
			    <li class="ff-helvetica">Business details</li>
			  </ul>
			</div>
	   		<form class="form_slider uk-position-relative" id="bb_form" method="post">				
	   			<div class="form-item active uk-padding-small form-item-1 uk-text-center">
		            <div class="f-inn f-inn-radiobut">
				        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing relationship<br>with Standard Chartered Bank?</div>
				        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer">
				        	<label class="container uk-position-relative">
				        		<input class="bb_choice_1" type="radio" name="choice_1" value="1" data-target="form-item-2" data-current="form-item-1"/>
				        		<span class="checkmark"></span>&nbsp;&nbsp;Yes</label>
				        </div>
				        <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer">
				        	<label class="container uk-position-relative">
				        		<input class="bb_choice_2" type="radio" name="choice_1" value="0" data-target="form-item-2" data-current="form-item-1" />
				        		<span class="checkmark"></span>&nbsp;&nbsp;No</label>
				        </div>
		            </div>
	            	<div class="">
	                	<span id="bb_choice_1" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-1" style="display: none;">Next</span>
	              	</div>
			    </div>

			    <div class="form-item uk-padding-small form-item-2 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Product Requirement<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="product_of_interest" name="product_of_interest">
			                <option>Select Product</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Business Instalment Loan</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Guaranteed Instalment Loan</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Loan Against Property</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Business Working Capital</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Current Account</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Insurance/Investment</option>
                      		<option data-target="form-item-3" data-current="form-item-2">Trade/FX</option>
                      		<option class="s2b" style="display: none;" data-target="form-item-3" data-current="form-item-2">Straight2Bank</option>
				        </select>
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="product_of_interest_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-3" data-current="form-item-2" style="display:none;">Next</span>
				    </div>
			    </div>
			    
			    <!-- <div class="form-item uk-padding-small form-item-2 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Relation type<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="relation_type" name="relation_type">
			                <option>Select Relation type</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Current account</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Savings account</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Business Instalment Loan</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Loan Against Property</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Credit Card</option>
                      		<option data-target="form-item-2a" data-current="form-item-2">Home Loan</option>
                      		<option data-value="other">Other</option>
				        </select>
			    	</div>
			    	<div id="otherInputBox" class="uk-form-controls uk-position-relative form-box" style="display: none; margin-top: -30px;">
			    		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Other Relation Type" data-target="form-item-2a" data-current="form-item-2">
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="relation_type_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-2a" data-current="form-item-2" style="display: none;">Next</span>
				    </div>
			    </div> -->

			    <div class="form-item uk-padding-small form-item-3 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">City<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="city" name="city">
			                <option value="0">Select</option>
							<option data-target="form-item-4" data-current="form-item-3">Ahmedabad</option>
							<option data-target="form-item-4" data-current="form-item-3">Bengaluru</option>
							<option data-target="form-item-4" data-current="form-item-3">Chandigarh</option>
							<option data-target="form-item-4" data-current="form-item-3">Chennai</option>
							<option data-target="form-item-4" data-current="form-item-3">Cochin</option>
							<option data-target="form-item-4" data-current="form-item-3">Coimbatore</option>
							<option data-target="form-item-4" data-current="form-item-3">Hyderabad/Secunderabad</option>
							<option data-target="form-item-4" data-current="form-item-3">Indore</option>
							<option data-target="form-item-4" data-current="form-item-3">Jaipur</option>
							<option data-target="form-item-4" data-current="form-item-3">Kolkata</option>
							<option data-target="form-item-4" data-current="form-item-3">Ludhiana</option>
							<option data-target="form-item-4" data-current="form-item-3">Mumbai/Navi Mumbai/Thane</option>
							<option data-target="form-item-4" data-current="form-item-3">Nagpur</option>
							<option data-target="form-item-4" data-current="form-item-3">New Delhi</option>
							<option data-target="form-item-4" data-current="form-item-3">Pune</option>
							<option data-target="form-item-4" data-current="form-item-3">Rajkot</option>
							<option data-target="form-item-4" data-current="form-item-3">Surat</option>
							<option data-target="form-item-4" data-current="form-item-3">Vadodara</option>
							<option data-target="form-item-4" data-current="form-item-3">Agra</option>
							<option data-target="form-item-4" data-current="form-item-3">Ajmer</option>
							<option data-target="form-item-4" data-current="form-item-3">Allahabad</option>
							<option data-target="form-item-4" data-current="form-item-3">Alwar</option>
							<option data-target="form-item-4" data-current="form-item-3">Amritsar</option>
							<option data-target="form-item-4" data-current="form-item-3">Anand</option>
							<option data-target="form-item-4" data-current="form-item-3">Bahadurgarh</option>
							<option data-target="form-item-4" data-current="form-item-3">Bareilly</option>
							<option data-target="form-item-4" data-current="form-item-3">Belgaum</option>
							<option data-target="form-item-4" data-current="form-item-3">Bhilai</option>
							<option data-target="form-item-4" data-current="form-item-3">Bhiwadi</option>
							<option data-target="form-item-4" data-current="form-item-3">Bhopal</option>
							<option data-target="form-item-4" data-current="form-item-3">Bikaner</option>
							<option data-target="form-item-4" data-current="form-item-3">Bokaro</option>
							<option data-target="form-item-4" data-current="form-item-3">Calicut</option>
							<option data-target="form-item-4" data-current="form-item-3">Cuttack</option>
							<option data-target="form-item-4" data-current="form-item-3">Dehradun</option>
							<option data-target="form-item-4" data-current="form-item-3">Dharuhera</option>
							<option data-target="form-item-4" data-current="form-item-3">Faridabad</option>
							<option data-target="form-item-4" data-current="form-item-3">Gandhidham</option>
							<option data-target="form-item-4" data-current="form-item-3">Ghaziabad</option>
							<option data-target="form-item-4" data-current="form-item-3">Goa</option>
							<option data-target="form-item-4" data-current="form-item-3">Gurgaon</option>
							<option data-target="form-item-4" data-current="form-item-3">Guwahati</option>
							<option data-target="form-item-4" data-current="form-item-3">Hubli</option>
							<option data-target="form-item-4" data-current="form-item-3">Jabalpur</option>
							<option data-target="form-item-4" data-current="form-item-3">Jalandhar</option>
							<option data-target="form-item-4" data-current="form-item-3">Jammu</option>
							<option data-target="form-item-4" data-current="form-item-3">Jamshedpur</option>
							<option data-target="form-item-4" data-current="form-item-3">Jodhpur</option>
							<option data-target="form-item-4" data-current="form-item-3">Kalyan</option>
							<option data-target="form-item-4" data-current="form-item-3">Kanpur</option>
							<option data-target="form-item-4" data-current="form-item-3">Kota</option>
							<option data-target="form-item-4" data-current="form-item-3">Kozhikode</option>
							<option data-target="form-item-4" data-current="form-item-3">Lucknow</option>
							<option data-target="form-item-4" data-current="form-item-3">Madurai</option>
							<option data-target="form-item-4" data-current="form-item-3">Manesar</option>
							<option data-target="form-item-4" data-current="form-item-3">Mangalore</option>
							<option data-target="form-item-4" data-current="form-item-3">Mathura</option>
							<option data-target="form-item-4" data-current="form-item-3">Meerut</option>
							<option data-target="form-item-4" data-current="form-item-3">Mohali</option>
							<option data-target="form-item-4" data-current="form-item-3">Mysore</option>
							<option data-target="form-item-4" data-current="form-item-3">Nashik</option>
							<option data-target="form-item-4" data-current="form-item-3">Noida/Greater Noida</option>
							<option data-target="form-item-4" data-current="form-item-3">Patiala</option>
							<option data-target="form-item-4" data-current="form-item-3">Patna</option>
							<option data-target="form-item-4" data-current="form-item-3">Pondicherry</option>
							<option data-target="form-item-4" data-current="form-item-3">Raipur</option>
							<option data-target="form-item-4" data-current="form-item-3">Ranchi</option>
							<option data-target="form-item-4" data-current="form-item-3">Sonepat</option>
							<option data-target="form-item-4" data-current="form-item-3">Trichy</option>
							<option data-target="form-item-4" data-current="form-item-3">Trivandrum</option>
							<option data-target="form-item-4" data-current="form-item-3">Udaipur</option>
							<option data-target="form-item-4" data-current="form-item-3">Udupi</option>
							<option data-target="form-item-4" data-current="form-item-3">Vapi</option>
							<option data-target="form-item-4" data-current="form-item-3">Vellore</option>
							<option data-target="form-item-4" data-current="form-item-3">Vijayawada</option>
							<option data-target="form-item-4" data-current="form-item-3">Visakhapatnam</option>
				        </select>
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="city_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-4" data-current="form-item-3" style="display:none;">Next</span>
				    </div>
			    </div>

			    <div class="form-item uk-padding-small form-item-4 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
		      			<label class="uk-form-label fs-14 uk-position-absolute field_label">Your name<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="fname" name="fname" data-target="form-item-5" data-current="form-item-4">
		  				<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
		        		<span id="fname_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-5" data-current="form-item-4" style="display: none">Next</span>
			      </div>
				</div>

				<div class="form-item uk-padding-small form-item-5 uk-text-center">
				    <div class="uk-margin-small-top uk-position-relative">
		              <label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
		              <div class="uk-inline">
				    	<span class="uk-form-icon icon-plus-91"></span>
			            <input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="mobile" name="mobile" onkeypress="javascript:return isNumber(this,event);" maxlength="10">
			          </div>
		              <span class="error mblErr" style="display: none;">Error Here</span>
		            </div>
		            <div class="fs-11 uk-text-left">
		                <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" required>&nbsp;I authorize Standard Chartered Bank to contact me. This will override registry on DND / NDNC *</label></div>
		            </div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-6" data-current="form-item-5" id="mobile_next" style="display: none;">Next</span>
				    </div>
			    </div>

			    <div class="form-item uk-padding-small form-item-6 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
		      			<label class="uk-form-label fs-14 uk-position-absolute field_label">Email Address<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="email" name="email" data-target="form-item-7" data-current="form-item-6">
		  				<span class="error emailErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
		        		<span class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-7" data-current="form-item-6" id="email_next" style="display: none;">Next</span>
			      </div>
				</div>

			    <div class="form-item uk-padding-small form-item-7 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Nature of Business<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="business_type" name="business_type">
			                <option>Select Nature of Business</option>
                      		<option data-target="form-item-8" data-current="form-item-7">Manufacturing</option>
                      		<option data-target="form-item-8" data-current="form-item-7">Trading</option>
                      		<option data-target="form-item-8" data-current="form-item-7">Professional</option>
                      		<option data-target="form-item-8" data-current="form-item-7">Services</option>
                      		<option data-value="other">Others</option>
				        </select>
			    	</div>
			    	<div id="other_business_type" class="uk-form-controls uk-position-relative form-box" style="display: none; margin-top: -30px;">
			    		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Others"  data-target="form-item-8" data-current="form-item-7" />
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="business_type_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-8" data-current="form-item-7" style="display: none;">Next</span>
				    </div>
			    </div>

			    <!-- <div class="form-item uk-padding-small form-item-3 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Constitution<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="constitution" name="constitution">
			                <option>Select Constitution</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Proprietorship</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Professional</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Public Limited</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Private Limited</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Partnership</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Trust</option>
                      		<option data-target="form-item-4" data-current="form-item-3">Society</option>
                      		<option data-value="other">Other</option>
				        </select>
			    	</div>
			    	<div id="otherConstitutionInputBox" class="uk-form-controls uk-position-relative form-box" style="display: none; margin-top: -30px;">
			    		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Other Constitution" data-target="form-item-4" data-current="form-item-3">
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="constitution_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-4" data-current="form-item-3" style="display: none;">Next</span>
				    </div>
			    </div>

				<div class="form-item uk-padding-small form-item-5 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
		      			<label class="uk-form-label fs-14 uk-position-absolute field_label">Name of the entity<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="entity_name" name="entity_name" data-target="form-item-6" data-current="form-item-5">
		  				<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
		        		<span id="entity_name_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-6" data-current="form-item-5" style="display: none;">Next</span>
			      </div>
				</div>

				<div class="form-item uk-padding-small form-item-6 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">City<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="city" name="city">
				        	<option>Select City</option>
							<option data-target="form-item-7" data-current="form-item-6">Ahmedabad</option>
							<option data-target="form-item-7" data-current="form-item-6">Bengaluru</option>
							<option data-target="form-item-7" data-current="form-item-6">Chandigarh</option>
							<option data-target="form-item-7" data-current="form-item-6">Chennai</option>
							<option data-target="form-item-7" data-current="form-item-6">Cochin</option>
							<option data-target="form-item-7" data-current="form-item-6">Coimbatore</option>
							<option data-target="form-item-7" data-current="form-item-6">Hyderabad/Secunderabad</option>
							<option data-target="form-item-7" data-current="form-item-6">Indore</option>
							<option data-target="form-item-7" data-current="form-item-6">Jaipur</option>
							<option data-target="form-item-7" data-current="form-item-6">Kolkata</option>
							<option data-target="form-item-7" data-current="form-item-6">Ludhiana</option>
							<option data-target="form-item-7" data-current="form-item-6">Mumbai/Navi Mumbai/Thane</option>
							<option data-target="form-item-7" data-current="form-item-6">Nagpur</option>
							<option data-target="form-item-7" data-current="form-item-6">New Delhi</option>
							<option data-target="form-item-7" data-current="form-item-6">Pune</option>
							<option data-target="form-item-7" data-current="form-item-6">Rajkot</option>
							<option data-target="form-item-7" data-current="form-item-6">Surat</option>
							<option data-target="form-item-7" data-current="form-item-6">Vadodara</option>
							<option data-target="form-item-7" data-current="form-item-6">Agra</option>
							<option data-target="form-item-7" data-current="form-item-6">Ajmer</option>
							<option data-target="form-item-7" data-current="form-item-6">Allahabad</option>
							<option data-target="form-item-7" data-current="form-item-6">Alwar</option>
							<option data-target="form-item-7" data-current="form-item-6">Amritsar</option>
							<option data-target="form-item-7" data-current="form-item-6">Anand</option>
							<option data-target="form-item-7" data-current="form-item-6">Bahadurgarh</option>
							<option data-target="form-item-7" data-current="form-item-6">Bareilly</option>
							<option data-target="form-item-7" data-current="form-item-6">Belgaum</option>
							<option data-target="form-item-7" data-current="form-item-6">Bhilai</option>
							<option data-target="form-item-7" data-current="form-item-6">Bhiwadi</option>
							<option data-target="form-item-7" data-current="form-item-6">Bhopal</option>
							<option data-target="form-item-7" data-current="form-item-6">Bikaner</option>
							<option data-target="form-item-7" data-current="form-item-6">Bokaro</option>
							<option data-target="form-item-7" data-current="form-item-6">Calicut</option>
							<option data-target="form-item-7" data-current="form-item-6">Cuttack</option>
							<option data-target="form-item-7" data-current="form-item-6">Dehradun</option>
							<option data-target="form-item-7" data-current="form-item-6">Dharuhera</option>
							<option data-target="form-item-7" data-current="form-item-6">Faridabad</option>
							<option data-target="form-item-7" data-current="form-item-6">Gandhidham</option>
							<option data-target="form-item-7" data-current="form-item-6">Ghaziabad</option>
							<option data-target="form-item-7" data-current="form-item-6">Goa</option>
							<option data-target="form-item-7" data-current="form-item-6">Gurgaon</option>
							<option data-target="form-item-7" data-current="form-item-6">Guwahati</option>
							<option data-target="form-item-7" data-current="form-item-6">Hubli</option>
							<option data-target="form-item-7" data-current="form-item-6">Jabalpur</option>
							<option data-target="form-item-7" data-current="form-item-6">Jalandhar</option>
							<option data-target="form-item-7" data-current="form-item-6">Jammu</option>
							<option data-target="form-item-7" data-current="form-item-6">Jamshedpur</option>
							<option data-target="form-item-7" data-current="form-item-6">Jodhpur</option>
							<option data-target="form-item-7" data-current="form-item-6">Kalyan</option>
							<option data-target="form-item-7" data-current="form-item-6">Kanpur</option>
							<option data-target="form-item-7" data-current="form-item-6">Kota</option>
							<option data-target="form-item-7" data-current="form-item-6">Kozhikode</option>
							<option data-target="form-item-7" data-current="form-item-6">Lucknow</option>
							<option data-target="form-item-7" data-current="form-item-6">Madurai</option>
							<option data-target="form-item-7" data-current="form-item-6">Manesar</option>
							<option data-target="form-item-7" data-current="form-item-6">Mangalore</option>
							<option data-target="form-item-7" data-current="form-item-6">Mathura</option>
							<option data-target="form-item-7" data-current="form-item-6">Meerut</option>
							<option data-target="form-item-7" data-current="form-item-6">Mohali</option>
							<option data-target="form-item-7" data-current="form-item-6">Mysore</option>
							<option data-target="form-item-7" data-current="form-item-6">Nashik</option>
							<option data-target="form-item-7" data-current="form-item-6">Noida/Greater Noida</option>
							<option data-target="form-item-7" data-current="form-item-6">Patiala</option>
							<option data-target="form-item-7" data-current="form-item-6">Patna</option>
							<option data-target="form-item-7" data-current="form-item-6">Pondicherry</option>
							<option data-target="form-item-7" data-current="form-item-6">Raipur</option>
							<option data-target="form-item-7" data-current="form-item-6">Ranchi</option>
							<option data-target="form-item-7" data-current="form-item-6">Sonepat</option>
							<option data-target="form-item-7" data-current="form-item-6">Trichy</option>
							<option data-target="form-item-7" data-current="form-item-6">Trivandrum</option>
							<option data-target="form-item-7" data-current="form-item-6">Udaipur</option>
							<option data-target="form-item-7" data-current="form-item-6">Udupi</option>
							<option data-target="form-item-7" data-current="form-item-6">Vapi</option>
							<option data-target="form-item-7" data-current="form-item-6">Vellore</option>
							<option data-target="form-item-7" data-current="form-item-6">Vijayawada</option>
							<option data-target="form-item-7" data-current="form-item-6">Visakhapatnam</option>
				        </select>
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="city_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-7" data-current="form-item-6" style="display: none">Next</span>
				    </div>
			    </div>	 -->


				<div class="form-item uk-padding-small form-item-8 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
				    	<?php
				    		$maxyear = date('Y');
			               	$maxyear = intval($maxyear);
			               	$minyear = $maxyear - 5;
				    	?>
              			<label class="uk-form-label fs-14 field_label">Start date for current Business/Profession<span class="uk-text-red">*</span></label>
              			<div class="uk-grid uk-grid-small uk-child-width-1-2">
              				<div>
              					<select class="uk-select uk-form-width-input uk-border-rounded" id="start_year" name="start_year">
					                <option>YYYY</option>
					               	<option><?=$maxyear?></option>
					               	<option><?=$maxyear - 1?></option>
					               	<option><?=$maxyear - 2?></option>
					               	<option><?=$maxyear - 3?></option>
					               	<option><?=$maxyear - 4?></option>
		                      		<option>Before <?=$minyear?></option>
						        </select>
              				</div>
              				<div>
              					<select class="uk-select uk-form-width-input uk-border-rounded" id="start_mm" name="start_mm" disabled="true">
					                <option>Month</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Jan</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Feb</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Mar</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Apr</option>
					               	<option data-target="form-item-9" data-current="form-item-8">May</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Jun</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Jul</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Aug</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Sep</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Oct</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Nov</option>
					               	<option data-target="form-item-9" data-current="form-item-8">Dec</option>
						        </select>
              				</div>
              			</div>
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-9" data-current="form-item-8" id="start_mm_next" style="display: none">Next</span>
				    </div>
			    </div>

			    

		        <div class="form-item uk-padding-small form-item-9 uk-text-center">
		            <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label uk-position-absolute fs-14 field_label">Turnover range<span class="uk-text-red">*</span></label>
              			
      					<select class="uk-select uk-form-width-input uk-border-rounded" id="turnover" name="turnover">
			                <option>Select turnover</option>
			               	<option>Less than 2.0 Cr</option>
			               	<option>2.0 Cr to 5.0 Cr</option>
			               	<option>5.0 Cr to 15.0 Cr</option>
			               	<option>15.0 Cr to 45.0 Cr</option>
			               	<option>45.0 Cr to 60.0 Cr</option>
			               	<option>More than 60.0 Cr</option>
				        </select>
			    	</div>
		            <div class="fs-11 uk-text-left">
		                <!-- <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" checked>&nbsp;I authorize Standard Chartered Bank to contact me. This will override registry on DND / NDNC *</label></div> -->
		                <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" required>&nbsp;I have read the <a href="#termsconditions" title="Terms & Conditions" uk-toggle>Terms & Conditions</a> and agree to the terms therein *</label></div>
		            </div>
		           <div class="uk-margin-top uk-overflow-auto"><button class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn submit_bb_btn">Proceed</button></div><!-- uk-toggle="target: #modal-otp-etb" -->
		            <div class="uk-margin-top uk-overflow-auto">
		                <span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold uk-margin-remove uk-align-left"> Back</span>
		              </div>
		          </div>
		          <input type="hidden" name="input_flag" value="6">
		          <input type="hidden" name="product" value="4"> 
		          <input type="hidden" name="utm_campaign" id="utm_campaign" />
                  		<input type="hidden" name="utm_source" id="utm_source" />
                 	 <input type="hidden" name="utm_medium" id="utm_medium" />
                  <input type="hidden" name="utm_adgroup" id="utm_adgroup" />
                  <input type="hidden" name="utm_channel" id="utm_channel" />
                  <input type="hidden" name="utm_param" id="utm_param" />      
	   		</form>
	   	</div>
	</div>
</div>

<div id="termsconditions" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/in-personal-loan-most-imp-tnc.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>

<div id="modal-otp-etb" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
      <h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
      <form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Mobile number</label>
          <div class="uk-inline">
			<span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
	        <input class="uk-input uk-form-width-input uk-border-rounded verifymobile" name="verifymobile" type="tel" value="9988776655" tabindex="1" />
	      </div>
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Verification OTP</label>
          <input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus />
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>&nbsp;</label>
          <div>
            <a href="#" class="go_etb uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white">Go</a>
            <button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill">Resend</button>   
          </div>
        </div>
      </form> 
    </div>
</div>
<div class="uk-margin-large-top uk-margin-large-bottom uk-container" style="padding-top: 30px;">
<div class="bb-container">
	<div class="uk-grid uk-grid-collapse uk-grid-match">
        <div class="uk-width-auto@m">
            <ul class="uk-tab-left" uk-tab="connect: #bb-features; animation: uk-animation-fade">
            	<?php foreach ($page->features as $f): ?>
            		<li><a href="#"><?=$f->headline?></a></li>	
            	<?php endforeach ?>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
        <div class="uk-width-expand@m">
            <ul id="bb-features" class="uk-switcher">
                <?php foreach ($page->features as $f): ?>
            		<li class="uk-overflow-auto" style="max-height: 448px">
            			<h2><?=$f->headline?></h2>
            			<?=$f->desc?>
            		</li>	
            	<?php endforeach ?>
                <li class="uk-overflow-auto" style="max-height: 448px">
                	<h2>Frequently Asked Questions</h2>
                	<ul class="faqs" uk-accordion="multiple: true">
                		<?php 
                		$i = 0;
                		foreach ($page->faqs as $faq): 
                			if ($i == 1) {
                				$open = "uk-open";
                			}else{
                				$open = "";
                			}
                		?>
                		<?php if ($faq->summary == "isHeader" || $faq->summary == "isSubHeader"): ?>
							<!-- do nothing for now -->
						<?php else: ?>
							<li class="<?=$open?>">
						        <a class="uk-accordion-title" href="#"><?=$faq->headline?></a>
						        <div class="uk-accordion-content">
						            <?php
						            	$string = $faq->summary;
						            	$string = ltrim($string, "•");
						            	if (strpos($string, "•") !== false) {
						            		$list = explode("•", $string);
							            	echo "<ul class='uk-list uk-list-bullet'>";
							            	foreach ($list as $l) {
							            		echo "<li>{$l}</li>";
							            	}
							            	echo "</ul>";
						            	}else{
						            		echo $faq->summary;
						            	}
						            ?>
						        </div>
						    </li>
						<?php endif ?>
                		<?php 
                		$i++;
                		endforeach ?>
					</ul>
                </li>
            </ul>
        </div>
    </div>
</div><!-- bb-container -->
</div><!-- uk-container -->

<script type="text/javascript" src="<?=$tpl?>assets/js/jquery.min.js"></script>
<script src="<?=$tpl?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
//for ETB show Straight2Bank option in products
$(".bb_choice_1").click(function(){
	$(".s2b").show();
});
//for NTB hide Straight2Bank option in products
$(".bb_choice_2").click(function(){
	$(".s2b").hide();
});
</script>
<?php 
include '_form_handling.php'; 
/*
idle popup to be enabled after chat & request callback is implemented
include '_idle_popup.php'; */
include "partials/footer_bb.php";
?>