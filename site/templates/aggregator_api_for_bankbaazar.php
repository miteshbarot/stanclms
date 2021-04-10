<?php
namespace ProcessWire;
libxml_use_internal_errors(TRUE);
error_reporting(1);
ini_set('display_errors','1');
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
include("LeadAPI.php");
include("common_function.php");
// $xmlsoap='<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:personalLoan">
//     <soapenv:Header/>
//     <soapenv:Body>
//         <urn:personalLoan soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
//             <RPRequest xsi:type="urn:RPRequest">
//                 <!--You may enter the following 2 items in any order-->
//                 <Authentication xsi:type="urn:Authentication">
//                     <!--You may enter the following 2 items in any order-->
//                     <UserId xsi:type="xsd:string">Bankbazaar_UAT</UserId>
//                     <Password xsi:type="xsd:string">1f5a2d07c7d0f5f98d71f1c4358d9ee7</Password>
//                 </Authentication>
//                 <PersonalLoan xsi:type="urn:PersonalLoan">
//                     <!--You may enter the following 81 items in any order-->
//                     <Version xsi:type="xsd:int">4</Version>
//                     <ConUniqRefCode xsi:type="xsd:string">109699452372</ConUniqRefCode>
//                     <DataMartId xsi:type="xsd:string">2091307</DataMartId>
//                     <PurposeOfAccOpngPL xsi:type="xsd:string">4</PurposeOfAccOpngPL>
//                     <ExistingRelationship xsi:type="xsd:int"></ExistingRelationship>
//                     <Title xsi:type="xsd:string">MS</Title>
//                     <FirstName xsi:type="xsd:string">TEST A</FirstName>
//                     <MiddleName xsi:type="xsd:string">AA Q</MiddleName>
//                     <LastName xsi:type="xsd:string">TEST A</LastName>
//                     <DOB xsi:type="xsd:string">01-01-1993</DOB>
//                     <Gender xsi:type="xsd:int">2</Gender>
//                     <Qualification xsi:type="xsd:string">GRD</Qualification>
//                     <Occupation xsi:type="xsd:string">94</Occupation>
//                     <NumOfDependents xsi:type="xsd:int">0</NumOfDependents>
//                     <WorkType xsi:type="xsd:string">F</WorkType>
//                     <ResType xsi:type="xsd:string">SO</ResType>
//                     <ResAccoType xsi:type="xsd:int"></ResAccoType>
//                     <ResidentialStatus xsi:type="xsd:string">CT</ResidentialStatus>
//                     <ResAddress1 xsi:type="xsd:string">13B, E/B COLONY</ResAddress1>
//                     <ResAddress2 xsi:type="xsd:string"></ResAddress2>
//                     <ResAddress3 xsi:type="xsd:string"></ResAddress3>
//                     <ResAddress4 xsi:type="xsd:string">VEPPAMPATTU</ResAddress4>
//                     <Landmark xsi:type="xsd:string">87,VEPPAMPATTU</Landmark>
//                     <ResPIN xsi:type="xsd:int">400074</ResPIN>
//                     <ResCity xsi:type="xsd:int">21</ResCity>
//                     <ResPhone xsi:type="xsd:int"></ResPhone>
//                     <PermAddrSameAsResAddr xsi:type="xsd:string">Y</PermAddrSameAsResAddr>
//                     <PermAddress1 xsi:type="xsd:string"></PermAddress1>
//                     <PermAddress2 xsi:type="xsd:string"></PermAddress2>
//                     <PermAddress3 xsi:type="xsd:string"></PermAddress3>
//                     <PermAddress4 xsi:type="xsd:string"></PermAddress4>
//                     <PermCity xsi:type="xsd:int"></PermCity>
//                     <PermPIN xsi:type="xsd:int"></PermPIN>
//                     <Mobile xsi:type="xsd:unsignedLong">9321822780</Mobile>
//                     <Email xsi:type="xsd:string">amit.sawant_29-03@GMAIL.COM</Email>
//                     <PAN xsi:type="xsd:string">TDMPT5557T</PAN>
//                     <EmpType xsi:type="xsd:int">1</EmpType>
//                     <OtherCompanyName xsi:type="xsd:string">ABC Company</OtherCompanyName>
//                     <CompanyCode xsi:type="xsd:string">99999</CompanyCode>
//                     <TypeOfOrg xsi:type="xsd:int">5</TypeOfOrg>
//                     <Profession xsi:type="xsd:int"></Profession>
//                     <WorkExp xsi:type="xsd:int">7</WorkExp>
//                     <Industry xsi:type="xsd:int">45</Industry>
//                     <IndustryIsic xsi:type="xsd:string">RS16</IndustryIsic>
//                     <MonthsCurrentOrg xsi:type="xsd:int">81</MonthsCurrentOrg>
//                     <SalaryBank xsi:type="xsd:int">250</SalaryBank>
//                     <OffAddress1 xsi:type="xsd:string">TCS,FIRST/MAIN ROAD</OffAddress1>
//                     <OffAddress2 xsi:type="xsd:string">SIPCOT</OffAddress2>
//                     <OffAddress3 xsi:type="xsd:string"></OffAddress3>
//                     <OffAddress4 xsi:type="xsd:string"></OffAddress4>
//                     <OffPIN xsi:type="xsd:int">400074</OffPIN>
//                     <OffCity xsi:type="xsd:int">21</OffCity>
//                     <OffPhone xsi:type="xsd:int">22213213</OffPhone>
//                     <OffPhoneExtn xsi:type="xsd:int">21321</OffPhoneExtn>
//                     <OffEmail xsi:type="xsd:string"></OffEmail>
//                     <LoanMailingAddress xsi:type="xsd:string">RES</LoanMailingAddress>
//                     <GMI xsi:type="xsd:unsignedLong">50000</GMI>
//                     <CurrentEMI xsi:type="xsd:unsignedLong"></CurrentEMI>
//                     <TaxITRCurrYr xsi:type="xsd:unsignedLong"></TaxITRCurrYr>
//                     <TaxITRPrevYr xsi:type="xsd:unsignedLong"></TaxITRPrevYr>
//                     <CurrYrGrosTurnOver xsi:type="xsd:unsignedLong"></CurrYrGrosTurnOver>
//                     <CurrYrBusinessIncome xsi:type="xsd:unsignedLong"></CurrYrBusinessIncome>
//                     <CurrYrOtherIncome xsi:type="xsd:unsignedLong"></CurrYrOtherIncome>
//                     <DepreciationPLAcc xsi:type="xsd:unsignedLong"></DepreciationPLAcc>
//                     <LoanAmount xsi:type="xsd:unsignedLong">200000</LoanAmount>
//                     <TenureMonths xsi:type="xsd:int">36</TenureMonths>
//                     <IRR xsi:type="xsd:decimal">14.00</IRR>
//                     <ProcFee xsi:type="xsd:int">1180</ProcFee>
//                     <IncomeProof xsi:type="xsd:string">T0235</IncomeProof>
//                     <OtherDocType xsi:type="xsd:string">voterId</OtherDocType>
//                     <OtherDocNo xsi:type="xsd:string">999999</OtherDocNo>
//                     <OtherDocExpDate xsi:type="xsd:string"></OtherDocExpDate>
//                     <PrevYearTaxableIncome xsi:type="xsd:unsignedLong"></PrevYearTaxableIncome>
//                     <ProfessionalIncome xsi:type="xsd:unsignedLong"></ProfessionalIncome>
//                     <IncomeDepreciation xsi:type="xsd:unsignedLong"></IncomeDepreciation>
//                     <BusinessIncome xsi:type="xsd:unsignedLong"></BusinessIncome>
//                     <DirectorRenumeration xsi:type="xsd:unsignedLong"></DirectorRenumeration>
//                     <OtherIncome xsi:type="xsd:unsignedLong"></OtherIncome>
//                     <MonthlySalesTurnOver xsi:type="xsd:unsignedLong"></MonthlySalesTurnOver>
//                     <SalCreditBankStmnt xsi:type="xsd:unsignedLong"></SalCreditBankStmnt>
//                     <QualifiedIdentifier xsi:type="xsd:int">1</QualifiedIdentifier>
//                     <MonthlyVarBonus xsi:type="xsd:int"></MonthlyVarBonus>
//                 </PersonalLoan>
//             </RPRequest>
//         </urn:personalLoan>
//     </soapenv:Body>
// </soapenv:Envelope>';

