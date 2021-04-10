<?php include 'cc_partials/header_cc.php'; ?>

<style type="text/css">
    .targetted_heading {
      width: 100%;
      padding:0;
      top:9%;
      left: auto;
    }
    .targetted_heading p{
      line-height: 1.2em;
    }
    .targetted_heading .data_panel{
      width: 75%;
      margin:0 auto;
      padding-bottom:2.5%;
    }
    .targetted_heading .data_panel .cc_svtt{
      /*width: 260px;*/
      margin-right:1%;
    }
    .fs-90{
      font-size: 90px;
    }
    .fs-42{
      font-size: 42px;
    }
    .targetted_heading .data_panel .offer_des{
      letter-spacing: 1px;
      line-height: 1.5em;
    }
    .offer_details{
      padding-top: 20px;
    }
    .slider-dots{
      position: absolute;
      bottom: 0;
      text-align: center;
      justify-content: center;
      width: 60%;
      bottom: 20px;
    }
    .cta_btn{
      margin-top:5px;
    }
    .cta_btn a{
      margin:0 20px;
    }
    .cta_btn a:first-child{
        background-color: #00A546;
        border: 1px solid #fff;
        padding:6px 62px 6px 24px;
        margin-right: 5px;
    }
    .cta_btn a img{
      top: 1px;
      right: 1px;
    }
    .cta_btn a:not(:first-child){
      background-color: #fff;border:1px solid #fff;padding: 6px 62px 6px 24px;margin-right: 5px;
    }
    .ff-light{
      font-weight: 300!important;
    }
    .features_grid{
      text-align: center;position: relative;top: -8px;
    }
    @media screen and (min-width:1024px) and (max-width: 1300px){
      .targetted_heading .data_panel{
        width: 80%;
        padding-bottom: 1%;
      }
      .targetted_heading{
        top: 9%;
      }
      .targetted_heading p{
        font-size: 32px;
        line-height: 1.1em;
        width: 100%;
      }
      .targetted_heading p span{
        font-size: 19px;
      }
      .cc_features{
        font-size: 14px;
      }
    }
    @media screen and (min-width: 1441px) and (max-width:1600px){
      .targetted_heading .data_panel .cc_svtt{
        width: 300px;
      }
      .targetted_heading .data_panel{
        width: 68%;
      }
      .targetted_heading p{
        font-size: 47px;
      }
      .cc_features{
        font-size: 18px;
      }
      .cta_btn{
        margin-top: 4px;
      }
    }
    @media screen and (min-width: 1601px){
      .targetted_heading{
        top: 7%;
      }
      .targetted_heading p{
        font-size: 54px;
      }
      .targetted_heading .data_panel .cc_svtt{
        width: 380px;
      }
      .offer_des{
        font-size: 32px;
      }
      .cc_features{
        font-size: 20px;
      }
      .cta_btn{
        margin-top: 32px;
      }
      .features_grid .uk-width-1-3 img{
        width: 90px;      
      }
      ./*features_grid .uk-width-1-3:last-child img{
        width: 55px;      
      }*/
      .targetted_heading .data_panel{
        margin-top: 2%;
      }
    }
    @media screen and (min-width: 1700px){
      .targetted_heading p{
        font-size: 58px;
      }
      .cc_features{
        font-size: 24px;
      }
      .cta_btn{
        margin-top: 11px;
      }
      .targetted_heading{
        top: 10%;
      }
    }
    @media screen and (width:1024px){
      .targetted_heading .data_panel .cc_svtt{
        margin-right: 0px!important;
      }
      .targetted_heading .data_panel{
        width: 86%;
      }
      .targetted_heading{
        top: 5%;
      }
      .targetted_heading p{
        font-size: 28px;
        line-height: 1.3em;
        width: 100%;
        margin-bottom: 16px;
      }
      .cc_features{
        font-size: 14px;
      }
      .cta_btn a{font-size: 15px;}
    }
    @media screen and (max-width:768px){
      .targetted_heading{
          width: 100%;
          top:2%;
          left: auto;
      }
      .targetted_heading p,.targetted_heading p span{
        font-size: 20px;
        line-height: 1.5;
        margin: 10px 0;
      }
      .targetted_heading .data_panel .cc_svtt{
        width: 150px;
        float: none;
        margin-top: 0;
      }
      .targetted_heading .data_panel{
        width: 100%;  
        margin-bottom: 10px;
      }
      .cta_btn{
        width: 100%;text-align: center;
      }
      .cta_btn a{
        margin:4px;
      }
      .mob_img{
        height: 530px;
      }
      .cta_btn a:first-child,.cta_btn a:last-child{
        padding: 6px 54px 6px 16px;
      }
      .features_grid{
        padding-top: 22px;
        width: 96%;
        margin: 0 auto;
      }
      .cc_features{
        font-size: 14px;text-align: left!important;
      }
      .features_grid img{
        margin-right:10px;
      }
      .cc_features br{display: none;}
      .features_grid .uk-width-1-1{
        display: flex;align-items: center;
      }
      .features_grid img{
        width: 54px;
      }
    }
    @media screen and (width:768px){
      .targetted_heading .data_panel .cc_svtt{
        width: 150px;
        float: left;
        margin-top: 0;
      }
      .features_grid .uk-width-1-1{
        display: block;
      }
      .features_grid{
        width: auto;top: -27px;
      }
      .form_section {
        margin-top: 0;
      }
      .targetted_heading{
        width: 78%;
        top: 1%;
        left: 11%;
      }
      .tab_img{
        height: 320px;
      }
      .cta_btn{
        position: relative;top: -25px;
      }
      .uk-navbar-right h1{
        font-size: 18px;
      }
    }
