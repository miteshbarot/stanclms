<?php
namespace ProcessWire;
ini_set('display_errors','1');
include "partials/_general_function.php";


	$post_type = $sanitizer->text($_GET['post_type']);
	switch ($post_type) {
		case 'otp':
			$n =6;
			$randomotp =generateNumericOTP($n);
			$mobile =$sanitizer->text($_GET['mobile']);
			$producttype =$sanitizer->text($_GET['p']);
			/*
[6:41 PM, 3/29/2021] Thapa @ SC: The authentication code for confirming your Personal Loan application is ".$randomotp.". Please write to customer.care@sc.com in case you haven't applied.- StanChart
[6:41 PM, 3/29/2021] Thapa @ SC: Thank you for applying for a Standard Chartered Personal Loan online. Your application reference number for future correspondence is #PLS3A90HG0
			*/
		if($producttype=="PL"){
		$msg="The%20authentication%20code%20for%20confirming%20your%20Personal%20Loan%20application%20is%20".$randomotp.".%20Please%20write%20to%20customer.care@sc.com%20in%20case%20you%20haven't%20applied.-%20StanChart";
		}else{
		 //$msg="The%20authentication%20code%20for%20confirming%20your%20Credit%20Card%20application%20is%20".$randomotp.".%20Please%20write%20to%20customer.care@sc.com%20in%20case%20you%20haven't%20applied.-%20StanChart";
		 $msg="The+authentication+code+for+confirming+your+Credit+Card+application+is+".$randomotp.".Please+write+to+card.services%40sc.com";
		

		}
		$smsurl ="http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=381682&username=7045098739&password=Apply%4012345&To=".$mobile."&Text=".$msg;
			smssend($smsurl);
			echo json_encode(array("genotp"=>$randomotp,"status"=>"1"));
		break;
		case 'c':
			//print_r($_GET);die;
			$companystr =$sanitizer->text($_GET['q']);
				$status=200;
				$arr =array();
				if($companystr!=""){
				$sql ="SELECT * FROM Company_Master WHERE COMPANY_DESC like '%$companystr%'  limit 15";
				$result = wire('db')->query($sql); 
				$i=0;
				while($row = $result->fetch_array()) {//print_r($row
				$i++;
				//echo "<pre>";
				// print_r($row);  
				//echo $row['CODE']." ".$row['COMPANY_DESC'];
				$arr[$i]['id'] =$i;
				$arr[$i]['code'] =$row['CODE'];
				$arr[$i]['title'] =$row['COMPANY_DESC'];
				//echo "<br>";
				//die;
				}
				}
				//print_r($arr);
			 echo json_encode(array("message"=>$arr,"code"=>$status));
			

		break;
	    case 'pin':
			//print_r($_GET);
			$pincode =$sanitizer->text($_GET['pincode']);
			$ptype =$sanitizer->text($_GET['p']);
				$status=1;
				$arr =array();
				if($pincode!=""){
				$sql1 ="SELECT * FROM pincode_master_cc WHERE pincode='".$pincode."' limit 1";
				$result = wire('db')->query($sql1); 
				$i=0;
				$city="";
			
				while($row = $result->fetch_array()) {
					$city =$row['city'];
					$state =$row['state'];	
					$initiatedby =$row['initiated_by'];
				}
			if($city==""){
				  $status =2;
				  $msg ="err";
				 }
			}
		
			 echo json_encode(array("message"=>$msg,"status"=>$status,"city"=>$city,"state"=>$state,"initiatedby"=>$initiatedby));
			
		break;

		default:
		break;
	}


?>