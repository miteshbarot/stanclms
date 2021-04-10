<script type="text/javascript">
	var root = '<?php echo $root; ?>';
	$(document).ready(function(){
		$(".submit_pl_first").click(function(){
			var data = $("#pl_first_form").serialize();
			var mobile ="";
			var mobile1 =$("#mobile1").val();
			var mobile2 =$("#mobile2").val();
			//var mobile3 =$("#mobile3").val();
			if(mobile1!="" && mobile1!="undefined"){
				mobile =mobile1;
			}
			if(mobile2!="" && mobile2!="undefined"){
				mobile =mobile2;
			}
			// if(mobile3!="" && mobile3!="undefined"){
			// 	mobile =mobile3; 
			// }
			if(mobile!=""){
				//$("#verifymobile1").val(mobile);
				$("#verifymobile").val(mobile); 
			}
			
			//console.log(data);
			$.ajax({
	  	        url: root+"apis/form-api/",
				type: 'POST',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response);
					console.log(response.exist_cust+"existing cust");
					console.log('<?=$siteUrl?>');
					if(response.status=="0"){
						alert("Error#"+response.api_msg); return false;
					}else if(response.exist_cust=="1" && response.status=="1"){
						$(this).attr("uk-toggle","target: #modal-otp");
						UIkit.modal('#modal-otp').toggle();
						//verifyOTP();
						//var otpcheck =$("otpcheck").val();
							//https://origination.sc.com/onboarding/www/rtoForms/
						OTPfn('verifymobile','otpvalue','PL');
						$("#hiddenlink").val("https://origination.sc.com/onboarding/www/rtoForms/index.html#/onboarding?products={%22campaign%22:%22INPL00NA00ONLINE%22,%22name%22:%22%22,%22product_category%22:%22PL%22,%22product_category_name%22:%22Personal%20Loan%22,%22product_type%22:6025,%22company_category%22:%22NA%22,%22aggregator_code%22:%22IB99%22,%22aggregator_type%22:%22ETB%22,%22aggregator_instance%22:%22RupeePower%22,%22ext_lead_reference_number%22:%2277bf36fa-925a-46f3-8e2c-a4a1e3282a57%22}");

						//$(".go_etb").attr("href","https://rcwbsit.sc.com/origination/rtob-regression/www/rtoForms/index.html#/onboarding?products={%22campaign%22:%22INPL00NA00ONLINE%22,%22name%22:%22%22,%22product_category%22:%22PL%22,%22product_category_name%22:%22Personal%20Loan%22,%22product_type%22:6025,%22company_category%22:%22NA%22,%22aggregator_code%22:%22IB99%22,%22aggregator_type%22:%22ETB%22,%22aggregator_instance%22:%22RupeePower%22,%22ext_lead_reference_number%22:%2277bf36fa-925a-46f3-8e2c-a4a1e3282a57%22}");
					   
					}else{
						//verifyOTP();
						//if(otpcheck=="VERIFIED"){
					  //  $(".go_etb").attr("href","<?=$siteUrl?>personal-loan/view-quote/?e=1&u="+response.unique_id);
					  $(this).attr("uk-toggle","target: #modal-otp");
					  UIkit.modal('#modal-otp').toggle();
					    OTPfn('verifymobile','otpvalue','PL');
						$("#hiddenlink").val("<?=$siteUrl?>personal-loan/view-quote/?e=1&u="+response.unique_id)
						}

					
					
				},
				error:function(error){
					console.log(error);
				}

			});
		});
		$(".submit_pl_application").click(function(){
			console.log(flag);
			if(flag === false)
			{
				return false;
			}
			var mobile ="";
			var mobile1 =$("#mobile1").val();
			var mobile2 =$("#mobile2").val();
			//var mobile3 =$("#mobile3").val();
			if(mobile1!="" && mobile1!="undefined"){
				mobile =mobile1;
			}
			if(mobile2!="" && mobile2!="undefined"){
				mobile =mobile2;
			}
			// if(mobile3!="" && mobile3!="undefined"){
			// 	mobile =mobile3; 
			// }
			if(mobile!="" && mobile!="undefined"){
				//$("#verifymobile1").val(mobile);
				$("#verifymobile").val(mobile); 
			}

			var data = $("#pl_application_form").serialize();
			console.log(data);
			$.ajax({
	  	        url: root+"apis/form-api/",
				type: 'POST',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response+"st"+response.existing_customer);
					// if(response.existing_customer=="1"){
						
					// }
					if(response.status=="1"){
						window.location.href = root+"personal-loan/documentation/?u="+response.unique_id;
					}else{
						alert("Error #"+response.api_msg); return false;
					}
					
				},
				error:function(error){
					console.log(error);
				}
			});
		});
		$(".cc_first_submit").click(function(){
			var data = $("#cc_first_form").serialize();
			var mobile ="";
			var mobile1 =$("#mobile1").val();
			var mobile2 =$("#mobile2").val();
			var mobile3 =$("#mobile3").val();
			var rtob =$("#rtob").val();
			if(mobile1!="" && mobile1!="undefined"){
				mobile =mobile1;
			}
			if(mobile2!="" && mobile2!="undefined"){
				mobile =mobile2;
			}
			if(mobile3!="" && mobile3!="undefined"){
				mobile =mobile3; 
			}
			if(mobile!="" && mobile!="undefined"){
				$("#verifymobile1").val(mobile);
				$("#verifymobile").val(mobile); 
			}
			console.log(data);
			$.ajax({
	  	        url: root+"apis/form-api/",
				type: 'POST',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response);
					console.log(response.unique_id);
					console.log(response.exist_debitcard+"Debit");
					//$(".go_etb").attr("href","<?=$siteUrl?>credit-card/choose-card/?u="+response);
				if(response.status=="0"){
				alert("Error#"+response.api_msg); return false;
				}else if(response.status=="1"){
				if(response.exist_cust=="1" && response.exist_debitcard=="1"){
					//alert("in gere");
					console.log(response.unique_id+"etb right");
				 //$(".go_etb").attr("href","https://rcwbsit.sc.com/origination/rtob-regression/www/rtoForms/index.html#/onboarding?products="+response.urldata);
				 //$(".preapproved").attr("href","<?=$siteUrl?>credit-card/pre-approved-offer/?u="+response.unique_id);
					OTPfn('verifymobile1','otpvalue1','CC');
					// OTPfn('verifymobile','otpvalue','CC');
			$("#hiddenlink").val("https://origination.sc.com/onboarding/www/rtoForms/index.html#/onboarding?products="+response.urldata);
					$("#hiddenlink1").val("<?=$siteUrl?>credit-card/pre-approved-offer/?u="+response.unique_id);
					}else{
						//alert("else");
				// $(".go_etb").attr("href","<?=$siteUrl?>credit-card/choose-card/?u="+response.unique_id);
						OTPfn('verifymobile','otpvalue','CC');
						$("#hiddenlink").val("<?=$siteUrl?>credit-card/application/?u="+response.unique_id);
				  }
				}
				},
				error:function(error){
					console.log(error);
				}
			});
		});
		$(".submit_cc_application").click(function(){

			var valid = ValidateCCform();
			console.log(valid+"vali");
			
		if(valid==true){
			//alert("valid"); return true;
			console.log(valid+"vali in");
			var data = $("#cc_application_form").serialize();
			console.log(data); 
			$.ajax({
	  	        url: root+"apis/form-api/",
				type: 'POST',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response);
					//return false;
					if(response.status=="1"){
					window.location.href = root+"credit-card/instant-approval/?u="+response.unique_id;
					}else{
						alert("Error #"+response.api_msg); return false;
					}
				},
				error:function(error){
					console.log(error);
				}
			});
			return false;
		 }else{
		  return false;
		}
		});
		$(".submit_nri_btn").click(function(){
			if($(".verification_text1").val() != $(".verification_text2").val()){
				alert("Invalid verification");
			}else{
				var data = $("#msform").serialize();
				console.log(data);
				$.ajax({
		  	        url: root+"apis/form-api/",
					type: 'POST',
					data: data,
					dataType: "json",
					success:function(response){
						console.log(response.unique_id);
						window.location.href = root+"nri/nri-thankyou/?u="+response.unique_id;
					},
					error:function(error){
						console.log(error);
					}

				});
			}
		});
		$(".submit_bb_btn").click(function(){
			
			$(this).attr('disabled');
			$(this).addClass('uk-disabled');

			var data = $("#bb_form").serialize();
			console.log(data);
			$.ajax({
	  	        url: root+"apis/form-api/",
				type: 'POST',
				data: data,
				//dataType: "json",
				success:function(response){
					console.log(response);
					$(this).removeAttr('disabled');
					$(this).removeClass('uk-disabled');

					window.location.href = root+"business-banking/verification/?e=1&u="+response;
					//$(".go_etb").attr("href","<?=$siteUrl?>business-banking/verification/?e=1&u="+response);
				},
				error:function(error){
					console.log(error);
				}
			});
		});
	
