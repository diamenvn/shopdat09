<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="profile" class="col-md-8">

               <h1 class="page_titel">Rút Kim Cương</h1>



               <form class="form-horizontal form-withdraw" onsubmit="return false;" style="margin-top: 30px" id="card-charing" novalidate="novalidate">
                 <div class="text-center">
                    <center>
                        <h2 class="c-font-22 c-font-red">Số Kim Cương Hiện Có: <b> <?=$point; ?> </b></h2>
                    </center>

                </div>
                         <div class="form-group">
                             <input name="type" value="1" type="hidden">
                             <label class="col-md-3 control-label">Gói Muốn Rút:</label>
                             <div class="col-md-6">
                                 <div class="input-group c-square" style="width: 100%">
                                     <select style="width: 100%" class="form-control  c-square c-theme" name="kc" id="kc">
                                         <option value="">Chọn Gói Kim Cương Muốn Rút</option>

                                                                             <option value="2">111 Kim Cương</option>
                                                                             <option value="3">280 Kim Cương</option>
                                                                             <option value="4">580 Kim Cương </option>
                                                                             <option value="5">1190 Kim Cương</option>
                                                                             <option value="6">3050 Kim Cương</option>


                                     </select>
                                     <span class="input-group-btn">
                                 </span>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-md-3 control-label">Số ID Trong Game:</label>
                             <div class="col-md-6">
                                 <div class="input-group c-square" style="width: 100%">
                                     <input type="text" name="id" style="width: 100%" class="form-control">

                                 </div>
                             </div>
                         </div>

                         <div class="block-load-info">

                         </div>
                         <div class="form-group c-margin-t-40">
                             <div class="col-md-offset-3 col-md-6">
                                 <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block btn-click-js">Thực hiện</button>
                                 <script>
                                     $(".form-withdraw").submit(function(){
                                         $('#btn-confirm').button('loading');
                                     });
                                 </script>
                             </div>
                         </div>
                     </form>
</div>

<style media="screen">
.c-font-red {
  color: #FF1493 !important;
}
.c-font-22 {
  font-size: 22px;
}
</style>

<script type="text/javascript">
  $(function() {
    $('.btn-click-js').click(function() {
      val = $('input[name="id"]').val();
      if (val == "") {
        alert("Vui lòng nhập ID trong game của bạn");
        return;
      }

      alert("Bạn không đủ kim cương để rút");

    });
  })
</script>
