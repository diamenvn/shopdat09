

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright © 2016 <a href="http://facebook.com/phamhien15">Phước Võ Văn</a>.</strong> All rights
    reserved.
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng Nick</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
                          <form role="form" id="add-random" data-id="" enctype="multipart/form-data">
                <input type="hidden" id="random" value="">

                  <div class="block-content remove-padding-b">
                <textarea class="form-control" rows="6" placeholder="List acc abc|acb"  name="text" id="text"></textarea>

                  </div>
                  </div>
                <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="insert-r" id="insert-r" data-id="" value="Đăng Nick" class="btn btn-primary" />

                        </form>

              </div> 

    </div>
  </div>
</div>



<div class="modal fade thongbao" id="thongbao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <!-- Phuoc Van -->
<div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Thông báo</h4>
              </div>
              <div class="modal-body">
                          <form role="form1" id="add-thongbao" data-id="thongbao" enctype="multipart/form-data">

                  <div class="block-content remove-padding-b">
                <textarea class="form-control" rows="6" placeholder="Thông báo ở đây" name="thongbao" id="thongbao"><?php
              $handle = fopen($_SERVER['DOCUMENT_ROOT']."/thongbao.xt", "r");
                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                      echo trim($line);
                    }

                    fclose($handle);
                } else {
                    // error opening the file.
                } 


                ?></textarea>

                  </div>
                  </div>
                                  <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="insert-t" id="insert-t" data-id="" value="Post" class="btn btn-primary" />

                        </form>

              </div> 
                </div>

                </div>
                </div>
                </div>




<div class="modal fade phuoc" id="phuoc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <!-- Phuoc Van -->
<div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Thông tin tài khoản</h4>
              </div>
              <div class="modal-body">
<div class="block-content remove-padding-b">


                                  <div class="form-group col-md-6">

       <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="/admin/upanh">
        <input type="hidden" name="image_form_submit" value="1">
            <label>Ảnh Acc</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple="">

    </form>
    </div>
                              <div class="form-group col-md-6">
            <form method="post" id="uploadForm" name="uploadForm" enctype="multipart/form-data" action="/admin/upload">

                        <label>File Json</label>
                        <input name="phuoc" id="phuocvovan" type="file" class="form-control">


            </form>

              </div>
        <form role="form" id="add-account" data-id="" enctype="multipart/form-data">
          <div class="row">

<div class="col-md-12">
      <div class="form-group">
                 
          <div class="input-group">
              <div class="input-group-addon">
                  Game
              </div>
  <select class="form-control" name="loainick" id="loainick">


                  <option value="LMHT">
                      Liên Minh Huyền Thoại
                  </option>
                  <option value="LQ">
                      Liên Quân
                  </option>
                  <option value="FIFA">
                      FIFA
                  </option>
              </select>
          </div>
      </div>
  </div>


<div class="col-md-4" id="rank_d">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                Rank
            </div>
            <select class="form-control" id="rank" name="rank">
                <?php
for ($i = 0; $i < 29; $i++){
    echo '<option value="'.$i.'">'.get_string_rank($i).'</option>';
}
?>
            </select>
        </div>
    </div>
</div>


<div class="col-md-12" id="LM-LQ">

              <div class="form-group col-md-4">
                <input class="form-control" placeholder="Số lượng Tướng" name="slchamp" value="">
              </div>
              <div class="form-group col-md-4">
                  <input class="form-control" placeholder="Số lượng Skin"  name="slskin" value="">
              </div>
                            <div class="form-group col-md-4">
                  <input class="form-control" placeholder="Số lượng Bảng ngọc"  name="count_bangngoc" value="">
              </div>
            </div>
</div>
<div id="LMHT">

<div class="col-md-4" id="rankdong">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                Rank động
            </div>
            <select class="form-control" id="rankdong" name="rankdong">
            </select>
        </div>
    </div>
</div>

<div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">


              <div class="input-group-addon">
                  Khung
              </div>
<select class="form-control" name="khung" id="khung">

<?php
for ($i = 0; $i < 7; $i++){
    echo '<option value="'.$i.'">'.get_string_khung($i).'</option>';
}
?>

