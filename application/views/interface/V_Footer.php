 <footer class="py-5 bg-primary">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript">var base_url = <?php echo base_url(); ?></script>
    <script src="<?php echo base_url('assets/temp/AdminLTE-2.4.2/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-4.0.0-dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/front_end.js');?>"></script>
 
 <script>
// Get the elements with class="column"
// var elements = document.getElementsByClassName("column");

// // Declare a loop variable
// var i;

// // Full-width images
// function one() {
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.msFlex = "100%";  // IE10
//         elements[i].style.flex = "100%";
//     }
// }

// // Two images side by side
// function two() {
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.msFlex = "50%";  // IE10
//         elements[i].style.flex = "50%";
//     }
// }

// Four images side by side
// function four() {
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.msFlex = "25%";  // IE10
//         elements[i].style.flex = "25%";
//     }
// }

// // Add active class to the current button (highlight it)
// var header = document.getElementById("myHeader");
// var btns = header.getElementsByClassName("btn-gal");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("active-gal");
//     current[0].className = current[0].className.replace("active-gal", "");
//     this.className += " active-gal";
//   });
// }
</script>
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
//     // $('#myModal').modal('hide');
//     var src=$(this).attr('src');
//     alert(src);
//     $('#img01').attr('src',src);
//     // $('#myModal').modal('show');
//   })
// })

$('.gal-gal').click(function(){
  var src = $(this).attr('src');
   $('#img01').attr('src',src);

})
</script>

  </body>

</html>