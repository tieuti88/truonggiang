<?php
$this->load->view('admin/vwHeader');
?>
<!--  
Load Page Specific CSS and JS here
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->
<link href="<?php echo HTTP_CSS_PATH; ?>starter-template.css" rel="stylesheet">
 <style>
/*     .panel{
       margin-left: 55px;
       float: left;
    width: 500px;}
     */
     </style>
<div class="page-header container">
  <h1><small><?=$page?></small></h1>
</div>
    <div class="container">
 <div class="panel panel-default" >
        <!-- Default panel contents -->
        <div class="panel-heading">Catagory List 
          <span style="float:right; margin-top: -7px;"><a class="btn btn-info" href="/admin/catagory/add">Add Catagory</a></span>
        </div>
        <!-- Table -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>SEO title</th>
              <th>Nội dung</th>
              <th>Ngày tạo</th>
              <th>status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($catagoris as $catagory) : ?>
            <tr>
              <td><?=$catagory->id?></td>
              <td><?=$catagory->title?></td>
              <td><?=$catagory->seo_title?></td>
              <td>---</td>
              <td>---</td>
              <td>---</td>
              <td>
                 <a href='/admin/catagory/edit/<?=$catagory->id?>' title='Edit'><i class="fam-user-edit"></i></a>
                 <a href='#' title='Block'><i class="fam-user-gray"></i></a>
                 <a href='/admin/catagory/delete/<?=$catagory->id?>' title='Delete'><i class="fam-user-delete"></i></a>
              </td>
            </tr>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
 
    <ul class="pagination">
      <?=$pagination?>
    </ul>
    </div><!-- /.container -->
     <hr>
<?php
$this->load->view('admin/vwFooter');
?>