// $xmlsoap ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:creditCard"
// xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
// <soapenv:Header />
// <soapenv:Body>
// <urn:creditCard soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
// <RPRequest xsi:type="urn:RPRequest">
// <Authentication xsi:type="urn:Authentication">
// <UserId xsi:type="xsd:string">Bankbazaar_UAT</UserId>
// <Password xsi:type="xsd:string">1f5a2d07c7d0f5f98d71f1c4358d9ee7</Password>
// </Authentication>
// <CreditCard xsi:type="urn:CreditCard">
// <Version xsi:type="xsd:int">4</Version>
// <DataMartId xsi:type="xsd:string">21212</DataMartId>
// <ConUniqRefCode xsi:type="xsd:string">103334343434</ConUniqRefCode>
// <CreditCardApplied xsi:type="xsd:int">13</CreditCardApplied>
// <HasExistingScbCC xsi:type="xsd:string">N</HasExistingScbCC>
// <IsExtngScbCust xsi:type="xsd:string">N</IsExtngScbCust>
// <CustReltnType xsi:type="xsd:int" />
// <Email xsi:type="xsd:string">avsawant2010@gmail.com</Email>
// <Mobile xsi:type="xsd:unsignedLong">9321822774</Mobile>
// <Title xsi:type="xsd:string">MR</Title>
// <FirstName xsi:type="xsd:string">AMIT</FirstName>
// <MiddleName xsi:type="xsd:string">VILAS</MiddleName>
// <LastName xsi:type="xsd:string">SAWANT</LastName>
// <Gender xsi:type="xsd:int">1</Gender>
// <DOB xsi:type="xsd:string">25-12-1985</DOB>
// <Qualification xsi:type="xsd:string">GRD</Qualification>
// <PAN xsi:type="xsd:string">CILPS0818T</PAN>
// <ResType xsi:type="xsd:string">SO</ResType>
// <ResAddress1 xsi:type="xsd:string">2079 AT SHIRECHAPADA SHAHAPUR</ResAddress1>
// <ResAddress2 xsi:type="xsd:string" />
// <ResAddress3 xsi:type="xsd:string" />
// <ResAddress4 xsi:type="xsd:string">ASAN GAON GALA BRUSH COMPANY</ResAddress4>
// <ResCity xsi:type="xsd:int">640</ResCity>
// <ResPIN xsi:type="xsd:unsignedLong">400013</ResPIN>
// <PermAddrSameAsResAddr xsi:type="xsd:string">Y</PermAddrSameAsResAddr>
// <PermAddress1 xsi:type="xsd:string" />
// <PermAddress2 xsi:type="xsd:string" />
// <PermAddress3 xsi:type="xsd:string" />
// <PermAddress4 xsi:type="xsd:string" />
// <PermCity xsi:type="xsd:int" />
// <PermPIN xsi:type="xsd:int" />
// <OfcAddress1 xsi:type="xsd:string">511 RUSTOMJEE ASPIREE</OfcAddress1>
// <OfcAddress2 xsi:type="xsd:string" />
// <OfcAddress3 xsi:type="xsd:string" />
// <OfcAddress4 xsi:type="xsd:string">EVERARD NAGAR SION</OfcAddress4>
// <OfcCity xsi:type="xsd:int">25</OfcCity>
// <OfcPIN xsi:type="xsd:int">400022</OfcPIN>
// <OfcEmail xsi:type="xsd:string" />
// <OfcPhone xsi:type="xsd:int">9321822774</OfcPhone>
// <NumOfDependents xsi:type="xsd:int">3</NumOfDependents>
// <EmpType xsi:type="xsd:int">1</EmpType>
// <SalaryBankAcc xsi:type="xsd:int">999</SalaryBankAcc>
// <AnnIncome xsi:type="xsd:unsignedLong">311448</AnnIncome>
// <GMI xsi:type="xsd:unsignedLong">25954</GMI>
// <WorkType xsi:type="xsd:string">G</WorkType>
// <OtherCompanyName xsi:type="xsd:string">SEW ENGINEERING INDIA PVT LTD</OtherCompanyName>
// <CompanyCode xsi:type="xsd:string">99999</CompanyCode>
// <Occupation xsi:type="xsd:string">95</Occupation>
// <Designation xsi:type="xsd:int">30</Designation>
// <IndustryIsic xsi:type="xsd:string">RS35</IndustryIsic>
// <TotalWorkExp xsi:type="xsd:int">7</TotalWorkExp>
// <IncomeProof xsi:type="xsd:string">T0235</IncomeProof>
// <IncomeProofValue xsi:type="xsd:unsignedLong">100000</IncomeProofValue>
// <ResidentialStatus xsi:type="xsd:string">CT</ResidentialStatus>
// <CardMailingAddress xsi:type="xsd:string">RES</CardMailingAddress>
// <MonthlyVarBonus xsi:type="xsd:int" />
// <OtherDocType xsi:type="xsd:string">voterId</OtherDocType>
// <OtherDocNo xsi:type="xsd:string">999999</OtherDocNo>
// <OtherDocExpDate xsi:type="xsd:string" />
// <PrevYearTaxableIncome xsi:type="xsd:unsignedLong" />
// <ProfessionalIncome xsi:type="xsd:unsignedLong" />
// <BusinessIncome xsi:type="xsd:unsignedLong" />
// <IncomeDepreciation xsi:type="xsd:unsignedLong" />
// <DirectorRenumeration xsi:type="xsd:unsignedLong" />
// <SalCreditBankStmnt xsi:type="xsd:unsignedLong" />
// <OtherIncome xsi:type="xsd:unsignedLong" />
// <MonthlySalesTurnOver xsi:type="xsd:unsignedLong" />
// <QualifiedIdentifier xsi:type="xsd:int">1</QualifiedIdentifier>
// </CreditCard>
// </RPRequest>
// </urn:creditCard>
// </soapenv:Body>
// </soapenv:Envelope>';
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
$sourcetype ="";
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
		            <ResParam1 xsi:type="xsd:string">'.$responseArr['errormsg'].'</ResParam1>
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
 	 $response =aggregatorforPL($finalarrPersonalLoan,$sourcetype);
 	// echo $response;exit();
		 $plxmlsoap ='<?xml version="1.0" encoding="UTF-8"?>
		<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:personalLoan" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
		   <SOAP-ENV:Body>
		      <ns1:personalLoanResponse xmlns:ns1="urn:personalLoan">
		         <return xsi:type="tns:RPResponse">
		            <Status xsi:type="xsd:int">'.$response["status"].'</Status>
		            <ReferenceCode xsi:type="xsd:string">#'.$response["id"].'</ReferenceCode>
		            <ErrorCode xsi:type="xsd:int">'.$response["errorcode"].'</ErrorCode>
		            <ErrorInfo xsi:type="xsd:string">'.$response['ErrorInfo'].'</ErrorInfo>
		            <ResParam1 xsi:type="xsd:string">'.$response['detail'].'</ResParam1>
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
 	 $response =aggregatorforCCnew($finalarrCreditCard,$sourcetype);
 	 //echo $response;exit();
 $ccxmlsoap ='<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:creditCard" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
   <SOAP-ENV:Body>
      <ns1:creditCardResponse xmlns:ns1="urn:creditCard">
         <return xsi:type="tns:RPResponse">
            <Status xsi:type="xsd:int">'.$response["status"].'</Status>
            <ReferenceCode xsi:type="xsd:string">#'.$response["id"].'</ReferenceCode>
            <ErrorCode xsi:type="xsd:int">'.$response["errorcode"].'</ErrorCode>
            <ErrorInfo xsi:type="xsd:string">'.$response['ErrorInfo'].'</ErrorInfo>
            <ResParam1 xsi:type="xsd:string">'.$response['detail'].'</ResParam1>
            <RequestIP xsi:type="xsd:string">103.65.235.254</RequestIP>
         </return>
      </ns1:creditCardResponse>
   </SOAP-ENV:Body>
