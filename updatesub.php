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
<?php
require_once ("config/helper.php");
?>
<?php $db=new Database(); ?>

<!--insert Data-->
<?php


$vdoname="";
$vdUrl="";
$error=[];
$file="";
$vdCat="";
$id="";
$caterror=[];
if(isset($_POST['save'])){
  $id=$_POST['id'];
  $vdoname=$_POST['vdoname'];
  $vdUrl=$_POST['vdUrl'];
  $vdCat=$_POST['Category'];
  $file=$_POST['file_old'];

  if(!empty($_FILES['picture']['name'])) {
    $file= date('d-m-Y-His').str_replace(" ", "", basename($_FILES["picture"]["name"]));
    move_uploaded_file($_FILES["picture"]["tmp_name"], "./images/".$file);

  }

  $update="UPDATE `sub_videos` SET `title`='".$vdoname."',`url`='".$vdUrl."',`image`='".$file."',`main`='".$vdCat."' WHERE id='".$id."' ";
   $resul=$db->update($update);
   header('location:listVideos.php');


}
?>
<!--endinsert Data-->

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Update Sub Videos</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            <?php 

            if($_GET['update_sub']){
              $get_id=$_GET['update_sub'];
              $select="SELECT * FROM `sub_videos` WHERE id='".$get_id."' ";
              $result=$db->select($select);

              if($result){
                while ($up=$result->fetch_assoc()) { ?>
                              <!-- Select Basic -->
                  <div class="form-group">
                   <div class="form-group has-warning">Main Videos</div>
                   <select id="select" name="Category" class="form-control" value="<?php echo $vdCat; ?>">

                    <option disabled >--Category--</option>
                
                    <?php 
                    $get_category="select * from videos";
                    $resul=$db->select($get_category);

                    if($resul){
                      while ($row=$resul->fetch_assoc()) { ?>
                        <option 
                        <?php if($up['main']==$row['id']){?>
                          selected='selected'
                          <?php } ?>

                          value="<?php echo $row['id']; ?>" ><?php echo $row['title']; ?>
                          <?php } ?>
                          <?php } ?> 
                        </option>
                      </select>

                      <span class="error"><?= show_error($caterror,"Category"); ?></span>

                    </div>
                  <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Videos Title</label>
                    <input type="hidden" class="form-control" id="inputSuccess" name="id" value="<?php echo $up['id']; ?>">
                    <input type="text" class="form-control" id="inputSuccess" name="vdoname" value="<?php echo $up['title']; ?>">
                    <span class="error"><?= show_error($error,"vdoname"); ?></span>
                  </div>
                  <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Videos Url</label>
                    <input type="text" class="form-control" id="inputWarning" name="vdUrl" value="<?php echo $up['url']; ?>">
                    <span class="error"><?= show_error($error,"vdUrl"); ?></span>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="inputWarning">Picture</label>
                    <input type="file" name="picture" value="<?php echo $up['image'] ;?>">
                    <input type="hidden" name="file_old" value="<?php echo($up['image']); ?>"><label class="img"><img width="10%" src="./images/<?php echo $up['image']; ?>"/></label>
                  </div>
                  <!-- Form Name -->
      

                    <?php } } } ?>



                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">Save</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->



          <!-- /#wrapper -->

          <?php
          require_once("footer.php");
          ?>