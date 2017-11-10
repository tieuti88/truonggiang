<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=AVATAR_CUSTOMER?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('user_name')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview" id="dashboard">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span>
          </a>
        </li>
        <li class="" id="customer_manager">
          <a href="/customer">
            <i class="fa fa-folder" aria-hidden="true"></i> <span>Customers Manager</span>
          </a>
        </li>
        <li class="treeview" id="order">
          <a href="#">
            <i class="fa fa-tasks" aria-hidden="true"></i><span>Orders Managers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="index"><a href="/order"><i class="fa fa-hand-o-right" aria-hidden="true"></i></i> Orders List</a></li>
          </ul>
        </li>

        <?php if(count(array_intersect($this->session->userdata('roles'),PERMISSION_MENU)) > 0): ?>
        <li class="treeview" id="managers">
          <a href="#">
            <i class="fa fa-cogs" aria-hidden="true"></i><span>Managers  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="index"><a href="/staff"><i class="fa fa-hand-o-right" aria-hidden="true"></i></i> Staffs </a></li>
            <li class="groups"><a href="/groups"><i class="fa fa-hand-o-right" aria-hidden="true"></i></i> Groups </a></li>
          </ul>
        </li>
      <?php endif ?>
        <li class="">
          <a href="/login/logout">
            <i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  