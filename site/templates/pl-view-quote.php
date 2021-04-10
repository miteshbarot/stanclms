<?php include "partials/header_pl.php";?>
<?php 
	if(isset($_GET['u'])){
		$unique_id = $_GET['u'];
		$p = $pages->get("unique_id=$unique_id");
		if($p->id == 0){
			//$session->redirect('/demo/lms/personal-loan/');
			$session->redirect($config->urls->root."personal-loan/");
		}
	}else{
		//$session->redirect('/demo/lms/personal-loan/');
		$session->redirect($config->urls->root."personal-loan/");
	}

	$pincode = $p->pincode;
	$employer_name = $p->employer_name;
	$employment_type = $p->employment_type;
	$employer_industry = $p->employer_industry;
	$monthly_income = intval($p->mothly_income);
	$current_yr_taxable_income = intval($p->current_yr_taxable_income);
	$salary = 0;
	$loan_amount = 0;
	$roi = 13;

	switch ($employment_type) {
		case '1':
			//salaried
			$salary = round($monthly_income / 1000);
			break;

		case '3':
			//self-employed professional
			$salary = round( ($current_yr_taxable_income / 12) / 1000);
			break;
	}

	if ($salary > 11 && $salary < 44) {
		$loan_amount = round($salary * 13);
	}elseif ($salary > 45) {
		$loan_amount = round($salary * 15.6);
	}elseif ($salary <= 10) {
		$loan_amount = 0;
	}

	$loan_amount = $loan_amount / 100;
	// echo $employment_type->title;
	// echo $salary;

	if ($employment_type == "1") {
		//salaried
		if ($loan_amount < 3) {
			$roi = 16;
		}elseif ($loan_amount > 3 && $loan_amount < 5) {
			$roi = 13;
		}elseif ($loan_amount > 5 && $loan_amount < 7.5) {
			$roi = 12.5;
		}elseif ($loan_amount > 7.5 && $loan_amount < 15) {
			$roi = 12;
		}elseif ($loan_amount > 15 && $loan_amount < 20) {
			$roi = 11.5;
		}elseif ($loan_amount > 20 && $loan_amount < 25) {
			$roi = 11.25;
		}elseif ($loan_amount > 25 && $loan_amount <= 50) {
			$roi = 11;
		}else{
			$roi = 13;
		}
	}else{
		//self-employed
		if ($p->applicant_description == "Doctor") {
			//echo "Doctor";
			if ($loan_amount < 10) {
				$roi = 12.5;
			}else{
				$roi = 13;
			}
		}else{
			//echo "Not a Doctor";
			$roi = 16;
		}	
	}


//saving the calculated values
if ($input->post->quote_submit) {
	//print_r($_POST);DIE
	$la = $input->post->loan_amount;
	$e = $input->post->emi;
	$t = $input->post->tenure;
	$i = $input->post->roi;
	$fees = $input->post->pf;
	$fees_savings = $input->post->savings;
	$ta = $input->post->total_amount;
	$uid = $input->post->unique_id;

	//echo $input->post->loan_amount;

	$p = $pages->get("unique_id={$uid}");

	if ($p) {
		$p->of(false);
		$p->loan_amount = $la;
		$p->tenure = $t;
		$p->interest_rate = $i;
		$p->emi_amount = $e;
		$p->pf = $fees;
		$p->savings = $fees_savings;
		$p->total_amount = $ta;
		$p->save();
	}

	$session->redirect($config->urls->root."personal-loan/application/?u={$uid}");
}
?>

<div class="uk-container" ng-app="plApp">
<!-- <h2 class="uk-text-center uk-margin-top uk-margin-bottom ff-helvetica fs-20 uk-text-31"></h2> -->
<div class="uk-text-center mt-40">
	<ul class="timeline">
		<li class="active ff-helvetica fs-18 active1">Eligibility</li>
		<li class="active ff-helvetica fs-18">Offer</li>
		<li class="ff-helvetica fs-18">Application</li>
		<li class="ff-helvetica fs-18">Documents</li>
	</ul>		  
</div>

