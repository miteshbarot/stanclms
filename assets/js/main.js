var flag = false;

// function verifyOTP() {
//     var otp_val = $('#otpvalue').val();
//     var entered_otp = $('#txtotp').val();
//     if (otp_val == "") {
//         $('#otpcheck').val("");
//         alert("Please Enter your OTP or Generate an OTP");
//     }
//     else if ($('#otpvalue').val().length != 6) {
//         alert("Please Enter correct OTP");
//     } else if (otp_val === entered_otp) {
//         $('#otpcheck').val("VERIFIED");
//         alert("OTP has been verified");
//         console.log('done');
//     }
//     else if ($('#otpvalue').val() != entered_otp) {       
//         alert("Please Enter correct OTP");
//     }
// }

function formValidation (event){

    if(event.currentTarget.id == 'nri_choice1'){
          return true;
      }else if(event.currentTarget.name == 'full_name') {
           return !fullnameValidation(event); 
      }else if(event.currentTarget.name == 'full_name2') {
           return !fullnameValidation(event); 
      }else if(event.currentTarget.name == 'full_name1') {
           return !fullnameValidation(event); 
      }else if(event.currentTarget.name == 'acc_number'){
          return  !checkAccountNum(event);
      }else if(event.currentTarget.name == 'mobile_number'){
          return !checkMobile(event);
      }else if(event.currentTarget.name == 'mobile_number_alt'){
          return !checkaltMobile(event);
      } else if(event.currentTarget.name == 'email'){
          return !checkEmail(event);
      }else if(event.currentTarget.name == 'email1'){
          return !checkEmail(event);
      }else if(event.currentTarget.name == 'email3'){
          return !checkEmail(event);
      }else if(event.currentTarget.name == 'mobile1'){
          return !checkMobile(event);
      }else if(event.currentTarget.name == 'pincode'){
          return !checkZipcode(event);
      }else if(event.currentTarget.name == 'mobile2'){
          return !checkMobile(event);
      }else if(event.currentTarget.name == 'emp_name') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'pl_home_emp_name') {
           return !commonValidation(event); 
      } else if(event.currentTarget.name == 'gross_income') {
           return !checkGrossIncome(event); 
      }else if(event.currentTarget.name == 'current_yr_tax_income') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'gross_turnover') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'current_depreciation') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'current_tax') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'prev_tax_income') {
           return !commonValidation(event); 
      }else if(event.currentTarget.name == 'emi_amt') {
           return !commonValidation(event); 
      }
}

function checkEmail(event){
      var email = event.currentTarget.value.trim();  
       if(email === '') {
              $('.emailErr').css('display', 'block').text('Email address must not be blank');
              $(".next-btn").hide();
              return false;
        }else if(emailValidation(email) === false) {
              $('.emailErr').css('display', 'block').text('Invalid email address');
              $(".next-btn").hide();
              return false;
        }else {
              $('.emailErr').css('display', 'none');
              //$(".next-btn").show();
          }
          
        return true;         
} 

function fullnameValidation(event){
      var fullname = event.currentTarget.value.trim();
      var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;  
       if(fullname === '') {
              $('.fullnameErr').css('display', 'block').text('Full Name must not be blank');
              $(".next-btn").hide();
              return false;
        }else if(!regName.test(fullname)) {
              $('.fullnameErr').css('display', 'block').text('Please enter your full name (first & last name)');
              $(".next-btn").hide();
              $('#full_name').focus();
              return false;
        }else {
              $('.fullnameErr').css('display', 'none');
              //$(".next-btn").show();
          }
          
        return true;         
} 

function checkZipcode(event){
          var pincode = event.currentTarget.value.trim();
           var zipregex   = /^\d{6}$/
           if(pincode === '') {
              $('.pinErr').css('display', 'block').text('Zip must not be blank');
              $(".next-btn").hide();
              return false;
           }else if(!pincode.match(zipregex)) {
              $('.pinErr').css('display', 'block').text('Zipcode must have six digits');
              $(".next-btn").hide();
              return false;
           }else {
             $('.pinErr').css('display', 'none');
             //$(".next-btn").show();
           }
           return true; 
} 
function checkGrossIncome(event){
          var grossincome = event.currentTarget.value.trim();
           if(grossincome === '') {
              $('.commonErr').css('display', 'block').text('Gross income must not be blank');
              $(".next-btn").hide();
              return false;
           }else if(grossincome <=25000) {
             // $('.commonErr').css('display', 'block').text('Gross income must be');
             //alert('Thank you for your interest in Standard Chartered Personal Loan. We regret to inform you that we are unable to proceed with your application process at this point in time our internal policy guidelines. Please check and submit in case you have entered anything incorrectly.')
              alert("Thank you for your interest in a Standard Chartered Personal Loan. We regret to inform you, that we are unable to proceed with your application as it doesn’t meet the prescribed policy requirements.")
              //window.location.href="https://imedia.iprospect.co/in/onlineleads/personal-loan/";
              $(".next-btn").hide();
              return false;
           }else {
             $('.commonErr').css('display', 'none');
             //$(".next-btn").show();
           }
           return true; 
} 

function checkVerify(event, code) {
          var verify = event.currentTarget.value.trim();
          if(verify === '') {
              $('.verifyErr').css('display', 'block').text('Please enter Captcha');
              return false;
           }else if(verify !== code){
              $('.verifyErr').css('display', 'block').text('Captcha does not matched!');
              return false;
           }
           else {
             $('.verifyErr').css('display', 'none');
           }
          
           return true; 
}

function checkAccountNum(event) {
          var account_number = event.currentTarget.value.trim();
          if(account_number === '') {
              $('.accErr').css('display', 'block').text('Account Number must not be blank');
              $(".next-btn").hide();
              return false;
           }else {
             $('.accErr').css('display', 'none');
             //$(".next-btn").show();
           }
           return true; 
}


  $('#chkauth1,#chktc1,#chkauth,#chktc').click(function(){
    var dnd_check = $('#chkauth1').is(':checked');
    var term_cond = $('#chktc1').is(':checked');
    var dnd_check_1 = $('#chkauth').is(':checked');
    var term_cond_1 = $('#chktc').is(':checked');
    if((dnd_check == true && term_cond == true) || (dnd_check_1 == true && term_cond_1 == true)){
        $('.submit_pl_first').removeAttr("disabled");
        $('.submit_pl_first').removeClass("btngrey");

    }else {
         //alert('Check DND/NDNC* and Terms and Condition !!');
         $('.submit_pl_first').attr("disabled", "true");
         $('.submit_pl_first').addClass("btngrey");
        
    }

});