</select>

                  </div>
                </div>
              </div> 

            <div class="col-md-12">


              <div class="form-group col-md-6">
                <textarea class="form-control" rows="2" placeholder="Code Tướng"  name="champ" id="codechamp"></textarea>
              </div>
              <div class="form-group col-md-6">
                <textarea class="form-control" rows="2" placeholder="Code Skin"  name="skin" id="codeskin"></textarea>
              </div>
              <div class="form-group col-md-6">
                <textarea class="form-control" rows="2" placeholder="Code thông thạo"  name="thongthao" id="thongthao"></textarea>
              </div>


            </div>

                       </div>


                       </div>

                    <div class="row">
                        <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Giá" value="" name="price" type="number" autofocus="">
                <button type="button" class="btn btn-sm btn-success" name="getgia" id="getgia">Tính Giá</button>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label></label>
                <input class="form-control" placeholder="Khuyến mãi" value="" name="promo" type="number" autofocus="">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Thông tin đăng nhập</label>
                <input class="form-control" placeholder="id:password" value="" id="idpassword" name="idpassword" type="text" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-12">
<div class="form-group">
                <label>Thông tin</label>
                <textarea class="form-control" rows="2" name="description"></textarea>
              </div>
              <div class="form-group">
                <label>Desc</label>
                <textarea class="form-control" rows="1" name="desc"></textarea>
              </div>
              <div class="form-group">
                <label>Key</label>
                <textarea class="form-control" rows="1" name="key"></textarea>
              </div>
              <div class="form-group">
                <label>Hình ảnh</label>
                <textarea class="form-control" rows="2" name="imgs"></textarea>
              </div>
            </div>
          </div>






          <div class="row">
            <div class="col-md-6">
              <div class="form-group remove-margin-b">
                <label class="css-input switch switch-sm switch-primary">
                  <input type="checkbox" id="active" name="active"><span></span> Kích hoạt?
                </label>
              </div>
              
            </div>
            
             <div class="col-md-6">
                <div id="link"></div>
              
            </div>
            

          </div>
        </form>
      </div>


              </div>
              <div class="modal-footer">
                <input type="hidden" name="taikhoan" value="">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="insert" id="insert" data-id="" value="Lưu" class="btn btn-primary" />

                        </form>

              </div>
            </div>
  </div>



</div>




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="../assets/js/jquery.form.js"></script>
<script src="../assets/js/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/slick/slick.min.js">
</script>
<script src="../assets/js/jquery.appear.min.js">
</script>
<script src="../assets/js/jquery.countTo.min.js">
</script>
<script src="../assets/js/jquery.showHideItem.js">
</script>
<script src="../assets/js/core.js">
</script>
<script src="https://mobashop.vn/assets/app.js">
</script>
<script type="text/javascript">
$(document).ready(function (e) {

        $('#phuocvovan').on('change',function(){

        $('#uploadForm').ajaxForm({

            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
                var json = $.parseJSON(e);


                $( "textarea[name='champ']" ).val(json.tuong);
                $( "textarea[name='skin']" ).val(json.skin);
                $( "input[name='slchamp']" ).val(json.ctuong);
                $( "input[name='slskin']" ).val(json.cskin);



            },
            error:function(e){
            }
        }).submit();
    });


});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable( {
      "order": [[ 1, "desc" ]],
    "paging": true,
     "searching":     true
    ,"lengthChange" : false
    ,"info" : true
    } );

  

$('tfoot th').each( function () {
        var title = $(this).text();

        if (title === "Hành động" || title === "Chỉnh Sửa") {
			$(this).html( '' );

        } else if(title === "Ngày"){
        $(this).html( '<input type="text" placeholder="Tìm '+title+'" id="buttonPicker"/>' );

		$("#buttonPicker").datepick({dateFormat: 'yyyy-mm-dd'});


    	} else {
    		        $(this).html( '<input type="text" size="1" placeholder="'+title+'" />' );

    	}
    } );

 
    // DataTable
    var table = $('#leagueoflegends').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('#vl').DataTable().columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


} );
</script>
<script type="text/javascript">

