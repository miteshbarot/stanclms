<?php namespace ProcessWire;
    if(isset($_GET['campaign'])){
?>

<style type="text/css">
      .uk-subnav li a{
        border-bottom: 1px solid #fff;
        background-color: #fff!important;
      }
     /* .uk-subnav li.uk-active a,.uk-subnav-pill>.uk-active>a{
        border-bottom: 1px solid #0775B1;background-color: #fff!important
      }*/
      .head_desk{
      display: flex;justify-content: center;align-items: center;
    }
</style>

<?php include 'partials/header_cc_campaign.php'; ?>

<!-- <div tabindex="-1" uk-slideshow="animation: slide;min-height: 300; max-height:450"> -->
  <div class="uk-position-relative uk-visible-toggle uk-light">
    <!-- <ul class="uk-slideshow-items"> -->
        <!-- <li> -->
            <img class="hidden_on_mobile uk-width-1-1" src="<?=$tpl?>assets/images/cc-desktop-bg.png">
            <img class="hidden_on_desktop hidden_on_tab" src="<?=$tpl?>assets/images/cc-mobile-bg.png">
            <div class="targetted_heading targetted_heading_top uk-text-white">
              <p class="fs-42 ff-helvetica fs-12-mobile ff-light uk-text-center">Avail exclusive offers with<br><span class="ff-helvetica-bold">DigiSmart Card.</span></p>
              <div class="uk-panel ff-helvetica">
                <img src="<?=$tpl?>assets/images/digismart-cc.png">
                  <div>
                    <ul class="uk-panel-content uk-margin-remove-top fs-18 fs-14-mobile">
                      <li>20% off* at Myntra with no minimum spends</li>
                      <li>10% discount* on Zomato with no minimum spends</li>
                      <li>Buy 1 Get 1 movie ticket free*</li>
                    </ul>
                  </div>
                </div>
              </div>

    <div class="uk-position-absolute form_section form_section_2  cc">
        <div class="uk-background-white uk-br-med">
            <div class="uk-position-relative uk-text-center">
                <img class="form_bg" src="<?=$tpl?>assets/images/form-bg.png">
                <h2 class="uk-text-center ff-helvetica-bold fs-22 fs-15-mobile uk-margin-remove form_head cc_form_head">Get instant approval online</h2>
            </div>
            <form class="form_slider uk-position-relative" action="3-apply-online.php" method="post">
                <div class="form-item active uk-padding form-item-1 uk-text-center">
                  
                    <div>
                         <input class="uk-input uk-form-width-input uk-border-rounded" type="text" placeholder="Mobile Number*" id="mobile" name="mobile">
                      </div>
                    <div class="fs-11 uk-text-left">
                        <div class="uk-margin-top uk-text-35"><label class="fs-16"><input class="uk-checkbox" type="checkbox" checked>&nbsp;I authorise Standard Chartered Bank to verify & conduct Credit Bureau Check *</label></div>
                        <div class="uk-margin-small-top uk-text-35"><label class="fs-16"><input class="uk-checkbox" type="checkbox" checked>&nbsp;I have read the <a href="#" target="_blank" title="">Terms & Conditions</a> and agree to the terms therein *</label></div>
                    </div>
              <div class="uk-margin-top mt-40-mobile">
                <button id="submitApplication" class="uk-border-pill ff-helvetica-bold uk-button uk-btn-green-bg uk-text-white proceed_btn uk-margin-remove" uk-toggle="target: #modal-otp">Proceed</button>
              </div>

                </div>
            </form>
        </div>
    </div>
      <!-- <ul class="uk-slideshow-nav uk-dotnav slider-dots"></ul> -->
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
            <a href="<?=$siteUrl?>credit-card/pre-approved-offer" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white">Go</a>
            <button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill">Resend</button>   
          </div>
        </div>
      </form> 
    </div>
</div>

<div class="uk-margin-medium-top uk-container cc-container">
<div class="uk-box-shadow-large">
<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
<div id="head_1" class="tabs_head tabs_head_active uk-width-1-5 uk-text-center p-25 head_desk">
<h5 class="fs-20 uk-text-35 ff-light">Benefits</h5>
</div>
<div id="head_2" class="tabs_head uk-width-1-5 uk-text-center p-25 head_desk">
<h5 class="fs-20 uk-text-35 ff-light">Value chart</h5>
</div>
<div id="head_3" class="tabs_head uk-width-1-5 uk-text-center p-25 head_desk">
<h5 class="fs-20 uk-text-35 ff-light">FAQs</h5>
</div>
<div id="head_4" class="tabs_head uk-width-1-5 uk-text-center p-25 head_desk">
<h5 class="fs-20 uk-text-35 ff-light">Eligibility and documentation</h5>
</div>
<div id="head_5" class="tabs_head uk-width-1-5 uk-text-center p-25 head_desk">
<h5 class="fs-20 uk-text-35 ff-light">Fees and charges</h5>
</div>

</div>

<div class="tabs_content">
<div id="head_1" class="hidden_on_desktop hidden_on_tab tabs_head tabs_head_active uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Benefits</h5>
</div>
<div id="para_1" class="tabs_para uk-padding">

<ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
    <li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#">Card benefits</a></li>
    <li><a style="font-size: 18px;"  class="ff-helvetica fs-22 uk-text-2D" href="#">Partner benefits</a></li>
    <li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D"  href="#">Joining fees</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>
      <div class="uk-grid uk-divider">
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/rewards_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">1 reward point for every Rs 150 spent</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/fuel_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">5% cash back on fuel bills, provided the maximum transaction amount does not exceed Rs 2000</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/telephone_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">5% cash back on telephone bills, on a minimum transaction amount of Rs 750. Telephone bill needs to be register and paid through the Billpay platform of Standard Chartered Bank.</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/utility_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">5% cash back on utility bills, on a minimum transaction amount of Rs 750. Utility bill needs to be register and paid through the Billpay platform of Standard Chartered Bank.</h4>
            </div>
          </div>
    </li>
    <li>
      <div class="uk-grid uk-divider">
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/_restaurants_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Get 15% off at over 850 restaurants in India.</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/discount_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Get INR 200 instant discount at Grofers on subsequent purchases of minimum INR 2,000. Use Promo code SCB200.</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/rewards_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">For more offers, visit- sc.com/in/credit-cards/offers/</h4>
            </div>
          </div>
    </li>
    <li>
          <div class="uk-grid uk-divider">
            <div class="uk-width-1-4 hidden_on_mobile"></div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/cashback_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Joining Fee: Rs 750 Get 100% onetime cashback (up to INR 1500) on Fuel spends within 1st 90 days</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/renewal_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Renewal Fee: Rs 750 - waived on spending Rs 90,000 in the Year</h4>
            </div>
            <div class="uk-width-1-4 hidden_on_mobile"></div>
          </div>
    </li>
</ul>

</div>


<div id="head_2" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Value chart</h5>
</div>
<div id="para_2" class="tabs_para uk-padding">
<div class="uk-overflow-auto">
<table class="uk-table uk-table-striped ff-helvetica fs-18 uk-text-center">
    <thead>
        <tr>
            <th class="uk-text-center">Details</th>
            <th class="uk-text-center">Annual spends (Rs.)</th>
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


<div id="head_3" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">FAQs</h5>
</div>
<div id="para_3" class="tabs_para uk-padding">
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




<div id="head_4" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Eligibility and documentation</h5>
</div>
<div id="para_4" class="tabs_para uk-padding">
<ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
    <li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#">Eligibility criteria</a></li>
    <li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#">Salaried</a></li>
    <li><a style="font-size: 18px;"  class="ff-helvetica fs-22 uk-text-2D" href="#">Self-employed</a></li>
</ul>

<ul class="uk-switcher uk-margin">
  <li>
    <div class="uk-grid uk-divider">
      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/age_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Applicant's age should be between 21 and 65.</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/card_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Applicant should have a stable monthly income.</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/income_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Applicant should belong to credit cards sourcing cities/locations of the Bank.</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/policy_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">All applications are subject to credit and other policy checks of the Bank.</h4>
            </div>
    </div>
  </li>
    <li>
      <div class="uk-grid uk-divider">
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/identity-proof.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Identity Proof</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/address-proof.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Address Proof</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/1-month-payslip.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">1 month Payslip</h4>
            </div>
            <!-- <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/3-month-banking.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">3 month banking</h4>
            </div> -->
          </div>
    </li>
    <li>
      <div class="uk-grid uk-divider">
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/identity-proof.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Identity Proof</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/address-proof.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Address Proof</h4>
            </div>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-width-1-1 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/2-year-itr.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">2 Year ITR</h4>
            </div>
            <!-- <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/3-month-banking.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">6 month banking</h4>
            </div> -->
          </div>
    </li>
</ul>
</div>

<div id="head_5" class="hidden_on_desktop hidden_on_tab tabs_head uk-text-center uk-padding-small">
<h5 class="fs-16 uk-text-35 ff-light uk-margin-remove">Fees and Charges</h5>
</div>
<div id="para_5" class="tabs_para uk-padding">

   <div class="uk-grid uk-divider">
            <div class="uk-width-1-4 hidden_on_mobile"></div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/cashback_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Joining Fee: Rs 750 Get 100% onetime cashback (up to INR 1500) on Fuel spends within 1st 90 days</h4>
            </div>
            <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tpl?>assets/images/renewal_n.png">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-16-mobile">Renewal Fee: Rs 750 - waived on spending Rs 90,000 in the Year</h4>
            </div>
            <div class="uk-width-1-4 hidden_on_mobile"></div>
          </div>

</div>

</div>
</div>
</div>
</div>


<?php
    }else{
?>

<?php include 'partials/header_cc_2.php'; ?>


<div class="uk-margin-large-top uk-margin-medium-bottom uk-container">
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

    <div class="tabs_content_slider uk-slider uk-slider-container">
      <div class="uk-position-relative uk-visible-toggle uk-light card_slider_wrapper" tabindex="-1">

         <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
          <?php foreach ($pages->get("id=25926")->children as $card): ?>
              <li>
                 <div class="uk-margin-bottom card_w uk-panel">
                    <div class="card_wrapper uk-background-ee uk-border-card uk-position-relative">
                      <div class="uk-text-center uk-position-relative">
                          <img class="cc_bg" src="<?=$tpl?>assets/images/green-rect.png">
                          <h2 class="uk-position-absolute ff-helvetica-bold fs-16 uk-text-center cc_head uk-margin-remove"><?php echo wordwrap($card->title,20,"<br>\n"); ?></h2>
                      </div>
                      <div class="p-card">
                          <div class="uk-text-center">
                              <img src="<?=$card->image->url?>" style="width: 200px; height: auto">
                          </div>
                          <div class="uk-margin-top">
                              <div class="fs-14 uk-text-35 uk-text-center"><label><input class="uk-checkbox" type="checkbox">&nbsp;&nbsp;Check to compare</label></div>
                              <p class="uk-text-67 fs-14 m-0"><?=$card->headline?></p>
                              <div class="cc_info">
                                <?=$card->desc?>
                              </div>
                              
                              <div class="uk-text-center uk-margin-medium-top btn-apply">
                                  <a href="<?=$config->urls->root?>credit-card/provide-info/?card=<?=$card->id?>" class="uk-text-white uk-btn-apply uk-button uk-border-rounded ff-helvetica">Apply Now</a>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
             </li>
          <?php endforeach ?>
         </ul>
      </div>
    
    <a class="uk-position-center-left" href="#" uk-slider-item="previous" style="padding: 0 5px">
      <svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#38d200" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg>
    </a>
    <a class="uk-position-center-right" href="#" uk-slider-item="next" style="padding: 0 5px"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#38d200" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>
      <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
</div>

</div>
</div>
<div class="uk-background-ff">
  <div class="uk-padding uk-container">
      <div class="uk-text-right center-align compare_cards_wrapper">
          <span class="ff-helvetica fs-14">Select and compare up to three Cards</span><button class="uk-button uk-btn-apply uk-border-rounded uk-text-white ff-helvetica-bold uk-margin-left compare_cards">Compare</button>
      </div>
      <div class="uk-text-right center-align view_all">
          <button onclick="document.location.reload()" class="uk-button uk-btn-apply uk-border-rounded uk-text-white ff-helvetica-bold">View all Cards</button>
      </div>
</div>
</div>

<?php 
    }
?>

<?php include 'partials/footer_cc.php'; ?>