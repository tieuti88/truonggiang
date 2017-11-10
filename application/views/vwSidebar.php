<?php 
    $category = $this->catagory_model->getAll();
?>
<div class="col-sm-3 no-padding">
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