// Phuoc vo van -- fb.me/gietmxh
$(document).ready(function(){ 

$(document).on('click', 'input[name="insert-t"]',function (){
                    $.ajax({
                         url:"../admin/add_thongbao",
                         method:"POST",

                         data: $("#add-thongbao").serialize(),

                         beforeSend:function(){
                              $('#insert-t').val("đang lưu....");
                         },
                         success:function(data){
                               var json = $.parseJSON(data);


                              console.log(json);
                              if (json.err == 0) {
                                                               jQuery('#thongbao').modal('hide');


                                swal("OK!", json.data, "success")

                              } else {
                                swal("Opps!", json.data, "error")
                              }



                         }
                    });

});



$(document).on('click', '#getgia',function (e){
      e.preventDefault();
  var rank = $("select[name='rank'] option:selected").attr('value');
  var khung = $("select[name='khung'] option:selected").attr('value');
  var bac = $("select[name='bac'] option:selected").attr('value');

    $.ajax({type: "POST",
            url: "/admin/tinhtien",
            data: { rank: rank,
            champ: $( "input[name='slchamp']" ).val(),
            skin: $( "input[name='slskin']" ).val(),
            skin_code: $( "textarea[name='skin']" ).val(),
            thongthao: $( "textarea[name='thongthao']" ).val(),

            khung : khung,
            bac : bac

           },
      success:function(result){
        $( "input[name='price']" ).val(result);

    }});
  });




$(document).on('click', '#sua',function (e){
      e.preventDefault();

      var $target = $(e.target),
           userid = $target.data('tk');
 var ranklm = ["K.Rank","Chưa xác định","Đồng V","Đồng IV","Đồng III","Đồng II","Đồng I","Bạc V","Bạc IV","Bạc III","Bạc II","Bạc I","Vàng V","Vàng IV","Vàng III","Vàng II","Vàng I","Bạch Kim V","Bạch Kim IV","Bạch Kim III","Bạch Kim II","Bạch Kim I","Kim Cương V","Kim Cương IV","Kim Cương III","Kim Cương II","Kim Cương I","Cao Thủ","Thách Đấu"];
          var ranklq = ["K.Rank","Đồng","Bạc","Vàng","B.Kim","K.Cương","C.Thủ","T.Đấu"];
          if(userid == 0){ 
            $('#add-account')[0].reset();
            console.log(userid);
            $(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

		    $('#loainick').change(function(){
		        $('#LMHT').hide();
		         if($(this).val() == 'FIFA'){
		              $("#LMHT").hide();
		              $("#rank_d").hide();
		              $("#LM-LQ").hide();
          		} else {
          		    	$('#rank option').each(function() {
                                 $(this).remove();
                        });
          		   if($(this).val() == 'LMHT'){

          		    
  
                        for (i = 0; i < ranklm.length; i++) {
                          var content='<option value="' + i + '">' + ranklm[i] + '</option>';
                          $("#rank").append(content);
                        }
          		    } else {
          		        for (i = 0; i < ranklq.length; i++) {
                          var content='<option value="' + i + '">' + ranklq[i] + '</option>';
                          $("#rank").append(content);
                        }
          		        
          		    }
            
            
          			 $("#LM-LQ").show();
		              $("#rank_d").show();

          		}
		        $('#' + $(this).val()).show();
		    });

		});


          } else {
           $.get("../admin/json/"+ userid +"", function( data ) {
          
          var json = $.parseJSON(data);
          var data = json[0];
          $('#loainick option[value="'+data.loainick+'"]').attr('selected', 'selected');
          var loainick = $('#loainick').find(":selected").val();
         
          console.log(data.loainick);
          if(data.loainick == 'LQ'){
            $("#LMHT").hide();
            $('#rank option').each(function() {
                     $(this).remove();
            });
            for (i = 0; i < ranklq.length; i++) {
              var content='<option value="' + i + '">' + ranklq[i] + '</option>';
              $("#rank").append(content);
            }


          } else if(data.loainick == 'FIFA'){
              $("#LMHT").hide();
              $("#rank_d").hide();
              $("#LM-LQ").hide();

          } else if(data.loainick == 'LMHT'){
              $("#LMHT").show();
            $('#rank option').each(function() {
                     $(this).remove();
            });
            for (i = 0; i < ranklm.length; i++) {
              var content='<option value="' + i + '">' + ranklm[i] + '</option>';
              $("#rank").append(content);
            }
              $("#rank_d").show();
          }

          $('#rank option[value="'+data.rank+'"]').attr('selected', 'selected');
          $("input[name='idpassword']").val(data.taikhoan + '/' + data.matkhau);
          $("textarea[name='champ']").val(data.champs);
          $("textarea[name='skin']").val(data.skins);
          $("textarea[name='imgs']").val(data.hinhanh);
          $("textarea[name='desc']").val(data.desc);
          $("textarea[name='key']").val(data.key);
          $("textarea[name='thongthao']").val(data.thongthao);


          $("input[name='count_bangngoc']").val(data.count_bangngoc);
          $('#rankdong option[value="'+data.rankdong+'"]').attr('selected', 'selected');

          $("input[name='price']").val(data.gia);
          $("input[name='id']").val(data.noidung);
          $("input[name='price']").val(data.gia);
          $("input[name='slchamp']").val(data.count_champ);
          $("input[name='slskin']").val(data.count_skin);

        $("#link").html('<a href="/acc-'+ data.noidung +'.html">Xem tài khoản</a>');

          $("textarea[name='description']").val(data.thongtin);
          $('#khung option[value="'+data.khung+'"]').attr('selected', 'selected');
          if(data.kichhoat == 'yes'){
            $('#active').prop('checked', true);
          } else {
            $('#active').prop('false', true);

          }

          });
}

          $("#insert").attr({
           "data-id" : userid
          });


});

$(document).on('click', '#delete',function (e){
      e.preventDefault();
      var $target = $(e.target),
           userid = $target.data('tk');
    $.ajax({type: "POST",
    url: "../admin/delacc/"+ userid +"",
    data: {
      id : userid


        },
      success:function(result){
        var json = $.parseJSON(result);

       if (json.err == 0) {
        $.alert(json.msg);

       } else {
        $.alert(json.msg);

       }

      setTimeout(function(){ window.location.href = "/admin/" }, 2000);

    }});
  });


    $('#codeskin').on('change',function(){



        var abc = $( "textarea[name='skin']" ).val();

        var array = abc.split('|');
        
        
        $( "input[name='slskin']" ).val(array.length);

    });
    $('#codechamp').on('change',function(){



        var abc = $( "textarea[name='champ']" ).val();

        var array = abc.split('|');
        
        
        $( "input[name='slchamp']" ).val(array.length);

    });
    
    
    

    $('#images').on('change',function(){

        $('#multiple_upload_form').ajaxForm({

            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
                var json = $.parseJSON(e);
                var noidung = '';
                var dem = 0;

                    $.each(JSON.parse(e), function (i,data) {
                        dem++;

                    noidung += "" + data + "";
                    if(json.length != dem){
                        noidung += "|";
                    }

                    });
                $( "textarea[name='imgs']" ).val(noidung);


            },
            error:function(e){
            }
        }).submit();
    });
});
</script>




 <script>
 $(document).ready(function(){







$('#my-modal').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
  $(this).find("#random").val(myVal);
});



