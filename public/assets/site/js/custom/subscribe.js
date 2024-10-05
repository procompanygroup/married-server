var valid=true;
var year=0;
var delmsg="تم حذف الحساب بنجاح";
$(document).ready(function() {

	$('.btn-submit').on('click', function (e) {
		e.preventDefault();
	 valid=true;
	  stepvalidate();
 if(valid){
 
//alert('6');
sendform('#form-profile');
	 
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
    
   $('#cardNumber').on('input', function() {
	var cardNumber = $(this).val();
	var cardType = getCardType(cardNumber);

	if (cardType) {
		$('#cardImage').attr('src', 'images/' + cardType + '.png').show();
	} else {
		$('#cardImage').hide(); // أخفِ الصورة إذا لم يتم التعرف على البطاقة
	}
});

function getCardType(cardNumber) {
	var visaRegex = /^4[0-9]{12}(?:[0-9]{3})?$/;
	var masterCardRegex = /^(5[1-5][0-9]{14}|2[2-7][0-9]{14})$/;
	var amexRegex = /^3[47][0-9]{13}$/;
	var discoverRegex = /^6(?:011|5[0-9]{2})[0-9]{12}$/;

	if (visaRegex.test(cardNumber)) {
		return 'visa'; // اسم الصورة لبطاقة Visa
	} else if (masterCardRegex.test(cardNumber)) {
		return 'mastercard'; // اسم الصورة لبطاقة MasterCard
	} else if (amexRegex.test(cardNumber)) {
		return 'amex'; // اسم الصورة لبطاقة American Express
	} else if (discoverRegex.test(cardNumber)) {
		return 'discover'; // اسم الصورة لبطاقة Discover
	} else {
		return null;
	}
}


$('input[name="payment_method"]').change(function() {
	if ($('#creditCard').is(':checked')) {
		$('#creditCardInfo').removeClass('d-none');
	} else {
		$('#creditCardInfo').addClass('d-none');
	}
});

$('#paymentForm').submit(function(event) {
	// إذا كانت طريقة الدفع هي بطاقة الائتمان
	if ($('#creditCard').is(':checked')) {
		var isValid = true;

		// التحقق من رقم البطاقة (16 رقمًا)
		var cardNumber = $('#cardNumber').val();
		if (!/^\d{16}$/.test(cardNumber)) {
			alert('يرجى إدخال رقم بطاقة صالح مكون من 16 رقمًا.');
			isValid = false;
		}

		// التحقق من تاريخ الانتهاء (MM/YY)
		var cardExpiry = $('#cardExpiry').val();
		if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(cardExpiry)) {
			alert('يرجى إدخال تاريخ انتهاء صالح (MM/YY).');
			isValid = false;
		}

		// التحقق من CVC (3 أو 4 أرقام)
		var cardCVC = $('#cardCVC').val();
		if (!/^\d{3,4}$/.test(cardCVC)) {
			alert('يرجى إدخال رمز أمان صالح (CVC).');
			isValid = false;
		}

		// إذا كان هناك خطأ، منع إرسال النموذج
		if (!isValid) {
			event.preventDefault();
		}
	}else{
		//$(this).closest('form').submit();
	}
});
  });
  function noteSuccess() {
    swal(success_msg);
  }
  function noteError() {
    swal(fail_msg);
  }
  function notemsg(msg) {
	     swal(msg);
	    }