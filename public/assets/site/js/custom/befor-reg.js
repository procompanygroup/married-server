 

$(document).ready(function() {
	$('.befor-btn').on('click', function (e) {
		e.preventDefault();
if( $("#oathed").is(':checked')  ){

	var gender=$(this).attr('id');
	var oathed=1;
	var data={gender:gender,oathed:oathed}
	//'gender='+gender+'&oathed='+oathed;
		sendform(data);
}else{
	noteError();
}		
	});
	function ClearErrors() {
		$("." + "invalid-feedback").html('').hide();
		$('.is-invalid').removeClass('is-invalid');
	}

	function sendform(data) {
		//ClearErrors();
	 
		var formData = data
	//var	urlformval = $(formid).attr("action");
		$.ajax({
			url: beforurl,
			type: "POST",
			data:{ _token: token,data:formData} ,
	
			success: function (data) {
				if (data.length == 0) {
					noteError();
				} else if (data == "male" || data == "female" ) {
				 
					//	noteSuccess(); 	
						var url= regurl;
						url=url+'/'+ data;
								  $(location).attr('href',url);  
		 
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
   	//pull
 
  
  });
//   function noteSuccess() {
//     swal (success_msg);
//   }
//   function notemsg(msg) {
//     swal(msg);
//   }
  function noteError() {
  swal(fail_msg);
 
  }

  
 