$(".otpplvalidate").click(function(){
	var hiddenlink = "hiddenlink"; //$('').val();
	var enterotp = "otpmobile";
	//var otpcheck =$("#otpcheck").val();
	var otpvalue = "otpvalue"; // $("#").val();
	var otpcheck ="otpcheck"; //field name of hidden
	verifyOTP(otpvalue,enterotp,hiddenlink,otpcheck,"go_etb");
});

$(".otpccvalidate").click(function(){
	var hiddenlink = "hiddenlink1"; //$('').val();
	var enterotp = "otpmobile1";
	//var otpcheck =$("#otpcheck").val();
	var otpvalue = "otpvalue1"; // $("#").val();
	var otpcheck ="otpcheck1"; //field name of hidden
	verifyOTP(otpvalue,enterotp,hiddenlink,otpcheck,"preapproved");
});

$(".industry_isic").on('change',function(){
	var hdnisic =$(this).find(':selected').attr('data-id');
	console.log(" h"+$(this).find(':selected').attr('data-id'));
	console.log($(this).attr('data-id'));
	$("#hdnindustryisic").val(hdnisic);
});

});



function verifyOTP(otpval,enterotpval,hdnlink,btnclass,otpcheck) {
    var otp_val = $('#'+otpval).val();
    var entered_otp = $('#'+enterotpval).val();
    var redirectlink = $('#'+hdnlink).val();
    console.log("otoval"+otp_val);
    console.log("entered_otp"+entered_otp);
    if (otp_val == "") {
        $('#'+otpcheck).val("");
        alert("Please Enter your OTP or Generate an OTP");
    }
    else if (otp_val.length != 6) {
        alert("Please Enter correct OTP");
        return false;
    } else if (otp_val === entered_otp) {
        $('#'+otpcheck).val("VERIFIED");
        alert("OTP has been verified");
		dataLayer.push({
		'event':'SC-CC-NonExisting-Verification-OTP-Go'
		});
        //$('.'+btnclass).attr("href",redirectlink);
        window.location.href =redirectlink;
        console.log('done');
        return false;
    }
    else if (otp_val != entered_otp) {       
        alert("Please Enter correct OTP");
        return false;
    }
}

 function OTPResendfn(mobval,hdntxt,ptype){
		event.preventDefault();
		if($('#'+mobval).val()==""){
			alert('Please enter mobile number');
			return false;
		}else{
		var mob =$('#'+mobval).val();
		var data = "mobile="+mob+"&post_type=otp&p="+ptype;
			$.ajax({
	  	        url: root+"apis/form-api-general/",
				type: 'GET',
				data: data,
				dataType: "json",
				success:function(response){
					if(response.status=="1"){
						$("#"+hdntxt).val(response.genotp);
						alert("OTP has been sent"); return false;
					}
				},
				error:function(error){
					console.log(error);
				}
			});
		  return false;
		}
	}

  function OTPfn(mobval,hdntxt,ptype){
		console.log('OTPfn');
		//alert('hello'); return false;
		if($('#'+mobval).val()==""){
			alert('Please enter mobile number');
			return false;
		}else{
		var mob =$('#'+mobval).val();
		var data = "mobile="+mob+"&post_type=otp&p="+ptype;
			$.ajax({
	  	        url: root+"apis/form-api-general/",
				type: 'GET',
				data: data,
				dataType: "json",
				success:function(response){
					if(response.status=="1"){
						$("#"+hdntxt).val(response.genotp);
					}
				},
				error:function(error){
					console.log(error);
				}

			});
		}
	}

/*function getcompany(){
		console.log('OTPfn');
		//alert('hello'); return false;
		var empname =$('#pl_employer_name').val();
		console.log('empname'+empname);
		if(empname==""){
			alert('Please enter the value');
			return false;
		}else{
		var mob =$('#'+mobval).val();
		var data = "empname="+empname+"&post_type=c";
			$.ajax({
	  	        url: root+"apis/form-api-general/",
				type: 'GET',
				data: data,
				dataType: "json",
				success:function(response){
					console.log(response);
					console.log(response.genotp);
					if(response.status=="1"){
						$("#"+hdntxt).val(response.genotp);
					}
					// }else{
					//   //$(".go_etb").attr("href","<?=$siteUrl?>personal-loan/view-quote/?e=1&u="+response.unique_id);
					// }
				},
				error:function(error){
					console.log(error);
				}

			});
		}

	}*/


</script>