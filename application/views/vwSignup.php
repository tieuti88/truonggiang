<?php
$this->load->view('vwHeader');
?>
<!--  
Load Page Specific CSS and JS here
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->
 
<section class="sign">
  <div class="container">
    <div class="row">
      <div class="col-sm-5" id="sign-cart">
        <table>
            <tbody>
              <tr>
                <td><h3>Ma Don Hang</h3></td>
                <td><h3 class="price">asdfghjk</h3></td>
              </tr>
            <tr>
              <td align="left" class="title">Tổng thành tiền :</td>
              <td  align="right" class=""><?=$this->cart->format_number((int)$this->cart->total())?></td>
            </tr>
            <tr>
              <td align="left" class="title">Thuế VAT (10%) :</td>
              <td  align="right"><?=$this->cart->format_number((int)$this->cart->tax())?></td>
            </tr>
            <tr style="border-top: 1px solid #e8e8e8;">
              <td align="left" class="title">Tổng tiền :</td>
              <td  align="right" class="price"><?=$this->cart->format_number((int)($this->cart->tax()+$this->cart->total()))?></td>
            </tr>
            </tbody>
          </table>
      </div>
      <div class="col-sm-7" id="sign-tab-group">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="form-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">ĐĂNG KÝ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#sign-in-form" role="tab">ĐĂNG NHẬP</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content sign-info">
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="info">
              <h3>Dành cho khách hàng chưa có tài khoản tại Rồng Đỏ</h3>
              <p>Với một tài khoản duy nhất bạn có thể dễ dàng đăng ký & quản lý các dịch vụ của bạn.</p>
              <a class="form-control btn btn-green btn-register" href="/signup/register">Nhập thông tin</a>
              <b style="display: inherit; margin: 10px 0">Hoặc</b>
              <div class="border-form">
              <div class="icon-social-login col-sm-12 facebook">
                <a href="#" title="Đăng nhập bằng Facebook"  class="user-name-login-google">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  Đăng nhập bằng Facebook
                </a>
              </div>
              <div class="icon-social-login col-sm-12 google">
                <a href="#" title="Đăng nhập bằng Google" class="user-name-login-facebook">
                  <i class="fa fa-google" aria-hidden="true"></i>
                  Đăng nhập bằng Google
                </a>
              </div>
            </div>
            </div>
          </div>
          <div class="tab-pane" id="sign-in-form" role="tabpanel">
            <div class="border-form">
            <span class="title-form">Đăng nhập</span>
              <form class="form-horizontal" method="post" action="/signup/signin">
                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">Tài khoản :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="text" name="username" id="username" placeholder="Tài khoản hoặc email " required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Mật khẩu :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="password" name="password" id="password" placeholder="Mật khẩu" required/>
                  </div>
                </div>
                <label for="account"> <i><a href="#">Quên mật khẩu!</a></i> </label>
                <div class="button-group">
                  <button type="submit" class="btn col-sm-12">Đăng Nhập</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$this->load->view('vwFooter');
?>