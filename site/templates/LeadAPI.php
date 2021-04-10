<?php

function lmsLeadCreationAIPPersonalLoanCCForNTB($pval){
  $applicationId="";
  $annual_declared_income=$newdob=$restype="";
  $duplicateflag="N";
  $status="";
  $initiatedby="";
  $numofdependents=0;
  $work_type="G";
  $occupation="11";
  $restype="SO";
  $residentialstatus="CT"; //citizen
  $industryisic ="9998"; //others
  $loan_amount=$tenure =null;
  $todayDate =date("Y-m-d");
  $todaytime =date("H:i:s");
  $initiated_date=$todayDate."T".$todaytime."Z";
  $expiry_date =date('Y-m-d',strtotime("+30 days"));
  $expiry_datefinal =$expiry_date."T".$todaytime."Z";
  if($pval['sourceid']!=""){
   $sourceId =$pval['sourceid'];
  }else{
    $sourceId ="2092944";
  }
  //$sourceId = mt_rand(1000000,9999999);
  $dob_dd=trim($pval['dob']);
  $leadtype =$pval['leadType'];
  //$dob_dd ="12/12/1990";
  if($dob_dd){
    $dob_dd =str_replace("-","/",$dob_dd);
  	$date_dob = DateTime::createFromFormat("d/m/Y" , $dob_dd);
    $newdob = $date_dob->format('Y-m-d');
	}
  $arr =array();
  $otherdocumentdate=null;
  $total_exp ="0000";
  $fname = $pval['fname'];
  $lname =$pval['lname'];
  $fullname =$fname." ".$lname;
  $todayDate =date("Y-m-d H:i:s");
  $gender =$pval['gender'];
  $unique_id =$pval['unique_id'];
  $unique_id ="#".$pval['unique_id'];
  $mobile =$pval['mobile'];
  $email =$pval['email'];
  $annual_declared_income = $pval['monthly_income']*12;
    if($pval['restype']){
  $restype = $pval['restype'];
  }
  if($pval['tenure']!=""){
  $tenure =$pval['tenure'];
  }else{
     $tenure ="0";
  }
  $numofdependents =$pval['numofdependents'];
  $numofdependents = sprintf("%02d", $numofdependents);
  $loan_amount =$pval['loan_amount'];
  $total_exp =$pval['total_exp'];
  $company_name =$pval['company_name'];
  $company_code =$pval['company_code'];
  $otherdocumenttype =$pval['otherdocumenttype'];
  $otherdocumentno =$pval["otherdocumentno"];
  $otherdocumentdate =$pval["otherdocumentdate"];
  $total_exp = sprintf("%02d", $total_exp);
  if($pval['work_type']){
    $work_type =$pval['work_type'];
  }
  if($pval['occupation']!=""){
  $occupation =$pval['occupation'];
  }
  if($pval['restype']){
    $restype =$pval['restype'];
  }
   if($pval['industryisic']){
    $industryisic =$pval['industryisic'];
  }
  $personal_title =$pval['personal_title'];
  $finalexp =$total_exp.$total_exp;
 if($pval['initiatedby']!=""){
  $initiatedby =$pval['initiatedby'];
 }
 if($pval['off_phone']!=""){
  $off_phone =$off_phone;
 }

$dataArr  = [
   "data" => [
         "type" => "applications", 
         "id" => $unique_id, 
         "attributes" => [
            "application_records" => [
               "application-id" => null, 
               "channel-transaction-id" =>$unique_id, 
               "title" => $personal_title, 
               "first-name" =>$fname, 
               "middle-name" => "", 
               "last-name" => $lname, 
               "full-name" => $fullname, 
               "date-of-birth" => $newdob."T00:00:00.000Z", 
               "mobile-number-country-code" => "+91", 
               "mobile-number" => $mobile, 
               "office-number-country-code" => "+91", 
               "office-number" => $off_phone, 
               "gender" =>$gender, 
               "email-id" =>$email, 
               "unique-id-1" => "", 
               "unique-id-2" => $pval['pan_no'], 
               "country" => "IN", 
               "applicant-city" => $pval['res_city'], 
               "source-type" => "rp_Aggregator1", 
               "source" => "REFERRAL", 
               "source-instance" => "SCB Referral Dummy", 
               "initiated-date" => $initiated_date, 
               "expiry-date" => $expiry_datefinal, 
               "expected-close-date" => $expiry_datefinal, 
               "product-category-1" => $pval['product_category_1'], 
               "product-type-1" => $pval['product_type_1'], 
               "campaign-name" => "Campaign_NTB", 
               "campaign-id" => "Campaign_NTB", 
               "application-disposition-status" => "Not Attempted", 
               "reason" => "Submitted", 
               "promo-id-1" =>$pval['promo_code_1'], 
               "initiated-by" => $initiatedby, 
               "stage-id" => "AIP" 
            ], 
            "aip_records" => [
                  "sourcing-id" => $sourceId, 
                  "referral-id" =>$sourceId, 
                  "title" => $personal_title, 
                  "first-name" => $fname, 
                  "middle-name" => "", 
                  "last-name" => $lname, 
                  "full-name" => $fullname, 
                  "alias-type" => null, 
                  "alias-name" => null, 
                  "date-of-birth" => $newdob."T00:00:00.000Z",
                  "off-home-contact-identifier" => null, 
                  "country-of-birth" => "IN", 
                  "country-of-residence" => "IN", 
                  "nationality" => "IND", 
                  "gender" =>$gender, 
                  "primary-document-number" => null, 
                  "pan-no" => $pval['pan_no'], 
                  "aadhaar-no" => "", 
                  "other-document-category" => null, 
                  "other-document-type" => $otherdocumenttype, //"T0098", 
                  "other-document-number" =>$otherdocumentno, //"MH1420110062821", 
                  "other-document-expiry-date" =>$otherdocumentdate, 
                  "res-address-type" => "0", 
                  "res-address-line-1" => $pval['res_add1'], 
                  "res-address-line-2" => $pval['res_add2'], 
                  "res-address-line-3" => $pval['res_add3'], 
                  "res-address-line-4" => null, 
                  "res-city" =>$pval['res_city'], 
                  "res-state" => strtoupper($pval['res_state']), 
                  "res-country" => "IN", 
                  "res-postal-code" => $pval['res_pincode'], 
                  "per-add-same-as-res" => null, 
                  "res-residence-type" => $restype, 
                  "per-address-type" => null, 
                  "per-address-line-1" => $pval['per_add1'], 
                  "per-address-line-2" => $pval['per_add2'], 
                  "per-address-line-3" => $pval['per_add3'], 
                  "per-address-line-4" => null, 
                  "per-city" => $pval['per_city'], 
                  "per-state" =>$pval['per_state'], 
                  "per-country" => "IN", 
                  "per-postal-code" => $pval['per_pincode'], 
                  "off-address-type" => null, 
                  "off-address-line-1" => $pval['off_add1'], 
                  "off-address-line-2" => $pval['off_add2'], 
                  "off-address-line-3" =>$pval['off_add3'], 
                  "off-address-line-4" => null, 
                  "off-city" =>$pval['off_city'], 
                  "off-state" => $pval['off_state'], 
                  "off-country" => "IN", 
                  "off-postal-code" => $pval['off_pincode'], 
                  "residential-status" => $residentialstatus, //CT
                  "assessment-type" => "I", 
                  "surrogate-on" => "", 
                  "financial-institute" => null, 
                  "requested-amount" => $loan_amount, 
                  "requested-tenor" => $tenure, 
                  "top-up-amount" => null, 
                  "top-up-ac-number" => null, 
                  "top-up-currency" => null, 
                  "top-up-type" => null, 
                  "purpose-of-account-opening" => null, 
                  "bureau-consent-flag" => "Y", 
                  "rel-id" => null, 
                  "dedupe-performed" => "F", 
                  "no-of-dependents" => $numofdependents, 
                  "educational-qualification" =>$pval['education'], //"PRF", 
                  "work-type" => $work_type, 
                  "isic" => "$industryisic", 
                  "occupation" => $occupation, 
                  "company-name" => $company_name, 
                  "company-code" => $company_code, 
                  "other-company-name" => null, 
                  "salary-mode" => "FT", 
                  "total-work-experience" => "$finalexp", 
                  "annual-declared-income" =>$annual_declared_income, //"1500000", 
                  "annual-declared-income-currency" => null, 
                  "income-document-type-1" => $pval['income_document_type_1'], 
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
                  "income-basic-monthly-salary-1" =>$pval['monthly_income'], 
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
                  "mobile-number" => $mobile, 
                  "country-code" => "+91" 
               ] 
         ] 
      ] 
]; 
 // echo "<pre>";
  // print_r($dataArr);die;
$_postJson =json_encode($dataArr);
$url ="https://www.sc.com/developer/api/v3/applications";
if($leadtype =="agg_PL" || $leadtype=="agg_CC"){
$file = fopen("logs/logs_g_07-04-21.txt","a");
}else{
$file = fopen("logs/logs_07-04-2021.txt","a");
}
fwrite($file,"Req_".date("Y-m-d h:i:s").' : '.$url."::".$_postJson."\n");
fwrite($file,"\n");
  //HTTP username.
  $username = 'c97b972a-623c-4246-926b-e02e9549fdad'; //api key
  //HTTP password.  
  $password = '0aae3c10-7c19-41aa-a3de-a4afb67059e9'; //scr
  //Create the headers array.
  $headers = array(
       'cache-control: no-cache',
      'Content-Type: application/json',
      'Authorization: Basic '. base64_encode("$username:$password")
  );

  $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
  
  //$curl = curl_init("https://uat.sc.com/developer/api/v3/applications");
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_postJson);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);

