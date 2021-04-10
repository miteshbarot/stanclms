<?php namespace ProcessWire;

include "partials/header_pl.php";
include "partials/_general_function.php";

?>

<?php 
	if(isset($_GET['u'])){
		$unique_id = $_GET['u'];
		$p = $pages->get("unique_id=$unique_id");
		if($p->id == 0){
			$session->redirect('/demo/lms/personal-loan/');
		}
	}else{
		$session->redirect('/demo/lms/personal-loan/');
	}
	$pincode = $p->pincode;
	$employer_name = $p->employer_name;
	$employment_type = $p->employment_type;
	$employer_industry = $p->employer_industry;
	$mothly_income = $p->mothly_income;
	$anl_income = intval($mothly_income) * 12;
	$email= $p->email;
	$mobile =$p->mobile;
	$existing_rel_scb =$p->existing_rel_scb; //0 for NO NTBcustmer
	$tenure =$p->tenure*12;
	$company =explode(" -", $employer_name);
	$company_name =$company[0];
	$company_code=$company[1];
	$documenttype =getdocumentTypeOption();
	
	//echo $personal_title =getfieldOptions();
$education =geteductionOption();
$work_type =getworkTypeOption();
  $employer_industry = $pages->get(31459)->children;
   $industryisic = $pages->get(1049)->children;
  $leadcity = $pages->get(31601)->children;
$field = $fields->get('person_title_opt');
$all_options = $field->type->getOptions($field);
	if (count($all_options)) {
			foreach ($all_options as $ed=>$ev) {
				$stroption2 .="<option value='".$ed."' >".$ev->title."</option>";
			 }
	}
$strmailopt ="";
$field_m = $fields->get('mailing_address_opt');
$all_options_m = $field_m->type->getOptions($field_m);
	if (count($all_options_m)) {
			foreach ($all_options_m as $ml=>$mv) {
				$strmailopt .="<option value='".$ml."' >".$mv->title."</option>";
			 }
	}


$strpurpose ="";
$field_p = $fields->get('purpose_opt');
$all_options_p = $field_p->type->getOptions($field_p);
	if (count($all_options_p)) {
			foreach ($all_options_p as $pl=>$pv) {
				$strpurpose .="<option value='".$pl."' >".$pv->title."</option>";
			 }
	}

$strwkexp ="";
$field_wexp = $fields->get('total_exp');
$all_options_ex = $field_wexp->type->getOptions($field_wexp);
	if (count($all_options_ex)) {
			foreach ($all_options_ex as $exk=>$texp) {
				$strwkexp .="<option value='".$exk."' >".$texp->title."</option>";
			 }
	}

$strres_type ="";
$residence_type = $fields->get('residence_type');
$all_options_res = $residence_type->type->getOptions($residence_type);
	if (count($all_options_res)) {
			foreach ($all_options_res as $res=>$re) {
				$strres_type .="<option value='".$res."' >".$re->title."</option>";
			 }
	}


	/*$cust_type = $pages->get($cust_type);
$p->customer_type =$cust_type->title;
*/

?>

<div class="uk-container">
	<div class="uk-text-center mt-40">
		<ul class="timeline">
			<li class="active ff-helvetica fs-18 active1">Eligibility</li>
			<li class="active ff-helvetica fs-18 active1">Offer</li>
			<li class="active ff-helvetica fs-18">Application</li>
			<li class="ff-helvetica fs-18">Documents</li>
		</ul>		  
	</div>
</div>

