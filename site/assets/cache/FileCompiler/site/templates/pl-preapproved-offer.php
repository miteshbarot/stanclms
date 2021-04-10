<?php
$m = $input->get->m;
$p = $pages->findOne("template=offer,mobile={$m}");
if ($p == "") {
$p->title = "Vijay Sharma";
$p->headline = '10,00,000';
$p->stat = 10;
}
 include(\ProcessWire\wire('files')->compile("partials/header_pl.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));?>
<style type="text/css">
.targetted_heading p{
line-height: 1em;
}
.fs-24{
font-size: 24px;
}
.fs-42{
font-size: 42px;
}
/*.cta_btn{
text-align: right;
}
.cta_btn a:first-child{
background-color: #00A546;border:1px solid #fff; padding:6px 62px 6px 24px;margin-right: 5px;
}
.cta_btn a img{
top: 1px;
right: 1px;
}
.cta_btn a:not(:first-child){
background-color: #fff;border:1px solid #fff; padding:6px 62px 6px 24px;margin-right: 5px;
}
.cta_btn a:last-child{
margin-right: 0;
}*/
.cta_btn{
display: flex;
justify-content: space-between;
align-content: center;
max-width: 800px;
margin: 0px auto;
}
.cta_btn a:not(:last-child){
margin-right: 10px;
}
.scb-button{
font-size: 16px;
line-height: 1.2;
color: white !important;
background: #7eb0ea;
border-radius: 5px;
display: flex;
align-items: center;
height: 45px;
overflow: hidden;
padding-right: 34px;
text-decoration: none;
-webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
border:#7eb0ea solid 1px;
}
.scb-button .icon-box{
fill: #0473ea;
background: white;
display: flex;
height: 100%;
justify-content: center;
align-items: center;
width: 56px;
margin-right: 10px;
border-radius:  0 5px 0 0;
/*border-right: #2b6fc7 solid 3px;*/
-webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
}
.scb-button:hover,
.scb-button-active{
text-decoration: none !important;
color: #53ab50 !important;
background: white !important;
-webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
border:#53ab50 solid 1px;
}
.scb-button:hover .icon-box,
.scb-button-active .icon-box{
background: #38d200 !important;
fill:white !important;
-webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
}
.scb-button .icon-box svg{
width: 25px;
height: auto;
}
.hr_grey{
background:rgba(255,255,255,0.25);
position:absolute;
margin-top:-6px;
height:1px;
z-index: 2;
width: 100%;
}
.hr_blue{
background:#3576b4;
position:absolute;
margin-top:-14px;
height:1px;
z-index: 2;
width: 100%;
}
.title{
  background: #d7e9f1;
padding-right:8px;
position: relative;
z-index: 3;
}
.ff-light{
font-weight: 300!important;
}
.ff-normal{
font-weight: 400!important;
}
.uk-border-white{
border:1px solid #ffffff6e;
}
.uk-border-green{
border:1px solid #6aa95b;
}
.ui-slider-handle-wrapper div{
width: 100%;
}
.mt-30{
margin-top: 30px;
}
#slider .ui-slider-range, #slider2 .ui-slider-range,#slider .ui-slider-handle, #slider2 .ui-slider-handle{
background-color: #6aa95b;border-color: #6aa95b;
}
.range_details span{bottom:-29px;}
.range_details span:first-child{left: 0;}
.range_details span:last-child{right: 0;}
#slider, #slider2{background-color:white}
.ui-widget.ui-widget-content{border:1px solid #ffffff00}
.uk-subnav li a{
border-bottom: 1px solid #fff;
}
.uk-subnav li.uk-active a{
border-bottom: 1px solid #0775B1;
}
@media screen and (min-width: 1441px) and (max-width:1600px){
.targetted_heading p{
font-size: 22px;
}
.targetted_heading{
top: 5%;
}
}
@media screen and (min-width: 1601px){
.targetted_heading p{
  font-size: 22px;
}
.targetted_heading p span:not(:first-child),.title{
  font-size: 22px;
}
.targetted_heading p span:nth-child(2){
  font-size: 22px;
}
.ui-slider-handle-wrapper input{
  font-size: 22px;
}
}
@media screen and (min-width:1024px) and (max-width: 1300px){
.targetted_heading{
top: 1%;
}
.targetted_heading p{
  font-size: 22px;
  line-height: 1.5em;
  width: 100%;
}
.targetted_heading p span{
font-size: 19px;
}
.ui-slider-handle-wrapper input{
font-size: 16px;
}
#custom-handle{
width: 65px;
}
#custom-handle2{
width: 40px;
}
.yr{
font-size: 16px;
}
.mt-10{
margin-top: 10px;
}
.title{
font-size: 18px;
}
.cta_btn{
max-width: 650px;
}
}
@media screen and (width:1024px){

.targetted_heading p{
line-height: 1.3em;
margin-bottom: 8px;
}
.cta_btn{
  width: 100%;
  margin-top: 0;
}
	.scb-button {
		font-size: 14px;
		padding-right: 10px;
	}
}
@media screen and (max-width:768px){
.scb-button .icon-box svg {
width: 20px;
height: 20px;
}
.scb-button {
font-size: 12px;
height: 40px;
padding-right: 10px;
border-radius: 8px;
}
.targetted_heading{
  padding: 20px 0;
}
.cta_btn{
  width: 100%;
  margin-top: 10px;
}
.targetted_heading p,.targetted_heading p span{
font-size: 22px;line-height: 1.3em;
}
#custom-handle{
width: 64px;
}
.ui-slider-handle-wrapper span,.ui-slider-handle-wrapper input,.title{
font-size: 16px;
}
.hr_grey{
display: none;
}
/*.total,.cta_btn{
width: 100%;text-align: center;
}*/
.cta_btn a{
margin:4px;
}
.mob_img{
height: 600px;
}
}
	
