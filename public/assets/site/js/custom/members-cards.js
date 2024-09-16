
var favtype = '';
$(document).ready(function () {
	$('button[name="chat-send-btn"]').on('click', function (e) {
		e.preventDefault();
		var formObj = $(this).parents("form");
		sendform(formObj);
		// alert(valid);
	});

	function sendform(formObj) {
		//ClearErrors();
		var form = $(formObj)[0];
		var formData = new FormData(form);
		var msgContent = formData.get("content");
		if (required(msgContent)) {
			//	var reciverId=$('input[name="member-num"]').val();
			formData.append("reciver_id", recieverId);
			urlval = $(formObj).attr("action");
			$.ajax({
				url: urlval,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				success: function (data) {
					//	$('.loading img').hide();
					if (data.length == 0) {
						//	noteError();
					} else {
						//alert('ok');
						//append to chat
						var newMsg = '<div class="direct-chat-msg right">' +
							'<div class="direct-chat-info clearfix">' +
							'<span class="shift-left direct-chat-timestamp"><span>' + data.create_date + ' ' + data.create_time + '</span></span>' +
							'<span>' + data.sender_name + ' </span>' +
							'</div>' +
							'<img class="direct-chat-img" src="' + data.sender_image + '" alt="message user image">' +
							'<div class="direct-chat-text">' + data.content + '</div>' +
							'</div>';
						$('#chat-content').append(newMsg);
						$('input[name="content"]').val('');
						lastMsg = data.id;
					}

				}, error: function (errorresult) {
					var response = $.parseJSON(errorresult.responseText);
					//alert('error');
				}, finally: function () {

				}
			});
		}
	}

	//favorite
	$('.btn-add-to-favorite,.btn-remove-from-favorite').click(function () {
		
		var isFav = $(this).attr('data-user-favorite');
		//var isBlack = $('.btn-add-to-blacklist').attr('data-user-blacklist');
		var userCard = $(this).closest('.user-card');
		recieverId =userCard.data('user-id');
		// استخراج قيمة data-user-blacklist
		var isBlack = userCard.find('.btn-remove-from-blacklist').attr('data-user-blacklist');
	 
		favtype = 'fav';
		var memName = userCard.data('user-name');
		if (isFav == 1) {
			$('#modal-btn-option').show();
			$('#modal-btn-close').hide();
			$("#modal-fave-title").html('حذف من الاهتمام');
			$("#modal-fave-body").html(' هل تود حذف ' + memName + ' من قائمة الاهتمام؟ ');
		} else {
			if (isBlack == 1) {
				$('#modal-btn-option').hide();
				$('#modal-btn-close').show();
				$("#modal-fave-title").html('إضافة للاهتمام');
				$("#modal-fave-body").html(' لقد أضفت هذا العضو إلى قائمة التجاهل الخاصة بك, لذلك لايمكنك إضافته إلى قائمة الإهتمام الخاصة بك. برجى إزالته من قائمة التجاهل الخاصة بك أولا.');
			} else {
				$('#modal-btn-option').show();
				$('#modal-btn-close').hide();
				$("#modal-fave-title").html('إضافة للاهتمام');
				$("#modal-fave-body").html(' هل تود إضافة ' + memName + ' إلى قائمة الاهتمام؟ ');
			}

		}
});
	$('.btn-add-to-blacklist,.btn-remove-from-blacklist').click(function () {
		 
		var isBlack = $(this).attr('data-user-blacklist');
		var userCard = $(this).closest('.user-card');
		recieverId =userCard.data('user-id');
		var isFav =userCard.find('.btn-add-to-favorite').attr('data-user-favorite');
		favtype = 'black';
	 
		var memName = userCard.data('user-name');
		if (isBlack == 1) {
			$('#modal-btn-option').show();
			$('#modal-btn-close').hide();
			$("#modal-fave-title").html('حذف من التجاهل');
			$("#modal-fave-body").html(' هل انت متأكد من أنك تريد حذف  ' + memName + ' من التجاهل؟ ');
		} else {
			if (isFav == 1) {
				$('#modal-btn-option').hide();
				$('#modal-btn-close').show();
				$("#modal-fave-title").html('إضافة للتجاهل');
				$("#modal-fave-body").html('لا يمكن إضافة هذا العضو إلى قائمة التجاهل إذا كان مُسبقا على قائمة الإهتمام الخاصة بك. يجب عليك حذفه من قائمة الإهتمام الخاصة كي تتمكن من تجاهله.');
			} else {
				$('#modal-btn-option').show();
				$('#modal-btn-close').hide();
				$("#modal-fave-title").html('إضافة للتجاهل');
				$("#modal-fave-body").html(' هل  انت متأكد من إضافة ' + memName + ' للتجاهل؟ ');
			}

		}
		//	sendformbyType('fav',memId);
	});

	//report

	//end report
	$('#modal-btn-yes').click(function () {
		sendformbyType(favtype, recieverId);
		$('.close').trigger('click');
	});
	function sendformbyType(type, memId) {
		//ClearErrors();
		var reportsel=0;
		var sendUrl = '';
		if (type == 'fav') {
			sendUrl = favurl;
		} else if (type == 'black') {
			sendUrl = blackurl;
		}
		// else if (type == 'report') {
		// 	sendUrl = reporturl;
		//   reportsel=	$('#report-sel').find(":selected").val(); 

		// }
		var senddata = { 'member_id': memId, 'report-sel':reportsel};

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			url: sendUrl,
			type: "POST",
			data: senddata,
			// contentType: false,
			// processData: false,
			success: function (data) {
				//	$('.loading img').hide();
				if (data.length == 0) {
					//	noteError();
				} else {
					var userCard=$('#card-'+memId);
					if (type == 'fav') {

						userCard.find('.btn-add-to-favorite,.btn-remove-from-favorite').attr('data-user-favorite', data);
						if (data == 1) {
							userCard.find('.btn-add-to-favorite').removeClass('btn-add-to-favorite').addClass('btn-remove-from-favorite');
							userCard.find('.btn-remove-from-favorite').attr('title','مهتم');
							//$(".favorite-text").html('مهتم');
						} else if (data == 0 || data == 2) {
							userCard.find('.btn-remove-from-favorite').removeClass('btn-remove-from-favorite').addClass('btn-add-to-favorite');
						//	$(".favorite-text").html('اهتمام');
						userCard.find('.btn-add-to-favorite').attr('title','إضافة للإهتمام');
						}
					} else if (type == 'black') {

						userCard.find('.btn-remove-from-blacklist').attr('data-user-blacklist', data);
						if (data == 1) {
							userCard.addClass('blacklisted');
							//$(".blacklist-text").html('تم التجاهل');
						} else if (data == 0 || data == 2) {
							userCard.removeClass('blacklisted');
							userCard.find('.btn-remove-from-blacklist').attr('data-user-blacklist', data);
							userCard.find('.btn-add-to-favorite').show();
							//$(".blacklist-text").html('تجاهل');
						}
					}
				 
				}

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				//alert('error');
			}, finally: function () {

			}
		});

	}
});