<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
<script src="<?=HTTP_JS_CKEDITOR_ADMIN?>ckeditor.js"></script>

 
<div class="page-header container">
  <h1><small>Edit Project</small></h1>
</div>
    <div class="container">
        <form method="post" action="/admin/project/edit_project/<?=$project->id?>" enctype="multipart/form-data">
        <div class="col-sm-8">
	        <ul>
	        	<li><img src="/uploads/<?=$project->thumb?>" width="100px"><label><a href="#"> Remove</a></label></li>
	        	<li><label for="thumb">Image : </label><input type="file" name="thumb"></li>
            <li><label >Customer : </label><input type="text" name="customer_name" placeholder="Tên công ty" value="<?=$project->customer_name?>"></li>
            <li><label >Title : </label><input type="text" name="title" value="<?=$project->title?>"></li>
            <li><label >Desciption : </label><textarea name="desciption" placeholder="Mô tả dự án"><?=$project->desciption?></textarea></li>
	        	<li><label >Content : </label><textarea name="content" id="content" name="content"><?=$project->content?></textarea>
	        	<script>
	                CKEDITOR.replace( 'content' );
	            </script></li>
            <li><label >Design by : </label><input type="text" name="design_by" placeholder="Design by..." value="<?=$project->design_by?>"></li>
	        	<li><label >Author : </label><select name="author"><option value="admin">Admin</option></select></li>
	        	<li>
	        	<input type="hidden" name="id" value="<?=$project->id?>">
	        	<button type="submit" name="submit" class="btn btn-info">Submit</button>
	        	</li>
	        </ul>
	    </div>
	    <div class="col-sm-4">
 		<div class="box-right box-catagory">
 			<h2 class="box-title">Catagory</h2>
 			<ul>
 				<li><label><input type="checkbox" name="catagory_id[]"> Parent</label></li>
 				<?php 
 				$choosed = json_decode($project->catagory_id);
 				$checked = array();
 				if($choosed != 0)
 					foreach ($choosed as $cat_id) { $checked[$cat_id] = 'checked="checked"'; }
 				foreach ($catagoris as $kCat => $catagory) : ?>
 				
 					<li><label><input type="checkbox" name="catagory_id[]" value="<?=$kCat?>" <?=(isset($checked[$kCat]))?$checked[$kCat]:''?> > <?=$catagory->title?></label></li> 
 				<?php endforeach ?>
 			</ul>
 		</div>
    
    <div class="box-right box-catagory">
      <h2 class="box-title">logo Customer</h2>
      <div><img src="/uploads/<?=@$project->logo_customer?>" title="logo khach hang"/ width="60" height="60" ></div>
      <div><label><a href="#" id="remove_logo"> Remove</a></label></div>
      <div><label for="logo_customer">Add Image : </label><input type="file" name="logo_customer"></div>
    </div>

 	</div>
        </form>
 
    </div><!-- /.container -->
     <hr>
<?php
$this->load->view('admin/vwFooter');
?>