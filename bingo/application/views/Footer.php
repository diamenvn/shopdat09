
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5 item">
                <section id="text-2" class="widget about-us-wg">            <div class="textwidget"><p style="font-size: 14px;"><span class="name-com">Về chúng tôi</span><br>

</div>
        </section>
        <i class="fa fa-facebook" style="color: black; font-size:16px;"></i> <a href="<?=get_value('facebook')?>">Facebook</a>
            </div>
        <div class="col-md-3 statistic item">
          <h3>HƯỚNG DẪN CÁCH QUAY</h3>
<h3><span style="color: #FF1493"><br><span style="color: #FF1493">Quay 1 Phát Với x1 Chỉ Tốn 20k<br>Quay 1 Phát Với x3 Chỉ Tốn 50k(Giá Gốc 60k)<br>Quay 1 Phát Với x7 Chỉ Tốn 100k(Giá Gốc 140k)<br>Quay 1 Phát Với x10 Chỉ Tốn 150k(Giá Gốc 200k)</span><br><br><span style="color: #8A2BE2">Luật Trúng Thưởng:</span>Chỉ Cần Quay Trúng 3 Ô Giống Nhau Là Trúng Và Được Nhân Lên Với Số Lượt Mà Bạn Chọn Quay(x1-x3-x7-x10).<br><br><span style="color: #8A2BE2">Ví Dụ:</span> Nếu Bạn Chọn Quay x3 Giá 50k/1Lần Quay Và Quay Được 3 Ô 5000KC Giống Nhau Thì Bạn Sẽ Được x3 Lên Là 15.000KC...<br>Nếu Bạn Chọn Quay x7 Giá 120k/1Lần Quay Và Quay Được 3 Ô 9999KC Giống Nhau Thì Bạn Sẽ Được x7 Lên Là 69.993KC...<br><br><span style="color: #8A2BE2">Lưu Ý:</span> Nếu Bạn Quay K Trúng Được 3 Ô Giống Nhau Trở Lên Thì Sẽ Nhận Được Kim Cương An Ủi Ngẫu Nhiên 99KC Đến 999KC Từ Shop Để Khuyến Khích AE Quay Lại Lần Sau Nhé(Với Tiêu Chí Trúng 100% Nên Dù K Trúng Lớn Thì Cũng Trúng Nhỏ Để Nâng Cao Sự Uy Tín Của Shop Tới AE Ạ) <br><br><span style="color: #8A2BE2">Quay Ngay Để Trúng Các Phần Quà Hấp Dẫn Từ BQT<br>CHÚC CÁC BẠN MAY MẮN</span></h3>
        </div>
            <div class="col-md-4 item"><h3 style="margin-top:0;font-size:20px;line-height: 28px;font-family:RobotoBold;">An Toàn-Chất Lượng</h3><a href="/" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w250-5x1-09.png?ID=4b2ef2c4-ce22-482a-884e-2b8cd8c7ce4b"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></div>
        </div>
    </div>
  </footer>
  <div id="p-overlay"></div>
  <div id="overlay"><img src="/wp-content/themes/dsmart/images/loading.gif" class="loading"></div>
  <div class="modal fade modal-cs" id="modalNotify" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Thông Báo</h3>
          <button class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-cs" id="modalBuy" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Mua Thêm Lượt Quay</h3>
          <button class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="content"><p>Mua Thêm Lượt Quay Giá <?=number_format(get_value('price'))?> đ/Lượt</p>
</div>
          <p class="get-money">Tài Khoản Hiện Có: <span><?=number_format($user_profile['money'])?></span> đ</p>
            <div class="form-group">
              <label>
                <span>Mua thêm</span>
                <input type="number" class="form-control form-cs" name="number_buy" placeholder="1" min="1" oninput="validity.valid||(value='');" value='1'>
                <span>Lượt Quay </span>
              </label>
              <label>
                <span>Với Giá</span>
                <input type="text" name="total_price" class="form-cs form-control" placeholder="<?=number_format(get_value('price'))?>">
              </label>
            </div>
            <div class="text-center">
              <a href="#" style="background-image: url(/wp-content/uploads/2018/11/button.png )" class="ani-zoom btn-img btn-buy">Mua Lượt</a>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/scripts.js'></script>
