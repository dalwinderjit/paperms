jQuery(document).ready(function(){"use strict";jQuery(".select2").select2({width:"100%",minimumResultsForSearch:-1}),jQuery("#basicForm4").validate({highlight:function(e){jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}})});
 $(document).ready(function () {
 $('#datepicker').datepicker({
 format: "yyyy-mm-dd"
}); 

$('#datepicker2').datepicker({
 format: "yyyy-mm-dd"
});  
            
            });