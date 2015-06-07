( function($) {
  $ = jQuery;
  $("#state_select").change(function(e) {
    var state = e.target.value;
    $(".state_edu_requirements .state_edu_details").hide();
    $(".state_edu_details."+state).show();
  });
})();
