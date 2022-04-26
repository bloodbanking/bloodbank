<?php
  include('header.php');
?>



<div id="myCarousel" class="main-carousel carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>


  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./jpg/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./jpg/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./jpg/3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./jpg/4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./jpg/5.jpg" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <img src="./jpg/6.jpg" class="d-block w-100" alt="...">
    </div>
</div>
<!--    -->
</div>



<script type="text/javascript">
var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: false
})  
</script>








  <div class="over-carousel">
    <div class="over-carousel-first"></div>

    <div class="container"><br><br>
      <div class="title">
        <div class="row justify-content-md-center">
          <div class="col-md-3 text-center">
            <img src="./png/logo.png" width="100%">
          </div>
        </div>






        <h1 class="display-4 text-center c-white">
        <b>سولی بڵۆد بانك  </b>
        </h1>
        <br><br>
        <div class="row justify-content-md-center">
          <div class="col-md-8 text-center">  <h5>
          خوێن. جیهانیانە دەناسرێتەوە هەروەك بەهادارترین. پێكهاتە كە ژیان دەهێڵێتەوە ئەو بێشومار خەڵك ڕزگار دەكات و دەژییێت لە جیهان لە حاڵەتی جۆر.ساڵانە نزیكەی ١٠٨ ملیۆن خوێن بەخشین لە سەرتاسەری جیهاندا كۆدەبێتەوە كە لەسەدا ١٥ ی دانیشتوانی جیهانن و تەمەنیان لە نێوان ١٨بۆ ٧٠ساڵی دایە
         </h5>
          </div>
        </div>




        <br><hr><br>
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="alert alert-light text-center">
            <b> ڤیدیۆی ناو ماڵپەڕی یوتووب</b>
            </div>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/mF917dWWhV8" frameborder="0"
             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="alert text-center">
        لەکاتی هەبونی هەر کێشەیاک ئاگادارمان بکەنەوە لە ڕێگای
        <button type="button" ><a href="https://www.facebook.com/uhd.edu.iq/">facebook</a></button>
        

        
      </div>
      
    </div>
  </div>



















<?php
  include('footer.php');
?>