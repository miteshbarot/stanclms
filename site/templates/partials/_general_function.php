<?php
function getCityState(){
$arrcity =array();
	$pages = wire('pages');
	$i=0;
	$pincodes_off = $pages->find("template=location-master");
			if (count($pincodes_off)) {
				foreach ($pincodes_off as $pinoff) {
					//$offcity =$pinoff->city;
					$arrcity[$i]['city'] =$pinoff->city;
					$arrcity[$i]['citycode'] =$pinoff->citycode;
					$arrcity[$i]['state'] =$pinoff->state;
					//$offstate = $pinoff->state;
					$i++;
				}
			}
	return $arrcity;
	}

function getworkTypeOption(){
	$stroption ="";
	//"Self Employed"=>"9","Student" =>"10"
$arrworknew =array("Service -Private Sector (Controller/Owner/Director)"=>"F-1","Service -Private Sector (General)"=>"G-2","Service -Public Sector (Controller/Owner/Director)"=>"I-3","Service -Public Sector (General)"=>"J-4","Service -Government Sector (Controller/Owner/Director)" =>"K-5","Service -Government Sector (General)" =>"L-6","Business" =>"Y-7",
		"Professional" =>"P-8");

	if (count($arrworknew)) {
				foreach ($arrworknew as $aw=>$wv) {
					//$offcity =$pinoff->city;
					$awe =explode("-",$wv);
					
					// $arrw[$i]['code'] =$awe['0'];
					// $arrw[$i]['work'] =$awe['1'];
					// $arrw[$i]['name'] =$wv;
					$stroption .="<option value='".$awe['1']."' data-id='".$awe['0']."'>".$aw."</option>";
					//$offstate = $pinoff->state;
					$i++;
				}
			}
	return $stroption;
	}

function getdocumentTypeOption(){
	$stroption ="";
	$dataid ="";
$arrdoc =array("98"=>"Driving Licence","231"=>"Passport","346" =>"Voter Id");
	if (count($arrdoc)) {
				foreach ($arrdoc as $aw=>$wv) {
					if($aw=='346'){
						$dataid="voter_details";	
					}elseif($aw=='231'){
						$dataid="passport_details";	
					}elseif($aw=='98'){
						$dataid="license_details";	
					}
					$stroption .="<option value='".$aw."' data-id='".$dataid."'>".$wv."</option>";
					$i++;
				}
			}
	return $stroption;
	}

function geteductionOption(){
	$stroption1 ="";
	$dataid ="";
$arred =array("1"=>"Pimary school (PSC)","2"=>"SSC/HSC (SEC)","3" =>"Post Graduate","4"=>"Graduate","5"=>"Professional qualification","6"=>"Diploma holder");
	if (count($arred)) {
				foreach ($arred as $ed=>$ev) {
					
					$stroption1 .="<option value='".$ed."' >".$ev."</option>";
					$i++;
				}
			}
			return $stroption1;
}


function getfieldOptions(){
	$stroption2="";
	$pages = wire('fields');
$field = $fields->get('person_title_opt');
$all_options = $field->type->getOptions($field);
	if (count($all_options)) {
			foreach ($all_options as $ed=>$ev) {
				$stroption2 .="<option value='".$ed."' >".$ev->title."</option>";
			}
			}
			return $stroption2;

}

function smssend($geturl){
$output="";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $geturl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: ae17da29-dfa6-7ace-5fe6-2c06062ecb08"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
 // echo "cURL Error #:" . $err;
  $output =$err;
} else {
  $output= $response;
}
return $output;
}

// Function to generate OTP
function generateNumericOTP($n) {
      
    // Take a generator string which consist of
    // all numeric digits
    $generator = "1357902468";
  
    // Iterate for n-times and pick a single character
    // from generator and append it to $result
      
    // Login for generating a random character from generator
    //     ---generate a random number
    //     ---take modulus of same with length of generator (say i)
    //     ---append the character at place (i) from generator to result
  
    $result = "";
  
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
  
    // Return result
    return $result;
}

	
?>