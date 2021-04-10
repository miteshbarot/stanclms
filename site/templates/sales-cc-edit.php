<?php 
include 'partials/_sales_header.php';
include "partials/_general_function.php"; 
$documenttype =getdocumentTypeOption($p->document_type);
$education =geteductionOption($p->education);
$field = $fields->get('person_title_opt');
$all_options = $field->type->getOptions($field);
	if (count($all_options)) {
			foreach ($all_options as $ed=>$ev) {
				$stroption2 .="<option value='".$ed."'";
				if($p->person_title_opt==$ed){
					$stroption2 .="selected";
				 }
				 $stroption2 .=">".$ev->title."</option>";
			 }
	}

$strmailopt ="";
$field_m = $fields->get('mailing_address_opt');
$all_options_m = $field_m->type->getOptions($field_m);
	if (count($all_options_m)) {
			foreach ($all_options_m as $ml=>$mv) {
				$strmailopt .="<option value='".$ml."'";
			if($p->mailing_address_opt==$ed){
					$strmailopt .="selected";
				 }
				$strmailopt .=" >".$mv->title."</option>";
			 }
	}

$strwkexp ="";
$field_wexp = $fields->get('total_exp');
$all_options_ex = $field_wexp->type->getOptions($field_wexp);
	if (count($all_options_ex)) {
			foreach ($all_options_ex as $exk=>$texp) {
				$strwkexp .="<option value='".$exk."'";
				if($p->total_exp==$ed){
					$strwkexp .="selected";
				 }
				$strwkexp .=" >".$texp->title."</option>";
			 }
	}


$strdesignation ="";
$field_desi = $fields->get('designation');
$all_options_des = $field_desi->type->getOptions($field_desi);
	if (count($all_options_des)) {
			foreach ($all_options_des as $desk=>$desv) {
				$strdesignation .="<option value='".$desk."'";
				if($p->designation==$ed){
					$strdesignation .="selected";
				 }
				$strdesignation .=" >".$desv->title."</option>";
			 }
	}

	$strres_type ="";
$field_resi = $fields->get('residence_type');
$all_options_res = $field_desi->type->getOptions($field_resi);
	if (count($all_options_res)) {
			foreach ($all_options_res as $res=>$resv) {
				$strres_type .="<option value='".$res."'";
				if($p->residence_type==$ed){
					$stroption2 .="selected";
				 }
				$strres_type .=" >".$resv->title."</option>";
			 }
	}

$strres_indoctype ="";
$field_indoctype = $fields->get('income_document_type');
$all_options_inc = $field_indoctype->type->getOptions($field_indoctype);
	if (count($all_options_inc)) {
			foreach ($all_options_inc as $k=>$v) {
				$strres_indoctype .="<option value='".$k."'";
				if($p->income_document_type==$ed){
					$stroption2 .="selected";
				 }
				$strres_indoctype .=" >".$v->title."</option>";
			 }
	}
	
  $occupation = $pages->get(31498)->children;
  $banks = $pages->get(31518)->children;
  //$employer_industry = $pages->get(31459)->children;
  $industryisic = $pages->get(1049)->children;
  $leadcity = $pages->get(31601)->children;
?>
<div class="uk-container uk-container-large uk-text-small" data-uk-height-viewport="expand: true">
	<?php $p = $pages->get("id={$input->get->u}");
	if ($input->post->update_form) {
		//echo '<pre>';print_r($_POST);
		$p->of(false);
		foreach ($_POST as $key => $value) {
			if ($key != "update_form" && $value != "") {
				$p->$key = $value;
			}
		}
		$p->save();
	}
?>

