<?php
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
//$curl = curl_init();

//HTTP username.
$username = '0c50b727-0933-4be8-b469-53094f5f43f5';
//HTTP password.
$password = '4a91119d-4236-4172-ad8b-db7175fa16a2';
//echo base64_encode("$username:$password");
//Create the headers array.
$headers = array(
     'cache-control: no-cache',
    'Content-Type: application/json',
    'Authorization: Basic '. base64_encode("$username:$password")
);
$arrData =array();
$postdata =array("pid"=>"28272","unique_id"=>"CC00000023","person_title"=>"Mr","fname"=>"test","mname" =>"","lname" =>"Anumallaa","dob"=>"23/08/1989",'mobile'=>"9999876511","off_phone"=>"9999699996","gender"=>"1","email"=>"ramat@gmail.com","pan"=>"ATAPB9066A","aadhar_no"=>"123412341234","add1"=>"test addre","add2"=>"worli","add3"=>"","pincode"=>"560081","city"=>"Bangalore","state"=>"KARNATAKA","off_add1"=>"TDMPM8523M Office Line1","off_add2" =>"TDMPM8523M Office Line1","off_add3"=>"TDMPM8523M Office Line1","off_phone"=>"","off_state"=>"KARNATAKA","off_pincode"=>"560081","work_type"=>"","education" =>"PRE","monthlyincome"=>"40000","product-category-1"=>"PL","product-type-1"=>"6025","pl_company"=>"ROSA POWER SUPPLY COMPANY LIMITED","pl_company_code"=>"B3629","gross_income"=>"100000");


$finalappicantid = lmsLeadCreationAIPForNTB($postdata);
echo $finalappicantid;

