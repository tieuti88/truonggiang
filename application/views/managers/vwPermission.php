  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>plugins/iCheck/all.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Groups setting</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/groups"><i class="fa fa-hand-o-right"></i> Groups Manager</a></li>
        <li class="active">Groups setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- /.row -->
      <div class="row">	
        <div class="col-xs-3">
        	<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$group->group_name?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <i class="fa fa-book margin-r-5"></i>Role name : <strong> <?=$group->group_value?> </strong>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

              <p><?=$group->desc?></p>
            </div>
            <!-- /.box-body -->
          </div>

	            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-create">Create Permission</button>

        </div>
		<!-- End right column -->

		<div class="col-xs-9">
			<div class="box box-warning">
			<div class="box-header with-border">
              <h3 class="box-title">Permission</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	
            	<div class="col-xs-12">
            	<?php if(empty($permission)): ?>
            		No data
            	<?php else: ?>


            	<?php endif; ?>
				
				<h2>Set Permission </h2>
			    <div class="row permission">
			        <div class="col-md-12">
			        <form role="form" id="form_update_permission">
			        <input type="hidden" name="role" value="<?=$group->group_value?>">
			          <div class="box box-danger">
			            <div class="box-header"> Groups </div>
			            <div class="box-body">
			            <?php foreach ( $all_permissions as $controller => $all_permission ): ?>
			              <div class="form-group" id="checkbox_area">
			                <label><?=$controller ?> </label>
			                <?php foreach ($all_permission as $action => $role): ?>
			                <label>
			                	<input type="hidden" class="flat-red" name="permission[<?=$controller?>][<?=$action?>]" value="<?=(@in_array($group->group_value,$role))?1:0?>">
			                  <input type="checkbox" <?=(@in_array($group->group_value,$role))?'checked':''?> class="flat-red" > <?=$action?>
			                </label>
							<?php endforeach; ?>
			                </label>

			              </div>

			            <?php endforeach; ?>
			            </div>
			            <div class="box-footer">
			                <button type="submit" class="btn btn-block btn-info pull-right" id="update_permission">Update</button>
			            </div>
			          </div>
			          </form>
			        </div>
			    </div>

            	</div>
              
            </div>
            <!-- /.box-body -->
		</div>

      </div>

      

      
    </section>

    <!-- modal detail user -->
        <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create permission </h4>
            </div>
            <form role="form" id="frm-permission">
            	<input type="hidden" name="role" value="admin">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="permission">Controller : 
                            </label>
                            <input type="text" class="form-control" name="controller" value="" id="permission">
                        </div>
                        <div class="form-group">
                            <label for="action">Action : 
                            </label>
                            <input type="text" class="form-control" name="action" value="" id="action">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" ><i class="fa fa-plus"></i> Add</button>
                      </div>
                </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <!-- /.content -->
  </div>