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
<div class="uk-margin-medium-top uk-tnccontainer cc-container tnc-hlolder">
	<h2 class="ff-helvetica-bold fs-20 uk-text-center uk-margin-medium-bottom uk-text-white">Terms & Conditions</h2>
		<div class="uk-margin-medium-top">
			<div class="uk-grid-small uk-grid-match uk-child-width-1-3@m uk-child-width-1-1@s uk-child-width-1-1" uk-grid>


					<?php if($id != "" && $p->fname != ""){ ?>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/schedule-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Product Terms and Conditions</div>
							<div class="uk-display-block fs-14">
								<a href="<?=$checkCard->fname;?>" title="Product Terms and Conditions" target="_blank"><u>Read More</u></a>
							</div>
						</div>
					</div>
					<?php }else{
						echo "<div class='uk-width-1-6'></div>";
					} ?>


					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/client-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Most important terms and conditions</div>
							<div class="uk-display-block fs-15">
								<a href="<?=$checkCard->link;?>" title="Client terms and conditions" target="_blank"><u>Read More</u></a>
							</div>
						</div>
					</div>
					<div class="cc_child_ht_match">
						<div class="uk-border-rounded uk-position-relative uk-padding-small">
							<!--<div class="uk-margin-small-top"><img src="<?=$tpl?>assets/images/download-icon.png"></div>-->
							<div class="fs-16 uk-margin-top ff-helvetica uk-text-white con-bott">Credit card terms and conditions</div>
							<div class="uk-display-block fs-15">
								<a href="<?=$checkCard->org_code;?>" title="ECS form" target="_blank"><u>Read More</u></a>
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
 <!-- <script type="text/javascript" src="<?=$tpl?>assets/js/jquery-3.5.1.min.js"></script> -->
 <script src="<?=$tpl?>assets/js/jquery-ui.min.js"></script>

  <script type="text/javascript" src="<?=$tpl?>assets/js/slick.min.js"></script>
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
$(function () {
        $("#chkaddress").click(function () {
            if ($(this).is(":checked")) {
                $("#dvaddress").hide();
            } else {
                $("#dvaddress").show();
            }
        });
    });
</script>
<?php include '_form_handling.php' ?>
</body>
</html>