$('#chkauth_cc1,#chktc_cc1,#chkauth_cc2,#chktc_cc2,#chkauth_cc3,#chktc_cc3').click(function(){
    var chkauth_cc1 = $('#chkauth_cc1').is(':checked');
    var chktc_cc1 = $('#chktc_cc1').is(':checked');
    var chkauth_cc2 = $('#chkauth_cc2').is(':checked');
    var chktc_cc2 = $('#chktc_cc2').is(':checked');
    var chkauth_cc3 = $('#chkauth_cc3').is(':checked');
    var chktc_cc3 = $('#chktc_cc3').is(':checked');
    if((chkauth_cc1 == true && chktc_cc1 == true) || (chkauth_cc2 == true && chktc_cc2 == true) ||(chkauth_cc3 == true && chktc_cc3 == true)){
        $('.cc_first_submit').removeAttr("disabled");
        $('.cc_first_submit').removeClass("btngrey");
    }else {
         //alert('Check Terms and Condition and Credit Bureau Check * !!');
         $('.cc_first_submit').attr("disabled", "true");
         $('.cc_first_submit').addClass("btngrey");
        
    }

});

function checkMobile(event){
          
          var mobile = event.currentTarget.value.trim();
          var phno   = /^\d{10}$/
      
          // $('.submit_pl_first').prop('disabled', true);
           if(mobile === '') {
              $('.mblErr').css('display', 'block').text('Mobile must not be blank');
              $('.submit_pl_first').prop('disabled', true);
              $(".next-btn").hide();
              return false;
           }else if(!mobile.match(phno)) {
               $('.mblErr').css('display', 'block').text('Invalid mobile number');
               $(".next-btn").hide();
              return false;
           }else {
              $('.mblErr').css('display', 'none');
              //$(".next-btn").show();
          }
       
           // $('.submit_pl_first').prop('disabled', false);
        
           return true; 
} 

function checkaltMobile(event){
          var mobile = event.currentTarget.value.trim();
          var phno   = /^\d{10}$/

           
           if(mobile === '') {
              $('.altmblErr').css('display', 'block').text('Mobile must not be blank');
              $(".next-btn").hide();
              return false;
           }else if(!mobile.match(phno)) {
               $('.altmblErr').css('display', 'block').text('Invalid mobile number');
               $(".next-btn").hide();
              return false;
           }else {
                $('.altmblErr').css('display', 'none');
                //$(".next-btn").show();
          }
           return true; 
}

function commonValidation(event) {
         var fieldname = event.currentTarget.value.trim();
          if(fieldname === '') {
            $('.commonErr').css('display', 'block').text('Field should not be blank');
            $(".next-btn").hide();
            return false;
          }else  {
            $('.commonErr').css('display','none');
            //$(".next-btn").show();
         } 

          return true;
}


function emailValidation(email){
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        return true;
    }
        return false;
} 


