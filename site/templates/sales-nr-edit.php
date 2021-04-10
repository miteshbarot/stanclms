<?php include 'partials/_sales_header.php'; ?>
<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
       <?php
              $id = $input->get->id;
              $p = $pages->get("id={$id}");

              $countries  = array(
                     array('code' => '973', 'country' => 'Bahrain'),
                     array('code' => '965', 'country' => 'Kuwait'),
                     array('code' => '060', 'country' => 'Malaysia'),
                     array('code' => '968', 'country' => 'Oman'),
                     array('code' => '974', 'country' => 'Qatar'),
                     array('code' => '966', 'country' => 'Saudi Arabia'),
                     array('code' => '065', 'country' => 'Singapore'),
                     array('code' => '027', 'country' => 'South Africa'),
                     array('code' => '027', 'country' => 'United Arab Emirates'),
                     array('code' => '044', 'country' => 'United Kingdom'),
                     array('code' => '001', 'country' => 'United States of America'),
                     array('code' => '355', 'country' => 'Albania'),
                     array('code' => '213', 'country' => 'Algeria'),
                     array('code' => '244', 'country' => 'Angola'),
                     array('code' => '672', 'country' => 'Antarctica'),
                     array('code' => '054', 'country' => 'Argentina'),
                     array('code' => '297', 'country' => 'Aruba'),
                     array('code' => '043', 'country' => 'Austria'),
                     array('code' => '061', 'country' => 'Australia'),
                     array('code' => '880', 'country' => 'Bangladesh'),
                     array('code' => '375', 'country' => 'Belarus'),
                     array('code' => '032', 'country' => 'Belgium'),
                     array('code' => '267', 'country' => 'Botswana'),
                     array('code' => '673', 'country' => 'Brunei Darussalam'),
                     array('code' => '855', 'country' => 'Cambodia'),
                     array('code' => '237', 'country' => 'Cameroon'),
                     array('code' => '236', 'country' => 'Central African Republic'),
                     array('code' => '086', 'country' => 'China'),
                     array('code' => '057', 'country' => 'Colombia'),
                     array('code' => '269', 'country' => 'Comoros'),
                     array('code' => '506', 'country' => 'Costa Rica'),
                     array('code' => '045', 'country' => 'Denmark'),
                     array('code' => '593', 'country' => 'Ecuador'),
                     array('code' => '020', 'country' => 'Egypt'),
                     array('code' => '240', 'country' => 'Equatorial Guinea'),
                     array('code' => '372', 'country' => 'Estonia'),
                     array('code' => '251', 'country' => 'Ethiopia'),
                     array('code' => '033', 'country' => 'France'),
                     array('code' => '049', 'country' => 'Germany'),
                     array('code' => '233', 'country' => 'Ghana'),
                     array('code' => '299', 'country' => 'Greenland'),
                     array('code' => '852', 'country' => 'Hong Kong(SAR)'),
                     array('code' => '062', 'country' => 'Indonesia'),
                     array('code' => '964', 'country' => 'Iraq'),
                     array('code' => '353', 'country' => 'Ireland'),
                     array('code' => '972', 'country' => 'Israel'),
                     array('code' => '039', 'country' => 'Italy'),
                     array('code' => '081', 'country' => 'Japan'),
                     array('code' => '962', 'country' => 'Jordan'),
                     array('code' => '254', 'country' => 'Kenya'),
                     array('code' => '371', 'country' => 'Latvia'),
                     array('code' => '231', 'country' => 'Liberia'),
                     array('code' => '261', 'country' => 'Madagascar'),
                     array('code' => '265', 'country' => 'Malawi'),
                     array('code' => '960', 'country' => 'Maldives'),
                     array('code' => '223', 'country' => 'Mali'),
                     array('code' => '356', 'country' => 'Malta'),
                     array('code' => '230', 'country' => 'Mauritius'),
                     array('code' => '052', 'country' => 'Mexico'),
                     array('code' => '258', 'country' => 'Mozambique'),
                     array('code' => '095', 'country' => 'Myanmar'),
                     array('code' => '977', 'country' => 'Nepal'),
                     array('code' => '031', 'country' => 'Netherlands'),
                     array('code' => '064', 'country' => 'New Zealand'),
                     array('code' => '234', 'country' => 'Nigeria'),
                     array('code' => '047', 'country' => 'Norway'),
                     array('code' => '092', 'country' => 'Pakistan'),
                     array('code' => '675', 'country' => 'Papua New Guinea'),
                     array('code' => '051', 'country' => 'Peru'),
                     array('code' => '063', 'country' => 'Philippines'),
                     array('code' => '048', 'country' => 'Poland'),
                     array('code' => '351', 'country' => 'Portugal'),
                     array('code' => '040', 'country' => 'Romania'),
                     array('code' => '250', 'country' => 'Rwanda'),
                     array('code' => '248', 'country' => 'Seychelles'),
                     array('code' => '232', 'country' => 'Sierra Leone'),
                     array('code' => '252', 'country' => 'Somalia'),
                     array('code' => '094', 'country' => 'Sri Lanka'),
                     array('code' => '249', 'country' => 'Sudan'),
                     array('code' => '268', 'country' => 'Swaziland'),
                     array('code' => '046', 'country' => 'Sweden'),
                     array('code' => '041', 'country' => 'Switzerland'),
                     array('code' => '886', 'country' => 'Taiwan'),
                     array('code' => '255', 'country' => 'Tanzania'),
                     array('code' => '066', 'country' => 'Thailand'),
                     array('code' => '220', 'country' => 'The Gambia'),
                     array('code' => '090', 'country' => 'Turkey'),
                     array('code' => '256', 'country' => 'Uganda'),
                     array('code' => '380', 'country' => 'Ukraine'),
                     array('code' => '998', 'country' => 'Uzbekistan'),
                     array('code' => '084', 'country' => 'Vietnam'),
                     array('code' => '260', 'country' => 'Zambia'),
                     array('code' => '263', 'country' => 'Zimbabwe')
              );

              $cities = array('Agra','Ahmedabad','Allahabad','Amritsar','Bareilly','Bengaluru','Bhopal','Bhubaneswar','Chandigarh','Chennai','Chhindwara','Cochin','Coimbatore','Dehradun','Gurgaon','Guwahati','Hyderabad','Indore','Jaipur','Jalandhar','Jalgaon','Jodhpur','Kanpur','Kolkata','Lucknow','Ludhiana','Mathura','Mumbai','Nagpur','New Delhi','Noida','Patna','Proddatur','Pune','Rajkot','Saharanpur','Siliguri','Surat','Trivandrum','Udaipur','Vadodara');

              $interests = array('Deposits','Mortgage','NRI Banking Services','NRE and NRO Savings Account','Wealth Management Services','Remittance Services');


       ?>
       <div class="uk-padding-small uk-padding-remove-horizontal uk-flex uk-flex-between uk-flex-middle">
              <h1 class="uk-h3 uk-margin-remove">Edit #<?=$p->unique_id?></h1>
              <a href="<?=$pages->get("id=25925")->url?>nri/view/<?=$id?>?view=iframe" class="uk-button uk-button-default uk-border-rounded"><span uk-icon="icon:close;ratio:0.9"></span> Close</a>
       </div>
       <?php
       if ($input->post->id) {
              //$ep = $pages->get("id={$input->post->id}");
              //find country
              $key = array_search($_POST['country'], array_column($countries, 'code'));
              
              $ep = $pages->get("id={$id}");
              $ep->of(false);
              $ep->fname = $_POST['fname'];
              $ep->country = $countries[$key]['country'];
              $ep->city = $_POST['city'];
              $ep->email = $_POST['email'];
              $ep->mobile = $_POST['mobile_ext']."-".$_POST['mobile'];
              $ep->alternate_contact = $_POST['mobile_ext']."-".$_POST['alternate_contact'];
              $ep->account_number = $_POST['acc_number'];
              $ep->nri_product = $_POST['product_interested'];
              $ep->save();

              echo "<div class='uk-alert uk-alert-success uk-text-center'>Entry saved successfully.</div>";
       }
       ?>
       <form action="./?id=<?=$id?>&view=iframe" method="post" class="uk-grid uk-grid-small uk-child-width-1-4">
              <div class="uk-margin-small-bottom">
                     <input type="text" tabindex="1" class="uk-input" name="fname" placeholder="Customer name" value="<?=$p->fname?>" />
              </div>
              <div class="uk-margin-small-bottom">
                     <select class="uk-select country_select" name="country" tabindex="2">
                            <option>Select Country of residence</option>
                            <?php foreach ($countries as $c): 
                                   if ($p->country == $c['country']) {
                                          $selected = 'selected';
                                   }else{
                                          $selected = '';
                                   }
                            ?>
                                   <option value="<?=$c['code']?>" <?=$selected?>><?=$c['country']?></option>
                            <?php endforeach ?>
                     </select>
              </div>
              <div class="uk-margin-small-bottom">
                     <select name="city" class="uk-select" tabindex="3">
                            <option>Select city of preference</option>
                            <?php foreach ($cities as $ct): 
                                   if ($p->city == $ct) {
                                          $selected = 'selected';
                                   }else{
                                          $selected = '';
                                   }
                            ?>
                                   <option value="<?=$ct?>" <?=$selected?>><?=$ct?></option>
                            <?php endforeach ?>
                     </select>
              </div>
              <div class="uk-margin-small-bottom">
                     <select name="product_interested" class="uk-select" tabindex="4">
                            <option>Select Product interested in</option>
                            <?php foreach ($interests as $int): 
                                   if ($p->nri_product == $int) {
                                          $selected = 'selected';
                                   }else{
                                          $selected = '';
                                   }
                            ?>
                                   <option value="<?=$int?>" <?=$selected?>><?=$int?></option>
                            <?php endforeach ?>
                     </select>
              </div>
              <div class="uk-margin-small-bottom uk-flex uk-flex-left">
                     <input type="text" name="mobile_ext" placeholder="44" class="uk-input onlydigit country_ext" style="width: 30%" />
                     <input type="tel" tabindex="5" class="uk-input" name="mobile" placeholder="Mobile number" value="<?=ltrim(ltrim($p->mobile,strstr($p->mobile,"-",true)),"-");?>" style="width: 70%"/>
              </div>
              <div class="uk-margin-small-bottom uk-flex uk-flex-left">
                     <input type="text" name="mobile_ext" placeholder="44" class="uk-input onlydigit country_ext" style="width: 30%" />
                     <input type="tel" tabindex="6" class="uk-input" name="alternate_contact" placeholder="Alternate Contact number" value="<?=ltrim(ltrim($p->alternate_contact,strstr($p->alternate_contact,"-",true)),"-");?>" style="width: 70%"/>
              </div>
              <div class="uk-margin-small-bottom">
                     <input type="text" tabindex="7" class="uk-input" name="email" placeholder="Email address" value="<?=$p->email?>"/>
              </div>
              <div class="uk-margin-small-bottom">
                     <input type="text" name="acc_number" placeholder="Account Number" class="uk-input" value="<?=$p->account_number?>" tabindex="8"/>
              </div>
              <input type="hidden" name="id" value="<?=$id?>">
              <div class="uk-width-1-1 uk-text-center">
                     <hr class="uk-hr" />
                     <button type="submit" name="save_nri_edit" class="uk-button uk-button-primary">Save</button>
              </div>
       </form>
</div><!-- uk-container -->
<?php include 'partials/_sales_footer.php'; ?>