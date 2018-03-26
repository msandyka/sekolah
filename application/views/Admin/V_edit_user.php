    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> User Management</a></li>
        <li class="active">Update</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php $id=$editUser['id_user'];echo base_url('Admin/UpdateDataUser/').$id;?>">
              <div class="box-body">
                <div class="col-lg-10 col-lg-offset-1">
                  <?php
                    echo $error;
                  ?>
                </div>
                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">Username</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username..."  value="<?php echo $editUser['user_name'];?>" data-toggle="tooltip" data-placement="right" title="minimal character 6, tidak boleh pakai spasi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Ganti Password</label>

                  <div class="col-sm-6">
                    <input type="checkbox" id="CekPass" name="gantiPSW" value="1">
                  </div>
                </div>
                <div class="form-group hide" id="PassLama">
                  <label for="password" class="col-sm-3 control-label">Password Lama</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="passLama" id="passLama" placeholder="Password Lama..." value="<?php echo $editUser['user_pass'];?>">
                  </div>
                </div>
                <div class="form-group hide" id="PassBaru">
                  <label for="password" class="col-sm-3 control-label">Password Baru</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru..."  onKeyUp="passwordStrength(this.value)">
                  </div>
                </div>
                 <div class="form-group hide" id="passStrength">
                  <label for="password" class="col-sm-3 control-label"></label>

                  <div class="col-sm-6">
                    <div id="passwordDescription"></div>
                    <div id="passwordStrength" class="strength0"></div>
                    <span id="passstrength"></span>
                  </div>
                </div>
                <div class="form-group hide" id="RePass">
                  <label for="txtConfirmPassword" class="col-sm-3 control-label">Retype Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Retype Password..."  onKeyUp="checkPassword(this.value)">
                     <!-- <span class="form-control-feedback glyphicon" id="txtConfirmPassword1"></span> -->
                  </div>

                  <div class="col-sm-1">
                    <span class="form-control-feedback glyphicon" id="txtConfirmPassword1"></span>
                  </div>
                 
                </div>
                <div class="form-group">
                  <label for="fullname" class="col-sm-3 control-label">User Fullname</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Masukkan User Fullname..."  value="<?php echo $editUser['user_fullname'];?>" style="text-transform:uppercase;" data-toggle="tooltip" data-placement="right" title="minimal character 6">
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_user" class="col-sm-3 control-label">NIK User</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Masukkan NIK User..."  value="<?php echo $editUser['user_uniqueid'];?>" data-toggle="tooltip" data-placement="right" title="minimal character 6">
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_user" class="col-sm-3 control-label">Resposibility</label>

                  <div class="col-sm-6">
                    <div class="radio">
                      <label>
                        <input type="radio" name="user_lev" value="1" id="user_lev" <?php if($editUser['user_level']==1) {echo "checked";}?>>
                        <b>Admin</b>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="user_lev" value="2" id="user_lev" <?php if($editUser['user_level']==2) {echo "checked";}?>>
                        <b>User</b>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button onclick="window.history.back()" type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
