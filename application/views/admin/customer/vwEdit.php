<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Edit customer</small></h1>
</div>
    <div class="container">
        <form method="post" action="/admin/customer/edit_customer/<?=$customer->id?>" enctype="multipart/form-data">
        <div class="col-sm-12">
	        <ul>
	        	<li><img src="/uploads/<?=$customer->thumb?>" width="100px"><label><a href="#"> Remove</a></label></li>
	        	<li><label for="thumb">Image : </label><input type="file" name="thumb"></li>
	        	<li><label >Title : </label><input type="text" name="title" value="<?=$customer->title?>"></li>
	        	<li><label >Link : </label><textarea name="link" id="link" name="link"><?=$customer->link?></textarea></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<li>
	        	<input type="hidden" name="id" value="<?=$customer->id?>">
	        	<button type="submit" name="submit" class="btn btn-info">Submit</button>
	        	</li>
	        </ul>
	    </div>
 	</div>
        </form>
 
    </div><!-- /.container -->
     <hr>
<?php
$this->load->view('admin/vwFooter');
?>