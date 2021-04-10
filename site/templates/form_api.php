<?php
ini_set('display_errors','1');
ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('max_execution_time', 0);
include("LeadAPI.php");
	function random_code(){
		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,6));
		$unique_id = $rand . $today;
		return $unique_id;
	}

	$unique_id = random_code();
	$input_flag = $sanitizer->text($_POST['input_flag']);
	$search_emp = $sanitizer->text($_POST['search_value']);
	switch ($input_flag) {
		case '1':
				//print_r($_POST);
			$existing_rel_scb = $sanitizer->text($_POST['choice_1']);
			//$full_name = $sanitizer->text($_POST['full_name']);
			$full_name1 = $sanitizer->text($_POST['full_name']);
			$full_name2 = $sanitizer->text($_POST['full_name1']);
			$full_name = $full_name1 == "" ? $full_name2 : $full_name1;
			$full_name_a =explode(" ", $full_name);
			$existing_scb_deb_cred = $sanitizer->text($_POST['choice_2']);
			$current_yr_audited = $sanitizer->text($_POST['choice_3']);
			$employment_type = $sanitizer->text($_POST['emp_type']);
			$employer_name = $sanitizer->text($_POST['pl_home_emp_name']);
			$employer_code =$sanitizer->text($_POST['emp_code']);
			$employer_industry = $sanitizer->text($_POST['emp_industry']);
			$emp_industry= $pages->get($employer_industry);
			//$p->customer_type =$emp_industry->title;
			$mothly_income = $sanitizer->text($_POST['gross_income']);
			$start_yr = $sanitizer->text($_POST['start_yr']);
			$start_month = $sanitizer->text($_POST['start_month']);
			$applicant_description = $sanitizer->text($_POST['applicant_description']);
			$current_yr_taxable_income = $sanitizer->text($_POST['current_yr_tax_income']);
			$gross_turnover = $sanitizer->text($_POST['gross_turnover']);
			$current_yr_depr = $sanitizer->text($_POST['current_depreciation']);
			$current_yr_tax = $sanitizer->text($_POST['current_tax']);
			$prev_yr_taxable_income = $sanitizer->text($_POST['prev_tax_income']);
			$emi_amt = $sanitizer->text($_POST['emi_amt']);
			$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			//$person_title = $sanitizer->text($_POST['per_title']);
			$title = $sanitizer->text($_POST['name']);
			$pincode = $sanitizer->text($_POST['pincode']);
			$mobile1 = $sanitizer->text($_POST['mobile1']);
			$mobile2 = $sanitizer->text($_POST['mobile2']);
			$mobile = $mobile1 == "" ? $mobile2 : $mobile1; 
			$email1 =$sanitizer->text($_POST['email']);
			$email2 =$sanitizer->text($_POST['email1']);
			$city =$sanitizer->text($_POST['city']);
			$state =$sanitizer->text($_POST['state']);
			$email = $email1 == "" ? $email2 : $email1; 
			$timestamp = date('Y/m/d H:i:s');
			$product = $sanitizer->text($_POST['product']);

			$utm_campaign  = $sanitizer->text($_POST['utm_campaign']);
			$utm_source  = $sanitizer->text($_POST['utm_source']);
			$utm_medium  = $sanitizer->text($_POST['utm_medium']);
			$utm_adgroup  = $sanitizer->text($_POST['utm_adgroup']);
			$utm_param  = $sanitizer->text($_POST['utm_param']);

			$p = new Page();
			$p->of(false);
			$p->template = "lead_template";
			$p->parent = $pages->get(1025);


			$p->title =  $mobile." - ".$unique_id;
			$plunique_id ="PL".$unique_id;

			//$dt = date("Y/m/d H:i:s", strtotime("+210 minutes"));
           // $p->application_created = $dt;
			if(count($full_name_a)==3){
				$p->fname = $full_name_a[0];
				$p->mname = $full_name_a[1];
				$p->lname = $full_name_a[2];	
			}else{
				$p->fname = $full_name_a[0];
				$p->lname = $full_name_a[1];
			}
			
			$p->mobile = $mobile;
			$p->email = $email;
			$p->product = $product;
			$p->pincode = $pincode;
			$p->city = $city;
			$p->state = $state;
			$p->country = "India";
			$p->unique_id = $plunique_id;
			$p->existing_rel_scb = $existing_rel_scb;
			$p->existing_scb_deb_cred = $existing_scb_deb_cred;
			$p->current_yr_audited = $current_yr_audited;
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name." -".$employer_code;
			if($employer_industry != "Employer Industry Segment"){$p->employer_industry_opt = $emp_industry->title;}
			$p->mothly_income = $mothly_income;

			$p->start_of_business = $start_yr." ".$start_month;
			
			// if($applicant_description != "Option to best describe applicant"){$p->applicant_description = $applicant_description;}
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			$p->mode_of_salary = $mode_of_salary;

			$p->utm_campaign = $utm_campaign;
			$p->utm_source = $utm_source;
			$p->utm_medium = $utm_medium;
			$p->utm_adgroup = $utm_adgroup;
			$p->utm_channel = $utm_param;
			//if($person_title != "Title"){$p->person_title = $person_title;}
			if($existing_rel_scb=="1"){
				$postdata =array("pid"=>$p->id,"unique_id"=>$plunique_id,"fname"=>$p->fname,"lname"=>$p->lname,"full_name"=>$full_name,"dob"=>$dob,"mobile"=>$p->mobile,"gender"=>$gender,"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>"INPL00NA00ONLINE","education"=>$education,"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income);
		  	  $responseArr =lmsLeadCreationShortFormETBJourney($postdata);
		  	  $file = fopen("logs/logs_etb_07.txt","a");
				fwrite($file,"Req_PL".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
				fwrite($file,"\n");
				if($responseArr['errorcode']){
				$status ="0";
				$p->stat =$responseArr['status'];
				}else{
				$status ="1";
				if($responseArr['appliationid']!=""){
					$p->application_id =$responseArr['appliationid'];
					$p->stat =$responseArr['status'];		
					$appId =$responseArr['appliationid'];
				}
			   }
			
		     }
		  	$p->save();
		  	echo json_encode(array("unique_id" =>$plunique_id,"exist_cust"=>$existing_rel_scb,"appliationid"=>$responseArr['appliationid'],"status"=>$status,"api_msg"=>$responseArr['status']));
			break;
			
		case '2':

			//echo "<pre>"; print_r($_POST);die;
		    $errflag =1;
			$padd1=$padd2=$padd3;
			$unique_id = $sanitizer->text($_POST['unique_id']);
			$p = $pages->get("unique_id=$unique_id");
			$p->of(false);
			$existing_rel_scb =$sanitizer->text($_POST['existing_rel_scb']);
			$employment_type = $sanitizer->text($_POST['emp_type']);
			$employer_name = $sanitizer->text($_POST['emp_name']);
			$industry_isic = $sanitizer->text($_POST['emp_industry']);
			$pincode = $sanitizer->text($_POST['pincode']);
			$mothly_income = $sanitizer->text($_POST['gross_income']);


			$title = $sanitizer->text($_POST['title']);
			$fname = $sanitizer->text($_POST['fname']);
			$mname = $sanitizer->text($_POST['mname']);
			$lname = $sanitizer->text($_POST['lname']);
			$gender = $sanitizer->text($_POST['gender']);
			$email = $sanitizer->text($_POST['email']);
			$mobile = $sanitizer->text($_POST['mobile']);
			$education = $sanitizer->text($_POST['education']);
			$dob = $sanitizer->text($_POST['dob']);
			$add1 = $sanitizer->text($_POST['add1']);
			$add2 = $sanitizer->text($_POST['add2']);
			$add3 = $sanitizer->text($_POST['add3']);
			$purpose = $sanitizer->text($_POST['purpose']);
			$landmark = $sanitizer->text($_POST['landmark']);
			// $pincode = $sanitizer->text($_POST['pincode']);
			// $pl_company = $sanitizer->text($_POST['pl_company']);
			// $off_occ = $sanitizer->text($_POST['off_occ']);
			$work_type = $sanitizer->text($_POST['work_type']);
			$off_add1 = $sanitizer->text($_POST['off_add1']);
			$off_add2 = $sanitizer->text($_POST['off_add2']);
			$off_add3 = $sanitizer->text($_POST['off_add3']);
			$off_landmark = $sanitizer->text($_POST['off_landmark']);
			$off_state = $sanitizer->text($_POST['off_state']);
			$off_pincode = $sanitizer->text($_POST['off_pincode']);
			$off_phone = $sanitizer->text($_POST['off_phone']);
			// $pl_off_industry = $sanitizer->text($_POST['pl_off_industry']);
			$off_lma = $sanitizer->text($_POST['off_lma']); //option
			$off_income = $sanitizer->text($_POST['off_income']);
			$off_income_total = $sanitizer->text($_POST['off_income_total']);
			$off_income_other = $sanitizer->text($_POST['off_income_other']);
			$pan = $sanitizer->text($_POST['pan']);
			$OtherDocType = $sanitizer->text($_POST['other_id']);
			$passport_no = $sanitizer->text($_POST['passport_no']);
			$passport_validity = $sanitizer->text($_POST['passport_validity']);
			$lic_no = $sanitizer->text($_POST['lic_no']);
			$lic_validity = $sanitizer->text($_POST['lic_validity']);
			$voter_id = $sanitizer->text($_POST['voter_id']);
			$voter_validity = $sanitizer->text($_POST['voter_validity']);

			/*new field*/
			$start_of_business = $sanitizer->text($_POST['start_of_business']);
			$current_yr_audited =$sanitizer->text($_POST['current_yr_audited']);
			$start_month = $sanitizer->text($_POST['start_month']);
			$applicant_description = $sanitizer->text($_POST['applicant_description']);
			$current_yr_taxable_income = $sanitizer->text($_POST['current_yr_tax_income']);
			$gross_turnover = $sanitizer->text($_POST['gross_turnover']);
			$current_yr_depr = $sanitizer->text($_POST['current_depreciation']);
			$current_yr_tax = $sanitizer->text($_POST['current_tax']);
			$prev_yr_taxable_income = $sanitizer->text($_POST['prev_tax_income']);
			$emi_amt = $sanitizer->text($_POST['emi_amt']);
			$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$per_add1 =$sanitizer->text($_POST['pa1']);
			$per_add2 =$sanitizer->text($_POST['pa2']);
			$per_add3 =$sanitizer->text($_POST['pa3']);
			$per_pincode =$sanitizer->text($_POST['ppincode']);
			$PermAddrSameAsResAddr =$sanitizer->text($_POST['sameasResiAdd']);
			$loan_amount =$sanitizer->text($_POST['loan_amount']);
			$tenure =$sanitizer->text($_POST['tenure']);
			$totexp =$sanitizer->text($_POST['total_exp']);
			$company_name =$sanitizer->text($_POST['company_name']);
			$company_code =$sanitizer->text($_POST['company_code']);
			$leadcity =$sanitizer->text($_POST['leadcity']);
			$restype =$sanitizer->text($_POST['re-type']);
			$hdnindustryisic = $sanitizer->text($_POST['hdnindustryisic']);
			$industryisic= $pages->get($industry_isic);


			$lcity= $pages->get($leadcity);

			$p->lead_city =$lcity->title;
			$p->industry_isic =$industryisic->title;
			$p->start_of_business = $start_of_business;
			$p->current_yr_audited = $current_yr_audited;
			//if($sanitizer->text($_POST['sameasResiAdd'])=="on"){}
			$p->PermAddrSameAsResAddr =$PermAddrSameAsResAddr;
			$p->current_yr_taxable_income = $current_yr_taxable_income;
			$p->gross_turnover = $gross_turnover;
			$p->current_yr_depr = $current_yr_depr;
			$p->current_yr_tax = $current_yr_tax;
			$p->prev_yr_taxable_income = $prev_yr_taxable_income;
			$p->current_yr_depr = $current_yr_depr;
			$p->emi_amt = $emi_amt;
			//$p->mode_of_salary = $mode_of_salary;
			$p->residence_type =$restype;
			//$p->tenure =$tenure;
			$otherdocumentdate=null;
			if($OtherDocType=="346" || $voter_id!=""){ //voterid
			 $p->document_number = $voter_id;
			 $p->document_validity = $voter_validity;
			 $otherdocumentdate =$voter_validity;
			 $otherdocumentno =$voter_id;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="98" || $lic_no!=""){
			  $p->document_number = $lic_no;
			 $p->document_validity = $lic_validity;
			 $otherdocumentno =$lic_no;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="231" || $passport_no!=""){
				$p->document_number = $passport_no;
			 	$p->document_validity = $passport_validity;
				$otherdocumentno =$passport;
				$otherdocumentdate =$passport_validity;
				$otherdocumenttype ="T0231";
			}
			if($otherdocumentdate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $otherdocumentdate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}
			$p->document_type =$OtherDocType;
			/* new fields */


		  // if($mobile!="" && $pan!=""){
		  // 	$formLeads = $pages->find("template=lead_template,mobile={$mobile},pan={$pan},product=1,sort=-published,limit=1");
			 // 	if (count($formLeads) >0) {
				// 	foreach($formLeads  as $pdata){
				// 	  $unique_id = $pdata->unique_id;
				// 	  $aiprefnumber =$pdata->aip_ref_number;
				// 	  $aipstatus =$pdata->stat;
				// 	}
				// 	if($aiprefnumber!="" && $aipstatus!=""){
				// 	$errflag =2;
				//   }
			 // 	}
		  //    }


			$arrwork =array("6"=>"Government","1"=>"Private","3" =>"Public");
			//$arrworktype=array("Public Limited"=>"I","Government"=>"G","Private Limited"=>"G","K"=>"Others");
			$arrworktype=array("1"=>"F","2"=>"G","3"=>"I","4"=>"J","5"=>"K","6"=>"L","7"=>"Y","8"=>"P");
			$apigender=array("1"=>"M","2"=>"F");
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
				}
			}
			$p->employment_type = $employment_type;
			$p->employer_name = $employer_name;
			//if($employer_industry != "Employer Industry Segment"){$p->employer_industry_opt = $employer_industry;}
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->person_title = $title;
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $gender;
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3;
			if($PermAddrSameAsResAddr=="1"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincde =$pincode; 
			$per_pincode =$pincode;
			}else{
				$permanent_pincodes = $pages->find("template=location-master,title={$per_pincode}");
			if (count($permanent_pincodes)) {
				foreach ($permanent_pincodes as $pins) {
					$per_city =$pins->city;
					$per_state = $pins->state;
				}
			  }
			}
			//$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			if($per_city!="" && $per_state!=""){
				//$p->city = $per_city;
				$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;	
			}else{
				$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_pincode;
			}
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->perma_pincode =$per_pincode;
			$p->purpose_opt = $purpose;
			$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->citycode =$offcity;
			$p->office_phone = $off_phone;
			$p->mailing_address_opt = $off_lma;
			$p->work_type_new = $work_type;
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			$p->total_exp = $totexp;

			if($employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
					$p->income_document_type =1;
				}elseif($employment_type=="2"){
					$salariedcode ="T0356";
					$p->income_document_type =3;
				}elseif($employment_type=="3"){
					$salariedcode ="T0036";
					$p->income_document_type =2;
				}
		
			/*
			"Derived as
""T0002"" if Aadhaar No. is given 
""T0227"" if PAN No. is given
""T0098"" if ID type is selected as Driving Licence
""T0231"" if ID type is selected as Passport
""T0346"" if ID type is selected as Voters ID"

			*/
			//$selfemployeed="T0036"; //income-document-type-1
			if($restype==1){
				$apirestype ="SO";
			}else if($restype==2){
				$apirestype ="RE";
			}else if($restype==3){
				$apirestype ="LR";
			}else if($restype==4){
				$apirestype ="BA";
			}else if($restype==5){
				$apirestype ="LO";
			}else if($restype==5){
				$apirestype ="CO";
			}
			$status ="0";
			$arrworktype=array("1"=>"F","2"=>"G","3"=>"I","4"=>"J","5"=>"K","6"=>"L","7"=>"Y","8"=>"P");
		$postdata =array("leadType"=>"web","pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"emp_name"=>$emp_name,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"PL","product_type_1"=>"6025","promo_code_1"=>"INPL00NA00ONLINE","education"=>$education,"work_type"=>$arrworktype[$work_type],"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$totexp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$otherdocumentno,"otherdocumentdate"=>$OtherDocDate,'restype'=>$apirestype,'industryisic'=>$hdnindustryisic,"off_phone"=>$off_phone);
			// echo "<pre>";
			// print_r($postdata);// die;
			if($errflag==1){
				$file = fopen("logs/logs_07.txt","a");
				fwrite($file,"Req_Post_PL".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
				fwrite($file,"\n");
				fclose($file); 
				if($existing_rel_scb=="0"){
				$responseArr =lmsLeadCreationAIPPersonalLoanCCForNTB($postdata);
				//PLINPL00NA00ONLINE
				if($responseArr['aipreferencenumber']){
					$status ="1";
					if(!empty($appliationid)){
						$p->application_id =$responseArr['appliationid'];	
					}
					$p->aip_ref_number =$responseArr['aipreferencenumber'];
					$aiprefnumber =$responseArr['aipreferencenumber'];
					$aipstatus =$responseArr['aipreferencenumber'];
					$p->stat =$responseArr['aip_status_response'];
					//$p->approved_amount =$responseArr['approved_amount'];
				}
				if(!empty($responseArr['errormsg'])){
					$status ="0";
				}
			  }
			} //error flag if end here
			 $p->save();
			 echo json_encode(array("status"=>$status,"unique_id" =>$unique_id,"applicationid"=>$responseArr['appliationid'],"api_msg"=>$responseArr['errormsg'],"existing_customer"=>$existing_rel_scb,"aip_ref_number" =>$aiprefnumber,"aip_ref_status" =>$aipstatus));
			
			break;

		case '3':
			//print_r($_POST);
			$appId="";
			$existing_rel_scb = $sanitizer->text($_POST['choice_1']);
			$existing_scb_cred = $sanitizer->text($_POST['choice_3']);
			$existing_scb_deb = $sanitizer->text($_POST['choice_2']);
			$fname = $sanitizer->text($_POST['fname']);
			$full_name1 = $sanitizer->text($_POST['full_name1']);
			$full_name2 = $sanitizer->text($_POST['full_name2']);
			$full_name = $full_name1 == "" ? $full_name2 : $full_name1;
			$full_name_a =explode(" ", $full_name);
			$email1 = $sanitizer->text($_POST['email1']);
			$email2 = $sanitizer->text($_POST['email2']);
			$email3 = $sanitizer->text($_POST['email3']);
			$mobile1 = $sanitizer->text($_POST['mobile1']);
			$mobile2 = $sanitizer->text($_POST['mobile2']);
			$mobile3 = $sanitizer->text($_POST['mobile3']);
			
			//$mobile = $mobile1 == "" ? ($mobile2 == "" ? $mobile3 : $mobile2) : $mobile1;
			$emp_name = $sanitizer->text($_POST['emp_name']);

			$pincode1 = $sanitizer->text($_POST['pincode']);
			$pincode2 = $sanitizer->text($_POST['pincode2']);
			$dob = $sanitizer->text($_POST['dob2']); //cc/dd yes flow etb
			$pincode = $pincode1 == "" ? $pincode2 : $pincode1;
			$employment_type = $sanitizer->text($_POST['salaried_ac']);
			$mothly_income = $sanitizer->text($_POST['grossmonthlyincome']);
			$total_income = $sanitizer->text($_POST['annualincome']);

			$timestamp = date('Y/m/d H:i:s');
			$product = $sanitizer->text($_POST['product']);
			$cc_product = $sanitizer->text($_POST['cc_product']);
			$product_url =$sanitizer->text($_POST['product_url']);
			$product_type =$sanitizer->text($_POST['product_type']);
			$campaign =$sanitizer->text($_POST['campaign']);
			$product_image =$sanitizer->text($_POST['product_image']);
			$card_name =$sanitizer->text($_POST['card_name']);
			if($mobile1){
				$mobile =$mobile1;
			}if($mobile2){
				$mobile =$mobile2;
			}if($mobile3){
				$mobile =$mobile3;
			}

			if($email1){
				$email =$email1;
			}if($email2){
				$email =$email2;
			}if($email3){
				$email =$email3;
			}

			/*UTM PARAMS START*/
			$utm_campaign  = $sanitizer->text($_POST['utm_campaign']);
			$utm_source  = $sanitizer->text($_POST['utm_source']);
			$utm_medium  = $sanitizer->text($_POST['utm_medium']);
			$utm_adgroup  = $sanitizer->text($_POST['utm_adgroup']);
			$utm_param  = $sanitizer->text($_POST['utm_param']);
			$city =$sanitizer->text($_POST['city']);
			$state =$sanitizer->text($_POST['state']);
			$initiatedby =$sanitizer->text($_POST['initiatedby']);

			$p = new Page();
			$p->of(false);
			$p->template = "lead_template";
			$p->parent = $pages->get(1025);


			$p->title =  $mobile." - ".$unique_id;

			$dt = date("Y/m/d H:i:s", strtotime("+210 minutes"));
			$ccunique_id ="CC".$unique_id;
			if(count($full_name_a)==3){
			$p->fname = $full_name_a[0];
			$p->mname = $full_name_a[1];
			$p->lname = $full_name_a[2];
			$fname =$full_name_a[0];
			$mname =$full_name_a[1];
			$lname =$full_name_a[2];
			}else{
			$p->fname = $full_name_a[0];
			$p->lname = $full_name_a[1];
			$fname =$full_name_a[0];
			$lname =$full_name_a[1];
			}
			//$p->fname = $fname;
			$p->mobile = $mobile;
			$p->email = $email;
			$p->product = $product;
			$p->country = "India";
			$p->cc_product = $pages->get("id={$cc_product}");
			$p->pincode = $pincode;
			$p->unique_id = $ccunique_id;
			$p->existing_rel_scb = $existing_rel_scb;
			$p->existing_scb_cred = $existing_scb_cred;
			$p->existing_scb_deb = $existing_scb_deb;
			$p->total_income = $total_income;
			$p->employment_type = $employment_type;
			$p->mothly_income = $mothly_income;
			$p->utm_campaign = $utm_campaign;
			$p->utm_source = $utm_source;
			$p->utm_medium = $utm_medium;
			$p->utm_adgroup = $utm_adgroup;
			$p->utm_channel = $utm_param;
			$p->city = $city;
			$p->state = $state;
			$p->org_code =$initiatedby;
			$status ="1";
			if($existing_rel_scb=="1" && $existing_scb_deb=="1"){

				// $pincodes = $pages->find("template=cc_location_master,title={$pincode}");
				// if (count($pincodes)) {
				// 	foreach ($pincodes as $pin) {
				// 		$addcity =$pin->city;
				// 		$addstate = $pin->state;
				// 	}
				// }

					$PincodeM = getmasterPincodes('CC');
				if(!empty($PincodeM[$pincode]['city'])){
					$addstate = $PincodeM[$pincode]['state'];
					$addcity = $PincodeM[$pincode]['city'];
					$initiatedbyres = $PincodeM[$pincode]['initiated_by'];
				}
				$resjsn =json_encode($jayParsedAry,true);
						if($cc_product=="28241"){
						//$cc_product ="3"; //visa
						$product_type_1 ="";
						}
						else if($cc_product=="28237"){
						$product_type_1 ="175"; //emirate
						}
						else if($cc_product=="28233"){
						//$cc_product ="28233"; //9
						$product_type_1 ="233";//maha
						}
						else if($cc_product=="28235"){
						//$cc_product ="28235"; //10
						$product_type_1 ="292";
						}
						else if($cc_product=="28239"){
						// $cc_product ="28239";
						$product_type_1 ="535"; // 31
						}
						else if($cc_product=="28231"){
						// $cc_product ="28231";//digi 31
						$product_type_1 ="528";
						}
						else if($cc_product=="28229"){
						// $cc_product ="28229";//ultimo 25
						$product_type_1 ="199";
						}
				$postdata =array("pid"=>$p->id,"unique_id"=>$ccunique_id,"fname"=>$fname,"lname"=>$lname,"full_name"=>$emp_name,"dob"=>$dob,"mobile"=>$p->mobile,"gender"=>null,"email"=>$email,"product_category_1"=>"CC","product_type_1"=>$product_type_1,"promo_code_1"=>"INCC00NA00FFTPSB","education"=>$education,"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income);
					//print_r($postdata);
		  	  $responseArr =lmsLeadCreationShortFormETBJourney($postdata);
		  	  // echo '<pre>';
		  	  // print_r($responseArr);die;
				$file = fopen("logs/logs_etb_07.txt","a");
				fwrite($file,"Req_CC".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
				fwrite($file,"\n");
			if($responseArr['errorcode']){
				$status ="0";
				$p->stat =$responseArr['status'];
			}else{
				if($responseArr['appliationid']!=""){
					$p->application_id =$responseArr['appliationid'];
					$p->stat =$responseArr['status'];		
					$appId =$responseArr['appliationid'];
				}
			}
			//$p->application_id =$responseArr['appliationid'];
			
			//"https://www.sc.com/global/av/Ultimate-636px-X-648px.jpg", 
			if($product_url==""){
				$product_url="https://www.sc.com/in/credit-cards/ultimatecard/";
			}
			$jayParsedAry = [
				"product_image" => $product_image, 
				"product_sequence_number" => "1", 
				"campaign" => $campaign, 
				"name" => $card_name, 
				"product_category" => "CC", 
				"product_category_name" => "Credit Card", 
				"product_url" => $product_url, 
				"product_type" => $product_type, 
				"company_category" => "NA", 
				"aggregator_code" => "IB99", 
				"aggregator_type" => "ETB", 
				"aggregator_instance" => "RupeePower", 
				"ext_lead_reference_number" => $appId
				]; 
				$resjsn =json_encode($jayParsedAry,true);
		     }
		  	$p->save();
		  	echo json_encode(array("unique_id" =>$ccunique_id,"status"=>$status,"exist_cust"=>$existing_rel_scb,"exist_debitcard"=>$existing_scb_deb,"exist_creditcard"=>$existing_scb_cred,"api_msg"=>$responseArr['status'],"appliationid"=>$responseArr['appliationid'],"urldata"=>$resjsn));
			//echo $unique_id;
			break;

		case '4':
			//cc application flow
		// echo "flow12";
		// echo '<pre>';print_r($_POST);
			$errflag =1;
			$unique_id = $sanitizer->text($_POST['unique_id']);
			$p = $pages->get("unique_id=$unique_id");
			$p->of(false);
			$title = $sanitizer->text($_POST['title']);
			$fname = $sanitizer->text($_POST['fname']);
			$mname = $sanitizer->text($_POST['mname']);
			$lname = $sanitizer->text($_POST['lname']);
			$pan = $sanitizer->text($_POST['pan']);
			$totexp = $sanitizer->text($_POST['tt_work']);
			$occupation =$sanitizer->text($_POST['off_occ']);
			$numofdependents =$sanitizer->text($_POST['dependents']);
			$education = $sanitizer->text($_POST['education']);
			$work_type = $sanitizer->text($_POST['work_type']);
			$existing_rel_scb =$sanitizer->text($_POST['existing_rel_scb']);
			$employment_type = $sanitizer->text($_POST['emp_type']);
			$pincode = $sanitizer->text($_POST['pincode']);
			$mothly_income = $sanitizer->text($_POST['gross_income']);
			$gender = $sanitizer->text($_POST['gender']);
			$email = $sanitizer->text($_POST['email']);
			$mobile = $sanitizer->text($_POST['mobile']);
			$dob = $sanitizer->text($_POST['dob']);
			$add1 = $sanitizer->text($_POST['add1']);
			$add2 = $sanitizer->text($_POST['add2']);
			$add3 = $sanitizer->text($_POST['add3']);
			$landmark = $sanitizer->text($_POST['landmark']);
			$off_add1 = $sanitizer->text($_POST['off_add1']);
			$off_add2 = $sanitizer->text($_POST['off_add2']);
			$off_add3 = $sanitizer->text($_POST['off_add3']);
			$off_landmark = $sanitizer->text($_POST['off_landmark']);
			$off_state = $sanitizer->text($_POST['off_state']);
			$off_pincode = $sanitizer->text($_POST['off_pincode']);
			$off_phone = $sanitizer->text($_POST['off_phone']);

			$banks =$sanitizer->text($_POST['bank_branch']);
			$designation=$sanitizer->text($_POST['designation']);
			$document_type = $sanitizer->text($_POST['document_type']);
			$industry_isic = $sanitizer->text($_POST['off_industry']);
			$monthly_bonus = $sanitizer->text($_POST['monthly_bonus']);
			$cc_product = $sanitizer->text($_POST['cc_product']);
			$hdnindustryisic = $sanitizer->text($_POST['hdnindustryisic']);
			$restype =$sanitizer->text($_POST['re-type']);
			$office_income =$sanitizer->text($_POST['mthly_income']);
			$employer_name = $sanitizer->text($_POST['pl_home_emp_name']);
		
			

			$industryisic= $pages->get($industry_isic);
			$occupationval= $pages->get($occupation);
			$banksval= $pages->get($banks);

			// new field start here //
			$p->designation =$designation;
			$p->no_of_dependant =$numofdependents;
			$p->occupation =$occupationval->title;
			
			//$p->employer_industry_opt =$emp_industry->title;
			$p->industry_isic =$industryisic->title;
			
		    $p->banks =$banksval->title;
			$p->mailing_address_opt = $off_lma;
			
			$p->montlybonus =$monthly_bonus;
			$p->residence_type =$restype;
		
			$off_income = $sanitizer->text($_POST['off_income']);
			$pan = $sanitizer->text($_POST['pan']);
			$OtherDocType = $sanitizer->text($_POST['other_id']);
			$passport_no = $sanitizer->text($_POST['passport_no']);
			$passport_validity = $sanitizer->text($_POST['passport_validity']);
			$lic_no = $sanitizer->text($_POST['lic_no']);
			$lic_validity = $sanitizer->text($_POST['lic_validity']);
			$voter_id = $sanitizer->text($_POST['voter_id']);
			$voter_validity = $sanitizer->text($_POST['voter_validity']);

			/*new field*/
			//$emi_amt = $sanitizer->text($_POST['emi_amt']);
			//$mode_of_salary = $sanitizer->text($_POST['mod_salary']);
			$per_add1 =$sanitizer->text($_POST['pa1']);
			$per_add2 =$sanitizer->text($_POST['pa2']);
			$per_add3 =$sanitizer->text($_POST['pa3']);
			$per_pincode =$sanitizer->text($_POST['ppincode']);
			$PermAddrSameAsResAddr =$sanitizer->text($_POST['sameasResiAdd']);
			//$loan_amount =$sanitizer->text($_POST['loan_amount']);
			$totexp =$sanitizer->text($_POST['total_exp']);
			$company_name =$sanitizer->text($_POST['company_name']);
			$company_code =$sanitizer->text($_POST['company_code']);
			$ofc_email =$sanitizer->text($_POST['ofc_email']);
			$pagetype =$sanitizer->text($_POST['pagetype']);
			$p->start_of_business = $start_of_business;
			$p->current_yr_audited = $current_yr_audited;	
			$p->PermAddrSameAsResAddr =$PermAddrSameAsResAddr;
			//$p->emi_amt = $emi_amt;
			$p->work_type_new = $work_type;
		
			$otherdocumentdate=null;
			if($OtherDocType=="346" || $voter_id!=""){ //voterid
			 $p->document_number = $voter_id;
			 $p->document_validity = $voter_validity;
			 $otherdocumentdate =$voter_validity;
			 $otherdocumentno =$voter_id;
			 $otherdocumenttype ="T0346";
			}else if($OtherDocType=="98" || $lic_no!=""){
			  $p->document_number = $lic_no;
			 $p->document_validity = $lic_validity;
			 $otherdocumentno =$lic_no;
			 //$otherdocumentdate =$lic_validity;
			 $otherdocumenttype ="T0098";
			}else if($OtherDocType=="231" || $passport_no!=""){
				$p->document_number = $passport_no;
			 	$p->document_validity = $passport_validity;
				$otherdocumentno =$passport;
				$otherdocumentdate =$passport_validity;
				$otherdocumenttype ="T0231";
			}
			if($otherdocumentdate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $otherdocumentdate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}
			/* new fields */
			$apigender=array("1"=>"M","2"=>"F");
			// $pincodes = $pages->find("template=cc_location_master,title={$pincode}");
			// if (count($pincodes)) {
			// 	foreach ($pincodes as $pin) {
			// 		$addcity =$pin->city;
			// 		$addstate = $pin->state;
			// 	}
			// }
			// $pincodes_off = $pages->find("template=cc_location_master,title={$off_pincode}");
			// if (count($pincodes_off)) {
			// 	foreach ($pincodes_off as $pinoff) {
			// 		$offcity =$pinoff->city;
			// 		$offstate = $pinoff->state;
			// 	}
			// }
			$initiatedbyres="";
			$initiatedbyoff="";
			$initiatedby="";
			$PincodeM = getmasterPincodes('CC');
			if(!empty($PincodeM[$pincode]['city'])){
				$addstate = $PincodeM[$pincode]['state'];
				$addcity = $PincodeM[$pincode]['city'];
				$initiatedbyres = $PincodeM[$pincode]['initiated_by'];
			}
			if(!empty($PincodeM[$off_pincode]['city'])){
				$offcity = $PincodeM[$off_pincode]['city'];
				$offstate = $PincodeM[$off_pincode]['state'];
				$initiatedbyoff = $PincodeM[$off_pincode]['initiated_by'];
			}
			$initiatedby = $initiatedbyres;
			if($initiatedbyres =="" && $initiatedbyoff!=""){
				$initiatedby =$initiatedbyoff;
			}
			if($initiatedby==""){
				$status ="0";
				$errormsg ="Thank you for your interest in a Standard Chartered Credit Card. We regret to inform you, that we are unable to proceed with your application as it doesnot meet the prescribed policy requirements.";
				$errflag =2;
			}
			$p->org_code =$initiatedby;
			$p->employer_name = $employer_name;
			$p->pincode = $pincode;
			$p->mothly_income = $mothly_income;

			$p->person_title_opt = $title;
			$p->fname = $fname;
			$p->mname = $mname;
			$p->lname = $lname;
			$p->gender = $gender;
			$p->education = $education;
			$p->dob = $dob;
			$p->address = $add1." ".$add2." ".$add3;
			if($PermAddrSameAsResAddr=="1"){
				$per_add1 =$add1;
				$per_add2=$add2;
				$per_add3=$add3;
				$per_city =$addcity;
				$per_state=$addstate;
			$p->permanent_address = $add1." ".$add2." ".$add3;
			$p->perma_pincde =$pincode; 
			$per_pincode =$pincode;
			}else{
			// 	$permanent_pincodes = $pages->find("template=cc_location_master,title={$per_pincode}");
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
			}
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;
			if($per_city!="" && $per_state!=""){
				$p->city = $per_city;
				$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_state." ".$per_pincode;	
			}else{
				$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_pincode;
			}
			$p->city = $addcity;
			$p->state = $addstate;
			$p->pincode =$pincode;
			$p->landmark = $landmark;	
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->citycode =$offcity;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			//$p->work_type_new = $work_type;
			$p->office_income = $off_income; //basic income
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->total_exp = $totexp;
			if($employment_type=="4" || $employment_type=="5" || $employment_type=="6" || $employment_type=="1"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3"){
					$salariedcode ="T0036";
				}

			$timestamp = date('Y/m/d H:i:s');

			$p->pan = $pan;
			$p->income_document_type = $document_type;
			$p->employer_industry = $employer_industry;
			$p->email = $email;
			//$p->product = $product;
			$p->pincode = $pincode;
			$p->employment_type = $employment_type;
			//$p->employer_name = $employer_name;
			$p->office_lma =$ofc_email;
			/* new fields */
			$p->address = $add1." ".$add2." ".$add3;
			$p->permanent_address = $per_add1." ".$per_add2." ".$per_add3." ".$per_city." ".$per_pincode;
			$p->perma_pincode =$per_pincode;
			$p->purpose_opt = $purpose;
			//$p->landmark = $landmark;	
			// $p->occupation = $off_occ;
			$p->office_address = $off_add1." ".$off_add2." ".$off_add3;
			$p->office_landmark = $off_landmark;
			$p->office_state = $offstate;
			$p->office_pincode = $off_pincode;
			$p->office_phone = $off_phone;
			$p->off_lma = $ofc_email;
			$p->office_income = $off_income;
			$p->total_income = $off_income_total;
			$p->other_income = $off_income_other;
			$p->pan = $pan;
			//$p->work_exp =$WorkExp;
			//$p->other_industry =$TypeOfOrg;
			//$p->account_number =$salarybank;
			$otherdocumentdate=null;
			// if($OtherDocType=="aadhar_details"){ //voterid
			//  $p->voter_id = $voter_id;
			//  $p->voter_validity = $voter_validity;
			//  $otherdocumentdate =$voter_validity;
			//  $otherdocumentno =$voter_id;
			//  $otherdocumenttype ="T0346";
			// }else if($OtherDocType=="license_details"){
			//  $p->lic = $lic_no;
			//  $p->lic_validity = $lic_validity;
			//  $otherdocumentno =$lic_no;
			//  //$otherdocumentdate =$lic_validity;
			//  $otherdocumenttype ="T0098";
			// }else if($OtherDocType=="passport_details"){
			// 	$p->passport = $passport_no;
			// 	$p->passport_validity = $passport_validity;
			// 	$otherdocumentno =$passport;
			// 	$otherdocumentdate =$passport_validity;
			// 	$otherdocumenttype ="T0231";
			// }
			$p->document_type =$OtherDocType;
			if($otherdocumentdate){
			$newotherdtDate = DateTime::createFromFormat("d/m/Y" , $otherdocumentdate);
			$OtherDocDate = $newotherdtDate->format('Y-m-d');
			}			
			if($employment_type=="1" || $employment_type=="Salaried"){
					$salariedcode ="T0235"; //income-document-type-1
				}elseif($employment_type=="2" || $employment_type=="Self Employed Business"){
					$salariedcode ="T0356";
				}elseif($employment_type=="3" || $employment_type=="Self Employed Professional"){
					$salariedcode ="T0036";
				}
			//$selfemployeed="T0036"; //income-document-type-1
			//$status ="2";
			//$argender =array("1"=>"Male","2"=>"Female","3"=>"Other Gender");
			if($restype==1){
				$apirestype ="SO";
			}else if($restype==2){
				$apirestype ="RE";
			}else if($restype==3){
				$apirestype ="LR";
			}else if($restype==4){
				$apirestype ="BA";
			}else if($restype==5){
				$apirestype ="LO";
			}else if($restype==5){
				$apirestype ="CO";
			}
			
			$apigender=array("1"=>"M","2"=>"F","3" =>"T");
			$arrworktype=array("1"=>"F","2"=>"G","3"=>"I","4"=>"J","5"=>"K","6"=>"L","7"=>"Y","8"=>"P");
			//$company_name="ROSA POWER SUPPLY COMPANY LIMITED";
			//$company_code="B3629";
			// $product_type_1 ="340";
			if($cc_product=="28241"){
				//$cc_product ="3"; //visa
				$product_type_1 ="340";
			}
			else if($cc_product=="28237"){
				$product_type_1 ="175"; //emirate
			}
			else if($cc_product=="28233"){
				//$cc_product ="28233"; //9
				$product_type_1 ="233";//maha
			}
			else if($cc_product=="28235"){
				//$cc_product ="28235"; //10
				$product_type_1 ="292";
			}
			else if($cc_product=="28239"){
				// $cc_product ="28239";
				$product_type_1 ="535"; // 31
			}
			else if($cc_product=="28231"){
				// $cc_product ="28231";//digi 31
				$product_type_1 ="528";
			}
			else if($cc_product=="28229"){
				// $cc_product ="28229";//ultimo 25
				 $product_type_1 ="199";
			}


			$postdata =array("leadType"=>"web","pid"=>$p->id,"unique_id"=>$unique_id,"fname"=>$fname,"lname"=>$lname,"emp_name"=>$emp_name,"dob"=>$dob,"mobile"=>$mobile,"gender"=>$apigender[$gender],"email"=>$email,"product_category_1"=>"CC","product_type_1"=>$product_type_1,"promo_code_1"=>"INCC000000FFONLN","education"=>$education,"work_type"=>$arrworktype[$work_type],"res_city"=>$addcity,"res_state"=>$addstate,"res_pincode" =>$pincode,"monthly_income" =>$mothly_income,"income_document_type_1" =>$salariedcode,"pan_no" =>$pan,"res_add1"=>$add1,"res_add2"=>$add2,"res_add3"=>$add3,"off_add1"=>$off_add1,"off_add2"=>$off_add2,"off_add3"=>$off_add3,"off_city"=>$offcity,"off_state"=>$offstate,"off_pincode"=>$off_pincode,"per_add1"=>$per_add1,"per_add2"=>$per_add2,"per_add3"=>$per_add3,"per_city"=>$per_city,"per_state"=>$per_state,"per_pincode"=>$per_pincode,"tenure"=>$tenure,"loan_amount"=>$loan_amount,"total_exp"=>$totexp,"company_code"=>$company_code,"company_name"=>$company_name,"otherdocumenttype"=>$otherdocumenttype,"otherdocumentno"=>$otherdocumentno,"otherdocumentdate"=>$OtherDocDate,'restype'=>$apirestype,'industryisic'=>$hdnindustryisic,"initiatedby"=>$initiatedby,"off_phone"=>$off_phone);
				$file = fopen("logs/logs_07.txt","a");
				fwrite($file,"Req_Post_CC".date("Y-m-d h:i:s").' : '.json_encode($postdata)."\n");
				fwrite($file,"\n");
				fclose($file); 
			// echo '<pre>dff_';
			//  print_r($postdata);
		
		//Error Handle here
		if($errflag==1){
			$responseArr =lmsLeadCreationAIPPersonalLoanCCForNTB($postdata);
			
			$appliationid =$responseArr['appliationid'];
			$duplicateflag =$responseArr['duplicateflag'];
			$errormsg =$responseArr['errormsg'];
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
				$status ="0";
			}
		  	//print_r($responseArr);die;
			
			 $p->save();
			}  //errflag if end here
			 echo json_encode(array("status"=>$status,"unique_id" =>$unique_id,"applicationid"=>$responseArr['appliationid'],"api_msg"=>$errormsg,"existing_customer"=>$existing_rel_scb,"aip_ref_number" =>$responseArr['aipreferencenumber']));
			 exit();
			//echo $unique_id;
			break;

		case '5':
			// echo"<pre>";print_r($_POST);
			$existing_rel_scb = $sanitizer->text($_POST['choice_1']);
			$acc_number = $sanitizer->text($_POST['acc_number']);
			$product_interested = $sanitizer->text($_POST['product_interested']);
			$product = $sanitizer->text($_POST['product']);
			$city = $sanitizer->text($_POST['city']);
			$country = $sanitizer->text($_POST['country']);
			$name = $sanitizer->text($_POST['fname']);
			$full_name_a =explode(" ", $name);
			$mobile_ext = $sanitizer->text($_POST['mobile_ext']);
			$mobile_number = $sanitizer->text($_POST['mobile_number']);
			$mobile_ext_alt = $sanitizer->text($_POST['mobile_ext_alt']);
			$code = $sanitizer->text($_POST['code']);
			$mobile_number_alt = $sanitizer->text($_POST['mobile_number_alt']);
			$email = $sanitizer->text($_POST['email']);
			$utm_param  = $sanitizer->text($_POST['utm_param']);

			$p = new Page();
			$p->of(false);
			$p->template = "lead_template";
			$p->parent = $pages->get(1025);


			$p->title =  $mobile_ext."-".$mobile_number." - ".$unique_id;
			$p->mobile = $mobile_ext."-".$mobile_number;
		   if(count($full_name_a)==3){
			$p->fname = $full_name_a[0];
			$p->mname = $full_name_a[1];
			$p->lname = $full_name_a[2];
			$fname =$full_name_a[0];
			$mname =$full_name_a[1];
			$lname =$full_name_a[2];
			}else{
			$p->fname = $full_name_a[0];
			$p->lname = $full_name_a[1];
			$fname =$full_name_a[0];
			$lname =$full_name_a[1];
			}
			//$p->fname = $name;
			$p->alternate_contact = $mobile_ext_alt."-".$mobile_number_alt;
			$p->email = $email;
			$p->city = $city;
			$p->country = $country;
			$p->product = $product;
			$p->nri_product = $product_interested;
			$p->unique_id = $unique_id;
			$p->existing_rel_scb = $existing_rel_scb;
			$p->account_number = $acc_number;
			$p->utm_channel = $utm_param;
			$p->save();
			//echo $unique_id;
		echo json_encode(array("unique_id" =>$unique_id,"exist_cust"=>$existing_rel_scb,"appliationid"=>""));
			break;

		case '6':
			// print_r($_POST);
			$existing_rel_scb = $sanitizer->text($_POST['choice_1']);
			$relation_type = $sanitizer->text($_POST['relation_type']);
			$industry = $sanitizer->text($_POST['industry']);
			$business_type = $sanitizer->text($_POST['business_type']);
			$constitution = $sanitizer->text($_POST['constitution']);
			$product_interested = $sanitizer->text($_POST['product_of_interest']);
			$city = $sanitizer->text($_POST['city']);
			$name = $sanitizer->text($_POST['fname']);
			$entity_name = $sanitizer->text($_POST['entity_name']);
			$mobile = $sanitizer->text($_POST['mobile']);
			$email = $sanitizer->text($_POST['email']);
			$start_year = $sanitizer->text($_POST['start_year']);
			$start_mm = $sanitizer->text($_POST['start_mm']);
			$turnover = $sanitizer->text($_POST['turnover']);
			$product = $sanitizer->text($_POST['product']);
			$utm_param  = $sanitizer->text($_POST['utm_param']);

			$p = new Page();
			$p->of(false);
			$p->template = "lead_template";
			$p->parent = $pages->get(1025);


			$p->title =  $mobile." - ".$unique_id;
			$p->mobile = $mobile;
			$p->fname = $name;
			$p->email = $email;
			$p->city = $city;
			$p->existing_rel_scb = $existing_rel_scb;
			$p->relation_type = $relation_type;
			$p->employer_industry = $industry;
			$p->business_type = $business_type;
			$p->constitution = $constitution;
			$p->product_of_interest = $product_interested;
			$p->entity_name = $entity_name;
			$p->unique_id = $unique_id;
			$p->start_year = $start_year;
			$p->start_mm = $start_mm;
			$p->turnover = $turnover;
			$p->product = $product;
			//$p->utm_channel =$param;
			$p->utm_channel = $utm_param;
			$p->save();
			echo $unique_id;

			break;	

		default:
			break;
	}

		if(!empty($search_emp)) {
		$search = $sanitizer->text($_POST['search_value']);

		if (empty($search)) {
			echo 'Error';
		      exit;
		}

		// From URL to get webpage contents. 
		$url = "http://imedia.iprospect.co/demo/lms/apis/masters/companies/?q={$search}"; 

		  
		// Initialize a CURL session. 
		$ch = curl_init();  
		  
		// Return Page contents. 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		  
		//grab URL and pass it to the variable. 
		curl_setopt($ch, CURLOPT_URL, $url); 
		  
		$result = curl_exec($ch); 

		echo $result; // it will return json data
		exit();
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


?>