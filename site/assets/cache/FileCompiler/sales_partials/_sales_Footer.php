		<?php if ($input->get->view == 'iframe'): ?>
		<?php else: ?>
		<br/><br/><br/>
		<footer class="uk-section uk-section-small uk-text-center uk-background-secondary uk-light">
			<div class="uk-container">
				<p class="uk-text-small uk-text-center uk-margin-remove">Copyright 2020. Standard Chartered Bank. All Rights Reserved.</p>
				<p class="uk-text-small uk-text-center uk-text-muted uk-margin-small">Powered by Ultimedia LMS.</p>
			</div>
		</footer>
		<?php endif ?>
	</div><!-- /CONTENT -->
</div><!-- wrapper -->

<!-- OFFCANVAS -->
<div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
	<div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
		<button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
		<ul class="uk-nav uk-nav-default">
			<li class="uk-nav-header">Header</li>
			<li><a href="#js-options"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: table"></span> Item</a></li>
			<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: thumbnails"></span> Item</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: trash"></span> Item</a></li>
		</ul>
	</div>
</div>
<!-- /OFFCANVAS -->

<!-- JS FILES -->
<script src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
$(function(){
	$(".calendar").flatpickr({
		minDate: "today",
		dateFormat: "d-m-Y"
	});
	$("#fromDate").flatpickr({
		maxDate: "today",
		dateFormat: "d-m-Y"
	});
	$("#toDate").focus(function(){
		var from = $("#fromDate").val();
		$("#toDate").flatpickr({
			maxDate: "today",
			dateFormat: "d-m-Y",
			minDate: from
		});
	});

	//onload get the country value
	$(".country_ext").val($(".country_select").val());
	$(".country_select").change(function(){
		$(".country_ext").val($(this).val());
	});

	$("#status_update").change(function(){
		var target = $(this).children("option:selected").attr('value');
		
		$(".stat_update_form").hide();
		$("#update_alert").hide();

		if (target == 1 || target == 2 || target == 3 || target == 5) {
			$("#status_"+target).show();
		}else{
			$("#status_6").show();
			$("#app_status_rest").val(target);
		}
	});

	$("#reject_reason").change(function(){
		var value = $(this).children("option:selected").attr('value');
		if (value == '11') {
			$("#rejectOther").fadeIn();
		}else{
			$("#rejectOther").fadeOut();
		}
	});

	$("#app_status_process").change(function(){
		var value = $(this).children("option:selected").attr('value');
		if (value == '2') {
			$(".follow-up-fields").fadeIn();
		}else{
			$(".follow-up-fields").fadeOut();
		}
	});

});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="<?=$tpl?>assets/js/chartScripts.js"></script>

</body>
</html>