<?php namespace ProcessWire;
include "partials/header_pl.php";
include "partials/_general_function.php";
 $employer_industry = $pages->get(31459)->children;

?>

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
 /* background-color: #ccc;*/
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
  background: #38d200;
}
#pl_employer_name.loading {
    background: url('<?=$tpl?>assets/images/loading.gif') no-repeat right center;
}
.dropdownList { 
  max-height: 200px; 
  overflow-y: scroll; 
  overflow-x: hidden;
}
	@media screen and (max-width:1024px) {
		.uk-slideshow-items {
			min-height: 450px !important;
		}
		.form_section h2 {
			font-size: 20px;
		}
		.timeline li {
			font-size: 14px;
		}
		.fs-18 {
			font-size: 16px;
		}
		.ff-helvetica, input, textarea, select, label, .uk-input, .uk-textarea, .uk-select, .uk-label {
			font-size: 16px;
		}
		.checkmark {
			left: -3px;
    		height: 13px;
    		width: 13px;
		}
		
		.container .checkmark:after {
   			 top: 3px;
    		left: 3px;
		}
	}
	
	@media screen and (width:768px) {
		.uk-slideshow-items {
			min-height: 330px !important;
		}
		.form_section{
			margin-top: 2%;
		}
		.banner_heading {
			width: 60%;
			top:30%;
		
	}
	}
		
	@media screen and (max-width:480px) {
		.uk-slideshow-items {
			min-height: 280px !important;
		}
		.form_section h2 {
			font-size: 20px;
		}
		.timeline li {
			font-size: 14px;
		}
		.fs-18 {
			font-size: 16px;
		}
		.ff-helvetica, input, textarea, select, label, .uk-input, .uk-textarea, .uk-select, .uk-label {
			font-size: 16px;
		}
		.checkmark {
			left: -3px;
    		height: 13px;
    		width: 13px;
		}
		
		.container .checkmark:after {
   			 top: 3px;
    		left: 3px;
		}
	}
	.btngrey{background: grey;}
