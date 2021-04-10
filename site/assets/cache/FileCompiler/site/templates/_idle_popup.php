<!-- <style>
  .idle-popup-top{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 10px;
    background: transparent;
    z-index: 1000;
  }
</style>
<div class="idle-popup-top"></div> -->
<div id="idlePopup" uk-modal>
<div class="uk-modal-dialog uk-modal-body">
  <button class="uk-modal-close-default" type="button" uk-close></button>
  <h2 class="uk-modal-title uk-h3">Need help?</h2>
  <div>
    <a href="https://www.sc.com/in/interact/Client/Intermediate?entryType=DEFAULT&mediumType=C&subjectId=DEFAULT" target="_blank" class="uk-button uk-button-primary uk-text-white uk-width-1-1 uk-margin-small uk-border-rounded">Chat with our officer</a>
    <a href="#requestCallback" class="uk-button uk-button-primary uk-text-white uk-width-1-1 uk-margin-small uk-position-relative uk-border-rounded" uk-toggle>Request a callback <span class="uk-position-small uk-position-center-right" uk-icon="icon:chevron-down;ratio:1.0"></span></a>
    <div id="requestCallback" class="uk-panel uk-margin-auto uk-width-large uk-margin-top" hidden>
      <form class="uk-text-center uk-flex-center uk-grid uk-grid-small uk-width-1-1">
        <div class="uk-width-auto">
          <input type="tel" name="mobile_callback" class="uk-input uk-margin uk-border-rounded" placeholder="Mobile number" autofocus />
        </div>
        <div class="uk-width-auto">
          <button type="submit" name="request_callback" class="uk-button uk-btn-apply uk-text-white uk-border-rounded">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <p class="uk-text-right">
    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
  </p>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">

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
        UIkit.modal("#idlePopup").show();
    }
  }
  
  function resetTimer() {
    clearTimeout(t);
    t = setTimeout(showModal, 120000);  // time is in milliseconds
  }
}

idlePopup();

$(function(){
  $('.idle-popup-top').mouseover(function(){
    UIkit.modal("#idlePopup").show();
  });  
  $(".uk-modal-close").click(function(){
    $.cookie('idlePopup', '0', { expires: 1 });
  });
});
</script>
