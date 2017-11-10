<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script type="text/javascript">
  var ckfinder_config = {
    base_url  : '<?=$this->config->base_url()?>',
    connector : 'admin/product/connector',
    html : 'admin/product/html'
  };
</script>
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Add product</small></h1>
</div>
 <form method="post" action="/admin/product/add_product" enctype="multipart/form-data">
    <div class="container">
        <div class="col-sm-8">
       
	        <ul>
	        	<li><label for="thumb">Image : </label><input type="file" name="thumb"></li>
            <li><label >Title : </label><input type="text" name="name" placeholder="tiêu đề" ></li>
	        	<li><label >Desciption : </label><textarea name="desciption" placeholder="Mô tả dự án"></textarea></li>
	        	<li><label >Content : </label><textarea name="content" id="content" name="content"></textarea>
	        	<script>
	                CKEDITOR.replace( 'content' );
	            </script></li>
              <li><label >Price : </label><input type="text" name="price" value="">VND</li>
            <li><label >Qty : </label><input type="number" name="qty" value=""></li>
            <li><label >Design by : </label><input type="text" name="design_by" placeholder="Design by..." ></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<button type="submit" name="submit">Submit</button>
	        </ul>

 	</div>
 	<div class="col-sm-4">
 		<div class="box-right box-catagory">
 			<h2 class="box-title">Catagory</h2>
 			<ul>
 				<?php foreach ($catagoris as $kCat => $catagory) : ?>
 				<li><label><input type="checkbox" name="catagory_id" value="<?=$catagory->id?>"> <?=$catagory->title?></label></li>
 				<?php endforeach ?>
 			</ul>
 		</div>
    
    <div class="box-right box-image">
      <h2 class="box-title">logo Customer</h2>
      <!-- <div><img src="/uploads/<?=@$product->logo_customer?>" title="logo khach hang"/ width="60" height="60" ></div> -->
      <div><label for="more_img">Add Image : </label><input type="file" ></div>
    </div>

 	</div>
</form>
</div><!-- /.container -->
<?php
$this->load->view('admin/vwFooter');
?>