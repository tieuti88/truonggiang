<?php
$this->load->view('vwHeader');
?>
<?php 
  $order_id = $this->session->userdata('cart_id');
?>
    <section class="list-content">
      <div class="container">
        <div class="col-sm-3 submenu-desktop">
        
          <div class="title-submenu"><h3 style="font-weight: 900;font-size: 16px;">THÔNG TIN KHÁCH HÀNG</h3></div>
          <div class="border-form info-customer">
                  <div class="form-group">
                    <strong><?=$customer->name?></strong>
                  </div>
                  <div class="form-group">
                    <strong><?=$customer->phone_number?></strong>
                  </div>
                  <div class="form-group">
                    <strong><?=$customer->email?></strong>
                    </div>
                  <div class="form-group">
                    <strong><?=$customer->address?></strong>
                  </div>
              </div>
              <div class=""><h3 style="font-weight: 900;font-size: 16px;">LỊCH SỬ ĐƠN HÀNG</h3></div>
              <ul>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
                <li><a href="#">Đơn hàng 001 - 20/11/2017</a></li>
              </ul>
        </div>
        <div class="col-sm-9 list-product">
          <div class="row">
            <div class="container express-url">
              <a href="/"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
               > <a href="/nhan-decal.html">Nhan Decal</a>
                > Thanh toan
            </div>
          </div>
          <div class="row step">
            <div class="step1 complete">
              <a href="/dat-hang.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i> 
              <span class="step-title">Kiểm tra giỏ hàng</span>
            </div>
            <div class="step2 complete">
              <a href="/dat-hang.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i> 
              <span class="step-title">Đăng nhập</span>
            </div>
            <div class="step3 active">
              <a href="/dat-hang.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i> 
              <span class="step-title">Thanh toán</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-7"> 
              <div class="border-form">
                  <span class="title-form">THANH TOÁN</span>
                  <p>
                    Thanh toán chuyển khoảng ngân hàng theo danh sách kết nối ngân hàng dưới<br>
                    - Với nội dung : <b class="red">"Thanh toan in hd <?=$order_id?>"</b>
                  </p>
                  <div class="row">
                    <div class="col-sm-3 control-label">
                      <img src="/img/Acb_logo.jpg" style="width: 100%">
                    </div>
                    <div class="col-sm-9 output-label">
                      <table>
                        <tr>
                          <td>CTK : </td>
                          <td>CTY TNHH IN RONG DO</td>
                        </tr>
                        <tr>
                          <td>STK : </td>
                          <td>263882879</td>
                        </tr>
                        <tr>
                          <td>CN : </td>
                          <td>ACB Bình Thạnh</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3 control-label">
                      <img src="/img/vcb.jpg" style="width: 100%">
                    </div>
                    <div class="col-sm-9 output-label">
                      <table>
                        <tr>
                          <td>CTK : </td>
                          <td>CTY TNHH IN RONG DO</td>
                        </tr>
                        <tr>
                          <td>STK : </td>
                          <td>-----------------------</td>
                        </tr>
                        <tr>
                          <td>CN : </td>
                          <td>-----------------------</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3 control-label">
                      <img src="/img/donga.jpg" style="width: 100%">
                    </div>
                    <div class="col-sm-9 output-label">
                      <table>
                        <tr>
                          <td>CTK : </td>
                          <td>CTY TNHH IN RONG DO</td>
                        </tr>
                        <tr>
                          <td>STK : </td>
                          <td>-----------------------</td>
                        </tr>
                        <tr>
                          <td>CN : </td>
                          <td>-----------------------</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <i>
                    ***Bộ phận chăm sóc khách hàng sẽ liên hệ với bạn ngay sau khi nhận được thanh toán hoặc bạn có thể trực tiếp liên hệ với chúng tôi qua hotline <strong>19005151</strong>.
                  </i>
                    
                    <div class="control-button">
                     
                      <a href="/cart/save_cart" class="btn btn-dathang right btn-green">Hoàn Tất </a>
                    </div>
              </div>
            </div>
            <div class="col-sm-5"> 
              <div class="border-form">
                <span class="title-form">QUY CÁCH FILE</span>
                <form role="form" class="form-horizontal">
                  <div class="form-group">
                    <label for="catalogy" class="col-sm-4 control-label">Mã hoá đơn : </label>
                    <div class="col-sm-8 output-label">
                      <?=$order_id?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="chat-lieu" class="col-sm-4 control-label">Tổng thành tiền : </label>
                    <div class="col-sm-8 output-label">
                      <?=$this->cart->format_number((int)$this->cart->total())?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size" class="col-sm-4 control-label">Thuế VAT (10%) :</label>
                    <div class="col-sm-8 output-label">
                      <?=$this->cart->format_number((int)$this->cart->tax())?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="qty" class="col-sm-4 control-label">Tổng tiền : </label>
                    <div class="col-sm-8 output-label">
                      <?=$this->cart->format_number((int)($this->cart->tax()+$this->cart->total()))?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="catalogy" class="col-sm-4 control-label">Ngày giao : </label>
                    <div class="col-sm-8 output-label">
                      7 - 10 ngày
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
$this->load->view('vwFooter');
?>
<script type="text/javascript">
  $(function(event){
      
  });
</script>