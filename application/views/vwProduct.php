<?php
$this->load->view('vwHeader');
?>
<link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/vendor/slick/slick-theme.css"/>
    <section class="list-content">
      <div class="container">
        <div class="col-sm-12 product_detail">
          <div class="row">home > test > sanpham</div>
          <br/>
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-2">
                  <ul class="list-thumb">
                  <li class="active"><img src="/uploads/<?=$product->thumb?>" class="img-thumb"></li>
                    <?php $gallery = explode(',',$product->gallery);
                      foreach ($gallery as $img):
                     ?>
                    <li><img src="/uploads/<?=$img?>" class="img-thumb"></li>
                  <?php endforeach; ?>
                  </ul>
                </div>

                <div class="col-lg-10 box-img">
                  <img src="/uploads/<?=$product->thumb?>" class="img-thumb" id="thumb">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              
              <h3 style="text-transform: uppercase;"><?=$product->name?></h3>
              <span>
                <?php for ($i=0; $i < intval($product->rate); $i++):?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                <?php endfor; ?>
                  <?php if((int)$product->rate != $product->rate): ?>
                  <i class="fa fa-star-half" aria-hidden="true"></i>
                  <? endif; ?>
                </span>
              <small>
                <p class="m_pro_detail">
                    Chất liệu : <?=$product->tech?><br/>
                    Size : <?=$product->size?><br/>
                    Thiết kế bởi : <?=$product->author?><br/>
                  </p>
                  <h4><strong class="red">Giá : <?=number_format(($product->price), 0)?> VND</strong></h4>
                <p><?=$product->desciption?></p>
              </small>

            </div>
          </div>
          <div class="row">
            <?=$product->content?>
          </div>
          <div class="more-product">
            <div class="border-form">
                <span class="title-form">SẢN PHẨM CÙNG LOẠI</span>
                <div class="more_product">
                <?php
                foreach ($more_products as $m_pro):
                ?>
                
                  <div class="item-pro-more">
                    <a href="/product/<?=$m_pro->seo_title?>.html">
                      <div class="m_pro_img"><img src="/uploads/<?=$m_pro->thumb?>"></div>
                      <p class="m_pro_info">
                        <span class="m_pro_name"><?=$m_pro->name?></span>
                        <span class="m_pro_price red"><?=number_format(($m_pro->price), 0)?> VND</span>
                      </p>
                    </a>
                  <a href="#" class="btn btn-dathang" 
                data-id="<?=$m_pro->id?>" 
                data-price="<?=$m_pro->price?>" 
                data-name="<?=$m_pro->name?>" 
                data-image="<?=$m_pro->thumb?>"
                    >Thêm vào giỏ hàng</a>
                  </div>

                <?php
                endforeach;
                ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
<?php
$this->load->view('vwFooter');
?>
<script type="text/javascript" src="/vendor/slick/slick.min.js"></script>
<script type="text/javascript">
  $(function(){
    var img = $('ul.list-thumb');
    img.on('click','li',function(){
      $('ul.list-thumb li').removeClass('active');
      $(this).addClass('active');
      var url = $(this).find('img').attr('src');
      $('img#thumb').removeAttr('scr').attr('src',url);
    });
    $('.more_product').slick({
      slidesToShow: 4,
      slidesToScroll: 4
    });
  })
</script>
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
        var imgtodrag = button.parents('.item-pro-more').find("img").eq(0);
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