var clientId ="";
var isSpecial=-1;
$(document).ready(function () {
    $(document).on('click', '.addspecial-btn', function(e) { 
		 var btnId = $(this).attr("id");
		 btnId=btnId.replace('addspecial-','');
		 clientId=btnId;
		 isSpecial=1;
		//	alert(delId);
		});

		$(document).on('click', '.delspecial-btn', function(e) { 
			var btnId = $(this).attr("id");
		  btnId=btnId.replace('delspecial-','');			 
			clientId=btnId;
			isSpecial=0;
	   
		   //	alert(delId);
		   });
		$('.btn-modal-updatespecial').on('click', function ( e) { 
			updatespecial();	 
			 $(".btn-cancel-modal").trigger("click");	
	 });
	 function updatespecial(){		 
 
		var data= {'id': clientId ,'is_special':isSpecial}  ;
	 
		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
 
		
		$.ajax({
		   
		  url: urlspec,//from sort page              
		  type: "POST",
		  data: data,
		//  contentType: 'application/json',
			success: function(result){
				swal( "تم الحفظ بنجاح");
				if(isSpecial==1){
					var tdcont='<i class="fas fa-check"></i> '+
                    '<button type="button" id="delspecial-'+clientId+'" class="btn btn-warning btn-sm delspecial-btn"  data-toggle="modal" data-target="#modal-delspecial"   title="ازالة من المميزين">   <i class="fas fa-star">'
                    +'</i>ازالة من المميزين</button>';
					   $('#addspecial-'+clientId ).parents("td").html(tdcont);
					//  $(document.getElementById('addspecial-'+clientId)).parents("td").html(tdcont);
					 
				}else{
					var tdcont='<button type="button" id="addspecial-'+clientId+'" class="btn btn-primary btn-sm addspecial-btn"  data-toggle="modal" data-target="#modal-addspecial"   title="اضافة الى المميزين">   <i class="fas fa-star">'+
                    '</i>اضافة الى المميزين</button>';
					 $('#delspecial-'+clientId ).parents("td").html(tdcont);
				//	$(document.getElementById('delspecial-'+clientId)).parents("td").html(tdcont);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				//endLoading();
				swal( "لم يتم الحفظ ");
			  
			}
		
		});
		 };
	 
	});


 