<form method="post" action="<?=$config->urls->root?>personal-loan/view-quote/?u=<?=$unique_id?>&e=<?=$input->get->e?>" ng-controller="PlController as vm">
<div>
	<?php if(!empty($monthly_income) && $monthly_income < 26000) { ?>
       <h1 class="uk-h3 fs-34 uk-text-center mt-40 uk-primary">You're not eligible for Personal Loan.</h1>
     <?php exit();} else { ?>

      <h1 class="uk-h3 fs-34 uk-text-center mt-40 uk-primary">You're eligible for Personal Loan upto &#8377;&nbsp;<?=$loan_amount?> Lakh.</h1>
  <?php } ?>
		<h2 class="uk-text-center uk-margin-small-bottom ff-helvetica fs-20 uk-text-black uk-margin-small-top">Choose your loan amount and tenure</h2>
		<div class="uk-grid">
			<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-width-1-1 mt-10-mobile">
				<div class="uk-padding  uk-position-relative">
					<div class="uk-position-relative ui-slider-handle-wrapper">
						<div class="ff-helvetica fs-20 uk-text-31 uk-float-right uk-border-secondary uk-border-rounded p-10 uk-text-center">&#8377;&nbsp;<input type="text" ng-model="priceSlider.value" value="" id="custom-handle" class="ui-slider-handle fs-20 onlydigit" ng-change="pmt(priceSlider.value,tenureSlider.value, <?=$roi?>)"/></div>
					</div>
					<div class="fs-16 ff-helvetica uk-primary">Loan amount</div>
					  <!-- <div id="slider"></div> -->
        			  <rzslider rz-slider-model="priceSlider.value" rz-slider-options="priceSlider.options"></rzslider>
					  <div class="ff-helvetica range_details">
					  	<span class="uk-text-muted fs-14">Min: 1 Lakh</span>
					  	<span></span>
					  	<!-- <span class="uk-text-muted fs-14">Eligibility</span> -->
					  	<span class="uk-text-muted fs-14">Max: <?=$loan_amount?> Lakh</span>
					  </div>
				</div>
			</div>
			<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-width-1-1 mt-10-mobile">
				<div class="uk-padding uk-position-relative">
					<div class="uk-position-relative ui-slider-handle-wrapper">
						<div class="ff-helvetica fs-20 uk-text-31 uk-float-right uk-border-secondary uk-border-rounded p-10 uk-text-center"><input type="number" id="custom-handle2" ng-model="tenureSlider.value" value="" min="1" max="5" class="ui-slider-handle fs-20 onlydigit" ng-change="pmt(priceSlider.value,tenureSlider.value, <?=$roi?>)">&nbsp;Year</div>
					</div>
					<div class="fs-16 ff-helvetica uk-primary">Tenure</div>
					  <!-- <div id="slider2"></div> -->
					  <rzslider rz-slider-model="tenureSlider.value" rz-slider-options="tenureSlider.options"></rzslider>
					  <div class="ff-helvetica range_details">
					  	<span class="uk-text-muted fs-14">Min: 1 Year</span>
					  	<span class="uk-text-muted fs-14"></span>
					  	<span class="uk-text-muted fs-14">Max: 5 Years</span>
					  </div>
					</div>
			</div>
		</div>
</div>


<div class="uk-padding">
	<div class="uk-grid uk-grid-match uk-margin-medium-top">
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded br-00 text-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile">Max. eligibility</div>
				<h6 class=" text-00 fs-20 fs-18-mobile ff-helvetica-medium" style="margin: 5px 0">&#8377;&nbsp;<?=$loan_amount?> Lakhs</h6>
				<div class="fs-14">(For {{tenureSlider.value}} years)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded br-00 text-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile">Rate</div>
				<h6 class=" text-00 fs-20 fs-18-mobile ff-helvetica-medium" style="margin: 5px 0">Fixed</h6>
				<div class="fs-14">(Monthly reducing)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded br-00 text-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile">EMI</div>
				<h6 class=" text-00 fs-20 fs-18-mobile ff-helvetica-medium" style="margin: 5px 0">{{emi | INR}}</h6>
				<div class="fs-14">(For {{tenureSlider.value}} years)</div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded br-00 text-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile">Best rate</div>
				<h6 class=" text-00 fs-20 fs-18-mobileff-helvetica-medium" style="margin: 5px 0"><?=$roi?>%</h6>
				<div class="fs-14"></div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded br-00 text-00 uk-padding-small uk-box-shadow-medium">
				<div class="fs-16 fs-15-mobile">Processing fees</div>
				<h6 class=" text-00 fs-20 fs-18-mobile ff-helvetica-medium" style="margin: 5px 0">{{pf | INR}}</h6>
				<div class="fs-14"></div>
			</div>
		</div>
		<div class="uk-width-1-6@xl uk-width-1-6@l uk-width-1-6@m uk-width-1-2@s uk-width-1-2 uk-text-center mt-3-mobile">
			<div class="uk-border-rounded uk-background-secondary uk-border-default uk-padding-small uk-box-shadow-medium uk-text-white">
				<div class="fs-16 fs-15-mobile">Total savings</div>
				<h6 class="fs-20 fs-wht fs-18-mobile ff-helvetica-medium" style="margin: 5px 0">{{savings | INR}}</h6>
			</div>
		</div>
	</div>

	<div class="uk-flex uk-flex-center uk-margin-medium uk-position-relative ">
		<div class="uk-border-secondary uk-background-white uk-text-center uk-border-rounded uk-padding-small total_amt">
			<span class="ff-helvetica fs-16">Total amount</span>&nbsp;&nbsp;&nbsp;<span class="fs-26 uk-text-31">{{total_amount | INR}}</span>
		</div>
		<hr class="uk-hr" style="position: absolute;top: 18px;left: 0;right: 0; z-index: 1" />
	</div>
