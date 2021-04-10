<?php 
namespace ProcessWire;
ini_set('display_errors','1');
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
include("LeadAPI.php");
// $jsonobj  = '{
//     "UserId":"PaisaBazaar_UAT",
//     "Password":"69c524a1b10c371c4be79bed8299bcfc",
//     "Version":4,
//     "ConUniqRefCode":"3DEBD9202688",
//     "DataMartId":"W38343",
//     "PurposeOfAccOpngPL":4,
//     "ExistingRelationship":"yes",
//     "Title":"MR",
//     "FirstName":"testjk",
//     "MiddleName":"",
//     "LastName":"Anumalla",
//     "DOB":"03/22/2021",
//     "Gender":"1",
//     "Qualification":"PRE",
//     "Occupation":"TEST",
//     "NumOfDependents":"2",
//     "WorkType":"G",
//     "ResType":"SO",
//     "ResAccoType":"",
//     "ResidentialStatus":"CT",
//     "ResAddress1":"TEST address1",
//     "ResAddress2":"TEST address2",
//     "ResAddress3":"TEST address3",
//     "ResAddress4":"",
//     "ResPIN":"400018",
//     "ResCity":"Mumbai",
//     "ResPhone":9876543212,
//     "PermAddrSameAsResAddr":"no",
//     "PermAddress1":"TEST address232",
//     "PermAddress2":"address232 address232",
//     "PermAddress3":"address232",
//     "PermAddress4":null,
//     "PermCity":"Mumbai",
//     "PermPIN":"400013",
//     "Mobile":"9619724348",
//     "Email":"ramatest@gmail.com",
//     "PAN":"TDMPM8430M",
//     "EmpType":"Salaried",
//     "OtherCompanyName":"ROSA POWER SUPPLY COMPANY LIMITED",
//     "CompanyCode":"B3629",
//     "TypeOfOrg":"TEST",
//     "Profession":"Chartered Accountant",
//     "WorkExp":"2",
//     "Industry":"",
//     "IndustryIsic":"RS16",
//     "MonthsCurrentOrg":"TEST",
//     "SalaryBank":"TEST add",
//     "OffAddress1":"TEST off",
//     "OffAddress2":"TEST off",
//     "OffAddress3":"TEST",
//     "OffAddress4":"",
//     "OffPIN":"400013",
//     "OffCity":"Mumbai",
//     "OffPhone":"97987897",
//     "OffPhoneExtn":"TEST",
//     "OfcEmail":"testoffice@gmail.com",
//     "LoanMailingAddress":"RES",
//     "GMI":30000,
//     "CurrentEMI":"1233",
//     "TaxITRCurrYr":"1234",
//     "TaxITRPrevYr":"11111",
//     "CurrYrGrosTurnOver":"10000",
//     "CurrYrBusinessIncome":"10000",
//     "CurrYrOtherIncome":"1000",
//     "DepreciationPLAcc":"45455",
//     "LoanAmount":"100000",
//     "TenureMonths":"24",
//     "IRR":"12",
//     "ProcFee":"2000",
//     "IncomeProof":"T0235",
//     "MonthlyVarBonus":"",
// 	"OtherDocType":"voterId",
// 	"OtherDocNo":"123412341234",
// 	"OtherDocExpDate":null,
// 	"PrevYearTaxableIncome":"1000",
// 	"ProfessionalIncome":"10000",
// 	"BusinessIncome":"10000",
// 	"IncomeDepreciation":"10000",
// 	"DirectorRenumeration":"1000",
// 	"SalCreditBankStmnt":null,
// 	"OtherIncome":"",
// 	"MonthlySalesTurnOver":"",
// 	"QualifiedIdentifier":"1"
//  }';

$jsonobj  = file_get_contents('php://input');
$dataArray = json_decode($jsonobj, true);
$dataArraynew = array_change_key_case($dataArray ,CASE_LOWER);
// echo "<pre>";
// print_r($dataArray);
$sourcetype="";
$uname =$dataArraynew['userid'];
$password =$dataArraynew['password'];
$validateUser = $pages->find("template=aggregator_master,fname={$uname},code={$password}");
if (count($validateUser)) {
	//echo count($validateUser);
foreach ($validateUser as $val) {
	 $valuser =$val->fname;
	 $valpwd = $val->code;
	 if($valuser=="Bankbazaar_Prod"){
	 	$sourcetype ="1";
	 }elseif($valuser=="Credilio_PROD"){
	 	$sourcetype ="2";
	 }elseif($valuser=="Deal4Loan_Prod"){
	 	$sourcetype ="3";
	 }elseif($valuser=="LoanAdda_PROD"){
	 	$sourcetype ="4";
	 }elseif($valuser=="MyMoneyMarket_PROD"){
	 	$sourcetype ="5";
	 }elseif($valuser=="PaisaBazaar_Prod"){
	    $sourcetype ="6";
	 }elseif($valuser=="IndiaLends_PROD"){
	    $sourcetype ="7";
	 }
 }
}else{
 // echo json_encode(['msg' => 'Access Denied!', 'status' => 0]);
	// exit();	
	$status="0";
	$errorcode ="105";
	$ErrorInfo ="AUTH ERROR";
	$response['status'] = $status;
	$response['id'] = $unique_id;
	$response['ReferenceCode'] =$unique_id;
	$response['ResParam1'] =$responseArr['errormsg'];
	$response['ErrorInfo'] =$ErrorInfo;
	$response['errorcode'] =$errorcode;
	 echo json_encode($response);
 	exit();
}

if($uname==$valuser && $password == $valpwd){
	 if(!empty($dataArraynew['userid'])){
 	 //$finalarrPersonalLoan =$finalarr['PersonalLoan']; for xml
 	 $response =aggregatorforPL($dataArraynew,$sourcetype);
 	 $finalarr =array('Status'=>$response["status"],'ReferenceCode'=>"#".$response["id"],'ErrorInfo'=>$response["ErrorInfo"],'errorcode'=>$response['errorcode'],'ResParam1'=>$response['detail']);
 	 echo json_encode($finalarr);
	 exit();
 }
}



function random_code(){
	$today = date("Ymd");
	$rand = strtoupper(substr(uniqid(sha1(time())),0,6));
	$unique_id = $rand . $today;
	return $unique_id;
}

