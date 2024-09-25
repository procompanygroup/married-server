var valid=true;
var year=0;
var delmsg="تم حذف الحساب بنجاح";
$(function(){

	$("#content-1").mCustomScrollbar({
		theme: "rounded-dots-dark"
	  });
	
	  /* Rounded Dark */
	  $("#content-2").mCustomScrollbar({
		theme: "rounded-dark"
	  });
	
	  /* Inset Dark */
	  $(".content-3").mCustomScrollbar({    theme: "inset-3-dark"});

  
  });
$(document).ready(function() {
 //image sec
$(document).on('change', '#image', function() { 
	var file = this.files[0];
	var imgTag = $('#imgshow');	 
	if (file) {
		var reader = new FileReader();
		reader.onload = function(e) {
			// عرض الصورة الجديدة
			imgTag.attr('src', e.target.result);
		}
		reader.readAsDataURL(file);
	}
});

$('#btn-submit-img').on('click', function (e) {
	e.preventDefault();
 
	var formId= $(this).parents("form").attr('id');
	sendform('#'+formId,'img');
 
 
// alert(valid);
});
$('.btn-del-photo').click(function (e) {

	//recordId = $(this).attr('data-record-id');
	//  tableRow = $(this).closest('.table-row');
	$('#modal-btn-option').show();
	$('#modal-btn-close').hide();
	$("#modal-fave-title").html('تنبيه');
	$("#modal-fave-body").html(' هل انت متأكد أنك تريد حذف الصورة ؟');
	//sendformbyType(recordId,tableRow);
});

$('#modal-btn-yes').click(function () {
	//sendformbyType(recordId, tableRow);
$('form[name="form-del-image"]').submit();
	$('.close').trigger('click');
});
$('#btn-image-member').click(function (e) {
	e.preventDefault(); 
	var formId= $(this).closest("form").attr('id');
	sendform('#'+formId,'fav') ;
});
//end image sec
$('.favcheck').change(function() {
	if (this.checked) {
		// إلغاء تحديد جميع الخيارات الأخرى
		countShow++;		
	}else{
		countShow--;
	}
	$('#showcount').html(countShow);
}); 
function sendform(formid,type) {
	 
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
		//	$('.loading img').hide();
			if (data.length == 0) {
				noteError();
			} else if (data == "ok") {
			
				noteSuccess(); 
				if(type=='img'){
					var currLoc = $(location).prop('href');     
					$(location).attr('href',currLoc); 
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
 
 //radio
 $('input[name="client_group"]').change(function() {
	if (this.checked) {
		// إلغاء تحديد جميع الخيارات الأخرى
	var radioval= $(this).val();
if(radioval==0){
$('.fav-content').hide();
}else{
	$('.fav-content').show();
}
	}
	
});
 
 //end radio
 
 
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