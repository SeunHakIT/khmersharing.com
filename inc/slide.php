

<?php ob_start(); ?>



<?php

$select =("SELECT

                 *

  FROM 

  (SELECT 

                 *

  FROM videos

  ORDER BY id DESC

  LIMIT 5

  ) AS a

  ORDER BY id");



$result=$db->select($select);

?>

<div class="top-content">

  <div class="row">

    <div class="col-md-12">



     <div class="container">


       <!-- Swiper -->
       <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">Slide 1</div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
          <div class="swiper-slide">Slide 4</div>
          <div class="swiper-slide">Slide 5</div>
          <div class="swiper-slide">Slide 6</div>
          <div class="swiper-slide">Slide 7</div>
          <div class="swiper-slide">Slide 8</div>
          <div class="swiper-slide">Slide 9</div>
          <div class="swiper-slide">Slide 10</div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>



    </div>

  </div>

</div>
</div>