function aggregatorforPL($dataArray,$aggritype)
{
	
	$fields_error = '';
	$status ="0";
	//$errorcode ="108";
	//$ErrorInfo="SYSTEM ERROR";
	$pages = wire('pages');
	$errflag =1;
	$employment_type =$dataArray['emptype'];
	if(empty($dataArray['version']))  
	{  
	   $fields_error .= "Version field cannot be blank!! # ";  
	} 
	if(empty($dataArray['conuniqrefcode']))  
	{  
	   $fields_error .= "ConUniqRefCode field cannot be blank!! # ";  
	}
	if(empty($dataArray['datamartid']))  
	{  
	   $fields_error .= "DataMartId field cannot be blank!! # ";  
	}
	if(empty($dataArray['datamartid']))  
	{  
	   $fields_error .= "DataMartId field cannot be blank!! # ";  
	}
	if(empty($dataArray['purposeofaccopngpl']))  
	{  
	   $fields_error .= "PurposeOfAccOpngPL field cannot be blank!! # ";  
	}
	if(empty($dataArray['title']))  
	{  
	   $fields_error .= "Title field cannot be blank!! # ";  
	}
	if(empty($dataArray['firstname']))  
	{  
	   $fields_error .= "FirstName field cannot be blank!! # ";  
	}
	if(empty($dataArray['lastname']))  
	{  
	   $fields_error .= "LastName field cannot be blank!! # ";  
	}
	if(empty($dataArray['dob']))  
	{  
	   $fields_error .= "DOB field cannot be blank!! # ";  
	}
	if(empty($dataArray['gender']))  
	{  
	   $fields_error .= "Gender field cannot be blank!! # ";  
	}
	if(empty($dataArray['qualification']))  
	{  
	   $fields_error .= "Qualification field cannot be blank!! # ";  
	}
	if(empty($dataArray['occupation']))  
	{  
	   $fields_error .= "Occupation  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['numofdependents']))  
	// {  
	//    $fields_error .= "NumOfDependents  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['worktype']))  
	{  
	   $fields_error .= "WorkType  field cannot be blank!! # ";  
	}
	if(empty($dataArray['restype']))  
	{  
	   $fields_error .= "ResType  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['residentialstatus']))  
	// {  
	//    $fields_error .= "ResidentialStatus  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['resaddress1']))  
	{  
	   $fields_error .= "ResAddress1  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['resaddress2']))  
	// {  
	//    $fields_error .= "ResAddress2  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['respin']))  
	{  
	   $fields_error .= "ResPIN  field cannot be blank!! # ";  
	}
	if(preg_match("/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/", $dataArray['respin'])===0){
		 $fields_error .= "Provide the valid Respin !! # ";  
	}
	if(empty($dataArray['rescity']))  
	{  
	   $fields_error .= "ResCity  field cannot be blank!! # ";  
	}
	if(empty($dataArray['permaddrsameasresaddr']))  
	{  
	   $fields_error .= "PermAddrSameAsResAddr  field cannot be blank!! # ";  
	}
	if(empty($dataArray['mobile']))  
	{  
	   $fields_error .= "Mobile field cannot be blank!! # ";  
	}
	if(empty($dataArray['email']))  
	{  
	   $fields_error .= "email field cannot be blank!! # ";  
	}
	if(empty($dataArray['pan']))  
	{  
	   $fields_error .= "PAN field cannot be blank!! # ";  
	}
	if(empty($dataArray['emptype']))  
	{  
	   $fields_error .= "EmpType field cannot be blank!! # ";  
	}
	if(empty($dataArray['othercompanyname']))  
	{  
	   $fields_error .= "OtherCompanyName field cannot be blank!! # ";  
	}
	if(empty($dataArray['companycode']))  
	{  
	   $fields_error .= "CompanyCode field cannot be blank!! # ";  
	}
	if(empty($dataArray['typeoforg']))  
	{  
	   $fields_error .= "TypeOfOrg field cannot be blank!! # ";  
	}
	if(empty($dataArray['industryisic']))  
	{  
	   $fields_error .= "IndustryIsic field cannot be blank!! # ";  
	}
	if(empty($dataArray['monthscurrentorg']))  
	{  
	   $fields_error .= "MonthsCurrentOrg field cannot be blank!! # ";  
	}
	if(empty($dataArray['salarybank']))  
	{  
	   $fields_error .= "SalaryBank field cannot be blank!! # ";  
	}
	if(empty($dataArray['offaddress1']))  
	{  
	   $fields_error .= "OffAddress1 field cannot be blank!! # ";  
	}
	if(empty($dataArray['offpin']))  
	{  
	   $fields_error .= "OffPIN field cannot be blank!! # ";  
	}
	if(preg_match("/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/", $dataArray['offpin'])===0){
		 $fields_error .= "Provide Office Pincode valid one  !! # ";  
	}
	if(empty($dataArray['offcity']))  
	{  
	   $fields_error .= "OffCity field cannot be blank!! # ";  
	}
	if(empty($dataArray['offphone']))  
	{  
	   $fields_error .= "OffPhone field cannot be blank!! # ";  
	}
	if(empty($dataArray['loanmailingaddress']))  
	{  
	   $fields_error .= "LoanMailingAddress field cannot be blank!! # ";  
	}
	if(empty($dataArray['loanamount']))  
	{  
	   $fields_error .= "LoanAmount field cannot be blank!! # ";  
	}
	if(empty($dataArray['tenuremonths']))  
	{  
	   $fields_error .= "TenureMonths field cannot be blank!! # ";  
	}
	if(empty($dataArray['irr']))  
	{  
	   $fields_error .= "IRR field cannot be blank!! # ";  
	}
	if(empty($dataArray['procfee']))  
	{  
	   $fields_error .= "ProcFee field cannot be blank!! # ";  
	}
	if(empty($dataArray['incomeproof']))  
	{  
	   $fields_error .= "IncomeProof field cannot be blank!! # ";  
	}
	if(empty($dataArray['otherdoctype']))  
	{  
	   $fields_error .= "OtherDocType field cannot be blank!! # ";  
	}
	if(empty($dataArray['otherdocno']))  
	{  
	   $fields_error .= "OtherDocNo field cannot be blank!! # ";  
	}
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['workexp']))  
	{  
	   $fields_error .= "Total Work Experience field cannot be blank!! # ";  
	}
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['salarybank']))  
	{  
	   $fields_error .= "Salary Bank field cannot be blank!! # ";  
	}

	$add1=$add2=$add3=$add4="";
	$per_add1=$per_add2=$per_add3=$per_add4=$per_city=$per_state="";
	$off_add1=$off_add2=$off_add3=$off_city=$off_pincode=$off_state="";
		if($fields_error != "")  
		{  
			$status="0";
			$errorcode ="102";
			$ErrorInfo ="DATA VALIDATION ERROR";
			$arResponse['status'] = $status;
			$arResponse['id'] = $unique_id;
			$arResponse['applicationid'] = "";
			$arResponse['ReferenceCode'] = "";
			 $arResponse['detail'] =$fields_error;
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
		}else{
			$OtherDocDate=null;$numofdependents=0;
			$person_title= $dataArray['title'];
			$datamartid =$dataArray['datamartid'];
			$conuniqrefcode =$dataArray['conuniqrefcode'];
			//echo '<pre>';print_r($dataArray);
			$fname =$dataArray['firstname'];
			$lname =$dataArray['lastname'];
			$full_name =$dataArray['firstname']." ".$dataArray['lastname'];
			$dob =str_replace("-", "/", $dataArray['dob']);
			$gender =$dataArray['gender'];
			$education =$dataArray['qualification'];
			$occupation =$dataArray['occupation'];
			$numofdependents =$dataArray['numofdependents'];
			$work_type =$dataArray['worktype'];
			$restype =$dataArray['restype'];
			$ResAccoType =$dataArray['resaccotype'];
			$Residentialstatus =$dataArray['residentialstatus'];
			if(!empty($dataArray['resaddress1'])){
			$add1 =$dataArray['resaddress1'];	
			}
			if(!empty($dataArray['resaddress2'])){
			$add2 =$dataArray['resaddress2'];	
			}
			if(!empty($dataArray['resaddress3'])){
			$add3 =$dataArray['resaddress3'];	
			}
			if(!empty($dataArray['resaddress4'])){
			$add4 =$dataArray['resaddress4'];	
			}
			// $add2 =$dataArray['resaddress2'];
			// $add3 = $dataArray['resaddress3']; //$dataArray['resaddress3'];
			// $add4= $dataArray['resaddress4'];
			$addcity =$dataArray['rescity'];
			$pincode =$dataArray['respin'];
			$resphone =$dataArray['resphone']; //Nneed to add field
			$PermAddrSameAsResAddr =$dataArray['permaddrsameasresaddr']; //yes means same as res
			if(!empty($dataArray['permaddress1'])){
			$per_add1 =$dataArray['permaddress1'];	
			}
			if(!empty($dataArray['permaddress2'])){
			$per_add2 =$dataArray['permaddress2'];	
			}
			if(!empty($dataArray['permaddress3'])){
			$per_add3 =$dataArray['permaddress3'];	
			}
			if(!empty($dataArray['permaddress4'])){
			$per_add4 =$dataArray['permaddress4'];	
			}
			// $per_add1 =$dataArray['permaddress1'];
			// $per_add2 =$dataArray['permaddress2'];
			// $per_add3 =  $dataArray['permaddress3'];//$dataArray['permaddress3'];
			// $per_add4 =$dataArray['permaddress4'];//$dataArray['permaddress4'];
			$per_city =$dataArray['permcity'];
			$per_pincode =$dataArray['permpin'];
			$mobile = $dataArray['mobile'];
			$email =$dataArray['email'];
			$pan =$dataArray['pan'];
			$employment_type =$dataArray['emptype'];
			$company_name =$dataArray['othercompanyname'];
			$company_code =$dataArray['companycode']; //Need to add Field in template
			$TypeOfOrg =$dataArray['typeoforg']; //Need to add Field in template
			$Profession =$dataArray['profession'];
			$WorkExp =$dataArray['workexp'];  //Need to add Field in template option
			$Industry =$dataArray['industry'];
			$industryisic =$dataArray['industryisic'];
			$MonthsCurrentOrg =$dataArray['monthscurrentorg']; //Need to add Field in template
			$salarybank =$dataArray['salarybank']; //Need to add Field in template
			if(!empty($dataArray['offaddress1'])){
			$off_add1 =$dataArray['offaddress1'];	
			}
			if(!empty($dataArray['offaddress2'])){
			$off_add2 =$dataArray['offaddress2'];	
			}
			if(!empty($dataArray['offaddress3'])){
			$off_add3 =$dataArray['offaddress3'];	
			}
			if(!empty($dataArray['offaddress4'])){
			$off_add4 =$dataArray['offaddress4'];	
			}
			if(!empty($dataArray['offcity'])){
			$off_city =$dataArray['offcity'];	
			}
			if(!empty($dataArray['offpin'])){
			$off_pincode =$dataArray['offpin'];	
			}
			// $off_add2 =$dataArray['offaddress2'];
			// $off_add3 =$dataArray['offaddress3'];
			// $off_city =$dataArray['offcity'];
			// $off_pincode =$dataArray['offpin'];
			// $offcity =$dataArray['offcity'];
			$off_phone =$dataArray['offphone'];
			$off_phoneext=$dataArray['offphoneextn']; //new field
			$off_email =$dataArray['ofcemail']; //new field
			$LoanMailingAddress =$dataArray['loanmailingaddress'];
			$mothly_income =$dataArray['gmi'];
			$emi_amt =$dataArray['currentemi'];
			$current_yr_tax =$dataArray['taxitrcurryr'];
			$prev_yr_taxable_income =$dataArray['taxitrprevyr'];  //need to creted
			$gross_turnover =$dataArray['curryrgrosturnover'];
			$off_income =$dataArray['curryrbusinessincome'];
			$ofcemail =$dataArray['ofcemail'];
			$off_income_other =$dataArray['curryrotherincome'];
			$current_yr_depr =$dataArray['depreciationplacc'];
			$loan_amount =$dataArray['loanamount'];
			$tenure =$dataArray['tenuremonths'];
			$interest_rate =$dataArray['irr'];
			$pf =$dataArray['procfee'];
			$monthlyvarbonus =$dataArray['monthlyvarbonus'];
			$incomeproof =$dataArray['incomeproof'];
			$OtherDocType =$dataArray['otherdoctype'];
			$OtherDocNo =$dataArray['otherdocno'];
			$OtherDocExpDate =$dataArray['otherdocexpdate'];
			$purpose =$dataArray['purposeofaccopngpl'];
			$existing_rel_scb = $dataArray['ExistingRelationship']=="yes" ? 1 : 0; 
			$timestamp = date('Y/m/d H:i:s');
		    $citymaster = $pages->find("template=city_master,code={$addcity}");
			if (count($citymaster)) {
				foreach ($citymaster as $pin) {
					$addcity =$pin->title;
					$addstate = $pin->state;
					$addcityid =$pin->id;
				}
			}
			$citymaster_off = $pages->find("template=city_master,code={$off_city}");
			if (count($citymaster_off)) {
				foreach ($citymaster_off as $pinoff) {
					$offcity =$pinoff->title;
					$offstate = $pinoff->state;
				}
			}

			$Incityval = $offcity == "" ? $addcity : $offcity; 
			if($offcity!="" && $addcity!=""){
				$Incityval =$addcity;
			}
			$initiatedbycity = $pages->find("template=Initiated_city_code,title={$Incityval}");
			if (count($initiatedbycity)) {
				foreach ($initiatedbycity as $incode) {
					$initiatedby =$incode->code;
					//$addstate = $incode->state;
				}
			}

			if(count($citymaster) < 0 || count($citymaster_off) < 0){
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Residential pincode does not exist in cms master!";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}

			$pincodes = $pages->find("template=location-master,title={$pincode}");
			if (count($pincodes)) {
				foreach ($pincodes as $pin) {
					$addcity =$pin->city;
					$addstate = $pin->state;
				}
			}else{
				//error
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Residential pincode does not exist in cms master";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}
			$pincodes_off = $pages->find("template=location-master,title={$off_pincode}");
			if (count($pincodes_off)) {
				foreach ($pincodes_off as $pinoff) {
					$offcity =$pinoff->city;
					$offstate = $pinoff->state;
				}
			}else{
				//error
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Office pincode does not exist in cms master";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}

		  if($mobile!="" && $pan!=""){
		  	$formLeads = $pages->find("template=aggregator_lead_template,mobile={$mobile},pan={$pan},product=1,sort=-published,limit=1");
			 	if (count($formLeads) >0) {
					foreach($formLeads  as $pdata){
					  $unique_id = $pdata->unique_id;
					  $aip_ref_number =$pdata->aip_ref_number;
					  $unique_ref_code_1 =$pdata->unique_ref_code;
					}
					if($aip_ref_number!="" && $unique_ref_code_1!=$conuniqrefcode){
					$status ="0";
					$errorcode ="103";
					$ErrorInfo ="DUPLICATE APPLICATION (ANOTHER SOURCE)";
					$pluniqueid =$unique_id;
					$errflag =2;
				  }
			 	}
		   }

		if($errflag==1){
		     	$formLeads = $pages->find("template=aggregator_lead_template,code={$datamartid},unique_ref_code={$conuniqrefcode},mobile={$mobile},product=1,sort=-published,limit=1");
			 	if (count($formLeads)) {
				foreach($formLeads  as $pdata1){
				//echo $pdata->unique_id."<br>";
					$unique_id = $pdata1->unique_id;
					$pluniqueid =$unique_id;
					$aip_ref_number =$pdata1->aip_ref_number;
					// $status ="0";
					// $errorcode ="104";
					// $ErrorInfo ="DUPLICATE APPLICATION";

				}
				if($aip_ref_number!=""){
					$status ="0";
					$errorcode ="104";
					$ErrorInfo ="DUPLICATE APPLICATION";
				  }
				$p = $pages->get("unique_id=$unique_id");
				$p->of(false);
			}else{
				$p = new Page();
				$p->of(false);
				$p->template = "aggregator_lead_template";
				$p->parent = $pages->get(30171);
				$unique_id = random_code();
				$pluniqueid ="PL".$unique_id;
				$p->unique_id =$pluniqueid;
			  }

			// $p = new Page();
			// $p->of(false);
			// $p->template = "aggregator_lead_template";
			// $p->parent = $pages->get(30171);
			$p->title =  $mobile." - ".$unique_id;
			$p->mobile = $mobile;
			//$p->full_name=$full_name;
			$p->email = $email;
			$p->product = 1;
			$p->pincode = $pincode;
			
			$p->existing_rel_scb = $existing_rel_scb;
			$existing_rel_scb = $existing_rel_scb == "yes" ? 1 : 0; 
			$p->current_yr_audited = $current_yr_audited;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$p->start_of_business = $start_of_business;
			
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;
			/* new fields */
			
			//$p->employer_industry_opt = $employer_industry;
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->code =$datamartid;
			$p->unique_ref_code =$conuniqrefcode;
			//$p->person_title = $person_title;
			$p->country = "India";
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $gender;
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3." ".$addcity." ".$addstate;
			$p->alternate_contact =$resphone;
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->purpose_opt = $purpose;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->citycode = $offcity;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			$p->off_lma = $off_lma;
			$arrworktype=array("F"=>"1","G"=>"2","I"=>"3","J"=>"4","k"=>"5","L"=>"6","Y"=>"7","P"=>"8");
			//$worktype = $arrworktype[$work_type]; //get value of 1/2/3
			$p->work_type_new = $arrworktype[$work_type];//passkey
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			if($tenure){
				$tenureyr =$tenure/12;
			}
			$p->loan_amount =$loan_amount;
			$p->interest_rate =$interest_rate;
			$p->pf =$pf;
			$p->tenure =$tenureyr;
			$p->no_of_dependant =$numofdependents;
			$p->residence_type =$restype;
			$p->total_exp =$WorkExp;
			$p->account_number =$salarybank;
			//$p->off_lma =$LoanMailingAddress;
			if($LoanMailingAddress=="RES"){
				$lmaddrss ="1";
			}else if($LoanMailingAddress=="PER"){
				$lmaddrss ="2";
			}else if($LoanMailingAddress=="OFF"){
				$lmaddrss ="3";
			}
			$p->mailing_address_opt = $lmaddrss;
			$OtherDocType =strtolower($OtherDocType);
			if($OtherDocType=="voterid"){ //voterid
			 // $p->voter_id = $OtherDocNo;
			 // $p->voter_validity = $OtherDocDate;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="drivinglicence"){
			 // $p->lic = $OtherDocNo;
			 // $p->lic_validity = $OtherDocDate;
			 $otherdocumentno =$OtherDocNo;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="passport"){
				// $p->passport = $OtherDocNo;
				// $p->passport_validity = $OtherDocDate;
				$otherdocumentno =$OtherDocNo;
				$otherdocumentdate =$OtherDocDate;
				$otherdocumenttype ="T0231";
			}
			 $p->document_number = $OtherDocNo;
			 $p->document_validity = $OtherDocDate;
			if($OtherDocDate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $OtherDocDate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}
		
			
			if($PermAddrSameAsResAddr=="Y" || $PermAddrSameAsResAddr=="y" || $PermAddrSameAsResAddr=="yes" || $PermAddrSameAsResAddr=="1"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcityid;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincode =$pincode; 
			$p->lead_city =$addcityid; 
			$per_pincode =$pincode;
			$per_pincode =$pincode;
			$p->PermAddrSameAsResAddr =1;
			}else{
				//$permanent_pincodes = $pages->find("template=city_master,title={$per_city}");
				$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
					$percityid =$pins->id;
				}
			  }
			  $p->PermAddrSameAsResAddr =0;
			  $p->lead_city =$percityid; 
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->perma_pincode =$per_pincode; 
			$p->perma_pincode =$per_pincode; 
			if($employment_type=="4" || $employment_type=="5" || $employment_type=="6" || $employment_type=="Salaried: SCB Salary A/C" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			$promo_code_1="INPL00NA00ONLINE";
			$QualifiedIdentifier = $dataArray['qualifiedidentifier'];
			if($QualifiedIdentifier=="1"){
				$promo_code_1 ="IN00PL00PREQUALI";
			}
			$p->utm_campaign =$promo_code_1;
			$p->source_type =$aggritype;
			if($industryisic){
				$industryisic_dt = $pages->get(1049)("code=$industryisic");
				$p->industry_isic =$industryisic_dt->id;
			}
			if($occupation){
				$occupation_dt = $pages->get(31498)("code=$occupation");
				$p->occupation =$occupation_dt->id;
			}
			if($salarybank){
				$salarybank_dt = $pages->get(31518)("code=$salarybank");
				$p->banks =$salarybank_dt->id;
			}
			if($incomeproof=="T0235"){
				$p->income_document_type =1;
			}else if($incomeproof=="T0356"){
				$p->income_document_type =3;
			}else if($incomeproof=="T0069"){
				$p->income_document_type =2;
			}
			//$p->org_code =$initiatedby;
			$restype=array("SO"=>"1","RE"=>"2","LR"=>"3","BA"=>"4","LO"=>"5","CO"=>"6");
			$p->residence_type =$restype[$dataArray['restype']];
			$arrpersonalttile=array("MR"=>"1","MRS"=>"2","MS"=>"3","PRF"=>"4","DR"=>"5");
			$p->person_title_opt =$arrpersonalttile[$dataArray['title']];
			$apigender=array("1"=>"M","2"=>"F","3"=>"T");
			$initiatedby="";
			$postdata =array("leadType"=>"agg_PL","pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>$promo_code_1,"education"=>$education,"work_type"=>$work_type,"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$WorkExp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$OtherDocNo,"otherdocumentdate"=>$OtherDocDate,"restype"=>$dataArray['restype'],"personal_title"=>$dataArray['title'],'occupation'=>$occupation,"numofdependents"=>$numofdependents,"industryisic"=>$industryisic,"isic"=>$industryisic_dt->id,"sourceid"=>$datamartid,"initiatedby" =>$initiatedby,"off_phone"=>$off_phone);
			// echo '<pre>';
			// print_r($postdata);
			// die;
			
			$file = fopen("logs/logs_aggriAPI_08.txt","a");
			fwrite($file,"Req_PL".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
			fwrite($file,"\n");
			fclose($file); 
		
			$responseArr =lmsLeadCreationAIPPersonalLoanCCForNTB($postdata);
			// echo "<pre>";
			// print_r($responseArr);
			//PLINPL00NA00ONLINE
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
			//PLINPL00NA00ONLINE
			if(empty($responseArr)){
					$status="0";
					$errorcode ="999";
					$ErrorInfo ="UN-KNOWN ERROR FROM SCB";
			}else{
				if($responseArr['aipreferencenumber']){
					$status ="1";
					if(!empty($appliationid)){
						$p->application_id =$responseArr['appliationid'];	
					}
					$p->aip_ref_number =$responseArr['aipreferencenumber'];
					$p->stat =$responseArr['aip_status_response'];
					if($responseArr['aip_status_response']=="DECLINE"){
						$status ="3";
					}
					//$p->approved_amount =$responseArr['approved_amount'];
				}
				else if($responseArr['errormsg']){
					$status="0";
					$errorcode ="108";
					$ErrorInfo ="SYSTEM ERROR FROM";
					$arResponse['detail'] =$responseArr['errormsg'];
				} 
			} 
			 $p->save();
		}
			 if($errorcode=="104"){$status="0";}
			 $arResponse['status'] = $status;
			 $arResponse['id'] = $pluniqueid;
			 $arResponse['applicationid'] = $responseArr['appliationid'];
			 $arResponse['api_msg'] = $responseArr['api_msg'];
			 $arResponse['ReferenceCode'] = $responseArr['aipreferencenumber'];
			 //$arResponse['detail'] =$responseArr['errormsg'];
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
		}
		return $arResponse;
			
}
//OLD FUNCTON NO USE
function aggregatorforPLOLD($dataArray,$aggritype)
{
	
	$fields_error = '';
	$status ="0";
	//$errorcode ="108";
	//$ErrorInfo="SYSTEM ERROR";
	$pages = wire('pages');
	$errflag =1;
	$employment_type =$dataArray['emptype'];
	if(empty($dataArray['version']))  
	{  
	   $fields_error .= "Version field cannot be blank!! # ";  
	} 
	if(empty($dataArray['conuniqrefcode']))  
	{  
	   $fields_error .= "ConUniqRefCode field cannot be blank!! # ";  
	}
	if(empty($dataArray['datamartid']))  
	{  
	   $fields_error .= "DataMartId field cannot be blank!! # ";  
	}
	if(empty($dataArray['datamartid']))  
	{  
	   $fields_error .= "DataMartId field cannot be blank!! # ";  
	}
	if(empty($dataArray['purposeofaccopngpl']))  
	{  
	   $fields_error .= "PurposeOfAccOpngPL field cannot be blank!! # ";  
	}
	if(empty($dataArray['title']))  
	{  
	   $fields_error .= "Title field cannot be blank!! # ";  
	}
	if(empty($dataArray['firstname']))  
	{  
	   $fields_error .= "FirstName field cannot be blank!! # ";  
	}
	if(empty($dataArray['lastname']))  
	{  
	   $fields_error .= "LastName field cannot be blank!! # ";  
	}
	if(empty($dataArray['dob']))  
	{  
	   $fields_error .= "DOB field cannot be blank!! # ";  
	}
	if(empty($dataArray['gender']))  
	{  
	   $fields_error .= "Gender field cannot be blank!! # ";  
	}
	if(empty($dataArray['qualification']))  
	{  
	   $fields_error .= "Qualification field cannot be blank!! # ";  
	}
	if(empty($dataArray['occupation']))  
	{  
	   $fields_error .= "Occupation  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['numofdependents']))  
	// {  
	//    $fields_error .= "NumOfDependents  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['worktype']))  
	{  
	   $fields_error .= "WorkType  field cannot be blank!! # ";  
	}
	if(empty($dataArray['restype']))  
	{  
	   $fields_error .= "ResType  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['residentialstatus']))  
	// {  
	//    $fields_error .= "ResidentialStatus  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['resaddress1']))  
	{  
	   $fields_error .= "ResAddress1  field cannot be blank!! # ";  
	}
	// if(empty($dataArray['resaddress2']))  
	// {  
	//    $fields_error .= "ResAddress2  field cannot be blank!! # ";  
	// }
	if(empty($dataArray['respin']))  
	{  
	   $fields_error .= "ResPIN  field cannot be blank!! # ";  
	}
	if(preg_match("/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/", $dataArray['respin'])===0){
		 $fields_error .= "Provide the valid Respin !! # ";  
	}
	if(empty($dataArray['rescity']))  
	{  
	   $fields_error .= "ResCity  field cannot be blank!! # ";  
	}
	if(empty($dataArray['permaddrsameasresaddr']))  
	{  
	   $fields_error .= "PermAddrSameAsResAddr  field cannot be blank!! # ";  
	}
	if(empty($dataArray['mobile']))  
	{  
	   $fields_error .= "Mobile field cannot be blank!! # ";  
	}
	if(empty($dataArray['email']))  
	{  
	   $fields_error .= "email field cannot be blank!! # ";  
	}
	if(empty($dataArray['pan']))  
	{  
	   $fields_error .= "PAN field cannot be blank!! # ";  
	}
	if(empty($dataArray['emptype']))  
	{  
	   $fields_error .= "EmpType field cannot be blank!! # ";  
	}
	if(empty($dataArray['othercompanyname']))  
	{  
	   $fields_error .= "OtherCompanyName field cannot be blank!! # ";  
	}
	if(empty($dataArray['companycode']))  
	{  
	   $fields_error .= "CompanyCode field cannot be blank!! # ";  
	}
	if(empty($dataArray['typeoforg']))  
	{  
	   $fields_error .= "TypeOfOrg field cannot be blank!! # ";  
	}
	if(empty($dataArray['industryisic']))  
	{  
	   $fields_error .= "IndustryIsic field cannot be blank!! # ";  
	}
	if(empty($dataArray['monthscurrentorg']))  
	{  
	   $fields_error .= "MonthsCurrentOrg field cannot be blank!! # ";  
	}
	if(empty($dataArray['salarybank']))  
	{  
	   $fields_error .= "SalaryBank field cannot be blank!! # ";  
	}
	if(empty($dataArray['offaddress1']))  
	{  
	   $fields_error .= "OffAddress1 field cannot be blank!! # ";  
	}
	if(empty($dataArray['offpin']))  
	{  
	   $fields_error .= "OffPIN field cannot be blank!! # ";  
	}
	if(preg_match("/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/", $dataArray['offpin'])===0){
		 $fields_error .= "Provide Office Pincode valid one  !! # ";  
	}
	if(empty($dataArray['offcity']))  
	{  
	   $fields_error .= "OffCity field cannot be blank!! # ";  
	}
	if(empty($dataArray['offphone']))  
	{  
	   $fields_error .= "OffPhone field cannot be blank!! # ";  
	}
	if(empty($dataArray['loanmailingaddress']))  
	{  
	   $fields_error .= "LoanMailingAddress field cannot be blank!! # ";  
	}
	if(empty($dataArray['loanamount']))  
	{  
	   $fields_error .= "LoanAmount field cannot be blank!! # ";  
	}
	if(empty($dataArray['tenuremonths']))  
	{  
	   $fields_error .= "TenureMonths field cannot be blank!! # ";  
	}
	if(empty($dataArray['irr']))  
	{  
	   $fields_error .= "IRR field cannot be blank!! # ";  
	}
	if(empty($dataArray['procfee']))  
	{  
	   $fields_error .= "ProcFee field cannot be blank!! # ";  
	}
	if(empty($dataArray['incomeproof']))  
	{  
	   $fields_error .= "IncomeProof field cannot be blank!! # ";  
	}
	if(empty($dataArray['otherdoctype']))  
	{  
	   $fields_error .= "OtherDocType field cannot be blank!! # ";  
	}
	if(empty($dataArray['otherdocno']))  
	{  
	   $fields_error .= "OtherDocNo field cannot be blank!! # ";  
	}
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['workexp']))  
	{  
	   $fields_error .= "Total Work Experience field cannot be blank!! # ";  
	}
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['salarybank']))  
	{  
	   $fields_error .= "Salary Bank field cannot be blank!! # ";  
	}

	$add1=$add2=$add3=$add4="";
	$per_add1=$per_add2=$per_add3=$per_add4=$per_city=$per_state="";
	$off_add1=$off_add2=$off_add3=$off_city=$off_pincode=$off_state="";
		if($fields_error != "")  
		{  
			$status="0";
			$errorcode ="102";
			$ErrorInfo ="DATA VALIDATION ERROR";
			$arResponse['status'] = $status;
			$arResponse['id'] = $unique_id;
			$arResponse['applicationid'] = "";
			$arResponse['ReferenceCode'] = "";
			 $arResponse['detail'] =$fields_error;
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
		}else{
			$OtherDocDate=null;$numofdependents=0;
			$person_title= $dataArray['title'];
			$datamartid =$dataArray['datamartid'];
			$conuniqrefcode =$dataArray['conuniqrefcode'];
			//echo '<pre>';print_r($dataArray);
			$fname =$dataArray['firstname'];
			$lname =$dataArray['lastname'];
			$full_name =$dataArray['firstname']." ".$dataArray['lastname'];
			$dob =str_replace("-", "/", $dataArray['dob']);
			$gender =$dataArray['gender'];
			$education =$dataArray['qualification'];
			$occupation =$dataArray['occupation'];
			$numofdependents =$dataArray['numofdependents'];
			$work_type =$dataArray['worktype'];
			$restype =$dataArray['restype'];
			$ResAccoType =$dataArray['resaccotype'];
			$Residentialstatus =$dataArray['residentialstatus'];
			if(!empty($dataArray['resaddress1'])){
			$add1 =$dataArray['resaddress1'];	
			}
			if(!empty($dataArray['resaddress2'])){
			$add2 =$dataArray['resaddress2'];	
			}
			if(!empty($dataArray['resaddress3'])){
			$add3 =$dataArray['resaddress3'];	
			}
			if(!empty($dataArray['resaddress4'])){
			$add4 =$dataArray['resaddress4'];	
			}
			// $add2 =$dataArray['resaddress2'];
			// $add3 = $dataArray['resaddress3']; //$dataArray['resaddress3'];
			// $add4= $dataArray['resaddress4'];
			$addcity =$dataArray['rescity'];
			$pincode =$dataArray['respin'];
			$resphone =$dataArray['resphone']; //Nneed to add field
			$PermAddrSameAsResAddr =$dataArray['permaddrsameasresaddr']; //yes means same as res
			if(!empty($dataArray['permaddress1'])){
			$per_add1 =$dataArray['permaddress1'];	
			}
			if(!empty($dataArray['permaddress2'])){
			$per_add2 =$dataArray['permaddress2'];	
			}
			if(!empty($dataArray['permaddress3'])){
			$per_add3 =$dataArray['permaddress3'];	
			}
			if(!empty($dataArray['permaddress4'])){
			$per_add4 =$dataArray['permaddress4'];	
			}
			// $per_add1 =$dataArray['permaddress1'];
			// $per_add2 =$dataArray['permaddress2'];
			// $per_add3 =  $dataArray['permaddress3'];//$dataArray['permaddress3'];
			// $per_add4 =$dataArray['permaddress4'];//$dataArray['permaddress4'];
			$per_city =$dataArray['permcity'];
			$per_pincode =$dataArray['permpin'];
			$mobile = $dataArray['mobile'];
			$email =$dataArray['email'];
			$pan =$dataArray['pan'];
			$employment_type =$dataArray['emptype'];
			$company_name =$dataArray['othercompanyname'];
			$company_code =$dataArray['companycode']; //Need to add Field in template
			$TypeOfOrg =$dataArray['typeoforg']; //Need to add Field in template
			$Profession =$dataArray['profession'];
			$WorkExp =$dataArray['workexp'];  //Need to add Field in template option
			$Industry =$dataArray['industry'];
			$industryisic =$dataArray['industryisic'];
			$MonthsCurrentOrg =$dataArray['monthscurrentorg']; //Need to add Field in template
			$salarybank =$dataArray['salarybank']; //Need to add Field in template
			if(!empty($dataArray['offaddress1'])){
			$off_add1 =$dataArray['offaddress1'];	
			}
			if(!empty($dataArray['offaddress2'])){
			$off_add2 =$dataArray['offaddress2'];	
			}
			if(!empty($dataArray['offaddress3'])){
			$off_add3 =$dataArray['offaddress3'];	
			}
			if(!empty($dataArray['offaddress4'])){
			$off_add4 =$dataArray['offaddress4'];	
			}
			if(!empty($dataArray['offcity'])){
			$off_city =$dataArray['offcity'];	
			}
			if(!empty($dataArray['offpin'])){
			$off_pincode =$dataArray['offpin'];	
			}
			// $off_add2 =$dataArray['offaddress2'];
			// $off_add3 =$dataArray['offaddress3'];
			// $off_city =$dataArray['offcity'];
			// $off_pincode =$dataArray['offpin'];
			// $offcity =$dataArray['offcity'];
			$off_phone =$dataArray['offphone'];
			$off_phoneext=$dataArray['offphoneextn']; //new field
			$off_email =$dataArray['ofcemail']; //new field
			$LoanMailingAddress =$dataArray['loanmailingaddress'];
			$mothly_income =$dataArray['gmi'];
			$emi_amt =$dataArray['currentemi'];
			$current_yr_tax =$dataArray['taxitrcurryr'];
			$prev_yr_taxable_income =$dataArray['taxitrprevyr'];  //need to creted
			$gross_turnover =$dataArray['curryrgrosturnover'];
			$off_income =$dataArray['curryrbusinessincome'];
			$ofcemail =$dataArray['ofcemail'];
			$off_income_other =$dataArray['curryrotherincome'];
			$current_yr_depr =$dataArray['depreciationplacc'];
			$loan_amount =$dataArray['loanamount'];
			$tenure =$dataArray['tenuremonths'];
			$interest_rate =$dataArray['irr'];
			$pf =$dataArray['procfee'];
			$monthlyvarbonus =$dataArray['monthlyvarbonus'];
			$incomeproof =$dataArray['incomeproof'];
			$OtherDocType =$dataArray['otherdoctype'];
			$OtherDocNo =$dataArray['otherdocno'];
			$OtherDocExpDate =$dataArray['otherdocexpdate'];
			$purpose =$dataArray['purposeofaccopngpl'];
			$existing_rel_scb = $dataArray['ExistingRelationship']=="yes" ? 1 : 0; 
			$timestamp = date('Y/m/d H:i:s');
		    $citymaster = $pages->find("template=city_master,code={$addcity}");
			if (count($citymaster)) {
				foreach ($citymaster as $pin) {
					$addcity =$pin->title;
					$addstate = $pin->state;
				}
			}
			$citymaster_off = $pages->find("template=city_master,code={$off_city}");
			if (count($citymaster_off)) {
				foreach ($citymaster_off as $pinoff) {
					$offcity =$pinoff->title;
					$offstate = $pinoff->state;
				}
			}

			$initiatedbycity = $pages->find("template=Initiated_city_code,title={$addcity}");
			if (count($initiatedbycity)) {
				foreach ($initiatedbycity as $incode) {
					$initiatedby =$incode->code;
					//$addstate = $incode->state;
				}
			}

			if(count($citymaster) < 0 || count($citymaster_off) < 0){
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Residential pincode does not exist in cms master";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}

		  if($mobile!="" && $pan!=""){
		  	$formLeads = $pages->find("template=aggregator_lead_template,mobile={$mobile},pan={$pan},product=1,sort=-published,limit=1");
			 	if (count($formLeads) >0) {
					foreach($formLeads  as $pdata){
					  $unique_id = $pdata->unique_id;
					  $aip_ref_number =$pdata->aip_ref_number;
					  $unique_ref_code_1 =$pdata->unique_ref_code;
					}
					if($aip_ref_number!="" && $unique_ref_code_1!=$conuniqrefcode){
					$status ="0";
					$errorcode ="103";
					$ErrorInfo ="DUPLICATE APPLICATION (ANOTHER SOURCE)";
					$pluniqueid =$unique_id;
					$errflag =2;
				  }
			 	}
		   }

		if($errflag==1){
		     	$formLeads = $pages->find("template=aggregator_lead_template,code={$datamartid},unique_ref_code={$conuniqrefcode},mobile={$mobile},product=1,sort=-published,limit=1");
			 	if (count($formLeads)) {
				foreach($formLeads  as $pdata1){
				//echo $pdata->unique_id."<br>";
					$unique_id = $pdata1->unique_id;
					$pluniqueid =$unique_id;
					$aip_ref_number =$pdata1->aip_ref_number;
					// $status ="0";
					// $errorcode ="104";
					// $ErrorInfo ="DUPLICATE APPLICATION";

				}
				if($aip_ref_number!=""){
					$status ="0";
					$errorcode ="104";
					$ErrorInfo ="DUPLICATE APPLICATION";
				  }
				$p = $pages->get("unique_id=$unique_id");
				$p->of(false);
			}else{
				$p = new Page();
				$p->of(false);
				$p->template = "aggregator_lead_template";
				$p->parent = $pages->get(30171);
				$unique_id = random_code();
				$pluniqueid ="PL".$unique_id;
				$p->unique_id =$pluniqueid;
			  }

			// $p = new Page();
			// $p->of(false);
			// $p->template = "aggregator_lead_template";
			// $p->parent = $pages->get(30171);
			$p->title =  $mobile." - ".$unique_id;
			$p->mobile = $mobile;
			//$p->full_name=$full_name;
			$p->email = $email;
			$p->product = 1;
			$p->pincode = $pincode;
			
			$p->existing_rel_scb = $existing_rel_scb;
			$existing_rel_scb = $existing_rel_scb == "yes" ? 1 : 0; 
			$p->current_yr_audited = $current_yr_audited;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$p->start_of_business = $start_of_business;
			
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;
			/* new fields */
			
			//$p->employer_industry_opt = $employer_industry;
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->code =$datamartid;
			$p->unique_ref_code =$conuniqrefcode;
			$p->person_title = $person_title;
			$p->country = "India";
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $gender;
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3." ".$addcity." ".$addstate;
			$p->alternate_contact =$resphone;
			//$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_pincode;
			$p->address = $add1." ".$add2." ".$add3;
			if($p->PermAddrSameAsResAddr=="1" || $p->PermAddrSameAsResAddr=="y" || $p->PermAddrSameAsResAddr=="Y"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincde =$pincode; 
			$per_pincode =$pincode;
			}else{
				$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
				}
			  }
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->purpose_opt = $purpose;
			//$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			$p->off_lma = $off_lma;
			$arrworktype=array("F"=>"1","G"=>"2","I"=>"3","J"=>"4","k"=>"5","L"=>"6","Y"=>"7","P"=>"8");
			//$worktype = $arrworktype[$work_type]; //get value of 1/2/3
			$p->work_type_new = $arrworktype[$work_type];//passkey
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			if($tenure){
				$tenureyr =$tenure/12;
			}
			$p->loan_amount =$loan_amount;
			$p->interest_rate =$interest_rate;
			$p->pf =$pf;
			$p->tenure =$tenureyr;
			$p->no_of_dependant =$numofdependents;
			$p->residence_type =$restype;
			$p->total_exp =$totexp;
			$p->account_number =$salarybank;
			//$p->off_lma =$LoanMailingAddress;
			if($LoanMailingAddress=="RES"){
				$lmaddrss ="1";
			}else if($LoanMailingAddress=="PER"){
				$lmaddrss ="2";
			}else if($LoanMailingAddress=="OFF"){
				$lmaddrss ="3";
			}
			$p->mailing_address_opt = $lmaddrss;
			$OtherDocType =strtolower($OtherDocType);
			if($OtherDocType=="voterid"){ //voterid
			 // $p->voter_id = $OtherDocNo;
			 // $p->voter_validity = $OtherDocDate;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="drivinglicence"){
			 // $p->lic = $OtherDocNo;
			 // $p->lic_validity = $OtherDocDate;
			 $otherdocumentno =$OtherDocNo;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="passport"){
				// $p->passport = $OtherDocNo;
				// $p->passport_validity = $OtherDocDate;
				$otherdocumentno =$OtherDocNo;
				$otherdocumentdate =$OtherDocDate;
				$otherdocumenttype ="T0231";
			}
			 $p->document_number = $OtherDocNo;
			 $p->document_validity = $OtherDocDate;
			if($OtherDocDate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $OtherDocDate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}
		
			
			if($PermAddrSameAsResAddr=="Y" || $PermAddrSameAsResAddr=="y" || $PermAddrSameAsResAddr=="yes" || $PermAddrSameAsResAddr=="1"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincode =$pincode; 
			$per_pincode =$pincode;
			$p->PermAddrSameAsResAddr =1;
			}else{
				$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;

				}
			  }
			  $p->PermAddrSameAsResAddr =0;
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->perma_pincode =$per_pincode; 
			if($employment_type=="4" || $employment_type=="Salaried" || $employment_type=="Salaried: SCB Salary A/C" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			$promo_code_1="INPL00NA00ONLINE";
			$QualifiedIdentifier = $dataArray['qualifiedidentifier'];
			if($QualifiedIdentifier=="1"){
				$promo_code_1 ="IN00PL00PREQUALI";
			}
			$p->utm_campaign =$promo_code_1;
			$p->source_type =$aggritype;
			if($industryisic){
				$industryisic_dt = $pages->get(1049)("code=$industryisic");
				$p->industry_isic =$industryisic_dt->id;
			}
			if($occupation){
				$occupation_dt = $pages->get(31498)("code=$occupation");
				$p->occupation =$occupation_dt->id;
			}

			$restype=array("SO"=>"1","RE"=>"2","LR"=>"3","BA"=>"4","LO"=>"5","CO"=>"6");
			$p->residence_type =$restype[$dataArray['restype']];
			$arrpersonalttile=array("MR"=>"1","MRS"=>"2","MS"=>"3","PRF"=>"4","DR"=>"5");
			$p->person_title_opt =$arrpersonalttile[$dataArray['title']];
			$apigender=array("1"=>"M","2"=>"F","3"=>"T");
			$postdata =array("leadType"=>"agg_PL","pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>$promo_code_1,"education"=>$education,"work_type"=>$work_type,"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$totexp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$OtherDocNo,"otherdocumentdate"=>$OtherDocDate,"restype"=>$dataArray['restype'],"personal_title"=>$dataArray['title'],'occupation'=>$occupation,"numofdependents"=>$numofdependents,"industryisic"=>$industryisic,"sourceid"=>$datamartid,"initiatedby" =>$initiatedby);
			// echo '<pre>';
			// print_r($postdata);
			// die;
			
			$file = fopen("logs/logs_aggriAPI_05.txt","a");
			fwrite($file,"Req_Post_".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
			fwrite($file,"\n");
			fclose($file); 
		
			$responseArr =lmsLeadCreationAIPPersonalLoanCCForNTB($postdata);
			// echo "<pre>";
			// print_r($responseArr);
			//PLINPL00NA00ONLINE
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
			//PLINPL00NA00ONLINE
			if(empty($responseArr)){
					$status="0";
					$errorcode ="999";
					$ErrorInfo ="UN-KNOWN ERROR FROM SCB";
			}else{
				if($responseArr['aipreferencenumber']){
					$status ="1";
					if(!empty($appliationid)){
						$p->application_id =$responseArr['appliationid'];	
					}
					$p->aip_ref_number =$responseArr['aipreferencenumber'];
					$p->stat =$responseArr['aip_status_response'];
					if($responseArr['aip_status_response']=="DECLINE"){
						$status ="3";
					}
					//$p->approved_amount =$responseArr['approved_amount'];
				}
				else if($responseArr['errormsg']){
					$status="0";
					$errorcode ="108";
					$ErrorInfo ="SYSTEM ERROR FROM";
					$arResponse['detail'] =$responseArr['errormsg'];
				} 
			} 
			 $p->save();
		}
			 if($errorcode=="104"){$status="0";}
			 $arResponse['status'] = $status;
			 $arResponse['id'] = $pluniqueid;
			 $arResponse['applicationid'] = $responseArr['appliationid'];
			 $arResponse['api_msg'] = $responseArr['api_msg'];
			 $arResponse['ReferenceCode'] = $responseArr['aipreferencenumber'];
			 //$arResponse['detail'] =$responseArr['errormsg'];
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
		}
		return $arResponse;
			
}



