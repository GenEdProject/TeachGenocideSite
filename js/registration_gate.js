( function($) {
  var setCookie = function (cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; path=/; " + expires;
  } 

  $ = jQuery;
  // we're on the right page
  if (window.location.href.indexOf("register\/for-educators") > -1) {
    $(":submit.teachgen_registration_form_submit_btn").on("click", function(e) {
      setTimeout(function() {
        if ($(":contains('Thank you for subscribing! Check your email for the confirmation message.')")) {
          setCookie("registered", "true", 3000);
        }
      }, 1000); 
    });
  }
})();