</style>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: slide;ratio:16:5;">
    <ul class="uk-slideshow-items black-bg">
      <?php foreach ($page->carousel as $banner): ?>
        <li>
            <img class="hidden_on_mobile hide_for_tab uk-width-1-1" src="<?=$banner->image->url?>"/>
            <img class="show_on_tablet" src="<?=$banner->image_tablet->url?>" style="width:100%" />
            <img class="hidden_on_desktop hide_for_tab" src="<?=$banner->image_alt->url?>"/>
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
	   			<h2 class="uk-text-center ff-helvetica-bold fs-26 fs-18-mobile uk-margin-remove form_head">Get instant decision</h2>
	   		</div>
	   		<div class="uk-text-center uk-margin-top">
			  <ul class="timeline">
			    <li class="active ff-helvetica">Eligibility</li>
			    <li class="ff-helvetica">Offer</li>
			    <li class="ff-helvetica">Application</li>
			    <li class="ff-helvetica">Documents</li>
			  </ul>
			</div>
	   		<form class="form_slider uk-position-relative" id="pl_first_form" method="post">
	   			<div class="form-item active uk-padding-small form-item-1 uk-text-center">
		            <div class="f-inn f-inn-radiobut">
					        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing relationship<br>with Standard Chartered Bank?<span class="uk-text-red">*</span></div>
					        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input class="pl_choice_1" type="radio" name="choice_1" value="1" data-target="form-item-2" data-current="form-item-1"/><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div>
					           <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer"><label class="container uk-position-relative"><input class="pl_choice_1" type="radio" name="choice_1" value="0" data-target="form-item-7" data-current="form-item-1" /><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
		            </div>
			      <label></label>
            		<div class="">
                		<span id="pl_choice_1" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-1" style="display: none;">Next</span>
              		</div>
			    </div>
			    <div class="form-item uk-padding-small form-item-2 uk-text-center">
		            <div class="f-inn f-inn-radiobut">
					      <label>
					        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Do you have an existing<br>Standard Chartered Bank Debit/Credit Card?<span class="uk-text-red">*</span></div>
					        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input class="pl_choice_2" type="radio" 
					        	name="choice_2" value="1" data-target="form-item-22"  data-current="form-item-2" /><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div>
					        <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer"><label class="container uk-position-relative"><input class="pl_choice_2" type="radio" name="choice_2" value="0" data-target="form-item-7"  data-current="form-item-2" /><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
					      </label>
		            </div>
			      <div class="uk-margin-medium-top">
			      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
              <span id="pl_choice_2" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-2" style="display: none;">Next</span>
			      </div>
			    </div>
			    <div class="form-item uk-padding-small form-item-7 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Employment Type<span class="uk-text-red">*</span></label>
				        	<select class="uk-select uk-form-width-input uk-border-rounded" id="pl_emptype" name="emp_type">
			                <option value="">Select Employment Type</option>
                      		<option data-target="form-item-8" data-current="form-item-7" value="1">Salaried</option>
                      		<!-- <option data-target="form-item-12" data-current="form-item-7" value="2">Self Employed Business
                      		</option> -->
                      		<option data-target="form-item-12" data-current="form-item-7" value="3">Self Employed Professional</option>
				        </select>
			    	</div>
			    	<div class="">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">   Back</span>
                		<span id="pl_emptype_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="" data-current="form-item-7" style="display: none;">Next</span>
				    </div>
			    </div>
			    <div class="form-item uk-padding-small form-item-8 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box-20">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Employer Name<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded pl_employer_name alpha-only" type="text" placeholder="" id="pl_employer_name" name="pl_home_emp_name" data-target="form-item-9" data-current="form-item-8" data-value="<?php echo $root; ?>">
              			<span class="error commonErr" style="display: none;">Error Here</span>
              			<input type="hidden" name="emp_code" id="emp_code" />
		              	<div id="companies_ajax">
		                	<ul></ul>
		              	</div>
				    </div>
				    <div class="">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold ">
			      			Back</span>
                		<span id="pl_employer_name_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-9" data-current="form-item-8" style="display: none;">Next</span>
			      	</div>
				</div>
				<div class="form-item uk-padding-small form-item-9 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Industry Segment<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="pl_off_industry" name="emp_industry">
			                <option value="">Select Industry Segment</option>
			                <?php foreach ($employer_industry as $ins) { ?>
								<option value="<?=$ins->id?>" data-target="form-item-10" data-current="form-item-9" ><?=$ins->title?></option>
						 <?php } ?>
			            <!--     <option value="Accountancy" data-target="form-item-10" data-current="form-item-9">Accountancy</option>
			                <option value="Advertising" data-target="form-item-10" data-current="form-item-9">Advertising</option>
			                <option value="Airlines" data-target="form-item-10" data-current="form-item-9">Airlines</option>
			                <option value="Automobiles" data-target="form-item-10" data-current="form-item-9">Automobiles</option>
			                <option value="Banking" data-target="form-item-10" data-current="form-item-9">Banking</option>
			                <option value="BPO / Call Center" data-target="form-item-10" data-current="form-item-9">BPO / Call Center</option>
			                <option value="Bureau" data-target="form-item-10" data-current="form-item-9">Bureau</option>
			                <option value="College Institute" data-target="form-item-10" data-current="form-item-9">College Institute</option>
			                <option value="Consumer Goods" data-target="form-item-10" data-current="form-item-9">Consumer Goods</option>
			                <option value="E-Commerce" data-target="form-item-10" data-current="form-item-9">E-Commerce</option>
			                <option value="Engineering/Infrastructure" data-target="form-item-10" data-current="form-item-9">Engineering/Infrastructure</option>
			                <option value="Export/ Import" data-target="form-item-10" data-current="form-item-9">Export/ Import</option>
			                <option value="Hospitals" data-target="form-item-10" data-current="form-item-9">Hospitals</option>
			                <option value="Hotel" data-target="form-item-10" data-current="form-item-9">Hotel</option>
			                <option value="Insurance" data-target="form-item-10" data-current="form-item-9">Insurance</option>
			                <option value="IT / Software" data-target="form-item-10" data-current="form-item-9">IT / Software</option>
			                <option value="Manufacturing" data-target="form-item-10" data-current="form-item-9">Manufacturing</option>
			                <option value="Media / Entertainment" data-target="form-item-10" data-current="form-item-9">Media / Entertainment</option>
			                <option value="Ministries" data-target="form-item-10" data-current="form-item-9">Ministries</option>
			                <option value="NGO" data-target="form-item-10" data-current="form-item-9">NGO</option>
			                <option value="Others" data-target="form-item-10" data-current="form-item-9">Others</option>
			                <option value="Petroleum" data-target="form-item-10" data-current="form-item-9">Petroleum</option>
			                <option value="Pharma" data-target="form-item-10" data-current="form-item-9">Pharma</option>
			                <option value="Police" data-target="form-item-10" data-current="form-item-9">Police</option>
			                <option value="Post" data-target="form-item-10" data-current="form-item-9">Post</option>
			                <option value="Power" data-target="form-item-10" data-current="form-item-9">Power</option>
			                <option value="Railways" data-target="form-item-10" data-current="form-item-9">Railways</option>
			                <option value="Real Estate" data-target="form-item-10" data-current="form-item-9">Real Estate</option>
			                <option value="Schools" data-target="form-item-10" data-current="form-item-9">Schools</option>
			                <option value="Share / Brokerage" data-target="form-item-10" data-current="form-item-9">Share / Brokerage</option>
			                <option value="Telecom" data-target="form-item-10" data-current="form-item-9">Telecom</option>
			                <option value="Trading" data-target="form-item-10" data-current="form-item-9">Trading</option>
			                <option value="Transportation" data-target="form-item-10" data-current="form-item-9">Transportation</option>
			                <option value="Travel" data-target="form-item-10" data-current="form-item-9">Travel</option> -->
				        </select>
			    	</div>
			    	<div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="industry_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-10" data-current="form-item-9" style="display: none;">Next</span>
			     	</div>
			    </div>
				<div class="form-item uk-padding-small form-item-10 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Gross Monthly Income<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="pl_gross_income" name="gross_income" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-5"  data-current="form-item-10">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="pl_gross_income_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-5"  data-current="form-item-10" style="display: none;">Next</span>
			      </div>
				</div>
			    <div class="form-item uk-padding-small form-item-12 uk-text-center form-box-20">
					
			    	<!--<div class="uk-margin-bottom uk-text-black ff-helvetica fs-14 fs-16-mobile">Start Date of Current Business/Profession</div>-->
					<div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
						<label class="uk-form-label fs-14 uk-position-absolute field_label">Start Date of Current Business/Profession<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="form-stacked-select" name="start_yr">
			                <option selected="selected">YYYY</option>
			                <option>2020</option>
			                <option>2019</option>
			                <option>2018</option>
			                <option>2017</option>
			                <option>2016</option>
			                <option>Before 2015</option>
				        </select>
			    	    <select class="uk-select uk-form-width-input2 uk-border-rounded" id="form-stacked-select-mm" name="start_month">
			                <option selected="selected">MMM</option>
			                <option data-target="form-item-13"  data-current="form-item-12">Jan</option>
			                <option data-target="form-item-13" data-current="form-item-12">Feb</option>
			                <option data-target="form-item-13" data-current="form-item-12">Mar</option>
			                <option data-target="form-item-13" data-current="form-item-12">Apr</option>
			                <option data-target="form-item-13" data-current="form-item-12">May</option>
			                <option data-target="form-item-13" data-current="form-item-12">Jun</option>
			                <option data-target="form-item-13" data-current="form-item-12">Jul</option>
			                <option data-target="form-item-13" data-current="form-item-12">Aug</option>
			                <option data-target="form-item-13" data-current="form-item-12">Sep</option>
			                <option data-target="form-item-13" data-current="form-item-12">Oct</option>
			                <option data-target="form-item-13" data-current="form-item-12">Nov</option>
			                <option data-target="form-item-13" data-current="form-item-12">Dec</option>
				        </select>
			    	</div>
			    	<div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="form-stacked-select-mm-next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-13" data-current="form-item-12" style="display: none;">Next</span>
			      	</div>
			    </div>


			    <div class="form-item uk-padding-small form-item-13 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Option to best describe applicant<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="applicant_description" name="applicant_description">
			                     <option selected="selected">Select Option</option>
                           <option data-target="form-item-14" data-current="form-item-13">Architect (B.Arch)</option>
                           <option data-target="form-item-14" data-current="form-item-13">Chartered Accountant</option>
                           <option data-target="form-item-14" data-current="form-item-13">Company Secretary</option>
                           <option data-target="form-item-14" data-current="form-item-13">Cost Accountant</option>
                           <option data-target="form-item-14" data-current="form-item-13">Doctor</option>
                           <option data-target="form-item-14" data-current="form-item-13">Engineer (B.Tech / B.E)</option> 
				        </select>
			    	</div>
			    	<div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="applicant_description_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-14" data-current="form-item-13" style="display: none;">Next</span>
			      	</div>
			    </div>

			    <div class="form-item uk-padding-small form-item-14 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Current Year Taxable Income<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="taxable_income" name="current_yr_tax_income" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-15"  data-current="form-item-14">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="taxable_income_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-15"  data-current="form-item-14" style="display: none;">Next</span>
			      </div>
				</div>

				<div class="form-item uk-padding-small form-item-15 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Current Year Gross Turnover<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="gross_turnover" name="gross_turnover" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-16" data-current="form-item-15">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="gross_turnover_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-16" data-current="form-item-15" style="display: none;">Next</span>
			      	</div>
				</div>

				<div class="form-item uk-padding-small form-item-16 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Current Year Depreciation<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="current_depreciation" name="current_depreciation" data-target="form-item-17" data-current="form-item-16">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="current_depreciation_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-17" data-current="form-item-16" style="display: none;">Next</span>
			      </div>
				</div>

				<div class="form-item uk-padding-small form-item-17 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Current Year Tax<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="current_tax" name="current_tax" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-18" data-current="form-item-17">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
			      		<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="current_tax_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-18" data-current="form-item-17" style="display: none;">Next</span>
			      </div>
				</div>

				<div class="form-item uk-padding-small form-item-18 uk-text-center">
            	<div class="f-inn f-inn-radiobut">
			      <label>
			        <div class="uk-text-black ff-helvetica fs-18 fs-16-mobile uk-margin-bottom">Is current year ITR audited?<span class="uk-text-red">*</span></div>
			        <div class="uk-display-inline-block fs-16 uk-margin-small-top uk-margin-right cursor-pointer"><label class="container uk-position-relative"><input type="radio" class="pl_choice_3" name="choice_3" value="1" data-target="form-item-19"  data-current="form-item-18"/><span class="checkmark"></span>&nbsp;&nbsp;Yes</label></div>
			        <div class="uk-display-inline-block fs-16 uk-margin-small-top cursor-pointer"><label class="container uk-position-relative"><input type="radio" class="pl_choice_3" name="choice_3" value="0" data-target="form-item-19"  data-current="form-item-18"/><span class="checkmark"></span>&nbsp;&nbsp;No</label></div>
			      </label>
            	</div>
			      <div class="uk-margin-medium-top">
			      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
              		<span id="pl_choice_3" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-19" data-current="form-item-18" style="display: none;">Next</span>
			      </div>
			    </div>

			    <div class="form-item uk-padding-small form-item-19 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Previous Year Taxable Income<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="current_tax" name="prev_tax_income" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-20" data-current="form-item-19">
              			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="current_tax_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-20" data-current="form-item-19" style="display: none;">Next</span>
				    </div>
				</div>

				<div class="form-item uk-padding-small form-item-20 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">EMI Amount of Existing Income<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="emi_existing_income" name="emi_amt" onkeypress="javascript:return isNumber(this,event);" data-target="form-item-21" data-current="form-item-20">
               			<span class="error commonErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="emi_existing_income_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-21" data-current="form-item-20" style="display: none;">Next</span>
				    </div>
				</div>

				<div class="form-item uk-padding-small form-item-21 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              		<label class="uk-form-label fs-14 uk-position-absolute field_label">Mode of Salary<span class="uk-text-red">*</span></label>
				        <select class="uk-select uk-form-width-input uk-border-rounded" id="mod_salary" name="mod_salary">
			                <option selected="selected">Select Option</option>
                          	<option data-target="form-item-5" data-current="form-item-21">In Cash</option>
                           	<option data-target="form-item-5" data-current="form-item-21">Via Cheque</option>
				        </select>
			    	</div>
			    	<div class="uk-margin-medium-top">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="mod_salary_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-5" data-current="form-item-21" style="display: none;">Next</span>
				    </div>
			    </div>
			    
			    <div class="form-item uk-padding-small form-item-3 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block">
				    	<div class="uk-grid uk-grid-collapse">
				    		<div class="uk-width-1-3 uk-position-relative">
                  				<label class="uk-form-label fs-14 uk-position-absolute field_label">Title<span class="uk-text-red">*</span></label>
				    			<select class="uk-select uk-form-width-input uk-border-rounded" id="per_title" name="per_title">
					              	<option selected="selected">Select Title</option>
				                    <option data-target="form-item-4" data-current="form-item-3">Mr.</option>
				                    <option data-target="form-item-4" data-current="form-item-3">Mrs.</option>
				                    <option data-target="form-item-4" data-current="form-item-3">Ms.</option>
				                    <option data-target="form-item-4" data-current="form-item-3">Prof.</option>
				                    <option data-target="form-item-4" data-current="form-item-3">Doc.</option>
						        </select>
				    		</div>
				    		<div class="uk-width-2-3 uk-position-relative">
                  				<label class="uk-form-label fs-14 uk-position-absolute field_label">Full Name<span class="uk-text-red">*</span></label>
				    			<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="name" name="name" data-target="form-item-5" data-current="form-item-3">
				    		</div>
				    	</div>
				    </div>
				    <div class="uk-margin-medium-top">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="name_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-5" data-current="form-item-3" style="display: none;">Next</span>
				    </div>
				</div>

				<div class="form-item uk-padding-small form-item-5 uk-text-center">
				    <div class="uk-form-controls uk-display-inline-block uk-position-relative form-box">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Pincode<span class="uk-text-red">*</span></label>
				   		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="pl_pincode_pi" name="pincode" onkeypress="javascript:return isNumber(this,event);" maxlength="6" data-target="form-item-6" data-current="form-item-5">
              			<span class="error pinErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="uk-margin-medium-top">
				      	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold "> Back</span>
                		<span id="pl_pincode_pi_next" class="uk-button uk-btn-green proceed_btn uk-border-pill next-btn ff-helvetica-bold" data-target="form-item-6" data-current="form-item-5" style="display: none;">Next</span>
				    </div>
				</div>

				<div class="form-item uk-padding-small form-item-6 uk-text-center">
			        <!-- <div>
		     	 		<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Email ID*" id="email" name="email">
				    </div> -->
					<div class="uk-margin-small-top uk-position-relative">
					<label class="uk-form-label fs-14 uk-position-absolute field_label">Full Name<span class="uk-text-red">*</span></label>
					<div class="uk-inline">
					<input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="FirstName LastName" id="full_name1" name="full_name1">
					</div>
					<span class="error fullnameErr" style="display: none;">Error Here</span>
					</div>
				     <div class="uk-margin-small-top uk-position-relative">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Email<span class="uk-text-red">*</span></label>
              			<div class="uk-inline">
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded pl-home-btn-dsb" type="text" placeholder="" id="email" name="email">
			     	 		<span class="error emailErr" style="display: none;">Error Here</span>
			     	 	</div>
              			
				    </div>
				    <div class="uk-margin-small-top uk-position-relative">
              			<label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
              			<div class="uk-inline">
				    		<span class="uk-form-icon icon-plus-91"></span>
			     	 		<input class="uk-input uk-form-width-input uk-border-rounded pl-home-btn-dsb" type="text" placeholder="" id="mobile1" name="mobile1" onkeypress="javascript:return isNumber(this,event);" maxlength="10">
			     	 	</div>
              			<span class="error mblErr" style="display: none;">Error Here</span>
				    </div>
				    <div class="fs-11 uk-text-left">
			            <div class="uk-margin-top uk-text-35"><label class="fs-13"><input class="uk-checkbox" type="checkbox" name="chkauth1" id="chkauth1">&nbsp;I authorize Standard Chartered Bank to contact me. This will override registry on DND / NDNC *</label></div>
			            <div class="uk-margin-small-top uk-text-35"><label class="fs-13"><input class="uk-checkbox" type="checkbox" name="chktc1"  id="chktc1">&nbsp;I have read the <a href="#termsconditions" title="Terms & Conditions" uk-toggle>Terms & Conditions</a> and agree to the terms therein *</label></div>
			             <input type="hidden" name="utm_campaign" id="utm_campaign" />
                  		<input type="hidden" name="utm_source" id="utm_source" />
                 	 <input type="hidden" name="utm_medium" id="utm_medium" />
                  <input type="hidden" name="utm_adgroup" id="utm_adgroup" />
                  <input type="hidden" name="utm_channel" id="utm_channel" />
                  <input type="hidden" name="utm_param" id="utm_param" />
			        </div>
					 <div class="uk-margin-top uk-overflow-auto"><button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn submit_pl_first"  disabled="disabled">Proceed</button></div> <!-- uk-toggle="target: #modal-otp" -->
				    <div class="uk-margin-top uk-overflow-auto">
			        	<span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-margin-remove uk-align-left"> Back</span>
			        	
			        </div>
			    </div>	

          <!-- form-item-22 added to identify ETB journey
            Modal OTP is changed to include URL parameter
           -->
          <div class="form-item uk-padding-small form-item-22 uk-text-center">
          	 <div class="uk-margin-small-top uk-position-relative">
              	<label class="uk-form-label fs-14 uk-position-absolute field_label">Full Name<span class="uk-text-red">*</span></label>
              	<div class="uk-inline">
		            <input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="FirstName LastName" id="full_name" name="full_name">
		        </div>
              <span class="error fullnameErr" style="display: none;">Error Here</span>
            </div>

          	  <div class="uk-margin-small-top uk-position-relative">
              	<label class="uk-form-label fs-14 uk-position-absolute field_label">Email<span class="uk-text-red">*</span></label>
              	<div class="uk-inline">
		            <input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="email1" name="email1" >
		        </div>
              <span class="error emailErr" style="display: none;">Error Here</span>
            </div>
            <div class="uk-margin-small-top uk-position-relative">
              	<label class="uk-form-label fs-14 uk-position-absolute field_label">Mobile Number<span class="uk-text-red">*</span></label>
              	<div class="uk-inline">
				    <span class="uk-form-icon icon-plus-91"></span>
		            <input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="" id="mobile2" name="mobile2" onkeypress="javascript:return isNumber(this,event);" maxlength="10">
		        </div>
              <span class="error mblErr" style="display: none;">Error Here</span>
            </div>
            <div class="fs-11 uk-text-left">
                  <div class="uk-margin-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" name="chkauth" id="chkauth" >&nbsp;I authorize Standard Chartered Bank to contact me. This will override registry on DND / NDNC *</label></div>
                  <div class="uk-margin-small-top uk-text-35"><label class="fs-14"><input class="uk-checkbox" type="checkbox" name="chktc" id="chktc" >&nbsp;I have read the <a href="#termsconditions" title="Terms & Conditions" uk-toggle>Terms & Conditions</a> and agree to the terms therein *</label></div>
                  <input type="hidden" name="utm_campaign" id="utm_campaign" />
                  <input type="hidden" name="utm_source" id="utm_source" />
                  <input type="hidden" name="utm_medium" id="utm_medium" />
                  <input type="hidden" name="utm_adgroup" id="utm_adgroup" />
                  <input type="hidden" name="utm_channel" id="utm_channel" />
              </div>
           <div class="uk-margin-top uk-overflow-auto"><button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button proceed proceed_btn submit_pl_first btngrey" disabled="disabled">Proceed</button></div> <!-- modal-otp-etb  --><!--  uk-toggle="target: #modal-otp" --> 
            <div class="uk-margin-top uk-overflow-auto">
                <span class="uk-button uk-button uk-btn-green proceed_btn uk-border-pill back-btn ff-helvetica-bold  uk-margin-remove uk-align-left"> Back</span>
              </div>
          </div> 
          <input type="hidden" name="input_flag" value="1">       
          <input type="hidden" name="product" value="1">       
	   		</form>
	   	</div>
	</div>