<script type='text/javascript' src='/wp-content/themes/dsmart/js/bootstrap.min.js'></script>
<script type='text/javascript' src='/wp-content/themes/dsmart/js/jquery.scrollbar.js'></script>
<script type='text/javascript' src='/assets/main.js'></script>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script type="text/javascript">
function RSA(plaintext) {
    var before = new Date();
    var rsa = new RSAKey();
    var n = 'D1EC51E7CEA07CB3233ADA6009006EF3EBF89EFD5CF77AAD211051D008077DC7142872B8C36EE971D4B368C79C13A6BBCB89B551A8308C68F71764C1519DEAD90B560E126B365375700CC5A2E6CF81E2A0FEEA31B53C1F8D3F3AE522DF9AB19B5C0C391D997D6DE56807328B9BBD5F6D08EA47614060177E12F65BDB95D5D6E3';
    var e = '10001';
    rsa.setPublic(n, e);
    var currentTime = new Date()
    var timestamp = currentTime.getTime();
    var plain_dict = new Object();
    plain_dict['timestamp'] = parseInt(timestamp / 1000, 10);
    plain_dict['password'] = plaintext;
    var res = rsa.encrypt(JSON.stringify(plain_dict));
    return res;
}


jQuery(document).ready(function($){


        $(document).on('click', '#button_mua',function (){
          var acc = $(this).attr('data-id');
          var price = $(this).attr('data-price');
          var giagiam = Number(price) - Number(price) / 10;

        swal({
                title: "Mua Tài khoản số #" + acc,
                text: "Bạn có chắc chắn mua tài khoản này ?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function() {
                $.get('/getacc/buy/' + acc, function(data) {
                    if (data.status == 0) {
                     swal({
                        title: "Vui lòng đợi",
                        text: "Hệ thống đang kiểm tra tài khoản. Vui lòng không tắt trình duyệt",
                        type: "warning",
                        showConfirmButton:false,

                     });
                        $.post('/getacc/check_login', {
                            id: acc,
                            decode: data.encode,
                            rsapass: RSA(data.pass)
                        }, function(res) {
                            $.post('/getacc/update_acc/' + acc, {
                                error: res.err
                            }, function(data1) {

                                if(data1.err == 1){
                                     swal({
                                        title: 'Có lỗi xảy ra',
                                        type: 'error',
                                        text: "Vui lòng liên hệ admin"
                                    });

                                } else if(data1.err == 0) {
                                                 swal({
                                             title: 'Giao dịch hoàn tất',
                                                                type: 'success',
                                                                text: "GD của Bạn Đã Thành công kích vào đây để vào trang quản lý tài khoản đã mua"
                                                 }, function() {
                                        window.location = "/lich-su-mua.html";
                                    });


                                }

                            }, 'json');

                        }, 'json');




                    } else {
                        swal({
                            title: 'Có lỗi xảy ra',
                            type: 'error',
                            text: data.msg
                        }, function() {
                            window.location.reload();
                        });
                    }
                }, 'json');
            });

        });




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
      	$('#modalBuy input[name=number_buy]').on('change',function(){
    		var num = parseInt($(this).val());
    		$('#modalBuy input[name=total_price]').val(addDot(num*<?=get_value('price')?>));;
    	});
        //Referances
        //jQuery Cookie : https://github.com/carhartl/jquery-cookie
        //Modal : http://getbootstrap.com/javascript/#modals
        var my_cookie = $.cookie('phuoc');
        if (my_cookie == "true") {

        }
        else{
           swal({
                            title: "Thông báo",
                            text: "<?php
                                  $handle = fopen($_SERVER['DOCUMENT_ROOT']."/thongbao.xt", "r");
                                    if ($handle) {
                                        while (($line = fgets($handle)) !== false) {
                                          echo trim($line);
                                        }

                                        fclose($handle);
                                    } else {
                                        // error opening the file.
                                    }


                        ?>",
                            showConfirmButton:true

                         }, function() {
                                         $.cookie('phuoc','true', {
                    path: '/',
                    expires: 1
                });

             });
        }

});







</script>
</body>
</html>
