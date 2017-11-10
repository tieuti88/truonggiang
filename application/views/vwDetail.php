
<div class="row">
          <div class="col-sm-9 left-modal">
            <div class="content-post">
              <?=$detail[0]->content?>
            </div>
            
            <div class="row more-product product-list" id="sliderProduct">
                  <?php if(!$more_pro): ?>
                    <div>Không có sản phẩm cùng loại!!!</div>
                  <?php else: ?>
                  <?php foreach ($more_pro as $cMore => $vMore) : ?>
                  <div class="col-sm-4">
                     <div class="image-pro">
                        <a href="#" >
                          <img src="<?=HTTP_SOURCE_PATH?><?=$vMore->thumb?>" alt="">
                          <span class="btn-detail">Xem chi tiết</span>
                        </a>
                    </div>
                      <div class="text">
                        <ul>
                            <li><img class="icon" src="<?=HTTP_SOURCE_PATH.$vMore->logo_customer?>"><?=$vMore->title?></li>
                            <li><a href="#" class="btn-like"><img src="<?=HTTP_IMAGES_PATH?>icon-like.png" alt=""> <span>1</span></a></li>
                        </ul>
                      </div>
                  </div>
                <?php endforeach ?>
                <?php endif ?>
                  
            </div>
            <div class="row">
              <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#info1">All</a></li>
                    <li><a data-toggle="tab" href="#pref1">FLEXIBLE PACKETS</a></li>
                    <li><a data-toggle="tab" href="#pref2">HANG TAGS</a></li>
                    <li><a data-toggle="tab" href="#pref4">SHRINK SLEEVES</a></li>
                    <li><a data-toggle="tab" href="#pref5">CARTONS</a></li>
                    <li><a data-toggle="tab" href="#pref6">BOXS</a></li>
                    <li><a data-toggle="tab" href="#pref7">Bottles</a></li>
                    <li><a data-toggle="tab" href="#pref8">Labels</a></li>
                    <li><a data-toggle="tab" href="#pref9">Stickers</a></li>
                    <li><a data-toggle="tab" href="#pref10">Sachets</a></li>
                    <li><a data-toggle="tab" href="#pref11">Bags</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3 right-modal">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
          <div class="row title">
            <div class="col-sm-7">
              <span class="detail-pro-sub-title">similar  project</span>
              <h2><?=$detail[0]->customer_name?></h2>
            </div>
            <div class="col-sm-5">
              <img class="icon" src="<?=HTTP_SOURCE_PATH.$detail[0]->logo_customer?>">
            </div>
          </div>
          <div class="row">
            <span class="detail-pro-sub-title-nobackgr">Share in social media</span>
            <p class="social">
                      <a href="#"><img src="<?=HTTP_IMAGES_PATH?>facebook.png" alt=""></a>
                      <a href="#"><img src="<?=HTTP_IMAGES_PATH?>be.png" alt=""></a>
                      <a href="#"><img src="<?=HTTP_IMAGES_PATH?>youtube.png" alt=""></a>
                      <a href="#"><img src="<?=HTTP_IMAGES_PATH?>instagram.png" alt=""></a>
                  </p>
          </div>
          <div class="row">
            <ul class="detail-pro-desc">
              <li><strong><?=$detail[0]->title?></strong></li>
              <li>Design by : <?=$detail[0]->design_by?></li>
              <li><?=$detail[0]->desciption?></li>
              <li>Published: <?=date('d-m-Y',strtotime($detail[0]->datecreate))?></li>
              <li>
                <ul>
                  <li><img src="<?=HTTP_IMAGES_PATH?>eye-ico.png" alt="" height="18px"> <?=$detail[0]->seen?></li>
                  <li><img src="<?=HTTP_IMAGES_PATH?>icon-like.png" alt="" height="18px"> <c id="count_like"><?=$detail[0]->like?></c></li>
                  <li><img src="<?=HTTP_IMAGES_PATH?>comment-ico.png" alt="" height="18px"> <c id="count_comment"><?=count($comment)?></c></li>
                </ul>
              </li>
            </ul>
            <div class="detail-pro-sub-title btn-detail-like" data-id="<?=$detail[0]->id?>"><a><img src="<?=HTTP_IMAGES_PATH?>icon-like.png" alt="" height="30px"></a></div>
          </div>
          <!-- <div class="row">
            <span class="detail-pro-sub-title-nobackgr">By software</span>
            <ul class="detail-pro-desc">
              <li><img src="<?=HTTP_IMAGES_PATH?>ai.png"></li>
              <li><img src="<?=HTTP_IMAGES_PATH?>psd.png"></li>
              <li><img src="<?=HTTP_IMAGES_PATH?>lr.png"></li>
              <li><img src="<?=HTTP_IMAGES_PATH?>cd4.png"></li>
            </ul>
          </div> -->
          <div class="row comment-box">
          <?php if(!$comment): ?>
              <div class="nodata">Không có bình luận!!!</div>
            <?php else: ?>
            <?php foreach ($comment as $cKey => $cVal) : ?>
            <div class="item col-sm-12">
              <div class="avatar col-sm-3"><img src="<?=HTTP_IMAGES_PATH?>avatar-1577909_640.png"></div>
              <div class="comment col-sm-9" >
              <div class="name"><?=$cVal->client_name?></div>
              <div class="detail-comment"><?=$cVal->comment?></div>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>


          </div>

          <div class="row comment">
            <div class="col-sm-12">
              <form method="post" action="/comment/add" id="comment-form">
                <input type="hidden" name="project_id" value="<?=$detail[0]->id?>">
                <input type="text" name="client_name" placeholder="Email..." value="<?=@$this->session->userdata['email']?>" required>
                <textarea id="textarea" rows="4" placeholder="Bình Luận..." name="comment" required></textarea>
                <button class="btn btn-detail" id="btn-comment">Gởi Bình Luận</button>
              </form>
            </div>
          </div>


        </div>
    </div>
    <script type="text/javascript">
    $(function(){
      var count_comment = <?=count($comment)?>;
      var count_like = <?=$detail[0]->like?>;
      var id_pro = <?=$detail[0]->id?>;
      var likeStore = "";
      /* comment */
      $('#comment-form').on('submit',function(e){
        e.preventDefault();
        count_comment+=1;
        $('#count_comment').html(count_comment);
        $('#btn-comment').attr('disabled','disabled');
        $('.comment-box .nodata').hide('fade');
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var html = '<div class="item col-sm-12 saving">'
              +'<div class="avatar col-sm-3"><img src="<?=HTTP_IMAGES_PATH?>avatar-1577909_640.png"></div>'
              +'<div class="comment col-sm-9">'
              +'<div class="name">'+$('input[name=client_name]').val()+'</div>'
              +'<div class="detail-comment">'+$('textarea[name=comment]').val()+'</div>'
              +'</div>'
              +'</div>';

        $('.comment-box').append(html);

        $.post(url,data,function(res){
          
          if(res){
            $('.comment-box .saving').removeClass('saving');
            $('textarea[name=comment]').val('');
            $('#btn-comment').removeAttr('disabled');
          }
        });
      });

      /* like */
      $('.btn-detail-like').on('click',function(e){
        e.preventDefault();
        var url = '/home/like';
        var idPro = $(this).attr('data-id');
        var data = {
          id:idPro
        };
        
        if(localStorage.getItem(idPro) == 'YES') return;

        localStorage.setItem(idPro,'YES');

        $.post(url,data,function(res){
          if(res){
            $('#count_like').html(count_like+=1);
            $('.btn-detail-like').addClass('saving');
          }

        });
      });

      /* disable like button */
      if(localStorage.getItem(id_pro)=='YES'){
        $('.btn-detail-like').addClass('saving');
      }
      // console.log(localStorage.clear());

    })
    </script>