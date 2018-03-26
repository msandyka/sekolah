 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover example2">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Content</th>
                  <th>Preview</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach ($listPost as $post) {?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $post['title'];?></td>
                      <td><?php echo $post['content'];?></td>
                      <td><?php echo $post['preview'];?></td>
                      <td align="center">
                        <a href="<?php echo base_url('Admin/CheckPost/').$post['id_post'];?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                 <?php } ?>
                </tbody>
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