 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
             <div class="box-header">
              <a href="<?php echo base_url('Admin/InsertDataUser');?>" style="float:right;margin-right:3%;margin-top:-35px;" title="Add New" >
                  <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover example2">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>User Fullname</th>
                  <th>User ID Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach ($listUser as $key) {?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $key['user_name'];?></td>
                      <td><?php echo $key['user_fullname'];?></td>
                      <td><?php echo $key['user_uniqueid'];?></td>
                      <td align="center">
                        <a href="<?php $id=$key['id_user'];echo base_url('Admin/EditDataUser/').$id;?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php $id=$key['id_user'];echo base_url('Admin/deleteDataUser/').$id;?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>