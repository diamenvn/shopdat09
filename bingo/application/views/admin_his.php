
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
    <li class="active"><a data-toggle="tab" href="#lmht">Lịch sử Mua</a></li>
    <li><a data-toggle="tab" href="#nap">Lịch sử Nạp</a></li>

  </ul>

  <div class="tab-content col-md-12">
    <div id="lmht" class="tab-pane fade in active">

       <table id="leagueoflegends" class="table no-margin">
                  <thead>
                  <tr>
            <th>Loại</th>
                        <th>STT</th>

            <th>IDACC</th>
            <th>Name</th>
            <th>Login</th>
            <th>Ngày</th>
            <th>Giá</th>







                  </tr>
                  </thead>
        <tfoot>
            <tr>
             <th>Loại</th>
                                     <th>STT</th>

            <th>IDACC</th>
            <th>Name</th>
            <th>Login</th>
            <th>Ngày</th>
            <th>Giá</th>

            </tr>
        </tfoot>
                  <tbody>
                        <?php foreach($queryall as $row): ?>
                  <tr>
                    <td><?=$row['loainick']?></td>
                                        <td><?=$row['id']?></td>

                    <td><a href="#"><?=$row['idacc']?></a></td>
                    <td><a href="http://facebook.com/<?=$row['uid']?>"><?=$row['name']?></a></td>
                    <td><?=$row['taikhoan']?>/<?=$row['matkhau']?></td>
                    <td><?=$row['date']?></td>
                    <td><span class="text-danger"><?=number_format($row['price'])?>  <sup class="text-muted">vnđ</sup></span></td>



                  </tr>
                                                           <?php endforeach; ?>
                  </tbody>
                </table>
    </div>
        <div id="nap" class="tab-pane fade">
       <table id="vl" class="table">
                  <thead>
                  <tr>
            <th>Loại</th>
                        <th>STT</th>

            <th>Name</th>
            <th>Serial/Mathe</th>
            <th>Ngày</th>
            <th>Giá</th>
<th>Hành động
</th>






                  </tr>
                  </thead>
        <tfoot>
            <tr>
             <th>Loại</th>
                                     <th>STT</th>

            <th>Name</th>
            <th>Serial/Mathe</th>
            <th>Ngày</th>
            <th>Giá</th>
            <th>Hành động</th>
            </tr>
        </tfoot>
                  <tbody>
                        <?php foreach($querynapall as $row): ?>
                  <tr>
                    <td><?=$row['loaithe']?></td>
                                        <td><?=$row['id']?></td>

                    <td><a href="http://facebook.com/<?=$row['uid']?>"><?=$row['name']?></a></td>
                    <td><?=$row['serial']?>/<?=$row['mathe']?></td>
                    <td><?=$row['date']?></td>
                    <td><span class="text-danger"><?=number_format($row['menhgia'])?>  <sup class="text-muted">vnđ</sup></span></td>

    <td>
                        <?php if($row['status'] == "1"){?>
                        <button type="button" class="btn btn-sm btn-success btn-flat" name="duyet" id="duyet" data-tk="<?=$row['id']?>">Duyệt</button>
<button type="button" class="btn btn-sm btn-alert btn-flat" name="duyet1" id="duyet1" data-tk="<?=$row['id']?>">Từ chối</button>                        
                        <?php } else { echo status($row['status']); } ?>
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

<script>
    
    $(document).on('click', '#duyet',function (e){



    	bootbox.prompt({
    title: "Chọn mệnh giá!",
    inputType: 'select',
    inputOptions: [
        {
            text: 'Chọn mệnh giá',
            value: '',
        },
        {
            text: '10,000',
            value: '10000',
        },
        {
            text: '20,000',
            value: '20000',
        },
        {
            text: '50,000',
            value: '50000',
        },
        {
            text: '100,000',
            value: '100000',
        },

        {
        	text: '200,000',
            value: '200000',
        },        {
        	text: '300,000',
            value: '300000',
        },        
        {
        	text: '500,000',
            value: '500000',
        },
        {
        	text: '1,000,000',
            value: '1000000',
        }

    ],
	    callback: function (result) {
	              e.preventDefault();
			      var $target = $(e.target),
			           userid = $target.data('tk');
			    $.ajax({type: "POST",
			    url: "../admin/duyet",
			    data: {
			      id : userid,
			      amount: result


			        },
			      success:function(result){
			        var json = $.parseJSON(result);

			       if (json.err == 0) {
			        $.alert(json.msg);

			       } else {
			        $.alert(json.msg);

			       }


			    }});
	    }
	});





  });
    $(document).on('click', '#duyet1',function (e){



      swal({
    title: "Viết trạng thái!",
    text: "2 - Từ chối <br> 3 - Sai mã thẻ <br> 4 - Sai Seri <br> 5 - Spam",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    html: true,
    animation: "slide-from-top",
    inputPlaceholder: "Viết trạng thái"
  },
  function(inputValue){
    if (inputValue === false) return false;

    if (inputValue === "") {
      swal.showInputError("You need to write something!");
      return false
    }

      e.preventDefault();
      var $target = $(e.target),
           userid = $target.data('tk');
    $.ajax({type: "POST",
    url: "../admin/duyet1",
    data: {
      id : userid,
      status: inputValue


        },
      success:function(result){
        var json = $.parseJSON(result);

       if (json.err == 0) {
        $.alert(json.msg);

       } else {
        $.alert(json.msg);

       }


      }});


    });

  });



</script>