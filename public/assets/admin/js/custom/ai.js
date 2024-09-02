var urlval = "";
 
$(document).ready(function () {
	// $('#btn-title').on('click', function (e) {
	// 			e.preventDefault();	 
	// 	sendform('#title-form');
	// 	});
	
		$('.btn-submit').on('click', function (e) {
			e.preventDefault();	 
			var formid = $(this).closest("form").attr('id');
	sendform('#'+formid);
	});
	 
// 	$('#btn-addtolist').on('click', function (e) {
// 		e.preventDefault();	
// 		var option = $('#page_id').find(":selected").val(); 
// 		var optiontext = $('#page_id').find(":selected").text();
// 		if(option!=0){		 
// 		appendrow(option,optiontext);
// 		$('#page_id').find(":selected").remove();
// 		}
// 		// alert( option +'-'+optiontext);
// });
$('#mainop_id').on('change', function (e) {
 
	var option = $(this).find(":selected").val(); 
	 
	if(option!=0){
		loadgroups(option); 
  
	}
	// alert( option +'-'+optiontext);
});

  
	function sendform(formid) {
		//startLoading();
	 	 
	//	$formid='#create_form';
		 
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
	 

		$.ajax({
			url: urlval,
			type: "POST",

			data: formData,
			contentType: false,
			processData: false,
			//contentType: 'application/json',
			success: function (data) {
				//	alert(data);
				//endLoading();
				//$('#errormsg').html('');
				//$('#sortbody').html('');
				if (data.length == 0) {
					//noteError();
				} else if (data == "ok") {
					
					//noteSuccess();	
					//alert('ok');
					swal( "تم الحفظ بنجاح");
					// if(formid=='#social-form'){
					
					// }else{
					// 	location.reload(true);
					// }
					
				//	
				}

				// $('.alert').html(result.success);
			}, error: function (errorresult) {
			//	endLoading();
				var response = $.parseJSON(errorresult.responseText);
				// $('#errormsg').html( errorresult );
				swal( "لم يتم الحفظ");
				$.each(response.errors, function (key, val) {
				 
					$("#" + "info-form-error").append('<li class="text-danger">'+val[0]+'</li>');
					$("#" + key + "-error").text(val[0]).show();
					$("#" + key).addClass('parsley-error');
				});

			}, finally: function () {
				//endLoading();

			}		});
	}


	function loadgroups(id) {		 
		//	resetForm();
	var tmpurl=filltableurl;
	tmpurl=tmpurl.replace('itemId',id)
	
			 $('#table-container').html('');
		 $.ajax({
		url:tmpurl,
		type: "GET",  
	//	contentType: false,
	//	processData: false,
		//contentType: 'application/json',
		success: function (data) {			 
			if (data.length == 0) {			 
			} else   {
				$('#table-container').html(data);	
			 	// $('#res').text(data); 
				 
			}		 
		}, error: function (errorresult) {	
			var er=	errorresult.text;	 
		} 
	});
	
		};
 
 
	 
  
	 
	});
	 
///////////////////////////////////////////////////////

function noteSuccess() {
	// notif({
	// 	msg: "تمت العملية بنجاح",
	// 	type: "success"
	// });
}
function noteError() {
	// notif({
	// 	msg: "لم تنجح العملية !",
	// 	position: "right",
	// 	type: "error",
	// 	bottom: '10'
	// });
}
 
  