$(document).on('click', 'input[name="insert-r"]',function (e){
                    e.preventDefault();
                    $.ajax({
                         url:"../admin/add_random",
                         method:"POST",

                         data: $("#add-random").serialize()+'&loai='+$("#random").val(),

                         beforeSend:function(){
                              $('#insert-r').val("đang lưu....");
                         },
                         success:function(data){
                               var json = $.parseJSON(data);


                              console.log(json);
                              if (json.err == 0) {
                                   jQuery('#my-modal').modal('hide');

                                   setTimeout(function(){ window.location.href = "/admin/" }, 2000);

                                swal("OK!", json.data, "success")

                              } else {
                                swal("Opps!", json.data, "error")
                              }



                         }
                    });

});



$(document).on('click', 'input[name="insert"]',function (){
              
                    var userid = $(this).attr("data-id");
                    $.ajax({
                         url:"../admin/addacc",
                         method:"POST",

                         data: $("#add-account").serialize() + "&userid="+userid+"",

                         beforeSend:function(){
                              $('#insert').val("đang lưu....");
                         },
                         success:function(data){
                               var json = $.parseJSON(data);


                              console.log(json);
                              if (json.err == 0) {
                                                               jQuery('#phuoc').modal('hide');

                                                              setTimeout(function(){ window.location.href = "/admin/" }, 2000);

                                swal("OK!", json.msg, "success")

                              } else {
                                swal("Opps!", json.msg, "error")
                              }



                         }
                    });
            })



/*       $('#insert_form').on("submit", function(event){

           event.preventDefault();
                $.ajax({
                     url:"../admin/editacc/",
                     method:"POST",
                     data: {
                        gia: $("input[name='price']").val()
                      },
                     beforeSend:function(){
                          $('#insert').val("đang lưu....");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#employee_table').html(data);

                     }
                });
      });  */

 });
 </script>
</body></html>
