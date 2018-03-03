<?php ob_start();?>
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
if(isset($_GET['d'])){
    $get_id=$_GET['d'];

    $d="DELETE FROM `videos` WHERE id='".$get_id."' ";
    $resul=$db->delete($d);
    header('location:listVideos.php');

}

?>
<!--endDelect data-->
<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 ">

             <h1 class="page-header" style="text-decoration: none">List Videos</h1>
             <a href="addVideos.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new Viedos</b></a>&nbsp;&nbsp;
             <a href="addsubVideos.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add Sub Viedos</b></a>&nbsp;&nbsp;
             <a href="addVideosplaylist.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add Playlist Viedos</b></a>&nbsp;&nbsp;



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
            $per_page=25;
            if (isset($_GET['page'])) {
              $page=$_GET['page'];

          }else{
              $page=1;
          }
          $start_page=($page-1)* $per_page;
          $list_videos="SELECT * FROM videos ORDER BY id DESC LIMIT $start_page,$per_page";

          $resul=$db->select($list_videos);
          if($resul){
            while ($row=$resul->fetch_assoc()) { ?>
                <div class="col-md-2">
                    <div class="video height" style="height: 260.484px;">
                        <a href="videosdetail.php?page=<?php echo($row['id']); ?>"> 
                            <img src="./images/<?php echo $row['image']; ?>" alt="<?php echo $row['title'] ?>" class="img-responsive main_image"></a>

                            <?php echo $row['title']; ?>
                            <div class="action">


                                <span><a href="listVideos.php?d=<?php echo $row['id']; ?>" "><i class="glyphicon glyphicon-trash"></i>Delect</a></span> &nbsp;||&nbsp;
                                <a  href="updateVdo.php?u=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></i>Edite</a></span>
                            </div>
                        </div>
                    </div>


                    <?php } ?>
                    <?php } ?>


                </div>
          


              <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="listVideos.php?page=1">Previous</a></li>
                     <?php  
                    $query="select * from videos";
                    $dh=$db->select($query);
                    $total_row=mysqli_num_rows($dh);
                    $total_page=ceil($total_row/$per_page);
                    for ($i=1; $i <=$total_page ; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="listVideos.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                   
                    <li class="page-item"><a class="page-link" href="listVideos.php?page=<?php echo $total_page ?>">Next</a></li>
                </ul>
            </nav>
        </div>


    </div>
</div>

<!-- /#wrapper -->

<?php
require_once("footer.php");
?>