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
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  <!-- Initialize Swiper -->
  <script>
        var swiper = new Swiper({
            el: '.swiper-container',
             slidesPerView: 'auto',
            initialSlide: 2,
            spaceBetween: 50,
            slidesPerView: 2,
            centeredSlides: true,
            slideToClickedSlide: true,
           
            loop: true,
            autoplay: {
            delay: 5000,
                  },
            scrollbar: {
              el: '.swiper-scrollbar',
            },
        
            mousewheel: {
              enabled: false,
            },
            keyboard: {
              enabled: true,
            },
            pagination: {
              el: '.swiper-pagination',
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },

        });
    </script>
      <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 40,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
       
            loop: true,
            autoplay: {
            delay: 5000,
                  },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>

    <script id="_wauwa7">var _wau = _wau || []; _wau.push(["tab", "1ezi95t3lu", "wa7", "left-middle"]);</script><script async src="//waust.at/t.js"></script>
   
</body>

</html>