fwrite($file,"Res_".date("Y-m-d h:i:s").' : '.json_encode($response)."\n");
fwrite($file,"\n");
fclose($file); 
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    //  "cURL Error #=>" . $err;
    echo $status =$err;
  } else {
    $responsejson =json_decode($response,true);
    // echo "<pre>";
    // print_r($responsejson);
    // echo $responsejson['data']['attributes']['response']['aip-error'];
   // echo $responsejson['data']['attributes']['response']['aip-reference-number'];
      if($responsejson['data']['attributes']['response']['aip-reference-number']){
       $applicationId =$responsejson['data']['attributes']['response']['application-id'];
       $aipreferencenumber =$responsejson['data']['attributes']['response']['aip-reference-number'];
       $aip_response_status =$responsejson['data']['attributes']['response']['aip-status-response'];
       $duplicateflag =$responsejson['data']['attributes']['response']['duplicate-flag'];
       $approved_amount =$responsejson['data']['attributes']['response']['approved-amount'];    
    }
     if($responsejson['data']['attributes']['response']['aip-error']){
      $errormsg = $responsejson['data']['attributes']['response']['aip-error'];
    }
    if($responsejson['errors'][0]['title']){
       $errormsg = $responsejson['errors'][0]['title']."# ".$responsejson['errors'][0]['status'];
    }
    //print_r($responsejson);
  }
  $arr['appliationid'] =$applicationId;
  $arr['duplicateflag'] =$duplicateflag;
  $arr['status'] =$status;
  $arr['errormsg'] =$errormsg;
  $arr['aipreferencenumber'] =$aipreferencenumber;
  $arr['aip_status_response'] =$aip_response_status;
  $arr['approved_amount'] =$approved_amount;
  return $arr;
}


