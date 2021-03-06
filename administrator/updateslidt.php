<?php ob_start();?>
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
$slide_tile="";
$slide_DS="";
$error=[];
$file="";
$alt="";
$id="";

if(isset($_POST['save'])){

  $slide_tile=$_POST['slide_tile'];
  $slide_DS=$_POST['slide_DS'];
  $alt=$_POST['alt'];
  $id=$_POST['id'];
  $file=$_POST['file_old'];
  
  if(!empty($_FILES['file']['name'])) {
    $file= date('d-m-Y-His').str_replace(" ", "", basename($_FILES["file"]["name"]));
    move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);

  }
  $update="UPDATE `slide` SET `slidename`='".$slide_tile."',`description`='".$slide_DS."',`picture`='".$file."',`atl`='".$alt."' WHERE id='".$id."'";
  $resul=$db->update($update);
  header('location:listSlide.php');
}


?>
<!--endinsert Data-->

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Update Slide</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">

            <?php 
            if(isset($_GET['u'])){
              $get_id_cat=$_GET['u'];


              $select="Select * from slide where id='".$get_id_cat."' ";

              $result=$db->select($select);

              if($result){
                while ($row=$result->fetch_assoc()) {?>


                  <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Slide Title</label>
                    <input type="text" class="form-control" id="inputSuccess" name="slide_tile" value="<?php echo $row['slidename']; ?>">


                    <input type="hidden" class="form-control" id="inputSuccess" name="id" value="<?php echo $row['id']; ?>">
                    <span class="error"><?= show_error($error,"slide_tile"); ?></span>
                  </div>
                  <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Description</label>
                    <input type="text" class="form-control" id="inputWarning" name="slide_DS" value="<?php echo $row['description']; ?>">
                    <span class="error"><?= show_error($error,"slide_DS"); ?></span>
                  </div>

                  <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Alt</label>
                    <input type="text" class="form-control" id="inputSuccess" name="alt" value="<?php echo $row['atl']; ?>">
                    <span class="error"><?= show_error($error,"alt"); ?></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="inputWarning">Picture</label>
                    <input type="file" name="file" value="<?php echo $row['picture'] ;?>">
                    <input type="hidden" name="file_old" value="<?php echo($row['picture']); ?>"><label class="img"><img width="10%" src="./images/<?php echo $row['picture']; ?>"/></label>
                  </div>
                  <!-- Form Name -->

                  <?php } ?>
                  <?php } ?>
                  <?php } ?>



                  <!-- Select Basic -->

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