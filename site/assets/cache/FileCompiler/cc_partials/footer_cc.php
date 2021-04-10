<?php if ($input->get->mode != "sales"): ?>
<?php
	$id = $_GET['card'];
	$p = $pages->get("id=$id");
?>
<div id="scheduleofsc" class="uk-modal-container" uk-modal>

    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
        <embed src="<?=$p->fname?>" frameborder="0" width="100%" height="500">
    </div>
</div>
<div id="clienttermsconditions" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
        <embed src="https://av.sc.com/in/content/docs/in-common-svt-midc.pdf" frameborder="0" width="100%" height="500">
    </div>
</div>
<div id="ecsmandate" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove" uk-overflow-auto>
    	<button class="uk-modal-close-default" type="button" uk-close></button>
        <embed src="https://av.sc.com/in/content/docs/in-credit-card-terms-and-condition.pdf" frameborder="0" width="100%" height="500">
    </div>
</div>
<div class="uk-margin-medium-top uk-margin-medium-bottom uk-container cc-container">
	<h2 class="ff-helvetica-bold fs-26 uk-text-center uk-margin-medium-bottom uk-text-2D">Terms & Conditions</h2>
		<div class="uk-margin-medium-top">
			<div class="uk-grid-small uk-grid-match uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1 uk-text-center" uk-grid>


					<?php if($id != "" && $p->fname != ""){ ?>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative  uk-border-default uk-padding-small uk-box-shadow-medium uk-text-center uk-background-f9">
							<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/schedule-icon.png"></div>
							<div class="fs-15 uk-margin-top ff-helvetica uk-text-2D con-bott">Schedule of service charges for details on fees and tariffs</div>
							<div class="cc_read_more uk-position-absolute fs-14">
								<a href="<?=$root?>credit-card/schedule-of-service-charges/" title="Schedule of service charges for details on fees and tariffs" target="_blank"><u>Read More</u></a>
							</div>
						</div>
					</div>
					<?php }else{
						echo "<div class='uk-width-1-6'></div>";
					} ?>


					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative  uk-border-default uk-padding-small uk-box-shadow-medium uk-text-center uk-background-f9">
							<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/client-icon.png"></div>
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-2D con-bott">Most important terms and conditions</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="<?=$root?>credit-card/important-information/" title="Client terms and conditions" target="_blank"><u>Read More</u></a>
							</div>
						</div>
					</div>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative  uk-border-default uk-padding-small uk-box-shadow-medium uk-text-center uk-background-f9">
							<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/download-icon.png"></div>
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-2D con-bott">Credit card terms and conditions</div>
							<div class="cc_read_more uk-position-absolute fs-15">
								<a href="<?=$root?>credit-card/terms-and-conditions/" title="ECS form" target="_blank"><u>Read More</u></a>
							</div>
						</div>
					</div>
				</div>
		</div>
</div>

<?php endif ?>

<footer>
	<div class="uk-background-3D uk-text-center fs-14 uk-text-white uk-padding-small">
		&copy; 2020. Standard Chartered Bank. All Rights Reserved.
	</div>
</footer>

<script type="text/javascript" src="<?=$tpl?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/main.js"></script>

<script>
$("#submitApplication").click(function(e){
  e.stopPropagation();
  e.preventDefault();

  UIkit.util.ready(function () {
        var bar = document.getElementById('js-progressbar');
        var animate = setInterval(function () {
            bar.value += 10;
            if (bar.value >= bar.max) {
                //clearInterval(animate);
                window.location.href="<?=$config->urls->root?>credit-card/instant-approval/?u=<?=$_GET['u']?>";
            }
        }, 500);
    });
});
//next button on radio buttons
$(".cc_choice_1").click(function(){
	var target = $(this).data('target');
	$("#cc_choice_1_next").data('target', target);
	$("#cc_choice_1_next").show();
});
$(".cc_choice_debit").click(function(){
	var target = $(this).data('target');
	$("#cc_next_debit").data('target', target);
	$("#cc_next_debit").show();
});

$(".income_select").change(function(){
	var target = $(this).children("option:selected").data('target');
	$("#income_select_next").data('target', target);
	$("#income_select_next").fadeIn();
});

$("#zipcode").keyup(function(){
	if ($(this).val().length > 5) {
		$("#zipcode_next").fadeIn();
	}
});

$("#mobile1").keyup(function(){
	if ($(this).val().length > 9) {
		$("#email_mobile_next").fadeIn();
	}
})

</script>
<?php include(\ProcessWire\wire('files')->compile('cc_partials/_form_handling.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true)))?>
</body>
</html>