</style>

<!-- <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: slide;min-height: 300; max-height:450"> -->
<div class="uk-position-relative uk-visible-toggle uk-light">
    <!-- <ul class="uk-slideshow-items"> -->
        <!-- <li> -->
            <img class="hidden_on_mobile uk-width-1-1 tab_img" src="<?=$tpl?>/assets/images/cc-desktop-bg.png">
            <img class="hidden_on_desktop hidden_on_tab mob_img" src="<?=$tpl?>/assets/images/cc-mobile-bg.png">
            <div class="targetted_heading targetted_heading_top uk-text-white">
              <p class="fs-42 ff-helvetica-bold fs-12-mobile uk-text-center">Congragulations Vijay Kumar!<br><span class="ff-helvetica fs-32">you have a pre-approved</span>  <span class="fs-32">Super Value Titanium Credit Card.</span></p>
              <div class="data_panel">
               
                  <div class="uk-flex uk-flex-middle uk-flex-center">
                     <img class="cc_svtt" src="<?=$tpl?>/assets/images/svtt-cc.png">
                    <div class="uk-grid-small uk-grid features_grid">
                      <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-3@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/get-new.png">
                        <div class="uk-margin-remove cc_features uk-text-center">Get 5% cashback on fuel,<br>phone and utility bills.</div>
                      </div>
                      <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-3@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/reward-new.png">
                        <div class="uk-margin-remove cc_features uk-text-center">Earn rewards on<br>other spends.</div>
                      </div>
                      <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-3@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/per-new.png">
                        <div class="cc_features uk-text-center fs-15">Enjoy a host of discounts and <br>
                        offers across dining, shopping, <br>travel and many more.</div>
                      </div>
                      <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-3@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/per-new.png">
                        <div class="cc_features uk-text-center fs-15">Enjoy a host of discounts and <br>
                        offers across dining, shopping, <br>travel and many more.</div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="cta_btn">
                      <a href="#rtobModal" class="uk-button uk-border-pill uk-text-white ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Apply Now<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/btn-arrow-1.png"></a>
                      <a href="#chatModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Chat<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/chat-arrow.png"></a>
                      <a href="#callbackModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Request Callback<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/req-arrow.png"></a>
                    </div>
                </div>

                
              </div>
              
        <!-- </li> -->
    <!-- </ul> -->
    <!-- <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a> -->
    <!-- <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a> -->
</div>

<div id="modal-otp" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
      <h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
      <form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Mobile number</label>
          <input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile" id="verifymobile" type="tel" value="9988776655" disabled tabindex="1" />
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>Verification OTP</label>
          <input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus />
        </div>
        <div class="uk-width-1-3@s uk-width-1-1">
          <label>&nbsp;</label>
          <div>
            <a href="<?=$siteUrl?>credit-card/application" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white">Go</a>
            <button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill">Resend</button>   
          </div>
        </div>
      </form> 
    </div>
</div>

