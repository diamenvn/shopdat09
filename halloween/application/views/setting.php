<div class="row">
        <!-- Left col -->
    <div class="col-md-13">
          <!-- MAP & BOX PANE -->

          <!-- /.box -->

          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cấu hình website</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <div class="container col-md-11">
                  <form action="/admin/setting" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ 999 kim cương</label>
                    <input type="number" class="form-control" name="quay_1" value="<?=get_value('quay_1')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ kim cương ngẫu nhiên</label>
                    <input type="number" class="form-control" name="quay_2" value="<?=get_value('quay_2')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ thêm lượt quay</label>
                    <input type="number" class="form-control" name="quay_3" value="<?=get_value('quay_3')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ +99 kim cương</label>
                    <input type="number" class="form-control" name="quay_4" value="<?=get_value('quay_4')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ nick GAS</label>
                    <input type="number" class="form-control" name="quay_5" value="<?=get_value('quay_5')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ cộng tiền</label>
                    <input type="number" class="form-control" name="quay_6" value="<?=get_value('quay_6')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ nick FF VIP</label>
                    <input type="number" class="form-control" name="quay_7" value="<?=get_value('quay_7')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tỉ lệ Chúc bạn may mắn</label>
                    <input type="number" class="form-control" name="quay_8" value="<?=get_value('quay_8')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá / Lần Quay</label>
                    <input type="number" class="form-control" name="price" value="<?=get_value('price')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Uy Tín</label>
                    <textarea class="form-control" name="uytin"><?=get_value('uytin')?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Footer</label>
                    <textarea class="form-control" name="footer"><?=get_value('footer')?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">SƠ CẤP</label>
                    <textarea class="form-control" name="SOCAP"><?=get_value('SOCAP')?></textarea>
                  </div>
                                    <div class="form-group">
                    <label for="exampleInputEmail1">TRUNG CẤP</label>
                    <textarea class="form-control" name="TRUNGCAP"><?=get_value('TRUNGCAP')?></textarea>
                  </div>
                                    <div class="form-group">
                    <label for="exampleInputEmail1">CAOCAP</label>
                    <textarea class="form-control" name="CAOCAP"><?=get_value('CAOCAP')?></textarea>
                  </div>
                  
                                    <div class="form-group">
                    <label for="exampleInputEmail1">SIEUCAP</label>
                    <textarea class="form-control" name="SOCAP"><?=get_value('SOCAP')?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh nền</label>
                    <input type="text" class="form-control" name="background" value="<?=get_value('background')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="<?=get_value('facebook')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube</label>
                    <input type="text" class="form-control" name="youtube" value="<?=get_value('youtube')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

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




