  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>plugins/iCheck/all.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Groups Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Groups Manager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button controller -->
      <div class="row">
        <div class="col-xs-12">
            <?php if(count(array_intersect($this->session->userdata('roles'),PERMISSION_BUTTON)) > 0): ?>
            <button type="button" class="btn btn-info margin-bottom" data-toggle="modal" data-target="#modal-info">
                <i class="fa fa-user-plus"></i> Add Group
            </button>
            <?php endif ?>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List </h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Group name</th>
                  <th>Descrition</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                <?php if(!empty($groups)): foreach ($groups as $group): ?>
                <tr>
                  <td><?=$group->id?></td>
                  <td><?=$group->group_name?></td>
                  <td><?=$group->desc?></td>
                  <td><?=$group->date_created?></td>
                  <td><?=($group->status=='active')?'<span class="label label-success">Working</span>':'<span class="label label-danger">Denied</span>'?></td>
                  <td><?=$group->group_value?></td>
                  <td>
                      <a class="btn btn-xs btn-primary detail_register" data-info="<?=$group->id?>"><i class="fa fa-eye"></i></a>
                      <?php if($this->session->userdata('uid') == 1): ?>
                      <a class="btn btn-xs btn-success edit_register" data-info="<?=$group->id?>"><i class="fa fa-edit"></i></a>
                      	<?php if($group->status == 'active'): ?>
                  		<a class="btn btn-xs btn-danger delete_register" data-status="<?=$group->status?>" data-info="<?=$group->id?>"><i class="fa fa-ban"></i></a>
                  		<?php else: ?>
						<a class="btn btn-xs btn-warning delete_register" data-status="<?=$group->status?>" data-info="<?=$group->id?>"><i class="fa fa-unlock"></i></a>
                        <?php endif; ?>
                        <a href="/groups/permission/<?=$group->id?>" class="btn btn-xs btn-default config"><i class="fa fa-cog"></i></a>
                        <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; endif; ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create new group </h4>
            </div>
            <form role="form" id="frm-register-group">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="box-body">
                        <i class="required" id="notify_register"></i>
                        <div class="form-group">
                            <label for="full-name">Group name <i class="required">*</i>
                                <input type="text" name="group_name" class="form-control col-xs-6" id="group_name" placeholder="Enter group name" required >
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description <i class="required">*</i></label>
                            <textarea name="desc" class="form-control" id="desc" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="select-group">Group value <i class="required">*</i></label>
							               <input type="text" class="form-control" id=select-group name="group_value" placeholder="ex:pkd, pkh">
                        </div>
                        <div class="form-group">
                            <label for="select-group">Status <i class="required">*</i></label>
							<select class="form-control" name="status" id="status">
								<option value="denied">Denied</option>
								<option value="active">Active</option>
							</select>
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="register-submit"><i class="fa fa-user-plus"></i> Add</button>
                <button type="submit" class="btn btn-primary" style="display: none;" id="register-edit-submit"><i class="fa fa-edit"></i> Update</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    
    <!-- modal detail user -->
        <div class="modal fade" id="modal-detail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Detail user </h4>
            </div>
                <div class="modal-body">
                    <div class="box-body">
                        <input type="hidden" name="user-id" value="">
                        <div class="form-group">
                            <label for="photo">Photo
                            </label><span id="photo"></span>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last name
                            </label><span id="last_name"></span>
                        </div>
                        <div class="form-group">
                            <label for="full-name">First name
                            </label><span id="first_name"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address </label>
                            <span id="email"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label> 
                            <button type="button" class="btn btn-danger btn-xs" id="reset_password">Reset Password</button>
                        </div>
                        <div class="form-group">
                            <label for="phone_mobile">Phone number</label>
                            <span id="phone_mobile"></span>
                        </div>
                        <div class="form-group">
                            <label for="address_street">Address </label>
                            <span id="address_street"></span>
                        </div>
                        <div class="form-group">
                            <label for="register_by">Register from </label>
                            <span id="register_by"></span>
                        </div>
                        <div class="form-group">
                            <label for="signup_date">Register date </label>
                            <span id="signup_date"></span>
                        </div>
                        <div class="form-group">
                            <label for="role">Groups </label>
                            <span id="role">Staff</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                      </div>
                </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      
    </section>
    <!-- /.content -->
  </div>