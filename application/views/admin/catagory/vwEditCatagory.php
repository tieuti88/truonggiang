<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Edit Catagory</small></h1>
</div>
    <div class="container">
        <form method="post" action="/admin/catagory/edit/<?=$catagory->id?>" enctype="multipart/form-data">
	        <ul>
	        	<input type="hidden" name="id" value="<?=$catagory->id?>">
	        	<li><label >Title : </label><input type="text" name="title" value="<?=$catagory->title?>"></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<li>
	        		<label>
	        			Thumbnail :
	        		</label>
	        		<a href="/vendor/filemanager/filemanager/dialog.php?type=0" class="iframe-btn">Add thumbnail image</a>
	        	</li>
	        	<li>
	        	<label>Hagtag</label>
	        	<input type="text" name="hagtag" placeholder="#box, #card" value="<?=$catagory->hagtag?>">
	        	</li>
	        	<li><label >Content : </label><textarea name="content" id="content" name="content"><?=$catagory->content?></textarea>
	        	<script>
					CKEDITOR.config.startupMode = 'source';
	                CKEDITOR.replace( 'content' );
	            </script></li>
	        	<button type="submit" name="submit" class="btn btn-info">Submit</button>
	        	
	        </ul>
        </form>
 
    </div><!-- /.container -->
     <hr>
<?php
$this->load->view('admin/vwFooter');
?>