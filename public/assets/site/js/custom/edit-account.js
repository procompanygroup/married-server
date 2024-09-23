var valid=true;
var year=0;
var type='';
$(document).ready(function() {
  
  $("#name").focusout(function (e) {
		if (!validatempty($(this))) {
  valid=valid && false;
			return false;
		}  
		if(!stringlength($(this).val(),1,15)){
			errorstyle($(this));
			valid=valid && false;
			return false;
		}else{
			validStyle($(this));
			valid=valid && true;
			return true;
		}
		 
	});


	$('.btn-submit').on('click', function (e) {
		e.preventDefault();
		valid=true;
		  $('#password').trigger('focusout');
		  $('#confirm_password').trigger('focusout');
		  $('#old_password').trigger('focusout');
   
	  if(valid){
		var formId= $(this).parents("form").attr('id');
		sendform('#'+formId);
	  }
	 
    // alert(valid);
    });


  $("#email").focusout(function (e) {
	$('#validate-email').text("").hide();
    if (!validatempty($(this))) {
			
			valid=valid && false;
			return false;
		}  
		if (!validateinputemail($(this),emailmsg)) {
			
			valid=valid && false;
			return false;
		} else {
			//checkmail($(this).val());
			return valid; 
		}
	}); 
  $("#password").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} else {
			valid=valid && true;
			return true;
		}
	});
  $("#confirm_password").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} 
	if($(this).val()== $("#password").val())
	{
		validStyle($(this));
		valid=valid && true;
		return true;
	}else{
		errorstyle($(this));
		valid=valid && false;
		return false;
	}

	});

	$("#old_password").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} else {
			valid=valid && true;
			return true;
		}
	});
 
	 

	function ClearErrors() {
		$("." + "invalid-feedback").html('').hide();
		$('.is-invalid').removeClass('is-invalid');
	}

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
				
					noteSuccess();      
				//	$(location).attr('href',verifurl); 
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
   
   
//new Date() 
 
function loading(cls) {
	//'.city-load'
$(cls).show();
}
function endloading(cls) {
	$(cls).hide();
}

  });
  function noteSuccess() {
    swal(success_msg);
  }
  function noteError() {
    swal(fail_msg);
  }