function delay(callback, ms) {
    var timer = 0;
    return function() {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, ms || 0);
    };
}
function setCookie(cname, cvalue, exmin) {
  var d = new Date();
  d.setTime(d.getTime() + (exmin*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function numberWithCommas(x) {
  x=x.toString();
  var lastThree = x.substring(x.length-3);
  var otherNumbers = x.substring(0,x.length-3);
  if(otherNumbers != '')
      lastThree = ',' + lastThree;
  var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
  return res;
}
function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}
$(document).ready(function(){

// $('.checkpincode').keypress(function(e) { 
//     var MyZipCode=$(this).val();
//     console.log(MyZipCode);
//     if(lines[MyZipCode] == undefined){
//       }

// });



  setUTMparameters();
  var optionempval =$('select[name=emp_type] option').filter(':selected').val();
  console.log("option val Occupation"+optionempval);
  showOccupationFields(optionempval);
$(".btn_proceedCC").click(function(){
  console.log("bb no need");
          $("#modal-rs1").addClass('uk-close');
          $("#modal-rs1").removeClass('uk-open');
      });
    $(".onlydigit").keypress(function(e){if(e.which!=8&&e.which!=0&&(e.which<48||e.which>57)){e.preventDefault();return false;}})
    $(".alpha-only").on("keydown", function(event){
      // Allow controls such as backspace, tab etc.
      var arr = [8,9,16,17,20,32,35,36,37,38,39,40,45,46];
      // Allow letters
      for(var i = 65; i <= 90; i++){
        arr.push(i);
      }
      // Prevent default if not in array
      if(jQuery.inArray(event.which, arr) === -1){
        event.preventDefault();
      }
  });
    $("#other_id").change(function(){
      $(".voter_details, .aadhar_details , .passport_details , .license_details").hide();
      $("." + $(this).find(':selected').data('id')).show();
      setCookie("otherId" , $(this).val() , 15);
    });
     $("#education , #pl_homepin").one('click',function(){
      $(".employment-bg").trigger("click");
     });
     $("#ploff_income_other, #pl_app_gincome").one('focus',function(){
      $(".identity-bg").trigger("click");
     });

      $('.add-income').on('change', function(){
          var monthlyincome = $('#grossmonthlyincome').val().trim();
          var cardid = $('#cardid').val().trim();
          var sourceofincome =$("#form-stacked-select").val().trim();
          console.log(sourceofincome+" g"+monthlyincome);
          var yearincome = $('#annualincome').val().trim();
          if(monthlyincome!=""){
              var finalincome =monthlyincome*12;
               finalincome = finalincome.toString();
             // var len = $('#grossmonthlyincome').val().length;
            }
            if(yearincome!=""){
              var finalincome =yearincome;
               finalincome = finalincome.toString();

            }
            console.log("final"+finalincome+" L:"+finalincome.length);
         // if (monthlyincome === '' ||  yearincome] === '') {
           if (finalincome=="") {
            console.log("iff");
            //$( ".cc_first_submit" ).prop('disabled', true);
            $('.mthlyErr').css('display', 'block').text('Enter your income');
            return false;
          }else if(finalincome<2400000 && sourceofincome=="1" && cardid=="28229"){
            alert('Thank you for your interest in a Standard Chartered Credit Card. We regret to inform you, that we are unable to proceed with your application as it doesn’t meet the prescribed policy requirements.');
             return false;
          }else if(finalincome<1200000 && sourceofincome=="1" && cardid=="28237"){
            alert('Thank you for your interest in a Standard Chartered Credit Card. We regret to inform you, that we are unable to proceed with your application as it doesn’t meet the prescribed policy requirements.');
             return false;
          }
          else if(finalincome<300000 && sourceofincome=="1"){
           alert('Thank you for your interest in a Standard Chartered Credit Card. We regret to inform you, that we are unable to proceed with your application as it doesn’t meet the prescribed policy requirements.');
            return false;
          }else if(finalincome<500000 && sourceofincome=="3"){
            alert('Thank you for your interest in a Standard Chartered Credit Card. We regret to inform you, that we are unable to proceed with your application as it doesn’t meet the prescribed policy requirements.');
            return false;
          }
          else {
              $('.mthlyErr').css('display', 'none')
          }
          // $(".cc_first_submit" ).prop( "disabled", false);
     });

      $('.mobile2').on('change', function(){
          var mobile = $('#mobile2').val().trim();
          var phno   = /^\d{10}$/
         // $('.cc-btn-dsb').prop('disabled', true);
          if (mobile === '') {
            $('.mblErr').css('display', 'block').text('Enter your mobile number');
            return false;
          }else if(!mobile.match(phno)) {
               $('.mblErr').css('display', 'block').text('Invalid mobile number');
              return false;
           }else {
                $('.mblErr').css('display', 'none');
          }
         //$('.cc-btn-dsb').prop('disabled', false);
     });

      // $('.pl-home-btn-dsb').on('change', function(){
      //       var pl_mob_number = $('#mobile1').val().trim();
      //       var phno   = /^\d{10}$/
      //     $('.submit_pl_first').prop('disabled', true);
      //     if (pl_mob_number === '') {
      //       $('.mblErr').css('display', 'block').text('Enter your mobile number');
      //       return false;
      //     }else if(!pl_mob_number.match(phno)) {
      //          $('.mblErr').css('display', 'block').text('Invalid mobile number');
      //         return false;
      //      }else {
      //           $('.mblErr').css('display', 'none');
      //     }
      //     $('.submit_pl_first').prop('disabled', false);

      // });

  	$(".tabs_head").click(function(){
    		$(".tabs_head").removeClass("tabs_head_active");
    		$(this).addClass("tabs_head_active");
    		var id = $(this).attr("id");
    		var id = "#para_"+((id.split("_"))[1]);
    		$(".tabs_para").hide();
      if(window.innerWidth >= 768){  
    		$(id).show();
      }else{
        $(id).toggle(); 
      }
    });
    var current = [];
    var tags = [];
    var previous_from_element = [];
    $(".form-item select").change(delay(function (e) {
          var target = $(this).children("option:selected").data('target');
          if(target != undefined){
            current.push($(this).children("option:selected").data('current'));          
            $(".form-item").removeClass("active");
            $("."+target).addClass("active");
            //console.log(current);

            $("#progressbar li").removeClass("active");
            if(current.length <=2){
              $("#progressbar li:nth-child(1)").addClass("active");
            }else if(current.length >= 8){
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
            }else{
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
            }
          }
      }, 1250));
      $(".form-item input[type=radio]").change(delay(function (e) {

          if(formValidation(e)){
            return;
          }
          var target = $(this).data('target');
          if(target != undefined){
            current.push($(this).data('current'));
            $(".form-item").removeClass("active");
            $("."+target).addClass("active");
            //console.log(current);

            $("#progressbar li").removeClass("active");
            if(current.length <=2){
              $("#progressbar li:nth-child(1)").addClass("active");
            }else if(current.length >= 8){
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
            }else{
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
            }
          }
      }, 1250));
      $('.form-item input[type=text], input[type=email]').keyup(delay(function (e) {
  
          if(formValidation(e)){
            return;
          }

        

          var target = $(this).data('target');
          if(target != undefined){

            /*if ($(this).hasClass('pl_employer_name')) {

              var thisVal = $(this).val();
              var url = "http://imedia.iprospect.co/demo/lms/apis/masters/companies/?q="+thisVal;

              $("#companies_ajax ul").empty();

              $.get(url, function( data ) {
                $.each( data.message, function( key, value ) {
                  //console.log(value.code + ": " + value.title );
                  $("#companies_ajax ul").append("<li><a data-code='"+value.code+"' data-title='"+value.title+"'>"+value.title+"</a></li>");
                });
                //console.log(data);
              });

              $("#companies_ajax a").on("click",function(){
                alert('clicked');
                  $("#pl_employer_name").val($(this).data('title'));
                  $("#emp_code").val($(this).data('code'));
                  $("#companies_ajax ul").empty();

                  setTimeout(function() {
                    current.push($(this).data('current'));
                    $(".form-item").removeClass("active");
                    $("."+target).addClass("active");
                    console.log(current);   
                  }, 500);
              });

            }else{
                current.push($(this).data('current'));
                $(".form-item").removeClass("active");
                $("."+target).addClass("active");
                console.log(current);   
            }  */

            /*Amit code start*/
          if ($(this).hasClass('pl_employer_name')) {
                var searchName = $('#pl_employer_name');
              $( "#pl_employer_name" ).autocomplete({
                minLength: 0,
                classes: {
                    "ui-autocomplete": "dropdownList"
                },
                search: function(){
                  searchName.addClass('loading');
                },
                source: function(request, response){
                  var searchKey = request["term"];
                  // $.get('http://imedia.iprospect.co/demo/lms/apis/masters/companies/?post_type=c&q="'+searchKey+'', function(data) {
                       
                   $.get('https://stanclms.iprospect.co/apis/form-api-general/?post_type=c&q='+searchKey+'', function(data) {
                      //console.log('Data->'+data.message);
                          if(data == "" || typeof data == 'undefined') {
                            alert('Record not found');
                            return;
                          }
                          if(data.message == "No company found") {
                            alert("No company found");
                            return;
                          }
                        data = JSON.parse(data);  
                        var tagList = [];
                        searchName.removeClass('loading');
                        $.each(data.message, function( key, value ) {
                          // console.log(value.code + ": " + value.title);
                              tagList.push({ label: value.title, value: value.title ,code: value.code });
                        });
                        response(tagList);
                   });
                },
             open: function( event, ui ) {
              searchName.removeClass('loading');
              
             },
            response: function( event, ui ) {
              searchName.removeClass('loading');
            
             },
            select: function( event, ui ) {
                $('#emp_code').val(ui.item.code);
                setTimeout(function(){
                  current.push(event.target.dataset.current);
                  $(".form-item").removeClass("active");
                  $("."+target).addClass("active");
                  //console.log(current);  
                  $("#progressbar li").removeClass("active");
                  if(current.length <=2){
                    $("#progressbar li:nth-child(1)").addClass("active");
                  }else if(current.length >= 8){
                    $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
                  }else{
                    $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
                  }
                },1000 * 1.5);
              }
          });
          }
            
            /*Amit code end*/    
            if(e.currentTarget.name == 'pl_home_emp_name') return;
            current.push($(this).data('current'));
            $(".form-item").removeClass("active");
            $("."+target).addClass("active");
            //console.log(current);  
            

            $("#progressbar li").removeClass("active");
            if(current.length <=2){
              $("#progressbar li:nth-child(1)").addClass("active");
            }else if(current.length >= 8){
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
            }else{
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
            }
          }
      }, 1250));

    $(".back-btn").click(function(){
      $(".form-item").removeClass("active");
      $("."+current[current.length-1]).addClass("active");
      current.pop();
      //console.log(current);
            $("#progressbar li").removeClass("active");
            if(current.length <=2){
              $("#progressbar li:nth-child(1)").addClass("active");
            }else if(current.length >= 8){
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
            }else{
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
            }
    });
    $(".next-btn").click(function(){
      $(".form-item").removeClass("active");
      var target = $(this).data('target');
      current.push($(this).data('current'));
      $("."+target).addClass("active");
      //console.log(current);
          $("#progressbar li").removeClass("active");
            if(current.length <=2){
              $("#progressbar li:nth-child(1)").addClass("active");
            }else if(current.length >= 8){
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2),#progressbar li:nth-child(3)").addClass("active");
            }else{
              $("#progressbar li:nth-child(1),#progressbar li:nth-child(2)").addClass("active");
            }
    });
    $(".cc_rs").change(function(){
      if($(this).val() == "Super Value Titanium"){
        alert("You cannot apply for the card variant you already hold.");
        $(this).val("Select Card");
      }
    });

    $(".form_slider").submit(function(e){
      e.stopPropagation();
      e.preventDefault();
    });

    $(".faqs li .uk-accordion-title").click(function(){
          var ic = $(this).find("span").attr("uk-icon");
          if(ic == "icon:plus"){
            $(this).find("span").attr("uk-icon","icon:minus");
          }else{
            $(this).find("span").attr("uk-icon","icon:plus");
          }
      });

     $(".compare_cards").click(function(){
        var len = $('.uk-checkbox:checked').length;
        if(len>=2){
          $(".card_slider_wrapper > ul > li").each(function () {
            var a = $(this).find("input[type='checkbox']");
            //console.log(a);
            if(! a[0].checked){
              $(this).remove();
              $(".view_all").show();
              $(".compare_cards_wrapper").hide();
            }
          });
        }else{
          alert("Please select more than 1 card");
        }
     });
    
    $(".verification_text2").val(makeid(4));
     $(".refresh_id").click(function(){
      $(".verification_text2").val(makeid(4));
     });

     $(".country_select").change(function(){
        $(".country_ext").val($(this).find(':selected').attr('data-code'));
     });

     $( function() {
      $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: '-99:-18',
          dateFormat: 'dd/mm/yy'
        });
      $( ".datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          //yearRange: '-99:-18',
          minDate: new Date(),
          dateFormat: 'dd/mm/yy'
        });
    });
     // range input js
     $( "#slider").slider({
        range: "min",
        max: 1000000,
        value: 500000,
        min:300000
    });
    $( "#slider2").slider({
        range: "min",
        max: 5,
        value: 3,
        min:1,
        step:1
    });
      var handle = $( "#custom-handle" );
      $( "#slider" ).slider({
        create: function() {
          handle.val( $( this ).slider( "value" ) );
        },
        slide: function( event, ui ) {
          handle.val( numberWithCommas(ui.value) );
        }
      });
      var handle2 = $( "#custom-handle2" );
      $( "#slider2" ).slider({
        create: function() {
          handle2.val( $( this ).slider( "value" ) );
        },
        slide: function( event, ui ) {
          handle2.val( ui.value );
        }
      });


      $("#custom-handle").on("change keyup paste click", function(){
        $("#slider").slider("value", $(this).val());
      });
      $("#custom-handle2").on("change keyup paste click", function(){
        $("#slider2").slider("value", $(this).val());
      });

      $('.submit_pl_application').click(function(e){
	     e.preventDefault();
	  
       	  var title = $('#title').val();
          var firstname = $('#fname').val();
      	  var lastname = $('#lname').val();
          var gender = $('#gender').val();
      	  var email = $('#email').val();
      	  var education  = $('#education').val();
      	  var dob = $('#datepicker').val();
      	  var add1  = $('#add1').val();
      	  var purpose  = $('#purpose').val();
      	  var landmark  = $('#landmark').val();	
      	  var pincode  = $('#pincode').val();
      	  var pl_company  = $('#pl_company').val();
          var emp_type  = $('#emp_type').val();
          console.log('EMP_TYPE->'+ typeof emp_type);
          var work_type  = $('#work_type').val();
          var gross_income  = $('#gross_income').val();
          var off_add1  = $('#off_add1').val();
          var off_landmark  = $('#off_landmark').val();
          var off_state  = $('#off_state').val();
          var pl_pincode  = $('#pl_pincode').val();
          var pl_app_industry  = $('#pl_app_industry').val();
          var off_lma  = $('#off_lma').val();
          var pl_app_gincome  = $('#pl_app_gincome').val();
          var off_income_total  = $('#off_income_total').val();
          var ploff_income_other  = $('#ploff_income_other').val();
          var pan  = $('#pan').val();
          var start_date  = $('#start_date').val();
          var dsc_applicant  = $('#dsc_applicant').val();
          var curr_yr_tax  = $('#curr_yr_tax').val();
          var cygt  = $('#cygt').val();
          var itr_audited  = $('.itr_audited').val();
          var pyti  = $('#pyti').val();
          var mod_salary  = $('#mod_salary').val();
          var profession  = $('#profession').val();
          var current_year_taxable_income  = $('#current_year_taxable_income').val();
          var totexp  = $('#totexp').val();
          var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
          var zipregex = /^\d{6}$/i;
          var panregex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/; 
          if(firstname == ''){
            alert('First Name cannot be blank!!');
            $('#fname').focus();
            return false; 
          }
          if(lastname == ''){
            alert('Last Name cannot be blank!!');
            $('#lname').focus();
            return false; 
          }
          if(title == ''){
            alert('Title cannot be blank!!');
            $('#title').focus();
            return false; 
          }
          if(gender == ''){
            alert('Gender cannot be blank!!');
            $('#gender').focus();
            return false; 
          }  
          if(email == ''){
            alert('Email cannot be blank!!');
            $('#email').focus();
            return false; 
          }else if(!pattern.test(email))
          {
            alert('Not a valid e-mail address');
            $('#email').focus();
            return false;
          }
          if(education == '' || education == 'Select'){
            alert('Education cannot be blank!!');
            $('#education').focus();
            return false; 
          }
          if(dob == ''){
            alert('DOB cannot be blank!!');
            $('#datepicker').focus();
            return false; 
          }
          if(add1 == ''){
            alert('Address Line 1 cannot be blank!!');
            $('#add1').focus();
            return false; 
          }
          if(purpose == '' || purpose == 'Select'){
            alert('Purpose of loan cannot be blank!!');
            $('#purpose').focus();
            return false; 
          } 
          if(landmark == ''){
            alert('Landmark of loan cannot be blank!!');
            $('#landmark').focus();
            return false; 
          } 	 
          if(pincode === '') {
            alert('Zip must not be blank');
            $('#pincode').focus();
            return false;
          }
          if(pl_company == ''){
            alert('Company/Employer  cannot be blank!!');
            $('#pl_company').focus();
            return false; 
          }	
           if(emp_type == '' || emp_type == 'Select'){
            alert('Occupation cannot be blank!!');
            $('#emp_type').focus();
            return false; 
          } 
             
          if(work_type == '' || work_type == 'Select'){
          alert('Work Type cannot be blank!!');
          $('#work_type').focus();
          return false; 
          } 
          if(emp_type == '4' || emp_type == '5' || emp_type == '6'){
           if(gross_income == '' ) {
            alert('Net monthly income must not be blank');
            $('#gross_income').focus();
            return false;
          }
        }

          if(off_add1 == ''){
          alert('Office Address 1 cannot be blank!!');
          $('#off_add1').focus();
          return false; 
          } 

          if(off_landmark == ''){
          alert('Office Landmark cannot be blank!!');
          $('#off_landmark').focus();
          return false; 
          } 

          if(off_state == '' || off_state == 'Select'){
            alert('Office State cannot be blank!!');
            $('#off_state').focus();
            return false; 
          } 
           if(pl_pincode == '') {
            alert('Office PinCode must not be blank');
            $('#pl_pincode').focus();
            return false;
          }  
          if(pl_app_industry == '' || pl_app_industry == 'Select') {
            alert('Industry(ISIC) must not be blank');
            $('#pl_app_industry').focus();
            return false;
          } 
          if(off_lma == '' || off_lma == 'Select') {
            alert('Loan mailing address must not be blank');
            $('#off_lma').focus();
            return false;
          } 
          if(pl_app_gincome == '' ) {
            alert('Annual gross income must not be blank');
            $('#pl_app_gincome').focus();
            return false;
          } 
          if(off_income_total == '' ) {
            alert('Total income must not be blank');
            $('#off_income_total').focus();
            return false;
          } 

          if(ploff_income_other == '' ) {
            alert('Other income must not be blank');
            $('#ploff_income_other').focus();
            return false;
          } 
         if(emp_type == '2' || emp_type == '3'){
          if(start_date == '' ) {
            alert('Start date for current Business/Profession must not be blank');
            $('#start_date').focus();
            return false;
          }
        }

        if(emp_type == '2'){
          if(dsc_applicant == '' || dsc_applicant == 'Select') {
            alert('Choose option that best describes applicant must not be blank');
            $('#dsc_applicant').focus();
            return false;
          }
        }
        if(emp_type == '2' || emp_type == '3'){
          if(curr_yr_tax == '') {
            alert('Current year taxable income must not be blank');
            $('#curr_yr_tax').focus();
            return false;
          } 
        }
        if(emp_type == '2'){
          if(cygt == '') {
            alert('Current year gross turnover must not be blank');
            $('#cygt').focus();
            return false;
          }
        } 

          if(itr_audited == '') {
            alert('Is current year ITR audited must not be blank');
            $('.itr_audited').focus();
            return false;
          }
        if(emp_type == '2' || emp_type == '3'){ 
          if(pyti == '') {
            alert('Previous year taxable income must not be blank');
            $('#pyti').focus();
            return false;
          } 
        }
        if(emp_type == '2' || emp_type == '3'){ 
          if(mod_salary == '' || mod_salary =='Select') {
            alert('Mode of salary must not be blank');
            $('#mod_salary').focus();
            return false;
          }
        }
        if(emp_type == '3'){
          if(profession == '' || profession == '0') {
            alert('Occupation Type must not be blank');
            $('#profession').focus();
            return false;
          }
        }
        if(emp_type == '3'){
          if(current_year_taxable_income == '' ) {
            alert('Current year business income must not be blank');
            $('#current_year_taxable_income').focus();
            return false;
          }
        }  
        if(emp_type == '6'){
          if(totexp == '' ) {
            alert('Total Work Experience must not be blank');
            $('#totexp').focus();
            return false;
          }
        }
	 

          if(!panregex.test(pan)){       
            alert("invalid PAN no");
            $('#pan').focus();    
            return panregex.test(pan);    
          }
        // if ($("#check1").not(":checked")) {
        //      alert("Check the term and condtion!!");
        //       $('#check1').focus();
        //      return false;
        //   } 
       return flag = true;	
              
    });
    $('.update_form').click(function(e){

          var title = $('#title').val();
          var firstname = $('#fname').val();
          var lastname = $('#lname').val();
          var gender = $('#gender').val();
          var email = $('#email').val();
          var education  = $('#education').val();
          var dob = $('#datepi').val();
          var mobile = $('#mobile').val();
          var pincode  = $('#pincode').val();
          var address  = $('#address').val();
          var landmark = $('#landmark').val();
          var purpose = $('#purpose').val();
          var pl_company  = $('#pl_company').val();
          var emp_type  = $('#emp_type').val();
          var work_type = $('#work_type').val();
          var net_monthly_income = $('#net_monthly_income').val();
          var off_add1  = $('#off_add1').val();
          var totexp  = $('#totexp').val();
          var off_landmark = $('#off_landmark').val();
          var off_phone = $('#off_phone').val();
          var off_state = $('#off_state').val();
          var office_pincode = $('#office_pincode').val();
          var employer_industry = $('#employer_industry').val();
          var off_lma  = $('#off_lma').val();
          var pl_app_gincome  = $('#pl_app_gincome').val();
          var off_income_total  = $('#off_income_total').val();
          var ploff_income_other  = $('#ploff_income_other').val();
          var start_date  = $('#start_date').val();
          var curr_yr_tax  = $('#curr_yr_tax').val();
          var cygt  = $('#cygt').val();
          var pyti  = $('#pyti').val();
          var dsc_applicant  = $('#dsc_applicant').val();
          var mod_salary  = $('#mod_salary').val();
          var pan  = $('#pan').val();
          var tenure  = $('#tenure').val();
          var passport_no  = $('#passport_no').val();
          var passport_val  = $('#passport_validity').val();
          var lic_no  = $('#lic_no').val();
          var lic_val  = $('#lic_validity').val();
          var voter_id  = $('#voter_id').val();
          var doc_type  = $('#doc_type').val();
          var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
          var panregex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;

           if(firstname == ''){
            alert('First Name cannot be blank!!');
            $('#fname').focus();
            return false; 
          }
          if(lastname == ''){
            alert('Last Name cannot be blank!!');
            $('#lname').focus();
            return false; 
          }
          if(title == '' || title =='Select Title'){
            alert('Title cannot be blank!!');
            $('#title').focus();
            return false; 
          }
          if(gender == '' || gender == 'Select Gender'){
            alert('Gender cannot be blank!!');
            $('#gender').focus();
            return false; 
          }  
          if(email == ''){
            alert('Email cannot be blank!!');
            $('#email').focus();
            return false; 
          }else if(!pattern.test(email))
          {
            alert('Not a valid e-mail address');
            $('#email').focus();
            return false;
          }
          if(education == '' || education == 'Select'){
            alert('Education cannot be blank!!');
            $('#education').focus();
            return false; 
          }
          if(dob == ''){
            alert('DOB cannot be blank!!');
            $('#datepicker').focus();
            return false; 
          }

           if(mobile == ''){
            alert('Mobile cannot be blank!!');
            $('#mobile').focus();
            return false; 
          }

           if(pincode === '') {
            alert('Zip must not be blank');
            $('#pincode').focus();
            return false;
          } 

          if(address === '') {
            alert('Address must not be blank');
            $('#address').focus();
            return false;
          } 
          if(landmark === '') {
            alert('Landmark must not be blank');
            $('#landmark').focus();
            return false;
          }
           if(purpose == '' || purpose == 'Select'){
            alert('Purpose of loan cannot be blank!!');
            $('#purpose').focus();
            return false; 
          }
          if(pl_company == '' || pl_company == ' -'){
            alert('Company/Employer  cannot be blank!!');
            $('#pl_company').focus();
            return false; 
          }

          if(emp_type == '' || emp_type == 'Select Occupation'){
            alert('Occupation cannot be blank!!');
            $('#emp_type').focus();
            return false; 
          }  

           if(work_type == '' || work_type == 'Select Work Type'){
            alert('WorkType cannot be blank!!');
            $('#work_type').focus();
            return false;
         } 
           if(emp_type == '4' || emp_type == '5' || emp_type == '6' || emp_type == '1'){
           if(net_monthly_income == ''){
            alert('Monthly Income cannot be blank!!');
            $('#net_monthly_income').focus();
            return false;
         }
       }

        if(off_add1 == ''){
            alert('Office Address cannot be blank!!');
            $('#off_add1').focus();
            return false; 
          }

    
          if(totexp == '' ) {
            alert('Total Work Experience must not be blank');
            $('#totexp').focus();
            return false;
          }
        

         if(off_landmark == '' ){
          alert('Office Landmark cannot be blank!!');
          $('#off_landmark').focus();
          return false;
       } 

        if(off_phone == '' ){
          alert('Office Phone cannot be blank!!');
          $('#off_phone').focus();
          return false;
       } 
        
        if(off_state == '' || off_state =='Office State'){
          alert('Office State cannot be blank!!');
          $('#off_state').focus();
          return false;
       } 

        if(off_pincode == '' ){
          alert('Office Phone cannot be blank!!');
          $('#off_phone').focus();
          return false;
       }  

       if(tenure == '' ){
          alert('Tenure cannot be blank!!');
          $('#tenure').focus();
          return false;
       } 

       if(employer_industry == '' || employer_industry =='Select Industry'){
          alert('Employer Industry cannot be blank!!');
          $('#employer_industry').focus();
          return false;
       } 

        if(off_lma == '' || off_lma == 'Select Loan Mailing Address') {
            alert('Loan mailing address must not be blank');
            $('#off_lma').focus();
            return false;
          }

          if(pl_app_gincome == '' ) {
            alert('Annual gross income must not be blank');
            $('#pl_app_gincome').focus();
            return false;
          } 
          if(off_income_total == '' ) {
            alert('Total income must not be blank');
            $('#off_income_total').focus();
            return false;
          } 

          if(ploff_income_other == '' ) {
            alert('Other income must not be blank');
            $('#ploff_income_other').focus();
            return false;
          }   

        if(emp_type == '2' || emp_type == '3'){
          if(start_date == '' ) {
            alert('Start date for current Business/Profession must not be blank');
            $('#start_date').focus();
            return false;
          }
        }

      if(emp_type == '2' || emp_type == '3'){
          if(curr_yr_tax == '') {
            alert('Current year taxable income must not be blank');
            $('#curr_yr_tax').focus();
            return false;
          } 
        }

         if(emp_type == '2'){
          if(cygt == '') {
            alert('Current year gross turnover must not be blank');
            $('#cygt').focus();
            return false;
          }
        }
          if(emp_type == '2' || emp_type == '3'){ 
          if(pyti == '') {
            alert('Previous year taxable income must not be blank');
            $('#pyti').focus();
            return false;
          } 
        }

       if(emp_type == '2'){
          if(dsc_applicant == '' || dsc_applicant == 'Select best describes applicant ') {
            alert('Choose option that best describes applicant must not be blank');
            $('#dsc_applicant').focus();
            return false;
          }
        }

        if(emp_type == '2' || emp_type == '3'){ 
          if(mod_salary == '' || mod_salary =='Select') {
            alert('Mode of salary must not be blank');
            $('#mod_salary').focus();
            return false;
          }
        } 

        if(!panregex.test(pan)){       
            alert("invalid PAN no");
            $('#pan').focus();    
            return panregex.test(pan);    
          }

          if(doc_type == 'none'){
               alert('Document Type cannot be blank!!');
               $('#doc_type').focus();
               return false;

          } else if(doc_type == 'passport') {
               if(passport_no == '' || passport_val == ''){
                    alert('Passport Number Or Passport Validity cannot be blank!!');
                    $('#doc_type').focus();
                    return false;         
               }
            
          }else if(doc_type == 'driving') {
               if(lic_no == '' || lic_val == ''){
                    alert('Driving License Or Driving License Validity cannot be blank!!');
                    $('#doc_type').focus();
                    return false;         
               }
            
          }else if(doc_type == 'voter') {
               if(voter_id == ''){
                    alert('Voter ID cannot be blank!!!');
                    $('#doc_type').focus();
                    return false;    
               }
            
          }
             return flag = true;    
});

});