</div>
<!--NTP joury its common for both -->
<div id="modal-otp" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
    	<h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
    	<form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle" name="pl_otpfrm" id="pl_otpfrm" method="POST">
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Mobile number</label>
    			<div class="uk-inline">
				    <span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
	    			<input class="uk-input uk-form-width-input uk-border-rounded verifymobile" name="verifymobile" id="verifymobile" type="tel" value="" tabindex="1" maxlength="10" onkeypress="javascript:return isNumber(this,event);" />
	    		</div>
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Verification OTP</label>
    			<input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus maxlength="6" onkeypress="javascript:return isNumber(this,event);" />
				<input name="otpvalue" type="hidden" id="otpvalue">
				<input name="otpcheck" type="hidden" id="otpcheck">
				<input name="hiddenlink" type="hidden" id="hiddenlink">
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>&nbsp;</label>
    			<div>
	    			<a href="#" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white go_etb otpplvalidate" >Go</a>
		    		<button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill" onclick="OTPResendfn('verifymobile','otpvalue','PL');" >Resend</button>	
		    		<!-- <input type="button" name="generateotp" value="Generate OTP"onclick="OTPfn('verifymobile','otpvalue');" id="generateotp" class="gOTPlink" style="background-color:White;border-style:None;"> -->	
    			</div>
    		</div>
    	</form>	
    </div>
