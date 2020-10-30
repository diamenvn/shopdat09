<div id="profile" class="col-md-8">

               <h1 class="page_titel">Lịch sử quay thưởng</h1>
              

     
          <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                                    <td>Kiểu</td>
                                    <td>Thông tin</td>
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
<tr >
 <td class="text-primary"><?=$row['loainick']?></td> 
  <td class="text-muted"><?=$row['noidung']?></span>
 </td>
 <td><em class="font-s13 text-muted hidden-xs"><?php $time_agoa = $row['date'];
                                    echo time_stamp($time_agoa); ?></em></td> 
<td><?=$row['name']?></td> 
 </tr>
                                               <?php endforeach; ?>   


<?php } ?>



              
            </tbody>
          </table>
</div> 