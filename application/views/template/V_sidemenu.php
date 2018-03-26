<?php
if(!empty($Dashboard)){
  $Dashboard = "active";
}else{
  $Dashboard = "";
}
if(!empty($Posting)){
  $Posting = "active";
}else{
  $Posting = "";
}
if(!empty($AccManager)){
  $AccManager = "active";
}else{
  $AccManager = "";
}
if(!empty($UserMgm)){
  $UserMgm = "active";
}else{
  $UserMgm = "";
}
if(!empty($MenuMgm)){
  $MenuMgm = "active";
}else{
  $MenuMgm = "";
}
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/Icon-user.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username ?></p>
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
        <?php
          if ($this->session->userdata('level')==1) 
          {
        ?>
        <li class="<?php echo $Dashboard;?>">
          <a href="<?php echo base_url('Admin')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php echo $UserMgm;?>">
          <a href="<?php echo base_url('Admin/UserManagement')?>">
            <i class="fa fa-files-o"></i><span>User Management</span>
          </a>
        </li>
        <li class="<?php echo $MenuMgm;?>">
          <a href="<?php echo base_url('Admin/MenuManagement')?>">
            <i class="fa fa-th"></i> <span>Menu Management</span>
          </a>
        </li>
        <?php
          }
          foreach ($menuArr as $singleMenu)
          { 
            $fixMenuId = str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encryption->encrypt($singleMenu['id_menu']));
            if ($singleMenu['submenu_included']==1)
            { 
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span><?php echo $singleMenu['name']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 
              foreach ($subMenuArr as $sMenu)
              { 
                if ($sMenu['id_menu']==$singleMenu['id_menu'])
                {
                  $fixSubMenuId = str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encryption->encrypt($sMenu['id_menu_sub1']));
            ?>
            <li><a href="<?php echo base_url('Admin/PostManagement/'.$fixSubMenuId) ?>"><i class="fa fa-circle-o"></i><?php echo $sMenu['name']; ?></a></li>
            <?php } } ?>
          </ul>
        </li>
        <?php }else{ ?>
        <li class="">
          <a href="<?php echo base_url('Admin/PostManagement/'.$fixMenuId) ?>">
            <i class="fa fa-th"></i> <span><?php echo $singleMenu['name']; ?></span>
          </a>
        </li>
        <?php } } ?>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          </ul>
        </li> -->
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">