@media screen and (width:768px){
.ui-slider-handle-wrapper span,.ui-slider-handle-wrapper input,.title{
font-size: 16px;
}
.targetted_heading{
top: 1%;
}
.targetted_heading p,.targetted_heading p span{
font-size: 22px;line-height: 1.3em;
}
.mob_img{
height: 450px;
}
.cta_btn{
  width: 85%;
  float: left;
}
}
</style>
<div class="uk-position-relative uk-visible-toggle uk-light" ng-app="plApp">
  <!-- <img class="hidden_on_mobile uk-width-1-1 mob_img" src="<?=$tpl?>assets/images/blue-rectangle.png">
  <img class="hidden_on_desktop hidden_on_tab mob_img" src="<?=$tpl?>assets/images/blue-rectangle-mobile.png"> -->
  <div class="targetted_heading targetted_heading_top bg-d7" ng-controller="PlController as vm">
    <div class="uk-container">
      
      <p class="uk-margin-bottom text-27"><span class="ff-light fs-22">Dear</span> <span class="fs-22 fs-12-mobile text-blue"><?=$p->title?></span></p>
      <div class="text-27 fs-22 uk-margin-bottom"><span class="ff-light">You have a pre-approved loan of </span><span class="text-blue ff-bold">₹<?=$p->headline?></span> <span class="ff-light">at an attractive interest rate of </span> <span class="text-blue ff-bold">12.05%</span> <span class="ff-light">with EMI of </span><span class="text-blue ff-bold">₹48,000</span></div>
      <div class="uk-position-relative">
        <span class="title fs-20 ff-helvetica text-blue ff-bold">Choose your loan amount and tenure</span>
        <div class="hr_blue">&nbsp;</div>
      </div>
      <div class="uk-grid uk-margin">
        <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s uk-width-1-1">
          <div class="uk-position-relative mt-30 mt-10">
            <div class="uk-grid">
              <div class="uk-width-1-4">
                <div class="uk-position-relative ui-slider-handle-wrapper">
                  <div class=" fs-22 uk-border-green uk-border-rounded p-10 uk-text-white uk-overflow-auto uk-text-center"><div class="fs-14 text-27">Loan Amount</div><span class="uk-align-center uk-margin-remove text-27 fs-20 .ff-normal">&#8377;<input type="text" value="5,00,000" id="custom-handle" class="ui-slider-handle text-27 fs-20 onlydigit" ng-model="priceSlider.value" ng-change="pmt(priceSlider.value,tenureSlider.value, 13)"/></span></div>
                </div>
              </div>
              <div class="uk-width-3-4">
                <!-- <div id="slider"></div> -->
                <rzslider rz-slider-model="priceSlider.value" rz-slider-options="priceSlider.options"></rzslider>
                <div class="ff-helvetica range_details uk-position-relative text-27 fs-14">
                  <span>Min: 3 Lakh</span>
                  <span>Eligibility</span>
                  <span>Max: <?=$p->stat?> Lakh</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s uk-width-1-1">
          <div class="uk-position-relative mt-30 mt-10">
            <div class="uk-grid">
              <div class="uk-width-1-4">
                <div class="uk-position-relative ui-slider-handle-wrapper">
                  <div class=" fs-22 uk-border-green uk-border-rounded p-10 uk-text-white uk-overflow-auto uk-text-center"><div class="fs-14 text-27">Tenure</div><span class="uk-margin-remove ff-normal"><input type="number" value="3" min="1" max="5" id="custom-handle2" class="ui-slider-handle uk-text-right fs-20 onlydigit text-27 tenure-inputbox" ng-model="tenureSlider.value" ng-change="pmt(priceSlider.value,tenureSlider.value, 13)" />&nbsp;<span class="yr text-27">Year</span></span></div>
                </div>
              </div>
              <div class="uk-width-3-4">
                
                <!-- <div id="slider2"></div> -->
                <rzslider rz-slider-model="tenureSlider.value" rz-slider-options="tenureSlider.options"></rzslider>
                <div class="ff-helvetica range_details uk-position-relative text-27">
                  <span class=" fs-14">Min: 1 Year</span>
                  <span class=" fs-14"></span>
                  <span class=" fs-14">Max: 5 Years</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="uk-position-relative uk-width-1-1">
          <hr>
        </div>
        <div class="uk-width-1-1 uk-overflow-auto uk-margin-top">
          <div class="total uk-text-white uk-float-left">
            <span class="fs-20 text-33 ff-helvetica-medium">Total Amount:&nbsp;</span><span class="fs-30 text-blue ff-helvetica-medium">{{total_amount | INR}}</span>
          </div>
          <div class="cta_btn uk-float-right">
            <!-- <a href="#rtobModal" class="uk-button uk-border-pill uk-text-white ff-helvetica-bold uk-position-relative uk-text-capitalize fs-16" uk-toggle>Continue to apply online<img class="uk-position-absolute" src="<?=$tpl?>assets/images/btn-arrow-1.png"></a>
            <a href="#callbackModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-16" uk-toggle>Request a call back<img class="uk-position-absolute" src="<?=$tpl?>assets/images/req-arrow.png"></a>
            <a href="#chatModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-16" uk-toggle>Click to chat<img class="uk-position-absolute" src="<?=$tpl?>assets/images/chat-arrow.png"></a>-->
            
            <a href="#rtobModal" class="scb-button scb-button-active" uk-toggle>
              <div class="icon-box">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
              </div>Continue to apply online
            </a>
            <a href="#callbackModal" class="scb-button" uk-toggle>
              <div class="icon-box">
                <svg height="511pt" viewBox="0 0 511.99696 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m440.964844 388.949219c-.003906 0-.003906 0 0 0l-77.542969-50.957031c-18.460937-12.128907-42.421875-11.074219-59.628906 2.617187-15.074219 11.996094-36.707031 10.769531-50.328125-2.851563l-78.730469-78.730468c-13.617187-13.617188-14.84375-35.253906-2.851563-50.324219 13.695313-17.210937 14.746094-41.175781 2.617188-59.632813l-50.957031-77.542968c-8.910157-13.558594-22.730469-21.671875-38.917969-22.847656-16.1875-1.167969-31.03125 4.863281-41.800781 16.996093-59.6875 67.210938-56.628907 169.667969 6.960937 233.253907l163.777344 163.78125c33.085938 33.085937 76.691406 49.78125 120.386719 49.78125 40.277343 0 80.628906-14.191407 112.871093-42.820313 12.128907-10.773437 18.164063-25.621094 16.992188-41.804687-1.175781-16.183594-9.289062-30.003907-22.847656-38.917969zm-14.066406 58.292969c-55.355469 49.160156-139.75 46.636718-192.128907-5.742188l-163.777343-163.777344c-52.378907-52.378906-54.902344-136.773437-5.742188-192.128906 4.164062-4.691406 9.347656-7.0625 15.4375-7.0625.578125 0 1.167969.023438 1.769531.066406 6.851563.496094 12.242188 3.660156 16.015625 9.40625l50.957032 77.539063c5.070312 7.71875 4.667968 17.328125-1.019532 24.480469-21.5 27.019531-19.300781 65.800781 5.113282 90.214843l78.730468 78.730469c24.414063 24.414062 63.195313 26.613281 90.214844 5.113281 7.152344-5.691406 16.761719-6.089843 24.476562-1.019531l77.542969 50.957031c5.742188 3.773438 8.90625 9.164063 9.402344 16.015625.5 6.855469-1.855469 12.644532-6.992187 17.207032zm0 0"/><path d="m507.589844 4.878906c-2.925782-2.921875-6.757813-4.378906-10.589844-4.378906-3.84375 0-7.691406 1.46875-10.621094 4.40625l-167.355468 167.785156.003906-54.207031c0-8.28125-6.714844-14.996094-14.996094-14.996094-8.285156 0-15 6.714844-15 14.996094l-.003906 90.484375c0 3.976562 1.578125 7.792969 4.394531 10.605469 2.8125 2.8125 6.625 4.394531 10.601563 4.394531h90.488281c8.285156 0 15-6.714844 15-15 0-8.28125-6.714844-14.996094-15-14.996094h-54.34375l167.449219-167.882812c5.851562-5.867188 5.839843-15.363282-.027344-21.210938zm0 0"/></svg>
              </div>
              Request a callback
            </a>
            <a href="https://www.sc.com/in/interact/Client/Intermediate?entryType=IN_SALESCHAT&mediumType=C&subjectId=IN_SALESCHAT_PL" class="scb-button" target="_blank">
              <div class="icon-box">
                <svg version="1.1" id="Capa_1" x="0px" y="0px"
                  viewBox="0 0 511.999 511.999">
                  <g>
                    <g>
                      <path d="M467,75.993h-45v-15c0-24.813-20.187-45-45-45H45c-24.813,0-45,20.187-45,45v240c0,24.813,20.187,45,45,45h45v75
                        c0,13.384,16.222,19.992,25.606,10.606l25.607-25.606h169.574l85.606,85.606c9.389,9.393,25.606,2.8,25.606-10.606v-75h45
                        c24.813,0,45-20.187,45-45v-240C512,96.18,491.813,75.993,467,75.993z M120,384.78v-53.787c0-8.284-6.716-15-15-15H45
                        c-8.271,0-15-6.729-15-15v-240c0-8.271,6.729-15,15-15h332c8.271,0,15,6.729,15,15v240c0,8.271-6.729,15-15,15H195
                        c-3.979,0-7.793,1.581-10.606,4.394L120,384.78z M482,360.993c0,8.271-6.729,15-15,15h-60c-8.284,0-15,6.716-15,15v53.787
                        l-64.394-64.393c-2.813-2.813-6.628-4.394-10.606-4.394H171.213l30-30H377c24.813,0,45-20.187,45-45v-195h45
                        c8.271,0,15,6.729,15,15V360.993z"/>
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M287,105.993H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h212c8.284,0,15-6.716,15-15S295.284,105.993,287,105.993z"/>
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M347,165.993H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h272c8.284,0,15-6.716,15-15S355.284,165.993,347,165.993z"/>
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M227,225.993H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h152c8.284,0,15-6.716,15-15S235.284,225.993,227,225.993z"/>
                      </g>
                    </svg>
                  </div>
                  Click to chat
                </a>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="modal-otp" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center uk-position-relative brad">
          <div class="bg_band"></div>
          <button class="uk-modal-close-default" type="button" uk-close></button>
          <span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span>
          <h4 class="uk-h3 uk-margin-top ff-light">Please verify your mobile number with OTP</h4>
          <form class="uk-grid uk-grid-small uk-width-1-1 uk-flex uk-flex-middle">
            <div class="uk-width-1-3@s uk-width-1-1">
              <div>
                <label>Mobile number</label>
              </div>
              <div class="uk-inline">
                <span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
                <input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile" id="verifymobile" type="tel" value="9988776655" disabled tabindex="1" />
              </div>
            </div>
            <div class="uk-width-1-3@s uk-width-1-1">
              <label>Verification OTP</label>
              <input class="uk-input uk-form-width-input uk-border-rounded" name="otpmobile" id="otpmobile" type="tel" value="" tabindex="2" autofocus />
            </div>
            <div class="uk-width-1-3@s uk-width-1-1">
              <label>&nbsp;</label>
              <div>
                <a href="3-apply-online.php" class="uk-button uk-button-small uk-btn-green-bg uk-margin-small-right uk-text-white">Go</a>
                <button class="uk-button uk-button-small uk-btn-blue-bg uk-border-pill">Resend</button>
              </div>
            </div>
          </form>
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
          <h4 class="uk-h3 uk-margin-top">User continues journey via chatbot</h4>
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
              <div>
                <label>Mobile number</label>
              </div>
              <div class="uk-inline">
                <span class="uk-form-icon icon-plus-91 icon-margin-remove"></span>
                <input class="uk-input uk-form-width-input uk-border-rounded" name="verifymobile" id="verifymobile" type="tel" value="9988776655" disabled tabindex="1" />
              </div>
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
      
      <div class="uk-margin-large-top uk-container cc-container">
