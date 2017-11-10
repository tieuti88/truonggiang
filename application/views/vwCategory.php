<?php
$this->load->view('vwHeader');
?>


    <section class="list-content">
      <div class="container">
        <!-- <div class="col-sm-3 submenu-desktop">
        <div class="title-submenu"><h3 style="font-weight: 900">TEM NHÃN</h3></div>
          <ul>
           <li  class="active"><a href="#">NHÃN DECAL GIẤY</a></li>
           <li ><a href="#">NHÃN DECAL NHỰA</a></li>
           <li ><a href="#">NHÃN GIẤY</a></li>
           <li ><a href="#">STICKER</a></li>
          </ul>
        </div> -->
        <?php $this->load->view('vwSidebar'); ?>
        <div class="col-sm-9 list-product">
          <div class="row">

          <?php foreach ($products as $product):?>
            <div class="col-sm-4 item-product">
              <a href="/product/<?=$product->seo_title?>.html">
              <div class="img-product">
                <div class="mask"></div>
                <img src="/uploads/<?=$product->thumb?>" alt="<?=$product->name?>"/>
              </div>
              </a>
              <div class="info-product">
                <h4><?=$product->name?></h4>
                <span>
                <?php for ($i=0; $i < intval($product->rate); $i++):?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                <?php endfor; ?>
                  <?php if((int)$product->rate != $product->rate): ?>
                  <i class="fa fa-star-half" aria-hidden="true"></i>
                  <? endif; ?>
                </span>
                <div>
                  <span class="pro-price red"><?=number_format(($product->price), 0)?> VND <span class="pro-discount">-18%</span></span>
                  
                  <span class="pro-oldPrice">899.000 VND</span>
                </div>
                
                <a href="#" class="btn btn-dathang" 
                data-id="<?=$product->id?>" 
                data-price="<?=$product->price?>" 
                data-name="<?=$product->name?>" 
                data-image="<?=$product->thumb?>" 
                >Thêm vào giỏ hàng</a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </section>
<?php
$this->load->view('vwFooter');
?>
<script type="text/javascript">
  $('.btn-dathang').on('click',function(e){
    e.preventDefault();
    var $data = {
      id : $(this).attr('data-id'),
      price : $(this).attr('data-price'),
      name : $(this).attr('data-name'),
      thumb : $(this).attr('data-image')
    };
    addToCart($data);
    animation_add($(this));
    return false;
  });

  function addToCart($data){
    $.post('/cart/add_to_cart',$data,function(result){
      $('.shopping-cart').find('b').html(result);
    });

  }

  function animation_add(button){
    var cart = $('.shopping-cart');
        var imgtodrag = button.parents('.item-product').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            /*setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);*/

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                // button.detach()
            });
        }
  }
</script>