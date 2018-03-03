<?php 
ob_start();
?>
<?php 
include './config/sission.php';
Session::checkSession();

?>

<?php 
require_once("header.php");

?>


<?php $db=new Database();

?>
<!--Delect data-->
<?php  
if(isset($_GET['delect_sub'])){
  $get_id=$_GET['delect_sub'];

  $d="DELETE FROM `sub_videos` WHERE id='".$get_id."' ";
  $resul=$db->delete($d);
  header('location:listVideos.php');

}

?>


<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Detail</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <?php  

    if(isset($_GET['sub'])){
      $get_id1=$_GET['sub'];

      $get_detail1=("SELECT id,title,url ,image FROM `sub_videos` WHERE `id`='".$get_id1."' ");
      $result1=$db->select($get_detail1);
      if($result1){?>
        <?php $row1=$result1->fetch_assoc() ;?>
        <div class="col-md-12">
          <iframe id="ytplayer" type="text/html" width="100%" height="500"
          src="https://www.youtube.com/embed/<?php echo $row1['url'];?>?autoplay=1&cc_load_policy=1&rel=0&showinfo=0&color=white"
          frameborder="0" allowfullscreen></iframe>
          <!-- <iframe width="560" height="315" src="//www.youtube.com/embed/<?php //echo $row['url']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe> -->

          <h3><?php echo $row1['title']; ?></h3>

          <hr>

        </div>



        <?php } ?>

        <?php } ?>


        <!-- end -->


        <?php  

        if(isset($_GET['main_id'])){
          $get_id1=$_GET['main_id'];
          $select ="SELECT * FROM sub_videos where main='".$get_id1."' ";
          $sub=$db->select($select);
          if($sub){
           while ($vid_sub=$sub->fetch_assoc()) {?>
            <div class="col-md-2">
              <div class="video height" style="height: 260.484px;">
                <div class="image">
                  <a href="videosdetail.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo $vid_sub['main']; ?>"> <img src="./images/<?php echo $vid_sub['image']; ?>" class="img-responsive"></a>
                </div>

                <div class="title">
                  <a href="videosdetail.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo $vid_sub['main']; ?>">
                   <?php echo $vid_sub['title']; ?></a>

                 </div>
                 <div class="action">

                   <span><a href="videosdetail.php?delect_sub=<?php echo $vid_sub['id']; ?>" "><i class="glyphicon glyphicon-trash"></i>Delect</a></span> &nbsp;||&nbsp;
                   <a  href="updatesub.php?update_sub=<?php echo $vid_sub['id']; ?>"><i class="glyphicon glyphicon-edit"></i>Edite</a></span>
                 </div>


               </div>
             </div>
             <?php } ?>
             <?php } ?>
             <?php } ?>

             <!-- end -->

             <?php  

             if(isset($_GET['page'])){
              $get_id=$_GET['page'];

              $get_detail=("SELECT id,title,url ,image FROM `videos` WHERE `id`='".$get_id."' ");
              $result=$db->select($get_detail);
              if($result){?>
                <?php $row=$result->fetch_assoc() ;?>
                <div class="col-md-12">

                  <iframe id="ytplayer" type="text/html" width="100%" height="500"
                  src="https://www.youtube.com/embed/<?php echo $row['url']; ?>?autoplay=1&cc_load_policy=1&rel=0&showinfo=0&color=white"
                  frameborder="0" allowfullscreen></iframe>
                  <!-- <iframe width="560" height="315" src="//www.youtube.com/embed/<?php //echo $row['url']; ?>?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe> -->

                  <h3><?php echo $row['title']; ?></h3>
                  <hr>

                </div>

                <?php } ?>

                <!-- end -->

                <div class="scrollbar">

                  <?php  
                  $select ="SELECT * FROM sub_videos where main='".$get_id."' ";
                  $sub=$db->select($select);
                  if($sub){
                   while ($vid_sub=$sub->fetch_assoc()) {
                    if($row['id']==$vid_sub['main']) 
                      {?>
                        <div class="col-md-2">
                          <div class="video height" style="height: 260.484px;">
                           <div class="image">

                             <a href="videosdetail.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo($vid_sub['main']); ?>"> <img src="./images/<?php echo $vid_sub['image']; ?>" class="img-responsive"></a>
                           </div>

                           <div class="title">
                             <a href="videosdetail.php?sub=<?php echo($vid_sub['id']); ?>&main_id=<?php echo($vid_sub['main']); ?>">
                              <?php echo $vid_sub['title']; ?></a>
                              <div class="title">
                                <span><a href="videosdetail.php?delect_sub=<?php echo $vid_sub['id']; ?>" "><i class="glyphicon glyphicon-trash"></i>Delect</a></span> &nbsp;||&nbsp;
                                <a  href="updatesub.php?update_sub=<?php echo $vid_sub['id']; ?>"><i class="glyphicon glyphicon-edit"></i>Edite</a></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php }?>
                        <!-- end -->

                        

                        <?php if (empty($sub)){?>
                          <?php 

                          $select =("SELECT
                 *
                           FROM 
                           (SELECT 
                 *
                           FROM videos
                           ORDER BY id DESC
                           LIMIT 10

                           ) AS a
                           ORDER BY id");
                          $result=$db->select($select);
                          if($result){
                            while ($row=$result->fetch_assoc()) { ?>



                              <div class="col-md-2">
                               <div class="video height" style="height: 260.484px;">
                                <div class="image">


                                  <a href="videosdetail.php?page=<?php echo($row['id']); ?>"> <img src="./images/<?php echo $row['image']; ?>" class="img-responsive"></a>
                                </div>

                                <div class="title">


                                  <a href="videosdetail.php?page=<?php echo($row['id']); ?>">
                                   <?php echo $row['title']; ?></a>

                                 </div>

                                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                  <hr style="margin:10px 0px;">
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>





                          </div>
                        </div>


                      </div>
                      <!-- /.container-fluid -->

                      <!-- /#wrapper -->

                      <?php
                      require_once("footer.php");
                      ?>
