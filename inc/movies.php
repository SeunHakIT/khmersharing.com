
<!-- list movies-->
<style type="text/css">
  body, html {
    padding: 0;
    margin: 0;
    position: relative;
    height: 100%;
  }
  .swiper-container {
    width: 100%;
    height: 300px;
    margin: 50px auto;
  }
  .swiper-slide {
    background: #f1f1f1;
    color:#000;
    text-align: center;
    line-height: 300px;
  }
</style>

<!--list_all_data-->
<?php
$per_page=20;
if(isset($_GET['page'])){
    $page=$_GET['page'];

}else{
    $page=1;
}
$start_page=($page-1)* $per_page;

$select_all_data="SELECT * FROM videos ORDER BY ID DESC";
$result=$db->select($select_all_data);
?>

<!--pagination-->
<?php
$query="select * from videos";
$dh=$db->select($query);
$total_row=mysqli_num_rows($dh);
$total_page=ceil($total_row/$per_page);
?>

<!-- list movies-->
<div class="movies-list-wrap mlw-topview mt20">
  <div id="sug-cont" class="tab-content">
    <div id="movie-featured" class="movies-list movies-list-full tab-pane in fade active">

      <div id="sug-cont" class="tab-content">
        <div id="movie-featured" class="movies-list movies-list-full tab-pane in fade active">

          

         <div class="h2_title">
          <h2>Show All </h2>

        </div>

  
        <?php 


        if($result){
          while ($row=$result->fetch_assoc()) { ?>

           <div class="col-md-3">
             <a href="watch.php?watch=<?php echo $row['id']; ?> "class="ml-mask jt" data-hasqtip="34" oldtitle="" title="">


              <img data-original="" class="lazy thumb mli-thumb" alt="<?php echo $row['title']; ?>" src=".\administrator\images\<?php echo $row['image']; ?>" style="display: inline-block;">

              <span class="mli-info">
                <h2><?php echo $fm->body($row['title']); ?></h2>
              </span>
            </div>
          </a>
          <?php } ?>
          <?php } ?>
        </div>


      </div>

    </div>
    <div class="clearfix">

    </div>


    <div class="float-left">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="index.php"><i class="fa fa-step-backward" aria-hidden="true"></i></a></li>
        <?php
        for ($i=1; $i <=$total_page ; $i++) { ?>
          <li class=""><a href='index.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>          
          <?php } ?>
          <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $total_page; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a></li>
        </ul>

      </div>



