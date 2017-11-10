<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Add Customer</small></h1>
</div>
 <form method="post" action="/admin/customer/add_customer" enctype="multipart/form-data">
    <div class="container">
        <div class="col-sm-12">
       
	        <ul>
	        	<li><label for="thumb">Image : </label><input type="file" name="thumb"></li>
	        	<li><label >Title : </label><input type="text" name="title"></li>
	        	<li><label >Link : </label><textarea name="link" id="link" name="link"></textarea></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<button type="submit" name="submit">Submit</button>
	        </ul>

 	</div>
</form>
</div><!-- /.container -->
<?php
$this->load->view('admin/vwFooter');
?>