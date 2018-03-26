<?php foreach ($checkPost as $post) {?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Dashboard</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($post['approved']==3):?>
        <div class="row">
          <div class="col-md-12">
             <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> Approved</h4>
              Postingan ini telah di approve.
            </div>
          </div>
        </div>
      <?php elseif($post['approved']==2):?>
        <div class="row">
          <div class="col-md-12">
             <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> REVICE</h4>
              Postingan ini telah di revice, silahkan lakukan pengecekan dan perbaikan kembali.
            </div>
          </div>
        </div>
      <?php elseif($post['approved']==1):?>
        <div class="row">
          <div class="col-md-12">
             <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> REJECT</h4>
              Postingan ini telah di reject, karena mengandung konten yang kurang tepat.
            </div>
          </div>
        </div>
      <?php endif;?>

      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="col-md-11">
                <h3 class="box-title">KONTEN YANG DIAJUKAN</h3>
              </div>
              <div class="col-md-1">
                <input type="checkbox" id="cektitle" class="pull-right">
              </div>
            </div>
            <!-- /.box-header --> 
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-md-12">
                  <label for="id_post" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_post" id="id_post" required="" value="<?php echo $post['title'];?>" disabled/>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-2 control-label">Preview</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="2" name="preview" id="preview" disabled><?php echo $post['preview'];?></textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-2 control-label">Konten</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="8" name="id_post" id="id_post" disabled><?php echo $post['content'];?></textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                  <label for="id_post" class="col-sm-2">Creator</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_post" id="id_post" required="" value="<?php echo $post['create_user'];?>" disabled>
                  </div>
                </div> 

                <div class="form-group col-md-12">
                  <label for="id_post" class="col-sm-2">Creation Date</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_post" id="id_post" required="" value="<?php echo $post['create_timestamp'];?>" disabled>
                  </div>
                </div>           
              </div>
              <input type="hidden" id="hdnApprove" value="<?php echo $post['approved'];?>">
             <?php } ?> 
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <div class="box-header with-border"> -->
                  <div class="col-md-11"></div>
                  <div class="col-md-1">
                    <input type="checkbox" id="cekfooter" class="pull-right">
                  </div>
                <!-- </div> -->
              </div>
              <div class="box-body">
                <div class="col-sm-9">
                  <button onclick="window.history.back()" type="submit" class="btn btn-default">Cancel</button>
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-info pull-right disabled" id="Approve" data-toggle="modal" data-target="#modal-info" disabled="true">Approve</button>
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-danger pull-right disabled" id="Reject" data-toggle="modal" data-target="#modal-danger" disabled="true">Reject</button>
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-warning pull-right disabled" id="Revice" data-toggle="modal" data-target="#modal-warning" disabled="true">Revice</button>
                </div>
              </div>
            <!-- /.box-header -->
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal modal-info fade" id="modal-info">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Approval</h4>
          </div>
          <div class="modal-body">
            <p>Pastikan anda sudah mengecek dengan benar semua konten</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-outline">Save</button> -->
            <a href="<?php echo base_url('Admin/kirimApprove/').$post['id_post'];?>" class="btn btn-outline" id="Approve">Save</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-danger fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Reject</h4>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin membatalkan postingan ini ? Pastikan anda sudah mengecek dengan benar semua konten</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <a href="<?php echo base_url('Admin/kirimReject/').$post['id_post'];?>" class="btn btn-outline" id="Reject">Reject</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-warning fade" id="modal-warning">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Revice</h4>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin merevisi postingan ini ? Pastikan anda sudah mengecek dengan benar semua konten</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <a href="<?php echo base_url('Admin/kirimRevice/').$post['id_post'];?>" class="btn btn-outline" id="Revice">Revice</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->