<?php 
namespace ProcessWire;
include "partials/_general_function.php";
	if(isset($_GET['u'])){
		$unique_id = $_GET['u'];
		$p = $pages->get("unique_id=$unique_id");
		$card = $p->cc_product;
		if($p->id == 0){
			$session->redirect($config->urls->root.'credit-card/');
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

	$email =$p->email;
	$mobile =$p->mobile;
	$employment_type = $p->employment_type;
	$emp_type = $p->employment_type->title;
	//$p->employment_type;
	 $employer_name    = $p->employer_name;
	 $existing_rel_scb =$p->existing_rel_scb;

	$anl_income = intval($p->mothly_income) * 12;

	}else{
		$session->redirect($config->urls->root.'credit-card/');
	}
$documenttype =getdocumentTypeOption(); 
//$personal_title =getfieldOptions('person_title_opt');
$education =geteductionOption();
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

$strwkexp ="";
$field_wexp = $fields->get('total_exp');
$all_options_ex = $field_wexp->type->getOptions($field_wexp);
	if (count($all_options_ex)) {
			foreach ($all_options_ex as $exk=>$texp) {
				$strwkexp .="<option value='".$exk."' >".$texp->title."</option>";
			 }
	}


$strdesignation ="";
$field_desi = $fields->get('designation');
$all_options_des = $field_desi->type->getOptions($field_desi);
	if (count($all_options_des)) {
			foreach ($all_options_des as $desk=>$desv) {
				$strdesignation .="<option value='".$desk."' >".$desv->title."</option>";
			 }
	}

	$strres_type ="";
$field_resi = $fields->get('residence_type');
$all_options_res = $field_desi->type->getOptions($field_resi);
	if (count($all_options_res)) {
			foreach ($all_options_res as $res=>$resv) {
				$strres_type .="<option value='".$res."' >".$resv->title."</option>";
			 }
	}

$strres_indoctype ="";
$field_indoctype = $fields->get('income_document_type');
$all_options_inc = $field_indoctype->type->getOptions($field_indoctype);
	if (count($all_options_inc)) {
			foreach ($all_options_inc as $k=>$v) {
				$strres_indoctype .="<option value='".$k."' >".$v->title."</option>";
			 }
	}
	
  $occupation = $pages->get(31498)->children;
  $banks = $pages->get(31518)->children;
  //$employer_industry = $pages->get(31459)->children;
  $industryisic = $pages->get(1049)->children;
  $leadcity = $pages->get(31601)->children;
?>
<?php 
include 'partials/header_cc.php'; 

?>

<div class="uk-container">
	<div class="uk-text-center uk-margin-large-top">
		<ul class="timeline">
			<li class="active ff-helvetica active1 fs-18">Info</li>
			<li class="active ff-helvetica fs-18">Application</li>
			<li class="ff-helvetica fs-18">Approval</li>
			<li class="ff-helvetica">Documents</li>
		</ul>		  
	</div>
</div>

<form class="apply_online uk-margin" id="cc_application_form" method="post">
<div class="uk-container" uk-height-viewport="expand:true">

<ul class="uk-margin-top" uk-accordion="multiple: true">
    <li class="uk-open">
        <a class="uk-accordion-title" href="#"><h3 class="uk-text-center ff-light fs-22 section_title fs-16-mobile uk-text-white personal-bg">Personal Information</h3></a>
        <div class="uk-accordion-content">
            <div class="uk-grid-large ff-helvetica" uk-grid>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk_form_wrapper">
						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3">
								<label class="uk-form-label fs-14">Title<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="title" id="title">
									<option value="">select</option>
									<?php echo $stroption2; ?>
								</select>
							</div>
							<div class="uk-width-2-3">
								<div>
									<label class="uk-form-label fs-14">First Name<span class="uk-text-red">*</span></label>
								    <input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="fname" id="fname" value="<?php echo $p->fname; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Middle Name</label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="mname" value="<?php echo $p->mname; ?>">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Last Name<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="lname" id="lname" value="<?php echo $p->lname; ?>">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Date of birth<span class="uk-text-red">*</span></label>
						<input type="text" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" name="dob" id="datepicker" autocomplete="off" placeholder="DD/MM/YYYY">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">

						<div class="uk-grid-small" uk-grid>
							<div class="uk-width-1-3">
								<label class="uk-form-label fs-14">Gender<span class="uk-text-red">*</span></label>
								<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="gender" id="gender">
							<option selected="selected" value="1">Male</option>
							<option value="2">Female</option>
							<option value="3">Other</option>
						</select>
							</div>
						</div>
						
						
					</div>
					<!-- <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Title<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="title" id="title">
							<option selected="selected">Select</option>
						</select>
					</div> -->
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Occupation<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_occ" id="off_occ">
							<option value="">Select</option>
								<!-- <option value="55">AIRFORCE/ Navy</option>
								<option value="34">Artist/Actor/Entertainer/Model</option>
								<option value="29">Beauty Consultant/ Hair Stylist</option>
								<option value="36">Cabin Crew/Gound Staff</option>
								<option value="2">Chartered Accountant</option>
								<option value="1">Chartered Architect</option>
								<option value="6">Chartered Engineer/Engineer</option>
								<option value="9">Chartered Surveyor/Surveyor/Valuer</option>
								<option value="54">Chinese Physician / Chinese Medical Dcotor</option>
								<option value="42">CIVIL SERVANT (Civil Service Gov't Disciplinary)</option>
								<option value="43">CIVIL SERVANT (Civil Service Non Gov't Disciplinary)</option>
								<option value="32">CIVIL SERVANT (Non Civil Service/Contract)</option>
								<option value="53">Coaching Staff/ Athlete / Trainer</option>
								<option value="3">Company Secretary</option>
								<option value="22">Computer Operater</option>
								<option value="16">Computer PROGRAMMER/System ANALYST/System ENGINEER</option>
								<option value="10">CONSULATE/COUNCIL MEMBER</option>
								<option value="11">Director/President/ Chairman/ Chief Executive Officer</option>
								<option value="5">Doctor/Dentist/Medical &amp; Healthcare Specialist</option>
								<option value="35">Film Producer/ Film Director/Camera Man/ Light Board Operator/Backstage Staff/Photographer</option>
								<option value="30">Industrial Quality Control Staff/ Warehouse Worker/ Industrial Worker</option>
								<option value="41">Insurance Agent/ Insurance Broker/ Insurance Sales</option>
								<option value="7">Judge/Lawyer/Barrister/Solicitor</option>
								<option value="14">Lecturer/Professor/Headmaster/Principal</option>
								<option value="49">Litigation Cleck/Legal Clerk</option>
								<option value="57">Manager/Executive</option>
								<option value="37">Marketing Executive</option>
								<option value="4">Medical Officer</option>
								<option value="40">Money Transmition Agent/ Foreign Currency Exchange Agent/ Cheque Chashing Agent</option>
								<option value="12">Nurse</option>
								<option value="58">Officer/ Supervisor/ Administrator</option>
								<option value="17">Optician/Pharmacist/Laboratory Operator/Radiographier/Chemist</option>
								<option value="48">Personal Financial Consultant/ Investment Consultant/Relationship Officer/Sales Representative</option>
								<option value="8">Pilot/ Aircraft Captain/ Ship Captain</option>
								<option value="50">Private Tutorial</option>
								<option value="46">Property Negotiator/Real Estate Agent</option>
								<option value="18">Reportor/ Editor/ Journalist/ Translator</option>
								<option value="23">Retail Sales Person/Promoter</option>
								<option value="68">SCB Staff</option>
								<option value="19">Social Worker</option>
								<option value="44">Stock Broker/ Stock Dealer</option>
								<option value="25">Teacher Kindergarden/Primary &amp; Secondary School/Tutorial Class</option> -->
								<?php foreach ($occupation as $oc) { ?>
							<option value="<?=$oc->id?>"  ><?=$oc->title?></option>
							<?php } ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">No of Dependants<span class="uk-text-red">*</span></label>
						<input type="text" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" name="dependents" id="dependents" autocomplete="off" maxlength="2">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Educational qualification<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="education" id="education">
							<option value="">Select</option>
							<?php echo $education; ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Work Type<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="work_type" id="work_type">
							<option value="">Select</option>
							<?php echo getworkTypeOption(); ?>
						</select>
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
						<label class="uk-form-label fs-14">Landmark<span class="uk-text-red">*</span></label>
						<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="landmark" id="landmark">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">City<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="city" id="city">
								<option value="">Select</option>
								<?php foreach($leadcity as $city){ ?>
									<option value="<?=$city->id?>" <?php if($p->city==$city->title) { echo "selected"; } ?>><?=$city->title?></option>
								<?php } ?>
							</select>
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Pincode<span class="uk-text-red">*</span></label>
						<input id="cc_homepin" class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" value="<?php if($p->pincode!=""){echo $p->pincode;}?>" name="pincode">
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Residence Type<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="re-type" id="re-type">
							<option value="">Select</option>
							<?php echo $strres_type; ?>
						</select>
					</div>
					<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
						<label class="uk-form-label fs-14">Card Mailing Address<span class="uk-text-red">*</span></label>
						<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="off_lma" id="off_lma">
							
							<option value="">Select</option>
								<?php echo $strmailopt; ?>
						</select>
					</div>
					
					<div class="uk-margin-medium-top uk-text-35 uk-width-1-1 fs-14"><label><input id="chkaddress" class="uk-checkbox" type="checkbox" name="sameasResiAdd" checked value="1">&nbsp;&nbsp;Permanent address same as residence address<span class="uk-text-red">*</span> </label></div>
					<div id="dvaddress" class="uk-grid uk-grid-large uk-margin-remove-top" style="display: none">
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 1<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa1" id="pa1">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 2</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa2">
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address line 3</label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pa3">
						</div>
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Address Landmark<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="pal1" id="pal1">
						</div>
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent State<span class="uk-text-red">*</span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="pstate" id="pstate">
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
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="pcity" id="pcity">
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
									<option value="Itanagar">Itanagar</option>
									<option value="Arunachal Pradesh-Other">Arunachal Pradesh-Other</option>
									<option value="Guwahati">Guwahati</option>
									<option value="Silchar">Silchar</option>
									<option value="Assam-Other">Assam-Other</option>
									
									<option value="Bhagalpur">Bhagalpur</option>
									<option value="Patna">Patna</option>
									<option value="Bihar-Other">Bihar-Other</option>
									
									<option value="Bhillai">Bhillai</option>
									<option value="Bilaspur">Bilaspur</option>
									<option value="Raipur">Raipur</option>
									<option value="Chhattisgarh-Other">Chhattisgarh-Other</option>
									
									<option value="Panaji">Panjim/Panaji</option>
									<option value="Vasco Da Gama">Vasco Da Gama</option>
									<option value="Goa-Other">Goa-Other</option>
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
									<option value="Dalhousie">Dalhousie</option>
									<option value="Dharmasala">Dharmasala</option>
									<option value="Manali">Kulu/Manali</option>
									<option value="Shimla">Shimla</option>
									<option value="Himachal Pradesh-Other">Himachal Pradesh-Other</option>
									<option value="Jammu">Jammu</option>
									<option value="Srinagar">Srinagar</option>
									<option value="Jammu-Other">Jammu and Kashmir-Other</option>
									<option value="Bokaro">Bokaro</option>
									<option value="Dhanbad">Dhanbad</option>
									<option value="Jamshedpur">Jamshedpur</option>
									<option value="Ranchi">Ranchi</option>
									<option value="Jharkhand-Other">Jharkhand-Other</option>
									
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
									
									<option value="Bhopal">Bhopal</option>
									<option value="Gwalior">Gwalior</option>
									<option value="Indore">Indore</option>
									<option value="Jabalpur">Jabalpur</option>
									<option value="Ujjain">Ujjain</option>
									<option value="Madhya Pradesh-Other">Madhya Pradesh-Other</option>
								
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
									
									<option value="Imphal">Imphal</option>
									<option value="Manipur-Other">Manipur-Other</option>
									
									<option value="Shillong">Shillong</option>
									<option value="Mizoram-Other">Meghalaya-Other</option>
									
									<option value="Aizawal">Aizawal</option>
									<option value="Mizoram-Other">Mizoram-Other</option>
									
									<option value="Dimapur">Dimapur</option>
									<option value="Nagaland-Other">Nagaland-Other</option>
									
									<option value="Bhubaneshwar">Bhubaneshwar</option>
									<option value="Cuttak">Cuttak</option>
									<option value="Paradeep">Paradeep</option>
									<option value="Puri">Puri</option>
									<option value="Rourkela">Rourkela</option>
									<option value="Orissa-Other">Orissa-Other</option>
									
									<option value="Amritsar">Amritsar</option>
									<option value="Bathinda">Bathinda</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Jalandhar">Jalandhar</option>
									<option value="Ludhiana">Ludhiana</option>
									<option value="Mohali">Mohali</option>
									<option value="Pathankot">Pathankot</option>
									<option value="Patiala">Patiala</option>
									<option value="Punjab-Other">Punjab-Other</option>
								
									<option value="Ajmer">Ajmer</option>
									<option value="Jaipur">Jaipur</option>
									<option value="Jaisalmer">Jaisalmer</option>
									<option value="Jodhpur">Jodhpur</option>
									<option value="Kota">Kota</option>
									<option value="Udaipur">Udaipur</option>
									<option value="Rajasthan-Other">Rajasthan-Other</option>
									
									<option value="Gangtok">Gangtok</option>
									<option value="Sikkim-Other">Sikkim-Other</option>
								
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
									<option value="Agartala">Agartala</option>
									<option value="Tripura-Other">Tripura-Other</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Haveli-Silvassa">Dadra & Nagar Haveli-Silvassa</option>
									<option value="Daman & Diu">Daman & Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Pondichery">Pondichery</option>
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
									<option value="Bhubaneshwar">Dehradun</option>
									<option value="Roorkee">Roorkee</option>
									<option value="Uttaranchal-Other">Uttaranchal-Other</option>
									<option value="Asansol">Asansol</option>
									<option value="Durgapur">Durgapur</option>
									<option value="Haldia">Haldia</option>
									<option value="Kharagpur">Kharagpur</option>
									<option value="Kolkatta">Kolkatta</option>
									<option value="Siliguri">Siliguri</option>
									<option value="West Bengal">West Bengal - Other</option>
									<option value="Other">Other</option>
							</select>
						</div>
						<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Permanent Pincode<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="ppincode" id="ppincode">
						</div>
					</div>
				</div>
        </div>
    </li>
    <li class="uk-margin-large-top uk-margin-large-bottom <?php if ($input->get->mode == 'sales'){ echo ' uk-open'; }?>">
        <a class="uk-accordion-title" href="#"><h3 class="uk-text-center ff-light fs-22 section_title fs-16-mobile uk-text-white employment-bg">Employment & Income Details</h3></a>
        <div class="uk-accordion-content">
            <div class="uk-grid-large ff-helvetica" uk-grid>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Company Name<span class="uk-text-red">*</span><span class="uk-float-right fe_icon uk-text-black ff-helvetica-bold" ></span></label>
					<!-- <input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top pl_employer_name" type="text" placeholder="" value="<?php if($employer_name!=""){echo $employer_name;}?>"  name="pl_home_emp_name" id="pl_home_emp_name"> -->
					<input class="uk-input uk-form-width-input uk-border-rounded pl_employer_name alpha-only" type="text" placeholder="" id="pl_employer_name" name="pl_home_emp_name" data-target="form-item-9" data-current="form-item-8" data-value="<?php echo $root; ?>">
              			<span class="error commonErr" style="display: none;">Error Here</span>
              			<input type="hidden" name="emp_code" id="emp_code" />
		              	<div id="companies_ajax">
		                	<ul></ul>
		              	</div>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Designation<span class="uk-text-red">*</span><span class="uk-float-right fe_icon uk-text-black ff-helvetica-bold"></span></label>
					<select name="designation" id="designation" class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top">
                       <option vlaue="">Select</option>  
						<?php echo $strdesignation; ?>
                    </select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Industry(ISIC)<span class="uk-text-red">*</span></label>
					<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top industry_isic" name="off_industry" id="off_industry">
								<option value="">Select</option>
								<?php foreach ($industryisic as $ins) { ?>
								        <option value="<?=$ins->id?>" data-id="<?=$ins->code?>" ><?=$ins->title?></option>
							<?php } ?>
					</select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Total work experience<span class="uk-text-red">*</span></label>
					<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="tt-work" id="tt_work">
						<option selected="selected">Select</option>
						<?php echo $strwkexp; ?>
					</select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Salaried bank account with</label>
					<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="bank_branch" id="bank_branch">
						<option selected="selected">Select</option>
						<?php foreach ($banks as $bk) { ?>
						  <option value="<?=$bk->id?>" ><?=$bk->title?></option>
					    <?php } ?>
					</select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Office Email </label>
					<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="Email" placeholder=""id="ofc_email" name="ofc_email" required>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Phone no (O) <span class="uk-text-red">*</span></label>
					<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" name="off_phone" required>
				</div>
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
					<label class="uk-form-label fs-14">City<span class="uk-text-red">*</span></label>
					<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="ofc_city" id="ofc_city">
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
									<option value="Itanagar">Itanagar</option>
									<option value="Arunachal Pradesh-Other">Arunachal Pradesh-Other</option>
									<option value="Guwahati">Guwahati</option>
									<option value="Silchar">Silchar</option>
									<option value="Assam-Other">Assam-Other</option>
									
									<option value="Bhagalpur">Bhagalpur</option>
									<option value="Patna">Patna</option>
									<option value="Bihar-Other">Bihar-Other</option>
									
									<option value="Bhillai">Bhillai</option>
									<option value="Bilaspur">Bilaspur</option>
									<option value="Raipur">Raipur</option>
									<option value="Chhattisgarh-Other">Chhattisgarh-Other</option>
									
									<option value="Panaji">Panjim/Panaji</option>
									<option value="Vasco Da Gama">Vasco Da Gama</option>
									<option value="Goa-Other">Goa-Other</option>
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
									<option value="Dalhousie">Dalhousie</option>
									<option value="Dharmasala">Dharmasala</option>
									<option value="Manali">Kulu/Manali</option>
									<option value="Shimla">Shimla</option>
									<option value="Himachal Pradesh-Other">Himachal Pradesh-Other</option>
									<option value="Jammu">Jammu</option>
									<option value="Srinagar">Srinagar</option>
									<option value="Jammu-Other">Jammu and Kashmir-Other</option>
									<option value="Bokaro">Bokaro</option>
									<option value="Dhanbad">Dhanbad</option>
									<option value="Jamshedpur">Jamshedpur</option>
									<option value="Ranchi">Ranchi</option>
									<option value="Jharkhand-Other">Jharkhand-Other</option>
									
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
									
									<option value="Bhopal">Bhopal</option>
									<option value="Gwalior">Gwalior</option>
									<option value="Indore">Indore</option>
									<option value="Jabalpur">Jabalpur</option>
									<option value="Ujjain">Ujjain</option>
									<option value="Madhya Pradesh-Other">Madhya Pradesh-Other</option>
								
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
									
									<option value="Imphal">Imphal</option>
									<option value="Manipur-Other">Manipur-Other</option>
									
									<option value="Shillong">Shillong</option>
									<option value="Mizoram-Other">Meghalaya-Other</option>
									
									<option value="Aizawal">Aizawal</option>
									<option value="Mizoram-Other">Mizoram-Other</option>
									
									<option value="Dimapur">Dimapur</option>
									<option value="Nagaland-Other">Nagaland-Other</option>
									
									<option value="Bhubaneshwar">Bhubaneshwar</option>
									<option value="Cuttak">Cuttak</option>
									<option value="Paradeep">Paradeep</option>
									<option value="Puri">Puri</option>
									<option value="Rourkela">Rourkela</option>
									<option value="Orissa-Other">Orissa-Other</option>
									
									<option value="Amritsar">Amritsar</option>
									<option value="Bathinda">Bathinda</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Jalandhar">Jalandhar</option>
									<option value="Ludhiana">Ludhiana</option>
									<option value="Mohali">Mohali</option>
									<option value="Pathankot">Pathankot</option>
									<option value="Patiala">Patiala</option>
									<option value="Punjab-Other">Punjab-Other</option>
								
									<option value="Ajmer">Ajmer</option>
									<option value="Jaipur">Jaipur</option>
									<option value="Jaisalmer">Jaisalmer</option>
									<option value="Jodhpur">Jodhpur</option>
									<option value="Kota">Kota</option>
									<option value="Udaipur">Udaipur</option>
									<option value="Rajasthan-Other">Rajasthan-Other</option>
									
									<option value="Gangtok">Gangtok</option>
									<option value="Sikkim-Other">Sikkim-Other</option>
								
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
									<option value="Agartala">Agartala</option>
									<option value="Tripura-Other">Tripura-Other</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Haveli-Silvassa">Dadra & Nagar Haveli-Silvassa</option>
									<option value="Daman & Diu">Daman & Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Pondichery">Pondichery</option>
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
									<option value="Bhubaneshwar">Dehradun</option>
									<option value="Roorkee">Roorkee</option>
									<option value="Uttaranchal-Other">Uttaranchal-Other</option>
									<option value="Asansol">Asansol</option>
									<option value="Durgapur">Durgapur</option>
									<option value="Haldia">Haldia</option>
									<option value="Kharagpur">Kharagpur</option>
									<option value="Kolkatta">Kolkatta</option>
									<option value="Siliguri">Siliguri</option>
									<option value="West Bengal">West Bengal - Other</option>
									<option value="Other">Other</option>
					</select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Pincode<span class="uk-text-red">*</span></label>
					<input id="off_pincode"  class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="number" placeholder="" name="off_pincode" >
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Income Proof Document<span class="uk-text-red">*</span></label>
					<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" name="document_type" id="document_type">
						<option value="">Select</option>
						<!-- <?php //echo $strres_indoctype; ?> -->
						<?php if($emp_type === 'Salaried') { ?>
							<option value="1">Payslip</option>
							<option value="2">Other Bank Credit Card Statment</option>
						<?php } else { ?>
								<option value="3">ITR Document</option>
								<option value="2">Other Bank Credit Card Statment</option>
						<?php } ?>
					</select>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Annual declared income (₹)<span class="uk-text-red">*</span></label>
					<input class="uk-input uk-disabled uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="anl_income" id="anl_income" value="<?=$p->total_income?>" disabled>
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Basic Monthly Salary (₹)<span class="uk-text-red">*</span></label>
					<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="mthly_income" id="mthly_income">
				</div>
				<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
					<label class="uk-form-label fs-14">Monthly Variable Bonus (₹)</label>
					<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="" name="monthly_bonus" id="monthly_bonus">
				</div>
			</div>
			<input type="hidden" name="input_flag" value="4">
          	<input type="hidden" name="unique_id" id="unique_id" value="<?=$unique_id?>">
          	<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
          	<input type="hidden" name="mobile" id="mobile" value="<?php echo $mobile; ?>">
          	<input type="hidden" name="cc_product" id="cc_product" value="<?php echo $card; ?>">
          	<input type="hidden" name="company_code" id="company_code"	  />  
          	<input type="hidden" name="emp_type" id="emp_type"	value="<?php echo $employment_type; ?>"  /> 
          	<input type="hidden" name="hdnindustryisic" id="hdnindustryisic" />   
        </div>
    </li>
    <li class="uk-margin-large-top uk-margin-large-bottom">
		   		<a class="uk-accordion-title" href="#"><h3 class="uk-text-center fs-20 section_title fs-16-mobile uk-text-white identity-bg">Identity documents</h3></a>
		    	<div class="uk-accordion-content">
		    		<div class="uk-grid-large ff-helvetica" uk-grid>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">PAN<span class="uk-text-red">*</span></label>
							<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="CKFPS2202L" name="pan" id="pan">
							<!-- <div class="uk-padding uk-border-top-dashed pt-10 uk-padding-remove-left">
								<div class="uk-text-35 fs-14"><label><input class="uk-checkbox" type="checkbox" name="pan_later" id="pan_later">&nbsp;&nbsp;I would like to submit my PAN later<span class="uk-text-red">*</span></label></div>
							</div> -->
						</div>
						<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Other ID<span class="uk-text-red">*</span><span class="uk-float-right fe_icon uk-text-black ff-helvetica-bold" uk-icon="icon: file-edit; ratio:0.9"></span></label>
							<select class="uk-select uk-form-width-input uk-border-rounded uk-margin-small-top" id="other_id" name="other_id">
								<option value="">Select</option>
								<?php echo $documenttype; ?>
							</select>
						</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper voter_details">
								<label class="uk-form-label fs-14">Voter ID number<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="1234 5678 9012" name="voter_id" id="voter_id">
							</div>
							<!-- <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper voter_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="voter_validity" autocomplete="off">
							</div> -->

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper passport_details">
								<label class="uk-form-label fs-14">Passport number<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="A12 34567" name="passport_no">
							</div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile passport_details"></div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile passport_details"></div> 
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper passport_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="passport_validity" autocomplete="off">
							</div>

							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper license_details">
								<label class="uk-form-label fs-14">License number<span class="uk-text-red">*</span></label>
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top" type="text" placeholder="AB12 12345678901" name="lic_no">
							</div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile license_details"></div>
							<div class="uk-width-1-3 hidden_on_tab hidden_on_mobile license_details"></div>
							<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper license_details">
								<label class="uk-form-label fs-14">Validity<span class="uk-text-red">*</span></label> 
								<input class="uk-input uk-form-width-input uk-border-rounded uk-margin-small-top datepicker" type="text" placeholder="DD/MM/YYYY" name="lic_validity" autocomplete="off">
							</div>

					</div>
					<div class="uk-margin-medium-bottom"></div>
						
		    	</div>
	</li>

	 <li class="uk-margin-large-top uk-margin-large-bottom">
		   		<a class="uk-accordion-title" href="#"><h3 class="uk-text-center fs-20 section_title fs-16-mobile uk-text-white personal-bg">Relation With SCB</h3></a>
		    	<div class="uk-accordion-content">
		    		<div class="uk-grid-large ff-helvetica" uk-grid>
		    			<div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s uk-width-1-1  uk_form_wrapper">
							<label class="uk-form-label fs-14">Existing SCB Customer<span class="uk-text-red">*</span></label>
							<div class="uk-grid uk-grid-small uk-child-width-1-3 uk-margin-small-top">
								<label class="container">Yes 
			                     	<input type="radio" name="existing_cust_yes" id="ex_scb_cust_ys" value="form-item-2" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2" data-current="form-item-1" <?php if($p->existing_rel_scb=="1") { echo "checked"; } ?>>
			                     	<span class="checkmark"></span>
			                     </label>
			                     <label class="container">No
			                     	<input type="radio" name="existing_cust_no" id="ex_scb_cust_no" value="form-item-2a" class="uk-radio radio uk-form-width-input uk-border-rounded itr_audited" data-target="form-item-2a" data-current="form-item-1" <?php if($p->existing_rel_scb=="0") { echo "checked"; } ?>>
			                     	<span class="checkmark"></span>
			                     </label>
							</div>
						</div>
						
					</div>
					<div class="uk-margin-medium-bottom"></div>
					<div class="uk-padding uk-border-top-dashed pt-10 uk-padding-remove-left">
						<div class="uk-text-35 fs-14"><label><input class="uk-checkbox" type="checkbox" name="check1" id="check1" required>&nbsp;&nbsp;I/We authorize Standard Chartered Bank to verify & conduct Credit Bureau Check<span class="uk-text-red">*</span></label></div>
					</div>
					

					<div class="uk-margin-large-bottom uk-margin-large-top uk-text-center">
						<p class="ff-helvetica fs-14">Fields marked with an asterisk * are mandatory</p>
						<button type="submit" id="cc_test" class="ff-helvetica uk-button uk-btn-green-bg fs-22 fs-18-mobile p-15 p-520 submit_cc_application">Submit my application</button>
					</div>
		    	</div>
		    </li>
</ul>
</div>
</form>

<div id="modal-otp" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative uk-border-rounded">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
    	<h4 class="uk-h3 uk-margin-top ff-light">Please verify user's mobile number with OTP</h4>
    	<form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Mobile number</label>
    			<div class="uk-inline">
				    <span class="uk-form-icon icon-plus-91"></span>
	    			<input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile" id="verifymobile" type="tel" value="9988776655" disabled tabindex="1" />
	    		</div>
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>Verification OTP</label>
    			<input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus />
    		</div>
    		<div class="uk-width-1-3@s uk-width-1-1">
    			<label>&nbsp;</label>
    			<div>
	    			<a href="#modal-otp" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white" uk-toggle>Go</a>
		    		<button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill">Resend</button>		
    			</div>
    		</div>
    	</form>	
    </div>
</div>

<div id="modal-submit" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center brad">
    	<div class="bg_band"></div>
    	<h4 class="uk-h2 uk-margin-top ff-light">Getting approval for your credit card application.</h4>
    	<p>Please do not refresh the page or click on the back button</p>
    	<div class="uk-text-meta uk-margin-bottom">Please wait...</div>
    	<div uk-spinner="ratio: 2"></div>
    	<progress id="js-progressbar" class="uk-progress" value="10" max="100"></progress>
    </div>
</div>


<?php include 'partials/footer_cc.php'; ?>