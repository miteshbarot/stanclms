<?php
namespace ProcessWire;
ini_set('display_errors', 1); // show errors
error_reporting(-1); // of all levels

// $file = fopen("logs/logsetb_03-04-2021.txt","a");
// fwrite($file,"Req_data hereWW".date("Y-m-d h:i:s")."\n");
// fclose($file);

// die;


// $fileToWrite = '/var/www/html/site/templates/test.txt';
// if (!is_writable($fileToWrite)) { // Test if the file is writable
//     echo "Cannot write to {$fileToWrite}";
//     exit;
// }
// die;
// $handle = fopen($fileToWrite, 'w');
// if (!is_resource($handle)) { // Test if PHP could open the file
//     echo "Could not open {$fileToWrite} for writting.";
//     exit;
// }

function getpincodes($ptype){
  $arpins =array();
  $pages = wire('pages');
  if($ptype=="PL"){
     $pincodes = $pages->find("template=location-master");
    }else if($ptype=="CC"){
    $pincodes = $pages->find("template=cc_location_master");
    }
      if (count($pincodes)) {
        foreach ($pincodes as $pin) {
          $arpins [$pin->title]['city'] =$pin->city;
          $arpins [$pin->title]['state'] =$pin->state;
          }
      }
  return $arpins;

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

$dataArray=array();
$aggritype="CC";
 aggregatorforPL($dataArray,$aggritype);

function aggregatorforPL($dataArray,$aggritype){
  echo "in function";
$PincodeM = getmasterPincodes('CC');
echo count($PincodeM);
$pincode =811201;
if(!empty($PincodeM[$pincode]['state'])){

 echo $addstate = $PincodeM[$pincode]['state'];
}
echo "<br>";
print_r($PincodeM);
die;
}

//   $pincodearr =getpincodes('PL');

// count($pincodearr);

function getaggrigatorPL(){

   $pages = wire('pages');
  $pincodearr =getpincodes('PL');

 
    // $pincodes = $pages->find("template=location-master");
    //$pincodes = $pages->find("template=cc_location_master");
//   $arpins =array();
//   $pincodes = $pages->find("template=location-master");
//       if (count($pincodes)) {
//         foreach ($pincodes as $pin) {
//           $arpins [$pin->title]['city'] =$pin->city;
//           $arpins [$pin->title]['state'] =$pin->state;
//           }
//       }
// echo count($arpins);
  echo "<pre>pincode in final";
echo $pincodearr['400013']['city'];
echo $pincodearr['400013']['state'];
$off_pincode ='110003';
if(!empty($pincodearr[$off_pincode]['state'])){
echo $pincodearr[$off_pincode]['state'];
}
//print_r($arpins);

}

echo getaggrigatorPL();



die;
 $responsejson = [
   "data" => [
         "type" => "applications", 
         "attributes" => [
            "applicationIds" => [
            ], 
            "response" => [
                  "aip-status-response" => null, 
                  "duplicate-flag" => "Y", 
                  "channel-transaction-id" => "#CC826D9A20210402", 
                  "aip-reference-number" => null 
               ] 
         ], 
         "relationships" => [
                  ], 
         "links" => [
                        "self" => "/retail/api/v3/applications/null" 
                     ] 
      ] 
]; 
 
//$duplicateflag =$responsejson['data']['attributes']['response']['duplicate-flag'];
$ccuniqueid=23232;
   if($responsejson['data']['attributes']['response']['aip-reference-number']){
   	echo 'if';
       $applicationId =$responsejson['data']['attributes']['response']['application-id'];
       $aipreferencenumber =$responsejson['data']['attributes']['response']['aip-reference-number'];
       $aip_response_status =$responsejson['data']['attributes']['response']['aip-status-response'];
       
       $approved_amount =$responsejson['data']['attributes']['response']['approved-amount'];    
    }
     if($responsejson['data']['attributes']['response']['aip-error']){
     	echo 'iff2';
      $errormsg = $responsejson['data']['attributes']['response']['aip-error'];
    }
    if($responsejson['errors'][0]['title']){
    	echo 'ifrr';
       $errormsg = $responsejson['errors'][0]['title']."# ".$responsejson['errors'][0]['status'];
    }
     if($responsejson['data']['attributes']['response']['aip-reference-number']==null){
    	echo 'ifrrhhh';
       
    }
    //print_r($responsejson);
  
  $arr['appliationid'] =$applicationId;
  $arr['duplicateflag'] =$duplicateflag;
  $arr['status'] =$status;
  $arr['errormsg'] =$errormsg;
  $arr['aipreferencenumber'] =$aipreferencenumber;
  $arr['aip_status_response'] =$aip_response_status;
  $arr['approved_amount'] =$approved_amount;
echo "<pre>";
print_r($arr);
$responseArr =$arr;
 if(empty($arr)){
 	echo "iiiiff";
					$status="0";
					$errorcode ="999";
					echo $ErrorInfo ="UN-KNOWN ERROR FROM SCB";
			}else{
				echo "ddd";
				if($arr['aipreferencenumber']){
					echo $status ="1";
					if(!empty($appliationid)){
						$p->application_id =$arr['appliationid'];	
					}
					$p->aip_ref_number =$arr['aipreferencenumber'];
					$p->stat =$arr['aip_status_response'];
					if($arr['aip_status_response']=="DECLINE"){
						$status ="3";
					}
					//$p->approved_amount =$responseArr['approved_amount'];
				}
				else if($arr['errormsg']){
					$status="0";
					$errorcode ="108";
					echo $ErrorInfo ="SYSTEM ERROR FROM";
					$arResponse['detail'] =$responseArr['errormsg'];
				} 
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
			 
			 print_r($arResponse);die;


 
die;
$unique_id ="CCC649A020210404";
$p = $pages->get("unique_id=$unique_id");
echo $p->PermAddrSameAsResAddr;
if($p->PermAddrSameAsResAddr=="1"){ echo "yes"; }
echo $p->email;


echo $industryisic="RS16";
$industryisic_dt = $pages->get(1049)("code=$industryisic");
				echo $industry_isic =$industryisic_dt->id;

echo "<br>";
$occupation ="95";
$occupation_dt = $pages->get(31498)("code=$occupation");
				echo $occupation =$occupation_dt->id;
$data ='Hello';
fwrite($handle,$data);
fclose($handle);
echo "File successfully created";
?>