<div class="uk-margin-medium-top uk-container cc-container">
<div class="uk-box-shadow-large">
<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
<div id="head_1" class="tabs_head tabs_head_active uk-width-1-5 uk-text-center p-25">
<h5 class="fs-20 uk-text-35 ff-light">Benefits</h5>
</div>
<div id="head_2" class="tabs_head uk-width-1-5 uk-text-center p-25">
<h5 class="fs-20 uk-text-35 ff-light">Things to know</h5>
</div>
<div id="head_3" class="tabs_head uk-width-1-5 uk-text-center p-25">
<h5 class="fs-20 uk-text-35 ff-light">Documents Required</h5>
</div>
<div id="head_4" class="tabs_head uk-width-1-5 uk-text-center p-25">
<h5 class="fs-20 uk-text-35 ff-light">FAQs</h5>
</div>
<div id="head_5" class="tabs_head uk-width-1-5 uk-text-center p-25">
<h5 class="fs-20 uk-text-35 ff-light">Value Chart</h5>
</div>
</div>

<div class="tabs_content">
<div id="head_1" class="hidden_on_desktop hidden_on_tab tabs_head tabs_head_active uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Benefits</h5>
</div>
<div id="para_1" class="tabs_para uk-padding">
<div class="tabs_content_slider"  uk-slider>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

   <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-1.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Get maximum benefit</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Earn 5 reward points on every INR 150 spent and get maximum benefit with 1 reward point equal to 1 Re.#</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-2.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Cashback</h6>
               <p class="ff-helvetica fs-16 uk-text-89">5% cash back on telephone bills, on a minimum transaction amount of Rs 750. Telephone bill needs to be register and paid through the Billpay platform of Standard Chartered Bank.</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-3.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Foreign Transaction</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Only 2% foreign currency markup# fee on all foreign currency transactions</p>
           </div>
       </li>
   </ul>

   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
<!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top uk-hidden"></ul> -->
</div>
</div>

<div id="head_2" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Things to know</h5>
</div>
<div id="para_2" class="tabs_para uk-padding">
<div class="tabs_content_slider"  uk-slider>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

   <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-1.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Get maximum benefit</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Earn 5 reward points on every INR 150 spent and get maximum benefit with 1 reward point equal to 1 Re.#</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-2.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Cashback</h6>
               <p class="ff-helvetica fs-16 uk-text-89">5% cash back on telephone bills, on a minimum transaction amount of Rs 750. Telephone bill needs to be register and paid through the Billpay platform of Standard Chartered Bank.</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-3.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Foreign Transaction</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Only 2% foreign currency markup# fee on all foreign currency transactions</p>
           </div>
       </li>
   </ul>

   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
<!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top uk-hidden"></ul> -->
</div>
</div>

<div id="head_3" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Documents Required</h5>
</div>
<div id="para_3" class="tabs_para uk-padding">
<div class="tabs_content_slider"  uk-slider>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

   <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-1.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Get maximum benefit</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Earn 5 reward points on every INR 150 spent and get maximum benefit with 1 reward point equal to 1 Re.#</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-2.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Cashback</h6>
               <p class="ff-helvetica fs-16 uk-text-89">5% cash back on telephone bills, on a minimum transaction amount of Rs 750. Telephone bill needs to be register and paid through the Billpay platform of Standard Chartered Bank.</p>
           </div>
       </li>
       <li>
           <div class="uk-panel uk-text-center">
               <img src="<?=$tpl?>assets/images/tab-3.png" alt="">
               <h6 class="uk-margin-top ff-helvetica-bold fs-18 uk-text-2D">Foreign Transaction</h6>
               <p class="ff-helvetica fs-16 uk-text-89">Only 2% foreign currency markup# fee on all foreign currency transactions</p>
           </div>
       </li>
   </ul>

   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
<!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top uk-hidden"></ul> -->
</div>
</div>


