<?php
namespace ProcessWire;
libxml_use_internal_errors(TRUE);
error_reporting(1);
ini_set('display_errors','1');
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
include("LeadAPI.php");
  /*$xmlsoap ='<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:creditCard" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <soapenv:Header />
   <soapenv:Body>
      <urn:creditCard soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
         <RPRequest xsi:type="urn:RPRequest">
            <Authentication xsi:type="urn:Authentication">
                <UserId xsi:type="xsd:string">Bankbazaar_UAT</UserId>
                <Password xsi:type="xsd:string">1f5a2d07c7d0f5f98d71f1c4358d9ee7</Password>
            </Authentication>
            <CreditCard xsi:type="urn:CreditCard">
               <Version xsi:type="xsd:int">4</Version>
               <DataMartId xsi:type="xsd:string">2091307</DataMartId>
               <ConUniqRefCode xsi:type="xsd:string">103565969573</ConUniqRefCode>
               <CreditCardApplied xsi:type="xsd:int">13</CreditCardApplied>
               <HasExistingScbCC xsi:type="xsd:string">N</HasExistingScbCC>
               <IsExtngScbCust xsi:type="xsd:string">N</IsExtngScbCust>
               <CustReltnType xsi:type="xsd:int" />
               <Email xsi:type="xsd:string">bhoorsinghkushwah@gmail.com</Email>
               <Mobile xsi:type="xsd:unsignedLong">8801281165</Mobile>
               <Title xsi:type="xsd:string">MR</Title>
               <FirstName xsi:type="xsd:string">BHOORSINGH</FirstName>
               <MiddleName xsi:type="xsd:string" />
               <LastName xsi:type="xsd:string">KUSHWAH</LastName>
               <Gender xsi:type="xsd:int">1</Gender>
               <DOB xsi:type="xsd:string">15-08-1998</DOB>
               <Qualification xsi:type="xsd:string">SEC</Qualification>
               <PAN xsi:type="xsd:string">CPWPB9337Q</PAN>
               <ResType xsi:type="xsd:string">SO</ResType>
               <ResAddress1 xsi:type="xsd:string">4-55-52 RING BASTHI</ResAddress1>
               <ResAddress2 xsi:type="xsd:string" />
               <ResAddress3 xsi:type="xsd:string" />
               <ResAddress4 xsi:type="xsd:string">JAGATHGIRI GUTTA</ResAddress4>
               <ResCity xsi:type="xsd:int">15</ResCity>
               <ResPIN xsi:type="xsd:unsignedLong">500037</ResPIN>
               <PermAddrSameAsResAddr xsi:type="xsd:string">Y</PermAddrSameAsResAddr>
               <PermAddress1 xsi:type="xsd:string" />
               <PermAddress2 xsi:type="xsd:string" />
               <PermAddress3 xsi:type="xsd:string" />
               <PermAddress4 xsi:type="xsd:string" />
               <PermCity xsi:type="xsd:int" />
               <PermPIN xsi:type="xsd:int" />
               <OfcAddress1 xsi:type="xsd:string">RAZALA BAZAAR SAI RAM COLONY</OfcAddress1>
               <OfcAddress2 xsi:type="xsd:string" />
               <OfcAddress3 xsi:type="xsd:string" />
               <OfcAddress4 xsi:type="xsd:string">BOLARAM SECUNDERABAD</OfcAddress4>
               <OfcCity xsi:type="xsd:int">15</OfcCity>
               <OfcPIN xsi:type="xsd:int">500010</OfcPIN>
               <OfcEmail xsi:type="xsd:string" />
               <OfcPhone xsi:type="xsd:int">8801281165</OfcPhone>
               <NumOfDependents xsi:type="xsd:int">0</NumOfDependents>
               <EmpType xsi:type="xsd:int">1</EmpType>
               <SalaryBankAcc xsi:type="xsd:int">999</SalaryBankAcc>
               <AnnIncome xsi:type="xsd:unsignedLong">543192</AnnIncome>
               <GMI xsi:type="xsd:unsignedLong">45266</GMI>
               <WorkType xsi:type="xsd:string">G</WorkType>
               <OtherCompanyName xsi:type="xsd:string">VISHAL JEWELLERS</OtherCompanyName>
               <CompanyCode xsi:type="xsd:string">99999</CompanyCode>
               <Occupation xsi:type="xsd:string">94</Occupation>
               <Designation xsi:type="xsd:int">30</Designation>
               <IndustryIsic xsi:type="xsd:string">RS35</IndustryIsic>
               <TotalWorkExp xsi:type="xsd:int">7</TotalWorkExp>
               <IncomeProof xsi:type="xsd:string">T0235</IncomeProof>
               <IncomeProofValue xsi:type="xsd:unsignedLong">100000</IncomeProofValue>
               <ResidentialStatus xsi:type="xsd:string">CT</ResidentialStatus>
               <CardMailingAddress xsi:type="xsd:string">RES</CardMailingAddress>
               <MonthlyVarBonus xsi:type="xsd:int" />
               <OtherDocType xsi:type="xsd:string">voterId</OtherDocType>
               <OtherDocNo xsi:type="xsd:string">999999</OtherDocNo>
               <OtherDocExpDate xsi:type="xsd:string" />
               <PrevYearTaxableIncome xsi:type="xsd:unsignedLong" />
               <ProfessionalIncome xsi:type="xsd:unsignedLong" />
               <BusinessIncome xsi:type="xsd:unsignedLong" />
               <IncomeDepreciation xsi:type="xsd:unsignedLong" />
               <DirectorRenumeration xsi:type="xsd:unsignedLong" />
               <SalCreditBankStmnt xsi:type="xsd:unsignedLong" />
               <OtherIncome xsi:type="xsd:unsignedLong" />
               <MonthlySalesTurnOver xsi:type="xsd:unsignedLong" />
               <QualifiedIdentifier xsi:type="xsd:int">1</QualifiedIdentifier>
            </CreditCard>
         </RPRequest>
      </urn:creditCard>
   </soapenv:Body>
</soapenv:Envelope>';
*/
$xmlsoap  = file_get_contents('php://input');
$plainXML = mungXML( trim($xmlsoap) );
$objXmlDocument = simplexml_load_string($plainXML);
if ($objXmlDocument === FALSE) {
    echo "There were errors parsing the XML file.\n";
    foreach(libxml_get_errors() as $error) {
        echo $error->message;
    }
    exit;
}

