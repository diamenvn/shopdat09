<div id="profile" class="col-md-8">
			




        <div class="heading">
<h2>Thông tin tài khoản</h2>
</div>
<table class="table table-striped">
                <tbody><tr>
                    <th scope="row">UID của bạn:</th>
                    <th><span class="c-font-uppercase" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đây là ID tài khoản của bạn không phải mã giới thiệu"><?=$user_profile['fb']?></span></th>
                </tr>
                <tr>
                    <th scope="row">Tên tài khoản:</th>
                    <th><?=$user_profile['name']?></th>
                </tr>
                <tr>
                    <th scope="row">Số dư tài khoản:</th>
                    <td><b class="text-danger"><?=number_format($user_profile['money'])?>đ</b></td>
                </tr>


                <tr>
                    <th scope="row">Nhóm tài khoản:</th>
                    <td>Thành viên</td>
                </tr>

                <tr>
                    <th scope="row">Ngày tham gia:</th>
                    <td><?=date('d-m-Y h:i:s',$user_profile['add_time'])?></td>
                </tr>
            </tbody></table>
            
            
           
</div>


