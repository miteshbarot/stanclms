<?php 
$m = $input->get->m;
$p = $pages->findOne("template=offer,mobile={$m}");
if ($p == "") {
  $card = $pages->get("id=28235");
  $p->title = "Vijay Sharma";
}
$card = $p->cc_product;

if(isset($_GET['u'])){
    $unique_id = $_GET['u'];
    $cardid = $_GET['c'];
    $lead = $pages->get("unique_id={$unique_id}");
    $card = $lead->cc_product;
    $checkCard = $pages->get("id={$card}");
    $product_url =$checkCard->link;
    $product_image =$checkCard->image->url;
    $card_name =$checkCard->tile;
  $product_type=$checkCard->code;
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
        "ext_lead_reference_number" => $lead->application_id
        ]; 
        $resjsn =json_encode($jayParsedAry,true);
  }else{
    //$session->redirect('/demo/lms/personal-loan/');
    $session->redirect($config->urls->root."credit-card/");
  }

 include(\ProcessWire\wire('files')->compile('partials/header_cc.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
?>
<style type="text/css">
    .targetted_heading {
      width: 100%;
      padding:0;
      top:unset;
      left: auto;
    }
    .targetted_heading p{
      line-height: 1.2em;
    }
    .targetted_heading .data_panel{
      width: 85%;
      margin:0 auto;
    }
    .targetted_heading .data_panel .cc_svtt{
      width: 240px;
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
    .targetted_heading .data_panel .uk-flex.uk-flex-middle{
      margin-bottom: 30px;
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
    display: flex;
    justify-content:center;
    align-content: center;
    max-width: 750px;
    margin: 0px auto;
    }
    .scb-button{
    font-size: 16px;
    line-height: 1.2;
    color: white !important;
    background: #7eb0ea;
    border-radius: 5px;
    border:#53ab50 solid 1px;
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
    }
    .scb-button .icon-box{
      fill: #2b6fc7;
    background: white;
    display: flex;
    height: 100%;
    justify-content: center;
    align-items: center;
    width: 56px;
    margin-right: 10px;
    border-radius:  0 5px 0 0;
    border-right: #2b6fc7 solid 3px;
    -webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
    }
    .scb-button:hover,
    .scb-button-active{
      text-decoration: none !important;
      color: #525355 !important;
      background: white !important;
      -webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 500ms ease;
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
    .ff-light{
      font-weight: 300!important;
    }
    .features_grid{
      text-align: center;position: relative;top: -8px;
    }
    .cc_features{
      font-size: 20px;
      line-height: 1.2;
    } 
    /*.targetted_heading p span{
      font-size: 30px;
    }*/
    .targetted_heading p{
      margin-bottom: 30px;
    }
    .uk-subnav li a{
        border-bottom: 1px solid #fff;
        background-color: #fff!important;
      }
      .uk-subnav li.uk-active a,.uk-subnav-pill>.uk-active>a{
        border-bottom: 1px solid #0775B1;background-color: #fff!important
      }
      .head_desk{
      display: flex;justify-content: center;align-items: center;
    }
    .cc-cardimg-holder{max-width: 200px;}
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
        font-size: 25px;
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
      .cta_btn{
        margin-top: 4px;
      }
    }
    @media screen and (min-width: 1601px){
      .targetted_heading{
        top: unset;
      }
      .targetted_heading p{
        font-size: 40px;
      }
      .targetted_heading .data_panel .cc_svtt{
        width:280px;
      }
      .offer_des{
        font-size: 32px;
      }
      .cta_btn{
        margin-top: 52px;
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
        font-size: 34px;
      }
      .cta_btn{
        margin-top: 11px;
      }
      .targetted_heading{
        top: 10%;
      }
    }
	 @media screen and (max-width:1440px){
		 .cc_features{
      font-size: 16px;
      line-height: 1.2;
    } 
		.targetted_heading.cc_heading {padding: 0 5%; top:0;}
		.tab_img{
        height: 380px;
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
        font-size: 25px;
        line-height: 1.3em;
        width: 100%;
        margin-bottom: 16px;
      }
      .cta_btn a{font-size: 15px;}
      .targetted_heading .data_panel{
        width: 97%;
      }
      .targetted_heading .data_panel .uk-flex.uk-flex-middle{
        margin: 10px 0;
      }
      .targetted_heading .data_panel .cc_svtt{
        width: 200px;
      }
	.cc_features{
      font-size: 16px;
      line-height: 1.2;
    } 
		.targetted_heading.cc_heading {padding: 0 5%; top:0;}
		.tab_img{
        height: 340px;
      }
    }
    @media screen and (max-width:768px){
      .targetted_heading.cc_heading{
          width: 100%;
          top:2%;
          left: auto;
          padding: 0 10px;
      }
      .targetted_heading p,.targetted_heading p span{
        font-size: 20px;
        line-height: 1.5;
        margin: 10px 0;
      }
      .targetted_heading .data_panel .cc_svtt{
        width: 200px;
        float: none;
        margin-top: 0;
      }
      .targetted_heading .data_panel{
        width: 100%;  
        margin-bottom: 10px;
      }
      .cta_btn{
        width: 75%;
      }
      .cta_btn a{
        margin:4px;
      }
      .mob_img{
        height: 480px;
      }
      .features_grid{
        padding-top: 22px;
        width: 96%;
        margin: 0 auto;
      }
      .cc_features{
        font-size: 14px;;
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
      .scb-button{
        font-size: 12px;
        height: 40px;
        padding-right: 10px;
        border-radius: 5px;
      }
      .cta_btn{
        margin-top: 0;
      }
      .scb-button .icon-box{
        border-radius: 0 5px 0 0;
        width: 42px;
      }
      .scb-button .icon-box svg{
        width: 20px;
        height: 20px;
      }
      .wallet{
        padding: 0 8px;
      }
      .targetted_heading .data_panel .uk-flex.uk-flex-middle{
        margin-bottom: 15px;
      }
     
		.cc-bannertxt-holder {margin-left: 5%; width: 65%}
		.cc-banner-features {margin-top: 0;}
		.uk-container {max-width: 90%!important;}
		.targetted_heading p {
			width: 100%;
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
      .targetted_heading.cc_heading{
        width: 97%;
        top: 6%;
        right: 0;
        left: auto;
      }
      
      .cta_btn{
        position: relative;top: -25px;
      }
      .uk-navbar-right h1{
        font-size: 18px;
      }
    }
    @media (max-width: 640px){
      .targetted_heading .data_panel .uk-flex{
        flex-direction: column;
      }
      .targetted_heading .data_panel .uk-flex.uk-flex-middle{
        margin-bottom: 0;
      }
		.targetted_heading p {
			width: 100%;
		}
		.cc-banner-holder {height: 560px;}
    }
	
	/* Mobile Display */
	
	@media screen and (max-width:480px){
      .cc_features{
        font-size: 14px;
		text-align:left!important;
      }
		.mob_img{
        height: 480px;
      }
		.cta_btn{
        width: 100%;
      }
		.targetted_heading p {
			width: 100%;
		}
    }
</style>

<!-- <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: slide;min-height: 300; max-height:450"> -->
<div class="uk-position-relative uk-visible-toggle uk-light uk-flex uk-flex-middle cc-banner-holder">
    <!-- <ul class="uk-slideshow-items"> -->
        <!-- <li> -->
            <img class="hidden_on_mobile uk-width-1-1 tab_img" src="<?=$tpl?>assets/images/cc-desktop-bg.jpg">
            <img class="hidden_on_desktop hidden_on_tab mob_img" src="<?=$tpl?>assets/images/cc-mobile-bg.jpg">
            <div class="targetted_heading cc_heading targetted_heading_top uk-text-white">
				<div class="uk-flex uk-flex-middle uk-flex-center cc-bannertxt-wrapper">
				<div class="cc-cardimg-holder"><img class="cc_svtt" src="<?=$card->image->url?>"></div>
              <!-- div class="cc-bannertxt-holder"><p class="fs-34 ff-helvetica-bold scb_heading fs-12-mobile uk-text-left"><span class="ff-light">Congratulations</span> <br><span class="fs-30 ff-helvetica-medium">you have a pre-approved</span>  <span class="fs-30"><?=$card->title?> offer</span></p></div -->
					</div>
              <div class="data_panel">
               
                 <!-- <div class="uk-flex uk-flex-middle uk-flex-center uk-child-width-1-2@s cc-banner-features">
                     
                    <div class="uk-grid-small uk-grid features_grid " style="flex-grow: 1;">
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/get-new.png" class="preapproved-banner-icon">
                        <div class="uk-margin-remove cc_features uk-text-center">Get 5% cashback on fuel, phone and utility bills.</div>
                      </div>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/reward-new.png" class="preapproved-banner-icon">
                        <div class="uk-margin-remove cc_features uk-text-center">Earn exciting rewards on all spends above Rs.150</div>
                      </div>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/discount.png" class="preapproved-banner-icon">
                        <div class="cc_features uk-text-center fs-15">Enjoy offers across dining, shopping & many more</div>
                      </div>
                      <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-1 ff-helvetica fs-16">
                        <img src="<?=$tpl?>assets/images/markup-new.png" class="preapproved-banner-icon">
                        <div class="cc_features uk-text-center fs-15">Spend and save up to Rs.6000 year on year basis</div>
                      </div>
                    </div>
                    
                  </div>-->
                  <div class="cta_btn">
                      <!-- <a " class="uk-button uk-border-pill uk-text-white ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Apply Now<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/btn-arrow-1.png"></a>
                      <a href="#chatModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Chat<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/chat-arrow.png"></a>
                      <a href="#callbackModal" class="uk-button uk-border-pill uk-secondary ff-helvetica-bold uk-position-relative uk-text-capitalize fs-18" uk-toggle>Request Callback<img class="uk-position-absolute" src="<?=$tpl?>/assets/images/req-arrow.png"></a> -->
                      <a href='https://origination.sc.com/onboarding/www/rtoForms/index.html#/onboarding?products=<?php echo $resjsn; ?>' class="scb-button scb-button-active" uk-toggle> <!-- rtbModal -->
                        <div class="icon-box">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                        </div>
                        Continue to apply online
                      </a>
                      <!--<a href="#callbackModal" class="scb-button" uk-toggle>
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
                        Request callback
                      </a>-->
                      <!-- <a href="#chatModal" class="scb-button" uk-toggle> -->
                      <!--<a href="https://www.sc.com/in/interact/Client/Intermediate?entryType=IN_SALESCHAT&mediumType=C&subjectId=IN_SALESCHAT_CC" target="_blank" class="scb-button">
                        <div class="icon-box">
                          <svg height="511pt" viewBox="0 0 511.99696 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m440.964844 388.949219c-.003906 0-.003906 0 0 0l-77.542969-50.957031c-18.460937-12.128907-42.421875-11.074219-59.628906 2.617187-15.074219 11.996094-36.707031 10.769531-50.328125-2.851563l-78.730469-78.730468c-13.617187-13.617188-14.84375-35.253906-2.851563-50.324219 13.695313-17.210937 14.746094-41.175781 2.617188-59.632813l-50.957031-77.542968c-8.910157-13.558594-22.730469-21.671875-38.917969-22.847656-16.1875-1.167969-31.03125 4.863281-41.800781 16.996093-59.6875 67.210938-56.628907 169.667969 6.960937 233.253907l163.777344 163.78125c33.085938 33.085937 76.691406 49.78125 120.386719 49.78125 40.277343 0 80.628906-14.191407 112.871093-42.820313 12.128907-10.773437 18.164063-25.621094 16.992188-41.804687-1.175781-16.183594-9.289062-30.003907-22.847656-38.917969zm-14.066406 58.292969c-55.355469 49.160156-139.75 46.636718-192.128907-5.742188l-163.777343-163.777344c-52.378907-52.378906-54.902344-136.773437-5.742188-192.128906 4.164062-4.691406 9.347656-7.0625 15.4375-7.0625.578125 0 1.167969.023438 1.769531.066406 6.851563.496094 12.242188 3.660156 16.015625 9.40625l50.957032 77.539063c5.070312 7.71875 4.667968 17.328125-1.019532 24.480469-21.5 27.019531-19.300781 65.800781 5.113282 90.214843l78.730468 78.730469c24.414063 24.414062 63.195313 26.613281 90.214844 5.113281 7.152344-5.691406 16.761719-6.089843 24.476562-1.019531l77.542969 50.957031c5.742188 3.773438 8.90625 9.164063 9.402344 16.015625.5 6.855469-1.855469 12.644532-6.992187 17.207032zm0 0"/><path d="m507.589844 4.878906c-2.925782-2.921875-6.757813-4.378906-10.589844-4.378906-3.84375 0-7.691406 1.46875-10.621094 4.40625l-167.355468 167.785156.003906-54.207031c0-8.28125-6.714844-14.996094-14.996094-14.996094-8.285156 0-15 6.714844-15 14.996094l-.003906 90.484375c0 3.976562 1.578125 7.792969 4.394531 10.605469 2.8125 2.8125 6.625 4.394531 10.601563 4.394531h90.488281c8.285156 0 15-6.714844 15-15 0-8.28125-6.714844-14.996094-15-14.996094h-54.34375l167.449219-167.882812c5.851562-5.867188 5.839843-15.363282-.027344-21.210938zm0 0"/></svg>
                        </div>
                        Click to chat
                      </a>-->
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


<div class="uk-margin-large-top uk-container cc-container">
<div class="">

<div class="uk-grid-collapse hidden_on_mobile" uk-grid>
<?php 
// if($_GET['card']=='28229'){

// $features = $pages->get("id=1016");
// }else{
$features = $pages->get("id={$card}");
//}
  
  
  $f = 1;
  foreach ($features->feature_tabs as $t): 
    if ($f == 1) {
      $factive = "tabs_head_active";
    }else{
      $factive = "";
    }
  ?>

  <div id="head_<?=$f?>" class="tabs_head <?=$factive?> uk-width-1-5 uk-text-center p-25 head_desk">
    <h5 class="fs-20 uk-text-35 ff-light"><?=$t->title?></h5>
  </div>

  <?php $f++;
  endforeach ?>
</div>

<div class="tabs_content">

<?php 
// if($_GET['card']=='28229'){

// $features = $pages->get("id=1016");
// }else{
$features = $pages->get("id={$card}");
//}
$f = 1;
foreach ($features->feature_tabs as $t): 
  if ($f == 1) {
    $factive = "tabs_head_active";
  }else{
    $factive = "";
  }
?>

<div id="head_<?=$f?>" class="hidden_on_desktop hidden_on_tab tabs_head <?=$factive?> uk-text-center uk-padding-small">
  <h5 class="fs-16 uk-text-35 ff-light uk-margin-remove"><?=$t->title?></h5>
</div>
<div id="para_<?=$f?>" class="tabs_para uk-padding">

  <?php if ($t->title == "Benefits"): ?>
    <ul class="uk-grid uk-flex-center">
      <?php foreach ($t->features as $tf): 
      if ($tf->depth == 0) { ?>
        <li class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
          <img src="<?=$tf->image->url?>">
          <div class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile">
            <?=$tf->headline?>
          </div>
        </li>
      <?php } ?>      
      <?php endforeach ?>
    </ul>
  
    <ul class="uk-switcher uk-margin">
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          foreach ($t->features as $tf):
          if ($tf->id == 28461 || $tf->id == 28462 || $tf->id == 28463 || $tf->id == 28464) {
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          foreach ($t->features as $tf):
          if ($tf->id == 28465 || $tf->id == 28466 || $tf->id == 28467) {
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          foreach ($t->features as $tf):
          if ($tf->id == 28468 || $tf->id == 28469) {
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
    </ul>
    
  <?php endif ?>

  <?php if ($t->chart_table): ?>
    <table class="uk-table uk-table-striped ff-helvetica fs-18 uk-text-center value-table">
      <?php foreach ($t->chart_table as $table): ?>
        <tr>
          <?php foreach ($table->table_row as $tr): ?>
            <?php if ($table->toggle == 1): ?>
              <th class="uk-text-center"><?=$tr->stat?></th>
            <?php else: ?>
              <td><?=$tr->stat?></td>
            <?php endif ?>  
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </table>
  <?php endif ?>

  <?php if ($t->title == "Fees and charges"): ?>
    <div class="uk-grid uk-divider">
      <div class="uk-width-1-4 hidden_on_mobile"></div>
      <?php foreach ($t->features as $tf): ?>
        <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-4@s uk-width-1-2 uk-text-center mt-40">
              <img class="docs_img" src="<?=$tf->image->url?>">
              <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->desc?></h4>
            </div>  
      <?php endforeach ?>
        <div class="uk-width-1-4 hidden_on_mobile"></div>
    </div>
  <?php endif ?>

  <?php if ($t->title == "FAQs"): ?>
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
       <ul class="faqs" uk-accordion="multiple: true">
          <?php 
            $fidex = 1;
          foreach ($t->faqs as $faq) {
            if ($findex == 1) {
              $faq_active = "uk-open";
            }else{
              $faq_active = "";
            }
        ?>
            <li class="<?=$faq_active?>">
                <a class="uk-accordion-title uk-text-55 uk-text-bold" href="#"><?=$faq->headline?><span class="uk-align-right uk-margin-remove" uk-icon="icon:plus"></span></a>
                <div class="uk-accordion-content">
                    <p class="uk-text-89 fs-16"><?=$faq->summary?></p>
                </div>
            </li>
        <?php
          }
        ?>
      </ul>
    </div>
  <?php endif ?>

  <?php if ($t->title == "Eligibility and documentation"): ?>
    <ul class="uk-subnav uk-subnav-pill" uk-switcher style="display: flex;justify-content: center;align-items: center;">
      <?php foreach ($t->features as $tf):

      if ($tf->depth == 0) { ?>
        <li>
          <a style="font-size: 18px;" class="ff-helvetica fs-22 uk-text-2D" href="#"><?=$tf->headline?></a>
        </li>
      <?php } ?>      
      <?php endforeach ?>
    </ul>
  
    <ul class="uk-switcher uk-margin">
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          $i=1;
          foreach ($t->features as $tf):
            //echo $tf->id." ".$tf->headline;
          //if ($tf->id == 28473 || $tf->id == 28474 || $tf->id == 28475 || $tf->id == 28476) {
            if($tf->features_type->title=="eligibility criteria"){
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          foreach ($t->features as $tf):
          //if ($tf->id == 28477 || $tf->id == 28478 || $tf->id == 28479) {
          if($tf->features_type->title=="salaried"){
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
      <li>
        <div class="uk-grid uk-flex-center">
        <?php
          foreach ($t->features as $tf):
          //if ($tf->id == 28480 || $tf->id == 28481 || $tf->id == 28482) {
            if($tf->features_type->title=="self-employed"){
          ?>
          <div class="uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-40">
                  <img class="docs_img" src="<?=$tf->image->url?>">
                  <h4 class="fs-18 uk-text-55 uk-margin-small-top fs-14-mobile"><?=$tf->headline?></h4>
                </div>  
        <?php } endforeach  ?>
        </div>
      </li>
    </ul>
  <?php endif ?>

</div>

<?php $f++;
endforeach ?>
  
</div><!-- tabs_content -->
</div><!-- uk-box-shadow-large -->
</div><!-- cc-container -->


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
      <h4 class="uk-h3 uk-margin-top">Schedule callback</h4>
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



<?php include(\ProcessWire\wire('files')->compile('partials/footer_cc.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>