$finalarrCreditCard =$finalarrPersonalLoan =array();
$objJsonDocument = json_encode($objXmlDocument);
$arrOutput = json_decode($objJsonDocument, TRUE);
// echo '<pre>';
// print_r($arrOutput);

$finalarrPL =$arrOutput['soapenv_Body']['urn_personalLoan']['RPRequest'];
$finalarrCC =$arrOutput['soapenv_Body']['urn_creditCard']['RPRequest'];
if(!empty($finalarrPL)){
$autharr =$finalarrPL['Authentication'];
$uname =$autharr['UserId'];
$password =$autharr['Password'];
$typerr ="personalLoan";
}
if(!empty($finalarrCC)){
$autharr =$finalarrCC['Authentication'];
$uname =$autharr['UserId'];
$password =$autharr['Password'];
$typerr ="creditCard";
}
$validateUser = $pages->find("template=aggregator_master,fname={$uname},code={$password}");
if (count($validateUser)) {
	//echo count($validateUser);
foreach ($validateUser as $val) {
	  $valuser =$val->fname;
	 $valpwd = $val->code;
 }
}else{
 // echo json_encode(['msg' => 'Access Denied!', 'status' => 0]);
	// exit();	
	$status="0";
	$errorcode ="105";
	$ErrorInfo ="AUTH ERROR";
	$ReferenceCode = "";
	$response['detail'] =$responseArr['errormsg'];
	$response['ErrorInfo'] =$ErrorInfo;
	$response['errorcode'] =$errorcode;
	$authxml ='<?xml version="1.0" encoding="UTF-8"?>
		<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:'.$typerr.'" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
		   <SOAP-ENV:Body>
		      <ns1:'.$typerr.'Response xmlns:ns1="urn:'.$typerr.'">
		         <return xsi:type="tns:RPResponse">
		            <Status xsi:type="xsd:int">'.$status.'</Status>
		            <ReferenceCode xsi:type="xsd:string">'.$ReferenceCode.'</ReferenceCode>
		            <ErrorCode xsi:type="xsd:int">'.$errorcode.'</ErrorCode>
		            <ErrorInfo xsi:type="xsd:string">'.$ErrorInfo.'</ErrorInfo>
		            <RequestIP xsi:type="xsd:string">103.65.235.254</RequestIP>
		         </return>
		      </ns1:'.$typerr.'>
		   </SOAP-ENV:Body>
		</SOAP-ENV:Envelope>';
		echo $authxml;
		exit();
}

