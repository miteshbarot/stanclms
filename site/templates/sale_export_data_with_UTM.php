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
  if($totdays >2){
    echo "Day should not be more than 2 days"; die;
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
            getallqueriesByStatus($product,$startdate,$enddate);

        break;
          case "bb":
            $product =4;
             getallqueriesByStatus($param,$startdate,$enddate);

        break;
 
        default:
            break;
      }





function getallqueriesByStatus($product,$startdate,$enddate){
$pages = wire('pages');
echo $product;
 $start = strtotime($startdate . " 00:00:00");
$end = strtotime($enddate . " 23:59:59");

// $arsource =array();
// $source_typesel = $pages->get(137574)->children;
//  foreach ($source_typesel as $source) {
//   $sid = (int) $source->id;
//   $arsource[$sid] =$source->title;
//  }

$formLeads = $pages->find("template=lead_template|aggregator_lead_template, published>=$start, published<=$end,product=$product,sort=-created");

   
 echo count($formLeads); 
if(count($formLeads) >0){
    
    $fname ="sale_".$product."_".$startdate."_".$enddate."_".time().".csv";
   // echo $filename = $filepath."export_data/".$fname;
       $headers =array("Title","LeadType","unique_id","aggr_unirefno","product","PAN","Montly Income","Loan amount","rate","Tenure","person title","fname","mname","lname","gender","DOB","Alt contact","email","mobile","card appliedfor","residence type","Residence address","city","state","pincode","Permanent address","permanent pincode","office address","state","offpincode","Do you exist SCB","Do you exist SCB Debit/Credit card","Do you exist SCB Debit ","Do you exist SCB Credit","Employer_type","Industry isic","work type","occupation","Banks","Industry","Education","Purpose","Designation","income proof","document_type","Document Number","document expiry","Loan/card Mailing address","aip refnumber","aip ref status","Published Date");
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
                    	   $occupation = $pages->get("id=$q->occupation");
                    	   $occupation = $pages->get("id=$q->occupation");
                    	   $banks = $pages->get("id=$q->banks");
                    	   $employer_industry_opt = $pages->get("id=$q->employer_industry_opt");
          
                      $t_title =$q->title;
                      $t_title =explode(" - ", $t_title);

      
           $leadtype ="web";
           if($q->unique_ref_code!=""){
           	 $leadtype ="aggregator";
            }
          $arrForm =array($t_title[0],$leadtype,$q->unique_id,$q->$q->unique_ref_code,$q->product->title,$q->pan,$q->mothly_income,$q->loan_amount,$q->interest_rate,$q->tenure,$q->person_title_opt->title,$q->fname,$q->mname,$q->lname,
          	    $q->gender->title,$q->dob,$q->alternate_contact,$q->email,$q->mobile,$cc_product->title,
          		$q->residence_type,
          		$q->address,
          		$city->title,
          		$q->state,
          		$q->pincode,
          		$q->permanent_address,
          		$q->per_pincode,
          		$q->office_address,
          		$q->office_state,
          		$q->office_pincode,
          		$q->existing_rel_scb,
          		$q->existing_rel_scb_deb_cred,
          		$q->existing_rel_scb_deb,
          		$q->existing_rel_scb_cred,
          		$q->employment_type->title,
          		$q->industryisic->title,
          		$q->occupation->title,
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
          	  date('m/d/Y H:i:s', $q->published));
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



