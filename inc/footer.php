</div>
</div>   
</div>    
</div> 
</div>
</div>
<div class="container">
    <div class="fbb" style="padding-top:10px;">
    <div class="fb-page" data-href="https://www.facebook.com/khmerElearn/" data-tabs="timeline" data-width="230" data-height="60px" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/khmerElearn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/khmerElearn/">Khmersharings</a></blockquote></div>
    </div>
</div>
</div>

<footer class="">
  <div class="container">
   
  
     
         <?php 


    $select =("SELECT
                 *
      FROM 
      (SELECT 
                 *
      FROM footer
      ORDER BY id DESC
      LIMIT 1
      ) AS a
      ORDER BY id");
    $result=$db->select($select);
 if($result)
while ($row=$result->fetch_assoc()) {?>
 <h4><?php echo $row['Copy']; ?></h4>
      
<?php } ?>


  </div><!-- /.container -->
</footer>


<!-- <script type="text/javascript" src="./js/jquery-3.2.1.slim.min.js"></script> -->

<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./js/index.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>

  <!-- Initialize Swiper -->

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
    <script id="_wauwa7">var _wau = _wau || []; _wau.push(["tab", "1ezi95t3lu", "wa7", "left-middle"]);</script><script async src="//waust.at/t.js"></script>
   
</body>

</html>