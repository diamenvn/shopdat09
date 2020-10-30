
<div id="profile" class="col-md-8">

         <h1 class="page_titel">Lịch sử nạp tiền</h1>
              




          <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="50">Loại</th>  
                <th width="150">Thẻ</th>
                <th class="hdate" width="150">Mệnh giá</th>
                <th class="hdate" width="150">Ngày đổi thẻ</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
                
                                    <?php if(count($querynap) == 0){
            echo '<tr><td colspan="6" class="text-center"><p>Bạn Chưa Có Cuộc Giao Dịch Nào</p></td></tr>';

        } else {
            ?>
                                        <?php foreach($querynap as $row): ?>
                                        <tr class=""> <td class="text-primary"><?=$row['loaithe']?></td>
                                        <td class="text-muted"><?php if($row['loaithe'] == 'REF'){
                                            echo $row['refuser'];
                                            } else {echo 'Mã seri: '.$row['serial'].', Mã thẻ: '.$row['mathe'].''; }?></td> 
                                        <td class="font-w600 text-danger"><?=number_format($row['menhgia'])?> <sup class="text-muted">vnđ</sup></td> 
                                        <td><em class="font-s13 text-muted hidden-xs"><?php $time_ago = strtotime($row['date']);
                                            echo time_stamp($time_ago); ?></em></td>
                                            
                                            <td width="150"><div class="status"><?=status($row['status'])?></div></td>
                                            
                                            
                                            </tr>
                                        
                                           
                                               <?php endforeach; ?>   


        <? } ?>



              
            </tbody>
          </table>

</div>