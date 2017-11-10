  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=HTTP_LTE_PATH?>plugins/iCheck/all.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staffs Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button controller -->
      <div class="row">
        <div class="col-xs-12">
            <?php if(count(array_intersect($this->session->userdata('roles'),PERMISSION_BUTTON)) > 0): ?>
            <button type="button" class="btn btn-info margin-bottom" data-toggle="modal" data-target="#modal-info">
                <i class="fa fa-user-plus"></i> Add User
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
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th>From</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($users as $user):?>
                <tr>
                  <td><?=$user->id?></td>
                  <td><?=$user->last_name.' '.$user->first_name?></td>
                  <td><?=$user->email?></td>
                  <td><?=$user->signup_date?></td>
                  <td><?=($user->deleted=='N')?'<span class="label label-success">Working</span>':'<span class="label label-danger">Denied</span>'?></td>
                  <td><?=$user->role?></td>
                  <td><?=$user->register_by?></td>
                  <td>
                      <a class="btn btn-xs btn-primary detail_register" data-info="<?=$user->id?>"><i class="fa fa-eye"></i></a>
                      <?php if($this->session->userdata('uid') == 1): ?>
                      <a class="btn btn-xs btn-success edit_register" data-info="<?=$user->id?>"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-xs btn-danger delete_register" data-info="<?=$user->id?>"><i class="fa fa-trash"></i></a>
                        <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
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
              <h4 class="modal-title">Create new user </h4>
            </div>
            <form role="form" id="frm-register-user">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="box-body">
                        <i class="required" id="notify_register"></i>
                        <div class="form-group">
                            <label for="full-name">Last name <i class="required">*</i>
                                <input type="text" name="last_name" class="form-control col-xs-6" id="last-name" placeholder="Enter last name" required >
                            </label>
                            <label for="first-name">First name
                                <input type="text" name="first_name" class="form-control col-xs-6" id="first-name" placeholder="Enter first name" >
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address <i class="required">*</i></label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <i class="required">*</i></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm password <i class="required">*</i></label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_mobile">Phone number <i class="required">*</i></label>
                            <input type="tel" name="phone_mobile" class="form-control col-xs-6" id="phone_mobile" placeholder="Enter phone number" required >
                        </div>
                        <div class="form-group">
                            <label for="address_street">Address </label>
                            <input type="text" name="address_street" class="form-control col-xs-6" id="address_street" placeholder="Enter address" >
                        </div>
                        <div class="form-group">
                            <label for="select-group">Groups <i class="required">*</i></label>
                            <select class="form-control" name="role" required>
                                <option value="">Please choose a Group...</option>
                                <?php if(count($groups) > 0): foreach($groups as $group): ?>
                                <option value="<?=$group->group_value?>"><?=$group->group_name?></option>
                              <?php endforeach; endif ?>
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

      <!-- End row list 
      <h2>Set Permission </h2>
      <div class="row permission">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header"> Groups </div>
            <div class="box-body">

              <div class="form-group">
                <label>SEO : </label>
                <label>
                  <input type="checkbox" class="flat-red" checked> Add
                </label>

                <label>
                  <input type="checkbox" class="flat-red" checked> Edit
                </label>

                <label>
                  <input type="checkbox" class="flat-red"> Delete
                </label>

              </div>

              <div class="form-group">
                <label>TECH : </label>
                <label>
                  <input type="checkbox" class="flat-red" checked> Add
                </label>

                <label>
                  <input type="checkbox" class="flat-red" checked> Edit
                </label>

                <label>
                  <input type="checkbox" class="flat-red"> Delete
                </label>

              </div>

              <div class="form-group">
                <label>STORE : </label>
                <label>
                  <input type="checkbox" class="flat-red" checked> Add
                </label>

                <label>
                  <input type="checkbox" class="flat-red" checked> Edit
                </label>

                <label>
                  <input type="checkbox" class="flat-red"> Delete
                </label>

              </div>

              <div class="form-group">
                <label>Q&A : </label>
                <label>
                  <input type="checkbox" class="flat-red" checked> Add
                </label>

                <label>
                  <input type="checkbox" class="flat-red" checked> Edit
                </label>

                <label>
                  <input type="checkbox" class="flat-red"> Delete
                </label>

              </div>

              <div class="form-group">
                <label>ADMIN : </label>
                <label>
                  <input type="checkbox" class="flat-red" checked> Add
                </label>

                <label>
                  <input type="checkbox" class="flat-red" checked> Edit
                </label>

                <label>
                  <input type="checkbox" class="flat-red"> Delete
                </label>

              </div>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-block btn-primary pull-right">Update</button>
            </div>
          </div>
        </div>
      </div>
-->
    </section>
    <!-- /.content -->
  </div>