</div>

<input type="hidden" name="loan_amount" value="{{priceSlider.value}}" />
<input type="hidden" name="emi" value="{{emi}}" />
<input type="hidden" name="tenure" value="{{tenureSlider.value}}" />
<input type="hidden" name="roi" value="<?=$roi?>"/>
<input type="hidden" name="pf" value="{{pf}}"/>
<input type="hidden" name="savings" value="{{savings}}"/>
<input type="hidden" name="unique_id" value="<?=$unique_id?>">
<input type="hidden" name="total_amount" value="{{total_amount}}"/>

<div class="apply-fixed">
<?php if ($input->get->e == 1): ?>
<div class="uk-flex uk-flex-center">
	<input type="submit" name="quote_submit" class="proceed uk-border-pill ff-helvetica-bold fs-22 uk-button uk-button-large apply_btn" value="Continue to apply" />
</div>
<?php else: ?>
<div class="uk-flex uk-flex-center">
	<!-- <a href="<?=$config->urls->root?>personal-loan/application/?u=<?=$unique_id?>" class="proceed uk-border-pill ff-helvetica-bold fs-22 uk-button uk-button-large apply_btn">Apply now</a> -->
	<input type="submit" name="quote_submit" class="proceed uk-border-pill ff-helvetica-bold fs-22 uk-button uk-button-large apply_btn" value="Apply now" />
</div>	
<?php endif ?>	
</div>

</form>

</div>



<?php if ($input->get->e == 1): ?>
	

<!-- <div class="uk-background-white uk-padding uk-bg uk-width-1-1">
	<div class="uk-container">
		<div class="fs-34 uk-primary uk-margin-medium-bottom">You are eligible for below Personal Loan products:</div>
		<div class="uk-child-width-1-3@s uk-flex-center uk-text-center" uk-grid uk-height-match="target: > div > .product; row: false">
			<div>
				<div class="uk-border-secondary uk-border-rounded uk-padding-small  uk-text-center uk-text-bg product"> 
					<div><img src="<?=$tpl?>assets/images/product-1.jpg"></div>

					<div class="uk-padding-small">
						<div class="fs-16 uk-secondary uk-margin-medium-top ff-helvetica-bold ">Last EMI Weaver</div>
						<p class="fs-14 uk-text-31 ff-helvetica uk-margin-small-top">Get Loan amount up to INR 50 lakh at attractive interest rate with discounted processing fee for online applications. Terms and condition apply</p>
					</div>
					<div class="bottom-btn"> 
						<p class="know-more"><a href="#modal-knowMore" uk-toggle="target: #modal-knowMore">know more</a></p>
						<p class="apply"><a href="#modal-knowMore"> Apply</a></p>
					</div>

					<div class="uk-panel">
					    <img src="<?=$tpl?>assets/images/product-1.jpg">
					    <div class="uk-panel-content">
						    <div class="fs-18 uk-text-black ff-helvetica-bold">Last EMI Weaver</div>
							<p class="fs-14 uk-text-31 ff-helvetica uk-margin-remove">Get Loan amount up to INR 50 lakh Get Loan amount up to INR 50 lakh Get Loan amount</p>
						</div>
					</div>
					<div class="bottom-btn">
						<p class="know-more"><a href="#modal-knowMore" uk-toggle>Know more</a></p>
						<p class="apply"><a href="#modal-knowMore" uk-toggle>Apply now</a></p>
					</div>
				</div>
			</div>
			<div>
				<div class="uk-border-secondary uk-border-rounded uk-padding-small uk-text-center uk-text-bg product"> 
					<div><img src="<?=$tpl?>assets/images/product-1.jpg" ></div>
					<div class="uk-padding-small">
						<div class="fs-16 uk-secondary uk-margin-medium-top ff-helvetica-bold ">Flexible Solutions</div>
						<p class="fs-14 uk-text-31 ff-helvetica uk-margin-small-top">Get an instant approval on your Personal Loan application when you apply online</p>
					</div>
					<div class="bottom-btn"> 
					
					<p class="know-more"><a href="#modal-knowMore" uk-toggle="target: #modal-knowMore">know-more</a></p>
						<p class="apply"><a href="#modal-knowMore"> Apply</a></p>
					</div>
					<div class="uk-panel">
					    <img class="uk-align-left uk-margin-small-right" src="<?=$tpl?>assets/images/product-1.jpg" width="150" alt="Example image">
					    <div class="uk-text-left">
						    <div class="fs-16 uk-secondary uk-margin-medium-top ff-helvetica-bold ">Last EMI Weaver</div>
							<p class="fs-14 uk-text-31 ff-helvetica uk-margin-remove">Get Loan amount up to INR 50 lakh Get Loan amount up to INR 50 lakh Get Loan amount</p>
						</div>
					</div>
					<div class="bottom-btn">
						<p class="know-more"><a href="#modal-knowMore" uk-toggle="target: #modal-knowMore">know-more</a></p>
						<p class="apply"><a href="#modal-knowMore"> Apply</a></p>
					</div>
					<div class="uk-panel">
					    <img src="<?=$tpl?>assets/images/product-1.jpg">
					    <div class="uk-panel-content">
						    <div class="fs-18 uk-text-black ff-helvetica-bold">Last EMI Weaver</div>
							<p class="fs-14 uk-text-31 ff-helvetica uk-margin-remove">Get Loan amount up to INR 50 lakh Get Loan amount up to INR 50 lakh Get Loan amount</p>
						</div>
					</div>
					<div class="bottom-btn">
						<p class="know-more"><a href="#modal-knowMore" uk-toggle>Know more</a></p>
						<p class="apply"><a href="#modal-knowMore" uk-toggle> Apply now</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<?php endif ?>