<div class="uk-box-shadow-large">

<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
  <?php
  $i = 1;
  foreach ($pages->get("id=1015")->feature_tabs as $t) { 
    if ($i == 1) {
      $factive = "tabs_head_active";
    }else{
      $factive = "";
    }
  ?>
  <div id="head_<?=$i?>" class="tabs_head <?=$factive?> uk-width-1-4 uk-text-center p-25">
    <h5 class="fs-20 uk-text-35 ff-light"><?=$t->title?></h5>
  </div>
  <?php $i++; } ?>
</div><!-- grid -->

<div class="tabs_content">

<?php
  $i = 1;
  foreach ($pages->get("id=1015")->feature_tabs as $t) {
    if ($i == 1) {
      $factive = "tabs_head_active";
    }else{
      $factive = "";
    }
  ?>
  <div id="head_<?=$i?>" class="hidden_on_desktop hidden_on_tab tabs_head <?=$factive?> uk-text-center uk-padding-small">
    <h5 class="fs-16 uk-text-35 ff-light uk-margin-remove"><?=$t->title?></h5>
  </div>
  <div id="para_<?=$i?>" class="tabs_para uk-padding">
    <?php if ($i == 1): ?>
      <div class="tabs_content_slider"  uk-slider>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

           <ul class="uk-slider-items uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid">
            <?php foreach ($t->features as $tf): ?>
               <li>
                   <div class="uk-panel uk-text-center">
                       <img src="<?=$tf->image->url?>" alt="">
                       <h6 class="uk-margin-top ff-helvetica fs-18 uk-text-2D"><?=$tf->headline?></h6>
                   </div>
               </li>
            <?php endforeach ?>
           </ul>

           <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
           <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
      </div>
    <?php elseif ($i == 2): ?>
      <div class="uk-grid">
            <div class="uk-width-1-4 hidden_on_mobile"></div>
            <?php foreach ($t->features as $tf): ?>
              <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2">
                 <div class="uk-panel uk-text-center">
                     <img src="<?=$tf->image->url?>" />
                     <h6 class="uk-margin-top ff-helvetica fs-18 uk-text-2D"><?=$tf->headline?></h6>
                 </div>
              </div>
            <?php endforeach ?>
            <div class="uk-width-1-4 hidden_on_mobile"></div>
        </div>
    <?php elseif ($i == 3): ?>
      <ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
        <?php foreach ($t->features as $tf): ?>
          <?php if ($tf->depth == 0): ?>
            <li><a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#"><?=$tf->headline?></a></li>
          <?php endif ?>
          <?php endforeach ?>
      </ul>

      <ul class="uk-switcher uk-margin">
          <li>
              <div class="uk-grid uk-flex-center">
                <?php foreach ($t->features as $tf): ?>
                  <?php if ($tf->id == 28388 || $tf->id == 28389 || $tf->id == 28390 || $tf->id == 28391): ?>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                        <img class="docs_img" src="<?=$tf->image->url?>">
                        <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
                      </div>
                    <?php endif ?>
                  <?php endforeach ?>
              </div>
          </li>
          <li>
              <div class="uk-grid uk-flex-center">
                <?php foreach ($t->features as $tf): ?>
                  <?php if ($tf->id == 28388 || $tf->id == 28389 || $tf->id == 28394 || $tf->id == 28395): ?>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                        <img class="docs_img" src="<?=$tf->image->url?>">
                        <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
                      </div>
                    <?php endif ?>
                  <?php endforeach ?>
              </div>
          </li>
          <li>
              <div class="uk-grid uk-flex-center">
                <?php foreach ($t->features as $tf): ?>
                  <?php if ($tf->id == 28396 || $tf->id == 28397): ?>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                        <img class="docs_img" src="<?=$tf->image->url?>">
                        <h4 class="fs-18 uk-text-55 uk-margin-small-top"><?=$tf->headline?></h4>
                      </div>
                    <?php endif ?>
                  <?php endforeach ?>
              </div>
          </li>
      </ul>
    <?php elseif ($i == 4): ?>
      <div class="tabs_content_slider"  uk-slider>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

        <ul class="faqs" uk-accordion="multiple: true">
          <?php $j = 1;
          foreach ($t->faqs as $faq): ?>
            <li>
                  <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#"><?=$faq->headline?><span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
                  <div class="uk-accordion-content">
                      <p class="uk-text-89 fs-16"><?=$faq->summary?></p>
                  </div>
              </li>
          <?php endforeach ?>
        </ul>

        </div>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
      </div>
    <?php endif ?>

  </div>
<?php $i++; } ?>  