<form action="<?=$page->url?>?u=<?=$input->get->u?>&view=iframe" method="post" class="uk-grid uk-grid-small uk-grid-match" id="cc_salse_application_form">
	<div class="section-title uk-width-1-1"><span>Personal Information</span></div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<div class="uk-width-1-5">
			<select name="title" class="uk-select uk-margin-small-top" tabindex="1">
				<!-- <option selected>Mr.</option>
				<option>Ms.</option>
				<option>Mrs.</option>
				<option>Dr.</option> -->
				<?php echo $stroption2; ?>
			</select>
		</div>
		<div class="uk-width-4-5">
			<input type="text" class="uk-input uk-margin-small-top" name="fname" value="<?=$p->fname?>" tabindex="2" placeholder="First Name"/>
		</div>
	</div>

	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Middle Name" name="mname" value="<?php echo $p->mname; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Last Name" name="lname" id="lname" value="<?php echo $p->lname; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input type="text" class="uk-input uk-form-width-input uk-border-rounded hasDatepicker uk-margin-small-top dob" name="dob" id="datepicker" autocomplete="off" placeholder="DD/MM/YYYY" value="<?php echo $p->dob; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-1-3">
				<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="gender" id="gender">
					<option value="1" <?php echo $p->gender=="1"?"selected":""; ?>>Male</option>
					<option value="2" <?php echo $p->gender=="2"?"selected":""; ?>>Female</option>
					<option value="3" <?php echo $p->gender=="3"?"selected":""; ?>>Other</option>
				</select>
			</div>
		</div>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_occ" id="off_occ">
			<option value="">Select Occupation</option>
				<?php foreach ($occupation as $oc) { ?>
							<option value="<?=$oc->id?>" <?php echo $p->occupation==$oc->id?"selected":""; ?> ><?=$oc->title?></option>
							<?php } ?>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input type="text" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" name="dependents" id="dependents" autocomplete="off" maxlength="2" placeholder="No of Dependants">
	</div>

	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="education" id="education">
			<option value="">Select Education</option>
			<?php echo $education; ?>
		</select>
	</div>

