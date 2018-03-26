 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Menu List</h3>
              <a style="float:right" alt="Insert Menu" title="Insert Menu" >
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MenuManagement-insertMenu">
                  <i class="fa fa-plus fa-2x"></i>
                </button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover" id="MenuManagement-menuList">
                <thead>
                  <tr>
                    <th style="vertical-align: middle; text-align: center;">No.</th>
                    <th style="vertical-align: middle; text-align: center;">Menu Name</th>
                    <th style="vertical-align: middle; text-align: center;">Action</th>
                    <th style="vertical-align: middle; text-align: center;">Submenu Included</th>
                    <th style="vertical-align: middle; text-align: center;">Type</th>
                    <th style="vertical-align: middle; text-align: center;">Submenu Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no   = 1;
                    foreach ($mainMenuList as $menu) 
                    {
                      $id_menu            =   $menu['id_menu'];
                      $id_menu_encode     =   str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encryption->encrypt($id_menu));
                      $submenu_included   =   $menu['submenu_included'];
                      $multi_post         =   $menu['multi_post'];
                      $priority_involved  =   $menu['priority_involved'];
                      $external_reference =   $menu['external_reference'];
                      $external_site      =   $menu['external_site'];

                      $menu_radio         =   1;

                      if($multi_post == '1' and $external_reference == '0')
                      {
                        $menu_radio = 2;;
                      }

                      if($multi_post == '0' and $external_reference == '1')
                      {
                        $menu_radio = '3';
                      }
                  ?>
                  <tr>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                    <td style="vertical-align: middle;"><?php echo $menu['name'];?></td>
                    <td style="text-align: center; vertical-align: middle;">
                      <a onclick="MenuManagement_updateMenu(<?php echo "'".$id_menu_encode."'";?>, <?php echo "'".$menu['name']."'";?>, <?php echo "'".$submenu_included."'";?>, <?php echo "'".$menu_radio."'";?>, <?php echo "'".$priority_involved."'";?>, <?php echo "'".$external_site."'";?>)" placeholder="Update Menu">
                        <i class="fa fa fa-pencil-square-o fa-2x"></i>
                      </a>
                      <a onclick="MenuManagement_deleteMenu(<?php echo "'".$id_menu_encode."'";?>, <?php echo "'".$menu['name']."'";?>)" placeholder="Delete Menu">
                        <i class="fa fa fa-trash-o fa-2x"></i>
                      </a>
                    </td>
                    <td style="vertical-align: middle;">
                      <?php
                        if($submenu_included==1)
                        {
                      ?>
                      Yes
                      <?php
                        }
                        else
                        {
                      ?>
                      No
                      <?php
                        }
                      ?>
                    </td>
                    <td style="vertical-align: middle;">
                      <?php
                        if($multi_post==0 and $external_reference==0 and $submenu_included==0)
                        {
                          //  Single-post
                      ?>
                      Single-post
                      <?php
                        }
                        elseif($multi_post==1 and $external_reference==0 and $submenu_included==0)
                        {
                          //  Multi-post
                      ?>
                      Multi-post
                      <?php
                          if($priority_involved==1)
                          {
                      ?>
                      - Priority Involved
                      <?php
                          }
                      ?>
                      <?php
                        }
                        elseif($multi_post==0 and $external_reference==1 and $submenu_included==0)
                        {
                          //  External Reference
                      ?>
                      External Reference<br/>
                      <a href="<?php echo $external_site;?>"><?php echo $external_site;?></a>
                      <?php
                        }
                        elseif($multi_post==0 and $external_reference==0 and $submenu_included==1)
                        {
                      ?>
                      -
                      <?php
                        }
                      ?>
                    </td>
                    <td style="vertical-align: middle;">
                      <?php
                        if($submenu_included == 1)
                        {
                      ?>
                      <ul>
                        <?php
                          foreach ($subMenuList as $submenu)
                          {
                            $id_menu_sub1         = $submenu['id_menu_sub1'];
                            $id_menu_sub1_encode  = str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encryption->encrypt($id_menu_sub1));
                            if($submenu['id_menu']==$id_menu)
                            {
                              $sub1_name                = $submenu['name'];
                              $sub1_multi_post          = $submenu['multi_post'];
                              $sub1_external_reference  = $submenu['external_reference'];

                              $sub1_radio               = 1;
                              $sub1_priority_involved   = 0;
                              $sub1_external_site       = NULL;
                              $sub1_type                = 'Single-post';
                              if($sub1_multi_post == '1' and $sub1_external_reference == '0')
                              {
                                $sub1_radio = 2;
                                $sub1_type  = 'Multi-post';
                                if($submenu['priority_involved']=='1')
                                {
                                  $sub1_priority_involved = 1;
                                  $sub1_type  = 'Multi-post, priority involved';
                                }
                              }

                              if($sub1_multi_post == '0' and $sub1_external_reference == '1')
                              {
                                $sub1_radio = '3';
                                $sub1_external_site = $submenu['external_site'];
                                $sub1_type  = 'External Reference -'.$sub1_external_site;
                              }
                        ?>
                        <li>
                          <?php echo $sub1_name;?><br/>
                          <b><?php echo $sub1_type;?></b><br/>
                          <button type="button" class="btn btn-warning btn-sm" onclick="MenuManagement_updateSubmenu(<?php echo "'".$id_menu_sub1_encode."'";?>, <?php echo "'".$sub1_name."'";?>, <?php echo "'".$sub1_radio."'";?>, <?php echo "'".$sub1_priority_involved."'";?>, <?php echo "'".$sub1_external_site."'";?>)">Update</button> - <button type="button" class="btn btn-warning btn-sm" onclick="MenuManagement_deleteSubmenu(<?php echo "'".$id_menu_sub1_encode."'";?>, <?php echo "'".$submenu['name']."'";?>, <?php echo "'".$menu['name']."'";?>)">Delete</button>
                        </li>
                        <?php
                            }
                          }
                        ?>
                        <button type="button" class="btn btn-info btn-sm" onclick="MenuManagement_insertSubmenu(<?php echo "'".$id_menu_encode."'";?>)">
                          <i class="fa fa-plus"></i> Add Submenu
                        </button>
                        <?php
                          }
                          else
                          {
                        ?>
                        <span style="text-align: center; vertical-align: middle;">-</span>
                        <?php
                          }
                        ?>
                      </ul>
                    </td>
                  </tr>
                  <?php
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div id="MenuManagement-insertMenu" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_insertMenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Insert Menu</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="txtMenuName" class="control-label col-lg-2">Menu Name</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" style="width: 100%" name="txtMenuName" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="radioSubmenu" class="control-label col-lg-2">Submenu</label>
                        <div class="col-lg-2">
                          <label for="MenuManagement-radioSubmenuYes" class="control-label">
                            <input type="radio" name="radioSubmenu" value="1" id="MenuManagement-radioSubmenuYes" required="">Yes</input>
                          </label>
                        </div>
                        <div class="col-lg-2">
                          <label for="MenuManagement-radioSubmenuNo" class="control-label">
                            <input type="radio" name="radioSubmenu" value="0" id="MenuManagement-radioSubmenuNo" required="">No</input> 
                          </label>
                        </div>
                      </div>
                      <div class="hidden" id="MenuManagement-configSingleMenu">
                        <div class="form-group">
                          <label for="radioMenuType" class="control-label col-lg-2">Menu Type</label>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="0" class="MenuManagement-radioMenuType" id="MenuManagement-radioMenuTypeSingle" disabled="">Single Post</input>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="1" class="MenuManagement-radioMenuType" id="MenuManagement-radioMenuTypeMulti" disabled="">Multi Post</input>
                          </div>
                          <div class="col-lg-4">
                            <label for="MenuManagement-chkPriorityInvolved" class="control-label">
                              <input type="checkbox" name="chkPriorityInvolved" value="1" id="MenuManagement-chkPriorityInvolved" disabled="">
                              Priority Involved
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="2" class="MenuManagement-radioMenuType" id="MenuManagement-radioMenuTypeExternal" disabled="">External Link</input>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" style="width: 100%" name="txtExternalSite" id="MenuManagement-txtExternalSite" disabled="" placeholder="Write with its protocol (http://****.com; https://****.com; ftp://****.com)">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-hdd-o"></i> Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="MenuManagement-updateMenu" class="modal modal-warning fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_updateMenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Menu</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="txtMenuName" class="control-label col-lg-2">Menu Name</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" style="width: 100%" name="txtMenuName" required="" id="MenuManagement-updateMenu-txtMenuName">
                          <input type="text" class="form-control hidden" name="txtIDMenu" id="MenuManagement-updateMenu-txtIDMenu" value="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="radioSubmenu" class="control-label col-lg-2">Submenu</label>
                        <div class="col-lg-2">
                          <label for="MenuManagement-radioSubmenuYes" class="control-label">
                            <input type="radio" name="radioSubmenu" value="1" id="MenuManagement-updateMenu-radioSubmenuYes" required="">Yes</input>
                          </label>
                        </div>
                        <div class="col-lg-2">
                          <label for="MenuManagement-radioSubmenuNo" class="control-label">
                            <input type="radio" name="radioSubmenu" value="0" id="MenuManagement-updateMenu-radioSubmenuNo" required="">No</input> 
                          </label>
                        </div>
                      </div>
                      <div class="hidden" id="MenuManagement-updateMenu-configSingleMenu">
                        <div class="form-group">
                          <label for="radioMenuType" class="control-label col-lg-2">Menu Type</label>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="0" class="MenuManagement-radioMenuType" id="MenuManagement-updateMenu-radioMenuTypeSingle" disabled="">Single Post</input>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="1" class="MenuManagement-radioMenuType" id="MenuManagement-updateMenu-radioMenuTypeMulti" disabled="">Multi Post</input>
                          </div>
                          <div class="col-lg-4">
                            <label for="MenuManagement-chkPriorityInvolved" class="control-label">
                              <input type="checkbox" name="chkPriorityInvolved" value="1" id="MenuManagement-updateMenu-chkPriorityInvolved" disabled="">
                              Priority Involved
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-2">
                            <input type="radio" name="radioMenuType" value="2" class="MenuManagement-radioMenuType" id="MenuManagement-updateMenu-radioMenuTypeExternal" disabled="">External Link</input>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" style="width: 100%" name="txtExternalSite" id="MenuManagement-updateMenu-txtExternalSite" disabled="" placeholder="Write with its protocol (http://****.com; https://****.com; ftp://****.com)">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-hdd-o"></i> Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="MenuManagement-deleteMenu" class="modal modal-danger fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_deleteMenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Menu</h4>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control hidden" name="txtIDMenu" id="MenuManagement-deleteMenu-txtIDMenu" value="" required="">
                      <p>Are you really want to delete this?</p>
                      <table>
                        <tr>
                          <td><b>Menu Name</b></td>
                          <td> : </td>
                          <td id="MenuManagement-deleteMenu-menuName"></td>
                        </tr>
                      </table>
                      <h4><b><i>All submenu, post and user access related to this menu will be deleted.</i></b></h4>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-trash-o"></i> Delete</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="MenuManagement-insertSubmenu" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_insertSubmenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Insert Submenu</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="txtSubmenuName" class="control-label col-lg-2">Submenu Name</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" style="width: 100%" name="txtSubmenuName" required="">
                          <input type="text" class="form-control hidden" name="txtIDMenu" id="MenuManagement-insertSubmenu-txtIDMenu" value="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="radioSubmenuType" class="control-label col-lg-2">Submenu Type</label>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="0" class="MenuManagement-radioSubmenuType" id="MenuManagement-radioSubmenuTypeSingle" required="">Single Post</input>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="1" class="MenuManagement-radioSubmenuType" id="MenuManagement-radioSubmenuTypeMulti" required="">Multi Post</input>
                        </div>
                        <div class="col-lg-4">
                          <label for="MenuManagement-chkPriorityInvolvedSubmenu" class="control-label">
                            <input type="checkbox" name="chkPriorityInvolved" value="1" id="MenuManagement-chkPriorityInvolvedSubmenu" disabled="">
                            Priority Involved
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="2" class="MenuManagement-radioSubmenuType" id="MenuManagement-radioSubmenuTypeExternal" required="">External Link</input>
                        </div>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" style="width: 100%" name="txtExternalSiteSubmenu" id="MenuManagement-txtExternalSiteSubmenu" disabled="" placeholder="Write with its protocol (http://****.com; https://****.com; ftp://****.com)">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-hdd-o"></i> Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="MenuManagement-updateSubmenu" class="modal modal-warning fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_updateSubmenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Submenu</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="txtSubmenuName" class="control-label col-lg-2">Submenu Name</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" style="width: 100%" name="txtSubmenuName" id="MenuManagement-updateSubmenu-txtSubmenuName" required="">
                          <input type="text" class="form-control hidden" name="txtIDSubmenu" id="MenuManagement-updateSubmenu-txtIDSubmenu" value="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="radioSubmenuType" class="control-label col-lg-2">Submenu Type</label>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="0" class="MenuManagement-radioSubmenuType" id="MenuManagement-updateSubmenu-radioSubmenuTypeSingle" required="">Single Post</input>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="1" class="MenuManagement-radioSubmenuType" id="MenuManagement-updateSubmenu-radioSubmenuTypeMulti" required="">Multi Post</input>
                        </div>
                        <div class="col-lg-4">
                          <label for="MenuManagement-chkPriorityInvolvedSubmenu" class="control-label">
                            <input type="checkbox" name="chkPriorityInvolved" value="1" id="MenuManagement-updateSubmenu-chkPriorityInvolvedSubmenu" disabled="">
                            Priority Involved
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                          <input type="radio" name="radioSubmenuType" value="2" class="MenuManagement-radioSubmenuType" id="MenuManagement-updateSubmenu-radioSubmenuTypeExternal" required="">External Link</input>
                        </div>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" style="width: 100%" name="txtExternalSiteSubmenu" id="MenuManagement-updateSubmenu-txtExternalSiteSubmenu" disabled="" placeholder="Write with its protocol (http://****.com; https://****.com; ftp://****.com)">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-hdd-o"></i> Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="MenuManagement-deleteSubmenu" class="modal modal-danger fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('Admin/MenuManagement_deleteSubmenu/');?>" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Submenu</h4>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control hidden" name="txtIDSubmenu" id="MenuManagement-deleteSubmenu-txtIDSubmenu" value="" required="">
                      <p>Are you really want to delete this?</p>
                      <table>
                        <tr>
                          <td><b>Menu Name</b></td>
                          <td> : </td>
                          <td id="MenuManagement-deleteSubmenu-menuName"></td>
                        </tr>
                        <tr>
                          <td><b>Submenu Name</b></td>
                          <td> : </td>
                          <td id="MenuManagement-deleteSubmenu-submenuName"></td>
                        </tr>
                      </table>
                      <h4><b><i>All post and user access related to this submenu will be deleted.</i></b></h4>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa fa-trash-o"></i> Delete</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>