var valid=true;
$(document).ready(function() {
  
  $("#name").focusout(function (e) {
		if (!validatempty($(this))) {
  
			return false;
		} else {
     
			return true;
		}
	});
 
  
  $("#email").focusout(function (e) {
    if (!validatempty($(this))) {
			return false;
		} else {

		//	return true;
		}
		if (!validateinputemail($(this),emailmsg)) {
			return false;
		} else {
			return true;
		}
	}); 
  $("#password").focusout(function (e) {
		if (!validatempty($(this))) {
			return false;
		} else {
			return true;
		}
	});
  $("#confirm_password").focusout(function (e) {
		if (!validatempty($(this))) {
			return false;
		} else {
			return true;
		}
	});
    // $('#login-form').submit(function(event) {
    //     event.preventDefault();

    //     var username = $('#name').val().trim();
    //     var password = $('#password').val().trim();
    //     var isValid = true;

    //     if (username === "") {
    //       $('#name').addClass('is-invalid');
    //       isValid = false;
		 
    //     } else {
    //       $('#name').removeClass('is-invalid');
		  
    //     }

    //     if (password === "") {
    //       $('#password').addClass('is-invalid');
    //       isValid = false;
    //     } else {
    //       $('#password').removeClass('is-invalid');
    //     }

    //     if (isValid) {
    //       // Handle the form submission here (e.g., AJAX request)
    //       alert('تم تسجيل الدخول بنجاح!');
    //     }
    //   });
   //end login

   //register form 
   $('.btn-submit').on('click', function (e) {
		e.preventDefault();
if(validatempty($("#name")) && validatempty($("#email")) && validateinputemail($("#email"),emailmsg) && validatempty($("#password")) && validatempty($("#confirm_password"))  ){
    var formid = $(this).closest("form").attr('id');
		sendform('#' + formid);
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
				if (data.length == 0) {
					noteError();
				} else if (data == "ok") {
					noteSuccess(); 	        
					$(location).attr('href',verifurl); 
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
   
  });
  function noteSuccess() {
    swal(success_msg);
  }
  function noteError() {
    swal(fail_msg);
  }