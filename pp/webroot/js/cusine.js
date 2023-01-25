function cuisine(){ 	
	var values = new Array();
	$.each($("input[name='cusine[]']:checked"),function(){
    values.push($(this).val());
    });

var dataStrings = 'cusine='+ values;
$.ajax({
type: "POST",
url: "http://localhost/fp/filter/",
data: dataStrings,
cache: false,
success: function(html){
	if($('.myCheckbox').is(':checked')){
		$("#restrolist").html(html);
		 }else{
			location.reload();
		 }

}  
	
});

} 

