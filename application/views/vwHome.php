<?php
$this->load->view('vwHeader');
?>


    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-sm-3">
            <ul class="menu-desktop">
            <?php
              $i = 0;
              foreach ($category as $cat):
            ?>
              <li class="<?=$i==0?'active':''?>" data-tab="#<?=$cat->seo_title?>">
              <a href="/category/<?=$cat->seo_title?>.html">
                <div class="menu-item" style="">
                <div class="thumbnail"><img src="/assets/images/adr-icon-campfire.png" alt="" style="display: block;"></div>
                  <h3><?=$cat->title?></h3>
                  <!-- <ul class="hagtag">
                    <?php
                    echo "<li>".str_replace(',',"<br/>",$cat->hagtag)."</li>";
                    ?>
                  </ul> -->
                </div>
              </a>
              </li>
            <?php $i++; endforeach; ?>
            </ul>
          </div>
          <div class="col-sm-9">
          <?php
              $i = 0;
              foreach ($category as $cat):
            ?>
            <div class="row menu-content <?=$i==0?'active':''?>" id="<?=$cat->seo_title?>">
              <?=$cat->content?>
            </div>
            <?php 
              $i++;
              endforeach;
            ?>
          </div>

        </div>
      </div>
    </header>
<?php
$this->load->view('vwFooter');
?>
<!-- <script type="text/javascript">
    $('li[data-image-src=#img1]').on('click',function(){
        $('#img1').fadeIn();
        $('#img2').fadeOut();
        $('#img3').fadeOut();
        $('.meunu-tab-hover ul li').removeClass('active');
        $(this).addClass('active');
    });    
    $('li[data-image-src=#img2]').on('click',function(){
        $('#img1').fadeOut();
        $('#img2').fadeIn();
        $('#img3').fadeOut();
        $('.meunu-tab-hover ul li').removeClass('active');
        $(this).addClass('active');
    });
    $('li[data-image-src=#img3]').on('click',function(){
        $('#img3').fadeIn();
        $('#img2').fadeOut();
        $('#img1').fadeOut();
        $('.meunu-tab-hover ul li').removeClass('active');
        $(this).addClass('active');
    });

    function isFacebookApp() {
        var ua = navigator.userAgent || navigator.vendor || window.opera;
        console.log(ua);
        return (ua.indexOf("FBAN") > -1) || (ua.indexOf("FBAV") > -1);
    }

    console.log(isFacebookApp());
</script> -->