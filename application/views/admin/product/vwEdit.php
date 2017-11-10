<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Edit Product</small></h1>
</div>
    <div class="container">
        <form method="post" action="/admin/product/edit_product/<?=$product->id?>" enctype="multipart/form-data">
        <div class="col-sm-8">
	        <ul>
	        	<li><img src="/uploads/<?=$product->thumb?>" width="100px"><label><a href="/admin/product/remove_image/<?=$product->id?>/<?=$product->thumb?>"> Remove</a></label></li>
	        	<li><label for="thumb">Image : </label><input type="file" name="thumb"></li>

            <li><label >Title : </label><input type="text" name="name" value="<?=$product->name?>"></li>
            <li><label >Desciption : </label><textarea name="desciption" placeholder="Mô tả dự án"><?=$product->desciption?></textarea></li>
	        	<li><label >Content : </label><textarea name="content" id="content" name="content"><?=$product->content?></textarea>
	        	<script>
	                CKEDITOR.replace( 'content' );
	            </script></li>
            <li><label >Price : </label><input type="text" name="price" value="<?=$product->price?>">VND</li>
            <li><label >Qty : </label><input type="number" name="qty" value="<?=$product->qty?>"></li>
            <li><label >Design by : </label><input type="text" name="design_by" placeholder="Design by..." value="<?=$product->design_by?>"></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<li>
	        	<input type="hidden" name="id" value="<?=$product->id?>">
	        	<button type="submit" name="submit" class="btn btn-info">Submit</button>
	        	</li>
	        </ul>
	    </div>
	    <div class="col-sm-4">
 		<div class="box-right box-catagory">
 			<h2 class="box-title">Catagory</h2>
 			<ul>
 				<?php 
 				$choosed = $product->catagory_id;
 				foreach ($catagoris as $kCat => $catagory) : ?>
 				
 					<li><label><input type="checkbox" name="catagory_id" value="<?=$catagory->id?>" <?=($choosed == $catagory->id)?'checked="checked"':''?> > <?=$catagory->title?></label></li> 
 				<?php endforeach ?>
 			</ul>
 		</div>
    
    <div class="box-right box-catagory">
      <h2 class="box-title">Add image</h2>
      <div>
      	<?php $gallery = explode(',',$product->gallery);
      		foreach ($gallery as $img):
            if(!empty($img)):
      	 ?>
         <div class="img-gallery">
          <a href="/admin/product/remove_gallery/<?=$product->id?>/<?=$img?>" class="close">X</a>
        	<img src="/uploads/<?=$img?>" title="Hình ảnh sản phẩm "/ width="60" height="60" >
        </div>
      <?php endif; endforeach; ?>
      	</div>
      <div><label for="filefield">Add Image : </label><input type="file" name="images[]" multiple="multiple"></div>
    </div>

 	</div>
        </form>
 
    </div><!-- /.container -->
     <hr>
<?php
$this->load->view('admin/vwFooter');
?>