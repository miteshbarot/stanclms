<script type="text/javascript" src="<?=$tpl?>assets/js/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script  src="<?=$tpl?>partials/js/script.js"></script>

<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>

<script  src="<?=$tpl?>partials/js/tab.js"></script>
<script  src="<?=$tpl?>assets/js/main.js?v=<?php echo time(); ?>"></script>

<script>
$(function(){
	$("#nri_email").keyup(function(){
		setTimeout(function() {
			$("#progressbar li:last-child").addClass("active");
		}, 1300);

		$("#nri_email_next").fadeIn();
	});

	$(".radio_choice").click(function(){
		var t = $(this).val();
		$("#radio_choice_next").fadeIn();
		$("#radio_choice_next").data("target","");
		$("#radio_choice_next").data("target",t);
	});

	$("#product_interested").change(function(){
		$("#product_interested_next").fadeIn();
	});
	$("#country_select").change(function(){
		$("#country_select_next").fadeIn();
	});
	$("#city_select").change(function(){
		$("#city_select_next").fadeIn();
	});
	
	$("#mobile_input").keyup(function(){
		if ($(this).val().length > 9) {
			$("#mobile_input_next").fadeIn();
			$("#mobile_callback").val($(this).val());
		}
	});
	$("#acc_number").keyup(function(){
		if ($(this).val().length > 4) {
			$("#acc_number_next").fadeIn();	
		}
	});
	$("#fname").keyup(function(){
		if ($(this).val().length > 3) {
			$("#fname_next").fadeIn();	
		}
	});
	$('[data-tooltip]').mouseover(function(){
		var tooltip = $(this).data('tooltip');
		var position = $(this).position();
		var top = position.top;
		var left = position.left + $(this).width();
		$(this).parent().append("<div class='tooltip' style='top:"+top+"px; left:"+left+"px;'>"+tooltip+"</div>");
		setTimeout(function() {
			$('.tooltip').fadeIn('slow');
		}, 250);
		
	});
	$('[data-tooltip]').mouseout(function(){
		$('.tooltip').fadeOut().remove();
	});
	
});
</script>

<?php include '_form_handling.php'; ?>



<?php if ($page->id == 28258): ?>
	

<style>
	#idlePopup{
		display: none;
		position: fixed;
		width: 35%;
		top: 20%;
		left: 50%;
		margin: -125px 0 0 -20%;
	    padding: 10px 20px;
		box-sizing: border-box;
		border-radius: 5px;
		text-align: center;
		z-index: 1000;
	}
	#idlePopup:before{
		content: '';
		position: fixed;
		width: 35%;
		height: 250px;
		top: 20%;
		left: 50%;
		margin: -125px 0 0 -20%;
		z-index: -1;
	}
	
	#idlePopup:after{
		content: '';
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(0,0,0,0.5);
		z-index: -2;
	}
	h3.modal-title{
		margin-top: 10px;
		font-size: 2rem;
	    line-height: 1.3;
		text-align: left;
		font-weight: 400;
	}
	#mobile_callback{
		display: inline-block;
		border-radius: 5px;
		padding: 10px 15px;
		max-width: 300px;
		margin-bottom: 10px;
		border: 1px solid #00a546;
	}
	.btn-submit{
		background: #00a546;
		color: #FFF;
	    padding: 7px 30px;
	}
	.btn-close{
		bottom: 15px;
		right: 15px;
		padding: 10px 20px;
	    font-weight: 300;
    	border: 1px solid #E5E5E5;
    	background: #fff;
    	font-size: 14px;
		float:right;
		margin-top: 10px;
	}
	a.btn{
		text-decoration: none;
	}
	.popup-btn{
		cursor: pointer;
	    background: #1e87f0;
	    width: 100%;
    	display: block;
    	padding: 10px;
    	margin-top: 20px;
    	text-decoration: none;
    	color: #fff;
    	border-radius: 5px;
	}
	.popup-btn svg {float: right;}
	.popup-holder {background: #fff; padding: 10px 30px; overflow: hidden;}
	.toggle-box{
		text-align: center;
	}
	#idlePopupBar{
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		height: 5px;
		width: 100%;
		background: transparent;
		z-index: 1030;
	}
</style>

<div id="idlePopup">
	<div class="popup-holder">
	<h3 class="modal-title">Need help?</h3>
	<div>
		<a href="https://www.sc.com/in/interact/Client/Intermediate?entryType=DEFAULT&mediumType=C&subjectId=DEFAULT" target="_blank" class="popup-btn btn-primary">Chat with our officer</a>	
	</div>
	<div>
		<a href="#requestCallback" class="toggle-btn popup-btn btn-primary">Request a call back <span class="uk-position-small uk-position-center-right uk-icon" uk-icon="icon:chevron-down;ratio:1.0"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#FFF" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span></a>	
	</div>
	
	<div id="requestCallback" class="toggle-box" style="display: none;">
		<form>
			<input type="tel" name="mobile_callback" id="mobile_callback" placeholder="Mobile number" autofocus />
			<button type="submit" name="request_callback" class="btn btn-submit">Submit</button>
		</form>
	</div>
	<button type="button" class="btn-close btn-default">Cancel</button>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">
// $(window).on("beforeunload", function() {
//   return confirm("Do you really want to close?");
// })
function idlePopup() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeydown = resetTimer;
    window.addEventListener('scroll', resetTimer, true); // improved; see comments
    function showModal() {
    	console.log($.cookie('idlePopup'));
    	if ($.cookie('idlePopup') != 0) {
		    $("#idlePopup").show();
		}
	}
  function resetTimer() {
    clearTimeout(t);
    t = setTimeout(showModal, 60000);  // time is in milliseconds
  }
}

/* Disabling idle popup untill Chat / Request callback is integrated, uncomment following line to enable */
//idlePopup();

$(".btn-close").click(function(){
	$("#idlePopup").fadeOut();
	$.cookie('idlePopup', '0', { expires: 1 });
});

$(".toggle-btn").click(function(){
	var target = $(this).attr('href');
	$(target).slideToggle();
});

$(function(){
	$("#idlePopupBar").mouseover(function(){
		$("#idlePopup").fadeIn();
	});
});

</script>

<!-- <div id="idlePopupBar"></div> -->
<?php endif ?>
<?php include 'gtmnoscript.php'; ?>
</body>
</html>