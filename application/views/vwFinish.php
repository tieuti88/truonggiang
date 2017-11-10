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
                > Hoan thanh
            </div>
          </div>
          <div class="row step">
            <div class="step1 complete">
              <a href="/dat-hang.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i>
              <span class="step-title">Quy cách file</span>
            </div>
            <div class="step2 complete">
              <a href="/upload-file.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i> 
              <span class="step-title">Upload file</span>
            </div>
            <div class="step3 complete">
              <a href="/thanh-toan.html"><i class="fa fa-check fa-2x" aria-hidden="true"></i> </a>
              <i class="fa fa-cog fa-spin fa-2x" aria-hidden="true"></i> 
              <span class="step-title">Thanh toán</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12"> 
              <div class="border-form">
                <span class="title-form">THÔNG BÁO</span>
                <p style="text-align: center"><i>Cảm ơn quý khách đã tin dùng INRONGDO<br/>
                  Đơn hàng đã được gởi thành công..<br>
                  Kiểm tra đơn hàng <a href="#" style="color: blue"> tại đây</a>
                </i></p>
              </div>

              
            </div>
            
          </div>
        </div>
      </div>
    </section>
<?php
$this->load->view('vwFooter');
?>