<div class="uk-background-white uk-padding uk-margin-medium-top">
<div class="uk-container">
	<div class="uk-position-relative">
		<h3 class="uk-text-center uk-margin-remove fs-20">Your application details</h3>
		<a href="<?=$root?>personal-loan/view-quote/?u=<?=$unique_id?>" class="uk-button uk-button-default uk-border-rounded uk-button-pill uk-position-center-right pl-edit-but"><span uk-icon="icon:pencil;ratio:1.0"></span> Edit</a>
	</div>
	
	<!--<div class="uk-container uk-padding-remove-bottom">-->
	<div class="uk-grid uk-grid-match uk-margin-top">
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded text-00 br-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 text-00 uk-margin-remove fs-15-mobile">Principal Amount</div>
				<h6 class="fs-22 fs-18-mobile ff-helvetica-medium text-00" style="margin:5px 0"><?php
				setlocale(LC_MONETARY, 'en_IN'); echo money_format('%.0n',$p->loan_amount);?></h6>
				<div class="fs-14">(For <?=$p->tenure?> years)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded text-00 br-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 text-00 uk-margin-remove fs-15-mobile">Rate</div>
				<h6 class="fs-22 fs-18-mobile ff-helvetica-medium text-00" style="margin:5px 0">Fixed</h6>
				<div class="fs-14">(Monthly reducing)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded text-00 br-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 text-00 uk-margin-remove fs-15-mobile">EMI</div>
				<h6 class="fs-22 fs-18-mobile ff-helvetica-medium text-00" style="margin:5px 0"><?php
				setlocale(LC_MONETARY, 'en_IN'); echo money_format('%.0n',$p->emi_amount);?></h6>
				<div class="fs-14">(For <?=$p->tenure?> years)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded text-00 br-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 text-00 uk-margin-remove fs-15-mobile">Best rate</div>
				<h6 class="fs-22 fs-18-mobile ff-helvetica-medium text-00" style="margin:5px 0"><?=$p->interest_rate?>%</h6>
				<div class="fs-14"></div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded text-00 br-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 text-00 uk-margin-remove fs-15-mobile">Processing fees</div>
				<h6 class="fs-22 fs-18-mobile ff-helvetica-medium text-00" style="margin:5px 0"><?php
				setlocale(LC_MONETARY, 'en_IN'); echo money_format('%.0n',$p->pf);?></h6>
				<div class="fs-14"></div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded uk-background-secondary uk-border-default uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile uk-text-white">Total savings</div>
				<!-- <div class="fs-14">You Save</div> -->
				<h6 class="fs-22 fs-wht fs-18-mobile ff-helvetica-medium" style="margin:5px 0;"><?php
				setlocale(LC_MONETARY, 'en_IN'); echo money_format('%.0n',$p->savings);?></h6>
			</div>
		</div>
	</div>
<!--</div>-->

</div>
</div>



