
var recordId = 0;
var tableRow;
$(document).ready(function () {
 
	$('.btn-remove').click(function () {
		recordId = $(this).attr('data-record-id');
		  tableRow = $(this).closest('.table-row');
		$('#modal-btn-option').show();
		$('#modal-btn-close').hide();
		$("#modal-fave-title").html('تنبيه');
		$("#modal-fave-body").html(' هل انت متأكد أنك تريد حذف هذه المحادثة ؟');
		//sendformbyType(recordId,tableRow);
	});

	$('#modal-btn-yes').click(function () {
		sendformbyType(recordId, tableRow);
		$('.close').trigger('click');
	});
	function sendformbyType(recordId, tableRow) {
		var sendUrl = delurl;
		sendUrl = sendUrl.replace('itemId', recordId);
		//	var senddata = { 'favorite_id': recordId, 'type':type};
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			url: sendUrl,
			type: "POST",
			//	data: senddata,
			// contentType: false,
			// processData: false,
			success: function (data) {
				if (data.length == 0) {
				} else if (data == "ok") {				 
						tableRow.remove();				 
				}
			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				//alert('error');
			}, finally: function () {

			}
		});

	}
});