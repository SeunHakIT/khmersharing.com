

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
          <div class="swiper-slide">
            <?php 

            if($result){
              while($row=$result->fetch_assoc()){?>


                <h1><img src="administrator/images/<?php $row['image']; ?>" alt=""></h1>



                <?php  } }?>


              </div>

            </div>
            <!-- Add Pagination -->

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>


        </div>

      </div>

    </div>
  </div>



