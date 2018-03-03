
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

                <div class="swiper-container">
                  <div class="swiper-scrollbar"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-wrapper">
                    <?php 

                    if($result){
                      while ($row=$result->fetch_assoc()) { ?>

                       <a href="watch.php?watch=<?php echo $row['id']; ?>">


                        <div class="swiper-slide"><img src="./administrator/images/<?php echo $row['image']; ?>" class="img-responsive">
                         <h6>  <?php echo $row['title']; ?>  </h6> 
                       </a>
                     </div>

                     <?php } ?>


                     <?php } ?>


                   </div>
                   <div class="swiper-pagination"></div>
                 </div>
               </div>

             </div>
           </div>
         </div>

  
