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

<footer>
	<div class="uk-background-3D uk-text-center fs-14 uk-text-white uk-padding-small">
		&copy; 2021. Standard Chartered Bank. All Rights Reserved.
	</div>
</footer>

<script>
$(function(){
	$(".submit_bb_btn").click(function(){
		$(".verifymobile").val($("#mobile").val());
	});

	//next button on radio buttons
	$(".bb_choice_1").click(function(){
		var target = $(this).data('target');
		$("#bb_choice_1").data('target', target);
		$("#bb_choice_1").show();
	});
	/*$(".bb_choice_2").click(function(){
		var target = $(this).data('target');
		$("#bb_choice_2").data('target', target);
		$("#bb_choice_2").show();
	});

	$("#pl_emptype").change(function(){
		var target = $(this).children("option:selected").data('target');
		console.log(target);
		$("#pl_emptype_next").data('target', target);
	});*/

	$("#relation_type").change(function(){
		var value = $(this).children("option:selected").data('value');
		if (value == 'other') {
			$("#otherInputBox").show();
			$("#otherInputBox input").focus();
			$("#otherInputBox input").attr("name","relation_type");
			$(this).removeAttr("name");
		}else{
			$("#otherInputBox").hide();
			$(this).attr("name","relation_type");
		}
		$("#relation_type_next").fadeIn();
	});

	$("#constitution").change(function(){
		var value = $(this).children("option:selected").data('value');
		if (value == 'other') {
			$("#otherConstitutionInputBox").show();
			$("#otherConstitutionInputBox input").focus();
			$("#otherConstitutionInputBox input").attr("name","constitution");
			$(this).removeAttr("name");
		}else{
			$("#otherConstitutionInputBox").hide();
			$(this).attr("name");
			$(this).attr("name","constitution");
		}
		$("#constitution_next").fadeIn();
	});

	$("#business_type").change(function(){
		var value = $(this).children("option:selected").data('value');
		if (value == 'other') {
			$("#other_business_type").show();
			$("#other_business_type input").focus();
			$("#other_business_type input").attr("name","business_type");
			$(this).removeAttr("name");
		}else{
			$("#other_business_type").hide();
			$(this).attr("name","business_type");
		}
		$("#business_type_next").fadeIn();
	});

	$("#start_year").change(function(){
		var val = $(this).val();
		if (val == "") {
			$("#start_mm").attr("disabled","true");
		}else{
			$("#start_mm").removeAttr("disabled");
		}
	});
	$("#industry").change(function(){
		$("#industry_next").fadeIn();
	});
	$("#product_of_interest").change(function(){
		$("#product_of_interest_next").fadeIn();
	});
	$("#start_mm").change(function(){
		$("#start_mm_next").fadeIn();
	});
	$("#mobile").keyup(function(){
		if ($(this).val().length > 9) {
			$("#mobile_next").fadeIn();
			$(".verifymobile").val( $(this).val() );
			UIkit.toggle("#modal-otp-etb").toggle();
		}
	});
	$("#city").change(function(){
		$("#city_next").fadeIn();
	});
	$("#fname").keyup(function(){
		if ($(this).val().length > 3) {
			$("#fname_next").fadeIn();
			setTimeout(function() {
				$(".timeline li:nth-child(2)").addClass("active");
			}, 1000);
		}
	});
	$("#entity_name").keyup(function(){
		if ($(this).val().length > 3) {
			$("#entity_name_next").fadeIn();	
		}
	});
	$("#email").keyup(function(){
		if ($(this).val().length > 5) {
			$("#email_next").fadeIn();
		}
		setTimeout(function() {
			$(".timeline li:nth-child(3)").addClass("active");
		}, 1000);
	});
});
</script>

<script type="text/javascript" src="<?=$tpl?>assets/js/touch-punch.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/main.js"></script>
<?php include(\ProcessWire\wire('files')->compile('partials/gtmnoscript.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>
</body>
</html>