<div class="uk-container">
	<form class="apply_online" id="pl_application_form" method="post"> 
		<ul class="uk-margin-medium-top" uk-accordion="multiple: true">
		    <li class="uk-open">
		    	<a class="uk-accordion-title " href="#"><h3 class="uk-text-center fs-20 section_title fs-16-mobile uk-text-white personal-bg ">Personal information <!-- Residential Address--></h3></a>
		    	<div class="uk-accordion-content">
		    	<div class="uk-grid-large ff-helvetica" uk-grid>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper">
						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3">
								<label class="uk-form-label fs-14">Title<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="title" id="title">
									<option value="">Select</option>
									<?php echo $stroption2; ?>
								</select>
							</div>
							<div class="uk-width-2-3">
								<div>
									<label class="uk-form-label fs-14">First Name<span class="uk-text-red">*</span></label>
								    <input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="fname" id="fname">
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Middle Name</label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="mname">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Last Name<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="lname" id="lname">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper uk-first-column">

						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3 uk-first-column">
								<label class="uk-form-label fs-14">Gender<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="gender" id="gender">
							<option selected="selected" value="1">Male</option>
							<option value="2">Female</option>
							<option value="3">Other</option>
						</select>
							</div>
						</div>
						
						
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper uk-first-column">
						<label class="uk-form-label fs-14">Residence Type<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="re-type" id="re-type">
							<option value="">Select</option>
							<?php echo $strres_type; ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Educational qualification<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="education" id="education">
							<option value="">Select</option>
							<!-- <option value="PSC">Pimary school</option>
							<option value="SEC">SSC/HSC</option>
							<option value="PRE">Post Graduate</option>
							<option value="GRD">Graduate</option>
							<option value="UND">Under Graduate</option>
							<option value="PRE">Professional qualification</option>
							<option value="DIP">Diploma holder</option> -->
							<?php echo $education; ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Date of birth<span class="uk-text-red">*</span></label>
						<input type="text" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" name="dob" id="datepicker" autocomplete="off">
					</div>
					<!-- <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">No. of Dependents<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="dependents">
					</div> -->
					
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Address line 1<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="add1" id="add1">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Address line 2</label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="add2">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Address line 3</label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="add3">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Purpose of loan<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="purpose" id="purpose">
							<option value="">Select</option>
							<!-- <option value="Children's education">Children's education</option>
							<option value="House Renovation">House renovation</option>
							<option value="Vehicle">Vehicle</option>
							<option value="Consumer Durable">Consumer durable</option>
							<option value="Medical Expenses">Medical expenses</option>
							<option value="Marriage in Family">Marriage in family</option>
							<option value="Travel/Holiday">Travel/Holiday</option>
							<option value="Others">Others</option> -->
							<?php echo $strpurpose; ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Landmark<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="landmark" id="landmark">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Pincode<span class="uk-text-red">*</span></label>
						<input id="pl_homepin" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" value="<?php if($pincode!=""){echo $pincode;}?>" name="pincode" id="pincode">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">City<span class="uk-text-red">*</span></label>
						<select name="leadcity" id="leadcity" class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top">
							<option value=""></option>
							<?php foreach ($leadcity as $city) { ?>
							<option value="<?=$city->id?>"  ><?=$city->title?></option>
							<?php } ?>
						</select>
					</div>
					<div class="uk-margin-medium-top uk-text-35 uk-width-1-1 fs-14"><label><input id="chkaddress" class="uk-checkbox" type="checkbox" value="1" name="sameasResiAdd" checked>&nbsp;&nbsp;Permanent address same as residence address<span class="uk-text-red">*</span> </label></div>
					<div id="dvaddress" class="uk-grid uk-grid-large uk-margin-remove-top" style="display: none">
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 1<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa1">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 2</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa2">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 3</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa3">
						</div>
						<!-- <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address Landmark<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa1">
						</div> -->
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent State<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="per_state" id="per_state">
								<option value="">Select</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Delhi">Delhi</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Puducherry">Puducherry</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu and Kashmir">Jammu and Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Odisha">Odisha</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Telangana">Telangana</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="Uttarakhand">Uttarakhand</option>
								<option value="West Bengal">West Bengal</option>
						</select>
						</div>
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent City<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="per_city" id="per_city">
								<option value="">Select</option>
							<?php foreach ($leadcity as $city) {
								if($city->title!=""){ ?>
								<option value="<?=$city->id?>" ><?=$city->title?></option>
							<?php } } ?>
						   </select>
						
						</div>
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Pincode<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="ppincode">
						</div>
					</div>
				</div>
		    	</div>
		    </li>
		    
		    <li class="uk-margin-large-top">
		   		<a class="uk-accordion-title" href="#"><h3 class="uk-text-center fs-20 section_title fs-16-mobile uk-text-white employment-bg">Employment & Income details</h3></a>
		    	<div class="uk-accordion-content">
		    		<div class="uk-grid-large ff-helvetica" uk-grid>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Company/Employer<span class="uk-text-red">*</span><span class="uk-float-right fe_icon uk-text-black ff-helvetica-bold" uk-icon="icon: file-edit; ratio:0.9"></span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" value="<?php if($employer_name!=""){echo $employer_name;}?>" id="pl_company" name="emp_name">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Occupation<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="emp_type" id="emp_type" onchange="showOccupationFields(this);">
								<option value="">Select</option>
								<option <?php if($employment_type == '1'){echo "selected";} ?> value="1">Salaried</option>
								<!-- <option value="">Select</option> -->
								<!-- <option value="4" <?php if($employment_type == '4'){echo "selected";} ?>>Salaried: SCB Salary A/C</option>					
								<option value="5" <?php if($employment_type == '5'){echo "selected";} ?>>Salaried: Other Bank Salary A/C</option> -->
								<!-- <option value="2" <?php if($employment_type == '2'){echo "selected";} ?>>Self Employed Business</option> -->
								<option value="3" <?php if($employment_type == '3'){echo "selected";} ?>>Self Employed Professional</option>
								<!-- <option value="6" <?php if($employment_type == '6'){echo "selected";} ?>>Salaried: By Cash or Cheque</option> -->
							</select>
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Work type<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="work_type" id="work_type">
								<option value="">Select</option>
								<!-- <option value="Public Limited">Public Limited</option>
								<option value="Private Limited">Private Limited</option>
								<option value="Government">Government</option>
								<option value="Others">Others</option> -->
								<?php echo $work_type; ?>
							</select>
						</div>
						<!-- <div> Salary Option-->
						<div id="salaried_scb" class="uk-grid uk-grid-large uk-margin-remove-top">
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14" id="salaried_label">Net Monthly Income<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="gross_income" id="gross_income"> <!-- net_income both same -->
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Total Work Experience <span class="uk-text-red">*</span></label>
								<select name="totexp" id="totexp" class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top"><option value="">Select</option>
								<?php echo $strwkexp; ?>
								</select>
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">EMI you pay on existing loans</label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="emi_amt" id="emi_amt">
							</div>
						</div>

						<!-- </div> -->

						<!-- self employeed business -->
						<div id="se-business" class="uk-grid uk-grid-large uk-margin-remove-top">
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Start date for current Business/Profession<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="date" placeholder="" name="start_date" id="start_date">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper" id="self_emp_business_dsc_app">
								<label class="uk-form-label fs-14">Choose option that best describes applicant<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="dsc_applicant" id="dsc_applicant">
									<option selected="selected">Select</option>
									<option value="Public Limited">Sole Proprietor</option>
									<option value="Private Limited">Partnership</option>
								</select>
							</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper" style="display:none" id="self_emp_prof_occ">
								<label class="uk-form-label fs-14">Occupation Type<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="profession" id="profession">
								<option value="0">Select</option><option value="1">Architect (B.Arch)</option><option value="2">Chartered Accountant</option><option value="3">Company Secretary</option><option value="4">Cost Accountant</option><option value="5">Doctor</option><option value="6">Engineer (B.Tech / B.E)</option></select>
							</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper" id="self_emp_prof_txtinc" style="display: none;">
								<label class="uk-form-label fs-14">Current year business income<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="start_of_business" id="start_of_business">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper" id="self_emp_prof_income_other" style="display: none;">
								<label class="uk-form-label fs-14">Current year income from other sources(optional)</label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="current_year_income_other" id="current_year_income_other">
							</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Current year taxable income<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="cyti" id="current_yr_tax_income">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper" id="self_emp_business_gt">
								<label class="uk-form-label fs-14">Current year gross turnover<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="cygt" id="gross_turnover">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Current year depreciation(optional)</label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="current_depreciation">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Current year tax(optional)</label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="current_tax">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Is current year ITR audited?<span class="uk-text-red">*</span></label>
								<div class="uk-grid uk-grid-small uk-child-width-1-3 uk-margin-small-top">
									<label class="container">Yes 
				                     	<input type="radio" name="current_yr_audited" value="form-item-2" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2" data-current="form-item-1">
				                     	<span class="checkmark"></span>
				                     </label>
				                     <label class="container">No
				                     	<input type="radio" name="current_yr_audited" value="form-item-2a" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2a" data-current="form-item-1">
				                     	<span class="checkmark"></span>
				                     </label>
								</div>
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Previous year taxable income<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pyti" id="pyti">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">EMI amount for existing loans (optional)</label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="emi_loans">
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
								<label class="uk-form-label fs-14">Mode of salary<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="mod_salary" id="mod_salary">
									   <option value="">Select</option>
									   <optgroup label="--------------">
									      <option value="9997">In Cash</option>
									      <option value="9998">Via Cheque</option>
									   </optgroup>
									   <optgroup label="--------------">
									      <option value="9">Axis Bank</option>
									      <option value="11">Bank of Baroda</option>
									      <option value="17">Citibank N.A.</option>
									      <option value="55">HDFC Bank</option>
									      <option value="25">HSBC Bank</option>
									      <option value="26">ICICI Bank</option>
									      <option value="39">Punjab National Bank</option>
									      <option value="41">Standard Chartered Bank</option>
									      <option value="44">State Bank of India</option>
									   </optgroup>
									   <optgroup label="--------------">
									      <option value="1">Abhyudaya Co-op. Bank Ltd.</option>
									      <option value="3">ACE Co-Operative Bank Ltd.</option>
									      <option value="4">Allahabad Bank</option>
									      <option value="5">Amanath Co-op. Bank Ltd.</option>
									      <option value="7">Andhra Bank</option>
									      <option value="8">Apna Sahakari Bank Ltd.</option>
									      <option value="113">Bandhan Bank</option>
									      <option value="10">Bank of America N.A.</option>
									      <option value="12">Bank of India</option>
									      <option value="13">Bank of Maharashtra</option>
									      <option value="15">Canara Bank</option>
									      <option value="21">Capital Local Area Bank Ltd.</option>
									      <option value="16">Central Bank of India</option>
									      <option value="18">City Union Bank Ltd.</option>
									      <option value="19">Coastal Local Area Bank Ltd.</option>
									      <option value="20">Corporation Bank</option>
									      <option value="22">Dena Bank</option>
									      <option value="23">Deutsche Bank AG</option>
									      <option value="24">Development Credit Bank Ltd.</option>
									      <option value="53">Dhanlaxmi Bank Ltd.</option>
									      <option value="27">IDBI Bank Ltd.</option>
									      <option value="28">Indian Bank</option>
									      <option value="29">Indian Overseas Bank</option>
									      <option value="30">IndusInd Bank Ltd.</option>
									      <option value="31">ING Vysya Bank Ltd.</option>
									      <option value="56">Jammu &amp; Kashmir Bank Ltd.</option>
									      <option value="32">Karnataka Bank Ltd.</option>
									      <option value="57">Karur Vysya Bank Ltd.</option>
									      <option value="33">Kotak Mahindra Bank Ltd.</option>
									      <option value="34">Krishna Bhima Samruddhi Local Area Bank Ltd.</option>
									      <option value="35">New India Co-op. Bank Ltd.</option>
									      <option value="36">Oriental Bank of Commerce</option>
									      <option value="37">Punjab &amp; Maharashtra Co-op. Bank Ltd.</option>
									      <option value="38">Punjab &amp; Sind Bank</option>
									      <option value="68">Royal Bank of Scotland</option>
									      <option value="40">SBI Commercial and International</option>
									      <option value="62">South Indian Bank Ltd.</option>
									      <option value="42">State Bank of Bikaner &amp; Jaipur</option>
									      <option value="46">State Bank of Mysore</option>
									      <option value="47">State Bank of Patiala</option>
									      <option value="48">State Bank of Travancore</option>
									      <option value="49">Syndicate Bank</option>
									      <option value="50">Tamilnad Mercantile Bank Ltd.</option>
									      <option value="52">The Catholic Syrian Bank Ltd.</option>
									      <option value="54">The Federal Bank Ltd.</option>
									      <option value="58">The Lakshmi Vilas Bank Ltd.</option>
									      <option value="59">The Nainital Bank Ltd.</option>
									      <option value="60">The Ratnakar Bank Ltd.</option>
									      <option value="61">The Saraswat Co-op. Bank Ltd.</option>
									      <option value="63">UCO Bank</option>
									      <option value="64">Union Bank of India</option>
									      <option value="65">United Bank of India</option>
									      <option value="66">Vijaya Bank</option>
									      <option value="67">Yes Bank</option>
									      <option value="999">Other Bank</option>
									   </optgroup>
									</select>
							</div>
						</div>
						<!-- self employeed business ends here -->

						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Office address 1<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="off_add1" id="off_add1">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Office address 2</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="off_add2">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Office address 3</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="off_add3">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Office landmark<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="off_landmark" id="off_landmark">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Select State<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_state" id="off_state">
								<option selected="selected">Select</option>
								<option>Andaman and Nicobar Islands</option>
								<option>Andhra Pradesh</option>
								<option>Arunachal Pradesh</option>
								<option>Assam</option>
								<option>Bihar</option>
								<option>Chandigarh</option>
								<option>Chhattisgarh</option>
								<option>Dadra and Nagar Haveli and Daman and Diu</option>
								<option>Delhi</option>
								<option>Goa</option>
								<option>Gujarat</option>
								<option>Haryana</option>
								<option>Himachal Pradesh</option>
								<option>Jammu and Kashmir</option>
								<option>Jharkhand</option>
								<option>Karnataka</option>
								<option>Kerala</option>
								<option>Ladakh</option>
								<option>Lakshadweep</option>
								<option>Madhya Pradesh</option>
								<option>Maharashtra</option>
								<option>Manipur</option>
								<option>Meghalaya</option>
								<option>Mizoram</option>
								<option>Nagaland</option>
								<option>Odisha</option>
								<option>Puducherry</option>
								<option>Punjab</option>
								<option>Rajasthan</option>
								<option>Sikkim</option>
								<option>Tamil Nadu</option>
								<option>Telangana</option>
								<option>Tripura</option>
								<option>Uttar Pradesh</option>
								<option>Uttarakhand</option>
								<option>West Bengal</option>
							</select>
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Pincode<span class="uk-text-red">*</span></label>
							<input id="pl_pincode"  class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" name="off_pincode" >
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Phone no (O)</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" name="off_phone">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Industry(ISIC)<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top industry_isic" id="pl_app_industry" name="emp_industry">
								<option value="">Select</option>
								<?php foreach ($industryisic as $ins) { ?>
								        <option value="<?=$ins->id?>" data-id="<?=$ins->code?>" ><?=$ins->title?></option>
							   <?php } ?>
								<!-- <option data-target="form-item-10" data-current="form-item-9">Accountancy</option>
				                <option data-target="form-item-10" data-current="form-item-9">Advertising</option>
				                <option data-target="form-item-10" data-current="form-item-9">Airlines</option>
				                <option data-target="form-item-10" data-current="form-item-9">Automobiles</option>
				                <option data-target="form-item-10" data-current="form-item-9">Banking</option>
				                <option data-target="form-item-10" data-current="form-item-9">BPO / Call Center</option>
				                <option data-target="form-item-10" data-current="form-item-9">Bureau</option>
				                <option data-target="form-item-10" data-current="form-item-9">College Institute</option>
				                <option data-target="form-item-10" data-current="form-item-9">Consumer Goods</option>
				                <option data-target="form-item-10" data-current="form-item-9">E-Commerce</option>
				                <option data-target="form-item-10" data-current="form-item-9">Engineering/Infrastructure</option>
				                <option data-target="form-item-10" data-current="form-item-9">Export/ Import</option>
				                <option data-target="form-item-10" data-current="form-item-9">Hospitals</option>
				                <option data-target="form-item-10" data-current="form-item-9">Hotel</option>
				                <option data-target="form-item-10" data-current="form-item-9">Insurance</option>
				                <option data-target="form-item-10" data-current="form-item-9">IT / Software</option>
				                <option data-target="form-item-10" data-current="form-item-9">Manufacturing</option>
				                <option data-target="form-item-10" data-current="form-item-9">Media / Entertainment</option>
				                <option data-target="form-item-10" data-current="form-item-9">Ministries</option>
				                <option data-target="form-item-10" data-current="form-item-9">NGO</option>
				                <option data-target="form-item-10" data-current="form-item-9">Others</option>
				                <option data-target="form-item-10" data-current="form-item-9">Petroleum</option>
				                <option data-target="form-item-10" data-current="form-item-9">Pharma</option>
				                <option data-target="form-item-10" data-current="form-item-9">Police</option>
				                <option data-target="form-item-10" data-current="form-item-9">Post</option>
				                <option data-target="form-item-10" data-current="form-item-9">Power</option>
				                <option data-target="form-item-10" data-current="form-item-9">Railways</option>
				                <option data-target="form-item-10" data-current="form-item-9">Real Estate</option>
				                <option data-target="form-item-10" data-current="form-item-9">Schools</option>
				                <option data-target="form-item-10" data-current="form-item-9">Share / Brokerage</option>
				                <option data-target="form-item-10" data-current="form-item-9">Telecom</option>
				                <option data-target="form-item-10" data-current="form-item-9">Trading</option>
				                <option data-target="form-item-10" data-current="form-item-9">Transportation</option>
				                <option data-target="form-item-10" data-current="form-item-9">Travel</option> -->
							</select>
						</div>
						
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Loan mailing address<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_lma" id="off_lma">
								<option value="">Select</option>
								<?php echo $strmailopt; ?>
							</select>
						</div>
						<?php if($employment_type == "1"){ ?>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper pl_appannual">
								<label class="uk-form-label fs-14">Annual gross income (₹)<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-disabled uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" value="<?=$anl_income?>" id="pl_app_gincome" name="off_income" disabled>
							</div>
						<?php }else if($employment_type == "2"){ ?>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper pl_apptotal">
							<label class="uk-form-label fs-14">Total income (₹)<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" id="off_income_total" name="off_income_total">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper">
							<label class="uk-form-label fs-14">Other income (₹)<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" id="ploff_income_other" name="off_income_other">
						</div>
						<?php }else{ ?>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper pl_appannual">
								<label class="uk-form-label fs-14">Annual gross income (₹)<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-disabled uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" value="<?=$anl_income?>" id="pl_app_gincome" name="off_income" disabled>
							</div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper pl_apptotal">
							<label class="uk-form-label fs-14">Total income (₹)<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" id="off_income_total" name="off_income_total">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper">
							<label class="uk-form-label fs-14">Other income (₹)<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" id="ploff_income_other" name="off_income_other">
						</div>
						<?php } ?>

					</div>
		    	</div>
		    </li>

		    <li class="uk-margin-large-top uk-margin-large-bottom">
		   		<a class="uk-accordion-title" href="#"><h3 class="uk-text-center fs-20 section_title fs-16-mobile uk-text-white identity-bg">Identity documents</h3></a>
		    	<div class="uk-accordion-content">
		    		<div class="uk-grid-large ff-helvetica" uk-grid>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">PAN<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="CKFPS2202L" name="pan" id="pan">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Other ID<span class="uk-text-red">*</span><span class="uk-float-right fe_icon uk-text-black ff-helvetica-bold" uk-icon="icon: file-edit; ratio:0.9"></span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" id="other_id" name="other_id">
								<option value="">Select</option>
								<?php echo $documenttype; ?>
							</select>
						</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper voter_details">
								<label class="uk-form-label fs-14">Voter ID<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="1234 5678 9012" name="voter_id" id="voter_id">
							</div>
							<!-- <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper voter_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="voter_validity" id="voter_validity">
							</div> -->

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper passport_details">
								<label class="uk-form-label fs-14">Passport number<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="A12 34567" name="passport_no">
							</div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile passport_details"></div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile passport_details"></div> 
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper passport_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="passport_validity">
							</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper license_details">
								<label class="uk-form-label fs-14">License number<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="AB12 12345678901" name="lic_no">
							</div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile license_details"></div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile license_details"></div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper license_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label> 
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="lic_validity">
							</div>

					</div>
					<div class="uk-margin-medium-bottom"></div>
					<div class="uk-padding uk-border-top-dashed pt-10 uk-padding-remove-left">
						<div class="uk-text-35 fs-14"><label><input class="uk-checkbox" type="checkbox" name="check1" id="check1">&nbsp;&nbsp;I/We authorize Standard Chartered Bank to verify & conduct Credit Bureau Check<span class="uk-text-red">*</span></label></div>
					</div>
					<input type="hidden" name="input_flag" value="2">
          			<input type="hidden" name="unique_id" id="unique_id" value="<?=$unique_id?>">
          			<input type="hidden" name="email" id="email" value="<?=$email?>">
          			<input type="hidden" name="mobile" id="mobile" value="<?=$mobile?>">
          			<input type="hidden" name="existing_rel_scb" id="existing_rel_scb" value="<?=$existing_rel_scb?>">
          			<input type="hidden" name="loan_amount" id="loan_amount" value="<?=$p->loan_amount?>">
          			<input type="hidden" name="tenure" id="tenure" value="<?=$tenure?>">
          			<input type="hidden" name="company_name" id="company_name" value="<?=$company_name?>">
          			<input type="hidden" name="company_code" id="company_code" value="<?=$company_code?>">
          			<input type="hidden" name="hdnindustryisic" id="hdnindustryisic" />	


					<div class="uk-margin-large-bottom uk-margin-large-top uk-text-center">
						<p class="ff-helvetica fs-14">Fields marked with an asterisk * are mandatory</p>
						<button type="submit" class="ff-helvetica-bold uk-button proceed fs-22 fs-18-mobile p-15 p-520 submit_pl_application">Submit my application</button>
					</div>
		    	</div>
		    </li>
		</ul>
		<!-- <div class="uk-position-fixed uk-text-center hidden_on_desktop hidden_on_tab uk-background-secondary submit_fixed">
			<div class="uk-padding-small">
				<button class="ff-helvetica fs-22 fs-18-mobile uk-text-white submit_pl_application">Submit my application</button>
			</div>
		</div>	 -->
	</form>
</div>




<div id="modal-submit" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
    	<h4 class="uk-h3 uk-margin-top ff-light">Your application has been successfully submitted.<br/>Please continue to complete documentation process.</h4>
    	<div class="uk-flex uk-flex-center uk-margin-top">
    		<a href="4-documentation.php" class="ff-helvetica uk-button uk-btn-green-bg uk-text-white fs-22 fs-16-mobile">Continue</a>	
    	</div>
    </div>
</div>

<?php include "partials/footer_pl.php";?>

<script type="text/javascript">
$("#salaried_scb").hide();
$("#se-business").hide();
	
	var pl_app_industry = '<?php echo $employer_industry; ?>';
	if(pl_app_industry!="" || pl_app_industry!="Employer Industry Segment")$("#pl_app_industry").val(pl_app_industry);

	// chetan added for permenant address
	$(function () {
        $("#chkaddress").click(function () {
            if ($(this).is(":checked")) {
                $("#dvaddress").hide();
            } else {
                $("#dvaddress").show();
            }
        });
    });
</script>