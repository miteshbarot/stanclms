<?php
namespace ProcessWire; 
use \DateTime;
use \DateInterval;
ini_set("display_errors", "1");
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
// /usr/bin/wget  https://response.badabusiness.com/admin-widgets/export_data/?param=open one time daily
// die;

$startdate =date('Y-m-d',strtotime("-4 days"));
$enddate =date("Y-m-d");
$param2 = $param3 ="";
$param =$_GET['param']; //open 
if($_GET['start']){
   $startdate =$_GET['start']; 
}

if($_GET['end']){
   $enddate =$_GET['end']; 
}
//print_r($_GET);die;
 $product ="";
if(($startdate!="" && $enddate!="")){
$now = strtotime($enddate); // or your date as well
$your_date = strtotime($startdate);
$datediff = $now - $your_date;
$totdays =  round($datediff / (60 * 60 * 24));
  if($totdays >4){
    echo "Day should not be more than 4 days"; die;
  }
}

    switch ($param) {
        case "pl":
            $product =1;
            getallqueriesByStatus($product,$startdate,$enddate);

        break;
        case "cc":
            $product =2;
            getallqueriesByStatus($product,$startdate,$enddate);
        break;
         case "nri":
            $product =3;
            getallqueriesByStatusNRI($product,$startdate,$enddate,$user);

        break;
          case "bb":
            $product =4;
             getallqueriesByStatus($param,$startdate,$enddate);

        break;
 
        default:
            break;
      }



function getallqueriesByStatusNRI($product,$startdate,$enddate,$user){
$pages = wire('pages');
//echo $product;
$start = strtotime($startdate . " 00:00:00");
$end = strtotime($enddate . " 23:59:59");

//$formLeads = $pages->find("template=lead_template, published>=$start, published<=$end,product=$product,sort=-created");
/* User Central or Superuser */
//echo $this->user;
if ($user->hasRole('central') || $user->hasRole('superuser')) {
    $formLeads = $pages->findMany("template=lead_template,product=3,published>=$start,published<=$end,sort=-created");
  }
/* User TL */
$tl_cities = "";
foreach ($user->tl_cities as $city) {
  $tl_cities .= $city->title."|";
}
$tl_cities = rtrim($tl_cities, "|");

if ($user->hasRole('tl')) {
//   echo "TL";
//   echo  $user->hasRole('tl');
// echo "<pre>"; 
// print_r($user);
// die;
  //Chandigarh|Udaipur|New Delhi|Noida|Jaipur|Jalandhar|Jodhpur|Kanpur|Kolkata|Lucknow|Ludhiana|Mathura|Saharanpur|Dehradun|Gurgaon|Allahabad|Amritsar|Bairelly|Agra
  //echo $tl_cities;
      $formLeads = $pages->findMany("template=lead_template,product=3,city=$tl_cities,published>=$start,published<=$end,sort=-created");
    }

  /* User RM */
  if ($user->hasRole('rm')) {
    $formLeads = $pages->findMany("template=lead_template,product=3,city=$tl_cities,published>=$start,published<=$end,sort=-created");
  }


if(count($formLeads) >0){
    
    $fname ="sale_".$product."_".$startdate."_".$enddate."_".time().".csv";
       $headers =array("SrNo","Reference Code","product","CITY","Country","fname","mname","lname","gender","DOB","Alt contact","email","mobile","NRI Product Interested","Accoun Number","Do you exist SCB","Do you exist SCB Debit/Credit card","Do you exist SCB Debit ","Do you exist SCB Credit","Employer_type","campaign","ParamUTM","EntryAdded Date");
        header('Content-Encoding: UTF-8');
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header('Content-Disposition: attachment;filename="' . $fname . '.csv"');
         // Php // Open the standard output stream for writing additional Open
        $fp = fopen('php://output', 'a');
    fputcsv($fp, $headerq);
              fputcsv($fp, $headers);
              $i=1;
            foreach ($formLeads as $q) {

                      $str_adminattachment="";
                       // $cc_product = $pages->get("id=$q->cc_product");
                        $city = $pages->get("id=$q->lead_city");
                         //$industryisic = $pages->get("id=$q->industry_isic");
                       //  $occupation = $pages->get("id=$q->occupation");
                        // $banks = $pages->get("id=$q->banks");
                         $employer_industry_opt = $pages->get("id=$q->employer_industry_opt");
          
                      $t_title =$q->title;
                      $t_title =explode(" - ", $t_title);

      
           //$leadtype ="web";

          
           if($q->unique_ref_code!=""){
             $leadtype ="aggregator";
             $utm_campaign =$q->utm_campaign;
            }else{
              if($q->product=="2" && $q->existing_rel_scb=="0"){
                $utm_campaign ="INCC000000FFONLN";
              }
              if($q->product=="1"){
                 $utm_campaign ="INPL00NA00ONLINE";
              }
              if($q->product=="2" && $q->existing_rel_scb=="1"){
                $utm_campaign ="INCC00NA00FFTPSB";
              }
            }
            $pincode =$q->pincode;
  
            if($q->city!=""){
              $addcity =$q->city;
            }
            

          $arrForm =array($i,$q->unique_id,$q->product->title,$q->city,$q->country,$q->fname,$q->mname,$q->lname,
                $q->gender->title,$q->dob,$q->alternate_contact,$q->email,$q->mobile,$q->nri_product,
               $q->account_number,
              $q->existing_rel_scb,
              $q->existing_rel_scb_deb_cred,
              $q->existing_rel_scb_deb,
              $q->existing_rel_scb_cred,
              $q->employment_type->title,
             // $q->industryisic->title,
              //$q->occupation->title,
             // $q->work_type_new->title,
             // $p->banks->title,
             // $q->employer_industry_opt->title,
              $utm_campaign,
              $q->utm_channel,
              date('d/m/Y H:i:s', $q->published));
         fputcsv($fp, $arrForm);
         $i++;
        }
      //move back to beginning of file
    fseek($fp, 0);
    fpassthru($fp); 
     ob_flush (); // every 10,000 to refresh the data buffer
      flush();
    ob_end_clean();
    fclose($fp); 
   
        exit;

     }
   }

