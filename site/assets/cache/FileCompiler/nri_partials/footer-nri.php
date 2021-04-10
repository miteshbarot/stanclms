<script type="text/javascript" src="<?=$tpl?>assets/js/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script  src="<?=$tpl?>nri_partials/js/script.js"></script>
	
<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>

<script  src="<?=$tpl?>nri_partials/js/tab.js"></script>
<script  src="<?=$tpl?>assets/js/main.js"></script>

<script>
$(function(){
	$("#nri_email").keyup(function(){
		setTimeout(function() {
			$("#progressbar li:last-child").addClass("active");
		}, 1300);
	})
});
</script>

<?php include '_form_handling.php'; ?>
</body>
</html>