var lastMsg = 0;
var recieverId = 0;
var interval;
$(function () {

  if ($('.owl-2').length > 0) {
    $('.owl-2').owlCarousel({
      center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: false,
      nav: true,
      dots: true,
      pauseOnHover: false,
      navText: ["<", ">"],
      responsive: {
        600: {
          margin: 10,
          nav: true,
          items: 2
        },
        1000: {
          margin: 10,
          stagePadding: 0,
          nav: true,

          items: 3
        }
      }
    });
  }

  if ($('.owl-success').length > 0) {
    $('.owl-success').owlCarousel({
      center: true,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: false,
      nav: true,
      dots: true,
      pauseOnHover: false,
      singleItem: true,
      navText: ["<", ">"],
      responsive: {
        600: {
          margin: 10,
          nav: true,
          items: 2
        },
        1000: {
          margin: 10,
          stagePadding: 0,
          nav: true,

          items: 2
        }
      }
    });
  }

  //chat
  // Show chat box when button is clicked


  // Hide chat box when collapse button is clicked
  $('.btn-box-tool[data-widget="collapse"]').click(function () {

    $('.direct-chat').slideUp(500);
    clearInterval(interval);
  });
  $('.btn-send-message').click(function () {
    var memName = $(this).attr('data-user-name');
    $('#chatmember-name').html(memName);
   // recieverId = $('input[name="member-num"]').val();
   recieverId = $(this).attr('data-user-id');
    loadmsgs();
    $('.direct-chat').slideDown(500);
    interval = setInterval(loadlastmsgs, 10000);
  });
  // $('.btn-send-message-card').click(function () {
  //   var memName = $(this).attr('data-user-name');
  //   recieverId = $(this).attr('data-user-id');
  //   $('#chatmember-name').html(memName);
  //   loadmsgs();
  //   $('.direct-chat').slideDown(500);
  //   interval = setInterval(loadlastmsgs, 10000);
  // });

  function loadmsgs() {
 
    var senddata = { 'reciver_id': recieverId };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: showmsgsurl,//from sort page              
      type: "GET",
      data: senddata,
      //  contentType: 'application/json',
      success: function (data) {
        $('#chat-content').html('');
        if (data.length > 0) {
          fillchat(data);
        }
      }, error: function (errorresult) {
        var response = $.parseJSON(errorresult.responseText);
        //alert('error');
      },

    });
  };
  function loadlastmsgs() {

    var senddata = { 'reciver_id': recieverId, 'last_id': lastMsg };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: showlasturl,//from sort page              
      type: "GET",
      data: senddata,
      //  contentType: 'application/json',
      success: function (data) {
        // $('#chat-content').html('');
        if (data.length > 0) {
          fillchat(data);
        }

      }, error: function (errorresult) {
        var response = $.parseJSON(errorresult.responseText);
        //alert('error');
      },

    });
  };
  function fillchat(data) {
    var currentId= data[data.length - 1].id;
    lastMsg  
if( currentId>lastMsg){
  lastMsg = currentId;

    $.each(data, function (index, item) {
      var x = item.sender_name;
      if (item.side == 'r') {
        var newMsg = '    <div class="direct-chat-msg right" >' +
          '<div class="direct-chat-info clearfix">' +
          '<span class="shift-left direct-chat-timestamp"><span>' + item.create_date + ' ' + item.create_time + '</span></span>' +
          '<span>' + item.sender_name + ' </span>' +
          '</div>' +
          '<img class="direct-chat-img" src="' + item.sender_image + '" alt="message user image">' +
          '<div class="direct-chat-text">' + item.content + '</div>' +
          '</div>';
        $('#chat-content').append(newMsg);
      } else {
        var newMsg = '<div class="direct-chat-msg">' +
          '<div class="direct-chat-info clearfix">' +
          '<span class="shift-left">' + item.sender_name + ' </span>' +
          '<span class="direct-chat-timestamp"><span>' + item.create_date + ' ' + item.create_time + '</span></span>' +
          '</div>' +
          '<img class="direct-chat-img" src="' + item.sender_image + '" alt="message user image">' +
          '<div class="direct-chat-text">' + item.content + '</div></div>';
        $('#chat-content').append(newMsg);
      }

    });

  }
  }
  $('.not-register').click(function () {
swal('يرجى الاشتراك لاكمال العملية');
  });
  
  /*
     function fillchat(data){	
      $('#chat-content').html('');
      $.each(data,function(index,item) {
  var x=item.sender_name;
  if(item.side=='r'){
    var newMsg='    <div class="direct-chat-msg right" >'+
                '<div class="direct-chat-info clearfix" >'+
                    '<span class="direct-chat-name pull-right">'+item.sender_name+' </span>'+
                    '<span class="direct-chat-timestamp pull-left">'+item.create_date+' '+item.create_time+'</span>'+
                '</div>'+
                '<img class="direct-chat-img" src="'+item.sender_image+'" alt="message user image">'+
                '<div class="direct-chat-text">'+item.content+'</div>'+
            '</div>';
        $('#chat-content').append(newMsg);
  }else{  
    var newMsg='<div class="direct-chat-msg">'+
    '<div class="direct-chat-info clearfix">'+
        '<span class="direct-chat-name pull-left">'+item.sender_name+' </span>'+
        '<span class="direct-chat-timestamp pull-right">'+item.create_date+' '+item.create_time+'</span></div>'+
    '<img class="direct-chat-img" src="'+item.sender_image+'" alt="message user image">'+
    '<div class="direct-chat-text">'+item.content+'</div></div>';
    $('#chat-content').append(newMsg);
  
  }
  
      });
     }
     */

});