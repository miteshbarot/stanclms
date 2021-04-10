<?php
  $root = $config->urls->root;
  $tpl = $config->urls->templates;
  $siteUrl = $pages->get(1)->httpUrl;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Standard Chartered Bank - Credit Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/override.css">

  <style type="text/css">
    .targetted_heading {
      width: 47%;
      padding:0;
      top:9%;
      left: 5%;
    }
    .targetted_heading p{
      line-height: 1.25em;
      margin-bottom: 5%;
    }
    .targetted_heading .uk-panel img{
      float: left;
      width: 223px;
      margin-right:3%;
    }
    .fs-90{
      font-size: 90px;
    }
    .fs-42{
      font-size: 42px;
    }
    .targetted_heading .uk-panel .offer_des{
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
    .targetted_heading .uk-panel .uk-panel-content{
      line-height: 1.7em;
      /*width: 100%;*/
    }
    .ff-light{
      font-weight: 300!important;
    }
    @media screen and (min-width:1024px) and (max-width:1440px){
        .uk-slideshow-items{
          min-height: 400px!important;
        }
    }
    @media screen and (min-width: 1441px) and (max-width:1600px){
      .targetted_heading .uk-panel img{
        width: 300px;
      }
      .targetted_heading p{
        font-size: 47px;
      }
      .targetted_heading .uk-panel .uk-panel-content{
        font-size: 22px;
      }
    }
    @media screen and (min-width: 1601px){
      .targetted_heading {
        left: 10%;
      }
      .targetted_heading p{
        font-size: 40px;
      }
      .targetted_heading .uk-panel img{
        width: 380px;
      }
      .offer_des{
        font-size: 32px;
      }
      .targetted_heading .uk-panel .uk-panel-content{
        font-size: 25px;
      }
    }
    @media screen and (min-width:1024px) and (max-width: 1300px){
      .targetted_heading{
        left: 3%;
      }
      .targetted_heading .uk-panel img{
        margin-right: 35px!important;
      }
      .targetted_heading .uk-panel .uk-panel-content{
        font-size: 16px;
      }
    }
    @media screen and (width:1024px){
      .targetted_heading p{
        font-size: 21px;
      }
       .targetted_heading .uk-panel .uk-panel-content{
          width: 100%;
       }
      
    }
    @media screen and (max-width:768px){
      .targetted_heading{
          width: 100%;
          top:1%;
          left: auto;
      }
      .targetted_heading p{
        font-size: 21px;
        margin-bottom: 0px;
      }
      .targetted_heading .uk-panel img{
        width: 150px;
        float: none;
        margin: 10px 0;
      }
      .targetted_heading .uk-panel .uk-panel-content{
        line-height: 1.5em;
      }
      
    }
    @media screen and (width:768px){
      .form_section {
        margin-top: 0;
      }
      .targetted_heading{
        width: 78%;
        top: 6%;
        left: 11%;
      }
    }
</style>

</head>
<body>

<header>
    <div class="bg_band"></div>
    <div class="uk-container uk-container-large">
        <nav class="uk-navbar-container p-logo uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <a href="<?=$siteUrl?>"><img class="logo" src="<?=$tpl?>assets/images/logo.png"></a>
            </div>
            <div class="uk-navbar-right">
                <h1 class="uk-margin-remove fs-22 fs-16-mobile ff-helvetica-bold uk-primary uk-text-right"><span class="ff-helvetica">You are applying for</span>
                <br>DigiSmart Card</h1>
                <img class="cc-header hidden_on_mobile" src="<?=$tpl?>assets/images/cc-small.png">
            </div>
        </nav>
    </div>
</header>