if($uname==$valuser && $password == $valpwd){
 if(!empty($finalarrPL['PersonalLoan'])){
 	 $finalarrPersonalLoan =$finalarrPL['PersonalLoan'];
 	 $finalarrPersonalLoan = array_change_key_case($finalarrPersonalLoan ,CASE_LOWER);
 	 $response =aggregatorforPL($finalarrPersonalLoan);
 	// echo $response;exit();
		 $plxmlsoap ='<?xml version="1.0" encoding="UTF-8"?>
		<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:personalLoan" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
		   <SOAP-ENV:Body>
		      <ns1:personalLoanResponse xmlns:ns1="urn:personalLoan">
		         <return xsi:type="tns:RPResponse">
		            <Status xsi:type="xsd:int">'.$response["status"].'</Status>
		            <ReferenceCode xsi:type="xsd:string">'.$response["ReferenceCode"].'</ReferenceCode>
		            <UniqueID xsi:type="xsd:string">'.$response["id"].'</UniqueID>
		            <ErrorCode xsi:type="xsd:int">'.$response["errorcode"].'</ErrorCode>
		            <ErrorInfo xsi:type="xsd:string">'.$response['ErrorInfo'].'</ErrorInfo>
		            <ErrorInfoDetail xsi:type="xsd:string">'.$response['detail'].'</ErrorInfoDetail>
		            <RequestIP xsi:type="xsd:string">103.65.235.254</RequestIP>
		         </return>
		      </ns1:personalLoanResponse>
		   </SOAP-ENV:Body>
		</SOAP-ENV:Envelope>';
		echo $plxmlsoap;
		exit();
 }

 if(!empty($finalarrCC['CreditCard'])){
 	 $finalarrCreditCard =$finalarrCC['CreditCard'];
 	  $finalarrCreditCard = array_change_key_case($finalarrCreditCard ,CASE_LOWER);
 	 $response =aggregatorforCC($finalarrCreditCard);
 	 //echo $response;exit();
 $ccxmlsoap ='<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:creditCard" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
   <SOAP-ENV:Body>
      <ns1:creditCardResponse xmlns:ns1="urn:creditCard">
         <return xsi:type="tns:RPResponse">
            <Status xsi:type="xsd:int">'.$response["status"].'</Status>
            <ReferenceCode xsi:type="xsd:string">'.$response["ReferenceCode"].'</ReferenceCode>
            <UniqueID xsi:type="xsd:string">'.$response["id"].'</UniqueID>
            <ErrorCode xsi:type="xsd:int">'.$response["errorcode"].'</ErrorCode>
            <ErrorInfo xsi:type="xsd:string">'.$response['ErrorInfo'].'</ErrorInfo>
            <ErrorInfoDetail xsi:type="xsd:string">'.$response['detail'].'</ErrorInfoDetail>
            <RequestIP xsi:type="xsd:string">103.65.235.254</RequestIP>
         </return>
      </ns1:creditCardResponse>
   </SOAP-ENV:Body>
</SOAP-ENV:Envelope>';
echo $ccxmlsoap;
exit();
 }
}
// echo '<pre>';
// print_r($finalarrCC);
// print_r($finalarrCreditCard);die;
//same function there in PL json 
function aggregatorforPL($dataArray)
{
	//$dataArray = array_change_key_case($dataArray ,CASE_LOWER);
	//print_r($dataArray);
	$fields_error = '';
	$status ="2";
	$pages = wire('pages');
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


		if($fields_error != "")  
		{  
			//return json_encode(['msg' => $fields_error, 'status' =>'error']);
			//exit();
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
			//$argender =array("1"=>"Male","2"=>"Female","3"=>"Other Gender");

			
			$OtherDocDate=$numofdependents=null;
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
			$add1 =$dataArray['resaddress1'];
			$add2 =implode(" ",$dataArray['resaddress2']);
			$add3 = implode(" ",$dataArray['resaddress3']); //$dataArray['resaddress3'];
			$add4= implode(" ",$dataArray['resaddress4']);
			$addcity =$dataArray['rescity'];
			$pincode =$dataArray['respin'];
			$resphone =$dataArray['resphone']; //Nneed to add field
			$PermAddrSameAsResAddr =$dataArray['permaddrsameasresaddr']; //yes means same as res
			$per_add1 =$dataArray['permaddress1'];
			$per_add2 =implode(" ",$dataArray['permaddress2']);
			$per_add3 =  implode(" ",$dataArray['permaddress3']);//$dataArray['permaddress3'];
			$per_add4 =implode(" ",$dataArray['permaddress4']);//$dataArray['permaddress4'];
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
			$employer_industry =$dataArray['industryisic'];
			$MonthsCurrentOrg =$dataArray['monthscurrentorg']; //Need to add Field in template
			$salarybank =$dataArray['salarybank']; //Need to add Field in template
			$off_add1 =$dataArray['offaddress1'];
			$off_add2 =$dataArray['offaddress2'];
			$off_add3 =$dataArray['offaddress3']." ".$dataArray['offaddress4'];
			$off_city =$dataArray['offcity'];
			$off_pincode =$dataArray['offpin'];
			$offcity =$dataArray['offcity'];
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
			$off_income_other =$dataArray['ofcemail'];
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
			// $OtherDocNo =$dataArray['OtherDocNo'];
			// $OtherDocNo =$dataArray['OtherDocNo'];
			// $OtherDocNo =$dataArray['OtherDocNo'];
			$existing_rel_scb = $dataArray['ExistingRelationship']=="yes" ? 1 : 0; 
			$timestamp = date('Y/m/d H:i:s');
		    //$pages = wire('pages');
		     	$formLeads = $pages->find("template=aggregator_lead_template,code={$datamartid},unique_ref_code={$conuniqrefcode},product=1,sort=-published,limit=1");
			 	if (count($formLeads)) {
				foreach($formLeads  as $pdata){
				//echo $pdata->unique_id."<br>";
				$unique_id = $pdata->unique_id;
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
			$p->unique_id = $unique_id;
			$p->existing_rel_scb = $existing_rel_scb;
			$existing_rel_scb = $existing_rel_scb == "yes" ? 1 : 0; 
			$p->current_yr_audited = $current_yr_audited;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$p->start_of_business = $start_of_business;
			
			if($applicant_description != "Option to best describe applicant"){$p->applicant_description = $applicant_description;}
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;
			/* new fields */
			$pincodes = $pages->find("template=location-master,title={$pincode}");
			if (count($pincodes)) {
				foreach ($pincodes as $pin) {
					$addcity =$pin->city;
					$addstate = $pin->state;
				}}

			$pincodes_off = $pages->find("template=location-master,title={$off_pincode}");
			if (count($pincodes_off)) {
				foreach ($pincodes_off as $pinoff) {
					$offcity =$pinoff->city;
					$offstate = $pinoff->state;
				}}

			$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
				}}

			if($employer_industry != "Employer Industry Segment"){$p->employer_industry = $employer_industry;}
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->code =$datamartid;
			$p->unique_ref_code =$conuniqrefcode;
			$p->person_title = $person_title;
			$p->country = "IN";
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $gender;
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3;
			$p->alternate_contact =$resphone;
			//$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_pincode;
			$p->address = $add1." ".$add2." ".$add3;
			if($PermAddrSameAsResAddr=="Y" || $PermAddrSameAsResAddr=="y" || $PermAddrSameAsResAddr=="yes"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincde =$pincode; 
			$per_pincode =$pincode;
			$p->permaddrsameasresaddr =1;
			}else{
				$permanent_pincodes = $pages->find("template=location-master,title={$ppincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;

				}
			  }
			  $p->permaddrsameasresaddr =0;
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->purpose = $purpose;
			//$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			$p->off_lma = $off_lma;
			$arrwork =array("6"=>"Government","1"=>"Private","3" =>"Public");
			$p->work_type_new = $arrwork[$work_type];
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			$tenureyr =$tenure/12;
			$p->loan_amount =$loan_amount;
			$p->interest_rate =$interest_rate;
			$p->pf =$pf;
			$p->tenure =$tenureyr;
			$p->no_of_dependant =$numofdependents;
			$p->residence_type =$restype;
			$p->total_exp =$totexp;
			$p->account_number =$salarybank;
			
			if($OtherDocType=="voterId"){ //voterid
			 $p->voter_id = $OtherDocNo;
			 $p->voter_validity = $OtherDocDate;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="DrivingLicence"){
			 $p->lic = $OtherDocNo;
			 $p->lic_validity = $OtherDocDate;
			 $otherdocumentno =$OtherDocNo;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="Passport"){
				$p->passport = $OtherDocNo;
				$p->passport_validity = $OtherDocDate;
				$otherdocumentno =$OtherDocNo;
				$otherdocumentdate =$OtherDocDate;
				$otherdocumenttype ="T0231";
			}
			if($OtherDocDate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $OtherDocDate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}
			$arrworktype=array("Public Limited"=>"I","Government"=>"G","Private Limited"=>"G","K"=>"Others");
			if($employment_type=="4" || $employment_type=="5" || $employment_type=="6" || $employment_type=="Salaried: SCB Salary A/C" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			//$selfemployeed="T0036"; //income-document-type-1
			
			$apigender=array("1"=>"M","2"=>"F","3"=>"T");
			// $postdata =array("leadType"=>"aggregator","pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"emp_name"=>$emp_name,"dob"=>$dob,"mobile"=>$p->mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>"INPL00NA00ONLINE","education"=>$education,"work_type"=>$arrworktype[$work_type],"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure);

			$postdata =array("leadType"=>"agg","conuniqrefcode" =>$conuniqrefcode,"pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>"INPL00NA00ONLINE","education"=>$education,"work_type"=>$arrworktype[$work_type],"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$totexp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$OtherDocNo,"otherdocumentdate"=>$OtherDocDate);
			// echo '<pre>';
			// print_r($postdata);
			// die;
			
			$file = fopen("logs_aggriAPI.txt","a");
			fwrite($file,"Req_Post_PL".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
			fwrite($file,"\n");
			fclose($file); 
		
			$responseArr =lmsLeadCreationAIPPersonalLoanForNTB($postdata);
			//PLINPL00NA00ONLINE
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
			//PLINPL00NA00ONLINE
			if($responseArr['aipreferencenumber']){
				$status ="1";
				if(!empty($appliationid)){
					$p->application_id =$responseArr['appliationid'];	
				}
				$p->aip_ref_number =$responseArr['aipreferencenumber'];
				$p->stat =$responseArr['aip_status_response'];
				//$p->approved_amount =$responseArr['approved_amount'];
			}
			if(!empty($responseArr['errormsg'])){
				$status="0";
				$errorcode ="108";
				$ErrorInfo ="SYSTEM ERROR FROM";
			}
		  
		  
			 $p->save();
			//  return json_encode(array("status"=>$status,"unique_id" =>$unique_id,"applicationid"=>$responseArr['appliationid'],"aipreferencenumber"=>$responseArr['aipreferencenumber'],"api_msg"=>$responseArr['status']));
			// exit();
			 if($errorcode=="104"){$status="0";}
			 $arResponse['status'] = $status;
			 $arResponse['id'] = $unique_id;
			 $arResponse['applicationid'] = $responseArr['appliationid'];
			 $arResponse['api_msg'] = $responseArr['api_msg'];
			 $arResponse['ReferenceCode'] = $responseArr['aipreferencenumber'];
			 $arResponse['detail'] =$responseArr['errormsg'];
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
		}
		return $arResponse;
}

function aggregatorforCC($dataArray){

	$fields_error = '';
	$status ="2";
	$off_add1 = $off_add2 =$off_add3=$off_add4="";
	$pages = wire('pages');
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
	// if(empty($dataArray['purposeofaccopngpl']))  
	// {  
	//    $fields_error .= "PurposeOfAccOpngPL field cannot be blank!! # ";  
	// }
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
	// if(empty($dataArray['typeoforg']))  
	// {  
	//    $fields_error .= "TypeOfOrg field cannot be blank!! # ";  
	// }
	if(empty($dataArray['industryisic']))  
	{  
	   $fields_error .= "IndustryIsic field cannot be blank!! # ";  
	}
	// if(empty($dataArray['monthscurrentorg']))  
	// {  
	//    $fields_error .= "MonthsCurrentOrg field cannot be blank!! # ";  
	// }
	if(empty($dataArray['salarybankacc']))  
	{  
	   $fields_error .= "SalaryBankAcc field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcaddress1']))  
	{  
	   $fields_error .= "OfcAddress1 field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcpin']))  
	{  
	   $fields_error .= "OffPIN field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofccity']))  
	{  
	   $fields_error .= "OffCity field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcphone']))  
	{  
	   $fields_error .= "OfcPhone field cannot be blank!! # ";  
	}
	if(empty($dataArray['cardmailingaddress']))  
	{  
	   $fields_error .= "CardMailingAddress field cannot be blank!! # ";  
	}
	// if(empty($dataArray['loanamount']))  
	// {  
	//    $fields_error .= "LoanAmount field cannot be blank!! # ";  
	// }
	// if(empty($dataArray['tenuremonths']))  
	// {  
	//    $fields_error .= "TenureMonths field cannot be blank!! # ";  
	// }
	// if(empty($dataArray['irr']))  
	// {  
	//    $fields_error .= "IRR field cannot be blank!! # ";  
	// }
	// if(empty($dataArray['procfee']))  
	// {  
	//    $fields_error .= "ProcFee field cannot be blank!! # ";  
	// }
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


	if($fields_error != "")  
	{  
		//echo json_encode(['msg' => $fields_error, 'status' =>'error']);
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
		//exit();
	}else{
			$numofdependents =null;
			$person_title= $dataArray['title'];
			//$unique_id =$unique_id; //$dataArray['datamartid'];
			//echo '<pre>';print_r($dataArray);
			$fname =$dataArray['firstname'];
			$datamartid =$dataArray['datamartid'];
			$conuniqrefcode =$dataArray['conuniqrefcode'];
			$lname =$dataArray['lastname'];
			$full_name =$dataArray['firstname']." ".$dataArray['lastname'];
			$dob =$dataArray['dob'];
			$gender =$dataArray['gender'];
			$education =$dataArray['qualification'];
			$occupation =$dataArray['occupation'];
			$NumOfDependents =$dataArray['numofdependents'];
			$work_type =$dataArray['worktype'];
			$restype =$dataArray['restype'];
			$ResAccoType =$dataArray['resaccotype'];
			$Residentialstatus =$dataArray['residentialstatus'];
			$add1 =$dataArray['resaddress1'];
			$add2 =implode(" ",$dataArray['resaddress2']);
			$add3 = implode(" ",$dataArray['resaddress3']); //$dataArray['resaddress3'];
			$add4= implode(" ",$dataArray['resaddress4']);
			$addcity =$dataArray['rescity'];
			$pincode =$dataArray['respin'];
			$resphone =$dataArray['resphone']; //Nneed to add field
			$PermAddrSameAsResAddr =$dataArray['permaddrsameasresaddr']; //yes means same as res
			$per_add1 =implode(" ",$dataArray['permaddress1']);
			$per_add2 =implode(" ",$dataArray['permaddress2']);
			$per_add3 =implode(" ",$dataArray['permaddress3']);
			$per_add4 =implode(" ",$dataArray['permaddress4']);
			$per_city =implode(" ",$dataArray['permcity']);
			$per_pincode =$dataArray['permpin'];
			$mobile = $dataArray['mobile'];
			$email =$dataArray['email'];
			$pan =$dataArray['pan'];
			$employment_type =$dataArray['emptype'];
			$employer_name =$dataArray['othercompanyname'];
			$CompanyCode =$dataArray['companycode']; //Need to add Field in template
			$TypeOfOrg =$dataArray['typeoforg']; //Need to add Field in template
			$Profession =$dataArray['profession'];
			$WorkExp =$dataArray['workexp'];  //Need to add Field in template option
			$Industry =$dataArray['industry'];
			$employer_industry =$dataArray['industryisic'];
			$MonthsCurrentOrg =$dataArray['monthscurrentorg']; //Need to add Field in template
			$salarybank =$dataArray['salarybankacc']; //Need to add Field in template
			$off_add1 =implode(" ",$dataArray['ofcaddress1']);
			$off_add2 =implode(" ",$dataArray['ofcaddress2']);
			$off_add3 =implode(" ",$dataArray['ofcaddress3'])." ".implode(" ",$dataArray['offaddress4']);
			$off_city =implode(" ",$dataArray['ofccity']);
			$off_pincode =$dataArray['ofcpin'];
			$off_phone =$dataArray['ofcphone'];
			//$off_phoneext=$dataArray['offphoneextn']; //new field
			$off_email =$dataArray['ofcemail']; //new field
			$LoanMailingAddress =$dataArray['cardmailingaddress'];
			$mothly_income =$dataArray['gmi'];
			$emi_amt =$dataArray['currentemi'];
			$current_yr_tax =$dataArray['taxitrcurryr'];
			$prev_yr_taxable_income =$dataArray['taxitrprevyr'];  //need to creted
			$gross_turnover =$dataArray['curryrgrosturnover'];
			$off_income =$dataArray['curryrbusinessincome'];
			$off_income_other =$dataArray['ofcemail'];
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
			$totexp =$dataArray['totalworkexp'];
			// $OtherDocNo =$dataArray['OtherDocNo'];
			// $OtherDocNo =$dataArray['OtherDocNo'];
			$formLeads = $pages->find("template=aggregator_lead_template,code={$datamartid},unique_ref_code={$conuniqrefcode},product=2,sort=-published,limit=1");
			 	if (count($formLeads)) {
				foreach($formLeads  as $pdata){
				//echo $pdata->unique_id."<br>";
				 $unique_id = $pdata->unique_id;
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
			}
			$existing_rel_scb = $dataArray['ExistingRelationship']=="yes" ? 1 : 0; 
			$timestamp = date('Y/m/d H:i:s');
			$product =2;
			
			$p->title =  $mobile." - ".$unique_id;
			$p->mobile = $mobile;
			//$p->full_name=$full_name;
			$p->email = $email;
			$p->product = 2;
			$p->pincode = $pincode;
			$p->unique_id = $unique_id;
			$p->code =$dataArray['datamartid'];
			$p->unique_ref_code =$dataArray['conuniqrefcode'];
			$p->existing_rel_scb = $existing_rel_scb;
			$existing_rel_scb = $existing_rel_scb == "yes" ? 1 : 0; 
			$p->current_yr_audited = $current_yr_audited;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;
			$p->start_of_business = $start_of_business;
			
			if($applicant_description != "Option to best describe applicant"){$p->applicant_description = $applicant_description;}
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;
			/* new fields */
			$pincodes = $pages->find("template=location-master,title={$pincode}");
			if (count($pincodes)) {
				foreach ($pincodes as $pin) {
					$addcity =$pin->city;
					$addstate = $pin->state;
				}}

			$pincodes_off = $pages->find("template=location-master,title={$off_pincode}");
			if (count($pincodes_off)) {
				foreach ($pincodes_off as $pinoff) {
					$offcity =$pinoff->city;
					$offstate = $pinoff->state;
				}}

			$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
				}}

			if($employer_industry != "Employer Industry Segment"){$p->employer_industry = $employer_industry;}
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->person_title = $person_title;
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $argender[$gender];
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3;
			//$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_pincode;
			$p->perma_pincode =$per_pincode;
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->purpose = $purpose;
			//$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			$p->off_lma = $off_lma;
			$p->work_type_new = $arrwork[$work_type];
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			$p->residence_type =$restype;
			$p->work_exp =$WorkExp;
			$p->other_industry =$TypeOfOrg;
			$p->account_number =$salarybank;
			if($OtherDocType=="voterId"){ //voterid
			 $p->voter_id = $OtherDocNo;
			 $p->voter_validity = $OtherDocDate;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="DrivingLicence"){
			 $p->lic = $OtherDocNo;
			 $p->lic_validity = $OtherDocDate;
			 $otherdocumentno =$OtherDocNo;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="Passport"){
				$p->passport = $OtherDocNo;
				$p->passport_validity = $OtherDocDate;
				$otherdocumentno =$OtherDocNo;
				$otherdocumentdate =$OtherDocDate;
				$otherdocumenttype ="T0231";
			}

			$p->address = $add1." ".$add2." ".$add3;
			if($PermAddrSameAsResAddr=="Y" || $PermAddrSameAsResAddr=="y" || $PermAddrSameAsResAddr=="yes"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
				$p->permaddrsameasresaddr =1;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincde =$pincode; 
			$per_pincode =$pincode;
			}else{
				$permanent_pincodes = $pages->find("template=location-master,title={$ppincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
				}
			  }
			  $p->permaddrsameasresaddr =0;
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			
			if($employment_type=="4" || $employment_type=="5" || $employment_type=="6" || $employment_type=="Salaried: SCB Salary A/C" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			//$selfemployeed="T0036"; //income-document-type-1
			//$status ="2";
			//$argender =array("1"=>"Male","2"=>"Female","3"=>"Other Gender");
			$arrwork =array("6"=>"Government","1"=>"Private","3" =>"Public");
			$arrworktype=array("Public Limited"=>"I","Government"=>"G","Private Limited"=>"G","K"=>"Others");
			$apigender=array("1"=>"M","2"=>"F","3" =>"T");
			$postdata =array("leadType"=>"aggregator","conuniqrefcode" =>$conuniqrefcode,"pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"emp_name"=>$emp_name,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"CC","product_type_1"=>"340","promo_code_1"=>"INCC00NA00FFTPSB","education"=>$education,"work_type"=>$arrworktype[$work_type],"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$totexp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$OtherDocNo,"otherdocumentdate"=>$OtherDocDate);
			// echo '<pre>';
			// print_r($postdata);
		
			//die;
			$file = fopen("logs_aggriAPI.txt","a");
			fwrite($file,"Req_Post_".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
			fwrite($file,"\n");
			fclose($file); 
		
			$responseArr =lmsLeadCreationAIPForNTB($postdata);
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
			//PLINPL00NA00ONLINE
			if($responseArr['aipreferencenumber']){
				$status ="1";
				if(!empty($appliationid)){
					$p->application_id =$responseArr['appliationid'];	
				}
				$p->aip_ref_number =$responseArr['aipreferencenumber'];
				$p->stat =$responseArr['aip_status_response'];
				//$p->approved_amount =$responseArr['approved_amount'];
			}
			if(!empty($responseArr['errormsg'])){
				$status="0";
				$errorcode ="108";
				$ErrorInfo ="SYSTEM ERROR FROM";
			}
		  
		  
			 $p->save();
			//  return json_encode(array("status"=>$status,"unique_id" =>$unique_id,"applicationid"=>$responseArr['appliationid'],"aipreferencenumber"=>$responseArr['aipreferencenumber'],"api_msg"=>$responseArr['status']));
			// exit();
			 $arResponse['status'] = $status;
			 $arResponse['id'] = $unique_id;
			 $arResponse['applicationid'] = $responseArr['appliationid'];
			 $arResponse['api_msg'] = $responseArr['api_msg'];
			 $arResponse['ReferenceCode'] = $responseArr['aipreferencenumber'];
			 $arResponse['detail'] =$responseArr['errormsg'];
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
			 // echo json_encode(array("status"=>$status,"unique_id" =>$unique_id,"applicationid"=>$responseArr['appliationid'],"aipreferencenumber"=>$responseArr['aipreferencenumber'],"api_msg"=>$responseArr['status']));
			 
		}
	return $arResponse;

}
// FUNCTION TO MUNG THE XML SO WE DO NOT HAVE TO DEAL WITH NAMESPACE
function mungXML($xml)
{
    $obj = SimpleXML_Load_String($xml);
    if ($obj === FALSE) return $xml;

    // GET NAMESPACES, IF ANY
    $nss = $obj->getNamespaces(TRUE);
    if (empty($nss)) return $xml;

    // CHANGE ns: INTO ns_
    $nsm = array_keys($nss);
    foreach ($nsm as $key)
    {
        // A REGULAR EXPRESSION TO MUNG THE XML
        $rgx
        = '#'               // REGEX DELIMITER
        . '('               // GROUP PATTERN 1
        . '\<'              // LOCATE A LEFT WICKET
        . '/?'              // MAYBE FOLLOWED BY A SLASH
        . preg_quote($key)  // THE NAMESPACE
        . ')'               // END GROUP PATTERN
        . '('               // GROUP PATTERN 2
        . ':{1}'            // A COLON (EXACTLY ONE)
        . ')'               // END GROUP PATTERN
        . '#'               // REGEX DELIMITER
        ;
        // INSERT THE UNDERSCORE INTO THE TAG NAME
        $rep
        = '$1'          // BACKREFERENCE TO GROUP 1
        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
        ;
        // PERFORM THE REPLACEMENT
        $xml =  preg_replace($rgx, $rep, $xml);
    }

    return $xml;

} // End :: mungXML()

function simpleXMLToArray($xml,
				$flattenValues=true,
				$flattenAttributes = true,
				$flattenChildren=true,
				$valueKey='@value',
				$attributesKey='@attributes',
				$childrenKey='@children'){

	$return = array();
	if(!($xml instanceof SimpleXMLElement)){return $return;}
	$name = $xml->getName();
	$_value = trim((string)$xml);
	if(strlen($_value)==0){$_value = null;};

	if($_value!==null){
		if(!$flattenValues){$return[$valueKey] = $_value;}
		else{$return = $_value;}
	}
	$children = array();
	$first = true;
	foreach($xml->children() as $elementName => $child){
		$value = simpleXMLToArray($child, $flattenValues, $flattenAttributes, $flattenChildren, $valueKey, $attributesKey, $childrenKey);
		if(isset($children[$elementName])){
			if($first){
				$temp = $children[$elementName];
				unset($children[$elementName]);
				$children[$elementName][] = $temp;
				$first=false;
			}
			$children[$elementName][] = $value;
		}
		else{
			$children[$elementName] = $value;
		}
	}
	if(count($children)>0){
		if(!$flattenChildren){$return[$childrenKey] = $children;}
		else{$return = array_merge($return,$children);}
	}

	$attributes = array();
	foreach($xml->attributes() as $name=>$value){
		$attributes[$name] = trim($value);
	}
	if(count($attributes)>0){
		if(!$flattenAttributes){$return[$attributesKey] = $attributes;}
		else{$return = array_merge($return, $attributes);}
	}

	return $return;
}

function random_code(){
		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,6));
		$unique_id = $rand . $today;
		return $unique_id;
	}
?>