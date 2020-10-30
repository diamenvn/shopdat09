
      <div class="row">
        <!-- Left col -->
<div class="col-md-13">
          <!-- MAP & BOX PANE -->

          <!-- /.box -->

          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Danh Sách Tài Khoản</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <div class="container col-md-11">
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-alt " data-toggle="tabs">



<div class="container ">

  <ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#lmht">Danh sách tài khoản</a></li>

  </ul>

  <div class="tab-content col-md-12">
    <div id="lmht" class="tab-pane fade in active">

       <table id="leagueoflegends" class="table no-margin">
                  <thead>
                  <tr>
            <th>Loại</th>

            <th>STT</th>
            <th>Tài khoản</th>
            <th>#ID</th>
            <th>Rank</th>
            <th>Skin</th>
            <th>Champ</th>

            <th>Giá</th>
            <th>Đã Bán</th>
            <th>Trạng thái</th>

            <th>Hành động</th>







                  </tr>
                  </thead>
        <tfoot>
            <tr>
                           <th>Loại</th>

            <th>STT</th>
            <th>Tài khoản</th>
            <th>#ID</th>
            <th>Rank</th>
            <th>Skin</th>
            <th>Champ</th>
            <th>Giá</th>
            <th>Đã Bán</th>
            <th>Trạng thái</th>

            <th>Hành động</th>

            </tr>
        </tfoot>
                  <tbody>
                        <?php foreach($querylmht as $row): ?>
                  <tr>
                    <td><?=$row['loainick']?></td>

                    <td><a href="#"><?=$row['noidung']?></a></td>
                    <td><?=$row['taikhoan']?>/<?=$row['matkhau']?></td>
<td>
                      <a href="/acc-<?=$row['noidung']?>.html" target="_blank"><?=$row['noidung']?></a>
                    </td>
<td><?php if($row['loainick'] == 'LMHT'){ echo get_string_rank($row['rank']); } else { echo get_string_ranklq($row['rank']); }?></td>
<td><span class="text-danger"><?=$row['count_skin']?></span></td>
<td><span class="text-danger"><?=$row['count_champ']?></span></td>


<td><span class="text-danger"><?=number_format($row['gia'])?>  <sup class="text-muted">vnđ</sup></span></td>
<td><strong><span class="text-success"><?php echo get_string_trangthai($row['trangthai']);?></span></strong></td>
<td><strong><span class="text-success"><?php echo get_string_kichhoat($row['kichhoat']);?></span></strong></td>

<td>  <button type="button" name="delete" id="delete" data-tk="<?=$row['noidung']?>" class="btn btn-sm btn-danger btn-flat">Xóa</button> <button type="button" class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target=".phuoc" id="sua" data-tk="<?=$row['noidung']?>">Sửa</button>
</td>

                  </tr>
                                                           <?php endforeach; ?>
                  </tbody>
                </table>
    </div>
    

  </div>
</div>


        </div>
              </div>

              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

        <!-- /.col -->


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