</div><!-- tabs_content -->
</div><!-- uk-box-shadow-large -->
</div><!-- cc-container -->


    </div>
  </div>
  


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="https://rawgit.com/rzajac/angularjs-slider/master/dist/rzslider.js"></script>
<script>

var app = angular.module('plApp', ['rzSlider']);

app.filter('INR', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '₹ ';
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = input.toString().split('.');

            var lastThree = result[0].substring(result[0].length - 3);
            var otherNumbers = result[0].substring(0, result[0].length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            
            if (result.length > 1) {
                output += "." + result[1];
            }            

            return currencySymbol + output;
        }
    }
});

app.controller('PlController', function($scope){

  var price = 400000;
  var tenure = 3;
  $scope.emi = 0;
  $scope.total_amount = 0;
  $scope.pf = 0;
  $scope.savings = 0;

    $scope.priceSlider = {
        value: price,
        options: {
            floor: 300000,
            ceil: <?php echo intval(($p->stat * 100)."000")?>,
            step: 1000,
            showSelectionBar: true,
            getSelectionBarColor: function(){return '#00a546';}
        }
    }
    $scope.tenureSlider = {
        value: tenure,
        options: {
            floor: 1,
            ceil: 5,
            showSelectionBar: true,
            getSelectionBarColor: function(){return '#00a546';}
        }
    }

    if ($scope.pf == 0) {
      $scope.pf = $scope.priceSlider.value * 0.01;
    }
    if ($scope.savings == 0) {
      $scope.savings = $scope.pf * 1.5;
    }

    $scope.pmt = function(a,t,i){
    var month = t*12;
      var rate = i;
      var pamt = a;
    
      var monthlyInterestRatio = (rate/100)/12;
      var monthlyInterest = (monthlyInterestRatio*pamt);
      var top = Math.pow((1+monthlyInterestRatio),month);
      var bottom = top -1;
      var sp = top / bottom;
      var emi = ((pamt * monthlyInterestRatio) * sp);
      var result = emi.toFixed(2);
      var totalAmount = emi*month;
      var pf = a * 0.01;
      var yearlyInteret = totalAmount-pamt;
      var downPayment = pamt*(20/100);
      totalAmount = totalAmount + pf;

    $scope.emi = Math.round(emi);
      $scope.total_amount = Math.round(totalAmount);
  };

  $scope.$on('slideEnded', function() {
      // user finished sliding a handle
    $scope.pmt($scope.priceSlider.value, $scope.tenureSlider.value, 13);

    $scope.pf = $scope.priceSlider.value * 0.01;
      $scope.savings = $scope.pf * 1.5;
  });

  //calling on load
  $scope.pmt($scope.priceSlider.value, $scope.tenureSlider.value, 13);
});
</script>

  <?php 
 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_idle_popup.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));
 include(\ProcessWire\wire('files')->compile("partials/footer_pl.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)));?>