function lmsLeadCreationAIPForNTB($pval){
  $applicationId="";
  $dob_dd=trim($pval['dob']);
  $date_dob = DateTime::createFromFormat("d/m/Y" , $dob_dd);
  $fullname =$pval['fname'].' '.$pval['lname'];
  $newdob = $date_dob->format('Y-m-d');
  $todayDate =date("Y-m-d H:i:s");
  $gender =$pval['gender']=='1'?"F":"M";
  /*$dataArr= array(
    "data" => array(
        "type"=>"applications",
        "id"=>"#".$pval['unique_id'],
        "attributes" => array( 
            "application_records" =>array(
                "application-id"=>null,
                "channel-transaction-id"=>"#".$pval['unique_id'],
                "title"=>$pval['person_title'],
                "first-name"=>$pval['fname'],
                "middle-name"=>"",
                "last-name"=>$pval['lname'],
                "full-name"=>trim($fullname),
                "date-of-birth"=>$newdob."T00:00:00.000Z",
                "mobile-number-country-code"=>"+91",
                "mobile-number"=>$pval['mobile'],
                "office-number-country-code"=>"+91",
                "office-number"=>$pval['off_phone'],
                "gender"=>$gender,
                "email-id"=>$pval['email'],
                "unique-id-1"=>"",
                "unique-id-2"=>"TDMPR3677R",
                "country"=>"IN",
                "applicant-city"=>"Mumbai",
                "source-type"=>"rp_Aggregator1",
                "source"=>"REFERRAL",
                "source-instance"=>"SCB Referral Dummy",
                "initiated-date"=>$todayDate,
                "expiry-date"=>$todayDate,
                "expected-close-date"=>$todayDate,
                "product-category-1"=>$pval['product-category-1'],
                "product-type-1"=>$pval['product-type-1'],
                "campaign-name"=>"Campaign_NTB",
                "campaign-id"=>"Campaign_NTB",
                "application-disposition-status"=>"Not Attempted",
                "reason"=>"Submitted",
                "promo-id-1"=>"INPL00NA00ONLINE",
                "initiated-by"=>"",
                "stage-id"=>"AIP"
            ),
             "aip_records"=> array(
                "sourcing-id"=>"1133440",
                "referral-id"=>"1133440",
                "title"=>$pval['person_title'],
                "first-name"=>$pval['fname'],
                "middle-name"=>$pval['mname'],
                "last-name"=>$pval['mname'],
                "full-name"=>trim($fullname),
                "alias-type"=>null,
                "alias-name"=>null,
                "date-of-birth"=>$newdob."T00:00:00.000Z",
                "off-home-contact-identifier"=>null,
                "country-of-birth"=>"IN",
                "country-of-residence"=>"IN",
                "nationality"=>"IND",
                "gender"=>"M",
                "primary-document-number"=>null, //"R0002", //"R0002", // R0002-pan, R0001-adhar or id
                "pan-no"=>$pval['pan'],
                "aadhaar-no"=>null, //$pval['aadhar_no'],
                "other-document-category"=>null,
                "other-document-type"=>"T0231", //"Passport",
                "other-document-number"=>"A2096457",
                "other-document-expiry-date"=>"2023-11-18",
                "res-address-type"=>"0",
                "res-address-line-1"=>$pval['add1'],
                "res-address-line-2"=>$pval['add1'],
                "res-address-line-3"=>$pval['add1'],
                "res-address-line-4"=>null,
                "res-city"=>$pval["city"],
                "res-state"=>$pval['state'],
                "res-country"=>"IN",
                "res-postal-code"=>$pval['pincode'],
                "per-add-same-as-res"=>null,
                "res-residence-type"=>"SO",
                "per-address-type"=>null,
                "per-address-line-1"=>$pval['add1'],
                "per-address-line-2"=>$pval['add2'],
                "per-address-line-3"=>$pval['add1'],
                "per-address-line-4"=>null,
                "per-city"=>"Ahmedabad",
                "per-state"=>"Gujarat",
                "per-country"=>"IN",
                "per-postal-code"=>"380019",
                "off-address-type"=>null,
                "off-address-line-1"=>$pval['off_add1'],
                "off-address-line-2"=>$pval['off_add2'],
                "off-address-line-3"=>$pval['off_add3'],
                "off-address-line-4"=>null,
                "off-city"=>$pval['city'],
                "off-state"=>$pval['off_state'],
                "off-country"=>"IN",
                "off-postal-code"=>$pval['off_pincode'],
                "residential-status"=>"CT",
                "assessment-type"=>"I",
                "surrogate-on"=>"",
                "financial-institute"=>null,
                "requested-amount"=>null,
                "requested-tenor"=>null,
                "top-up-amount"=>null,
                "top-up-ac-number"=>null,
                "top-up-currency"=>null,
                "top-up-type"=>null,
                "purpose-of-account-opening"=>null,
                "bureau-consent-flag"=>"Y",
                "rel-id"=>null,
                "dedupe-performed"=>"F",
                "no-of-dependents"=>"02",
                "educational-qualification"=>"PRF",
                "work-type"=>"G",
                "isic"=>"RS20",
                "occupation"=>"11",
                "company-name"=>$pval['pl_company'],
                "company-code"=>$pval['pl_company_code'],
                "other-company-name"=>null,
                "salary-mode"=>"FT",
                "total-work-experience"=>"0303",
                "annual-declared-income"=>"1500000",
                "annual-declared-income-currency"=>null,
                "income-document-type-1"=>"T0235",
                "income-director-remuneration-1"=>null,
                "income-director-remuneration-2"=>null,
                "income-director-remuneration-3"=>null,
                "income-monthly-commission-1"=>null,
                "income-monthly-commission-2"=>null,
                "income-monthly-commission-3"=>null,
                "income-depreciation-1"=>null,
                "income-depreciation-2"=>null,
                "income-depreciation-3"=>null,
                "income-other-1"=>null,
                "income-other-2"=>null,
                "income-other-3"=>null,
                "income-hl-loan-limit-1"=>null,
                "income-hl-loan-limit-2"=>null,
                "income-hl-loan-limit-3"=>null,
                "income-hl-loan-commitment-1"=>null,
                "income-hl-loan-commitment-2"=>null,
                "income-hl-loan-commitment-3"=>null,
                "income-monthly-variable-bonus-1"=>null,
                "income-monthly-variable-bonus-2"=>null,
                "income-monthly-variable-bonus-3"=>null,
                "income-monthly-sales-turnover-amount-1"=>null,
                "income-monthly-sales-turnover-amount-2"=>null,
                "income-monthly-sales-turnover-amount-3"=>null,
                "income-monthly-allowance-1"=>null,
                "income-monthly-allowance-2"=>null,
                "income-monthly-allowance-3"=>null,
                "income-card-limit-amount-1"=>null,
                "income-card-limit-amount-2"=>null,
                "income-card-limit-amount-3"=>null,
                "income-basic-monthly-salary-1"=>$pval['gross_income'],
                "income-basic-monthly-salary-2"=>null,
                "income-basic-monthly-salary-3"=>null,
                "income-professional-1"=>null,
                "income-professional-2"=>null,
                "income-professional-3"=>null,
                "income-business-1"=>null,
                "income-business-2"=>null,
                "income-business-3"=>null,
                "income-salary-credit-1"=>null,
                "income-salary-credit-2"=>null,
                "income-salary-credit-3"=>null,
                "income-per-tax-file-1"=>null,
                "income-per-tax-file-2"=>null,
                "income-per-tax-file-3"=>null,
                "income-monthly-bonus-1"=>null,
                "income-monthly-bonus-2"=>null,
                "income-monthly-bonus-3"=>null,
                "mobile-number"=>$pval['mobile'],
                "country-code"=>"+91"
                
            )
        )
    )
);*/

$dataArr  = [
   "data" => [
         "type" => "applications", 
         "id" => "#CC00000027", 
         "attributes" => [
            "application_records" => [
               "application-id" => null, 
               "channel-transaction-id" => "#CC00000027", 
               "title" => "", 
               "first-name" => "RamaTest", 
               "middle-name" => "", 
               "last-name" => "TDMHinzberg", 
               "full-name" => "RamaTest AlibabaCC", 
               "date-of-birth" => "1980-03-23T00:00:00.000Z", 
               "mobile-number-country-code" => "+91", 
               "mobile-number" => "9962422327", 
               "office-number-country-code" => "+91", 
               "office-number" => "9962422327", 
               "gender" => "", 
               "email-id" => "a1111.a@gmail.com", 
               "unique-id-1" => "", 
               "unique-id-2" => "TDMPR3677R", 
               "country" => "IN", 
               "applicant-city" => "Mumbai", 
               "source-type" => "rp_Aggregator1", 
               "source" => "REFERRAL", 
               "source-instance" => "SCB Referral Dummy", 
               "initiated-date" => "2020-11-18T22:55:38.000Z", 
               "expiry-date" => "2020-12-30T00:00:00.000Z", 
               "expected-close-date" => "2020-12-30T00:00:00.000Z", 
               "product-category-1" => "CC", 
               "product-type-1" => "340", 
               "campaign-name" => "Campaign_NTB", 
               "campaign-id" => "Campaign_NTB", 
               "application-disposition-status" => "Not Attempted", 
               "reason" => "Submitted", 
               "promo-id-1" => "INCC00NA00FFTPSB", 
               "initiated-by" => "", 
               "stage-id" => "AIP" 
            ], 
            "aip_records" => [
                  "sourcing-id" => "1133430", 
                  "referral-id" => "1133430", 
                  "title" => "Mr", 
                  "first-name" => "RamaTest", 
                  "middle-name" => "", 
                  "last-name" => "TDMHinzberg", 
                  "full-name" => "RamaTest AlibabaCC", 
                  "alias-type" => null, 
                  "alias-name" => null, 
                  "date-of-birth" => "1980-03-23T00:00:00.000Z", 
                  "off-home-contact-identifier" => null, 
                  "country-of-birth" => "IN", 
                  "country-of-residence" => "IN", 
                  "nationality" => "IND", 
                  "gender" => "F", 
                  "primary-document-number" => null, 
                  "pan-no" => "TDMPM8430M", 
                  "aadhaar-no" => "", 
                  "other-document-category" => null, 
                  "other-document-type" => "T0098", 
                  "other-document-number" => "MH1420110062821", 
                  "other-document-expiry-date" =>null, 
                  "res-address-type" => "0", 
                  "res-address-line-1" => "TDMPM8523M Res Line1", 
                  "res-address-line-2" => "TDMPM8523M Res Line2", 
                  "res-address-line-3" => "TDMPM8523M Res Line3", 
                  "res-address-line-4" => null, 
                  "res-city" => "Bangalore", 
                  "res-state" => "KARNATAKA", 
                  "res-country" => "IN", 
                  "res-postal-code" => "560081", 
                  "per-add-same-as-res" => null, 
                  "res-residence-type" => "SO", 
                  "per-address-type" => null, 
                  "per-address-line-1" => "TDMPJ4556J Res Line1", 
                  "per-address-line-2" => "TDMPJ4556J Res Line2", 
                  "per-address-line-3" => "TDMPJ4556J Res Line3", 
                  "per-address-line-4" => null, 
                  "per-city" => "Ahmedabad", 
                  "per-state" => "Gujarat", 
                  "per-country" => "IN", 
                  "per-postal-code" => "380019", 
                  "off-address-type" => null, 
                  "off-address-line-1" => "TDMPM8523M Office Line1", 
                  "off-address-line-2" => "TDMPM8523M Office Line2", 
                  "off-address-line-3" => "TDMPM8523M Office Line3", 
                  "off-address-line-4" => null, 
                  "off-city" => "Bangalore", 
                  "off-state" => "KARNATAKA", 
                  "off-country" => "IN", 
                  "off-postal-code" => "560081", 
                  "residential-status" => "CT", 
                  "assessment-type" => "I", 
                  "surrogate-on" => "", 
                  "financial-institute" => null, 
                  "requested-amount" => null, 
                  "requested-tenor" => null, 
                  "top-up-amount" => null, 
                  "top-up-ac-number" => null, 
                  "top-up-currency" => null, 
                  "top-up-type" => null, 
                  "purpose-of-account-opening" => null, 
                  "bureau-consent-flag" => "Y", 
                  "rel-id" => null, 
                  "dedupe-performed" => "F", 
                  "no-of-dependents" => "02", 
                  "educational-qualification" => "PRF", 
                  "work-type" => "G", 
                  "isic" => "RS20", 
                  "occupation" => "11", 
                  "company-name" => "ROSA POWER SUPPLY COMPANY LIMITED", 
                  "company-code" => "B3629", 
                  "other-company-name" => null, 
                  "salary-mode" => "FT", 
                  "total-work-experience" => "0303", 
                  "annual-declared-income" => "1500000", 
                  "annual-declared-income-currency" => null, 
                  "income-document-type-1" => "T0235", 
                  "income-director-remuneration-1" => null, 
                  "income-director-remuneration-2" => null, 
                  "income-director-remuneration-3" => null, 
                  "income-monthly-commission-1" => null, 
                  "income-monthly-commission-2" => null, 
                  "income-monthly-commission-3" => null, 
                  "income-depreciation-1" => null, 
                  "income-depreciation-2" => null, 
                  "income-depreciation-3" => null, 
                  "income-other-1" => null, 
                  "income-other-2" => null, 
                  "income-other-3" => null, 
                  "income-hl-loan-limit-1" => null, 
                  "income-hl-loan-limit-2" => null, 
                  "income-hl-loan-limit-3" => null, 
                  "income-hl-loan-commitment-1" => null, 
                  "income-hl-loan-commitment-2" => null, 
                  "income-hl-loan-commitment-3" => null, 
                  "income-monthly-variable-bonus-1" => null, 
                  "income-monthly-variable-bonus-2" => null, 
                  "income-monthly-variable-bonus-3" => null, 
                  "income-monthly-sales-turnover-amount-1" => null, 
                  "income-monthly-sales-turnover-amount-2" => null, 
                  "income-monthly-sales-turnover-amount-3" => null, 
                  "income-monthly-allowance-1" => null, 
                  "income-monthly-allowance-2" => null, 
                  "income-monthly-allowance-3" => null, 
                  "income-card-limit-amount-1" => null, 
                  "income-card-limit-amount-2" => null, 
                  "income-card-limit-amount-3" => null, 
                  "income-basic-monthly-salary-1" => "100000", 
                  "income-basic-monthly-salary-2" => null, 
                  "income-basic-monthly-salary-3" => null, 
                  "income-professional-1" => null, 
                  "income-professional-2" => null, 
                  "income-professional-3" => null, 
                  "income-business-1" => null, 
                  "income-business-2" => null, 
                  "income-business-3" => null, 
                  "income-salary-credit-1" => null, 
                  "income-salary-credit-2" => null, 
                  "income-salary-credit-3" => null, 
                  "income-per-tax-file-1" => null, 
                  "income-per-tax-file-2" => null, 
                  "income-per-tax-file-3" => null, 
                  "income-monthly-bonus-1" => null, 
                  "income-monthly-bonus-2" => null, 
                  "income-monthly-bonus-3" => null, 
                  "mobile-number" => "9962422326", 
                  "country-code" => "+91" 
               ] 
         ] 
      ] 
]; 
echo "<pre>";
 //print_r($dataArr);
  //HTTP username.
  $username = '0c50b727-0933-4be8-b469-53094f5f43f5';
  //HTTP password. 
  $password = '4a91119d-4236-4172-ad8b-db7175fa16a2';
  //Create the headers array.
  $headers = array(
       'cache-control: no-cache',
      'Content-Type: application/json',
      'Authorization: Basic '. base64_encode("$username:$password")
  );
 
  $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
  $curl = curl_init("https://uat.sc.com/developer/api/v3/applications");
 echo  $_postJson =json_encode($dataArr);
  $unique_id ="#".$pval['unique_id'];
/* $_postJson ='{
    "data": {
        "type": "applications",
        "id": "#CC00000024",
        "attributes": {
            "application_records": {
                "application-id": null,
                "channel-transaction-id": "#CC00000024",
                "title": "",
                "first-name": "Test",
                "middle-name": "",
                "last-name": "TDMHinzberg",
                "full-name": "Ten AlibabaCC",
                "date-of-birth": "1980-03-23T00:00:00.000Z",
                "mobile-number-country-code": "+91",
                "mobile-number": "9962422326",
                "office-number-country-code": "+91",
                "office-number": "9962422326",
                "gender": "",
                "email-id": "a11.a@gmail.com",
                "unique-id-1": "",
                "unique-id-2": "TDMPR3677R",
                "country": "IN",
                "applicant-city": "Mumbai",
                "source-type": "rp_Aggregator1",
                "source": "REFERRAL",
                "source-instance": "SCB Referral Dummy",
                "initiated-date": "2020-11-18T22:55:38.000Z",
                "expiry-date": "2020-12-30T00:00:00.000Z",
                "expected-close-date": "2020-12-30T00:00:00.000Z",
                "product-category-1": "CC",
                "product-type-1": "340",
                "campaign-name": "Campaign_NTB",
                "campaign-id": "Campaign_NTB",
                "application-disposition-status": "Not Attempted",
                "reason": "Submitted",
                "promo-id-1": "INCC00NA00FFTPSB",
                "initiated-by": "",
                "stage-id": "AIP"
            },
            "aip_records": {
                "sourcing-id": "1133430",
                "referral-id": "1133430",
                "title": "Mr",
                "first-name": "TDMJanina",
                "middle-name": "",
                "last-name": "TDMHinzberg",
                "full-name": "Ten AlibabaCC",
                "alias-type": null,
                "alias-name": null,
                "date-of-birth": "1980-03-23T00:00:00.000Z",
                "off-home-contact-identifier": null,
                "country-of-birth": "IN",
                "country-of-residence": "IN",
                "nationality": "IND",
                "gender": "M",
                "primary-document-number": null,
                "pan-no": "TDMPM8430M",
                "aadhaar-no": "",
                "other-document-category": null,
                "other-document-type": "T0231",
                "other-document-number": "23423333333",
                "other-document-expiry-date": "2020-11-18",
                "res-address-type": "0",
                "res-address-line-1": "TDMPM8523M Res Line1",
                "res-address-line-2": "TDMPM8523M Res Line2",
                "res-address-line-3": "TDMPM8523M Res Line3",
                "res-address-line-4": null,
                "res-city": "Bangalore",
                "res-state": "KARNATAKA",
                "res-country": "IN",
                "res-postal-code": "560081",
                "per-add-same-as-res": null,
                "res-residence-type": "SO",
                "per-address-type": null,
                "per-address-line-1": "TDMPJ4556J Res Line1",
                "per-address-line-2": "TDMPJ4556J Res Line2",
                "per-address-line-3": "TDMPJ4556J Res Line3",
                "per-address-line-4": null,
                "per-city": "Ahmedabad",
                "per-state": "Gujarat",
                "per-country": "IN",
                "per-postal-code": "380019",
                "off-address-type": null,
                "off-address-line-1": "TDMPM8523M Office Line1",
                "off-address-line-2": "TDMPM8523M Office Line2",
                "off-address-line-3": "TDMPM8523M Office Line3",
                "off-address-line-4": null,
                "off-city": "Bangalore",
                "off-state": "KARNATAKA",
                "off-country": "IN",
                "off-postal-code": "560081",
                "residential-status": "CT",
                "assessment-type": "I",
                "surrogate-on": "",
                "financial-institute": null,
                "requested-amount": null,
                "requested-tenor": null,
                "top-up-amount": null,
                "top-up-ac-number": null,
                "top-up-currency": null,
                "top-up-type": null,
                "purpose-of-account-opening": null,
                "bureau-consent-flag": "Y",
                "rel-id": null,
                "dedupe-performed": "F",
                "no-of-dependents": "02",
                "educational-qualification": "PRF",
                "work-type": "G",
                "isic": "RS20",
                "occupation": "11",
                "company-name": "ROSA POWER SUPPLY COMPANY LIMITED",
                "company-code": "B3629",
                "other-company-name": null,
                "salary-mode": "FT",
                "total-work-experience": "0303",
                "annual-declared-income": "1500000",
                "annual-declared-income-currency": null,
                "income-document-type-1": "T0235",
                "income-director-remuneration-1": null,
                "income-director-remuneration-2": null,
                "income-director-remuneration-3": null,
                "income-monthly-commission-1": null,
                "income-monthly-commission-2": null,
                "income-monthly-commission-3": null,
                "income-depreciation-1": null,
                "income-depreciation-2": null,
                "income-depreciation-3": null,
                "income-other-1": null,
                "income-other-2": null,
                "income-other-3": null,
                "income-hl-loan-limit-1": null,
                "income-hl-loan-limit-2": null,
                "income-hl-loan-limit-3": null,
                "income-hl-loan-commitment-1": null,
                "income-hl-loan-commitment-2": null,
                "income-hl-loan-commitment-3": null,
                "income-monthly-variable-bonus-1": null,
                "income-monthly-variable-bonus-2": null,
                "income-monthly-variable-bonus-3": null,
                "income-monthly-sales-turnover-amount-1": null,
                "income-monthly-sales-turnover-amount-2": null,
                "income-monthly-sales-turnover-amount-3": null,
                "income-monthly-allowance-1": null,
                "income-monthly-allowance-2": null,
                "income-monthly-allowance-3": null,
                "income-card-limit-amount-1": null,
                "income-card-limit-amount-2": null,
                "income-card-limit-amount-3": null,
                "income-basic-monthly-salary-1": "100000",
                "income-basic-monthly-salary-2": null,
                "income-basic-monthly-salary-3": null,
                "income-professional-1": null,
                "income-professional-2": null,
                "income-professional-3": null,
                "income-business-1": null,
                "income-business-2": null,
                "income-business-3": null,
                "income-salary-credit-1": null,
                "income-salary-credit-2": null,
                "income-salary-credit-3": null,
                "income-per-tax-file-1": null,
                "income-per-tax-file-2": null,
                "income-per-tax-file-3": null,
                "income-monthly-bonus-1": null,
                "income-monthly-bonus-2": null,
                "income-monthly-bonus-3": null,
                "mobile-number": "9962422326",
                "country-code": "+91"
                
            }
        }
    }
}*/
  //echo $postJson ="'".$_postJson."'";
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_postJson);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #=>" . $err;
  } else {
    //echo $response;
    $responsejson =json_decode($response,true);
    echo '<pre>';
    echo $applicationId =$responsejson['data']['attributes']['response']['application-id'];
    print_r($responsejson);
  }
