<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
$id = $input->get->id;
$key = $input->get->key;

switch ($input->urlSegment(1)) {
	case 'in':
		$result = [];
		$json = file_get_contents('php://input');
		$data = json_decode($json);

		if ($data->LeadID) {
			$leadid = $data->LeadID;
			$pid = $pages->get("unique_id={$leadid}");
			if ($pid != "") {
				$dd = new Page();
				$dd->template = 'dialer_disposition';
				$dd->parent = $pid;
				$dd->of(false);
				$dd->title = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10)));
				$dd->dialer_disposition = $data->Dispostions;
				$dd->dialer_subdisposition = $data->SubDispostions;
				$dd->dialer_date = $data->Calldatetime;
				$dd->dialer_remarks = $data->Remarks;
				$dd->dialer_agent = $data->AgentName;
				$dd->save();
				$result = array('DispositionID' => $dd->id);
				$code = 200;
			}else{
				$result = "Wrong Lead ID.";
				$code = 400;
			}
		}else{
			$result = "Bad Request. Missing required parameters or invalid request.";
			$code = 400;
		}

		$message = $result;
		break;

	case 'out':
		$result = [];
		$pid = $pages->get("unique_id={$id}");
		
		//check the key in this page's api_keys repeater
		/*$key_check = $pages->get("api_keys.code={$key}");
		if ($key_check) {
			$result = array('email' => $key_check->email);
			$code = 200;
		}else{
			$result = "Bad Request. Invalid or missing API key.";
			$code = 400;
		}*/
		if ($pid != "") {
			$result = array('LeadID' => $pid->unique_id,
					'Campaign_Name' => 'campaign_new',
					'Customer_Name' => $pid->fname." ".$pid->lname,
					'Mobile' => $pid->mobile,
					'Product_Name' => $pid->product->title,
					'Lead Source' => 'landing_page',
					'dob' => $pid->dob,
					'Eligible_Amount' => $pid->loan_amount,
					'ROI' => $pid->interest_rate,
					'Salary' => $pid->monthly_income,
					'Address' => $pid->address,
					'Customer_City' => $pid->city,
					'Customer_State' => $pid->state,
					'Pincode' => $pid->pincode,
					'Email_Id' => $pid->email,
					'Pan_No' => $pid->pan,
					'Aadhaar No' => $pid->aadhar,
					'Gender' => $pid->gender->title,
					'Company Name' => $pid->employer_name,
					'Occupation' => $pid->work_type
		 	);
		 	$code = 200;
		}else{
			$result = "Wrong Lead ID";
			$code = 400;
		}

		$message = $result;
		break;
	
	default:
		$message = "No URL segment found";
		$code = 404;
		break;
}





$output = array('message' => $message, 'code' => $code);
echo json_encode($output);