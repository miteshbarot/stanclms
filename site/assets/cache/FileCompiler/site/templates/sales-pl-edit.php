<?php 
 include(\ProcessWire\wire('files')->compile('partials/_sales_header.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
 include(\ProcessWire\wire('files')->compile("partials/_general_function.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));
?>
<div class="uk-container uk-container-large uk-text-small" data-uk-height-viewport="expand: true">
	<?php $p = $pages->get("id={$input->get->u}");
	// if ($input->post->update_form) {
	// 	/*echo "<pre>";
	// 	print_r($_POST);
	// 	echo "</pre>"; die();*/
	// 	$p->of(false);
	// 	foreach ($_POST as $key => $value) {
	// 		if ($key != "update_form" && $value != "") {
	// 			$p->$key = $value;
	// 		}
	// 	}
	// 	$p->save();
	// }
	/*
	$p->mobile = $mobile;
	$p->pincode = $pincode;
	$p->employment_type = $employment_type;
	$p->employer_name = $employer_name;
	$p->current_yr_audited = $current_yr_audited;
	$p->mothly_income = $mothly_income;
	$p->start_of_business = $start_yr." ".$start_month;
	$p->employer_industry = $employer_industry;
	$p->applicant_description = $applicant_description;
	$p->current_yr_taxable_income = $current_yr_taxable_income;
	$p->gross_turnover = $gross_turnover;
	$p->current_yr_depr = $current_yr_depr;
	$p->current_yr_tax = $current_yr_tax;
	$p->prev_yr_taxable_income = $prev_yr_taxable_income;
	$p->current_yr_depr = $current_yr_depr;
	$p->emi_amt = $emi_amt;
	$p->mode_of_salary = $mode_of_salary;
	$p->person_title = $person_title;
	$p->fname = $fname;
	$p->mname = $mname;
	$p->lname = $lname;
	$p->gender = $gender;
	$p->education = $education;
	$p->dob = $dob;
	$p->address = $add1." ".$add2." ".$add3;
	$p->purpose = $purpose;
	$p->landmark = $landmark;	
	$p->office_address = $input->post->office_address;
	$p->office_landmark = $off_landmark;
	$p->office_state = $off_state;
	$p->office_pincode = $off_pincode;
	$p->office_phone = $off_phone;
	$p->off_lma = $off_lma;
	$p->work_type = $work_type;
	$p->office_income = $off_income;
	$p->total_income = $off_income_total;
	$p->other_income = $off_income_other;
	$p->pan = $pan;
	$p->aadhar = $aadhar_no;
	$p->passport = $passport_no;
	$p->passport_validity = $passport_validity;
	$p->lic = $lic_no;
	$p->lic_validity = $lic_validity;
	$p->save();
	*/
$documenttype =getdocumentTypeOption();
?>
<form action="<?=$page->url?>?u=<?=$input->get->u?>&view=iframe" method="post" class="uk-grid uk-grid-small uk-grid-match" id="pl_salse_application_form">
	<div class="uk-width-1-4 uk-margin-bottom">
		<select name="title" class="uk-select" tabindex="1" id="title">
			<option>Select Title</option>
			<option <?php echo ($p->gender->title == 'Male')?'selected':'';?>>Mr.</option>
			<option <?php echo ($p->gender->title == 'Female')?'selected':'';?>>Ms.</option>
			<option >Mrs.</option>
			<option>Dr.</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="fname" value="<?=$p->fname?>" id="fname" tabindex="2" placeholder="First Name"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="mname" value="<?=$p->mname?>" tabindex="3" placeholder="Middle Name"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="lname" id="lname" value="<?=$p->lname?>" tabindex="4" placeholder="Last Name"/>
	</div>
	
	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <divs><?=$p->gender->title?></div> -->
		<select name="gender" id="gender" class="uk-select uk-select-small" tabindex="5">
			<option>Select Gender</option>
			<option value="1" <?php echo ($p->gender->title == 'Male')?'selected':'';?>>Male</option>
			<option value="2"<?php echo ($p->gender->title == 'Female')?'selected':'';?>>Female</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input dob" name="dob" id="datepi" value="<?=$p->dob?>" tabindex="6" placeholder="Date of Birth"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="mobile" id="mobile" value="<?=$p->mobile?>" tabindex="7" placeholder="Mobile"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="email" class="uk-input" name="email" id="email" value="<?=$p->email?>" tabindex="8" placeholder="Email"/>
	</div>

	<div class="uk-width-1-1 uk-margin-small"></div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="pincode" id="pincode" value="<?=$p->pincode?>" tabindex="9" placeholder="Pincode"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <div><?=$p->education?></div> -->
		<select name="education" id="education" class="uk-select uk-select-small" tabindex="10">
			<!-- <option value="Post Graduate"<?php //echo ($p->education == 'Post Graduate')?'selected':'';?>>Post Graduate</option>
			<option value="Graduate"<?php //echo ($p->education == 'Post Graduate')?'selected':'';?> >Graduate</option>
			<option value="Under Graduate" <?php //echo ($p->education == 'Under Graduate')?'selected':'';?>>Under Graduate</option> -->
			<option selected="selected">Select</option>
			<option value="PSC">Pimary school</option>
			<option value="SEC">SSC/HSC</option>
			<option value="PRE">Post Graduate</option>
			<option value="GRD">Graduate</option>
			<option value="UND">Under Graduate</option>
			<option value="PRE">Professional qualification</option>
			<option value="DIP">Diploma holder</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<textarea name="add1" id="add1" value="<?php echo $p->add1; ?>" class="uk-textarea uk-border-rounded" rows="1" placeholder="address" tabindex="11"><?=$p->address?></textarea>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="landmark" id="landmark" value="<?=$p->landmark?>" tabindex="12" placeholder="Landmark"/>
	</div>


	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <div><?=$p->purpose?></div> -->
		<select name="purpose" class="uk-select uk-select-small" tabindex="13">
			<!-- <option selected="selected">Select</option> -->
			<option value="Children's education" <?php echo ($p->purpose == "Childrens's education")?'selected':'';?>>Children's education</option>
			<option value="House Renovation"<?php echo ($p->purpose == 'House renovation')?'selected':'';?>>House renovation</option>
			<option value="Vehicle" <?php echo ($p->purpose == 'Vehicle')?'selected':'';?>>Vehicle</option>
			<option value="Consumer Durable"<?php echo ($p->purpose == 'Consumer durable')?'selected':'';?>>Consumer durable</option>
			<option value="Medical Expenses"<?php echo ($p->purpose == 'Medical expenses')?'selected':'';?>>Medical expenses</option>
			<option value="Marriage in Family"<?php echo ($p->purpose == 'Marriage in family')?'selected':'';?>>Marriage in family</option>
			<option value="Travel/Holiday"<?php echo ($p->purpose == 'Travel/Holiday')?'selected':'';?>>Travel/Holiday</option>
			<option value="Others"><?php echo ($p->purpose == 'Others')?'selected':'';?>>Others</option>
		</select>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="emp_name" id="pl_company" value="<?=$p->employer_name?>" tabindex="20" placeholder="Employer Name"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <div><?=$p->employment_type->title?></div> -->
		<select name="employment_type" id="emp_type" class="uk-select uk-select-small" tabindex="19" onchange="showOccupationFields(this);">
			<option value="">Select Occupation</option>
				<option <?php if($p->employment_type == '1'){echo "selected";} ?>>Salaried</option>
				<!-- <option value="">Select</option> -->
				<option value="4" <?php if($p->employment_type == '4'){echo "selected";} ?>>Salaried: SCB Salary A/C</option>					
				<option value="5" <?php if($p->employment_type == '5'){echo "selected";} ?>>Salaried: Other Bank Salary A/C</option>
				<option value="2" <?php if($p->employment_type == '2'){echo "selected";} ?>>Self Employed Business</option>
				<option value="3" <?php if($p->employment_type == '3'){echo "selected";} ?>>Self Employed Professional</option>
				<option value="6" <?php if($p->employment_type == '6'){echo "selected";} ?>>Salaried: By Cash or Cheque</option>
		</select>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <div><?=$p->work_type?></div> -->
		<select name="work_type" id="work_type" class="uk-select uk-select-small" tabindex="21">
			<option>Select Work Type</option>
			<option value="Public Limited"<?php echo ($p->work_type == 'Public Limited')?'selected':'';?>>Public Limited</option>
			<option value="Private Limited"<?php echo ($p->work_type == 'Private Limited')?'selected':'';?>>Private Limited</option>
			<option value="Government"<?php echo ($p->work_type == 'Government')?'selected':'';?>>Government</option>
			<option value="Others"<?php echo ($p->work_type == 'Other')?'selected':'';?>>Other</option>
		</select>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom" id="salaried_scb">
		<input type="text" class="uk-input" name="monthly_income" id="net_monthly_income" value="<?=$p->mothly_income?>" tabindex="15" placeholder="Net Monthly Income"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<select name="total_exp" id="totexp" class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top"><option value="0">Select total exp</option><option value="1">&lt;1 year</option><option value="2">1-2 years</option><option value="3">2-3 years</option><option value="4">3-4 years</option><option value="5">4-5 years</option><option value="6">5-6 years</option><option value="7">&gt;6 years</option></select>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<textarea name="off_add1" id="off_add1" class="uk-textarea uk-border-rounded" rows="1" placeholder="Office address" tabindex="14" value="<?=$p->office_address?>"></textarea>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="off_landmark" id="off_landmark"  value="<?=$p->office_landmark?>" tabindex="15" placeholder="Office Landmark"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="off_phone" id="off_phone" value="<?=$p->office_phone?>" tabindex="16" placeholder="Office Phone"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		
		<select name="off_state" class="uk-select uk-select-small" tabindex="17">
			<option>Office State</option>
			<option <?php echo ($p->office_state == 'Andaman and Nicobar Islands')?'selected':'';?>>Andaman and Nicobar Islands</option>
			<option <?php echo ($p->office_state == 'Andhra Pradesh')?'selected':'';?>>Andhra Pradesh</option>
			<option <?php echo ($p->office_state == 'Arunachal Pradesh')?'selected':'';?>>Arunachal Pradesh</option>
			<option <?php echo ($p->office_state == 'Assam')?'selected':'';?>>Assam</option>
			<option <?php echo ($p->office_state == 'Bihar')?'selected':'';?>>Bihar</option>
			<option <?php echo ($p->office_state == 'Chandigarh')?'selected':'';?>>Chandigarh</option>
			<option <?php echo ($p->office_state == 'Chhattisgarh')?'selected':'';?>>Chhattisgarh</option>
			<option <?php echo ($p->office_state == 'Dadra')?'selected':'';?>>Dadra and Nagar Haveli and Daman and Diu</option>
			<option <?php echo ($p->office_state == 'Delhi')?'selected':'';?>>Delhi</option>
			<option <?php echo ($p->office_state == 'Goa')?'selected':'';?>>Goa</option>
			<option <?php echo ($p->office_state == 'Gujarat')?'selected':'';?>>Gujarat</option>
			<option <?php echo ($p->office_state == 'Haryana')?'selected':'';?>>Haryana</option>
			<option <?php echo ($p->office_state == 'Himachal Pradesh')?'selected':'';?>>Himachal Pradesh</option>
			<option <?php echo ($p->office_state == 'Jammu and Kashmir')?'selected':'';?>>Jammu and Kashmir</option>
			<option <?php echo ($p->office_state == 'Jharkhand')?'selected':'';?>>Jharkhand</option>
			<option <?php echo ($p->office_state == 'Karnataka')?'selected':'';?>>Karnataka</option>
			<option <?php echo ($p->office_state == 'Kerala')?'selected':'';?>>Kerala</option>
			<option <?php echo ($p->office_state == 'Ladakh')?'selected':'';?>>Ladakh</option>
			<option <?php echo ($p->office_state == 'Lakshadweep')?'selected':'';?>>Lakshadweep</option>
			<option <?php echo ($p->office_state == 'Madhya Pradesh')?'selected':'';?>>Madhya Pradesh</option>
			<option <?php echo ($p->office_state == 'Maharashtra')?'selected':'';?>>Maharashtra</option>
			<option <?php echo ($p->office_state == 'Manipur')?'selected':'';?>>Manipur</option>
			<option <?php echo ($p->office_state == 'Meghalaya')?'selected':'';?>>Meghalaya</option>
			<option <?php echo ($p->office_state == 'Mizoram')?'selected':'';?>>Mizoram</option>
			<option <?php echo ($p->office_state == 'Nagaland')?'selected':'';?>>Nagaland</option>
			<option <?php echo ($p->office_state == 'Odisha')?'selected':'';?>>Odisha</option>
			<option <?php echo ($p->office_state == 'Puducherry')?'selected':'';?>>Puducherry</option>
			<option <?php echo ($p->office_state == 'Punjab')?'selected':'';?>>Punjab</option>
			<option <?php echo ($p->office_state == 'Rajasthan')?'selected':'';?>>Rajasthan</option>
			<option <?php echo ($p->office_state == 'Sikkim')?'selected':'';?>>Sikkim</option>
			<option <?php echo ($p->office_state == 'Tamil Nadu')?'selected':'';?>>Tamil Nadu</option>
			<option <?php echo ($p->office_state == 'Telangana')?'selected':'';?>>Telangana</option>
			<option <?php echo ($p->office_state == 'Tripura')?'selected':'';?>>Tripura</option>
			<option <?php echo ($p->office_state == 'Uttar Pradesh')?'selected':'';?>>Uttar Pradesh</option>
			<option <?php echo ($p->office_state == 'Uttarakhand')?'selected':'';?>>Uttarakhand</option>
			<option <?php echo ($p->office_state == 'West Bengal')?'selected':'';?>>West Bengal</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="off_pincode" id="off_pincode" value="<?=$p->office_pincode?>" tabindex="18" placeholder="Office Pincode"/>
	</div>

	<div class="uk-width-1-1 uk-margin-small"></div>
	
	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- // <div><?=$p->employer_industry?></div> -->
		<select name="employer_industry" id="employer_industry" class="uk-select uk-select-small" tabindex="22">
			<option>Select Industry</option>
			<option>Accountancy</option>
            <option>Advertising</option>
            <option>Airlines</option>
            <option>Automobiles</option>
            <option>Banking</option>
            <option>BPO / Call Center</option>
            <option>Bureau</option>
            <option>College Institute</option>
            <option>Consumer Goods</option>
            <option>E-Commerce</option>
            <option>Engineering/Infrastructure</option>
            <option>Export/ Import</option>
            <option>Hospitals</option>
            <option>Hotel</option>
            <option>Insurance</option>
            <option>IT / Software</option>
            <option>Manufacturing</option>
            <option>Media / Entertainment</option>
            <option>Ministries</option>
            <option>NGO</option>
            <option>Others</option>
            <option>Petroleum</option>
            <option>Pharma</option>
            <option>Police</option>
            <option>Post</option>
            <option>Power</option>
            <option>Railways</option>
            <option>Real Estate</option>
            <option>Schools</option>
            <option>Share / Brokerage</option>
            <option>Telecom</option>
            <option>Trading</option>
            <option>Transportation</option>
            <option>Travel</option>
		</select>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<!-- <div><?=$p->off_lma?></div> -->
		<select name="off_lma" id="off_lma" class="uk-select uk-select-small" tabindex="23">
			<option>Select Loan Mailing Address</option>
			<option>Residence</option>
			<option>Office</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="office_income" id="pl_app_gincome" value="" tabindex="24" placeholder="Annual Gross Income"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="off_income" id="off_income_total" value="" tabindex="24" placeholder="Total income(₹)"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="off_income_other" id="ploff_income_other" value="" tabindex="24" placeholder="Other income(₹)"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="tenure" id="tenure" value="" tabindex="24" placeholder="Tenure(In years)"/>
	</div>
	<!-- Self Employed Business fields start -->
<div class="uk-margin-bottom" id="se-business">
    <div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="start_date" id="start_date" value="<?=$p->start_of_business?>" tabindex="28" placeholder="Business Start Date YYYY-MMM"/>
	</div> 

	<div class="uk-width-1-4 uk-margin-bottom" style="display:none" id="self_emp_business_gt">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="dsc_applicant" id="dsc_applicant">
					<option selected="selected">Select best describes applicant </option>
					<option value="Public Limited">Sole Proprietor</option>
					<option value="Private Limited">Partnership</option>
				</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="current_yr_taxable_income" id="curr_yr_tax" value="<?=$p->current_yr_taxable_income?>" tabindex="26" placeholder="Current Year Taxable Income"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="gross_turnover" id="cygt" value="<?=$p->gross_turnover?>" tabindex="29" placeholder="Current Year Gross Turnover"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="prev_yr_taxable_income" id="pyti" value="<?=$p->prev_yr_taxable_income?>" tabindex="27" placeholder="Previous Year Taxable Income"/>
	</div>

	<div style="display:none" id="self_emp_prof_occ" class="uk-width-1-4 uk-margin-bottom" >
								
								<select class="uk-select uk-select-small" name="profession" id="profession">
								<option value="0">Select Occupation Type</option><option value="1">Architect (B.Arch)</option><option value="2">Chartered Accountant</option><option value="3">Company Secretary</option><option value="4">Cost Accountant</option><option value="5">Doctor</option><option value="6">Engineer (B.Tech / B.E)</option></select>
	</div>

	<div style="display:none" id="self_emp_prof_txtinc" class="uk-width-1-4 uk-margin-bottom" >
								
		<input type="text" class="uk-input" name="start_of_business" id="start_of_business" value="<?=$p->start_of_business?>" tabindex="28" placeholder="Current year business income"/>
	</div>

</div>
<!-- Self Employed Business fields end -->

	
	<div class="uk-width-1-4 uk-margin-bottom">

		<select name="mode_of_salary" id="mod_salary" class="uk-select uk-select-small" tabindex="32">
			<option >Select salary mode</option>
			<option value="2">Via Cheque</option>
			<option value="1">In Cash</option>
		</select>
	</div>

	<div class="uk-width-1-1 uk-margin-small"></div>

	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="pan" id="pan" value="<?=$p->pan?>" tabindex="33" placeholder="PAN Card"/>
	</div>
	<!-- <div class="uk-width-1-4 uk-margin-bottom">
		<input type="number" class="uk-input" name="aadhar_no" value="<?=$p->aadhar_no?>" tabindex="34" placeholder="Aadhar Number"/>
	</div> -->
	<div class="uk-width-1-4 uk-margin-bottom">

		<select name="doc_type" id="doc_type" class="uk-select uk-select-small" tabindex="32" onchange="onDocumentChange(this)">
			<option value="none">Select Document Type</option>
			<option value="passport">Passport</option>
			<option value="driving">Driving License</option>
			<option value="voter">VoterID</option>
		</select>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom passport" style="display: none;">
		<input type="text" class="uk-input" name="passport_no" id="passport_no" value="<?=$p->passport?>" tabindex="35" placeholder="Passport Number"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom passport_val" style="display: none;">
		<input type="text" class="uk-input" name="passport_validity" id="passport_validity" value="<?=$p->passport_validity?>" tabindex="36" placeholder="Passport Validity"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom driving" style="display: none;">
		<input type="text" class="uk-input" name="lic_no" id="lic_no" value="<?=$p->lic?>" tabindex="37" placeholder="Driving License Number"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom driving_val" style="display: none;">
		<input type="text" class="uk-input" name="lic_validity" id="lic_validity" value="<?=$p->lic_validity?>" tabindex="38" placeholder="Driving License Validity"/>
	</div>

	<div class="uk-width-1-4 uk-margin-bottom voter" style="display: none;">
		<input type="text" class="uk-input" name="voter_id"  id="voter_id" value="<?=$p->voter?>" tabindex="37" placeholder="Voter ID"/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="aip_ref_number" id="aip_ref_number" value="<?=$p->aip_ref_number?>" tabindex="38" placeholder="AIP REF NUMBER" readonly/>
	</div>
	<div class="uk-width-1-4 uk-margin-bottom">
		<input type="text" class="uk-input" name="status" id="status" value="<?php echo !empty($p->stat && $p->stat == 'APPROVE') ? $p->stat : '';  ?>" tabindex="38" placeholder="STATUS" readonly/>
	</div>
	<!-- Hidden fields  -->
	 <input type="hidden" name="input_flag" value="2">
	 <input type="hidden" name="pagetype" value="sale">
	 <input type="hidden" name="unique_id" value="<?php echo $p->unique_id; ?>">
	 <input type="hidden" name="existing_rel_scb" id="existing_rel_scb" value="0">
	 <input type="hidden" name="loan_amount" id="loan_amount" value="<?php echo $p->loan_amount; ?>">
	<input type="hidden" name="company_name" id="company_name" value="<?php echo $p->company_name;?>">
	<input type="hidden" name="company_code" id="company_code" value="<?php $p->company_code;?>">
	<input type="hidden" name="sameasResiAdd" id="sameasResiAdd" value="1">

	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="uk-width-1-3 uk-margin-bottom"></div>
	<div class="uk-width-1-3 uk-margin-bottom uk-text-center">
		<input name="update_form" type="submit" class="uk-display-inline uk-button uk-button-primary update_form" tabindex="39" value="Save" />
	</div>
	<div class="uk-width-1-3 uk-margin-bottom"></div>
</form>

</div><!-- uk-container -->
<?php include(\ProcessWire\wire('files')->compile('partials/_sales_footer.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>