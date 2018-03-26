<!-- Header -->
<div class="header-gal" id="myHeader">
  <h1>stembagram</h1>
  <p>Cause every moment is precious*</p>
<!--   <button class="btn-gal" onclick="one()">1</button>
  <button class="btn-gal active-gal" onclick="two()">2</button> -->
<!--   <button class="btn-gal active-gal" onclick="four()">4</button> -->
</div>

<!-- Photo Grid -->
<div class="row-gal" style="padding-bottom: 20px"> 
  <div class="column">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'wedding.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'rocks.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'falls2.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'paris.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'nature.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'mist.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'paris.jpg';?>" style="width:100%">
  </div>
  <div class="column">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'underwater.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'ocean.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'wedding.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'mountainskies.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'rocks.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'underwater.jpg';?>" style="width:100%">
  </div>  
  <div class="column">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'wedding.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'rocks.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'falls2.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'paris.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'nature.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'mist.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'paris.jpg';?>" style="width:100%">
  </div> 
  <div class="column">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'underwater.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'ocean.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'wedding.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'mountainskies.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'rocks.jpg';?>" style="width:100%">
    <img class="gal-gal" data-toggle="modal" data-target="#myModal" src="<?php echo base_url('assets/img/').'underwater.jpg';?>" style="width:100%">
  </div>
</div>

<!-- The Modal -->
<!-- <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1337; top: 0;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" src="#">
  <div id="caption"></div>
</div> -->

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="width: 100vw;margin-left:-80">
    <div class="modal-dialog modal-lg">
      <img id="img01" style="width: 100%">
    </div>
  </div>

<script>
// Get the modal
// var modal = document.getElementById('myModal');

// // Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById('myImg');
// var modalImg = document.getElementById("img01");
// var captionText = document.getElementById("caption");
// img.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     captionText.innerHTML = this.alt;
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() { 
//     modal.style.display = "none";
// }

// $('.gal-gal').each(function(){
//   $(this).click(function(){
//     $('#myModal').modal('hide');
//     var src=$(this).attr('src');
//     $('#img01').attr('src',src);
//     $('#myModal').modal('show');
//   })
// })
</script>