<div id="head_4" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">FAQs</h5>
</div>
<div id="para_4" class="tabs_para uk-padding">
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

   <ul class="faqs" uk-accordion="multiple: true">
    <li class="uk-open">
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">How long does it take to apply for a credit card?<span class="uk-align-right uk-margin-remove" uk-icon="icon:minus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">You can apply online and get an instant in-principle decision in minutes. A Bank representative will get in touch with you once you have submitted your application online successfully to complete the documentation requirement. You can expect to get your credit card, subject to final Policy and verification checks of the Bank, within 7-15 days from the time you submit your documents and signed application form, although it may take longer in some cases.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">What will be my credit limit?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">The credit limit will depend on various factors like your income, credit history, etc. Your credit limit is not a permanent figure and can be increased or lowered at a later date depending on your spends and repayment behaviour.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">Can I get an Add-on card? And will there be a separate credit limit on the Add-on card?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">Yes, you can apply for an add-on card. There won't be a separate credit limit for the add-on card.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#"> What is a grace period?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">A grace period is interest free period for you to pay your credit card balance in full without any interest rate charges. The grace period is calculated based on your billing cycle and not from the date of the transaction.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">How is the Minimum Amount Due on the card calculated?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">The minimum amount due every month shall be higher of the following (a)5% of statement outstanding or (b) sum total of all installments billed, interest, fees, other charges, amount that is over limit and 1% of the principal or Re 250.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">Will I be charged anything extra if I use my credit card overseas?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">All overseas transactions are levied with a 3.5% transaction fee.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">How much is the interest charges?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">The Monthly interest rate is annualized to arrive at the Annualized Percentage Rate (APR). Monthly interest rate of 3.49% pm is annualized to arrive at an APR of 41.88% for all credit cards. However for all Priority Visa Infinite, Ultimate and Emirates World credit cards, the monthly interest rate is 3.10% pm (APR of 37.20%). For all instant credit card variants, the monthly interest rate is 1.99% pm (APR of 23.88%). Cash transactions will attract an interest rate of 3.49% (APR of 41.88%)</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">How can I make my credit card payment?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">Online banking<br>
                Bill Desk: From different bank accounts directly to your Card account.Visit https://www.sc.com/in/_documents/ billpay/billpay.html
                <br>NEFT / IBFT: From your bank account directly to your Card account by quoting the IFSC code SCBL0036001 and the address as MG Road, Mumbai.
                <br>Visa Money Transfer: In case of Visa franchisee credit cards, pay through your bank account using Visa Money Transfer. Fees for Visa Money Transfer may belevied by the initiating bank.
                Standard Chartered Online Banking:Standard Chartered account holders can pay through an account transfer.
                <br>ECS: Electronic Clearing Service (ECS) instruction can be initiated by submitting an ECS form authorizing transfer of funds. The ECS form needs to be attested by the bank from which the payment has to be made. Payments can be made through ECS in New Delhi, Kolkata, Mumbai,Ahmedabad, Pune, Coimbatore, Chennai,Hyderabad and Bangalore. You are responsible for ensuring that the ECS is honoured.
                Cheque/Draft Payment: Dropping a cheque or a draft in favour of your Standard Chartered Bank Card no. xxxx xxxx xxxx xxxx (your 16 digit Card number) into any of our Cheque Collection Boxes. Visit www.sc.com/in for the complete list of the locations of Cheque Collection Boxes. The cheque or draft should be complete in all respects. Any material alteration must be duly counter signed.
                Make your payments at least 3 days in advance of your Payment Due Date to facilitate the timely credit of the funds into your Card account. Note that your credit limit will only be increased by the amount you have repaid after our receipt of your funds. In case we do not receive payment by the Payment Due Date, we reserve the right to levy Interest and Late Payment Charges.
                <br>If you hold multiple Cards or EMI accounts with us, please give us clear instructions on the allocation of payment to these various Card accounts on the reverse of your cheques. If you are issuing separate cheques for each Card account, then, you should clearly specify Not to allocate on the reverse of the cheque. In the absence of any specific information on this front, we will apply the funds first towards clearance of the Minimum Amount Due in respect of all Card accounts you hold with us. Thereafter, the excess payment will be allocated sequentially towards payment of the Card account with highest balance. If any of your Card account is overdue, we reserve the right to prioritize payments to overdue accounts first as per our internal policy. For Cash payments, funds transfer and payment through Online banking, individual payment should be made against each of the accounts.
                <br>Cash: Cash payments can only be deposited at our branches using teller facilities</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">How do I report that my credit card has been lost or stolen?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">You must notify us immediately if you become aware that your Credit Card has been lost,stolen or misused. Ahmedabad, Bangalore, Chennai, Delhi,Hyderabad, Kolkata, Mumbai, Pune- 3940 4444 / 6601 4444 Allahabad, Amritsar, Bhopal, Bhubaneswar,Chandigarh, Cochin / Ernakulam,Coimbatore, Indore, Jaipur, Jalandhar, Kanpur, Lucknow, Ludhiana, Nagpur, Patna, Rajkot, Surat, Vadodara - 3940 444 / 6601 444 Gurgaon, Noida -011 - 39404444 / 011 - 66014444 Jalgaon, Guwahati, Cuttack, Mysore,Thiruvananthpuram, Vishakhapatnam, Mathura, Proddatur, Dehradun, Saharanpur -1800 345 1000 Siliguri -1800 345 5000</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#">If I suspect someone has stolen my password or used it to make a fraudulent purchase,what should I do?<span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
        <div class="uk-accordion-content">
            <p class="uk-text-89 fs-16">You must notify us immediately if you become aware that your Card has been lost,stolen or misused. Ahmedabad, Bangalore, Chennai, Delhi,Hyderabad, Kolkata, Mumbai, Pune- 3940 4444 / 6601 4444 Allahabad, Amritsar, Bhopal, Bhubaneswar,Chandigarh, Cochin / Ernakulam,Coimbatore, Indore, Jaipur, Jalandhar, Kanpur, Lucknow, Ludhiana, Nagpur, Patna, Rajkot, Surat, Vadodara - 3940 444 / 6601 444 Gurgaon, Noida -011 - 39404444 / 011 - 66014444 Jalgaon, Guwahati, Cuttack, Mysore,Thiruvananthpuram, Vishakhapatnam, Mathura, Proddatur, Dehradun, Saharanpur -1800 345 1000 Siliguri -1800 345 5000</p>
        </div>
    </li>
