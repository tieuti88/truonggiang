<?php
$this->load->view('vwHeader');
?>
<section class="list-content">
      <div class="container">
        <div class="col-sm-3 submenu-desktop">
        
          <div class="title-submenu"><h3 style="font-weight: 900;font-size: 16px;">THÔNG TIN KHÁCH HÀNG</h3></div>
          <div class="border-form info-customer">
                  <div class="form-group">
                    <strong><?=$this->session->userdata("name")?></strong>
                  </div>
                  <div class="form-group">
                    <strong><?=$this->session->userdata("phone_number")?></strong>
                  </div>
                  <div class="form-group">
                    <strong><?=$this->session->userdata("email")?></strong>
                    </div>
                  <div class="form-group">
                    <strong><?=$this->session->userdata("address")?></strong>
                  </div>
              </div>
              <a href="/signup/customer_logout" class="btn btn-warning">Thoát</a>
        </div>
        <div class="col-sm-9 list-product">
          
          <div class="row">
            <div class="col-sm-12"> 
              <div class="border-form">
                <span class="title-form">LỊCH SỬ ĐƠN HÀNG</span>
                <table class="table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>MADH</th>
                      <th>Chi tiết</th>
                      <th>Ngày tạo</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($orders as $order): ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><a href="#" style="color: red"><?=$order->order_id?></a></td>
                      <td><?=$order->description?></td>
                      <td><?=$order->datecreate?></td>
                      <td><?=$order->total_money?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>

              </div>

              
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
$this->load->view('vwFooter');
?>