function getallqueriesByStatus($product,$startdate,$enddate){
$pages = wire('pages');
//echo $product;
 $start = strtotime($startdate . " 00:00:00");
$end = strtotime($enddate . " 23:59:59");

$formLeads = $pages->find("template=lead_template|aggregator_lead_template, published>=$start, published<=$end,product=$product,sort=-created");

   
 //echo count($formLeads); 
if(count($formLeads) >0){
    
    $fname ="sale_".$product."_".$startdate."_".$enddate."_".time().".csv";
    if($product=="2"){
    $PincodeM = getmasterPincodes('CC');

    }else if($product=="1"){
    $PincodeM = getmasterPincodes('PL');
    }
   // echo $filename = $filepath."export_data/".$fname;
       $headers =array("LeadType","Reference Code","SCB Journey","source type","aggr_unirefno","product","PAN","Montly Income","Loan amount","rate","Tenure","person title","fname","mname","lname","gender","DOB","Alt contact","email","mobile","card appliedfor","residence type","Residence address","city","state","pincode","Permanent address","permanent pincode","office address","offstate","office City","offpincode","Do you exist SCB","Do you exist SCB Debit/Credit card","Do you exist SCB Debit ","Do you exist SCB Credit","Employer_type","Industry isic","work type","Banks","Industry","Education","Purpose","Designation","income proof","document_type","Document Number","document expiry","Loan/card Mailing address","aip refnumber","aip ref status","campaign","ParamUTM","EntryAdded Date");
        header('Content-Encoding: UTF-8');
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header('Content-Disposition: attachment;filename="' . $fname . '.csv"');
         // Php // Open the standard output stream for writing additional Open
        $fp = fopen('php://output', 'a');
    fputcsv($fp, $headerq);
              fputcsv($fp, $headers);
            foreach ($formLeads as $q) {

                      $str_adminattachment="";
                    	  $cc_product = $pages->get("id=$q->cc_product");
                    	  $city = $pages->get("id=$q->lead_city");
                    	   $industryisic = $pages->get("id=$q->industry_isic");
                    	 //  $occupation = $pages->get("id=$q->occupation");
                    	   $banks = $pages->get("id=$q->banks");
                    	   $employer_industry_opt = $pages->get("id=$q->employer_industry_opt");
          
                      $t_title =$q->title;
                      $t_title =explode(" - ", $t_title);

      
           $leadtype ="web";

          
           if($q->unique_ref_code!=""){
             $leadtype ="aggregator";
             $utm_campaign =$q->utm_campaign;
            }else{
              if($q->product=="2" && $q->existing_rel_scb=="0"){
                $utm_campaign ="INCC000000FFONLN";
              }
              if($q->product=="1"){
                 $utm_campaign ="INPL00NA00ONLINE";
              }
              if($q->product=="2" && $q->existing_rel_scb=="1"){
                $utm_campaign ="INCC00NA00FFTPSB";
              }
            }
            $pincode =$q->pincode;
           if(!empty($PincodeM[$pincode]['city'])){
              $addstate = $PincodeM[$pincode]['state'];
              $addcity = $PincodeM[$pincode]['city'];
              $initiatedbyres = $PincodeM[$pincode]['initiated_by'];
            }
            $off_pincode =$q->office_pincode;
            if(!empty($PincodeM[$off_pincode]['city'])){
              $offcity = $PincodeM[$off_pincode]['city'];
              $offstate = $PincodeM[$off_pincode]['state'];
              $initiatedbyoff = $PincodeM[$off_pincode]['initiated_by'];
            }
            if($q->city!=""){
              $addcity =$q->city;
            }
            $scbjourney ="N";
            if($q->existing_rel_scb=="1"  && $q->existing_rel_scb_deb=="1"){
              $scbjourney ="E";
            }

          $arrForm =array($leadtype,$q->unique_id,$scbjourney,$q->source_type->title,$q->$q->unique_ref_code,$q->product->title,$q->pan,$q->mothly_income,$q->loan_amount,$q->interest_rate,$q->tenure,$q->person_title_opt->title,$q->fname,$q->mname,$q->lname,
          	    $q->gender->title,$q->dob,$q->alternate_contact,$q->email,$q->mobile,$cc_product->title,
          		$q->residence_type,
          		$q->address,
          		$addcity,
          		$addstate,
          		$q->pincode,
          		$q->permanent_address,
          		$q->per_pincode,
          		$q->office_address,
          		$offcity,
              $offstate,
          		$q->office_pincode,
          		$q->existing_rel_scb,
          		$q->existing_rel_scb_deb_cred,
          		$q->existing_rel_scb_deb,
          		$q->existing_rel_scb_cred,
          		$q->employment_type->title,
          		$q->industryisic->title,
          		//$q->occupation->title,
              $q->work_type_new->title,
          		$p->banks->title,
          		$q->employer_industry_opt->title,
          		$q->education->title,
          		$q->purpose_opt->title,
          		$q->designation->title,
          		$q->income_document_type->title,
          		$q->document_type->title,
          		$q->document_number,
          		$q->document_validity->title,
              $q->mailing_address_opt->title,
          		$q->aip_ref_number,
          		$q->stat,
              $utm_campaign,
              $q->utm_channel,
          	  date('d/m/Y H:i:s', $q->published));
         fputcsv($fp, $arrForm);
        }
      //move back to beginning of file
    fseek($fp, 0);
    fpassthru($fp); 
     ob_flush (); // every 10,000 to refresh the data buffer
      flush();
    ob_end_clean();
    fclose($fp); 
   
        exit;

     }
   }


function getmasterPincodes($ptype){
  $pages = wire('pages');
 $arpins =array();
 if($ptype=="CC"){
    $sql1 ="SELECT * FROM pincode_master_cc";
    $result = wire('db')->query($sql1); 
    $i=0;
    while($row = $result->fetch_array()) {
       $pincode =$row['pincode'];
      $arpins[$pincode]['city'] =$row['city'];
      $arpins[$pincode]['state'] =$row['state'];
     // $arpins[$pincode]['initiated_by'] =$row['initiated_by'];
    }
  }else{
    $pincodes = $pages->find("template=location-master");
     if (count($pincodes)) {
       foreach ($pincodes as $pin) {
        $arpins[$pin->title]['city'] =$pin->city;
        $arpins[$pin->title]['state'] =$pin->state;
       }
  }
}
    
    return $arpins;
}



