<?php ob_start(); ?>
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

if(isset($_POST['save'])){
  $slide_tile=$_POST['slide_tile'];
  $slide_DS=$_POST['slide_DS'];
  $alt=$_POST['alt'];
 
  if(empty($slide_tile)){
    $error['slide_tile']="Plase input slide title !!!";
  }elseif (empty($slide_DS)) {
   $error['slide_DS']="Plase input Slide Description !!!";
 }
 elseif (empty($alt)) {
   $error['alt']="Plase input Slide Alt !!!";
 }
elseif (count($error)==0) {
  $file= date('d-m-Y-His').str_replace(" ", "", basename($_FILES["file"]["name"]));
  move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);

  $slide_insert=("INSERT INTO `slide`( `slidename`, `description`, `picture`, `atl`) VALUES ('".$slide_tile."','".$slide_DS."','".$file."','".$alt."')");
  $resul=$db->insert($slide_insert);
  header('location:listSlide.php');


}


}
?>
<!--endinsert Data-->

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">New Slide</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Slide Title</label>
              <input type="text" class="form-control" id="inputSuccess" name="slide_tile" value="<?php echo $slide_tile; ?>">
              <span class="error"><?= show_error($error,"slide_tile"); ?></span>
            </div>
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Description</label>
              <input type="text" class="form-control" id="inputWarning" name="slide_DS" value="<?php echo $slide_DS; ?>">
              <span class="error"><?= show_error($error,"slide_DS"); ?></span>
            </div>

                <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Alt</label>
              <input type="text" class="form-control" id="inputSuccess" name="alt" value="<?php echo $alt; ?>">
              <span class="error"><?= show_error($error,"alt"); ?></span>
            </div>
            <div class="form-group">
              <label class="control-label" for="inputWarning">Picture</label>
              <input type="file" name="file" id="file" value="<?php echo $file; ?>">
            </div>
            <!-- Form Name -->


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