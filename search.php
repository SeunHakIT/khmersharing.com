<?php ob_start(); ?>
<?php include('header.php'); ?>
<?php $db=new Database(); ?>
<!--Delect data-->
<?php  
if(isset($_GET['d'])){
  $get_id=$_GET['d'];

  $d="DELETE FROM `videos` WHERE id='".$get_id."' ";
  $resul=$db->delete($d);

}

?>
<!--endDelect data-->
<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
       <h1 class="page-header">List Videos</h1>
       <a href="addVideos.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new Viedos</b></a>&nbsp;&nbsp;
       <a href="addsubVideos.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add Sub Viedos</b></a>&nbsp;&nbsp;


     </div>

     <div class="clearfix"></div>
     <div class="col-md-4">


      <?php include('filter.php'); ?>

    </div>
  </div>
  <!-- /.row -->
</div>
<div class="page-content inset">
  <div class="panel panel-default set-videos">

    <div class="row">
      <!--list of video-->


      <?php  
      $get_u="";
      if(isset($_GET['s'])){

        $get_u=$_GET['s'];

        $list_videos="SELECT * FROM `videos` WHERE `title` LIKE '%$get_u%' ";

        $resul=$db->select($list_videos);
        if($resul){
          while ($row=$resul->fetch_assoc()) { ?>
            <div class="col-md-3 title" >
              <div class="video height" style="height: 260.484px;">
                <a href="videosdetail.php?page=<?php echo($row['id']); ?>"> 
                  <img src="./images/<?php echo $row['image']; ?>" alt="<?php echo $row['title'] ?>" class="img-responsive main_image"></a>

                  <h3><?php echo $row['title']; ?></h3>
                  <span><a href="listVideos.php?d=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash"></i>Delect</a></span> &nbsp;||&nbsp;
                  <a href="updateVdo.php?u=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></i>Edite</a></span>
                </div>
              </div>


              
              <?php } ?>
              <?php }
              else{
                header("location:404.php");
              } ?>
              <?php } ?>






            </div>

          </div>

        </div>
      </div>

      <!-- /#wrapper -->

      <?php
      require_once("footer.php");
      ?>