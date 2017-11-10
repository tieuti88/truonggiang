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
        <div class="panel-heading">Contact List </div>
        <!-- Table -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Họ và tên</th>
              <th>Email</th>
              <th>Nội dung</th>
              <th>Ngày tạo</th>
              <th>status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($contacts as $contact) : ?>
            <tr>
              <td><?=$contact->id?></td>
              <td><?=$contact->name?></td>
              <td><?=$contact->email?></td>
              <td><?=$contact->content?></td>
              <td><?=$contact->createdate?></td>
              <td><?=$contact->isdelete?'Delete':'Active'?></td>
              <td>
                  <a href='#' title='View'> <i class="fam-zoom"></i></a>
                 <a href='#' title='Edit'><i class="fam-user-edit"></i></a>
                 <a href='#' title='Block'><i class="fam-user-gray"></i></a>
                 <a href='#' title='Delete'><i class="fam-user-delete"></i></a>
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