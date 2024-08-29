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
  
	
	$("#a-result").on('click',function (e) {
		$("#form-search").submit();
	});
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


	
// 	$('.btn-submit').on('click', function (e) {
// 		e.preventDefault();
 
// 		var formId= $(this).parents("form").attr('id');
// sendform('#'+formId);
	 
 
// 	});

	
 
	 function selectcheck(selElement) {
		if (!validatempty(selElement)) {
			valid=valid && false;
			return false;
		}  
		var option = selElement.find(":selected").val(); 
		if(selElement.attr('id')=='children_num'){
			if (option==-1)  {
				errorstyle(selElement);
				valid=valid && false;
			return false;
			}else{
				validStyle(selElement);
				valid=valid && true;
				return true;
			}		
		}else{
			if (option==0)  {

				errorstyle(selElement);
				valid=valid && false;
			return false;
			}else{
				validStyle(selElement);
				valid=valid && true;
				return true;
			}
		}
	};
	// $('#birthdate').on('change', function (e) {
	// 	validDate($(this).val());
		
	// });
 
 

	 

   
 
 
 

 

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
   
   $("#birthdatepicker").datepicker();
//new Date() 

function validDate(value) {
	var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
	if (m){
		value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);
		year=m[5];
	}
 
	return value;
}
//city
function fillCities(data) {
	var choose="اختر ..."
$("#city").html('<option title="" value="0" >'+choose+'</option>');
$.each(data, function( key,value) {

if(selcity==value.id){
$("#city").append('<option selected value="' + value.id + '">'+value.name_ar+'</option>');

	}else
	{
		$("#city").append('<option value="' + value.id + '">'+value.name_ar+'</option>');
	}
	}); // close each()
}

$('#residence').on('change', function (e) {

	var option = $(this).find(":selected").val(); 
	loading('.city-load');
	getcities(option);
	//endloading() ;

});
 function fillselectedCity ( ) {

	var option = $('#residence').find(":selected").val(); 
	loading('.city-load');
	getcities(option);
	//endloading() ;

};
fillselectedCity ();
function getcities(option) {
	var newurl=cityurl;
	newurl=newurl.replace("ItemId", option);
	 
	$.ajax({
		url:newurl,
		type: "GET",  
	//	contentType: false,
	//	processData: false,
		//contentType: 'application/json',
		success: function (data) {			 
			if (data.length == 0) {			 
			} else   {
				fillCities(data);	 
			}	
			endloading('.city-load');	 
		}, error: function (errorresult) {	
			endloading('.city-load');		 
		} 
	});
}
function loading(cls) {
	//'.city-load'
$(cls).show();
}
function endloading(cls) {
	$(cls).hide();
}
function setupCheckboxBehavior(propertyname,idsub) {
$('#'+idsub+'-0').change(function() {
	if (this.checked) {
		// إلغاء تحديد جميع الخيارات الأخرى
		$('input[name="'+propertyname+'[]"]').not(this).prop('checked', false);
	}
});
$('input[name="'+propertyname+'[]"]').not('#'+idsub+'-0').change(function() {
	if (this.checked) {
		// إلغاء تحديد "لا يهم"
		$('#'+idsub+'-0').prop('checked', false);
	}
});
};

setupCheckboxBehavior('residence','res');
setupCheckboxBehavior('nationality','nat');
setupCheckboxBehavior('family_status_female','fsf');
setupCheckboxBehavior('family_status','fs');
setupCheckboxBehavior('skin','sk');
setupCheckboxBehavior('body','bo');
setupCheckboxBehavior('education','ed');
setupCheckboxBehavior('work','wo');
setupCheckboxBehavior('financial','fi');
setupCheckboxBehavior('religiosity','rel');
setupCheckboxBehavior('prayer','pr');
setupCheckboxBehavior('veil','ve');
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