</ul>

</div>
</div>


<div id="head_5" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Value Chart</h5>
</div>
<div id="para_5" class="tabs_para uk-padding">
<div class="uk-overflow-auto">
<table class="uk-table uk-table-striped ff-helvetica fs-18 uk-text-center">
    <thead>
        <tr>
            <th class="uk-text-center">Details</th>
            <th class="uk-text-center">Annual Spends (Rs.)</th>
            <th class="uk-text-center">Cashback(Rs.)</th>
            <th class="uk-text-center">Discount/Benefits (Rs.)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Spends on Flipkart</td>
            <td>36000</td>
            <td>1800</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Spends on Myntra, 2GUD  </td>
            <td>12000</td>
            <td>600</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Preferred merchant spends</td>
            <td>66000</td>
            <td>2640</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Other Spends</td>
            <td>60000</td>
            <td>900</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Fuel Spends</td>
            <td>12000</td>
            <td>-</td>
            <td>120</td>
        </tr>
        <tr>
            <td>Dining Spends</td>
            <td>24000</td>
            <td>360</td>
            <td>4800</td>
        </tr>
        <tr>
            <td>Welcome Benefits</td>
            <td>-</td>
            <td>-</td>
            <td>3291</td>
        </tr>
        <tr>
            <td>Lounge Visit</td>
            <td>-</td>
            <td>-</td>
            <td>40000</td>
        </tr>
        <tr>
            <td>Annual Fee Waiver</td>
            <td>-</td>
            <td>-</td>
            <td>500</td>
        </tr>
        <tr>
            <td>Total Annual Spends</td>
            <td>2,10,000</td>
            <td>6300</td>
            <td>12,711</td>
        </tr>
        <tr>
            <td>Total Annual Benefits*</td>
            <td></td>
            <td>19011</td>
            <td>9.05%</td>
        </tr>
    </tbody>
</table>
</div>

</div>
</div>
</div>
</div>


<div id="rtobModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <h4 class="uk-h3 uk-margin-top">User continues to RTOB journey</h4>
    </div>
</div>
<div id="chatModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <h4 class="uk-h3 uk-margin-top">User continues journey via Chatbot</h4>
    </div>
</div>
<div id="callbackModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
      <div class="bg_band"></div>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <span uk-icon="icon:receiver;ratio:4.0;" class="uk-primary"></span>
      <h4 class="uk-h3 uk-margin-top">Schedule a callback</h4>
      <form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle uk-paddin-small">
        <div class="uk-width-1-1">
          <label>Mobile number</label>
          <input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile" id="verifymobile" type="tel" value="9988776655" disabled tabindex="1" />
        </div>
        <div class="uk-width-1-1 uk-margin">
          <label>Select Date & Time Slot</label>
          <div class="uk-grid uk-grid-small">
            <div class="uk-width-1-2">
              <input class="uk-input uk-form-width-input uk-border-rounded" type="text" value="" tabindex="2" placeholder="Date" />
            </div>
            <div class="uk-width-1-2">
              <select class="uk-select">
                <option>Select Time Slot</option>
                <option>9am - 12pm</option>
                <option>1pm - 3pm</option>
                <option>4pm - 6pm</option>
              </select>
            </div>
          </div>
          
        </div>
        <div class="uk-width-1-1">
          <label>&nbsp;</label>
          <div>
            <a href="3-apply-online.php" class="uk-button uk-btn-green-bg uk-margin-small-right uk-text-white">Schedule</a>
          </div>
        </div>
      </form> 
    </div>
</div>



<?php include 'cc_partials/footer_cc.php'; ?>