// return $applicationId;
}
function lmsLeadCreationAPI($pdata){
  $dob_dd=trim($pdata['dob']);
  $date_dob = DateTime::createFromFormat("d/m/Y" , $dob_dd);
  $fullname =$pdata['fname'].' '.$pdata['mname'].' '.$pdata['lname']="Ramtest Anumalla";
  $newdob = $date_dob->format('Y-m-d');
  $todayDate =date("Y-m-d H:i:s");
  $arrData['data']['type']="applications";
  $arrData['data']['id']="#".$pdata['unique_id'];
  $arrData['data']['attributes']['application_records']['application-id'] ="null";
  $arrData['data']['attributes']['application_records']['channel-transaction-id'] ="#".$pdata['unique_id'];
  $arrData['data']['attributes']['application_records']['title'] ="";
  $arrData['data']['attributes']['application_records']['first-name']=$pdata['fname'];
  $arrData['data']['attributes']['application_records']['middle-name']=$pdata['mname'];
  $arrData['data']['attributes']['application_records']['last-name']=$pdata['lname'];
  $arrData['data']['attributes']['application_records']['full-name']=trim($fullname);
  ;
  $arrData['data']['attributes']['application_records']['date-of-birth']=$newdob;
  $arrData['data']['attributes']['application_records']['mobile-number-country-code']="+91";
  $arrData['data']['attributes']['application_records']['mobile-number']=$pdata['mobile'];
  $arrData['data']['attributes']['application_records']['office-number-country-code']="+91";
  $arrData['data']['attributes']['application_records']['office-number']=$pdata['off_phone'];
  $arrData['data']['attributes']['application_records']['gender']=$pdata['gender'];
  $arrData['data']['attributes']['application_records']['email-id']=$pdata['emailid'];
  $arrData['data']['attributes']['application_records']['unique-id-1']="";
  $arrData['data']['attributes']['application_records']['unique-id-2']="";
  $arrData['data']['attributes']['application_records']['country']="IN";
  $arrData['data']['attributes']['application_records']['applicant-city']="Mumbai";
  $arrData['data']['attributes']['application_records']['source-type']="rp_Aggregator1";
  $arrData['data']['attributes']['application_records']['source']="REFERRAL";
  $arrData['data']['attributes']['application_records']['source-instance']="SCB Referral Dummy";
  $arrData['data']['attributes']['application_records']['initiated-date']=$todayDate;
  $arrData['data']['attributes']['application_records']['expiry-date']=$todayDate;
  $arrData['data']['attributes']['application_records']['expected-close-date']=$todayDate;
  $arrData['data']['attributes']['application_records']['product-category-1']="CC";
  $arrData['data']['attributes']['application_records']['product-type-1']="340";
  $arrData['data']['attributes']['application_records']['campaign-name']="Campaign_NTB";
  $arrData['data']['attributes']['application_records']['campaign-id']="Campaign_NTB";
  $arrData['data']['attributes']['application_records']['application-disposition-status']="Not Attempted";
  $arrData['data']['attributes']['application_records']['reason']="Submitted";
  $arrData['data']['attributes']['application_records']['promo-id-1']="INCC00NA00FFTPSB";
  $arrData['data']['attributes']['application_records']['initiated-by']="";
  $arrData['data']['attributes']['application_records']['stage-id']="";

  echo '<pre> IN functionDD';
  print_r($arrData);
  die;
  print_r($arrData);
  //HTTP username.
  $username = '0c50b727-0933-4be8-b469-53094f5f43f5';
  //HTTP password.
  $password = '4a91119d-4236-4172-ad8b-db7175fa16a2';
  //Create the headers array.
  $headers = array(
       'cache-control: no-cache',
      'Content-Type: application/json',
      'Authorization: Basic '. base64_encode("$username:$password")
  );
  print_r($headers);
  $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
  $curl = curl_init("https://uat.sc.com/developer/api/v3/applications");
  $_postJson =json_encode($arrData);
  echo $postJson ="'".$_postJson."'";
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_postJson);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #=>" . $err;
  } else {
    //echo $response;
    $responsejson =json_decode($response,true);
    echo '<pre>';
    echo $responsejson['data']['attributes']['response']['application-id'];
    print_r($responsejson);
  }

} 