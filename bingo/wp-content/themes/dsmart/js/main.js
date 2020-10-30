jQuery(document).ready(function($){ 
    //Timeago 
    $('.timeago').timeago(); 

    function addDot(nStr){                      //Add dot to string 
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    };
	$('.scrollbar-inner').scrollbar(); 
    //header mobile
    $('header .menu_mobile').on('click',function(e) {
        e.preventDefault();
        $('header .menu-login').slideToggle();
    });
    // action on modalBuy buy times play    
	$('#modalBuy input[name=number_buy]').on('change',function(){
		var num = parseInt($(this).val());
		$('#modalBuy input[name=total_price]').val(addDot(num*15000));;
	});
    $('#modalBuy .btn-buy').on('click', function(e){
        e.preventDefault();
        qty = parseInt($('#modalBuy input[name="number_buy"]').val());
        $.ajax({
         type:'POST',  
         dataType: 'json',          
         url: "/wp-admin/admin-ajax.php",
         data:{
            'action':'buy_times_play',
             'quantity': qty,
         },
         beforeSend: function() {
            $("#overlay").show();
        },
        success:function(data){ 
            $("#overlay").hide();
            $('#modalBuy').modal('hide');
            $('#modalNotify').modal('show');
            if (data.check == 'error') {
                $('#modalNotify .modal-body').html('<h4>Lỗi khi mua thêm lượt!</h4>');
            }else{
                if (data.check) {                
                    $('#modalNotify .modal-body').html('<h4>Chúc mừng! Bạn đã mua thêm lượt thành công!</h4>');             
                    $('.home-wrap .num-play span').text(data.qty);
                    $('.acc-info .num-play span').text(data.qty);
                    $('.acc-info .get-money span').text(addDot(data.money));
                    $('#modalBuy .get-money span').text(addDot(data.money));
                }else{
                    $('#modalNotify .modal-body').html('<h4>Tài khoản của bạn không đủ! Vui lòng thử lại!</h4>');
                };
            }                    
        }
       }); 
    });
    if($('.profile-detail .input-date').length > 0){
        $('.profile-detail .input-date').datetimepicker({
            format: 'd-m-Y',
            timepicker: false,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: 'bottom-left',
        });
    }
     // update profile
    $("#update_profile").on("submit",function(e){
        e.preventDefault();
        var name = $("input[name=user_name]").val();
        var email = $("input[name=user_email]").val();
        var sex = $("select[name=sex]").val();
        var date = $("input[name=user_date]").val();
        var address = $("input[name=address]").val();
        var phone = $("input[name=user_phone]").val();
        if (phone.length == 10 || phone.length == 11) {
            $.ajax({
                type:'POST',            
                url:"/wp-admin/admin-ajax.php",
                cache: false,
                data:{
                    'action':'update_profile',
                    'name':name,
                    'email':email,
                    'sex':sex,
                    'date':date,
                    'address':address,
                    'phone':phone,              
                },
                beforeSend:function(){
                    $("#overlay").show();
                    $("img.loading").show();
                },
                success:function(data){ 
                    $("#overlay").hide();
                    $("img.loading").hide();

                    $(".check-alert").addClass('alert-success');
                    $(".check-alert").addClass('alert');
                    $(".check-alert").text('Update Information Successful!');
                }
            });
        } else {
            $(".check-alert").addClass('alert-danger');
            $(".check-alert").addClass('alert');
            $(".check-alert").text('Invalid phone number');
        }
        return false;
    });
    //Update Avatar
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#avatar_user .avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file_profile").on('change', function(){
        readURL(this);
        $("#update_ava").trigger("submit");
    });
    $("#update_ava").on("submit",function(e){
        e.preventDefault();
        var link = $('input[name=upload_img_link]').val();
        $.ajax({
            type: 'POST',
            url: link,
            cache: false,
            data: new FormData(this),
            mimeType: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data) {
            }
        });
    })
    $('.btn-avatar').on('click', function(e) {
        e.preventDefault();
        $("#file_profile").trigger('click');
    });
   // !End Account
    var hieu_ung = {
		'el': '#rotate-play',		//Set element
		'stop_point': null,
		'interval_id': null,
		'rotate_count': 4,
		'old_point' : {
			'check' : false,
			'value_old' : null,
			'value_new' : null
		},

		'play': function()
		{
			if (!this.stop_point)
				return;
			if(this.old_point.value_old == null){
				this.old_point.value_old = this.old_point.value_new;
			}
			
			$(this).css('-webkit-transform', 'rotate('+this.old_point.value_old+'deg)');
			$(this).css('-moz-transform', 'rotate('+this.old_point.value_old+'deg)');
			$(this).css('transform', 'rotate('+this.old_point.value_old+'deg)');

			var v_old = this.old_point.value_old;
			var v_stop = this.stop_point;
			var element = this.el;
			var v_this = this;

				$(this.el).animate({  transform: v_stop }, {
				    step: function(now,fx) {
						fx.start = v_old;
						if(now >= v_old){
							$(this).css('-webkit-transform','rotate('+now+'deg)'); 
							$(this).css('-moz-transform','rotate('+now+'deg)');
							$(this).css('transform','rotate('+now+'deg)');
						}
				    },
				    duration: 5000
				}, 'ease-out'//'cubic-bezier(0, 0.58, 0.9, 0.95, 0.96, 0.97, 0.98, 0.985, 0.992, 0.994, 0.996, 0.997, 0.998, 0.999, 1)'
				);
			//},0)
			
		},
		'stop': function ()
		{
			$(this.el).stop();
		},
		'setStopPoint': function(deg)		//params
		{
			if(this.stop_point != null){
				this.old_point.check = true;
			}
			var valueArrPoint = deg;
			//console.log('Giá trị quay : ' + valueArrPoint);
			this.stop_point = this.rotate_count*360 + valueArrPoint;
			//console.log('Giá trị quay thực tế : ' + this.stop_point);
			if(this.old_point.check){
				this.old_point.value_old = this.old_point.value_new;
				this.old_point.value_new = valueArrPoint;
			}else{
				this.old_point.value_old = 0;
				this.old_point.value_new = valueArrPoint;
			}
		}
	};
	$('#start-played').on('click', function(e){
		e.preventDefault();
        $('#p-overlay').addClass('active');
		$.ajax({
		    type: 'POST',
		    dataType: 'json', 
		    url: "/wp-admin/admin-ajax.php",
		    cache: false,
		    data: {
		        'action': 'get_option_awards',		      
		    },
		    beforeSend: function () {
		    },
		    success: function (data) {
                if (data.check) {
                    $('#modalAward .results').html(data.content);
                    setTimeout(function(){
                        hieu_ung.setStopPoint(parseFloat(data.deg));
                        hieu_ung.play();
                        setTimeout(function () {
                            $('#modalAward').modal('show');
                            $('#p-overlay').removeClass('active');  
                            $('.home-wrap .num-play span').text(data.times_play);
                            $('#modalBuy .get-money span').text(addDot(data.money));    
                            $('.item-right .history .table-body table tbody').prepend(data.history);  
                            $('#modalUserHist .table-body table tbody').prepend(data.hist);                 
                        }, 5500);                        
                    },0);                                
                }else{   		
                    $('#modalBuy').modal('show');
                    $('#p-overlay').removeClass('active'); 
                }
            }
		});
	});

    // CARD loaded
    $('#formCard #card-added').on('click', function(e) {
        e.preventDefault();
        var type = $('#formCard select[name=type_card]').val();
        var code = $('#formCard input[name=code_card]').val();
        var serial = $('#formCard input[name=serial_card]').val();
        var amount = $('#formCard select[name=amount_card]').val();
        if (code=='' || serial =='' || amount =='') {
            $('#formCard .notify').html('<p>Vui lòng nhập đầy đủ thông tin!</p>');
        }else{
            $('#formCard .notify').html('');
            $.ajax({
                type: 'POST',
                //dataType: 'json', 
                url: "/wp-admin/admin-ajax.php",
                cache: false,
                data: {
                    'action': 'check_card_added',
                    'type' : type,   
                    'code' : code,
                    'serial' : serial,
                    'amount' : amount,
                },
                 beforeSend:function(){
                    $("#overlay").show();
                    $("img.loading").show();
                },
                success:function(data){ 
                    $("#overlay").hide();
                    $("img.loading").hide(); 
                    $('#formCard .notify').html(data);        
                }
            });
        }
    });
});