</SOAP-ENV:Envelope>';
echo $ccxmlsoap;
exit();
 }
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
				$ResParam1 ="Residential pincode does not exist in cms master";
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
			fwrite($file,"Req_PL_xml".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
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

function aggregatorforCCnew($dataArray,$aggritype)
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
	   $fields_error .= "salarybankacc field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcaddress1']))  
	{  
	   $fields_error .= "ofcaddress1 field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcpin']))  
	{  
	   $fields_error .= "ofcpin field cannot be blank!! # ";  
	}
	if(preg_match("/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/", $dataArray['ofcpin'])===0){
		 $fields_error .= "Provide Office Pincode valid one  !! # ";  
	}
	if(empty($dataArray['ofccity']))  
	{  
	   $fields_error .= "ofccity field cannot be blank!! # ";  
	}
	if(empty($dataArray['ofcphone']))  
	{  
	   $fields_error .= "OffPhone field cannot be blank!! # ";  
	}
	if(empty($dataArray['cardmailingaddress']))  
	{  
	   $fields_error .= "MailingAddress field cannot be blank!! # ";  
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
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['totalworkexp']))  
	{  
	   $fields_error .= "Total Work Experience field cannot be blank!! # ";  
	}
	if(($employment_type==1 || $employment_type=="Salaried") && empty($dataArray['salarybankacc']))  
	{  
	   $fields_error .= "Salary Bank field cannot be blank!! # ";  
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

			
			$OtherDocDate=null;$numofdependents=0;
			$person_title= $dataArray['title'];
			$datamartid =$dataArray['datamartid'];
			$conuniqrefcode =$dataArray['conuniqrefcode'];
			$existing_rel_scb =$dataArray['isextngscbcust'];
			$existing_scb_cred =$dataArray['hasexistingscbcc'];
			$creditcardapplied =$dataArray['creditcardapplied'];
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
			// $per_add2 =implode(" ",$dataArray['permaddress2']);
			// $per_add3 =  implode(" ",$dataArray['permaddress3']);//$dataArray['permaddress3'];
			// $per_add4 =implode(" ",$dataArray['permaddress4']);//$dataArray['permaddress4'];
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
			$WorkExp =$dataArray['totalworkexp'];  //Need to add Field in template option
			$Industry =$dataArray['industry'];
			$industryisic =$dataArray['industryisic'];
			$MonthsCurrentOrg =$dataArray['monthscurrentorg']; //Need to add Field in template
			$salarybank =$dataArray['salarybankacc']; //Need to add Field in template
			// $off_add1 =$dataArray['offaddress1'];
			// $off_add2 =$dataArray['offaddress2'];
			// $off_add3 =$dataArray['offaddress3']." ".$dataArray['offaddress4'];
			// $off_city =$dataArray['offcity'];
			// $off_pincode =$dataArray['offpin'];
			// $offcity =$dataArray['offcity'];
			 $off_phone =$dataArray['ofcphone'];

			if(!empty($dataArray['ofcaddress1'])){
			$off_add1 =$dataArray['ofcaddress1'];	
			}
			if(!empty($dataArray['ofcaddress2'])){
			$off_add2 =$dataArray['ofcaddress2'];	
			}
			if(!empty($dataArray['ofcaddress3'])){
			$off_add3 =$dataArray['ofcaddress3'];	
			}
			if(!empty($dataArray['ofcaddress4'])){
			$off_add4 =$dataArray['ofcaddress4'];	
			}
			if(!empty($dataArray['ofccity'])){
			$off_city =$dataArray['ofccity'];	
			}
			if(!empty($dataArray['ofcpin'])){
			$off_pincode =$dataArray['ofcpin'];	
			}
			$off_phoneext=$dataArray['offphoneextn']; //new field
			$off_email =$dataArray['ofcemail']; //new field
			$CardMailingAddress =$dataArray['cardmailingaddress'];
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
			//cc_product
			
			$existing_rel_scb = $dataArray['ExistingRelationship']=="yes" ? 1 : 0; 
			$timestamp = date('Y/m/d H:i:s');
		 //  	$citymaster = $pages->find("template=city_master,code={$addcity}");
			// if (count($citymaster)) {
			// 	foreach ($citymaster as $pin) {
			// 		$addcity =$pin->title;
			// 		$addstate = $pin->state;
			// 	}
			// }
			// $citymaster_off = $pages->find("template=city_master,code={$off_city}");
			// if (count($citymaster_off)) {
			// 	foreach ($citymaster_off as $pinoff) {
			// 		$offcity =$pinoff->title;
			// 		$offstate = $pinoff->state;
			// 	}
			// }

			// $initiatedbycity = $pages->find("template=Initiated_city_code,title={$addcity}");
			// if (count($initiatedbycity)) {
			// 	foreach ($initiatedbycity as $incode) {
			// 		$initiatedby =$incode->code;
			// 		//$addstate = $incode->state;
			// 	}
			// }

			// if(count($citymaster) < 0 || count($citymaster_off) < 0){
			// 	$status ="0";
			// 	$errorcode ="101";
			// 	$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
			// 	$ResParam1 ="Residential pincode does not exist in cms master!!";
			// 	$arResponse['detail'] =$ResParam1;
			// 	$errflag =2;
			// }

			// $pincodes = $pages->find("template=cc_location_master,title={$pincode}");
			// if (count($pincodes)) {
			// 	foreach ($pincodes as $pin) {
			// 		$addcity =$pin->city;
			// 		$addstate = $pin->state;
			// 	}
			// }else{
			// 	//error
			// 	$status ="0";
			// 	$errorcode ="101";
			// 	$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
			// 	$ResParam1 ="Residential pincode does not exist in cms master";
			// 	$arResponse['detail'] =$ResParam1;
			// 	$errflag =2;
			// }
			// $pincodes_off = $pages->find("template=cc_location_master,title={$off_pincode}");
			// if (count($pincodes_off)) {
			// 	foreach ($pincodes_off as $pinoff) {
			// 		$offcity =$pinoff->city;
			// 		$offstate = $pinoff->state;
			// 	}
			// }else{
			// 	//error
			// 	$status ="0";
			// 	$errorcode ="101";
			// 	$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
			// 	$ResParam1 ="Office pincode does not exist in cms master";
			// 	$arResponse['detail'] =$ResParam1;
			// 	$errflag =2;
			// }

			$initiatedbyres="";
			$initiatedbyoff="";
			$initiatedby="";
			$PincodeM = getmasterPincodes('CC');
			if(!empty($PincodeM[$pincode]['city'])){
				$addstate = $PincodeM[$pincode]['state'];
				$addcity = $PincodeM[$pincode]['city'];
				$initiatedbyres = $PincodeM[$pincode]['initiated_by'];
			}else{
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Residential pincode does not exist in cms master";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}
			if(!empty($PincodeM[$off_pincode]['city'])){
				$offcity = $PincodeM[$off_pincode]['city'];
				$offstate = $PincodeM[$off_pincode]['state'];
				$initiatedbyoff = $PincodeM[$off_pincode]['initiated_by'];
			}else{
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Office pincode does not exist in cms master";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			 }
			$initiatedby = $initiatedbyres;
			if($initiatedbyres =="" && $initiatedbyoff!=""){
				$initiatedby =$initiatedbyoff;
			}
		

		  if($mobile!="" && $pan!=""){
		  	$formLeads = $pages->find("template=aggregator_lead_template,mobile={$mobile},pan={$pan},product=2,sort=-published,limit=1");
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
					$ccuniqueid =$unique_id;
					$errflag =2;
				  }
			 	}
		   }

		   	if($creditcardapplied=="3"){
				$status ="0";
				$errorcode ="101";
				$ErrorInfo ="INPUT OUT OF MASTERS RANGE";
				$ResParam1 ="Card applied is Invalid";
				$arResponse['detail'] =$ResParam1;
				$errflag =2;
			}
			else if($creditcardapplied=="7"){
				$cc_product ="28237";
				$product_type_1 ="175"; //emirate
			}
			else if($creditcardapplied=="9"){
				$cc_product ="28233";
				$product_type_1 ="233";//maha
			}
			else if($creditcardapplied=="10"){
				$cc_product ="28235";
				$product_type_1 ="292";
			}
			else if($creditcardapplied=="13"){
				$cc_product ="28239";
				$product_type_1 ="535"; //
			}
			else if($creditcardapplied=="31"){
				$cc_product ="28231";//digi
				$product_type_1 ="528";
			}
			else if($creditcardapplied=="25"){
				$cc_product ="28229";//ultimo
				$product_type_1 ="199";
			}

		if($errflag==1){
			//echo $datamartid." f".$conuniqrefcode;die;
		     	$formLeads = $pages->find("template=aggregator_lead_template,code={$datamartid},unique_ref_code={$conuniqrefcode},mobile={$mobile},product=2,sort=-published,limit=1");
			 	if (count($formLeads)) {
				foreach($formLeads  as $pdata1){
				//echo $pdata->unique_id."<br>";die;
					$unique_id = $pdata1->unique_id;
					$ccuniqueid =$unique_id;
					$aip_ref_number =$pdata1->aip_ref_number;
					// $status ="0";
					// $errorcode ="104";
					// $ErrorInfo ="DUPLICATE APPLICATION";

				}
				if($aip_ref_number!=""){
					$status ="0";
					$errorcode ="104";
					$ErrorInfo ="DUPLICATE APPLICATION";
					$ccuniqueid =$unique_id;
				  }	
				 // echo "un".$unique_id."BR ";
				  //echo $ccuniqueid;die;
				$p = $pages->get("unique_id=$unique_id");
				$p->of(false);
			}else{
				$p = new Page();
				$p->of(false);
				$p->template = "aggregator_lead_template";
				$p->parent = $pages->get(30171);
				$unique_id = random_code();
				$ccuniqueid ="CC".$unique_id;
				$p->unique_id =$ccuniqueid;
				
			}
			// $p = new Page();
			// $p->of(false);
			// $p->template = "aggregator_lead_template";
			// $p->parent = $pages->get(30171);
			//$arrpersonalttile=array("MR"=>"1","MRS"=>"2");
			$p->title =  $mobile." - ".$unique_id;
			$p->mobile = $mobile;
			//$p->full_name=$full_name;
			$existing_rel_scb =$existing_rel_scb == "Y" ? 1 : 0;
			$existing_scb_cred =$existing_scb_cred == "Y" ? 1 : 0; 
			$p->existing_rel_scb = $existing_rel_scb;
			$p->existing_scb_cred = $existing_scb_cred;
			$p->email = $email;
			$p->product = 2;
			$p->pincode = $pincode;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
	
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			/* new fields */
			// $pincodes = $pages->find("template=location-master,title={$pincode}");
			// if (count($pincodes)) {
			// 	foreach ($pincodes as $pin) {
			// 		$addcity =$pin->city;
			// 		$addstate = $pin->state;
			// 	}}

			// $pincodes_off = $pages->find("template=location-master,title={$off_pincode}");
			// if (count($pincodes_off)) {
			// 	foreach ($pincodes_off as $pinoff) {
			// 		$offcity =$pinoff->city;
			// 		$offstate = $pinoff->state;
			// 	}}

			// $permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			// if (count($permanent_pincodes)) {
			// 	foreach ($permanent_pincodes as $pins) {
			// 		$per_city =$pins->city;
			// 		$per_state = $pins->state;
			// 	}}

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
			//$p->address = $add1." ".$add2." ".$add3;
			$p->address = $add1." ".$add2." ".$add3." ".$addcity." ".$addstate;
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
			$p->perma_pincode =$pincode; 
			$per_pincode =$pincode;
			$p->PermAddrSameAsResAddr =1;
			}else{
				$permanent_pincodes = $pages->find("template=cc_location_master,title={$per_pincode}");
			// if (count($permanent_pincodes)) {
			// 	foreach ($permanent_pincodes as $pins) {
			// 		$per_city =$pins->city;
			// 		$per_state = $pins->state;

			// 	}
			//   }
				if(!empty($PincodeM[$per_pincode]['city'])){
				$per_city = $PincodeM[$per_pincode]['city'];
				$per_state = $PincodeM[$per_pincode]['state'];
			   }
			  $p->PermAddrSameAsResAddr =0;
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			$p->perma_pincode =$per_pincode; 
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->purpose_opt = $purpose;
			//$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->citycode = $offcity;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			
			$arrworktype=array("F"=>"1","G"=>"2","I"=>"3","J"=>"4","k"=>"5","L"=>"6","Y"=>"7","P"=>"8");
			//$worktype = $arrworktype[$work_type]; //get value of 1/2/3
			$p->work_type_new = $arrworktype[$work_type];//passkey
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
			//$p->banks =$salarybank;
			if($CardMailingAddress=="RES"){
				$lmaddrss ="1";
			}else if($CardMailingAddress=="PER"){
				$lmaddrss ="2";
			}else if($CardMailingAddress=="OFF"){
				$lmaddrss ="3";
			}
			$p->mailing_address_opt = $lmaddrss;
			$p->montlybonus =$dataArray['monthlyvarbonus']; 
			
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
			$arrworktype=array("Public Limited"=>"I","Government"=>"G","Private Limited"=>"G","K"=>"Others");
			if($employment_type=="4" || $employment_type=="5" || $employment_type=="6" || $employment_type=="Salaried: SCB Salary A/C" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			//$selfemployeed="T0036"; //income-document-type-1
			
			$promo_code_1="INCC000000FFONLN";
			$QualifiedIdentifier = $dataArray['qualifiedidentifier'];
			if($QualifiedIdentifier=="1"){
				$promo_code_1 ="IN00CC00PAISABZR";
			}

			// if($creditcardapplied=="3"){
			// 	$cc_product ="28241"; //visa
			// 	$product_type_1 ="340";
			// }
			// else if($creditcardapplied=="7"){
			// 	$cc_product ="28237";
			// 	$product_type_1 ="175"; //emirate
			// }
			// else if($creditcardapplied=="9"){
			// 	$cc_product ="28233";
			// 	$product_type_1 ="233";//maha
			// }
			// else if($creditcardapplied=="10"){
			// 	$cc_product ="28235";
			// 	$product_type_1 ="292";
			// }
			// else if($creditcardapplied=="13"){
			// 	$cc_product ="28239";
			// 	$product_type_1 ="535"; //
			// }
			// else if($creditcardapplied=="31"){
			// 	$cc_product ="28231";//digi
			// 	$product_type_1 ="528";
			// }
			// else if($creditcardapplied=="25"){
			// 	$cc_product ="28229";//ultimo
			// 	$product_type_1 ="199";
			// }
			$p->cc_product = $pages->get("id={$cc_product}");
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
			$p->org_code =$initiatedby;
			$restype=array("SO"=>"1","RE"=>"2","LR"=>"3","BA"=>"4","LO"=>"5","CO"=>"6");
			$p->residence_type =$restype[$dataArray['restype']];
			$arrpersonalttile=array("MR"=>"1","MRS"=>"2","MS"=>"3","PRF"=>"4","DR"=>"5");
			$p->person_title_opt =$arrpersonalttile[$dataArray['title']];
			$apigender=array("1"=>"M","2"=>"F","3"=>"T");
			$tenure =null;
			$loan_amount=null;
			$postdata =array("leadType"=>"agg_CC","conuniqrefcode" =>$conuniqrefcode,"pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"CC","product_type_1"=>$product_type_1,"promo_code_1"=>$promo_code_1,"education"=>$education,"work_type"=>$work_type,"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$WorkExp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$OtherDocNo,"otherdocumentdate"=>$OtherDocDate,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"restype"=>$dataArray['restype'],"personal_title"=>$dataArray['title'],'occupation'=>$occupation,"numofdependents"=>$numofdependents,"industryisic"=>$industryisic,"sourceid"=>$datamartid,"initiatedby" =>$initiatedby,"off_phone"=>$off_phone);
			//echo '<pre>';
			//print_r($postdata);
			//die;
			
			$file = fopen("logs/logs_aggriAPI_08.txt","a");
			fwrite($file,"Req_CC_xml".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
			fwrite($file,"\n");
			fclose($file); 
		
			$responseArr =lmsLeadCreationAIPPersonalLoanCCForNTB($postdata);
			//PLINPL00NA00ONLINE
			//echo print_r($responseArr);
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
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
					$ResParam1 =$responseArr['errormsg'];
					
				} 
			} 
			 $p->save();
		}
			 if($errorcode=="104"){$status="0";}
			 $arResponse['status'] = $status;
			 $arResponse['id'] = $ccuniqueid;
			 $arResponse['applicationid'] = $responseArr['appliationid'];
			 $arResponse['api_msg'] = $responseArr['api_msg'];
			 $arResponse['ReferenceCode'] = $responseArr['aipreferencenumber'];
			 $arResponse['detail'] =$ResParam1;
			 //$arResponse['detail'] =$responseArr['errormsg'];
			 $arResponse['ErrorInfo'] =$ErrorInfo;
			 $arResponse['errorcode'] =$errorcode;
			 //print_r($arResponse);die;
		}
		return $arResponse;
}

function getmasterPincodes($ptype){
 $arpins =array();
 if($ptype=="CC"){
    $sql1 ="SELECT * FROM pincode_master_cc";
  }
    $result = wire('db')->query($sql1); 
    $i=0;
    while($row = $result->fetch_array()) {
       $pincode =$row['pincode'];
      $arpins[$pincode]['city'] =$row['city'];
      $arpins[$pincode]['state'] =$row['state'];
      $arpins[$pincode]['initiated_by'] =$row['initiated_by'];
    }
    return $arpins;
}
