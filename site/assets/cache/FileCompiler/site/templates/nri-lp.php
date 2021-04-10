<?php namespace ProcessWire;
include 'partials/header-nri.php' ?>
<div id="main-page">
<div class="top"><img src="<?=$tpl?>nri_partials/images/top-line.jpg" width="1680" height="10" alt=""/></div>
<div class="top"></div>
<header> 
   <div><a href="<?=$pages->get("id=28258")->url?>"><img src="<?=$tpl?>partials/images/logo.png" style="width: 130px; height: auto" /></a></div>
   <div> You are applying for <span>Standard Chartered NRI Banking </span>
   </div>
</header>

<div class="banner-holder">
   <div class="heading">
      <?php
         $h1 = $page->carousel->first()->title;
         $h2 = $page->carousel->first()->headline;
      ?>
      <h1><?=$h1?></h1>
      <h2><?=$h2?></h2>
   </div>
   <div class="form-holder">
      <div class="f-heading"><span>Apply for NRI Banking</span></div>
      <div class="form-inner">
         <form id="msform" method="post">
            <!-- progressbar -->
            <ul id="progressbar">
               <li class="active">Personal Details</li>
               <li>Select Product</li>
               <li>Verification</li>
            </ul>
            <!-- fieldsets -->
            <fieldset class="form-item form-item-1 active">
               <div class="f-inn f-inn-radiobut">
                  <h1 class="rad_ques">Are you an existing<br/>Standard Chartered Bank India client?</h1>
                  <div class="highlight-box">
                     <label class="container">Yes 
                     <input type="radio" value="1" name="choice_1" value="form-item-2" class="radio_choice" id="nri_choice" data-current="form-item-1" data-target="form-item-2"  />
                     <span class="checkmark"></span> <!-- data-target="form-item-2" 2a --> 
                     </label>
                     <label class="container">No
                     <input type="radio" value="0" name="choice_1" value="form-item-2a" class="radio_choice" id="nri_choice" data-current="form-item-1"  data-target="form-item-2a" />
                     <span class="checkmark"></span> </label>
                  </div>
               </div>
               <input id="radio_choice_next" data-target="" data-current="form-item-1" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;" />
               <div class="form-progress" style="width: 0%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-2">
               <div class="f-inn">
                  <lable class="form-lbl">Standard Chartered Bank India account number</lable>
                  <input id="acc_number" type="text" name="acc_number" placeholder="Account Number" data-current="form-item-2" />
               </div> <!-- data-target="form-item-2a"  -->
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="acc_number_next" data-target="form-item-2a" data-current="form-item-2" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;" /> 

               <div class="form-progress" style="width: 25%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-2a">
            <div class="f-inn">
               <lable class="form-lbl">Enter your full name *</lable>
               <input id="fname" type="text" name="fname" placeholder="Full Name"  data-current="form-item-2a" class="alpha-only" /> </div> <!-- data-target="form-item-3" -->
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="fname_next" data-target="form-item-3" data-current="form-item-2a" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;" />
               <div class="form-progress" style="width: 25%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-3">
               <div class="f-inn">
                  <lable class="form-lbl">Product interested in *</lable>
                  <select name="product_interested" id="product_interested">
                     <option>Select Product</option> <!-- data-target="form-item-4" -->
                     <option  data-current="form-item-3">Deposits</option>
                     <option  data-current="form-item-3">Mortgage</option>
                     <option  data-current="form-item-3">NRI Banking Services</option>
                     <option  data-current="form-item-3">NRE and NRO Savings Account</option>
                     <option  data-current="form-item-3">Wealth Management Services</option>
                     <option  data-current="form-item-3">Remittance Services</option>
                  </select>
               </div>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="product_interested_next" data-target="form-item-4" data-current="form-item-3" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;" />
               <div class="form-progress" style="width: 45%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-4">
               <div class="f-inn">
              <lable class="form-lbl">Country of residence *</lable>
                  <select name="country" class="country_select" id="country_select">
                     <option>Select Country</option> <!-- data-target="form-item-5" -->
                     <option  data-current="form-item-4" data-code="973">Bahrain</option>
                     <option  data-current="form-item-4" data-code="965">Kuwait</option>
                     <option  data-current="form-item-4" data-code="60">Malaysia</option>
                     <option  data-current="form-item-4" data-code="968">Oman</option>
                     <option  data-current="form-item-4" data-code="974">Qatar</option>
                     <option  data-current="form-item-4" data-code="966">Saudi Arabia</option>
                     <option  data-current="form-item-4" data-code="65">Singapore</option>
                     <option  data-current="form-item-4" data-code="27">South Africa</option>
                     <option  data-current="form-item-4" data-code="27">United Arab Emirates</option>
                     <option  data-current="form-item-4" data-code="44">United Kingdom</option>
                     <option  data-current="form-item-4" data-code="1">United States of America</option>
                     <!-- <optgroup label="--------------"> -->
                     <option  data-current="form-item-4" data-code="355" data-code="">Albania</option>
                     <option  data-current="form-item-4" data-code="213">Algeria</option>
                     <!-- <option  data-current="form-item-4" data-code="">Andorra</option> -->
                     <option  data-current="form-item-4" data-code="244">Angola</option>
                     <option  data-current="form-item-4" data-code="672">Antarctica</option>
                     <option  data-current="form-item-4" data-code="54">Argentina</option>
                     <!-- <option  data-current="form-item-4" data-code="">Armenia</option> -->
                     <option  data-current="form-item-4" data-code="297">Aruba</option>
                     <option  data-current="form-item-4" data-code="43">Austria</option>
                     <option  data-current="form-item-4" data-code="61">Australia</option>
                     <option  data-current="form-item-4" data-code="91">All countries</option>
                     <option  data-current="form-item-4" data-code="880">Bangladesh</option>
                     <option  data-current="form-item-4" data-code="375">Belarus</option>
                     <option  data-current="form-item-4" data-code="32">Belgium</option>
                     <!-- <option data-target="form-item-5" data-current="form-item-4" data-code="">Belize</option> -->
                     <!-- <option data-target="form-item-5" data-current="form-item-4" data-code="">Benin</option> -->
                     <!-- <option data-target="form-item-5" data-current="form-item-4" data-code="">Bhutan</option> -->
                     <!-- <option data-target="form-item-5" data-current="form-item-4" data-code="">Bosnia and Herzegovina</option> -->
                     <option  data-current="form-item-4" data-code="267">Botswana</option>
                     <!-- <option  data-current="form-item-4" data-code="">Brazil</option> -->
                     <option  data-current="form-item-4" data-code="673">Brunei Darussalam</option>
                     <!-- <option  data-current="form-item-4" data-code="">Bulgaria</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Burkina Faso</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Burundi</option> -->
                     <option  data-current="form-item-4" data-code="855">Cambodia</option>
                     <option  data-current="form-item-4" data-code="237">Cameroon</option>
                     <!-- <option  data-current="form-item-4" data-code="">Cape Verde</option> -->
                     <option  data-current="form-item-4" data-code="236">Central African Republic</option>
                     <!-- <option  data-current="form-item-4" data-code="">Chad</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Chile</option> -->
                     <option  data-current="form-item-4" data-code="86">China</option>
                     <!-- <option  data-current="form-item-4" data-code="">Christmas Island</option> -->
                     <option  data-current="form-item-4" data-code="57">Colombia</option>
                     <option  data-current="form-item-4" data-code="269">Comoros</option>
                     <!-- <option  data-current="form-item-4" data-code="">Cook Islands</option> -->
                     <option  data-current="form-item-4" data-code="506">Costa Rica</option>
                     <!-- <option  data-current="form-item-4" data-code="">Croatia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Cuba</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Cyprus</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Czech Republic</option> -->
                     <option  data-current="form-item-4" data-code="45">Denmark</option>
                     <!-- <option  data-current="form-item-4" data-code="">Djibouti</option> -->
                     <option  data-current="form-item-4" data-code="593">Ecuador</option>
                     <option  data-current="form-item-4" data-code="20">Egypt</option>
                     <!-- <option  data-current="form-item-4" data-code="">El Salvador</option> -->
                     <option  data-current="form-item-4" data-code="240">Equatorial Guinea</option>
                     <!-- <option  data-current="form-item-4" data-code="">Eritrea</option> -->
                     <option  data-current="form-item-4" data-code="372">Estonia</option>
                     <option  data-current="form-item-4" data-code="251">Ethiopia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Falkland Islands(Islas Malvina</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Faroe Islands</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Fiji</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Finland</option> -->
                     <option  data-current="form-item-4" data-code="33">France</option>
                     <!-- <option  data-current="form-item-4" data-code="">French Polynesia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Gabon</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Georgia</option> -->
                     <option  data-current="form-item-4" data-code="49">Germany</option>
                     <option  data-current="form-item-4" data-code="233">Ghana</option>
                     <!-- <option  data-current="form-item-4" data-code="">Gibraltar</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Greece</option> -->
                     <option  data-current="form-item-4" data-code="299">Greenland</option>
                     <!-- <option  data-current="form-item-4" data-code="">Guatemala</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Guinea</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Guinea-Bissau</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Guyana</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Haiti</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Honduras</option> -->
                     <option  data-current="form-item-4" data-code="852">Hong Kong(SAR)</option>
                     <!-- <option  data-current="form-item-4" data-code="">Hungary</option> -->
                     <option  data-current="form-item-4" data-code="62">Indonesia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Iran</option> -->
                     <option  data-current="form-item-4" data-code="964">Iraq</option>
                     <option  data-current="form-item-4" data-code="353">Ireland</option>
                     <option  data-current="form-item-4" data-code="972">Israel</option>
                     <option  data-current="form-item-4" data-code="39">Italy</option>
                     <option  data-current="form-item-4" data-code="81">Japan</option>
                     <option  data-current="form-item-4" data-code="962">Jordan</option>
                     <!-- <option  data-current="form-item-4" data-code="">Kazakhstan</option> -->
                     <option  data-current="form-item-4" data-code="254">Kenya</option>
                     <!-- <option  data-current="form-item-4" data-code="">Kiribati</option> -->
                     <option  data-current="form-item-4" data-code="371">Latvia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Lebanon</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Lesotho</option> -->
                     <option  data-current="form-item-4" data-code="231">Liberia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Libya</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Liechtenstein</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Lithuania</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Luxembourg</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Macao</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Macedonia, The Former Yugoslav</option> -->
                     <option  data-current="form-item-4" data-code="261">Madagascar</option>
                     <option  data-current="form-item-4" data-code="265">Malawi</option>
                     <option  data-current="form-item-4" data-code="960">Maldives</option>
                     <option  data-current="form-item-4" data-code="223">Mali</option>
                     <option  data-current="form-item-4" data-code="356">Malta</option>
                     <!-- <option  data-current="form-item-4" data-code="">Marshall Islands</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Mauritania</option> -->
                     <option  data-current="form-item-4" data-code="230">Mauritius</option>
                     <!-- <option  data-current="form-item-4" data-code="">Mayotte</option> -->
                     <option  data-current="form-item-4" data-code="52">Mexico</option>
                     <!-- <option  data-current="form-item-4" data-code="">Micronesia, Federated States o</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Moldova</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Monaco</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Mongolia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Montenegro</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Morocco</option> -->
                     <option  data-current="form-item-4" data-code="258">Mozambique</option>
                     <option  data-current="form-item-4" data-code="95">Myanmar</option>
                     <!-- <option  data-current="form-item-4" data-code="">Namibia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Nauru</option> -->
                     <option  data-current="form-item-4" data-code="977">Nepal</option>
                     <option  data-current="form-item-4" data-code="31">Netherlands</option>
                     <!-- <option  data-current="form-item-4" data-code="">New Caledonia</option> -->
                     <option  data-current="form-item-4" data-code="64">New Zealand</option>
                     <!-- <option  data-current="form-item-4" data-code="">Nicaragua</option> -->
                     <!-- <option  data-current="form-item-4" data-code="234">Niger</option> -->
                     <option  data-current="form-item-4" data-code="234">Nigeria</option>
                     <!-- <option  data-current="form-item-4" data-code="">Niue</option> -->
                     <option  data-current="form-item-4" data-code="47">Norway</option>
                     <option  data-current="form-item-4" data-code="92">Pakistan</option>
                     <!-- <option  data-current="form-item-4" data-code="">Palau</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Panama</option> -->
                     <option  data-current="form-item-4" data-code="675">Papua New Guinea</option>
                     <!-- <option  data-current="form-item-4" data-code="">Paraguay</option> -->
                     <option  data-current="form-item-4" data-code="51">Peru</option>
                     <option  data-current="form-item-4" data-code="63">Philippines</option>
                     <!-- <option  data-current="form-item-4" data-code="">Pitcairn Islands</option> -->
                     <option  data-current="form-item-4" data-code="48">Poland</option>
                     <option  data-current="form-item-4" data-code="351">Portugal</option>
                     <!-- <option  data-current="form-item-4" data-code="">Puerto Rico</option> -->
                     <option  data-current="form-item-4" data-code="40">Romania</option>
                     <!-- <option  data-current="form-item-4" data-code="">Russia</option> -->
                     <option  data-current="form-item-4" data-code="250">Rwanda</option>
                     <!-- <option  data-current="form-item-4" data-code="">Saint Helena</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Saint Pierre and Miquelon</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Samoa</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">San Marino</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Senegal</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Serbia</option> -->
                     <option  data-current="form-item-4" data-code="248">Seychelles</option>
                     <option  data-current="form-item-4" data-code="232">Sierra Leone</option>
                     <!-- <option  data-current="form-item-4" data-code="">Slovakia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Slovenia</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Solomon Islands</option> -->
                     <option  data-current="form-item-4" data-code="252">Somalia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Spain</option> -->
                     <option  data-current="form-item-4" data-code="94">Sri Lanka</option>
                     <option  data-current="form-item-4" data-code="249">Sudan</option>
                     <!-- <option  data-current="form-item-4" data-code="">Suriname</option> -->
                     <option  data-current="form-item-4" data-code="268">Swaziland</option>
                     <option  data-current="form-item-4" data-code="46">Sweden</option>
                     <option  data-current="form-item-4" data-code="41">Switzerland</option>
                     <option  data-current="form-item-4" data-code="886">Taiwan</option>
                     <!-- <option  data-current="form-item-4" data-code="">Tajikistan</option> -->
                     <option  data-current="form-item-4" data-code="255">Tanzania</option>
                     <option  data-current="form-item-4" data-code="66">Thailand</option>
                     <option  data-current="form-item-4" data-code="220">The Gambia</option>
                     <!-- <option  data-current="form-item-4" data-code="">Togo</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Tokelau</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Tonga</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Tunisia</option> -->
                     <option  data-current="form-item-4" data-code="90">Turkey</option>
                     <!-- <option  data-current="form-item-4" data-code="">Turkmenistan</option> -->
                     <!-- <option  data-current="form-item-4" data-code="">Tuvalu</option> -->
                     <option  data-current="form-item-4" data-code="256">Uganda</option>
                     <option  data-current="form-item-4" data-code="380">Ukraine</option>
                     <!-- <option  data-current="form-item-4" data-code="">Uruguay</option> -->
                     <option  data-current="form-item-4" data-code="998">Uzbekistan</option>
                     <option  data-current="form-item-4" data-code="84">Vietnam</option>
                     <!-- <option  data-current="form-item-4" data-code="">Yemen</option> -->
                     <option  data-current="form-item-4" data-code="260">Zambia</option>
                     <option  data-current="form-item-4" data-code="263">Zimbabwe</option>
                     <!-- </optgroup>   -->
                  </select>
               </div>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="country_select_next" data-target="form-item-5" data-current="form-item-4" data-code="" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;"/> 
               <div class="form-progress" style="width: 60%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-5">
               <div class="f-inn">
              <lable class="form-lbl">Preferred city for opening account *</lable>
                  <select name="city" id="city_select" data-tooltip="This is the branch in India where the account will be setup. If you cannot find your city, please choose the nearest branch city.">
                     <option>Select City</option> <!-- data-target="form-item-6" -->
                     <option  data-current="form-item-5" >Agra</option>
                     <option  data-current="form-item-5" >Ahmedabad</option>
                     <option  data-current="form-item-5">Allahabad</option>
                     <option  data-current="form-item-5">Amritsar</option>
                     <option  data-current="form-item-5">Bareilly</option>
                     <option  data-current="form-item-5">Bengaluru</option>
                     <option  data-current="form-item-5">Bhopal</option>
                     <option  data-current="form-item-5">Bhubaneswar</option>
                     <option  data-current="form-item-5" >Chandigarh</option>
                     <option  data-current="form-item-5">Chennai</option>
                     <option  data-current="form-item-5">Chhindwara</option>
                     <option  data-current="form-item-5">Cochin</option>
                     <option  data-current="form-item-5">Coimbatore</option>
                     <option  data-current="form-item-5">Dehradun</option>
                     <option  data-current="form-item-5" >Gurgaon</option>
                     <option  data-current="form-item-5">Guwahati</option>
                     <option  data-current="form-item-5">Hyderabad</option>
                     <option  data-current="form-item-5">Indore</option>
                     <option  data-current="form-item-5">Jaipur</option>
                     <option  data-current="form-item-5" >Jalandhar</option>
                     <option  data-current="form-item-5">Jalgaon</option>
                     <option  data-current="form-item-5">Jodhpur</option>
                     <option  data-current="form-item-5">Kanpur</option>
                     <option  data-current="form-item-5">Kolkata</option>
                     <option  data-current="form-item-5" >Lucknow</option>
                     <option  data-current="form-item-5" >Ludhiana</option>
                     <option  data-current="form-item-5">Mathura</option>
                     <option  data-current="form-item-5">Mumbai</option>
                     <option  data-current="form-item-5">Nagpur</option>
                     <option  data-current="form-item-5">New Delhi</option>
                     <option  data-current="form-item-5">Noida</option>
                     <option  data-current="form-item-5">Patna</option>
                     <option  data-current="form-item-5">Proddatur</option>
                     <option  data-current="form-item-5">Pune</option>
                     <option  data-current="form-item-5">Rajkot</option>
                     <!-- <option  data-current="form-item-5">Saharanpur</option> -->
                     <option  data-current="form-item-5">Siliguri</option>
                     <option  data-current="form-item-5">Surat</option>
                     <option  data-current="form-item-5">Trivandrum</option>
                     <option  data-current="form-item-5">Udaipur</option>
                     <option  data-current="form-item-5">Vadodara</option>
                  </select>
               </div>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="city_select_next" data-target="form-item-6" data-current="form-item-5" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;" />  
               <div class="form-progress" style="width: 70%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-6">
               <lable class="form-lbl">Enter your mobile number *</lable>
               <div class="mobile"> <input type="text" name="mobile_ext" placeholder="44" class="onlydigit country_ext" />    <input class="onlydigit" maxlength="15" type="text" id="mobile_input" name="mobile_number" placeholder="Mobile Number"   data-current="form-item-6"/><!--    data-target="form-item-7"    data-target="form-item-7" data-current="form-item-6" -->
               </div>
               <span class="error mblErr" style="display: none;">Please provide valid mobile number.</span>
               <lable class="form-lbl">Alternative contact number (optional)</lable>
               <div class="alt">
                  <input class="onlydigit country_ext" type="text" name="mobile_ext_alt"  placeholder="44" />
                  <input type="text" class="onlydigit" name="code" placeholder="Area Code" maxlength="3" minlength="3" />
                  <input type="text" class="onlydigit" name="mobile_number_alt" placeholder="Alt Contact Number"  maxlength="10"  />
               </div>
               <span class="error altmblErr" style="display: none;">Please provide valid mobile number.</span>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="mobile_input_next" data-target="form-item-7" data-current="form-item-6" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;"/> 
               <div class="form-progress" style="width: 80%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-7">
               <div class="f-inn">
                  <lable class="form-lbl">Enter your email ID *</lable>
                  <input type="text" name="email" placeholder="Email" data-target="form-item-8" data-current="form-item-7" id="nri_email" /> 
                  <span class="error emailErr" style="display: none;">Please provide valid email address.</span>
               </div>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <input id="nri_email_next" data-target="form-item-8" data-current="form-item-7" type="button" name="next" class="next-btn action-button" value="Next" style="display: none;"/>
               <div class="form-progress" style="width: 90%;"></div>
            </fieldset>

            <fieldset class="form-item form-item-8" id="verify_fieldset">
               <h1>Verify yourself</h1>
               <!-- <h2>copy text into input box</h2> -->
               <div class="vef"><input type="text" name="verification_text1" class="verification_text1" placeholder="" />    <input type="text" name="verification_text2" class="verification_text2" id="verification_text2" disabled />  <input type="button" class="refresh_id" /></div>
               <p><input type="checkbox" checked>I authorize Standard Chartered Bank to contact me. This will override registry on the NDNC.*</p>
               <p class="btn submit_nri_btn">Submit</p>
               <input type="button" name="back" class="action-button back-btn" value="back" />
               <div class="form-progress" style="width: 100%;"></div>
            </fieldset>

            <fieldset class="thank_fs">
               <div class="thank">
                  <h1>Dear Vijay Kumar,</h1>
                  <h2>Thank you for expressing interest in our product(s)/services.</h2>
                  <p class="btn">Submit</p>
                  <!-- <input type="button" name="next" class="previous action-button" value="Next" /> -->
               </div>
            </fieldset>
            <input type="hidden" name="input_flag" value="5">
            <input type="hidden" name="product" value="3">  
            <input type="hidden" name="utm_campaign" id="utm_campaign" />
            <input type="hidden" name="utm_source" id="utm_source" />
            <input type="hidden" name="utm_medium" id="utm_medium" />
            <input type="hidden" name="utm_adgroup" id="utm_adgroup" />
            <input type="hidden" name="utm_channel" id="utm_channel" />
            <input type="hidden" name="utm_param" id="utm_param" />
         </form>

      </div>
   </div>
</div>
<div class="body-holder body-holder-large">
   <div class="tabs_wrapper">
      <ul class="tabs">
         <?php 
         $i = 1;
         foreach ($page->features as $feature): 
            if ($i == 1) {
               $active = "class='active'";
            }else{
               $active = "";
            }
         ?>
            <li <?=$active?> rel="<?=$feature->id?>"><?=$feature->headline?></li>
         <?php $i++;
         endforeach ?>
      </ul>
      <div class="tab_container">
         <?php 
         $i = 1;
         foreach ($page->features as $feature): 
            if ($i == 1) {
               $active = "d_active";
            }else{
               $active = "";
            }
         ?>
            <h3 class="<?=$active?> tab_drawer_heading" rel="<?=$feature->id?>"><?=$feature->headline?></h3>
            <div id="<?=$feature->id?>" class="tab_content">
               <h1><?=$feature->headline?></h1>
               <?=$feature->desc?>
            </div>
         <?php $i++;
         endforeach ?>
         
      </div>
   </div>
</div>
<footer> © 2020. Standard Chartered Bank. All Rights Reserved.</footer>
</div>
<!-- The Modal -->
<div id="thankyou" class="modal_ty">
   <!-- Modal content -->
   <div class="modal-content_ty">
      <span class="close_ty" id="close_ty">&times;</span>
      <h3>Thank you for your interest in Standard Chartered Bank's NRI Banking Services.</h3>
      <p style="margin-top: 12px;">Our representative will get in touch with you very soon.</p>
   </div>
</div>

<div id="box1" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>NRE Fixed Deposits</h1>
         <ul>
            <li>No interest is payable if NRE Fixed Deposit is withdrawn before completion of 12 months.</li>
            <li>The interest rates are subject to change and are updated on  daily basis.</li>
         </ul>
      </div>
   </div>
</div>
<div id="box3" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>Disclaimers</h1>
         <ul style="font-size: 12px;">
            <li>Online Mutual Funds:<br>
               The Online Mutual Funds platform is an EXECUTION-ONLY platform. If you wish to receive advice from us in relation to transacting in Mutual Funds, you should not use the Online Mutual Funds Platform but should instead contact your banker for further information. We are not acting as your investment advisor nor providing investment recommendations in respect of any transaction effected through the Online Mutual Funds platform, and you must not regard it or us as acting in that capacity. You should consult your own independent legal, tax and investment advisors before entering into any transaction via the Online Mutual Funds platform and only enter into a transaction if you have fully understood its nature, the contractual relationship into which you are entering, all relevant terms and conditions and the nature and extent of your exposure to loss.
            </li>
            <li>Investment services:<br>
               Standard Chartered Bank does not provide any investment advisory services under the Wealth Proposition. Standard Chartered Bank in its capacity of a distributor of mutual funds or while referring any other third party financial products may offer advice which is incidental to its activity of distribution/referral. Standard Chartered Bank will not be charging any fee/consideration for such advice and such advice should not be construed as ‘Investment Advice’ as defined in the Securities and Exchange Board of India (Investment Advisers) Regulations, 2013 or otherwise. Mutual Fund Investments are subject to market risk. Read scheme related documents carefully prior to investing.
            </li>
         </ul>
      </div>
   </div>
</div>
<div id="box4" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>FAQs</h1>
         <ul>
            <li>
               <h1>How does SuperValue Saving work?</h1>
               <p>SuperValue Saving Account comes with a globally valid debit/ATM card that allows customers to access all Standard Chartered Bank ATMs and provides instant cash at all VISA Network ATMs in India and abroad. </p>
               <ul>
                  <li>SuperValue Saving customers get free cash withdrawal facility at any VISA Network ATM in India (Charges are levied for more than 5 non-Standard Chartered ATM transactions per month if the average quarterly balance of Rs. 25,000 is not maintained.)</li>
                  <li>The debit card can be used to make purchases at over 326,000 merchant outlets in India.</li>
               </ul>
            </li>
            <li>
               <h1>Which ATMs can SuperValue Saving customers use for free?</h1>
               <p>SuperValue Savings Account customers can withdraw cash at any VISA Network ATM in India free of any charge. (Charges are levied for more than 5 non-Standard Chartered ATM transactions per month if the average quarterly balance of Rs. 25,000 is not maintained.). This includes ATMs with the following banks in addition to Standard Chartered ATMs:</p>
               <ul>
                  <li>ICICI Bank, HDFC Bank, HSBC, Citibank, IDBI Bank, Axis Bank, Centurion Bank, Bank of Punjab, Corporation bank, IndusInd Bank, Kotak Mahindra Bank, Canara Bank, Dena Bank, Andhra Bank, State Bank of India, Development Credit Bank, Bank of India, Bank of Baroda, Syndicate Bank</li>
               </ul>
            </li>
            <li>
               <h1>What is a debit card?</h1>
               <p>The globally-valid Standard Chartered Debit Card is the easiest way of accessing your bank account. A debit card allows you to purchase goods at VISA Electron merchant establishments and withdraw funds from your bank account from any VISA Electron ATM in India and abroad. </p>
            </li>
            <li>
               <h1>What is the difference between a debit card and a credit card?</h1>
               <p>The basic difference between a debit card and a credit card is that the debit card gives you access to your own money whereas a credit card is a form of loan that accesses a line of credit offered by your bank. Put in simple terms, a debit card is a buy-now-pay-now option while a credit card is a buy-now-pay-later option. Therefore, no interest is charged and you have no monthly repayments with a debit card.
               </p>
            </li>
            <li>
               <h1>What is the advantage of a debit card?
               </h1>
               <p>Our debit card offers tremendous convenience in payments and helps reduce the amount of cash you need to carry. You always stay in control of your finances because you can only spend what you have when you access your own funds to make purchases and to withdraw cash.
               </p>
            </li>
         </ul>
      </div>
   </div>
</div>
<div id="box5" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>Mortgages</h1>
         <ul>
            <li>Rates are subject to revision from time to time</li>
         </ul>
      </div>
   </div>
</div>
<div id="box7" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>FCNR with Forward Cover</h1>
         <ul>
            <li>Rates and Yields offered are provisional and subject to change at any time without prior notice. Please contact your Branch or Relationship manger to confirm the yield before actual placement of funds.</li>
            <li>The forward contract deal locks in the Rupee Return on the deposit. Future movements in currency markets cannot affect returns once the forward contract deal has been booked.</li>
            <li>The booking of the forward contract, protects the depositor from unfavorable movements in the exchange rate.</li>
            <li>On the other hand it must also be noted that , once the forward contract is booked, the depositor cannot take advantage of any favorable movements in the currency markets either.</li>
         </ul>
      </div>
   </div>
</div>
<div id="box8" class="modal">
   <div class="content-scroll">
      <div class="li-box">
         <h1>Global Recognition for your family & Global Link</h1>
         <p>Global recognition available in mentioned geographies:</p>
         <ul>
            <li>China, Hong Kong, India, Korea, Malaysia, Singapore, Taiwan, Bangladesh, Brunei, Indonesia, Nepal, Japan, Philippines, Sri Lanka. Thailand, Vietnam</li>
            <li>Bahrain, Jordon, Lebanon, Pakistan, Oman, Qatar, UAE</li>
            <li>Botswana, Ghana, Kenya, Nigeria, Tanzania, Uganda, Zambia, Zimbabwe</li>
            <li>Global Link: Country regulations for all online transactions and term and conditions of the account and remittance shall apply</li>
         </ul>
      </div>
   </div>
</div>
<?php include 'partials/footer-nri.php' ?>
<script type="text/javascript">
   /*$(document).ready(function(){
      $("#nri_choice").change(function () {
      console.log('You clicked radio!'+$(this).val());
     if ($(this).val() == "1" || $(this).val() ==1) {
        //console.log($('input:radio[name=type]:checked').val());
        $('#radio_choice_next').attr('data-target',"form-item-2");
        $('.form-item-2').show();
    }else{
       $('#radio_choice_next').attr('data-target',"form-item-2a");
       $('.form-item-2a').show();
    }
  });
});*/
</script>