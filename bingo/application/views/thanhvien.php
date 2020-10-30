
      <div class="row">
        <!-- Left col -->
<div class="col-md-12">
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
    <li class="active"><a data-toggle="tab" href="#lmht">Tài khoản</a></li>

  </ul>

  <div class="tab-content col-md-12">
    <div id="lmht" class="tab-pane fade in active">

       <table id="leagueoflegends" class="table no-margin">
          <thead>
                  <tr>
                    <th>UID</th>
                    <th>Facebook ID</th>
              			<th>Tên</th>
                     <th>Email</th>
                                <th>Chức Vụ</th>
              			<th>Tiền</th>
              			<th>Chỉnh Sửa</th>
                  </tr>
          </thead>
           <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Facebook ID</th>
                    <th>Tên</th>
                     <th>Email</th>
                                <th>Chức Vụ</th>
                    <th>Tiền</th>
                    <th>Chỉnh Sửa</th>
                  </tr>
          </tfoot>
                  <tbody>

                        <?php foreach($dulieu as $row): ?>
                  <tr>

                    <td><a href="#"><?=$row['id']?></a></td>
                    <td><?=$row['uid']?></td>
                    <td><?=$row['hovaten']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['admin']?></td>
                    <td><?=$row['cash']?></td>
                    <td> <button type="button" class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target=".phuoc<?=$row['id']?>">Edit</button></td>
      </tr>

<div class="modal fade phuoc<?=$row['id']?>" id="phuoc<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg" role="document">
<!--- Phuoc Van --->
<div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Thông tin tài khoản</h4>
              </div>
<div class="modal-body">
  <div class="block-content remove-padding-b">

        <form role="form" id="add-account<?=$row['id']?>" enctype="multipart/form-data">


    					<div class="row">
    						<div class="col-md-3">
                  <div class="form-group">
                    <label>Tiền</label>
                    <input class="form-control" placeholder="Giá" value="<?=$row['cash']?>" name="cash" type="number" autofocus="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <input class="form-control" placeholder="Email" value="<?=$row['email']?>" name="email" type="text" >
                    </div>
                  </div>
                </div>
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Chức Vụ</label>
                    <div class="input-group">
                      <input class="form-control" value="<?=$row['admin']?>" name="trangthai"  type="number" autofocus="">
                    </div>
                  </div>
                </div>
              </div>


            </form>
          </div>


                  </div>
                  <div class="modal-footer">
    			    <input type="hidden" name="taikhoan" value="<?=$row['id']?>">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    				<input type="submit" name="insert1" id="insert1" data-id="<?=$row['id']?>" value="Edit" class="btn btn-primary" />

    				        </form>

                  </div>
                </div>
      </div>



    </div>
<!-- Phuoc End -->






                     <?php endforeach; ?>
                  </tbody>
                </table>
            </div>

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


 <script>
 $(document).ready(function(){

	 //Author : phuocvan
		$("input[name='insert1']").click(function(event){
			   var $target = $(event.target),
					userid = $target.data('id');
					event.preventDefault();
					$.ajax({
						 url:"/admin/phuocedit",
						 method:"POST",

						 data: $("#add-account" + userid + "").serialize() + "&id="+userid+"",

						 beforeSend:function(){
							  $('#insert').val("đang lưu....");
						 },
						 success:function(data){
							   var json = $.parseJSON(data);

							   jQuery('#phuoc2').modal('hide');

							  console.log(json);
                              if (json.err == 0) {
                                swal("OK!", json.msg, "success")

                              } else {
                                swal("Opps!", json.msg, "error")
                              }

							 setTimeout(function(){ window.location.href = "/admin/thanhvien" }, 2000);


						 }
					});
			})



 });
 </script>

