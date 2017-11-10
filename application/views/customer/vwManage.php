  <!-- DataTables -->
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css">
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
        Customers Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="/client"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customers Manager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button controller -->
      <div class="row">
        <div class="col-xs-12">
      <small id="message-datatable" class=""></small>
            
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
              <table id="table_customer" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th width="5%">Mã KH</th>
                  <th width="10%">Công ty </th>
                  <th width="10%">Tên khách hàng</th>
                  <th width="10%">email</th>
                  <th width="15%">Địa chỉ</th>
                  <th width="5%">Số điện thoại</th>
                  <th width="5%">Tạo bởi </th>
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
                        <input type="hidden" name="customer-id" value="">
                        <div class="form-group">
                            <label for="id">Mã khách hàng
                            </label><span id="id"></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Công ty / Người đại diện
                            </label><span id="company_name"></span>
                        </div>
                        <div class="form-group">
                            <label for="title"> Email
                            </label><span id="email"></span>
                        </div>
                        <div class="form-group">
                            <label for="qty">Số điện thoại
                            </label><span id="phone_number"></span>
                        </div>
                        <div class="form-group">
                            <label for="description" style="display: flex;">Đăng ký qua </label>
                            <span id="register_by"></span>
                        </div>

                        <table id="table_order_customer" class="table table-bordered table-striped" width="100%">
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
                            <td width="10%">Hình ảnh </td>
                            <td width="15%"> Chủ đề </td>
                            <td width="5%"> Mô tả  </td>
                            <td width="5%">Tổng tiền</td>
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