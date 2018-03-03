<!--Watch main Playser-->


<!-- list movies-->
<div class="col-md-12">
  <div class="movies-list-wrap mlw-topview mt20">
    <div id="sug-cont" class="tab-content">
      <div id="movie-featured" class="movies-list movies-list-full tab-pane in fade active">

        <div id="sug-cont" class="tab-content">
          <div id="movie-featured" class="movies-list movies-list-full tab-pane in fade active">
           <div class="h2_title">
            <h2>Show All</h2>

          </div>
          <div class="custom1">
            <div class="col-md-8">
              <?php
              if(isset($_GET['sub'])) {
                $get_id1 = $_GET['sub'];
                $get_detail1 = ("SELECT id,title,url ,image FROM `sub_videos` WHERE `id`='" . $get_id1 . "' ");
                $result1 = $db->select($get_detail1);
                if($result1){?>
                  <?php while ($row1=$result1->fetch_assoc()) { ?>


                    <div class="wi-heigh">
                      <iframe id="ytplayer" type="text/html" width="100%" height="500"
                      src="https://www.youtube.com/embed/<?php echo $row1['url']; ?>?autoplay=1&cc_load_policy=1&rel=0&showinfo=0&color=white"
                      frameborder="0" allowfullscreen></iframe>
                      <div class="title">
                        <h3 class="movie_title1"> <?php echo $row1['title']; ?></h3>
                      </div>
                    </div>
                    <?php

                  }
                  ?>
                  <?php }?>

                  <?php } ?>

                </div>
              </div>

              <div class="custom">
               <div class="col-md-8">
                <?php
                if(isset($_GET['watch'])) {
                  $get_id = $_GET['watch'];
                  $get_detail = "select *from videos where id='" . $get_id . "' ";
                  $result = $db->select($get_detail);
                  if($result){

                    while ($row=$result->fetch_assoc()) { ?>
                      <?php echo'<style>.custom { display:block;}</style>'; ?>
                      <div class="wi-heigh">
                       <iframe id="ytplayer" type="text/html" width="100%" height="500"
                       src="https://www.youtube.com/embed/<?php echo $row['url']; ?>?autoplay=1&cc_load_policy=1&rel=0&showinfo=0&color=white&modestbranding=1&controls=1"
                       frameborder="0" allowfullscreen></iframe>
                       <div class="title" style="margin-top:10px;">
                             <!-- Trojent Spam -->
                              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                     style="display:inline-block;width:728px;height:90px"
                                     data-ad-client="ca-pub-4050574973781588"
                                     data-ad-slot="5075434226"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            <!-- Trojent Spam -->
                       </div>
                     </div>


                     <?php } ?>
                     <?php } ?>


                     <?php } ?>



                   </div>
                 </div>




                 <div class="col-md-4">


                  <div class="scroll1 " data-spy="scroll" data-target="#myScrollspy" data-offset="20">
                   <!-- Swiper -->
                   <?php
                   if(isset($_GET['watch'])){
                    $get_id1=$_GET['watch'];
                    $selecv="SELECT * FROM videos where id='".$get_id1."'";
                    $showv=$db->select($selecv);
                    if ($showv) {
                     $vds=$showv->fetch_assoc();
                     $showv->fetch_assoc();
                     $show_siabr="SELECT * FROM sub_videos WHERE main='".$get_id1."' ";
                     $get_sub=$db->select($show_siabr);

                     if($get_sub){
                      echo'<style>.scroll1 { display:block;}</style>';  

                      while ($sub=$get_sub->fetch_assoc()) {
                        if($vds['id']==$sub['main']){?>
                          <div class="row">
                           <div class="col-md-3">

                             <div class="clearfix">

                              <div class="image">
                               <a href="watch.php?sub=<?php echo $sub['id']; ?>&main_id=<?php echo $sub['main']; ?>">
                                 <img src=".\administrator\images\<?php echo $sub['image']; ?>" alt="Ronteas dav lohet part 02" class="img-responsive">
                               </a>
                             </div>


                             <a href="watch.php?sub=<?php echo $sub['id']; ?>&main_id=<?php echo $sub['main']; ?>">
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-12">
                              <h3 class="movie_title"><?php echo $sub['title']; ?></h3>

                            </div>
                          </a>
                        </div>
                      </div>
                      <?php } ?>
                      <?php } ?>

                      <?php } ?>


                    </div>

                  </div>



                  <?php if (empty($get_sub)) {?>

                   <div class="col-md-4">

                    <div class="scroll " data-spy="scroll" data-target="#myScrollspy" data-offset="20">
                      <?php 

                      $select =("SELECT
                 *
                       FROM 
                       (SELECT 
                 *
                       FROM videos
                       ORDER BY id DESC
                       LIMIT 15
                       ) AS a
                       ORDER BY id DESC");
                      $result=$db->select($select);
                      if($result){
                        while ($row=$result->fetch_assoc()) { ?>

                          <div class="col-md-3">
                           <div class="row data_list">
                             <div class="clearfix">

                              <div class="image">


                                <a href="watch.php?watch=<?php echo $row['id']; ?>">
                                  <img src=".\administrator\images\<?php echo $row['image']; ?>" alt="Ronteas dav lohet part 02" class="img-responsive">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">

                         <div class="col-md-12">
                          <a href="watch.php?watch=<?php echo $row['id'];?>">

                            <h3 class="movie_title"><?php echo $row['title']; ?></h3>
                            
                          </a>
                        </div>
                      </div>

                      <?php } ?>
                      <?php } ?>

                    </div>
                  </div>


                  <?php } ?>

                  <?php } ?>
                  <?php } ?>

                  <?php
                  if(isset($_GET['main_id'])){
                    $get_id1=$_GET['main_id'];


                    $select ="SELECT * FROM sub_videos where main='".$get_id1."' ";
                    $sub=$db->select($select);
                    ?>
                    <?php  


                    if($sub){
                     echo'<style>.scroll1 { display:block;}</style>'; 
                     while ($vid_sub=$sub->fetch_assoc()) {?>

                       <div class="col-md-3">
                         <div class="row data_list">
                           <div class="clearfix">

                            <div class="image">

                              <a href="watch.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo $vid_sub['main']; ?>"> <img src="./administrator/images/<?php echo $vid_sub['image']; ?>" class="img-responsive"></a>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                       <div class="col-md-12">
                        <a href="watch.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo $vid_sub['main']; ?>">
                         <h3 class="movie_title" ><?php echo $vid_sub['title']; ?></a></h3>

                       </div>
                     </div>

                     <?php } ?>
                     <?php } ?>
                     <?php } ?>







<div class="ads">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9378245461859103",
    enable_page_level_ads: true
  });
</script>
</div>

                     <!--Sibar-->

                   </div>

                 </div>
               </div>
             </div>
           </div>