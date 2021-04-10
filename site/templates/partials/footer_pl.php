<div id="scheduleofsc" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/in-schedule-of-charges-june-17-gst.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>
<div id="pltnc" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/in-personal-loan-most-imp-tnc.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>
<div id="clienttermsconditions" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/Client-Terms-and-condition.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>
<div id="ecsmandate" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
        <embed src="https://av.sc.com/in/content/docs/ecs-mandate-form.pdf" frameborder="0" width="100%" height="400px">
    </div>
</div>
<div class="uk-margin-medium-top uk-tnccontainer cc-container tnc-hlolder">
	<h2 class="ff-helvetica-bold fs-20 uk-text-center uk-margin-medium-bottom uk-text-white">Terms & Conditions</h2>
		<div class="uk-margin-medium-top">
			<div class="uk-grid-small uk-grid-match uk-child-width-1-4@m uk-child-width-1-1@s uk-child-width-1-1" uk-grid>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/schedule-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Schedule of service charges for details on fees and tariffs</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="https://av.sc.com/in/content/docs/in-schedule-of-charges-june-17-gst.pdf" target="_blank" title="Schedule of service charges for details on fees and tariffs">Read More</a>
							</div>
						</div>
					</div>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/pltc-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Personal Loans terms and conditions</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="https://av.sc.com/in/content/docs/in-scb-pl-terms-n-Conditions.pdf" target="_blank" title="Personal Loans terms and conditions">Read More</a>
							</div>
						</div>
					</div>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/client-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Client terms and conditions</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="https://av.sc.com/in/content/docs/Client-Terms-and-condition.pdf" target="_blank" title="Client terms and conditions">Read More</a>
							</div>
						</div>
					</div>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/download-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Please download ECS form for electronic debit authorization to bank account</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="https://av.sc.com/in/content/docs/ecs-mandate-form.pdf" title="ECS form" target="_blank">Read More</a>
							</div>
						</div>
					</div>
				</div>
		</div>
</div>
<footer>
	<!-- <div class="uk-background-primary uk-margin-medium-top">
		<div class="uk-container uk-padding">
			<div class="fs-20 uk-text-white ff-helvetica">Terms & Conditions</div>
			<ul class="uk-list ff-helvetica">
				<li><a class="fs-14 uk-text-white">Personal Loans - Most Important terms and conditions</a></li>
				<li><a class="fs-14 uk-text-white">Schedule of service charges for details on fees and tariffs</a></li>
				<li><a class="fs-14 uk-text-white">Personal Loans terms and conditions</a></li>
				<li><a class="fs-14 uk-text-white">Client terms and conditions</a></li>
				<li><a class="fs-14 uk-text-white">Please download ECS form for electronic debit authorization to bank account</a></li>
			</ul>
		</div>
	</div> -->
	<div class="uk-background-3D uk-text-center fs-14 uk-text-white uk-padding-small">
		&copy; 2021. Standard Chartered Bank. All Rights Reserved.
	</div>
</footer>

<script type="text/javascript" src="<?=$tpl?>assets/js/jquery.min.js"></script>
<script src="<?=$tpl?>assets/js/jquery-ui.min.js"></script>
<script>
$(function(){
	$(".submit_pl_first").click(function(){
		$(".verifymobile").val($("#mobile1").val());
	});

	//next button on radio buttons
	$(".pl_choice_1").click(function(){
		var target = $(this).data('target');
		$("#pl_choice_1").data('target', target);
		$("#pl_choice_1").show();
	});
	$(".pl_choice_2").click(function(){
		var target = $(this).data('target');
		$("#pl_choice_2").data('target', target);
		$("#pl_choice_2").show();
	});
	$(".pl_choice_3").click(function(){
		var target = $(this).data('target');
		$("#pl_choice_3").data('target', target);
		$("#pl_choice_3").show();
	});

	/*$(".cc_choice_debit").click(function(){
		var target = $(this).data('target');
		$("#cc_next_debit").data('target', target);
		$("#cc_next_debit").show();
	});*/

	/*$("#pl_emptype").focus(function(){
		console.log('test');
	});*/

	$("#pl_emptype").change(function(){
		var target = $(this).children("option:selected").data('target');
		console.log(target);
		$("#pl_emptype_next").data('target', target);
		$("#pl_emptype_next").fadeIn();
	});
	$("#pl_employer_name").keyup(function(){
		if ($(this).val().length > 2) {
			$("#pl_employer_name_next").fadeIn();
		}
	});
	$("#pl_off_industry").change(function(){
		$("#industry_next").fadeIn();
	});
	$("#pl_gross_income").keyup(function(){
		if ($(this).val().length > 3) {
			$("#pl_gross_income_next").fadeIn();
		}
	});
	$("#gross_turnover").keyup(function(){
		if ($(this).val().length > 3) {
			$("#gross_turnover_next").fadeIn();
		}
	});
	$("#taxable_income").keyup(function(){
		if ($(this).val().length > 3) {
			$("#taxable_income_next").fadeIn();
		}
	});
	$("#current_depreciation").keyup(function(){
		if ($(this).val().length > 3) {
			$("#current_depreciation_next").fadeIn();
		}
	});
	$("#current_tax").keyup(function(){
		if ($(this).val().length > 3) {
			$("#current_tax_next").fadeIn();
		}
	});
	$("#current_tax").keyup(function(){
		if ($(this).val().length > 3) {
			$("#current_tax_next").fadeIn();
		}
	});
	$("#emi_existing_income").keyup(function(){
		if ($(this).val().length > 3) {
			$("#emi_existing_income_next").fadeIn();
		}
	});
	$("#name").keyup(function(){
		if ($(this).val().length > 3) {
			$("#name_next").fadeIn();
		}
	});
	$("#pl_pincode_pi").keyup(function(){
		if ($(this).val().length > 3) {
			$("#pl_pincode_pi_next").fadeIn();
		}
	});
	
	
	$("#form-stacked-select-mm").change(function(){
		$("#form-stacked-select-mm-next").fadeIn();
	});
	$("#applicant_description").change(function(){
		$("#applicant_description_next").fadeIn();
	});
	$("#mod_salary").change(function(){
		$("#mod_salary_next").fadeIn();
	});
});
</script>

<script type="text/javascript" src="<?=$tpl?>assets/js/touch-punch.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/main.js?v=<?php echo time(); ?>"></script>
<?php include '_form_handling.php' ?>
<?php include 'gtmnoscript.php'; ?>
</body>
</html>