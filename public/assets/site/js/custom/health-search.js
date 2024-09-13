 
 
 
$(document).ready(function() {
  
	
	 
 
// 	$('.btn-submit').on('click', function (e) {
// 		e.preventDefault();
 
// 		var formId= $(this).parents("form").attr('id');
// sendform('#'+formId);
	 
 
// 	});

	 

	function sendform(formid) {
		ClearErrors();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function (data) {
				$('.loading img').hide();
				if (data.length == 0) {
					noteError();
				} else if (data == "ok") {
					if(formid=='#del-form'){
						notemsg(delmsg);
						var url= window.location.origin;
						$(location).attr('href',url); 
					}else{
						noteSuccess(); 	
					}
				} else {
					noteError();
				}

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
				$.each(response.errors, function (key, val) {
				//	$("#" + "info-form-error").append('<li class="text-danger">' + val[0] + '</li>');
					$("#" + key + "-error").addClass('invalid-feedback').text(val[0]).show();
					$("#" + key).addClass('is-invalid');
				});

			}, finally: function () {		 

			}
		});
	}

   //end register
     
$('.search-select').on('change', function (e) {

	//var option = $(this).find(":selected").val(); 
	  $(this).parents("form").submit();
	// var formId= $(this).parents("form").attr('id');
	// $("#name-search-form").submit();
	 
	//endloading() ;

}); 
  

 
  }); 