</div>

<div id="termsconditions" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/in-personal-loan-most-imp-tnc.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>
<!-- No use below one -->
<div id="modal-otp-etb" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
      <h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
      <form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle" name="pl_otpfrmetb" id="pl_otpfrmetb">
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Mobile number</label>
          <div class="uk-inline">
			<span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
	        <input class="uk-input uk-form-width-input uk-border-rounded verifymobile" name="verifymobile1" type="tel" value="" tabindex="1" onkeypress="javascript:return isNumber(this,event);" />
	      </div>
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Verification OTP</label>
          <input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile1" type="tel" value="" tabindex="2" autofocus onkeypress="javascript:return isNumber(this,event);" />
          <input name="otpvalue" type="hidden" id="otpvalue1">
			<input name="otpcheck" type="hidden" id="otpcheck1">
				<input name="hiddenlink" type="hidden" id="hiddenlink1">
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>&nbsp;</label>
          <div>
            <a href="#" class="go_etb uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white otpplvalidte">Go</a>
            <button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill" onclick="OTPfn('verifymobile','otpvalue');">Resend</button>   
          </div>
        </div>
      </form> 
    </div>
</div>



<div class="uk-margin-large-top uk-container cc-container">
<div>

<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
	<?php
	$i = 1;
	foreach ($page->feature_tabs as $t) { 
		if ($i == 1) {
			$factive = "tabs_head_active";
		}else{
			$factive = "";
		}
	?>
	<div id="head_<?=$i?>" class="tabs_head <?=$factive?> uk-width-1-4 uk-text-center p-25">
		<h5 class="fs-17 uk-text-35 ff-light"><?=$t->title?></h5>
	</div>
	<?php $i++; } ?>
