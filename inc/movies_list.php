
<?php
if(isset($_GET['n'])) {

    $get_u = $_GET['n'];
    $select = "SELECT * FROM `videos` WHERE category='" . $get_u . "' ORDER BY `cdate`  DESC";
    $result = $db->select($select);

}
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
               <a href="watch.php?watch=<?php echo $row['id']; ?>" data-url="" class="ml-mask jt" data-hasqtip="34" oldtitle="<?php echo $row['title']; ?>" title="">


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
    </div>

