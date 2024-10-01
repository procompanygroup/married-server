 
$(document).ready(function () {
	$('input[name="members_online"]').on('change', function (e) {
		if (this.checked) {
			// إلغاء تحديد "لا يهم"
		var option=	$(this).val();
if(option=='male'){
	$('.male-item').closest('.owl-item').show();
	$('.female-item').closest('.owl-item').hide();
}else if(option=='female'){
	$('.male-item').closest('.owl-item').hide();
	$('.female-item').closest('.owl-item').show();
}else{
	$('.male-item').closest('.owl-item').show();
	$('.female-item').closest('.owl-item').show();
}
		}
	});
	 
 
});