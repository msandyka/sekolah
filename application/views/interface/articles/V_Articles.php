  <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>

          <?php foreach ($getAllPost as $gap) { ?>
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo base_url('assets/img/750x300.png') ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $gap['title']; ?></h2>
              <?php if ($gap['preview']=='' || $gap['preview']==NULL) {
                $gap['preview']=substr($gap['content'],0,50);
              } ?>
              <p class="card-text"><?php echo $gap['preview']; ?></p>
              <a href="<?php echo base_url('Articles/post/'.$gap['id_post'])?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php $fixDate = date("d/M/Y", strtotime($gap['create_timestamp'])); ?>
              Posted on <?php echo $fixDate ?> by
              <a href="#"><?php echo $gap['create_user'] ?></a>
            </div>
          </div>
          <?php } ?>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo base_url('assets/img/750x300.png') ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="<?php echo base_url('Articles/post/0')?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo base_url('assets/img/750x300.png') ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="<?php echo base_url('Articles/post/0')?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo base_url('assets/img/750x300.png') ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="<?php echo base_url('Articles/post/0')?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

      