function hideDom(className,id) {
    $('.'+className).hide();
    $('#'+id).val("");
}

function onDocumentChange(){
   var type = $('#doc_type').val();
   if(type == 'passport') {
        $('.passport').show();
        $('.passport_val').show();
        hideDom('driving','lic_no');
        hideDom('driving_val','lic_validity');
        hideDom('voter','voter_id');
   } 
   if(type == 'driving') {
        $('.driving').show();
        $('.driving_val').show();
        hideDom('passport','passport_no');
        hideDom('passport_val','passport_validity');
        hideDom('voter','voter_id');

   } 
   if(type == 'voter') {
         $('.voter').show();
          hideDom('passport','passport_no');
          hideDom('passport_val','passport_validity');
          hideDom('driving','lic_no');
          hideDom('driving_val','lic_validity');
       
   }
    if(type == 'none') {
          hideDom('passport','passport_no');
          hideDom('passport_val','passport_validity');
          hideDom('driving','lic_no');
          hideDom('driving_val','lic_validity');
          hideDom('voter','voter_id');
   }
}

function isNumber(obj,evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)) {
      return false;
    }
    if ($(obj).length <= 10) {
      if (iKeyCode == 46)
        { return false; }
      else { return true; }
    }
    return false;
  }

  function showOccupationFields(val)
  {
     var optionSelected = $("#emp_type").val();
      if(optionSelected=="4" || optionSelected=="5" || optionSelected=="6"){
        $("#salaried_scb").show();
        $("#se-business").hide();
      }else if(optionSelected=="2"){
        $("#salaried_scb").hide();
        $("#se-business").show();
        $("#self_emp_prof_income_other").hide();
        $("#self_emp_prof_txtinc").hide();
        $("#self_emp_prof_occ").hide();
        $("#self_emp_business_gt").show();
        $("#self_emp_business_dsc_app").show();
      }else if(optionSelected=="3"){
        $("#salaried_scb").hide();
        $(".dsc_applicant").hide();
        $("#se-business").show();
        $("#self_emp_prof_income_other").show();
        $("#self_emp_prof_txtinc").show();
        $("#self_emp_prof_occ").show();
        $("#self_emp_business_gt").hide();
        $("#self_emp_business_dsc_app").hide();
      }
  }

  function ValidateCCform(){

      var title = $('#title').val();
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var datepicker = $('#datepicker').val();
      var gender = $('#gender').val();
      var occupation = $('#off_occ').val();
      var dependents = $('#dependents').val();
      var education = $('#education').val();
      var work_type = $('#work_type').val();
      var add1 = $('#add1').val();
      var landmark = $('#landmark').val();
      var city = $('#city').val();
      var pincode = $('#cc_homepin').val();
      var re_type = $('#re-type').val();
      var cd_m_address = $('#cd-m-address').val();
      var pa1 = $('#pa1').val();
      var pal1 = $('#pal1').val();
      var pstate = $('#pstate').val();
      var pcity = $('#pcity').val();
      var ppincode = $('#ppincode').val();
      var cc_company = $('#cc_company').val();
      var designation = $('#designation').val();
      var off_industry = $('#off_industry').val();
      var tt_work = $('#tt_work').val();
      var bank_branch = $('#bank_branch').val();
      var ofc_email = $('#ofc_email').val();
      var off_add1 = $('#off_add1').val();
      var off_landmark = $('#off_landmark').val();
      var ofc_city = $('#ofc_city').val();
      var off_pincode = $('#off_pincode').val();
      var document_type = $('#document_type').val();
      var anl_income = $('#anl_income').val();
      var mthly_income = $('#mthly_income').val();
      var monthly_bonus = $('#monthly_bonus').val();
      var pan = $('#pan').val();
      var chkPan  = $('#pan_later').is(':checked');
      var chkaddress  = $('#chkaddress').is(':checked');
      var checkterm  = $('#check1').is(':checked');
      var ex_scb_cust_yes = $("#ex_scb_cust_ys").is(":checked");
      var ex_scb_cust_no = $("#ex_scb_cust_no").is(":checked");
      var sales_cc = 'Yes';
      var passport_no  = $('#passport_no').val();
      var passport_val  = $('#passport_validity').val();
      var lic_no  = $('#lic_no').val();
      var lic_val  = $('#lic_validity').val();
      var voter_id  = $('#voter_id').val();
      var doc_type  = $('#doc_type').val();
      var emp_type  = $('#emp_type').val();

      var zipregex = /^\d{6}$/;
      var panregex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
      var id = $(this).attr('id')
      console.log('ID-->'+ id);

      if(title == '' || title == 'Select'){
          alert('Please select Title!!');
          $('#title').focus();
          return false;
      }

      if(fname == ''){
          alert('First Name cannot be blank!!');
          $('#fname').focus();
          return false;
      } 
      if(lname == ''){
          alert('Last Name cannot be blank!!');
          $('#lname').focus();
          return false;
      } 
     if(datepicker == ''){
          alert('DOB cannot be blank!!');
          $('#datepicker').focus();
          return false;
      } 
       if(gender == ''){
          alert('Gender cannot be blank!!');
          $('#gender').focus();
          return false;
      } 
      if(occupation == ''){
          alert('Occupation cannot be blank!!');
          $('#off_occ').focus();
          return false;
      }
       if(dependents == ''){
          alert('Dependents cannot be blank!!');
          $('#dependents').focus();
          return false;
      }
      if(education == '' || education == 'Select' || education == 'Select Educational qualification'){
          alert('Education cannot be blank!!');
          $('#education').focus();
          return false;
      } 

      if(work_type == '' || work_type == 'Select'){
          alert('WorkType cannot be blank!!');
          $('#work_type').focus();
          return false;
      } 
      if(add1 == ''){
          alert('Address1 cannot be blank!!');
          $('#add1').focus();
          return false;
      }  
      if(landmark == ''){
          alert('Landmark cannot be blank!!');
          $('#landmark').focus();
          return false;
      } 

      if(city == '' || city =='Select'){
          alert('City cannot be blank!!');
          $('#city').focus();
          return false;
      }
     if(pincode === '') {
          alert('Pincode must not be blank');
            $("#cc_homepin").focus();
            return false;
       }else if(!pincode.match(zipregex)) {
          alert('Pincode must have six digits');
          $("#cc_homepin").focus();
          return false;
       }

       if(re_type == '' || re_type =='Select'){
          alert('Residence Type cannot be blank!!');
          $('#re_type').focus();
          return false;
      } 

      if(cd_m_address == '' || cd_m_address =='Select'){
          alert('Card mailing address cannot be blank!!');
          $('#cd-m-address').focus();
          return false;
      } 

      if(!chkaddress) {

          if(pa1 == '' ){
              alert('Permanent Address line 1 cannot be blank!!');
              $('#pa1').focus();
              return false;
          }   

          if(pal1 == '' ){
              alert('Permanent Address Landmark cannot be blank!!');
              $('#pal1').focus();
              return false;
          }  

          if(pstate == '' || pstate == 'Select'){
              alert('Permanent State cannot be blank!!');
              $('#pstate').focus();
              return false;
          } 

          if(pcity == '' || pcity == 'Select'){
              alert('Permanent City cannot be blank!!');
              $('#pcity').focus();
              return false;
          }  
   
          if(ppincode === '') {
              alert('Permanent Pincode must not be blank');
                $("#ppincode").focus();
                return false;
           }

        }

      if(cc_company == ''){
          alert('Company cannot be blank!!');
          $('#cc_company').focus();
          return false;
      }   
      if(designation == '' || designation == 'Select' || designation=='Select Designation'){
          alert('Designation cannot be blank!!');
          $('#designation').focus();
          return false;
      }  

      if(off_industry == '' || off_industry == 'Select' || off_industry == 'Select Industry(ISIC)'){
          alert('Industry cannot be blank!!');
          $('#off_industry').focus();
          return false;
      } 

      if(tt_work == '' || tt_work == 'Select' || tt_work == 'Select work experience'){
          alert('Total work experience cannot be blank!!');
          $('#tt_work').focus();
          return false;
      }  

      if(bank_branch == '' || bank_branch == 'Select' || bank_branch =='Select Salaried bank account with'){
          alert('Salaried bank account with cannot be blank!!');
          $('#bank_branch').focus();
          return false;
      }

      if(ofc_email === '') {
              alert('Email address must not be blank');
              $("#ofc_email").focus();
              return false;
        }else if(emailValidation(ofc_email) === false) {
              alert('Invalid email address');
              $("ofc_email").focus();
              return false;
        }

        if(off_add1 == '' ){
          alert('Office address cannot be blank!!');
          $('#off_add1').focus();
          return false;
       } 
       if(off_landmark == '' ){
          alert('Office Landmark cannot be blank!!');
          $('#off_landmark').focus();
          return false;
       }  

       if(ofc_city == '' || ofc_city == 'Select' || ofc_city == 'Select City'){
          alert('Office City cannot be blank!!');
          $('#ofc_city').focus();
          return false;
       }

        if(off_pincode === '') {
          alert('Office Pincode must not be blank');
            $("#off_pincode").focus();
            return false;
       }else if(!off_pincode.match(zipregex)) {
          alert('Office Pincode must have six digits');
          $("#off_pincode").focus();
          return false;
       }

       if(document_type == '' || document_type == 'Select' || document_type == 'Income Proof Document'){
          alert('Income Proof Document cannot be blank!!');
          $('#document_type').focus();
          return false;
      }  

      if(anl_income == ''){
          alert('Annual declared income cannot be blank!!');
          $('#anl_income').focus();
          return false;
      }

      if(mthly_income == ''){
          alert('Basic Monthly Salary cannot be blank!!');
          $('#mthly_income').focus();
          return false;
      }  

      /* // Monthly bonus not to be mandatory
      if(monthly_bonus == ''){
          alert('Basic Monthly Salary cannot be blank!!');
          $('#monthly_bonus').focus();
          return false;
      }*/

    if (!chkPan) {
      if(!panregex.test(pan)){       
            alert("invalid PAN no");
            $('#pan').focus();    
            return panregex.test(pan);    
          } 
      } 

      if(!checkterm && sales_cc != 'Yes'){
            alert('Check Terms & condition!!');
            $('#checkterm').focus();
            return false;
      }

      if(!ex_scb_cust_yes && !ex_scb_cust_no && sales_cc != 'Yes'){
          alert('Please check radio button for Existing SCB Customer or not!!');
          $('#ex_scb_cust_ys').focus();
          return false;
      }

      if(doc_type == 'none'){
               alert('Document Type cannot be blank!!');
               $('#doc_type').focus();
               return false;

          } else if(doc_type == 'passport') {
               if(passport_no == '' || passport_val == ''){
                    alert('Passport Number Or Passport Validity cannot be blank!!');
                    $('#doc_type').focus();
                    return false;         
               }
            
          }else if(doc_type == 'driving') {
               if(lic_no == '' || lic_val == ''){
                    alert('Driving License Or Driving License Validity cannot be blank!!');
                    $('#doc_type').focus();
                    return false;         
               }
            
          }else if(doc_type == 'voter') {
               if(voter_id == ''){
                    alert('Voter ID cannot be blank!!!');
                    $('#doc_type').focus();
                    return false;    
               }
            
          } 

           if(emp_type == '' || emp_type == 'Select Employment Type'){
              alert('Employment Type cannot be blank!!');
              $('#emp_type').focus();
              return false;
          } 

      return true;
    
  }

  function setUTMparameters(){
    var strHref = window.location.href;
    var strQueryString = "";
    if (strHref.indexOf("?") > -1) {
    strQueryString = strHref.substr(strHref.indexOf("?") + 1);
    }
    if (strQueryString!="") {
        $('#utm_param').val(strQueryString);
    }
        var qs = strQueryString;
    var utm_campaign = "";
    var id = "";
    console.log('here im'+qs);
if (qs.indexOf("&") > -1) {
    for (var i = 0; i < qs.split('&').length; i++) {
         
         var param_val = qs.split('&')[i].split('=')[0].toLowerCase();
        // console.log(qs.split('&')[i].split('=')[0]+' :: here param_val'+param_val);
        if (param_val == "utm_campaign") {
            utm_campaign = (qs.split('&')[i].split('=')[1]);
            $('#utm_campaign').val(utm_campaign);
             console.log('here utm_campaign Val:: '+utm_campaign);
        }
        if (param_val == "utm_source") {
            utm_source = (qs.split('&')[i].split('=')[1]);
            $('#utm_source').val(utm_source);
             console.log(' utm_source Val:: '+utm_source);
        }
         if (param_val == "utm_medium") {
            utm_medium = (qs.split('&')[i].split('=')[1]);
            $('#utm_medium').val(utm_medium);
             console.log(' utm_medium Val:: '+utm_medium);
        }
         if (param_val == "utm_adgroup") {
            utm_adgroup = (qs.split('&')[i].split('=')[1]);
            $('#utm_adgroup').val(utm_adgroup);
             console.log(' utm_adgroup Val:: '+utm_adgroup);
        }
         if (param_val == "utm_channel") {
            utm_channel = (qs.split('&')[i].split('=')[1]);
            $('#utm_channel').val(utm_channel);
             console.log(' utm_channel Val:: '+utm_channel);
        }
    }
  }
}
