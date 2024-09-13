$(document).ready(function() {
	$('button[name="chat-send-btn"]').on('click', function (e) {
		e.preventDefault();	
		var formObj= $(this).parents("form");
		sendform(formObj);
	 
    // alert(valid);
    });

	function sendform(formObj) {
		//ClearErrors();
		var form = $(formObj)[0];
		var formData = new FormData(form);
	var msgContent=	formData.get("content");
	if(required(msgContent) ){
	//	var reciverId=$('input[name="member-num"]').val();
		formData.append("reciver_id",recieverId);
		urlval = $(formObj).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",
			data: formData ,
			contentType: false,
			processData: false,
			success: function (data) {
			//	$('.loading img').hide();
				if (data.length == 0) {
				//	noteError();
				} else  {
					//alert('ok');
					//append to chat
					var newMsg='<div class="direct-chat-msg right">'+              
			  '<div class="direct-chat-info clearfix">'+
			  '<span class="shift-left direct-chat-timestamp"><span>'+data.create_date+' '+data.create_time+'</span></span>'+
			  '<span>'+data.sender_name+' </span>'+
		  '</div>'+
              '<img class="direct-chat-img" src="'+data.sender_image+'" alt="message user image">'+
              '<div class="direct-chat-text">'+data.content+'</div>'+
          '</div>';
		  $('#chat-content').append(newMsg);
		  $('input[name="content"]').val('');
		  lastMsg=data.id;
				}  

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);			 
//alert('error');
			}, finally: function () {		 

			}
		});
	}
	}
 
	
});