<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="emp_type" id="emp_type">
			   <option>Select Employment Type</option>
          		<option data-target="form-item-8" data-current="form-item-7" value="1" <?php echo $p->employment_type=="1"?"selected":"" ?>>Salaried</option>
          		<option data-target="form-item-12" data-current="form-item-7" value="3" <?php echo $p->employment_type=="3"?"selected":"" ?>>Self Employed Professional</option>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="work_type" id="work_type">
		<option value="">Select Work Type</option>
		<?php echo getworkTypeOption($p->work_type_new); ?>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Address line 1" name="add1" id="add1" value="<?php echo $p->address; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Address line 2" name="add2">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Address line 3" name="add3">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Landmark" name="landmark" id="landmark" value="<?php echo $p->landmark; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="city" id="city">
			<option selected="selected">Select City</option>
			<option value="Ahmedabad">Ahmedabad</option>
				<option value="Bengaluru">Bengaluru/Bangalore</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Chennai">Chennai</option>
				<option value="Delhi">Delhi</option>
				<option value="Gurgaon">Gurgaon</option>
				<option value="Hyderabad">Hyderabad/Secunderabad</option>
				<option value="Kolkatta">Kolkatta</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Noida">Noida</option>
				<option value="Pune">Pune</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Andhra Pradesh-</i></option>
				<option value="Anantapur">Anantapur</option>
				<option value="Guntakal">Guntakal</option>
				<option value="Guntur">Guntur</option>
				<option value="Secunderabad">Hyderabad/Secunderabad</option>
				<option value="kakinada">kakinada</option>
				<option value="kurnool">kurnool</option>
				<option value="Nellore">Nellore</option>
				<option value="Nizamabad">Nizamabad</option>
				<option value="Rajahmundry">Rajahmundry</option>
				<option value="Tirupati">Tirupati</option>
				<option value="Vijayawada">Vijayawada</option>
				<option value="Visakhapatnam">Visakhapatnam</option>
				<option value="Warangal">Warangal</option>
				<option value="Andra Pradesh-Other">Andra Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Arunachal Pradesh-</i></option>
				<option value="Itanagar">Itanagar</option>
				<option value="Arunachal Pradesh-Other">Arunachal Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Assam-</i></option>
				<option value="Guwahati">Guwahati</option>
				<option value="Silchar">Silchar</option>
				<option value="Assam-Other">Assam-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Bihar-</i></option>
				<option value="Bhagalpur">Bhagalpur</option>
				<option value="Patna">Patna</option>
				<option value="Bihar-Other">Bihar-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Chhattisgarh-</i></option>
				<option value="Bhillai">Bhillai</option>
				<option value="Bilaspur">Bilaspur</option>
				<option value="Raipur">Raipur</option>
				<option value="Chhattisgarh-Other">Chhattisgarh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Goa-</i></option>
				<option value="Panaji">Panjim/Panaji</option>
				<option value="Vasco Da Gama">Vasco Da Gama</option>
				<option value="Goa-Other">Goa-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Gujarat-</i></option>
				<option value="Ahmedabad">Ahmedabad</option>
				<option value="Anand">Anand</option>
				<option value="Ankleshwar">Ankleshwar</option>
				<option value="Bharuch">Bharuch</option>
				<option value="Bhavnagar">Bhavnagar</option>
				<option value="Bhuj">Bhuj</option>
				<option value="Gandhinagar">Gandhinagar</option>
				<option value="Gir">Gir</option>
				<option value="Jamnagar">Jamnagar</option>
				<option value="Kandla">Kandla</option>
				<option value="Porbandar">Porbandar</option>
				<option value="Rajkot">Rajkot</option>
				<option value="Surat">Surat</option>
				<option value="Vadodara">Vadodara/Baroda</option>
				<option value="Valsad">Valsad</option>
				<option value="Vapi">Vapi</option>
				<option value="Gujarat-Othe">Gujarat-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Haryana-</i></option>
				<option value="Ambala">Ambala</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Faridabad">Faridabad</option>
				<option value="Gurgaon">Gurgaon</option>
				<option value="Hisar">Hisar</option>
				<option value="Karnal">Karnal</option>
				<option value="Kurukshetra">Kurukshetra</option>
				<option value="Panipat">Panipat</option>
				<option value="Rohtak">Rohtak</option>
				<option value="Haryana-Other">Haryana-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Himachal Pradesh-</i></option>
				<option value="Dalhousie">Dalhousie</option>
				<option value="Dharmasala">Dharmasala</option>
				<option value="Manali">Kulu/Manali</option>
				<option value="Shimla">Shimla</option>
				<option value="Himachal Pradesh-Other">Himachal Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Jammu and Kashmir-</i></option>
				<option value="Jammu">Jammu</option>
				<option value="Srinagar">Srinagar</option>
				<option value="Jammu-Other">Jammu and Kashmir-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Jharkhand-</i></option>
				<option value="Bokaro">Bokaro</option>
				<option value="Dhanbad">Dhanbad</option>
				<option value="Jamshedpur">Jamshedpur</option>
				<option value="Ranchi">Ranchi</option>
				<option value="Jharkhand-Other">Jharkhand-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Karnataka-</i></option>
				<option value="Bengaluru">Bengaluru/Bangalore</option>
				<option value="Belgaum">Belgaum</option>
				<option value="Bellary">Bellary</option>
				<option value="Bidar">Bidar</option>
				<option value="Dharwad">Dharwad</option>
				<option value="Gulbarga">Gulbarga</option>
				<option value="Hubli">Hubli</option>
				<option value="Kolar">Kolar</option>
				<option value="Mangalore">Mangalore</option>
				<option value="Mysoru">Mysoru/Mysore</option>
				<option value="Karnataka-Other">Karnataka-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Kerala-</i></option>
				<option value="Calicut">Calicut</option>
				<option value="Cochin">Cochin</option>
				<option value="Ernakulam">Ernakulam</option>
				<option value="Kannur">Kannur</option>
				<option value="Kochi">Kochi</option>
				<option value="Kollam">Kollam</option>
				<option value="Kottayam">Kottayam</option>
				<option value="Kozhikode">Kozhikode</option>
				<option value="Palakkad">Palakkad</option>
				<option value="Palghat">Palghat</option>
				<option value="Thrissur">Thrissur</option>
				<option value="Trivandrum">Trivandrum</option>
				<option value="Kerela-Other">Kerela-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Madhya Pradesh-</i></option>
				<option value="Bhopal">Bhopal</option>
				<option value="Gwalior">Gwalior</option>
				<option value="Indore">Indore</option>
				<option value="Jabalpur">Jabalpur</option>
				<option value="Ujjain">Ujjain</option>
				<option value="Madhya Pradesh-Other">Madhya Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Maharashtra-</i></option>
				<option value="Ahmednagar">Ahmednagar</option>
				<option value="Aurangabad">Aurangabad</option>
				<option value="Jalgaon">Jalgaon</option>
				<option value="Kolhapur">Kolhapur</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Mumbai Suburbs">Mumbai Suburbs</option>
				<option value="Nagpur">Nagpur</option>
				<option value="Nasik">Nasik</option>
				<option value="Navi Mumbai">Navi Mumbai</option>
				<option value="Pune">Pune</option>
				<option value="Solapur">Solapur</option>
				<option value="Maharashtra-Other">Maharashtra-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Manipur-</i></option>
				<option value="Imphal">Imphal</option>
				<option value="Manipur-Other">Manipur-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Meghalaya-</i></option>
				<option value="Shillong">Shillong</option>
				<option value="Mizoram-Other">Meghalaya-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Mizoram-</i></option>
				<option value="Aizawal">Aizawal</option>
				<option value="Mizoram-Other">Mizoram-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Nagaland-</i></option>
				<option value="Dimapur">Dimapur</option>
				<option value="Nagaland-Other">Nagaland-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Orissa-</i></option>
				<option value="Bhubaneshwar">Bhubaneshwar</option>
				<option value="Cuttak">Cuttak</option>
				<option value="Paradeep">Paradeep</option>
				<option value="Puri">Puri</option>
				<option value="Rourkela">Rourkela</option>
				<option value="Orissa-Other">Orissa-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Punjab-</i></option>
				<option value="Amritsar">Amritsar</option>
				<option value="Bathinda">Bathinda</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Jalandhar">Jalandhar</option>
				<option value="Ludhiana">Ludhiana</option>
				<option value="Mohali">Mohali</option>
				<option value="Pathankot">Pathankot</option>
				<option value="Patiala">Patiala</option>
				<option value="Punjab-Other">Punjab-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Rajasthan-</i></option>
				<option value="Ajmer">Ajmer</option>
				<option value="Jaipur">Jaipur</option>
				<option value="Jaisalmer">Jaisalmer</option>
				<option value="Jodhpur">Jodhpur</option>
				<option value="Kota">Kota</option>
				<option value="Udaipur">Udaipur</option>
				<option value="Rajasthan-Other">Rajasthan-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Sikkim-</i></option>
				<option value="Gangtok">Gangtok</option>
				<option value="Sikkim-Other">Sikkim-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Tamil Nadu-</i></option>
				<option value="Chennai">Chennai</option>
				<option value="Coimbatore">Coimbatore</option>
				<option value="Cuddalore">Cuddalore</option>
				<option value="Erode">Erode</option>
				<option value="Hosur">Hosur</option>
				<option value="Madurai">Madurai</option>
				<option value="Nagerkoil">Nagerkoil</option>
				<option value="Ooty">Ooty</option>
				<option value="Salem">Salem</option>
				<option value="Thanjavur">Thanjavur</option>
				<option value="Tirunalveli">Tirunalveli</option>
				<option value="Trichy">Trichy</option>
				<option value="Tuticorin">Tuticorin</option>
				<option value="Vellore">Vellore</option>
				<option value="Tamil Nadu-Other">Tamil Nadu-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Tripura-</i></option>
				<option value="Agartala">Agartala</option>
				<option value="Tripura-Other">Tripura-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Union Territories-</i></option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Haveli-Silvassa">Dadra & Nagar Haveli-Silvassa</option>
				<option value="Daman & Diu">Daman & Diu</option>
				<option value="Delhi">Delhi</option>
				<option value="Pondichery">Pondichery</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Uttar Pradesh-</i></option>
				<option value="Agra">Agra</option>
				<option value="Aligarh">Aligarh</option>
				<option value="All">Allahabad</option>
				<option value="Bareilly">Bareilly</option>
				<option value="Faizabad">Faizabad</option>
				<option value="Ghaziabad">Ghaziabad</option>
				<option value="Gorakhpur">Gorakhpur</option>
				<option value="Kanpur">Kanpur</option>
				<option value="Lucknow">Lucknow</option>
				<option value="Mathura">Mathura</option>
				<option value="Meerut">Meerut</option>
				<option value="Moradabad">Moradabad</option>
				<option value="Noida">Noida</option>
				<option value="Varanasi">Varanasi/Banaras</option>
				<option value="Uttar Pradesh-Other">Uttar Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Uttaranchal-</i></option>
				<option value="Bhubaneshwar">Dehradun</option>
				<option value="Roorkee">Roorkee</option>
				<option value="Uttaranchal-Other">Uttaranchal-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-West Bengal-</i></option>
				<option value="Asansol">Asansol</option>
				<option value="Durgapur">Durgapur</option>
				<option value="Haldia">Haldia</option>
				<option value="Kharagpur">Kharagpur</option>
				<option value="Kolkatta">Kolkatta</option>
				<option value="Siliguri">Siliguri</option>
				<option value="West Bengal">West Bengal - Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><i>-Other-</i></option>
				<option value="Other">Other</option>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input id="cc_homepin" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="Pincode" value="<?php echo $p->pincode; ?>" name="pincode">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="re-type" id="re-type">
			<option selected="selected">Select Residence Type</option>
		<option value="">Select</option>
							<?php echo $strres_type; ?>
						</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="cd-m-address" id="cd-m-address">
			<option value="">Select Mailing Address</option>
				<?php echo $strmailopt; ?>
			</select>
	</div>

	<!-- Employment details -->
	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="section-title uk-width-1-1"><span>Employment & Income Details</span></div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded pl_employer_name alpha-only uk-margin-small-top" type="text" placeholder="Company Name" id="cc_company" name="pl_home_emp_name" data-target="form-item-9" data-current="form-item-8" data-value="<?php echo $root; ?>">
  			<span class="error commonErr" style="display: none;">Error Here</span>
  			<input type="hidden" name="emp_code" id="emp_code" />
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select name="designation" id="designation" class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top">
            <option selected="selected">Select Designation</option>
           <?php echo $strdesignation; ?>
        </select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_industry" id="off_industry">
					<option selected="selected">Select Industry(ISIC)</option>
					<?php foreach ($industryisic as $ins) { ?>
								        <option value="<?=$ins->id?>" data-id="<?=$ins->code?>" ><?=$ins->title?></option>
							<?php } ?><?php foreach ($industryisic as $ins) { ?>
								        <option value="<?=$ins->id?>" data-id="<?=$ins->code?>"
								        <?php echo $ins->id==$p->industry_isic?"selected":""; ?> ><?=$ins->title?></option>
							<?php } ?>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="tt-work" id="tt_work">
			<option value="">Select work experience</option><?php echo $strwkexp; ?></select>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="bank_branch" id="bank_branch">
			<option selected="selected">Select Salaried bank account with</option>
			<?php foreach ($banks as $bk) { ?>
			  <option value="<?=$bk->id?>" <?php echo $bk->id==$p->banks?"selected":""; ?> ><?=$bk->title?></option>
		    <?php } ?>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="Email" placeholder="Office Email"id="ofc_email" name="ofc_email" value="<?php echo $p->off_lma; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="Phone no (O)" name="off_phone" value="<?php echo $p->office_phone; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Office address 1" name="off_add1" id="off_add1"  value="<?php echo $p->office_address; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Office address 2" name="off_add2">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Office address 3" name="off_add3">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Office landmark" name="off_landmark" id="off_landmark" value="<?php echo $p->office_landmark; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="ofc_city" id="ofc_city">
			<option selected="selected">Select City</option>
			<?php foreach($leadcity as $city){ ?>
			<option value="<?=$city->id?>" <?php if($p->citycode==$city->title) { echo "selected"; } ?>><?=$city->title?></option>
			<?php } ?>
			</select>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input id="off_pincode"  class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="Pincode" name="off_pincode" value="<?php echo $p->office_pincode; ?>" >
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="document_type" id="document_type">
			<option  value="">Income Proof Document</option>
			<?php if($p->employment_type === '1') { ?>
			<option value="1" <?php if($p->document_type == "1"){echo "selected";} ?>>Payslip</option>
			<option value="2" <?php if($p->document_type == "2"){echo "selected";} ?>>Other Bank Credit Card Statment</option>
			<?php } else { ?>
			<option value="3" <?php if($p->document_type == "3"){echo "selected";} ?>>ITR Document</option>
			<option value="2" <?php if($p->document_type == "2"){echo "selected";} ?>>Other Bank Credit Card Statment</option>
			<?php } ?>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Annual declared income (₹)" name="anl_income" id="anl_income" value="<?php echo $p->annual_income; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Basic Monthly Salary (₹)" name="mthly_income" id="mthly_income"  value="<?php echo $p->mothly_income; ?>">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Monthly Variable Bonus (₹)" name="monthly_bonus" id="monthly_bonus" value="<?php echo $p->montlybonus; ?>" >
	</div>

	<!-- Identity Documents -->
	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="section-title uk-width-1-1"><span>Identity Documents</span></div>
	<div class="uk-width-1-3@s  uk-width-1-1 uk-margin-bottom">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="PAN Card" name="pan" id="pan" value="<?php echo $p->pan; ?>">
	</div>
	<div class="uk-width-2-3@s  uk-width-1-1 uk-margin-bottom">
		<div class="uk-padding uk-border-top-dashed pt-10 uk-padding-remove-left uk-padding-remove-bottom">
			<div class="uk-text-35 fs-14"><label><input class="uk-checkbox" type="checkbox" name="pan_later" id="pan_later">&nbsp;&nbsp;I would like to submit my PAN later<span class="uk-text-red">*</span></label></div>
		</div>
	</div>
	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom">
		<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" id="doc_type" name="doc_type" onchange="onDocumentChange(this)">
			<option value="none">Select Document Type</option>
			<option value="passport">Passport</option>
			<option value="driving">Driving License</option>
			<option value="voter">VoterID</option>
		</select>
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom aadhar_details voter" style="display: none;">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Vother number: 1234 5678 9012" name="voter_id" id="voter_id">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom passport_details passport" style="display: none;">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Passport number: A12 34567" name="passport_no" id="passport_no">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom passport_details passport_val" style="display: none;">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Validity: DD/MM/YYYY" name="passport_validity" id="passport_validity">
	</div>

	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom license_details driving" style="display: none;">
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="License number: AB12 12345678901" name="lic_no" id="lic_no">
	</div>
	<div class="uk-width-1-4@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-bottom license_details driving_val" style="display: none;"> 
		<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="Validity: DD/MM/YYYY" name="lic_validity" id="lic_validity">
	</div>

	<!-- Relation with SCB -->
