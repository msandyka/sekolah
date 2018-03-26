<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stembase</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/temp/AdminLTE-2.4.2/bower_components/font-awesome/css/font-awesome.min.css')?>">


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/full-width-pics.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">SMK Negeri 7 Semarang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php
            if ($activeMenu=="home") {
              $home="active";
              $articles="";
              $gallery ="";
            } elseif ($activeMenu=="articles") {
              $home="";
              $articles="active";
              $gallery ="";
            } elseif ($activeMenu=="gallery") {
              $home="";
              $articles="";
              $gallery ="active";
            }
          ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo $home; ?>">
              <a class="nav-link" href="<?php echo base_url()?>">Home
                <!-- <span class="sr-only">(current)</span> -->
              </a>
            </li>
            <li class="dropdown <?php echo $articles; ?>">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Articles<span class="caret"></span></a>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a class="dropdown-item" href="<?php echo base_url('Articles')?>">Article1</a>
                  <a class="dropdown-item" href="#">Page 1-2</a>
                  <a class="dropdown-item" href="#">Page 1-3</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item  <?php echo $gallery; ?>">
              <a class="nav-link" href="<?php echo base_url('Gallery')?>">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
           <!--  <li class="dropdown">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Admin
                <span class="caret"></span></a>
                <div class="dropdown-menu login">
                  <div style="text-align: center;">
                    <i class="fa fa-user-circle" style="font-size: 56px;color: #333;padding-bottom: 10px"></i>
                  </div>
                  <div class="form-group">
                    <label for="usr">Username:</label>
                    <input class="form-control" placeholder="Username" type="text" name="txt-username" required>
                  </div>
                  <div class="form-group">
                    <label for="pass">Password:</label>
                    <input class="form-control" placeholder="Password" type="password" name="txt-password" required>
                  </div>
                  <button class="btn btn-success">Login</button>
                </div>
            </li>
 -->         <li class="nav-item">
                <?php if ($loged) {
                  $href=base_url('Admin');
                  $target='';
                }else{
                  $href='#';
                  $target='data-target="#mdl-login" data-toggle="modal"';
                } ?>
                <a type="button" class="btn btn-outline-success" href="<?php echo $href; ?>" <?php echo $target; ?>>
                 Admin
                </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<div class="modal fade" id="mdl-login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="<?php  echo base_url('Login') ?>">
          <div style="text-align: center;">
            <img src="<?php echo base_url('assets/img/flat-faces-icons-circle-6-min.png')?>" alt="Avatar" class="rounded-circle" style="width:200px">
          </div>
        
          <div class="container">
             <div class="form-group">
                <label for="usn">Username:</label>
                <input type="text" class="form-control" name="uname" id="usn">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="passw" id="pwd">
              </div>
              <!-- <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div> -->
              <button type="submit" class="btn btn-default">Submit</button>
          </div>
    
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>

   