<style>
	html,body{
		padding-bottom: 50px !important
	}
	.apply-fixed{
		position: fixed; 
		bottom: 0;
		left: 0;
		right: 0;
		z-index: 1000; 
		background: #FFF; 
		box-shadow: 0 -4px 10px -1px rgba(0,0,0,0.2);
		padding: 10px 0
	}
	@media screen and (max-width: 800px) {
		.apply_btn{
			font-size: 18px !important;
		    padding: 5px 10px;
		    line-height: 36px;
		}
	}
</style>

<div id="modal-knowMore" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-text-center uk-position-relative brad">
    	<div class="bg_band"></div>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
    	<!-- <span uk-icon="icon:check;ratio:4.0;" class="uk-primary"></span> -->
    	<h3 class="uk-h2 uk-margin-top ff-light">Special Personal Loan Offer</h3>
    	<h4 class="uk-h3 uk-margin-top ff-light">Last EMI Weaver</h4>
    	<p class="uk-text-meta">Get Loan amount up to INR 50 lakh at attractive interest rate with discounted processing fee for online applications. Terms and condition apply.Get an instant approval on your Personal Loan application when you apply online.</p>
    	<div class="uk-padding-large uk-padding-remove-vertical">
	    	<ul class="uk-text-left">
	    		<li>Last EMI Weaver</li>
	    		<li>Get Loan amount up to INR 50 lakh</li>
	    		<li>Get an instant approval on your Personal Loan application</li>
	    	</ul>
	    </div>
	    <a href="<?=$config->urls->root?>personal-loan/application/?u=<?=$unique_id?>" class="uk-btn-green-bg uk-text-white uk-margin-small-top ff-helvetica-bold fs-22 uk-button">Continue to apply</a>
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

	var price = <?php if ($p->loan_amount != "") {echo $p->loan_amount;}else{ echo 0;}?>;
	var tenure = <?php if ($p->tenure != "") {echo $p->tenure;}else{ echo 0;}?>;
	$scope.emi = <?php if ($p->emi_amount != "") {echo $p->emi_amount;}else{ echo 0;}?>;
    $scope.total_amount = <?php if($p->total_amount != ""){echo $p->total_amount;}else{echo 0;} ?>;
    $scope.pf = <?php if($p->pf != ""){echo $p->pf;}else{echo 0;} ?>;
    $scope.savings = <?php if($p->savings != ""){echo $p->savings;}else{echo 0;} ?>;

    if (price == 0) {
    	price = 200000;
    }

    if (tenure == 0) {
    	tenure = 3;
    }

    console.log(price + " - " + tenure);
	
    $scope.priceSlider = {
        value: price,
        options: {
            floor: 100000,
            ceil: <?php echo intval(($loan_amount * 100)."000")?>,
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
		$scope.pmt($scope.priceSlider.value, $scope.tenureSlider.value, <?=$roi?>);

		$scope.pf = $scope.priceSlider.value * 0.01;
	    $scope.savings = $scope.pf * 1.5;
	});

	//calling on load
	$scope.pmt($scope.priceSlider.value, $scope.tenureSlider.value, <?=$roi?>);
});
</script>
<?php include "partials/footer_pl.php";?>