</div><!-- grid -->

<div class="tabs_content">

<?php
	$i = 1;
	foreach ($page->feature_tabs as $t) {
		if ($i == 1) {
			$factive = "tabs_head_active";
		}else{
			$factive = "";
		}
	?>
	<div id="head_<?=$i?>" class="hidden_on_desktop hidden_on_tab tabs_head <?=$factive?> uk-text-center uk-padding-small">
		<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove"><?=$t->title?></h5>
	</div>
	<div id="para_<?=$i?>" class="tabs_para uk-padding">
		<?php if ($i == 1): ?>
			<div class="tabs_content_slider"  uk-slider>
				<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

				   <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
				   	<?php foreach ($t->features as $tf): ?>
				       <li>
				           <div class="uk-panel uk-text-center">
				               <img src="<?=$tf->image->url?>" alt="">
				               <h6 class="uk-margin-top ff-helvetica fs-18 uk-text-2D"><?=$tf->headline?></h6>
				           </div>
				       </li>
				    <?php endforeach ?>
				   </ul>

				   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
				   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
				</div>
				<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
			</div>
		<?php elseif ($i == 2): ?>
			<div class="uk-grid">
		        <div class="uk-width-1-4 hidden_on_mobile"></div>
		        <?php foreach ($t->features as $tf): ?>
		        	<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2">
			           <div class="uk-panel uk-text-center">
			               <img src="<?=$tf->image->url?>" />
			               <h6 class="uk-margin-top ff-helvetica fs-18 uk-text-2D"><?=$tf->headline?></h6>
			           </div>
			        </div>
		        <?php endforeach ?>
		        <div class="uk-width-1-4 hidden_on_mobile"></div>
		    </div>
		<?php elseif ($i == 3): ?>
			<ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
				<?php foreach ($t->features as $tf): ?>
					<?php if ($tf->depth == 0): ?>
						<li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#"><?=$tf->headline?></a></li>
					<?php endif ?>
			    <?php endforeach ?>
			</ul>

			<ul class="uk-switcher uk-margin">
			    <li>
			      	<div class="uk-grid uk-flex-center">
			      		<?php foreach ($t->features as $tf): ?>
			      			<?php if ($tf->id == 28388 || $tf->id == 28389 || $tf->id == 28390 || $tf->id == 28391): ?>
					            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
					              <img class="docs_img" src="<?=$tf->image->url?>">
					              <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
					            </div>
				            <?php endif ?>
			            <?php endforeach ?>
			      	</div>
			    </li>
			    <li>
			      	<div class="uk-grid uk-flex-center">
			      		<?php foreach ($t->features as $tf): ?>
			      			<?php if ($tf->id == 28388 || $tf->id == 28389 || $tf->id == 28394 || $tf->id == 28395): ?>
					            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
					              <img class="docs_img" src="<?=$tf->image->url?>">
					              <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
					            </div>
				            <?php endif ?>
			            <?php endforeach ?>
			      	</div>
			    </li>
			    <li>
			      	<div class="uk-grid uk-flex-center">
			      		<?php foreach ($t->features as $tf): ?>
			      			<?php if ($tf->id == 28396 || $tf->id == 28397): ?>
					            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
					              <img class="docs_img" src="<?=$tf->image->url?>">
					              <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
					            </div>
				            <?php endif ?>
			            <?php endforeach ?>
			      	</div>
			    </li>
			</ul>
		<?php elseif ($i == 4): ?>
			<div class="tabs_content_slider"  uk-slider>
				<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

				<ul class="faqs" uk-accordion="multiple: true">
					<?php $j = 1;
					foreach ($t->faqs as $faq): ?>
						<li>
					        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#"><?=$faq->headline?><span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
					        <div class="uk-accordion-content">
					            <p class="uk-text-89 fs-16"><?=$faq->summary?></p>
					        </div>
					    </li>
					<?php endforeach ?>
				</ul>

				</div>
				<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
			</div>
		<?php endif ?>

	</div>
<?php $i++; } ?>	

</div><!-- tabs_content -->
</div><!-- uk-box-shadow-large -->
</div><!-- cc-container -->

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

<?php include "partials/footer_pl.php";?>