<!-- 	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="section-title uk-width-1-1"><span>Relation with SCB</span></div>
	
	<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
		<label class="uk-form-label fs-14">Existing SCB Customer<span class="uk-text-red">*</span></label>
		<div class="uk-grid uk-grid-small uk-child-width-1-3 uk-margin-small-top">
			<label class="container">Yes 
             	<input type="radio" name="existing_cust_yes" id="ex_scb_cust_ys" value="form-item-2" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2" data-current="form-item-1" <?php //if($p->existing_rel_scb=="1") { echo "checked"; } ?>>
             	<span class="checkmark"></span>
             </label>
             <label class="container">No
             	<input type="radio" name="existing_cust_no" id="ex_scb_cust_no" value="form-item-2a" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2a" data-current="form-item-1" <?php //if($p->existing_rel_scb=="0") { echo "checked"; } ?>>
             	<span class="checkmark"></span>
             </label>
		</div>
	</div> -->

		    <input type="hidden" name="input_flag" value="4">
          	<input type="hidden" name="unique_id" id="unique_id" value="<?php echo $p->unique_id; ?>">
          	<input type="hidden" name="email" id="email" value="<?php echo $p->email; ?>">
          	<input type="hidden" name="mobile" id="mobile" value="<?php echo $p->mobile; ?>">
          	<input type="hidden" name="company_code" id="company_code"	  />  
          	<!-- <input type="hidden" name="emp_type" id="emp_type"	value="<?php //echo $employment_type; ?>"  /> -->
          	<input type="hidden" name="existing_rel_scb" id="existing_rel_scb" value="0">
          	<input type="hidden" name="sameasResiAdd" id="sameasResiAdd" value="1">
	<div class="uk-width-1-1 uk-margin-small"></div>
	<div class="uk-width-1-3 uk-margin-bottom"></div>
	<div class="uk-width-1-3 uk-margin-bottom uk-text-center">
		<input name="update_form" type="submit" class="uk-display-inline uk-button uk-button-primary update_form_cc" tabindex="39" value="Save" />
	</div>
	<div class="uk-width-1-3 uk-margin-bottom"></div>
</form>

</div><!-- uk-container -->
<?php include 'partials/_sales_footer.php'; ?>