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
              <p class="red"><?=@$error?></p>
              <!-- register form -->
              <div class="border-form register-form">
              <span class="title-form">Đăng ký</span>
              <form class="form-horizontal" method="post" action="/signup/register">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Họ & Tên :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="text" name="name" id="name" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">Tài khoản :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="text" name="username" id="username" placeholder="Tài khoản " required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="email" name="email" id="email" placeholder="abc@company.com " required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Mật khẩu :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="password" name="password" id="password" placeholder="********" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="confirm_password" class="col-sm-3 control-label">Nhập lại mật khẩu :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="password" name="confirm_password" id="confirm_password" placeholder="********" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone_number" class="col-sm-3 control-label">Số điện thoại :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="number" name="phone_number" id="phone_number" placeholder="" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="province" class="col-sm-3 control-label">Tỉnh thành :</label>
                  <div class="col-sm-9">
                    <select name="province" class="control-input" id="province" required>
                        <option selected value="hcm">Hồ chí minh</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="district" class="col-sm-3 control-label">Quận :</label>
                  <div class="col-sm-9">
                    <select name="district" class="control-input" id="district" required>
                        <option value="" selected >Chọn quận...</option>
                        <option value="q01" >Quận 1</option>
                        <option value="q02" >Quận 2</option>
                        <option value="q03" >Quận 3</option>
                        <option value="q04" >Quận 4</option>
                        <option value="q05" >Quận 5</option>
                        <option value="q06" >Quận 6</option>
                        <option value="q07" >Quận 7</option>
                        <option value="q08" >Quận 8</option>
                        <option value="q09" >Quận 9</option>
                        <option value="q10" >Quận 10</option>
                        <option value="q11" >Quận 11</option>
                        <option value="q12" >Quận 12</option>
                        <option value="qgv" >Quận Gò Vấp</option>
                        <option value="qbt" >Quận Bình Thạnh</option>
                        <option value="qpn" >Quận Phú Nhuận</option>
                        <option value="qtd" >Quận Thủ Đức</option>
                        <option value="qbc" >Huyện Bình Chánh</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-3 control-label">Địa chỉ số nhà :</label>
                  <div class="col-sm-9">
                    <input class="control-input placepicker" type="text" name="address" placeholder="B306, 43D đường Hồ Văn Huê" id="address" required>
                  </div>
                </div>
                <label for="rule"><input type="checkbox" name="rule" id="rule" required> <i>Tôi chấp nhận điều khoản đăng ký </i> </label>
                <div class="button-group">
                  <button type="submit" class="btn col-sm-12">Đăng ký </button>
                </div>
              </form>
            </div>
              <!-- End register form -->
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
                    <input class="control-input" type="text" name="username" id="username" placeholder="Tài khoản hoặc email " />
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Mật khẩu :</label>
                  <div class="col-sm-9">
                    <input class="control-input" type="password" name="password" id="password" placeholder="Mật khẩu" />
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
<!-- map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApQrLu9uBQItc5elIFP-uu3cusCkAlFnE&sensor=true&libraries=places"></script>
    <script src="/vendor/autocomplete_location/src/js/jquery.placepicker.js"></script>

<script type="text/javascript">
  $(function(event){
    $(".placepicker").placepicker({
          country:['vietnam']
        });
  });
</script>