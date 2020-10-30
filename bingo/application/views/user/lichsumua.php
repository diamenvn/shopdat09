<div id="profile" class="col-md-8">

                    <h1 class="sa-ls-tit">Lịch sử giao dịch</h1>
                    <div class="sa-ls-table  table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>TK</td>
                                    <td>Thông tin</td>
                                    <td>Giá</td>
                                    <td>Ngày</td>
                                    <td>Tên</td>

                                </tr>
                            </thead>
                            <tbody>
<?php if(count($query) == 0){
    echo '<tr><td colspan="6" class="text-center"><p>Bạn Chưa Có Cuộc Giao Dịch Nào</p></td></tr>';

} else {
    ?>
                                <?php foreach($query as $row): ?>
                                <?php if($row['real'] == 0){ ?>
<tr >
 <td class="text-primary">Mua Tài khoản <?=$row['loainick']?> #<?=$row['idacc']?></td> 
  <td class="text-muted">Tài khoản <?=$row['loainick']?> #<?=$row['idacc']?> là: <span class="label label-success"><?=$row['taikhoan']?></span> Mật khẩu <span class="label label-success text-success"><?=$row['matkhau']?></span>
 </td>
    <td class="font-w600 text-danger">-<?=number_format($row['price'])?> <sup class="text-muted">vnđ</sup></td>
 <td><em class="font-s13 text-muted hidden-xs"><?php $time_agoa = strtotime($row['date']);
                                    echo time_stamp($time_agoa); ?></em></td> 
<td><?=$row['name']?></td> 
 </tr>
            <?php } ?>
                       
                                       <?php endforeach; ?>   


<? } ?>
                           </tbody>
                        </table>
                    </div>
                        <b style="color:red">Yêu cầu bạn đổi mật khẩu , đăng ký bảo mật vào tài khoản ( mail , sdt ...) trường hợp khách ko bảo mật bị mất cấp tài khoản admin không chịu trách nhiệm</b>

                </div>
                            </div>
        </div>
</div>