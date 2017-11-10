  <!-- DataTables -->
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>plugins/viewbox/viewbox.css">
  <style type="text/css">
  	/*th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }*/
  </style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="/client"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders Manager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button controller -->
      <div class="row">
        <div class="col-xs-12">
            <button id="reload" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
			<small id="message-datatable" class=""></small>
            <?php
            	/*echo "<pre>";
            	print_r($button);
            	echo "</pre>";*/
            ?>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table_order" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th width="5%">Mã đơn hàng</th>
                  <th width="15%">Sản phẩm</th>
                  <th width="10%">Hình ảnh</th>
                  <th width="15%">Mô tả</th>
                  <th width="5%">Đơn vị tính</th>
                  <th width="5%">Số lượng </th>
                  <th width="5%">Đơn Giá </th>
                  <th width="5%">Thành tiền</th>
                  <th width="5%">Phòng ban đang xữ lý</th>
                  <th width="15%">Trạng Thái đơn hàng</th>
                  <th width="15%">Tính năng hổ trợ</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- modal detail user -->
        <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Detail user </h4>
            </div>
                <div class="modal-body">
                    <div class="box-body">
                        <input type="hidden" name="user-id" value="">
                        <div class="form-group">
                            <label for="id">Mã đơn hàng
                            </label><span id="id"></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Hình ảnh
                            </label><span id="thumb"></span>
                        </div>
                        <div class="form-group">
                            <label for="title"> Sản phẩm
                            </label><span id="title"></span>
                        </div>
                        <div class="form-group">
                            <label for="qty">số lượng
                            </label><span id="qty"></span>
                        </div>
                        <div class="form-group">
                            <label for="description" style="display: flex;">Chi tiết </label>
                            <span id="description"></span>
                        </div>

                        <table id="table_order_group" class="table table-bordered table-striped" width="100%">
                          <thead>
                          <tr>
                            <th width="5%">Mã đơn hàng</th>
                            <th width="15%">Ngày tạo</th>
                            <th width="10%">Tình trạng đơn hàng </th>
                            <th width="15%">PB xữ lý </th>
                            <th width="5%">Người xữ lý </th>
                            <th width="5%">Note</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr>
                            <td width="5%">Mã đơn hàng</td>
                            <td width="15%">Ngày tạo</td>
                            <td width="10%">Tình trạng đơn hàng </td>
                            <td width="15%">PB xữ lý </td>
                            <td width="5%">Người xữ lý </td>
                            <td width="5%">Note</td>
                          </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                      </div>
                </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->