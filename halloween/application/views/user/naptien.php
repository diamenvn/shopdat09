

<style type="text/css">
	#type-error,#serial-error,#code-error {
        color: #ff502e;
}

</style>

<div id="profile" class="col-md-8">

    <?php if($user_profile == null){ ?>
            <div class="sa-logmain sa-themain">

                <div class="sa-logtct tab-content">
                    <div style="text-algin:center">Vui lòng đăng nhập</div>
                </div>
            </div>
    <? } else {?>


               <h1>Nạp thẻ cào</h1>
              
               

                        <form id="card-charing" novalidate="novalidate">

                           <div class="mess"></div>
                           <div class="form-group">
                                <label class="control-label" for="network">Loại thẻ<span class="text-danger">*</span></label>
                                <select name="type" class="form-control" id="type">
                                  <option value="VTT">Viettel</option>
                                  <option value="VNP">VinaPhone</option>
                                  <option value="VMS">MobiFone</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="amount">Mệnh giá<span class="text-danger">*</span></label>
                                <select name="amount" class="form-control" id="amount">
<!--                                  <option value="10000">10,000 VND</option>
                                  <option value="20000">20,000 VND</option>
                                  <option value="30000">30,000 VND</option>-->
                                  <option value="50000">50,000 VND</option>
                                  <option value="100000">100,000 VND</option>
                                  <option value="200000">200,000 VND</option>
                                  <option value="300000">300,000 VND</option>
                                  <option value="500000">500,000 VND</option>
                                  <option value="1000000">1,000,000 VND</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="serial">Số seri<span class="text-danger">*</span></label>
                                <input type="text" id="serial" name="serial" class="form-control" placeholder="Số seri" value="" required="required" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
                            </div>
                              <div class="form-group">
                                <label class="control-label" for="code">Mã thẻ<span class="text-danger">*</span></label>
                                <input type="text" id="code" name="code" class="form-control" placeholder="Mã thẻ" value="" required="required" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
                            </div>
                     
                             <div class="groupbtn">
                                <button type="submit" class="btn-cs" name="btnsave">Nạp thẻ</button>
                             </div>
                          

                    </form>


 


 

     <? }?>
</div>

   

<script type="text/javascript" src="/assets/lib/jquery-2.1.1.min.js"></script>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    


 <script type="text/javascript">
        $(document).ready(function () {

            $("#card-charing").validate({
                rules: {
                    type: {
                        required: true
                    },
                    amount: {
                        required: true
                    },
                    serial: {
                        required: true,
                        minlength: 6
                    },
                    code: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    type: 'Bạn vui lòng chọn loại thẻ',
                    serial: 'Bạn vui lòng nhập serial của thẻ',
                    code: 'Bạn vui lòng nhập mã thẻ'
                },
                submitHandler: function (e) {

                    if (!$('#card-charing').hasClass('isPosting')) {

                        $('#card-charing').addClass('isPosting');
                        $('#card-charing button[type="submit"]').text('đang nạp thẻ...');

                        $.post('/transaction', $('#card-charing').serialize(), function (res) {
                        var json = $.parseJSON(res);
                            if (json.err == 0) {
                                swal("Thành công!", json.msg, "success");
                            }
                            else {
                            
                                swal("Thất bại!",json.msg , "error");


                            }

                        }).complete(function () {
                            $('#card-charing').removeClass('isPosting');
                            $('#card-charing button[type="submit"]').text('NẠP THẺ');
                        });

                    }

                    return false;
                }
            });

        });
        
        
    </script>

