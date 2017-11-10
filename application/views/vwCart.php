<?php
$this->load->view('vwHeader');
?>
    <section class="cart_list">
      <div class="container">
        <form id="form-cart">
        <div class="row">
          <table>
            <thead>
              <td>stt</td>
              <td>hình ảnh</td>
              <td>Chi tiết</td>
              <td>số lượng</td>
              <td>Đơn giá</td>
              <td>thành tiền</td>
            </thead>
            <tbody>
              <?php 
              $carts = $this->cart->contents();
              $stt = 1;
              foreach ($carts as $cart): ?>
              <tr>
                <td><?=$stt++?></td>
                <td><img src="/uploads/<?=$cart['image']?>" alt="<?=$cart['name']?>" width="200"/></td>
                <td><?php 
                  echo @$cart['desc'];
                ?></td>
                <td align="right">
                  <a class="plus" href="#">+</a><input type="number" name="qty[<?=$cart['rowid']?>]" value="<?=$cart['qty']?>" min="1" size='6' readonly><a href="#" class="minus"  >-</a>
                </td>
                <td align="right"><?=$cart['price']?></td>
                <td align="right"><?=$cart['subtotal']?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="5" align="right" class="title">Tổng thành tiền :</td>
              <td  align="right" class=""><?=$this->cart->format_number((int)$this->cart->total())?></td>
            </tr>
            <tr>
              <td colspan="5" align="right" class="title">Thuế VAT (10%) :</td>
              <td  align="right"><?=$this->cart->format_number((int)$this->cart->tax())?></td>
            </tr>
            <tr>
              <td colspan="5" align="right" class="title">Tổng tiền :</td>
              <td  align="right" class="price"><?=$this->cart->format_number((int)($this->cart->tax()+$this->cart->total()))?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <a href="/signup" class="btn right btn-thanhtoan">Thanh toán</a>
        <button class="btn btn-green right btn-capnhat">Cập nhật</button>
      </form>
      </div>

      <div class="font-loader"><div class="loader"></div></div>
    </section>
<?php
$this->load->view('vwFooter');
?>
<script type="text/javascript">
  $(function(event){
      $('a.plus').on('click',function(e){
        e.preventDefault();
        var input = $(this).parent('td').find('input[type=number]');
        input.val(parseInt(input.val())+1);
      });

    $('a.minus').on('click',function(e){
      e.preventDefault();
      var input = $(this).parent('td').find('input[type=number]');
      if(parseInt(input.val()) <= 1) return;
      input.val(parseInt(input.val())-1);
    });

    $('button.btn-capnhat').on('click',function(e){
      e.preventDefault();
      $(this).attr('disabled','disabled');
      $('.font-loader').show();
      var data = $('form#form-cart').serialize();
      $.post('/cart/update_cart',data,function(result){
        if(result) location.reload();
      });
    });
  });
</script>