function lmsLeadCreationAIPForNTB($pval){
  $applicationId="";
  $annual_declared_income="";
  $duplicateflag="N";
  $status="";
  $todayDate =date("Y-m-d");
  $todaytime =date("H:i:s");
  $initiated_date=$todayDate."T".$todaytime."Z";
  $expiry_date =date('Y-m-d',strtotime("+30 days"));
  $expiry_datefinal =$expiry_date."T".$todaytime."Z";
  $sourceId =mt_rand(1000000,9999999);
  $dob_dd=trim($pval['dob']);
  if($dob_dd){
    $date_dob = DateTime::createFromFormat("d/m/Y" , $dob_dd);
    $newdob = $date_dob->format('Y-m-d');
  }
  $otherdocumentdate=null;
  $fname = $pval['fname'];
  $lname =$pval['lname'];
  $fullname =$fname." ".$lname;
  $todayDate =date("Y-m-d H:i:s");
  $gender =$pval['gender'];
  $unique_id =$pval['unique_id'];
  $unique_id ="#".$pval['unique_id'];
  $mobile =$pval['mobile'];
  $email =$pval['email'];
  $annual_declared_income = $pval['monthly_income']*12;
  $total_exp =$pval['total_exp'];
  $company_name =$pval['company_name'];
  $company_code =$pval['company_code'];
  $otherdocumenttype =$pval['otherdocumenttype'];
  $otherdocumentno =$pval["otherdocumentno"];
  $otherdocumentdate =$pval["otherdocumentdate"];

$dataArr  = [
   "data" => [
         "type" => "applications", 
         "id" => $unique_id, 
         "attributes" => [
            "application_records" => [
               "application-id" => null, 
               "channel-transaction-id" =>$unique_id, 
               "title" => "", 
               "first-name" =>$fname, 
               "middle-name" => "", 
               "last-name" => $lname, 
               "full-name" => $fullname, 
               "date-of-birth" => $newdob."T00:00:00.000Z", 
               "mobile-number-country-code" => "+91", 
               "mobile-number" => $mobile, 
               "office-number-country-code" => "+91", 
               "office-number" => "9962422327", 
               "gender" =>$gender, 
               "email-id" =>$email, 
               "unique-id-1" => "", 
               "unique-id-2" => $pval['pan_no'], 
               "country" => "IN", 
               "applicant-city" => $pval['res_city'], 
               "source-type" => "rp_Aggregator1", 
               "source" => "REFERRAL", 
               "source-instance" => "SCB Referral Dummy", 
               "initiated-date" => $initiated_date, 
               "expiry-date" => $expiry_datefinal, 
               "expected-close-date" => $expiry_datefinal, 
               "product-category-1" => $pval['product_category_1'], 
               "product-type-1" => $pval['product_type_1'], 
               "campaign-name" => "Campaign_NTB", 
               "campaign-id" => "Campaign_NTB", 
               "application-disposition-status" => "Not Attempted", 
               "reason" => "Submitted", 
               "promo-id-1" =>$pval['promo_code_1'], 
               "initiated-by" => "", 
               "stage-id" => "AIP" 
            ], 
            "aip_records" => [
                  "sourcing-id" => $sourceId, 
                  "referral-id" =>$sourceId, 
                  "title" => "Mr", 
                  "first-name" => $fname, 
                  "middle-name" => "", 
                  "last-name" => $lname, 
                  "full-name" => $fullname, 
                  "alias-type" => null, 
                  "alias-name" => null, 
                  "date-of-birth" => $newdob."T00:00:00.000Z",
                  "off-home-contact-identifier" => null, 
                  "country-of-birth" => "IN", 
                  "country-of-residence" => "IN", 
                  "nationality" => "IND", 
                  "gender" =>$gender, 
                  "primary-document-number" => null, 
                  "pan-no" => $pval['pan_no'], 
                  "aadhaar-no" => "", 
                   "other-document-category" => null, 
                  "other-document-type" =>$otherdocumenttype, //"T0098", 
                  "other-document-number" =>$otherdocumentno, //"MH1420110062821", 
                  "other-document-expiry-date" =>$otherdocumentdate, 
                  "res-address-type" => "0", 
                  "res-address-line-1" => $pval['res_add1'], 
                  "res-address-line-2" => $pval['res_add2'], 
                  "res-address-line-3" => $pval['res_add3'], 
                  "res-address-line-4" => null, 
                  "res-city" =>$pval['res_city'], 
                  "res-state" => strtoupper($pval['res_state']), 
                  "res-country" => "IN", 
                  "res-postal-code" => $pval['res_pincode'], 
                  "per-add-same-as-res" => null, 
                  "res-residence-type" => "SO", 
                  "per-address-type" => null, 
                  "per-address-line-1" => $pval['per_add1'], 
                  "per-address-line-2" => $pval['per_add2'], 
                  "per-address-line-3" => $pval['per_add3'], 
                  "per-address-line-4" => null, 
                  "per-city" => $pval['per_city'], 
                  "per-state" =>$pval['per_state'], 
                  "per-country" => "IN", 
                  "per-postal-code" => $pval['per_pincode'],  
                  "off-address-type" => null, 
                  "off-address-line-1" => $pval['off_add1'], 
                  "off-address-line-2" => $pval['off_add2'], 
                  "off-address-line-3" => $pval['off_add3'], 
                  "off-address-line-4" => null, 
                  "off-city" =>$pval['off_city'], 
                  "off-state" => $pval['off_state'], 
                  "off-country" => "IN", 
                  "off-postal-code" => $pval['off_pincode'],  
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
                  "educational-qualification" =>$pval['education'], //"PRF", 
                  "work-type" => "G", 
                  "isic" => "RS20", 
                  "occupation" => "11", 
                  "company-name" => $company_name, 
                  "company-code" => $company_code, 
                  "other-company-name" => null, 
                  "salary-mode" => "FT", 
                  "total-work-experience" => "$total_exp",  //yymm 0303
                  "annual-declared-income" =>$annual_declared_income, //"1500000", 
                  "annual-declared-income-currency" => null, 
                  "income-document-type-1" => $pval['income_document_type_1'], 
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
                  "income-basic-monthly-salary-1" =>$pval['monthly_income'], 
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
                  "mobile-number" => $mobile, 
                  "country-code" => "+91" 
               ] 
         ] 
      ] 
]; 
// echo "<pre>";
//  print_r($dataArr);die;
 $_postJson =json_encode($dataArr);
$file = fopen("logs.txt","a");
fwrite($file,"Req_".date("Y-m-d h:i:s").' : '.$_postJson."\n");
fwrite($file,"\n");
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
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_postJson);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
fwrite($file,"Res_".date("Y-m-d h:i:s").' : '.json_encode($response)."\n");
fwrite($file,"\n");
fclose($file); 
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    //  "cURL Error #=>" . $err;
    $status =$err;
  } else {
    //echo $response;
   
    $responsejson =json_decode($response,true);
    // echo "<pre>";
    // print_r($responsejson);
    // echo $responsejson['data']['attributes']['response']['aip-error'];
   // echo $responsejson['data']['attributes']['response']['aip-reference-number'];
      if($responsejson['data']['attributes']['response']['aip-reference-number']){
       $applicationId =$responsejson['data']['attributes']['response']['application-id'];
       $aipreferencenumber =$responsejson['data']['attributes']['response']['aip-reference-number'];
       $aip_response_status =$responsejson['data']['attributes']['response']['aip-status-response'];
       $duplicateflag =$responsejson['data']['attributes']['response']['duplicate-flag'];
       $approved_amount =$responsejson['data']['attributes']['response']['approved-amount'];    
    }
    if($responsejson['data']['attributes']['response']['aip-error']){
      $errormsg = $responsejson['data']['attributes']['response']['aip-error'];
    }
     if($responsejson['errors'][0]['title']){
       $errormsg = $responsejson['errors'][0]['title']."# ".$responsejson['errors'][0]['status'];
    }
    //print_r($responsejson);
  }
   $arr['appliationid'] =$applicationId;
  $arr['duplicateflag'] =$duplicateflag;
  $arr['status'] =$status;
  $arr['errormsg'] =$errormsg;
  $arr['aipreferencenumber'] =$aipreferencenumber;
  $arr['aip_status_response'] =$aip_response_status;
  $arr['approved_amount'] =$approved_amount;
  return $arr;
}
function lmsLeadCreationShortFormETBJourney($pval){
  $applicationId=$annual_declared_income=$status=$errcode="";
  $todayDate =date("Y-m-d");
  $todaytime =date("H:i:s");
  $initiated_date=$todayDate."T".$todaytime."Z";
  $expiry_date =date('Y-m-d',strtotime("+30 days"));
  $expiry_datefinal =$expiry_date."T".$todaytime."Z";
  $sourceId =mt_rand(1000000,9999999);
  $dob_dd=trim($pval['dob']);
  if($dob_dd){
    $date_dob = DateTime::createFromFormat("d/m/Y" , $dob_dd);
    $newdob = $date_dob->format('Y-m-d');
  }
  $fname = $pval['fname'];
  $lname =$pval['lname'];
  if($pval['full_name']){
      $fullname =$pval['full_name'];
      $fullname_a =explode(" ", $fullname);
      $fname =$fullname_a[0];
      $lname =$fullname_a[1];
  }else{
    $fullname =$fname." ".$lname;
  }

  $todayDate =date("Y-m-d H:i:s");
  $gender =$pval['gender'];
  $mobile =$pval['mobile'];
  $email =$pval['email'];
  $annual_declared_income = $pval['monthly_income']*12;
  $unique_id =$pval['unique_id'];
  $unique_id ="#".$pval['unique_id'];
$dataArr  = [
   "data" => [
         "type" => "applications", 
         "id" => $unique_id, 
         "attributes" => [
            "application_records" => [
               "application-id" => null, 
               "channel-transaction-id" =>$unique_id, 
               "title" => "", 
               "first-name" =>$fname, 
               "middle-name" => "", 
               "last-name" => $lname, 
               "full-name" => $fullname, 
               "date-of-birth" => $newdob."T00:00:00.000Z", 
               "mobile-number-country-code" => "+91", 
               "mobile-number" => $mobile, 
               "office-number-country-code" => "+91", 
               "office-number" => "9962422327", 
               "gender" =>$gender, 
               "email-id" =>$email, 
               "unique-id-1" => "", 
               "unique-id-2" => "TDMPR3677R", 
               "country" => "IN", 
               "applicant-city" => $pval['res_city'], 
               "source-type" => "rp_Aggregator1", 
               "source" => "REFERRAL", 
               "source-instance" => "SCB Referral Dummy", 
               "initiated-date" => $initiated_date, 
               "expiry-date" => $expiry_datefinal, 
               "expected-close-date" => $expiry_datefinal, 
               "product-category-1" => $pval['product_category_1'], 
               "product-type-1" => $pval['product_type_1'], 
               "campaign-name" => "Campaign_NTB", 
               "campaign-id" => "Campaign_NTB", 
               "application-disposition-status" => "Not Attempted", 
               "reason" => "Submitted", 
               "promo-id-1" =>$pval['promo_code_1'], 
               "initiated-by" => "", 
               "stage-id" => "" 
            ] 
         ] 
      ] 
]; 
 // echo "<pre>";
 // print_r($dataArr);
 $_postJson =json_encode($dataArr);
$file = fopen("logs/logsetb_03-04-2021.txt","a");
fwrite($file,"Req_".date("Y-m-d h:i:s").' : '.$_postJson."\n");
fwrite($file,"\n");
  //HTTP username.
  $username = 'c97b972a-623c-4246-926b-e02e9549fdad';
  //HTTP password. 
  $password = '0aae3c10-7c19-41aa-a3de-a4afb67059e9';

  //Create the headers array.
  $headers = array(
       'cache-control: no-cache',
      'Content-Type: application/json',
      'Authorization: Basic '. base64_encode("$username:$password")
  );

  $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
  $curl = curl_init("https://www.sc.com/developer/api/v3/applications");
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
  curl_setopt($curl, CURLOPT_POSTFIELDS, $_postJson);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_TIMEOUT, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
fwrite($file,"Res_".date("Y-m-d h:i:s").' : '.json_encode($response)."\n");
fwrite($file,"\n");
fclose($file); 
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    //  "cURL Error #=>" . $err;
    $status =$err;
  } else {
    //echo $response;
   
    $responsejson =json_decode($response,true);
    // echo "<pre>";
    // print_r($responsejson);
   // echo $responsejson['data']['attributes']['response']['aip-reference-number'];
    if($responsejson['data']['attributes']['response']['application-id']){
       $applicationId =$responsejson['data']['attributes']['response']['application-id'];
       //$aipreferencenumber =$responsejson['data']['attributes']['response']['aip-reference-number'];
       $status =$responsejson['data']['attributes']['response']['etb-flag'];
       $approved_amount =$responsejson['data']['attributes']['response']['approved-amount'];
       
    }else if($responsejson['errors']){
      $status = $responsejson['errors']['0']['detail'];
      $errcode =$responsejson['errors']['0']['status'];
    }
    //print_r($responsejson);
  }
  $arr['errorcode'] =$errcode;
  $arr['status'] =$status;
  $arr['appliationid'] =$applicationId;

  return $arr;
}


/*
Array
(
    [data] => Array
        (
            [type] => applications
            [attributes] => Array
                (
                    [applicationIds] => Array
                        (
                        )

                    [response] => Array
                        (
                            [base-spread-percent] => 0.0
                            [apr-percent] => 0.0
                            [aip-status-response] => APPROVE
                            [etb-flag] => N
                            [approved-amount] => 500000
                            [aip-reference-number] => IN20210322700079
                            [effective-rate-percent] => 0.0
                            [approved-amount-currency] => INR
                            [prime-rate-percent] => 
                            [risk-based-pricing-percent] => 0.0
                            [base-rate-percent] => 0.0
                            [channel-transaction-id] => #W34343
                            [monthly-instalment] => 20800.0
                            [approved-tenor] => 24
                            [waived-risk-based-pricing-percent] => 
                            [monthly-instalment-currency] => INR
                            [application-id] => 9071cd41-a9d5-4bb4-bf8c-360fd3fff367
                        )

                )

            [relationships] => Array
                (
                )

            [links] => Array
                (
                    [self] => /retail/api/v3/applications/null
                )

        )

)
*/
?>